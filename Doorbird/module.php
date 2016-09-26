<?
// Modul für Doorbird

class Doorbird extends IPSModule
{

    public function Create()
    {
//Never delete this line!
        parent::Create();
		
		//These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.
		
        $this->RegisterPropertyString("Host", "");
		$this->RegisterPropertyString("IPSIP", "");
		$this->RegisterPropertyBoolean("Open", false);
		$this->RegisterPropertyString("User", "");
		$this->RegisterPropertyString("Password", "");
		$this->RegisterPropertyInteger("HistoryCategoryID", 0);
		$this->RegisterPropertyInteger("SnapshotCategoryID", 0);
		$this->RegisterPropertyInteger("picturelimit", 20);
    }

    public function ApplyChanges()
    {
	//Never delete this line!
        parent::ApplyChanges();
		
		$this->RegisterVariableString("DoorbirdVideo", "Doorbird Video", "~HTMLBox", 1);
		$this->RegisterVariableString("LastRingtone", "Zeitpunkt letztes Klingelsignal", "~String", 2);
		$this->RegisterVariableString("LastMovement", "Zeitpunkt letzte Bewegung", "~String", 3);
		$this->RegisterVariableString("LastDoorOpen", "Zeitpunkt letzte Türöffnung", "~String", 4);		
		$this->RegisterVariableString("FirmwareVersion", "Doorbird Firmware Version", "~String", 5);
		$this->RegisterVariableString("Buildnumber", "Doorbird Build Number", "~String", 6);
		$this->RegisterVariableString("MACAdress", "Doorbird WLAN MAC", "~String", 7);
		$this->RegisterVariableString("DoorbirdReturn", "Doorbird Return", "~String", 8);
		$this->RegisterVariableInteger("DoorbirdSnapshotCounter", "Doorbird Snapshot Counter", "", 9);
		IPS_SetHidden($this->GetIDForIdent('DoorbirdReturn'), true);
		IPS_SetHidden($this->GetIDForIdent('DoorbirdSnapshotCounter'), true);
		SetValue($this->GetIDForIdent('DoorbirdSnapshotCounter'), 0);
		
		
		$this->ValidateConfiguration();	
	
    }

		/**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        *
        */
		
	private function ValidateConfiguration()
	{
		$change = false;
		
		
		$ip = $this->ReadPropertyString('Host');
		$ipips = $this->ReadPropertyString('IPSIP');
		$doorbirduser = $this->ReadPropertyString('User');
		$password = $this->ReadPropertyString('Password');
		
		//IP prüfen
		if ((!filter_var($ip, FILTER_VALIDATE_IP) === false) && (!filter_var($ipips, FILTER_VALIDATE_IP) === false))
			{
				//IP ok
			}
		else
			{
			$this->SetStatus(203); //IP Adresse ist ungültig 
			}
		$change = false;	
		//User und Passwort prüfen
		if ($doorbirduser == "" || $password == "")
			{
				$this->SetStatus(205); //Felder dürfen nicht leer sein
			}
		elseif ($doorbirduser !== "" && $password !== "" && (!filter_var($ip, FILTER_VALIDATE_IP) === false) && (!filter_var($ipips, FILTER_VALIDATE_IP) === false))
			{
				$DoorbirdVideoHTML = '<iframe src="http://'.$ip.'/bha-api/video.cgi?http-user='.$doorbirduser.'&http-password='.$password.'" border="0" frameborder="0" style= "width: 100%; height: 500px;"/></iframe>';
				SetValueString($this->GetIDForIdent('DoorbirdSnapshotCounter'), $DoorbirdVideoHTML);	
				
				//prüfen ob Script existent
				$SkriptID = @IPS_GetScriptIDByName("Doorbird IPS Interface", $this->InstanceID);
				if ($SkriptID === false)
					{
						$ID = $this->RegisterScript("DoorbirdIPSInterface", "Doorbird IPS Interface", $this->CreateWebHookScript(), 10);
						IPS_SetHidden($ID, true);
						$this->RegisterHook('/hook/doorbird' . $this->InstanceID, $ID);
					}
				else
					{
						//echo "Die Skript-ID lautet: ". $SkriptID;
					}
					
				
				$timerscript = "Doorbird_GetHistory($this->InstanceID)";
				$timerid = @IPS_GetEventIDByName("Get Doorbird History", $this->InstanceID);
				if ($timerid === false)
				{
					$timerid = $this->RegisterTimer('Get Doorbird History', 3600000, $timerscript);
				}
				else
				{
					//echo "Die Ereignis-ID lautet: ". $timerid;
				}
					
				$IDSnapshot = @IPS_GetScriptIDByName("GetDoorbirdSnapshot", $this->InstanceID);
				if ($IDSnapshot === false)
					{
						$IDSnapshot = $this->RegisterScript("GetDoorbirdSnapshot", "Get Doorbird Snapshot", $this->CreateSnapshotScript(), 11);
						IPS_SetHidden($IDSnapshot, true);
						$this->SetSnapshotEvent($IDSnapshot);
					}
				else
					{
						//echo "Die Skript-ID lautet: ". $SkriptID;
					}
				
				$change = true;	
			}
		
		//Import Kategorie für History und Snapshot
		$HistoryCategoryID = $this->ReadPropertyInteger('HistoryCategoryID');
		$SnapshotCategoryID = $this->ReadPropertyInteger('SnapshotCategoryID');
		if (( $HistoryCategoryID === 0) ||( $SnapshotCategoryID === 0))
			{
				// Status Error Kategorie zum Import auswählen
				$this->SetStatus(206);
			}
		elseif (( $HistoryCategoryID != 0) && ( $SnapshotCategoryID != 0))	
			{
				// Status Aktiv
				$this->SetStatus(102);
			}
	}
			
