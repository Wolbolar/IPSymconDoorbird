<?php

declare(strict_types=1);

class DoorbirdDiscovery extends IPSModule
{
    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->RegisterAttributeString('devices', '[]');

        //we will wait until the kernel is ready
        $this->RegisterMessage(0, IPS_KERNELMESSAGE);
        $this->RegisterMessage(0, IPS_KERNELSTARTED);
        $this->RegisterTimer('Discovery', 0, 'DoorbirdDiscovery_Discover($_IPS[\'TARGET\']);');
    }

    /**
     * Interne Funktion des SDK.
     */
    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

        if (IPS_GetKernelRunlevel() !== KR_READY) {
            return;
        }

        $this->StartDiscovery();

        // Status Error Kategorie zum Import auswählen
        $this->SetStatus(102);
    }

    public function MessageSink($TimeStamp, $SenderID, $Message, $Data)
    {
        switch ($Message) {
            case IM_CHANGESTATUS:
                if ($Data[0] === IS_ACTIVE) {
                    $this->StartDiscovery();
                }
                break;

            case IPS_KERNELMESSAGE:
                if ($Data[0] === KR_READY) {
                    $this->StartDiscovery();
                }
                break;
            case IPS_KERNELSTARTED:
                $this->StartDiscovery();
                break;

            default:
                break;
        }
    }

    private function StartDiscovery()
    {
        if(empty($this->DiscoverDevices()))
        {
            $this->SendDebug('Discover:', 'could not find doorbird info', 0);
        }
        else
        {
            $this->WriteAttributeString('devices', json_encode($this->DiscoverDevices()));
        }
        $this->SetTimerInterval('Discovery', 300000);
    }

    private function GetSymconIP()
    {
        $ip =  gethostbyname(gethostname());
        return $ip;
    }

    /**
     * Liefert alle Geräte.
     *
     * @return array configlist all devices
     */
    private function Get_ListConfiguration()
    {
        $config_list        = [];
        $DoorbirdIDList = IPS_GetInstanceListByModuleID('{D489FA0B-765D-451E-8B21-C6B61ECAC00E}'); // Doorbird Devices
        $devices            = $this->DiscoverDevices();
        $this->SendDebug('Discovered Doorbird Stations', json_encode($devices), 0);
        if (!empty($devices)) {
            foreach ($devices as $device) {
                $instanceID = 0;
                $name       = $device['name'];
                $hostname     = $device['hostname'];
                $host       = $device['host'];
                $mac       = $device['mac'];
                $device_id  = 0;
                foreach ($DoorbirdIDList as $DoorbirdID) {
                    if ($host == IPS_GetProperty($DoorbirdID, 'Host')) {
                        $Doorbird_name = IPS_GetName($DoorbirdID);
                        $this->SendDebug(
                            'Doorbird Discovery', 'Doorbird found: ' . utf8_decode($Doorbird_name) . ' (' . $DoorbirdID . ')', 0
                        );
                        $instanceID = $DoorbirdID;
                    }
                }

                $config_list[] = [
                    'instanceID'     => $instanceID,
                    'id'             => $device_id,
                    'name'           => $name,
                    'hostname'       => $hostname,
                    'host'           => $host,
                    'mac'            => $mac,
                    'create'         => [
                        [
                            'moduleID'      => '{D489FA0B-765D-451E-8B21-C6B61ECAC00E}',
                            'configuration' => [
                                'name'         => $name,
                                'hostname'     => $hostname,
                                'PortDoorbell' => 80,
                                'Host'         => $host, ], ],
                        [
                            'moduleID'      => '{82347F20-F541-41E1-AC5B-A636FD3AE2D8}',
                            'configuration' => [
                                'Host'     => $this->GetSymconIP(),
                                'Port'     => 6524,
                                'BindIP'   => $this->GetSymconIP(),
                                'BindPort' => 6524,
                                'Open'     => true, ], ], ], ];
            }
        }
        return $config_list;
    }

    private function DiscoverDevices(): array
    {
        $devices = $this->scan();
        $this->SendDebug('Discover Response:', json_encode($devices), 0);
        $doorbird_info = $this->GetDoorbirdInfo($devices);
        if(empty($doorbird_info))
        {
            $this->SendDebug('Discover:', 'could not find doorbird info', 0);
        }
        else
        {
            foreach ($doorbird_info as $device) {
                $this->SendDebug('name:', $device['name'], 0);
                $this->SendDebug('hostname:', $device['hostname'], 0);
                $this->SendDebug('host:', $device['host'], 0);
                $this->SendDebug('port:', $device['port'], 0);
                $this->SendDebug('mac:', $device['mac'], 0);
            }
        }
        return $doorbird_info;
    }

    protected function GetDoorbirdInfo($devices)
    {
        $mDNSInstanceID = $this->GetDNSSD();
        $doorbird_info = [];
        foreach($devices as $key => $doorbird_station)
        {
            $mDNS_name = $doorbird_station['Name'];
            if(stripos($mDNS_name, 'Doorstation') === 0)
            {
                $response = ZC_QueryService($mDNSInstanceID, $mDNS_name, '_axis-video._tcp', 'local.');
                foreach($response as $data)
                {
                    $name = str_ireplace('._axis-video._tcp.local.', '', $data['Name']);
                    $hostname = str_ireplace('.local.', '', $data['Host']);
                    $port = $data['Port'];
                    $mac = str_ireplace('macaddress=', '', $data['TXTRecords'][0]);
                    $ip = $data['IPv4'][0];
                    if(isset($data['Name']))
                    {
                        $name = str_ireplace('._axis-video._tcp.local.', '', $data['Name']);
                    }
                    if(isset($data['Host']))
                    {
                        $hostname = str_ireplace('.local.', '', $data['Host']);
                    }
                    if(isset($data['Port']))
                    {
                        $port = $data['Port'];
                    }
                    if(isset($data['TXTRecords'][0]))
                    {
                        $mac = str_ireplace('macaddress=', '', $data['TXTRecords'][0]);
                    }
                    if(isset($data['IPv4']))
                    {
                        $ip = $data['IPv4'][0];
                    }
                }
                $doorbird_info[$key] = ['name' => $name, 'hostname' => $hostname, 'host' => $ip, 'port' => $port, 'mac' => $mac];
            }
        }
        return $doorbird_info;
    }

    public function scan()
    {
        $mDNSInstanceID = $this->GetDNSSD();
        $doorbird_stations = ZC_QueryServiceType($mDNSInstanceID, '_axis-video._tcp', '');
        return $doorbird_stations;
    }

    private function GetDNSSD()
    {
        $mDNSInstanceIDs = IPS_GetInstanceListByModuleID('{780B2D48-916C-4D59-AD35-5A429B2355A5}');
        $mDNSInstanceID = $mDNSInstanceIDs[0];
        return $mDNSInstanceID;
    }

    public function GetDevices()
    {
        $devices = $this->ReadPropertyString('devices');

        return $devices;
    }

    public function Discover()
    {
        if(empty($this->DiscoverDevices()))
        {
            $devices = '';
        }
        else
        {
            $this->LogMessage($this->Translate('Background Discovery of Doorbird'), KL_NOTIFY);
            $this->WriteAttributeString('devices', json_encode($this->DiscoverDevices()));
            $devices = json_encode($this->DiscoverDevices());
        }
        return $devices;
    }

    /***********************************************************
     * Configuration Form
     ***********************************************************/

    /**
     * build configuration form.
     *
     * @return string
     */
    public function GetConfigurationForm()
    {
        // return current form
        $Form = json_encode(
            [
                'elements' => $this->FormElements(),
                'actions'  => $this->FormActions(),
                'status'   => $this->FormStatus(), ]
        );
        $this->SendDebug('FORM', $Form, 0);
        $this->SendDebug('FORM', json_last_error_msg(), 0);

        return $Form;
    }

    /**
     * return form configurations on configuration step.
     *
     * @return array
     */
    protected function FormElements()
    {
        $form = [
            [
                'type'  => 'Image',
                'image' => 'data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAYQAAABkCAYAAACGjkflAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3BpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpBMTdDM0I3QTVCMEYxMUU3Qjg0Q0Q4MjUxMjdENjg4NSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowRDE2OTJDM0Y5N0UxMUU4OEVBMzg5QzZBQjQ0NUUzRiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowRDE2OTJDMkY5N0UxMUU4OEVBMzg5QzZBQjQ0NUUzRiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjlmYTk4MWJiLWFhNmUtMzE0MC04ZTk5LTFiYjRhZDBlMTBkNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBMTdDM0I3QTVCMEYxMUU3Qjg0Q0Q4MjUxMjdENjg4NSIvPiA8L3Jk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']];

        return $form;
    }

    /**
     * return form actions by token.
     *
     * @return array
     */
    protected function FormActions()
    {
        $form = [
            [
                'name'     => 'DoorbirdDiscovery',
                'type'     => 'Configurator',
                'rowCount' => 20,
                'add'      => false,
                'delete'   => true,
                'sort'     => [
                    'column'    => 'name',
                    'direction' => 'ascending', ],
                'columns'  => [
                    [
                        'label'   => 'ID',
                        'name'    => 'id',
                        'width'   => '200px',
                        'visible' => false, ],
                    [
                        'label' => 'name',
                        'name'  => 'name',
                        'width' => 'auto', ],
                    [
                        'label' => 'hostname',
                        'name'  => 'hostname',
                        'width' => '400px', ],
                    [
                        'label' => 'host',
                        'name'  => 'host',
                        'width' => '400px', ],
                    [
                        'label' => 'mac',
                        'name'  => 'mac',
                        'width' => '400px', ], ],
                'values'   => $this->Get_ListConfiguration(), ], ];

        return $form;
    }

    /**
     * return from status.
     *
     * @return array
     */
    protected function FormStatus()
    {
        $form = [
            [
                'code'    => 101,
                'icon'    => 'inactive',
                'caption' => 'Creating instance.', ],
            [
                'code'    => 102,
                'icon'    => 'active',
                'caption' => 'Doorbird Discovery created.', ],
            [
                'code'    => 104,
                'icon'    => 'inactive',
                'caption' => 'interface closed.', ],
            [
                'code'    => 201,
                'icon'    => 'inactive',
                'caption' => 'Please follow the instructions.', ], ];

        return $form;
    }
}