	private function RegisterHook($WebHook, $TargetID)
    {
        $ids = IPS_GetInstanceListByModuleID("{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}");
        if (sizeof($ids) > 0)
        {
            $hooks = json_decode(IPS_GetProperty($ids[0], "Hooks"), true);
            $found = false;
            foreach ($hooks as $index => $hook)
            {
                if ($hook['Hook'] == $WebHook)
                {
                    if ($hook['TargetID'] == $TargetID)
                        return;
                    $hooks[$index]['TargetID'] = $TargetID;
                    $found = true;
                }
            }
            if (!$found)
            {
                $hooks[] = Array("Hook" => $WebHook, "TargetID" => $TargetID);
            }
            IPS_SetProperty($ids[0], "Hooks", json_encode($hooks));
            IPS_ApplyChanges($ids[0]);
        }
    }

	private function CreateWebHookScript()
    {
        $Script = '<?
            //Do not delete or modify.
			Doorbird_ProcessHookData('.$this->InstanceID.');		
			?>';
        /*
		var_dump($_GET);
            $PlayerSelect = IPS_GetObjectIDByIdent("PlayerSelect",IPS_GetParent($_IPS["SELF"]));
            $PlayerID = GetValueInteger($PlayerSelect);
            if ($PlayerID == -1)
            {
            // Alle
            }
            elseif($PlayerID >= 0)
            {
                $Player = LMS_GetPlayerInfo(IPS_GetParent($_IPS["SELF"]),$PlayerID);
                if ($Player["Instanceid"] > 0)
                {
                    LSQ_LoadPlaylistByPlaylistID($Player["Instanceid"],(integer)$_GET["Playlistid"]);
                }
            }
            SetValueInteger($PlayerSelect,-2);
		*/
		
		return $Script;
    }
	
	private function CreateSnapshotScript()
	{
		$Script = '<?
            //Do not delete or modify.
			Doorbird_GetSnapshot('.$this->InstanceID.');		
			?>';	
		return $Script;	
	}
	
	private function SetSnapshotEvent(integer $IDSnapshot)
	{
		//prüfen ob Event existent
		$ParentID = $IDSnapshot;

		$EreignisID = @IPS_GetEventIDByName("GetDoorbirdSnapshot", $ParentID);
		if ($EreignisID === false)
			{
				$EreignisID = IPS_CreateEvent (0);
				IPS_SetName($EreignisID, "GetDoorbirdSnapshot");
				IPS_SetEventTrigger($EreignisID, 0,  $this->GetIDForIdent('LastMovement'));   //bei Variablenaktualisierung
				IPS_SetParent($EreignisID, $ParentID);
				IPS_SetEventActive($EreignisID, true);             //Ereignis aktivieren	
			}
			
		else
			{
			//echo "Die Ereignis-ID lautet: ". $EreignisID;	
			}
	}
	
	public function ProcessHookData()
	{
		$ringid = $this->GetIDForIdent('LastRingtone');
		$movementid = $this->GetIDForIdent('LastMovement');
		$doorid = $this->GetIDForIdent('LastDoorOpen');
			
		//workaround for bug
		if(!isset($_IPS))
			global $_IPS;
		if($_IPS['SENDER'] == "Execute")
			{
			echo "This script cannot be used this way.";
			return;
			}
		//Auswerten von Events von Doorbird
		// Doorbird nutzt GET
		if (isset($_GET["doorbirdevent"]))
			{
			$data = $_GET["doorbirdevent"];
			if ($data == "doorbell")
				{
					SetValue(".$ringid.", date('d.m.y H:i:s'));
				}
			elseif ($data == "motionsensor")
				{
					SetValue(".$movementid.", date('d.m.y H:i:s'));
				}
			elseif ($data == "dooropen")
				{
					SetValue(".$doorid.", date('d.m.y H:i:s'));
				}
			}	
	}
	
	//Profile zuweisen und Geräte anlegen
	public function SetupNotification()
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		$URL='http://'.$doorbirdip.'/bha-api/info.cgi';
		$result = $this->SendDoorbird($URL);
	}
	
	public function SendDoorbird(string $URL)
	{
		$doorbirduser = $this->ReadPropertyString('User');
		$doorbirdpassword = $this->ReadPropertyString('Password');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$URL);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, "$doorbirduser:$doorbirdpassword");
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
		$result=curl_exec ($ch);
		curl_close ($ch);
		return $result;
	}
	
	
	public function GetInfo()
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		$URL='http://'.$doorbirdip.'/bha-api/info.cgi';
		$result = $this->SendDoorbird($URL);
		$result = json_decode($result);
		$firmware = $result->BHA->VERSION[0]->FIRMWARE;
		SetValue($this->GetIDForIdent("FirmwareVersion"), $firmware);
		$buildnumber = $result->BHA->VERSION[0]->BUILD_NUMBER;
		SetValue($this->GetIDForIdent("Buildnumber"), $buildnumber);
		$wifimacaddr = $result->BHA->VERSION[0]->WIFI_MAC_ADDR;
		SetValue($this->GetIDForIdent("MACAdress"), $wifimacaddr);
	}
	
	public function GetHistory()
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		for ($i = 1; $i <= 20; $i++)
		{
			$URL='http://'.$doorbirdip.'/bha-api/history.cgi?index='.$i;
			$Content = $this->SendDoorbird($URL);
			$doorbirdimage = IPS_GetKernelDir()."media".DIRECTORY_SEPARATOR."doorbirdhistory_".$i.".png";  // Raspberry
			// Bild in Datei speichern
			file_put_contents($doorbirdimage, $Content);

			//testen ob im Medienpool existent
			$catid = $this->ReadPropertyInteger('HistoryCategoryID');
			$MediaID = @IPS_GetMediaIDByName("Doorbird Historie $i", $catid);
			if ($MediaID === false)
				{
					$MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
					IPS_SetMediaCached($MediaID, true);
					// Das Cachen für das Mediaobjekt wird aktiviert.
					// Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
					// und zukünftig nur noch im Arbeitsspeicher verarbeitet.
					IPS_SetMediaFile($MediaID, $doorbirdimage, false);   // Image im MedienPool mit Image-Datei verbinden
					IPS_SetName($MediaID, "Doorbird Historie $i"); // Medienobjekt benennen
					IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie Historie
					IPS_SetPosition($MediaID, $i);
				}
			else
				{
					IPS_SetMediaFile($MediaID, $doorbirdimage, false);   // Image im MedienPool mit Image-Datei verbinden
					IPS_SetPosition($MediaID, $i);
				}
			IPS_Sleep(200);	
		}
	}
	
	public function GetSnapshot()
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		$picturelimit = $this->ReadPropertyInteger('picturelimit');
		$URL='http://'.$doorbirdip.'/bha-api/image.cgi';
		$catid = $this->ReadPropertyInteger('SnapshotCategoryID');
		$Content = $this->SendDoorbird($URL);
		$lastsnapshot = GetValue($this->GetIDForIdent('DoorbirdSnapshotCounter'));
		if ($lastsnapshot == $picturelimit)
			{
			   $currentsnapshotid = 1;
			   SetValue($this->GetIDForIdent('DoorbirdSnapshotCounter'), 0);
			}
		else
			{
			   $currentsnapshotid = $lastsnapshot + 1;
			   SetValue($this->GetIDForIdent('DoorbirdSnapshotCounter'), $currentsnapshotid);
			}
		$doorbirdimage = IPS_GetKernelDir()."media".DIRECTORY_SEPARATOR."doorbirdsnapshot_".$currentsnapshotid.".png";  // Raspberry

		// Bild in Datei speichern
		file_put_contents($doorbirdimage, $Content);

		//testen ob im Medienpool existent
		$MediaID = @IPS_GetMediaIDByName("Doorbird Snapshot $currentsnapshotid", $catid);
		if ($MediaID === false)
			{
			   $MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
			  IPS_SetMediaCached($MediaID, true);
				// Das Cachen für das Mediaobjekt wird aktiviert.
				// Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
				// und zukünftig nur noch im Arbeitsspeicher verarbeitet.
				IPS_SetMediaFile($MediaID, $doorbirdimage, false);   // Image im MedienPool mit Image-Datei verbinden
				IPS_SetName($MediaID, "Doorbird Snapshot $currentsnapshotid"); // Medienobjekt benennen
				IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie Historie
			}
		else
			{
			  IPS_SetMediaFile($MediaID, $doorbirdimage, false);   // Image im MedienPool mit Image-Datei verbinden
			}

	}
	
	
	public function Light()
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		$URL='http://'.$doorbirdip.'/bha-api/light-on.cgi';
		$result = $this->SendDoorbird($URL);
	}
	
	public function OpenDoor()
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		$URL='http://'.$doorbirdip.'/bha-api/open-door.cgi';
		$result = $this->SendDoorbird($URL);
	}
	
	
	public function RequestAction($Ident, $Value)
    {
        
    }
	
}

?>