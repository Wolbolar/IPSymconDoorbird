<?php

declare(strict_types=1);

if (@constant('IPS_BASE') == null) //Nur wenn Konstanten noch nicht bekannt sind.
{
    // --- BASE MESSAGE
    define('IPS_BASE', 10000);                             //Base Message
    define('IPS_KERNELSHUTDOWN', IPS_BASE + 1);            //Pre Shutdown Message, Runlevel UNINIT Follows
    define('IPS_KERNELSTARTED', IPS_BASE + 2);             //Post Ready Message
    // --- KERNEL
    define('IPS_KERNELMESSAGE', IPS_BASE + 100);           //Kernel Message
    define('KR_CREATE', IPS_KERNELMESSAGE + 1);            //Kernel is beeing created
    define('KR_INIT', IPS_KERNELMESSAGE + 2);              //Kernel Components are beeing initialised, Modules loaded, Settings read
    define('KR_READY', IPS_KERNELMESSAGE + 3);             //Kernel is ready and running
    define('KR_UNINIT', IPS_KERNELMESSAGE + 4);            //Got Shutdown Message, unloading all stuff
    define('KR_SHUTDOWN', IPS_KERNELMESSAGE + 5);          //Uninit Complete, Destroying Kernel Inteface
    // --- KERNEL LOGMESSAGE
    define('IPS_LOGMESSAGE', IPS_BASE + 200);              //Logmessage Message
    define('KL_MESSAGE', IPS_LOGMESSAGE + 1);              //Normal Message                      | FG: Black | BG: White  | STLYE : NONE
    define('KL_SUCCESS', IPS_LOGMESSAGE + 2);              //Success Message                     | FG: Black | BG: Green  | STYLE : NONE
    define('KL_NOTIFY', IPS_LOGMESSAGE + 3);               //Notiy about Changes                 | FG: Black | BG: Blue   | STLYE : NONE
    define('KL_WARNING', IPS_LOGMESSAGE + 4);              //Warnings                            | FG: Black | BG: Yellow | STLYE : NONE
    define('KL_ERROR', IPS_LOGMESSAGE + 5);                //Error Message                       | FG: Black | BG: Red    | STLYE : BOLD
    define('KL_DEBUG', IPS_LOGMESSAGE + 6);                //Debug Informations + Script Results | FG: Grey  | BG: White  | STLYE : NONE
    define('KL_CUSTOM', IPS_LOGMESSAGE + 7);               //User Message                        | FG: Black | BG: White  | STLYE : NONE
    // --- MODULE LOADER
    define('IPS_MODULEMESSAGE', IPS_BASE + 300);           //ModuleLoader Message
    define('ML_LOAD', IPS_MODULEMESSAGE + 1);              //Module loaded
    define('ML_UNLOAD', IPS_MODULEMESSAGE + 2);            //Module unloaded
    // --- OBJECT MANAGER
    define('IPS_OBJECTMESSAGE', IPS_BASE + 400);
    define('OM_REGISTER', IPS_OBJECTMESSAGE + 1);          //Object was registered
    define('OM_UNREGISTER', IPS_OBJECTMESSAGE + 2);        //Object was unregistered
    define('OM_CHANGEPARENT', IPS_OBJECTMESSAGE + 3);      //Parent was Changed
    define('OM_CHANGENAME', IPS_OBJECTMESSAGE + 4);        //Name was Changed
    define('OM_CHANGEINFO', IPS_OBJECTMESSAGE + 5);        //Info was Changed
    define('OM_CHANGETYPE', IPS_OBJECTMESSAGE + 6);        //Type was Changed
    define('OM_CHANGESUMMARY', IPS_OBJECTMESSAGE + 7);     //Summary was Changed
    define('OM_CHANGEPOSITION', IPS_OBJECTMESSAGE + 8);    //Position was Changed
    define('OM_CHANGEREADONLY', IPS_OBJECTMESSAGE + 9);    //ReadOnly was Changed
    define('OM_CHANGEHIDDEN', IPS_OBJECTMESSAGE + 10);     //Hidden was Changed
    define('OM_CHANGEICON', IPS_OBJECTMESSAGE + 11);       //Icon was Changed
    define('OM_CHILDADDED', IPS_OBJECTMESSAGE + 12);       //Child for Object was added
    define('OM_CHILDREMOVED', IPS_OBJECTMESSAGE + 13);     //Child for Object was removed
    define('OM_CHANGEIDENT', IPS_OBJECTMESSAGE + 14);      //Ident was Changed
    define('OM_CHANGEDISABLED', IPS_OBJECTMESSAGE + 15);   //Operability has changed
    // --- INSTANCE MANAGER
    define('IPS_INSTANCEMESSAGE', IPS_BASE + 500);         //Instance Manager Message
    define('IM_CREATE', IPS_INSTANCEMESSAGE + 1);          //Instance created
    define('IM_DELETE', IPS_INSTANCEMESSAGE + 2);          //Instance deleted
    define('IM_CONNECT', IPS_INSTANCEMESSAGE + 3);         //Instance connectged
    define('IM_DISCONNECT', IPS_INSTANCEMESSAGE + 4);      //Instance disconncted
    define('IM_CHANGESTATUS', IPS_INSTANCEMESSAGE + 5);    //Status was Changed
    define('IM_CHANGESETTINGS', IPS_INSTANCEMESSAGE + 6);  //Settings were Changed
    define('IM_CHANGESEARCH', IPS_INSTANCEMESSAGE + 7);    //Searching was started/stopped
    define('IM_SEARCHUPDATE', IPS_INSTANCEMESSAGE + 8);    //Searching found new results
    define('IM_SEARCHPROGRESS', IPS_INSTANCEMESSAGE + 9);  //Searching progress in %
    define('IM_SEARCHCOMPLETE', IPS_INSTANCEMESSAGE + 10); //Searching is complete
    // --- VARIABLE MANAGER
    define('IPS_VARIABLEMESSAGE', IPS_BASE + 600);              //Variable Manager Message
    define('VM_CREATE', IPS_VARIABLEMESSAGE + 1);               //Variable Created
    define('VM_DELETE', IPS_VARIABLEMESSAGE + 2);               //Variable Deleted
    define('VM_UPDATE', IPS_VARIABLEMESSAGE + 3);               //On Variable Update
    define('VM_CHANGEPROFILENAME', IPS_VARIABLEMESSAGE + 4);    //On Profile Name Change
    define('VM_CHANGEPROFILEACTION', IPS_VARIABLEMESSAGE + 5);  //On Profile Action Change
    // --- SCRIPT MANAGER
    define('IPS_SCRIPTMESSAGE', IPS_BASE + 700);           //Script Manager Message
    define('SM_CREATE', IPS_SCRIPTMESSAGE + 1);            //On Script Create
    define('SM_DELETE', IPS_SCRIPTMESSAGE + 2);            //On Script Delete
    define('SM_CHANGEFILE', IPS_SCRIPTMESSAGE + 3);        //On Script File changed
    define('SM_BROKEN', IPS_SCRIPTMESSAGE + 4);            //Script Broken Status changed
    // --- EVENT MANAGER
    define('IPS_EVENTMESSAGE', IPS_BASE + 800);             //Event Scripter Message
    define('EM_CREATE', IPS_EVENTMESSAGE + 1);             //On Event Create
    define('EM_DELETE', IPS_EVENTMESSAGE + 2);             //On Event Delete
    define('EM_UPDATE', IPS_EVENTMESSAGE + 3);
    define('EM_CHANGEACTIVE', IPS_EVENTMESSAGE + 4);
    define('EM_CHANGELIMIT', IPS_EVENTMESSAGE + 5);
    define('EM_CHANGESCRIPT', IPS_EVENTMESSAGE + 6);
    define('EM_CHANGETRIGGER', IPS_EVENTMESSAGE + 7);
    define('EM_CHANGETRIGGERVALUE', IPS_EVENTMESSAGE + 8);
    define('EM_CHANGETRIGGEREXECUTION', IPS_EVENTMESSAGE + 9);
    define('EM_CHANGECYCLIC', IPS_EVENTMESSAGE + 10);
    define('EM_CHANGECYCLICDATEFROM', IPS_EVENTMESSAGE + 11);
    define('EM_CHANGECYCLICDATETO', IPS_EVENTMESSAGE + 12);
    define('EM_CHANGECYCLICTIMEFROM', IPS_EVENTMESSAGE + 13);
    define('EM_CHANGECYCLICTIMETO', IPS_EVENTMESSAGE + 14);
    // --- MEDIA MANAGER
    define('IPS_MEDIAMESSAGE', IPS_BASE + 900);           //Media Manager Message
    define('MM_CREATE', IPS_MEDIAMESSAGE + 1);             //On Media Create
    define('MM_DELETE', IPS_MEDIAMESSAGE + 2);             //On Media Delete
    define('MM_CHANGEFILE', IPS_MEDIAMESSAGE + 3);         //On Media File changed
    define('MM_AVAILABLE', IPS_MEDIAMESSAGE + 4);          //Media Available Status changed
    define('MM_UPDATE', IPS_MEDIAMESSAGE + 5);
    // --- LINK MANAGER
    define('IPS_LINKMESSAGE', IPS_BASE + 1000);           //Link Manager Message
    define('LM_CREATE', IPS_LINKMESSAGE + 1);             //On Link Create
    define('LM_DELETE', IPS_LINKMESSAGE + 2);             //On Link Delete
    define('LM_CHANGETARGET', IPS_LINKMESSAGE + 3);       //On Link TargetID change
    // --- DATA HANDLER
    define('IPS_DATAMESSAGE', IPS_BASE + 1100);             //Data Handler Message
    define('FM_CONNECT', IPS_DATAMESSAGE + 1);             //On Instance Connect
    define('FM_DISCONNECT', IPS_DATAMESSAGE + 2);          //On Instance Disconnect
    // --- SCRIPT ENGINE
    define('IPS_ENGINEMESSAGE', IPS_BASE + 1200);           //Script Engine Message
    define('SE_UPDATE', IPS_ENGINEMESSAGE + 1);             //On Library Refresh
    define('SE_EXECUTE', IPS_ENGINEMESSAGE + 2);            //On Script Finished execution
    define('SE_RUNNING', IPS_ENGINEMESSAGE + 3);            //On Script Started execution
    // --- PROFILE POOL
    define('IPS_PROFILEMESSAGE', IPS_BASE + 1300);
    define('PM_CREATE', IPS_PROFILEMESSAGE + 1);
    define('PM_DELETE', IPS_PROFILEMESSAGE + 2);
    define('PM_CHANGETEXT', IPS_PROFILEMESSAGE + 3);
    define('PM_CHANGEVALUES', IPS_PROFILEMESSAGE + 4);
    define('PM_CHANGEDIGITS', IPS_PROFILEMESSAGE + 5);
    define('PM_CHANGEICON', IPS_PROFILEMESSAGE + 6);
    define('PM_ASSOCIATIONADDED', IPS_PROFILEMESSAGE + 7);
    define('PM_ASSOCIATIONREMOVED', IPS_PROFILEMESSAGE + 8);
    define('PM_ASSOCIATIONCHANGED', IPS_PROFILEMESSAGE + 9);
    // --- TIMER POOL
    define('IPS_TIMERMESSAGE', IPS_BASE + 1400);            //Timer Pool Message
    define('TM_REGISTER', IPS_TIMERMESSAGE + 1);
    define('TM_UNREGISTER', IPS_TIMERMESSAGE + 2);
    define('TM_SETINTERVAL', IPS_TIMERMESSAGE + 3);
    define('TM_UPDATE', IPS_TIMERMESSAGE + 4);
    define('TM_RUNNING', IPS_TIMERMESSAGE + 5);
    // --- STATUS CODES
    define('IS_SBASE', 100);
    define('IS_CREATING', IS_SBASE + 1); //module is being created
    define('IS_ACTIVE', IS_SBASE + 2); //module created and running
    define('IS_DELETING', IS_SBASE + 3); //module us being deleted
    define('IS_INACTIVE', IS_SBASE + 4); //module is not beeing used
    // --- ERROR CODES
    define('IS_EBASE', 200);          //default errorcode
    define('IS_NOTCREATED', IS_EBASE + 1); //instance could not be created
    // --- Search Handling
    define('FOUND_UNKNOWN', 0);     //Undefined value
    define('FOUND_NEW', 1);         //Device is new and not configured yet
    define('FOUND_OLD', 2);         //Device is already configues (InstanceID should be set)
    define('FOUND_CURRENT', 3);     //Device is already configues (InstanceID is from the current/searching Instance)
    define('FOUND_UNSUPPORTED', 4); //Device is not supported by Module
    define('vtBoolean', 0);
    define('vtInteger', 1);
    define('vtFloat', 2);
    define('vtString', 3);
    define('vtArray', 8);
    define('vtObject', 9);
}

// Modul für Doorbird

class Doorbird extends IPSModule
{
    private const D101               = 1; // D101
    private const D202               = 2; // D202
    private const D2101V             = 3; // D2101V
    private const D2102V             = 4; // D2102V
    private const D2103V             = 5; // D2103V
    private const D21DKV             = 6; // D21DKV
    private const D21DKH             = 7; // D21DKH
    private const GET_FAVORITES      = '/bha-api/favorites.cgi'; // Get Favorites URL
    private const SET_HTTP_FAVORITE  = '/bha-api/favorites.cgi?action=save&type=http&title='; // Set Favorites URL
    private const DELETE_FAVORITE    = '/bha-api/favorites.cgi?action=remove&type='; // Delete Fovorites URL
    private const GET_INFO           = '/bha-api/info.cgi'; // Get Info
    private const GET_HISTORY        = '/bha-api/history.cgi?index='; // Get History
    private const GET_SCHEDULE       = '/bha-api/schedule.cgi'; // Get Schedule
    private const LIGHT              = '/bha-api/light-on.cgi'; // Light
    private const GET_IMAGE          = '/bha-api/image.cgi'; // Get Image
    private const OPEN_DOOR          = '/bha-api/open-door.cgi'; // Open Door
    private const LIVE_VIDEO_REQUEST = '/bha-api/video.cgi'; // Live Video Request
    private const PICTURE_LOGO_DOORBIRD = 'iVBORw0KGgoAAAANSUhEUgAAAYQAAABkCAYAAACGjkflAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3BpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpBMTdDM0I3QTVCMEYxMUU3Qjg0Q0Q4MjUxMjdENjg4NSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowRDE2OTJDM0Y5N0UxMUU4OEVBMzg5QzZBQjQ0NUUzRiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowRDE2OTJDMkY5N0UxMUU4OEVBMzg5QzZBQjQ0NUUzRiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjlmYTk4MWJiLWFhNmUtMzE0MC04ZTk5LTFiYjRhZDBlMTBkNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBMTdDM0I3QTVCMEYxMUU3Qjg0Q0Q4MjUxMjdENjg4NSIvPiA8L3Jk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';

    public function Create()
    {
        //Never delete this line!
        parent::Create();

        //These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.
        $this->RequireParent('{82347F20-F541-41E1-AC5B-A636FD3AE2D8}');

        $this->RegisterPropertyString('name', '');
        $this->RegisterPropertyString('Host', '');
        $this->RegisterPropertyInteger('PortDoorbell', 80);
        $this->RegisterPropertyString('hostname', '');
        $this->RegisterPropertyString('IPSIP', '');
        $this->RegisterPropertyInteger('PortIPS', 3777);
        $this->RegisterPropertyString('User', '');
        $this->RegisterPropertyString('Password', '');
        $this->RegisterPropertyString('User_1', '');
        $this->RegisterPropertyString('Password_1', '');
        $this->RegisterPropertyInteger('picturelimitring', 20);
        $this->RegisterPropertyInteger('picturelimitsnapshot', 20);
        $this->RegisterPropertyBoolean('doorbell', true);
        $this->RegisterPropertyInteger('relaxationdoorbell', 10);
        $this->RegisterPropertyBoolean('motionsensor', true);
        $this->RegisterPropertyInteger('relaxationmotionsensor', 10);
        $this->RegisterPropertyBoolean('dooropen', true);
        $this->RegisterPropertyInteger('relaxationdooropen', 10);
        $this->RegisterPropertyBoolean('activeemail', false);
        $this->RegisterPropertyString('email', '');
        $this->RegisterPropertyInteger('smtpmodule', 0);
        $this->RegisterPropertyString('subject', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail2', false);
        $this->RegisterPropertyString('email2', '');
        $this->RegisterPropertyInteger('smtpmodule2', 0);
        $this->RegisterPropertyString('subject2', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext2', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail3', false);
        $this->RegisterPropertyString('email3', '');
        $this->RegisterPropertyInteger('smtpmodule3', 0);
        $this->RegisterPropertyString('subject3', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext3', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail4', false);
        $this->RegisterPropertyString('email4', '');
        $this->RegisterPropertyInteger('smtpmodule4', 0);
        $this->RegisterPropertyString('subject4', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext4', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail5', false);
        $this->RegisterPropertyString('email5', '');
        $this->RegisterPropertyInteger('smtpmodule5', 0);
        $this->RegisterPropertyString('subject5', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext5', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail6', false);
        $this->RegisterPropertyString('email6', '');
        $this->RegisterPropertyInteger('smtpmodule6', 0);
        $this->RegisterPropertyString('subject6', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext6', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail7', false);
        $this->RegisterPropertyString('email7', '');
        $this->RegisterPropertyInteger('smtpmodule7', 0);
        $this->RegisterPropertyString('subject7', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext7', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail8', false);
        $this->RegisterPropertyString('email8', '');
        $this->RegisterPropertyInteger('smtpmodule8', 0);
        $this->RegisterPropertyString('subject8', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext8', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail9', false);
        $this->RegisterPropertyString('email9', '');
        $this->RegisterPropertyInteger('smtpmodule9', 0);
        $this->RegisterPropertyString('subject9', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext9', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail10', false);
        $this->RegisterPropertyString('email10', '');
        $this->RegisterPropertyInteger('smtpmodule10', 0);
        $this->RegisterPropertyString('subject10', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext10', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('activeemail11', false);
        $this->RegisterPropertyString('email11', '');
        $this->RegisterPropertyInteger('smtpmodule11', 0);
        $this->RegisterPropertyString('subject11', 'Doorbell Klingel!');
        $this->RegisterPropertyString('emailtext11', 'Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!');
        $this->RegisterPropertyBoolean('altview', false);
        $this->RegisterPropertyString('webhookusername', 'ipsymcon');
        $this->RegisterPropertyString('webhookpassword', 'useripsh0me');
        $this->RegisterPropertyInteger('categoryhistory', 0);
        $this->RegisterPropertyInteger('categorysnapshot', 0);
        $this->RegisterPropertyInteger('model', 0);
        $this->RegisterAttributeString('schedule', '[]');
        $this->RegisterPropertyString('list_favorites', '[]');
        $this->RegisterPropertyString('list_sip', '[]');
        $this->RegisterPropertyString('list_schedule', '[]');
        $this->RegisterPropertyBoolean('doorbird_app', false);
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

        $this->RegisterVariableString('DoorbirdVideo', 'Doorbird Video', '~HTMLBox', 1);
        $this->RegisterProfileStringDoorbird('Doorbird.Ring', 'Alert');
        $model = $this->ReadPropertyInteger('model');
        if ($model == self::D101 || $model == self::D202 || $model == self::D2101V || $model == self::D21DKV || $model == self::D21DKH) {
            $this->RegisterVariableString('LastRingtone', $this->Translate('Time last bell'), 'Doorbird.Ring', 2);
        }
        if ($model == self::D2102V) {
            $this->RegisterVariableString('LastRingtone', $this->Translate('Time last bell'), 'Doorbird.Ring', 2);
            $this->RegisterVariableString('LastRingtone2', $this->Translate('Time last bell 2'), 'Doorbird.Ring', 3);
        }
        if ($model == self::D2103V) {
            $this->RegisterVariableString('LastRingtone', $this->Translate('Time last bell'), 'Doorbird.Ring', 2);
            $this->RegisterVariableString('LastRingtone2', $this->Translate('Time last bell 2'), 'Doorbird.Ring', 3);
            $this->RegisterVariableString('LastRingtone3', $this->Translate('Time last bell 3'), 'Doorbird.Ring', 4);
        }

        $this->RegisterProfileStringDoorbird('Doorbird.Movement', 'Motion');
        $this->RegisterVariableString('LastMovement', $this->Translate('Time of last movement'), 'Doorbird.Movement', 5);

        $this->RegisterProfileStringDoorbird('Doorbird.LastDoor', 'LockOpen');
        $this->RegisterVariableString('LastDoorOpen', $this->Translate('Time last door opening'), 'Doorbird.LastDoor', 6);
        if ($model == self::D2101V || $model == self::D2102V || $model == self::D2103V) {
            $this->RegisterVariableString('LastDoorOpen_2', $this->Translate('Time last door opening 2'), 'Doorbird.LastDoor', 7);
        }
        $this->RegisterProfileStringDoorbird('Doorbird.Firmware', 'Robot');
        $this->RegisterVariableString('FirmwareVersion', $this->Translate('Doorbird Firmware Version'), 'Doorbird.Firmware', 8);
        $this->RegisterProfileStringDoorbird('Doorbird.Buildnumber', 'Gear');
        $this->RegisterVariableString('Buildnumber', $this->Translate('Doorbird Build Number'), 'Doorbird.Buildnumber', 9);
        $this->RegisterProfileStringDoorbird('Doorbird.MAC', 'Notebook');
        $this->RegisterVariableString('MACAdress', $this->Translate('Doorbird WLAN MAC'), 'Doorbird.MAC', 10);
        $lightass = [
            [0, 'Licht einschalten', 'Light', -1]];
        $doorass  = [
            [0, 'Tür öffnen', 'LockOpen', -1]];
        $snapass  = [
            [0, 'Bild speichern', 'Image', -1]];
        $this->RegisterProfileIntegerDoorbirdAss('Doorbird.Light', 'Light', '', '', 0, 0, 0, 0, $lightass);
        $this->RegisterProfileIntegerDoorbirdAss('Doorbird.Door', 'LockOpen', '', '', 0, 0, 0, 0, $doorass);
        $this->RegisterProfileIntegerDoorbirdAss('Doorbird.Snapshot', 'Image', '', '', 0, 0, 0, 0, $snapass);
        $this->RegisterVariableInteger('DoorbirdButtonLight', 'Doorbird IR Beleuchtung', 'Doorbird.Light', 10);
        $this->EnableAction('DoorbirdButtonLight');
        $this->RegisterVariableInteger('DoorbirdButtonDoor', 'Doorbird Türöffner', 'Doorbird.Door', 11);
        $this->EnableAction('DoorbirdButtonDoor');
        $this->RegisterVariableInteger('DoorbirdButtonSnapshot', 'Doorbird Bild abspeichern', 'Doorbird.Snapshot', 12);
        $this->EnableAction('DoorbirdButtonSnapshot');

        if($this->ReadPropertyBoolean('doorbird_app'))
        {
            $this->RegisterVariableString('doorbird_app', $this->Translate('Launch Doorbird App'), '~HTMLBox', 13);
            $content = '<a href="doorbird://" title="Doorbird App"><img border="0" alt="Doorbird App" src="data:image/png;base64, ' . self::PICTURE_LOGO_DOORBIRD . '" width="15%" height="15%"></a>';
            $icon = IPS_GetObject($this->GetIDForIdent('doorbird_app'))['ObjectIcon'];
            if($icon == '')
            {
                IPS_SetIcon($this->InstanceID, 'Mobile');
            }
            $this->SetValue('doorbird_app', $content);
        }
        $this->ValidateConfiguration();
    }

    /**
     * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die 'Module Control' eingefügt wurden.
     * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt.
     */
    private function ValidateConfiguration()
    {
        $hostdoorbell = $this->ReadPropertyString('Host');
        $this->SendDebug('Doorbird', 'Doorbird adress: ' . $hostdoorbell, 0);
        $hostips = $this->ReadPropertyString('IPSIP');
        $this->SendDebug('Doorbird', 'IP Symcon IP: ' . $hostips, 0);
        $doorbirduser = $this->ReadPropertyString('User');
        $this->SendDebug('Doorbird', 'Doorbird User: ' . $doorbirduser, 0);
        $password = $this->ReadPropertyString('Password');
        $this->SendDebug('Doorbird', 'Password: ' . $password, 0);
        /*
         $doorbirduser_1 = $this->ReadPropertyString('User_1');
         $this->SendDebug('Doorbird', 'Doorbird User 1: ' . $doorbirduser_1, 0);
         $password_1 = $this->ReadPropertyString('Password_1');
         $this->SendDebug('Doorbird', 'Password User 1: ' . $password_1, 0);
         */
        $portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
        $this->SendDebug('Doorbird', 'Port: ' . $portdoorbell, 0);
        $webhookusername = $this->ReadPropertyString('webhookusername');
        $this->SendDebug('Doorbird', 'Webhook User: ' . $webhookusername, 0);
        $webhookpassword = $this->ReadPropertyString('webhookpassword');
        $this->SendDebug('Doorbird', 'Webhook Password: ' . $webhookpassword, 0);

        //IP Doorbell prüfen
        if (!filter_var($hostdoorbell, FILTER_VALIDATE_IP) === false) {
            //IP ok
            $ipcheckdoorbird = true;
        } else {
            $ipcheckdoorbird = false;
            $this->SendDebug('Doorbird', 'ip check Doorbird failed', 0);
        }

        //IP IP-Symcon prüfen
        if (!filter_var($hostips, FILTER_VALIDATE_IP) === false) {
            //IP ok
            $ipcheckips = true;
        } else {
            $ipcheckips = false;
            $this->SendDebug('Doorbird', 'ip check IP-Symcon failed', 0);
        }

        //Domain Doorbell prüfen
        if (!$this->is_valid_localdomain($hostdoorbell) === false) {
            //Domain ok
            $domaincheckdoorbell = true;
        } else {
            $domaincheckdoorbell = false;
        }

        //Domain IP-Symcon prüfen
        if (!$this->is_valid_domain($hostips) === false) {
            //Domain ok
            $domaincheckips = true;
        } else {
            $domaincheckips = false;
        }

        if (($domaincheckdoorbell === true || $ipcheckdoorbird === true) && ($domaincheckips === true || $ipcheckips === true)) {
            $hostcheck = true;
        } else {
            $hostcheck = false;
            if($domaincheckdoorbell === false || $ipcheckdoorbird === false)
            {
                $this->SendDebug('Doorbird', 'Doorbird host not valid', 0);
                $this->SetStatus(218); //IP Adresse oder Host ist ungültig
            }
            elseif ($domaincheckips === false || $ipcheckips === false)
            {
                $this->SendDebug('Doorbird', 'IP-Symcon host not valid', 0);
                $this->SetStatus(219); //IP Adresse oder Host ist ungültig
            }
        }

        //User und Passwort prüfen
        if ($doorbirduser == '') {
            $this->SendDebug('Doorbird', 'doorbird user field must not be empty', 0);
            $this->SetStatus(210); //Felder dürfen nicht leer sein
        }
        if ($password == '') {
            $this->SendDebug('Doorbird', 'doorbird password field must not be empty', 0);
            $this->SetStatus(211); //Felder dürfen nicht leer sein
        }
        if ($webhookusername == '') {
            $this->SendDebug('Doorbird', 'webhook user field must not be empty', 0);
            $this->SetStatus(212); //Felder dürfen nicht leer sein
        }
        if ($webhookpassword == '') {
            $this->SendDebug('Doorbird', 'webhook password field must not be empty', 0);
            $this->SetStatus(213); //Felder dürfen nicht leer sein
        }
        if ($doorbirduser !== '' && $password !== '' && $hostcheck === true) {
            $selectionaltview = $this->ReadPropertyBoolean('altview');
            $prefix           = $this->GetURLPrefix($hostdoorbell);
            if ($selectionaltview) {
                $DoorbirdVideoHTML =
                    '<img src=' . $prefix . $hostdoorbell . ':' . $portdoorbell . self::LIVE_VIDEO_REQUEST . '?http-user=' . $doorbirduser . '&http-password='
                    . $password . ' style=width: 960px; height:540px; >';
            } else {
                $DoorbirdVideoHTML = '<iframe src=' . $prefix . $hostdoorbell . ':' . $portdoorbell . self::LIVE_VIDEO_REQUEST . '?http-user=' . $doorbirduser
                                     . '&http-password=' . $password . '  width= 960px; height= 540px; ></iframe>';
            }
            $this->SetValue('DoorbirdVideo', $DoorbirdVideoHTML);

            $ipsversion = $this->GetIPSVersion();
            if ($ipsversion == 0) {
                //prüfen ob Script existent
                $SkriptID = @IPS_GetObjectIDByIdent('DoorbirdIPSInterface', $this->InstanceID);
                if ($SkriptID === false) {
                    $ID = $this->RegisterScript('DoorbirdIPSInterface', 'Doorbird IPS Interface', $this->CreateWebHookScript(), 19);
                    IPS_SetHidden($ID, true);
                    $this->RegisterHookOLD('/hook/doorbird' . $this->InstanceID, $ID);
                } else {
                    $this->SendDebug('Doorbird', 'Webhookscript mit ' . $SkriptID . ' gefunden', 0);
                }
            } else {
                $SkriptID = @IPS_GetObjectIDByIdent('DoorbirdIPSInterface', $this->InstanceID);
                if ($SkriptID > 0) {
                    $this->UnregisterHook('/hook/doorbird' . $this->InstanceID);
                    $this->UnregisterScript('DoorbirdIPSInterface');
                }
                $this->RegisterHook('/hook/doorbird' . $this->InstanceID);
            }

            // Kategorie prüfen
            $category_snapshot = $this->ReadPropertyInteger('categorysnapshot');
            $category_history  = $this->ReadPropertyInteger('categoryhistory');
            if ($category_snapshot > 0) {
                $this->SendDebug('Doorbird', 'Kategorie mit ObjektID ' . $category_snapshot . ' gefunden', 0);
            } else {
                $this->SendDebug('Doorbird', 'category snapshot not set', 0);
                $this->SetStatus(208); //category doorbird snapshot not set
            }
            if ($category_history > 0) {
                $this->SendDebug('Doorbird', 'Kategorie mit ObjektID ' . $category_history . ' gefunden', 0);
            } else {
                $this->SetStatus(209); //category doorbird history not set
            }
            //Timer für Historie
            // Ersetzt durch Event das Bilder bei Klingeln abholt
            /*
             $timerscript = 'Doorbird_GetHistory($this->InstanceID)';
+            $timerid = @IPS_GetEventIDByName('Get Doorbird History', $this->InstanceID);
+            if ($timerid === false)
+            {
+                $timerid = $this->RegisterTimer('Get Doorbird History', 3600000, $timerscript);
+            }
+            else
+            {
+                //echo 'Die Ereignis-ID lautet: '. $timerid;
+            }
+            */

            if ($ipsversion == 0) {
                //Skript bei Bewegung
                $IDSnapshot = @($this->GetIDForIdent('GetDoorbirdSnapshot'));
                if ($IDSnapshot === false) {
                    $IDSnapshot = $this->RegisterScript('GetDoorbirdSnapshot', 'Get Doorbird Snapshot', $this->CreateSnapshotScript(), 17);
                    IPS_SetHidden($IDSnapshot, true);
                    $this->SetSnapshotEvent($IDSnapshot);
                } else {
                    $this->SendDebug('Doorbird', 'Doorbird Snapshot Script mit ' . $IDSnapshot . ' gefunden', 0);
                }
            } else {
                if ($this->GetIDForIdent('LastMovement') > 0) {
                    $this->RegisterMessage($this->GetIDForIdent('LastMovement'), VM_UPDATE);
                    $this->SendDebug('Doorbird', 'Register Message LastMovement', 0);
                }
            }

            if ($ipsversion == 0) {
                //Skript beim Klingeln
                $IDRing = @($this->GetIDForIdent('GetDoorbirdRingPic'));
                if ($IDRing === false) {
                    $IDRing = $this->RegisterScript('GetDoorbirdRingPic', 'Get Doorbird Ring Picture', $this->CreateRingPictureScript(), 18);
                    IPS_SetHidden($IDRing, true);
                    $this->SetRingEvent($IDRing);
                } else {
                    $this->SendDebug('Doorbird', 'Doorbird Ring Picture Script mit ' . $IDRing . ' gefunden', 0);
                }
            } else {
                $model = $this->ReadPropertyInteger('model');
                if ($this->GetIDForIdent('LastRingtone') > 0) {
                    $this->RegisterMessage($this->GetIDForIdent('LastRingtone'), VM_UPDATE);
                    $this->SendDebug('Doorbird', 'Register Message LastRingtone', 0);
                }
                if ($model == self::D2102V || $model == self::D2103V) {
                    if ($this->GetIDForIdent('LastRingtone2') > 0) {
                        $this->RegisterMessage($this->GetIDForIdent('LastRingtone2'), VM_UPDATE);
                        $this->SendDebug('Doorbird', 'Register Message LastRingtone2', 0);
                    }
                }
                if ($model == self::D2103V) {
                    if ($this->GetIDForIdent('LastRingtone3') > 0) {
                        $this->RegisterMessage($this->GetIDForIdent('LastRingtone3'), VM_UPDATE);
                        $this->SendDebug('Doorbird', 'Register Message LastRingtone3', 0);
                    }
                }
            }

            if ($ipsversion >= 1) {
                if ($this->GetIDForIdent('LastDoorOpen') > 0) {
                    $this->RegisterMessage($this->GetIDForIdent('LastDoorOpen'), VM_UPDATE);
                    $this->SendDebug('Doorbird', 'Register Message LastDoorOpen', 0);
                }
            }
            if($this->CheckAccess())
            {
                $this->SetupNotification();
                $this->SendDebug('Doorbird', 'Setup notification', 0);
                $info = $this->GetInfo();
                $this->SendDebug('Doorbird', 'Info: ' . json_encode($info), 0);

                //Email
                $emailalert   = $this->ReadPropertyBoolean('activeemail');
                $emailalert2  = $this->ReadPropertyBoolean('activeemail2');
                $emailalert3  = $this->ReadPropertyBoolean('activeemail3');
                $emailalert4  = $this->ReadPropertyBoolean('activeemail4');
                $emailalert5  = $this->ReadPropertyBoolean('activeemail5');
                $emailalert6  = $this->ReadPropertyBoolean('activeemail6');
                $emailalert7  = $this->ReadPropertyBoolean('activeemail7');
                $emailalert8  = $this->ReadPropertyBoolean('activeemail8');
                $emailalert9  = $this->ReadPropertyBoolean('activeemail9');
                $emailalert10 = $this->ReadPropertyBoolean('activeemail10');
                $emailalert11 = $this->ReadPropertyBoolean('activeemail11');
                if ($emailalert) {
                    $email = $this->ReadPropertyString('email');
                    $this->CheckEmail($email);
                } elseif ($emailalert2) {
                    $email = $this->ReadPropertyString('email2');
                    $this->CheckEmail($email);
                } elseif ($emailalert3) {
                    $email = $this->ReadPropertyString('email3');
                    $this->CheckEmail($email);
                } elseif ($emailalert4) {
                    $email = $this->ReadPropertyString('email4');
                    $this->CheckEmail($email);
                } elseif ($emailalert5) {
                    $email = $this->ReadPropertyString('email5');
                    $this->CheckEmail($email);
                } elseif ($emailalert6) {
                    $email = $this->ReadPropertyString('email6');
                    $this->CheckEmail($email);
                } elseif ($emailalert7) {
                    $email = $this->ReadPropertyString('email7');
                    $this->CheckEmail($email);
                } elseif ($emailalert8) {
                    $email = $this->ReadPropertyString('email8');
                    $this->CheckEmail($email);
                } elseif ($emailalert9) {
                    $email = $this->ReadPropertyString('email9');
                    $this->CheckEmail($email);
                } elseif ($emailalert10) {
                    $email = $this->ReadPropertyString('email10');
                    $this->CheckEmail($email);
                } elseif ($emailalert11) {
                    $email = $this->ReadPropertyString('email11');
                    $this->CheckEmail($email);
                } else {
                    $IDEmail = @($this->GetIDForIdent('SendEmailAlert'));
                    if ($ipsversion == 0) {
                        if ($IDEmail > 0) {
                            $this->SetEmailEvent($IDEmail, false);
                        }
                    }

                }
                // Status Aktiv
                $this->SetStatus(102);
            }
            else
            {
                $this->SetStatus(217); // no access
            }
        }
    }

    protected function CheckAccess()
    {
        $favorites = $this->GetFavorites();
        $error = strpos($favorites, '401 Unauthorized');
        if($error > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function GetConfigurationForParent()
    {
        // $Config['Host'] = $this->GetHostIP();
        $Config['Port']     = 6524;
        $Config['BindPort'] = 6524;
        return json_encode($Config);
    }

    protected function GetHostIP()
    {
        $ip = exec('sudo ifconfig eth0 | grep "inet Adresse:" | cut -d: -f2 | awk "{ print $1}"');
        if ($ip == '') {
            $ipinfo = Sys_GetNetworkInfo();
            $ip     = $ipinfo[0]['IP'];
        }
        return $ip;
    }

    protected function CheckEmail($email)
    {
        $ipsversion = $this->GetIPSVersion();
        if ($email == '') {
            $this->SetStatus(214); // email not set
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //email valid
            if ($ipsversion == 0) {
                //Skript beim EmailAlert
                $IDEmail = @($this->GetIDForIdent('SendEmailAlert'));
                if ($IDEmail === false) {
                    $IDEmail = $this->RegisterScript('SendEmailAlert', 'Email Alert', $this->CreateEmailAlertScript($email), 19);
                    IPS_SetHidden($IDEmail, true);
                }
                $this->SetEmailEvent($IDEmail, true);
            }
        } else {
            $this->SetStatus(207); //email not valid
        }
    }

    private function RegisterHookOLD($WebHook, $TargetID)
    {
        $ids = IPS_GetInstanceListByModuleID('{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}');
        if (count($ids) > 0) {
            $hooks = json_decode(IPS_GetProperty($ids[0], 'Hooks'), true);
            $found = false;
            foreach ($hooks as $index => $hook) {
                if ($hook['Hook'] == $WebHook) {
                    if ($hook['TargetID'] == $TargetID) {
                        return;
                    }
                    $hooks[$index]['TargetID'] = $TargetID;
                    $found                     = true;
                }
            }
            if (!$found) {
                $hooks[] = ['Hook' => $WebHook, 'TargetID' => $TargetID];
            }
            IPS_SetProperty($ids[0], 'Hooks', json_encode($hooks));
            IPS_ApplyChanges($ids[0]);
        }
    }

    private function RegisterHook($WebHook)
    {
        $ids = IPS_GetInstanceListByModuleID('{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}');
        if (count($ids) > 0) {
            $hooks = json_decode(IPS_GetProperty($ids[0], 'Hooks'), true);
            $found = false;
            foreach ($hooks as $index => $hook) {
                if ($hook['Hook'] == $WebHook) {
                    if ($hook['TargetID'] == $this->InstanceID) {
                        return;
                    }
                    $hooks[$index]['TargetID'] = $this->InstanceID;
                    $found                     = true;
                }
            }
            if (!$found) {
                $hooks[] = ['Hook' => $WebHook, 'TargetID' => $this->InstanceID];
            }
            IPS_SetProperty($ids[0], 'Hooks', json_encode($hooks));
            IPS_ApplyChanges($ids[0]);
        }
    }

    /**
     * Löscht einen WebHook, wenn vorhanden.
     *
     * @param string $WebHook URI des WebHook.
     */
    protected function UnregisterHook($WebHook)
    {
        $ids   = IPS_GetInstanceListByModuleID('{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}');
        $index = 0;
        if (count($ids) > 0) {
            $hooks = json_decode(IPS_GetProperty($ids[0], 'Hooks'), true);
            $found = false;
            foreach ($hooks as $index => $hook) {
                if ($hook['Hook'] == $WebHook) {
                    $found = $index;
                    break;
                }
            }
            if ($found !== false) {
                array_splice($hooks, $index, 1);
                IPS_SetProperty($ids[0], 'Hooks', json_encode($hooks));
                IPS_ApplyChanges($ids[0]);
            }
        }
    }

    /**
     * Löscht eine Script, sofern vorhanden.
     *
     * @param string $Ident Ident der Variable.
     */
    protected function UnregisterScript($Ident)
    {
        $sid = @IPS_GetObjectIDByIdent($Ident, $this->InstanceID);
        if ($sid === false) {
            return;
        }
        if (!IPS_ScriptExists($sid)) {
            return;
        } //bail out
        IPS_DeleteScript($sid, true);
    }

    protected function is_valid_domain($url)
    {

        $validation = false;
        /*Parse URL*/
        $urlparts = parse_url(filter_var($url, FILTER_SANITIZE_URL));
        /*Check host exist else path assign to host*/
        if (!isset($urlparts['host'])) {
            $urlparts['host'] = $urlparts['path'];
        }

        if ($urlparts['host'] != '') {
            /*Add scheme if not found*/
            if (!isset($urlparts['scheme'])) {
                $urlparts['scheme'] = 'http';
            }
            /*Validation*/
            if (checkdnsrr($urlparts['host'], 'A') && in_array($urlparts['scheme'], ['http', 'https']) && ip2long($urlparts['host']) === false) {
                $urlparts['host'] = preg_replace('/^www\./', '', $urlparts['host']);
                $url              = $urlparts['scheme'] . '://' . $urlparts['host'] . '/';

                if (filter_var($url, FILTER_VALIDATE_URL) !== false && @get_headers($url)) {
                    $validation = true;
                }
            }
        }

        if (!$validation) {
            //echo $url.' Its Invalid Domain Name.';
            $domaincheck = false;
            return $domaincheck;
        } else {
            //echo $url.' is a Valid Domain Name.';
            $domaincheck = true;
            return $domaincheck;
        }

    }

    protected function is_valid_localdomain($url)
    {

        $validation = false;
        /*Parse URL*/
        $urlparts = parse_url(filter_var($url, FILTER_SANITIZE_URL));
        /*Check host exist else path assign to host*/
        if (!isset($urlparts['host'])) {
            $urlparts['host'] = $urlparts['path'];
        }

        if ($urlparts['host'] != '') {
            /*Add scheme if not found*/
            if (!isset($urlparts['scheme'])) {
                $urlparts['scheme'] = 'http';
            }
            /*Validation*/
            if (checkdnsrr($urlparts['host'], 'A') && in_array($urlparts['scheme'], ['http', 'https']) && ip2long($urlparts['host']) === false) {
                $urlparts['host'] = preg_replace('/^www\./', '', $urlparts['host']);
                $url              = $urlparts['scheme'] . '://' . $urlparts['host'] . '/';

                if (filter_var($url, FILTER_VALIDATE_URL) !== false && @get_headers($url)) {
                    $validation = true;
                }
            }
        }

        if (!$validation) {
            //echo $url.' Its Invalid Domain Name.';
            $domaincheck = false;
            return $domaincheck;
        } else {
            //echo $url.' is a Valid Domain Name.';
            $domaincheck = true;
            return $domaincheck;
        }

    }

    protected function GetURLPrefix($url)
    {
        $prehttp  = strpos($url, 'http://');
        $prehttps = strpos($url, 'https://');
        if ($prehttp === 0) {
            $prefix = ''; //Prefix ist http
        } elseif ($prehttps === 0) {
            $prefix = ''; //Prefix ist https
        } else {
            $prefix = 'http://'; //Prefix ergänzen
        }
        return $prefix;
    }

    protected function GetConnectURL()
    {
        $InstanzenListe = IPS_GetInstanceListByModuleID('{9486D575-BE8C-4ED8-B5B5-20930E26DE6F}');
        $InstanzCount   = 0;
        $ConnectControl = 0;
        foreach ($InstanzenListe as $InstanzID) {
            $ConnectControl = $InstanzID;
            $InstanzCount++;
            $Childs[] = IPS_GetChildrenIDs($InstanzID);
        }

        if ($ConnectControl > 0) {
            $connectinfo = CC_GetUrl($ConnectControl);
            return $connectinfo;
        } else {
            return false;
        }
    }

    public function MessageSink($TimeStamp, $SenderID, $Message, $Data)
    {
        $this->LogMessage('SenderID: ' . $SenderID . ', Message: ' . $Message . ', Data:' . json_encode($Data), KL_DEBUG);
        if ($SenderID == $this->GetIDForIdent('LastRingtone')) {
            $this->SetRingPicture(1);
            $email = $this->ReadPropertyString('email');
            $this->EmailAlert($email);
            $this->SendDebug('Doorbird recieved LastRingtone at', date('H:i', time()), 0);
            $this->SendDebug(
                'Doorbird', 'Message from SenderID ' . $SenderID . ' with Message ' . $Message . '\r\n Data: ' . print_r($Data, true), 0
            );
        }
        $model = $this->ReadPropertyInteger('model');
        if ($model == self::D2102V || $model == self::D2103V) {
            if ($SenderID == $this->GetIDForIdent('LastRingtone2')) {
                $this->SetRingPicture(2);
                $email = $this->ReadPropertyString('email');
                $this->EmailAlert($email);
                $this->SendDebug('Doorbird recieved LastRingtone2 at', date('H:i', time()), 0);
                $this->SendDebug(
                    'Doorbird', 'Message from SenderID ' . $SenderID . ' with Message ' . $Message . '\r\n Data: ' . print_r($Data, true), 0
                );
            }
        }
        if ($model == self::D2103V) {
            if ($SenderID == $this->GetIDForIdent('LastRingtone3')) {
                $this->SetRingPicture(3);
                $email = $this->ReadPropertyString('email');
                $this->EmailAlert($email);
                $this->SendDebug('Doorbird recieved LastRingtone3 at', date('H:i', time()), 0);
                $this->SendDebug(
                    'Doorbird', 'Message from SenderID ' . $SenderID . ' with Message ' . $Message . '\r\n Data: ' . print_r($Data, true), 0
                );
            }
        }
        if ($SenderID == $this->GetIDForIdent('LastMovement')) {
            $this->GetSnapshot();
            $this->SendDebug('Doorbird recieved LastMovement at', date('H:i', time()), 0);
            $this->SendDebug(
                'Doorbird', 'Message from SenderID ' . $SenderID . ' with Message ' . $Message . '\r\n Data: ' . print_r($Data, true), 0
            );
        }

    }

    public function ReceiveData($JSONString)
    {
        // $this->SendDebug('Doorbird:', $JSONString, 0);
        $payload_udp = json_decode($JSONString);
        // $type = $payload->Type;
        $this->SendDebug('Doorbird Recieve:', utf8_decode($payload_udp->Buffer), 1);
        $dataraw           = utf8_decode($payload_udp->Buffer);
        $doorbird_user     = $this->ReadPropertyString('User');
        $INTERCOM_ID       = substr($doorbird_user, 0, 6);
        $doorbird_password = $this->ReadPropertyString('Password');
        $data              = explode(':', $dataraw);
        if (isset($data[1])) {
            $doorbird_id = $data[1];

            if ($doorbird_id == $INTERCOM_ID) {
                $this->SendDebug('Doorbird Recieve:', $payload_udp->Buffer, 0);
            }
        } else {
            // Step 1: get packet via UDP:
            $payload = utf8_decode($payload_udp->Buffer);
            // Step 2: Split up:
            $ident = substr($payload, 0, 3); // lenght 3 Bytes, 0xDE 0xAD 0xBE
            $this->SendDebug('Doorbird Ident:', $ident, 1);
            // $this->SendDebug('Doorbird:', 'Ident: '.bin2hex($ident), 0);
            $version = substr($payload, 3, 1); // lenght 1 Bytes, 0x01
            $this->SendDebug('Doorbird Version:', $version, 1);
            //$this->SendDebug('Doorbird:', 'Version: '.bin2hex($version), 0);
            $opslimit = substr($payload, 4, 4); // lenght 4 Bytes, Used for password stretching with Argon2i.
            $this->SendDebug('Doorbird OPSLimit:', $opslimit, 1);
            // $this->SendDebug('Doorbird:', 'OPSLimit: '.bin2hex($opslimit), 0);
            $memlimit = substr($payload, 8, 4); // lenght 4 Bytes, Used for password stretching with Argon2i.
            $this->SendDebug('Doorbird MEMLimit:', $memlimit, 1);
            // $this->SendDebug('Doorbird:', 'MEMLimit: '.bin2hex($memlimit), 0);
            $salt = substr($payload, 12, 16); // lenght 16 Bytes, Used for password stretching with Argon2i.
            $this->SendDebug('Doorbird Salt:', $salt, 1);
            // $this->SendDebug('Doorbird:', 'Salt: '.bin2hex($salt), 0);
            $nonce = substr($payload, 28, 8); // lenght 8 Bytes, Used for encryption with ChaCha20-Poly1305
            $this->SendDebug('Doorbird Nonce:', $nonce, 1);
            // $this->SendDebug('Doorbird:', 'Nonce: '.bin2hex($nonce), 0);

            $ciphertext =
                substr($payload, 36, 34); // lenght 8 Bytes, With ChaCha20-Poly1305 encrypted text which contains informations about the Event.
            $this->SendDebug('Doorbird Ciphertext:', $ciphertext, 1);
            // $this->SendDebug('Doorbird:', 'Ciphertext: '.bin2hex($ciphertext), 0);
            // Step 3: Generate stretched password
            $password = substr($doorbird_password, 0, 5); // first 5 chars of your password
            $key      = sodium_crypto_pwhash(
                SODIUM_CRYPTO_SIGN_SEEDBYTES, $password, $salt, // SALT
                unpack('N', $opslimit)[1], //OPSLIMIT
                unpack('N', $memlimit)[1], //MEMLIMIT
                SODIUM_CRYPTO_PWHASH_ALG_ARGON2I13
            );
            $this->SendDebug('Doorbird Key:', $key, 1); // Key für decrypt in HEX
            // Step 4: Decrypt CIPHERTEXT with ChaCha20-Poly1305, use the stretched password and NONCE
            $decrypted = sodium_crypto_aead_chacha20poly1305_decrypt($ciphertext, '', $nonce, $key);
            if ($decrypted) {
                $this->SendDebug('Doorbird:', 'decryption successfull', 0);
                $this->SendDebug('Doorbird Decrypted Data:', $decrypted, 1);
                // Step 5: Split the output up
                $INTERCOM_ID = substr($decrypted, 0, 6); // Starting 6 chars from the user name
                $this->SendDebug('Doorbird Intercom ID:', $INTERCOM_ID, 0);
                $EVENT = (int) trim(substr($decrypted, 6, 8));

                if ($EVENT == 1) // Contains the doorbell or „motion“ to detect which event was triggered
                {
                    $this->SetLastRingtone(1);
                }
                if ($EVENT == 101) // Contains the doorbell or „motion“ to detect which event was triggered
                {
                    $this->SetLastRingtone(2);
                }
                $this->SendDebug('Doorbird Event:', strval($EVENT), 0);
                $TIMESTAMP = unpack('N', substr($decrypted, 14, 4))[1];
                $this->SendDebug('Doorbird Timestamp UTC:', gmdate('H:i:s d.m.Y', $TIMESTAMP), 0);
                $this->SendDebug('Doorbird Timestamp local:', date('H:i:s d.m.Y', $TIMESTAMP), 0);
            } else {
                $this->SendDebug('Doorbird:', 'decryption not successfull', 0);
            }
        }
    }

    protected function SetLastRingtone($doorbell_id)
    {
        $relaxationdoorbell = $this->ReadPropertyInteger('relaxationdoorbell');
        if ($doorbell_id == 1) {
            $last_write = IPS_GetVariable($this->GetIDForIdent('LastRingtone'))['VariableChanged'];
        } else {
            $last_write = IPS_GetVariable($this->GetIDForIdent('LastRingtone' . $doorbell_id))['VariableChanged'];
        }
        $current_time = time();
        if (($current_time - $last_write) > $relaxationdoorbell) {
            $this->SendDebug('Doorbird:', 'doorbell event', 0);
            if ($doorbell_id == 1) {
                $this->SendDebug('Doorbird:', 'Set LastRingtone ' . date('d.m.y H:i:s'), 0);
                $this->SetValue('LastRingtone', date('d.m.y H:i:s'));
            } else {
                $this->SendDebug('Doorbird:', 'Set LastRingtone' . $doorbell_id . ' ' . date('d.m.y H:i:s'), 0);
                $this->SetValue('LastRingtone' . $doorbell_id, date('d.m.y H:i:s'));
            }
        }
    }

    protected function SetLastMovement()
    {
        $relaxationmotionsensor = $this->ReadPropertyInteger('relaxationmotionsensor');
        $last_write             = IPS_GetVariable($this->GetIDForIdent('LastMovement'))['VariableChanged'];
        $current_time           = time();
        if (($current_time - $last_write) > $relaxationmotionsensor) {
            $this->SendDebug('Doorbird:', 'motionsensor event', 0);
            $this->SetValue('LastMovement', date('d.m.y H:i:s'));
        }
    }

    protected function SetLastDoorOpen($id)
    {
        $relaxationdooropen = $this->ReadPropertyInteger('relaxationdooropen');
        $last_write         = IPS_GetVariable($this->GetIDForIdent('LastDoorOpen'))['VariableChanged'];
        $current_time       = time();
        if (($current_time - $last_write) > $relaxationdooropen) {
            $this->SendDebug('Doorbird:', 'dooropen event', 0);
            if ($id == 2) {
                $this->SetValue('LastDoorOpen_2', date('d.m.y H:i:s'));
            } else {
                $this->SetValue('LastDoorOpen', date('d.m.y H:i:s'));
            }
        }
    }

    private function CreateWebHookScript()
    {
        $Script = '<?
//Do not delete or modify.
Doorbird_ProcessHookDataOLD(' . $this->InstanceID . ');		
?>';
        return $Script;
    }

    private function CreateSnapshotScript()
    {
        $Script = '<?
//Do not delete or modify.
Doorbird_GetSnapshot(' . $this->InstanceID . ');		
?>';
        return $Script;
    }

    private function CreateRingPictureScript()
    {
        $Script = '<?
//Do not delete or modify.
Doorbird_GetRingPicture(' . $this->InstanceID . ');		
?>';
        return $Script;
    }

    private function CreateEmailAlertScript($email)
    {
        $Script = '<?
//Do not delete or modify.
Doorbird_EmailAlert(' . $this->InstanceID . ', ' . $email . ');		
?>';
        return $Script;
    }

    private function SetSnapshotEvent(int $IDSnapshot)
    {
        //prüfen ob Event existent
        $ParentID = $IDSnapshot;

        $EreignisID = @($this->GetIDForIdent('EventGetDoorbirdSnapshot'));
        if ($EreignisID === false) {
            $EreignisID = IPS_CreateEvent(0);
            IPS_SetName($EreignisID, 'GetDoorbirdSnapshot');
            IPS_SetIdent($EreignisID, 'EventGetDoorbirdSnapshot');
            IPS_SetEventTrigger($EreignisID, 0, $this->GetIDForIdent('LastMovement'));   //bei Variablenaktualisierung
            IPS_SetParent($EreignisID, $ParentID);
            IPS_SetEventActive($EreignisID, true);             //Ereignis aktivieren
        } else {
            $this->SendDebug('Doorbird', 'Event für Snapshot mit ObjektID' . $EreignisID . ' gefunden', 0);
        }
    }

    private function SetRingEvent(int $IDRing)
    {
        //prüfen ob Event existent
        $ParentID = $IDRing;

        $EreignisID = @($this->GetIDForIdent('EventGetDoorbirdRingPic'));
        if ($EreignisID === false) {
            $EreignisID = IPS_CreateEvent(0);
            IPS_SetName($EreignisID, 'GetDoorbirdRingPic');
            IPS_SetIdent($EreignisID, 'EventGetDoorbirdRingPic');
            IPS_SetEventTrigger($EreignisID, 0, $this->GetIDForIdent('LastRingtone'));   //bei Variablenaktualisierung
            IPS_SetParent($EreignisID, $ParentID);
            IPS_SetEventActive($EreignisID, true);             //Ereignis aktivieren
        } else {
            $this->SendDebug('Doorbird', 'Event für Doorbird Ringpicture mit ObjektID' . $EreignisID . ' gefunden', 0);
        }
    }

    private function SetEmailEvent(int $IDEmail, bool $state)
    {
        //prüfen ob Event existent
        $ParentID = $IDEmail;

        //$EreignisID = @($this->GetIDForIdent('EventDoorbirdEmail'));
        $EreignisID = @IPS_GetObjectIDByIdent('EventDoorbirdEmail', $ParentID);
        if ($EreignisID === false) {
            $EreignisID = IPS_CreateEvent(0);
            IPS_SetName($EreignisID, 'Doorbird Email Alert');
            IPS_SetIdent($EreignisID, 'EventDoorbirdEmail');
            IPS_SetEventTrigger($EreignisID, 0, $this->GetIDForIdent('LastRingtone'));   //bei Variablenaktualisierung
            IPS_SetParent($EreignisID, $ParentID);
            IPS_SetEventActive($EreignisID, $state);             //Ereignis aktivieren	/ deaktivieren
        } else {
            //echo 'Die Ereignis-ID lautet: '. $EreignisID;
            IPS_SetEventActive($EreignisID, $state);             //Ereignis aktivieren	/ deaktivieren
        }

    }

    public function EmailAlert(string $email)
    {
        $emailalert   = $this->ReadPropertyBoolean('activeemail');
        $emailalert2  = $this->ReadPropertyBoolean('activeemail2');
        $emailalert3  = $this->ReadPropertyBoolean('activeemail3');
        $emailalert4  = $this->ReadPropertyBoolean('activeemail4');
        $emailalert5  = $this->ReadPropertyBoolean('activeemail5');
        $emailalert6  = $this->ReadPropertyBoolean('activeemail6');
        $emailalert7  = $this->ReadPropertyBoolean('activeemail7');
        $emailalert8  = $this->ReadPropertyBoolean('activeemail8');
        $emailalert9  = $this->ReadPropertyBoolean('activeemail9');
        $emailalert10 = $this->ReadPropertyBoolean('activeemail10');
        $emailalert11 = $this->ReadPropertyBoolean('activeemail11');
        if ($emailalert) {
            if ($email != '') {
                $email = $this->ReadPropertyString('email');
            }
            $subject   = $this->ReadPropertyString('subject');
            $emailtext = $this->ReadPropertyString('emailtext');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert2) {
            $email     = $this->ReadPropertyString('email2');
            $subject   = $this->ReadPropertyString('subject2');
            $emailtext = $this->ReadPropertyString('emailtext2');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert3) {
            $email     = $this->ReadPropertyString('email3');
            $subject   = $this->ReadPropertyString('subject3');
            $emailtext = $this->ReadPropertyString('emailtext3');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert4) {
            $email     = $this->ReadPropertyString('email4');
            $subject   = $this->ReadPropertyString('subject4');
            $emailtext = $this->ReadPropertyString('emailtext4');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert5) {
            $email     = $this->ReadPropertyString('email5');
            $subject   = $this->ReadPropertyString('subject5');
            $emailtext = $this->ReadPropertyString('emailtext5');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert6) {
            $email     = $this->ReadPropertyString('email6');
            $subject   = $this->ReadPropertyString('subject6');
            $emailtext = $this->ReadPropertyString('emailtext6');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert7) {
            $email     = $this->ReadPropertyString('email7');
            $subject   = $this->ReadPropertyString('subject7');
            $emailtext = $this->ReadPropertyString('emailtext7');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert8) {
            $email     = $this->ReadPropertyString('email8');
            $subject   = $this->ReadPropertyString('subject8');
            $emailtext = $this->ReadPropertyString('emailtext8');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert9) {
            $email     = $this->ReadPropertyString('email9');
            $subject   = $this->ReadPropertyString('subject9');
            $emailtext = $this->ReadPropertyString('emailtext9');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert10) {
            $email     = $this->ReadPropertyString('email10');
            $subject   = $this->ReadPropertyString('subject10');
            $emailtext = $this->ReadPropertyString('emailtext10');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        } elseif ($emailalert11) {
            $email     = $this->ReadPropertyString('email11');
            $subject   = $this->ReadPropertyString('subject11');
            $emailtext = $this->ReadPropertyString('emailtext11');
            $this->SendSMTPEmail($email, $subject, $emailtext);
        }
    }

    protected function SendSMTPEmail($email, $subject, $emailtext)
    {
        $catid    = $this->ReadPropertyInteger('categoryhistory');
        $mediaids = IPS_GetChildrenIDs($catid);
        // $countmedia = count($mediaids);
        foreach ($mediaids as $key => $mediaid) {
            $mediainfo = IPS_GetMedia($mediaid);
            if ($mediainfo['MediaFile'] == 'media/doorbirdringpic_1.jpg') {
                $mailer = $this->ReadPropertyInteger('smtpmodule');
                SMTP_SendMailMediaEx($mailer, $email, $subject, $emailtext, $mediaid);
            }
        }
    }

    public function ProcessHookDataOLD()
    {
        $webhookusername = $this->ReadPropertyString('webhookusername');
        $webhookpassword = $this->ReadPropertyString('webhookpassword');
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            $_SERVER['PHP_AUTH_USER'] = '';
        }
        if (!isset($_SERVER['PHP_AUTH_PW'])) {
            $_SERVER['PHP_AUTH_PW'] = '';
        }

        if (($_SERVER['PHP_AUTH_USER'] != $webhookusername) || ($_SERVER['PHP_AUTH_PW'] != $webhookpassword)) {
            header('WWW-Authenticate: Basic Realm="Doorbird WebHook"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Authorization required';
            return;
        }
        echo 'Webhook Doorbird IP-Symcon';

        //workaround for bug
        if (!isset($_IPS)) {
            global $_IPS;
        }
        if ($_IPS['SENDER'] == 'Execute') {
            echo 'This script cannot be used this way.';
            return;
        }
        //Auswerten von Events von Doorbird
        // Doorbird nutzt GET
        if (isset($_GET['doorbirdevent'])) {
            $data = $_GET['doorbirdevent'];
            if ($data == 'doorbell111') {
                $this->SetLastRingtone(1);
            } elseif ($data == 'doorbell211') {
                $this->SetLastRingtone(2);
            } elseif ($data == 'doorbell311') {
                $this->SetLastRingtone(3);
            } elseif ($data == 'motionsensor') {
                $this->SetLastMovement();
            } elseif ($data == 'dooropen') {
                $this->SetLastDoorOpen(1);
            } elseif ($data == 'dooropen2') {
                $this->SetLastDoorOpen(2);
            }
        }
    }

    /**
     * This function will be called by the hook control. Visibility should be protected!
     */
    protected function ProcessHookData()
    {
        $webhookusername = $this->ReadPropertyString('webhookusername');
        $webhookpassword = $this->ReadPropertyString('webhookpassword');
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            $_SERVER['PHP_AUTH_USER'] = '';
            $this->SendDebug('Doorbird:', 'Webhook user is empty', 0);
        }
        if (isset($_SERVER['PHP_AUTH_USER'])) {
            $this->SendDebug('Doorbird Recieve:', 'webhook user: ' . $_SERVER['PHP_AUTH_USER'], 0);
        }
        if (!isset($_SERVER['PHP_AUTH_PW'])) {
            $_SERVER['PHP_AUTH_PW'] = '';
            $this->SendDebug('Doorbird:', 'Webhook password is empty', 0);
        }
        if (isset($_SERVER['PHP_AUTH_PW'])) {
            $this->SendDebug('Doorbird Recieve:', 'webhook password: ' . $_SERVER['PHP_AUTH_PW'], 0);
        }

        if (($_SERVER['PHP_AUTH_USER'] != $webhookusername) || ($_SERVER['PHP_AUTH_PW'] != $webhookpassword)) {
            $this->SendDebug('Doorbird:', 'wrong webhook user or password', 0);
            header('WWW-Authenticate: Basic Realm="Doorbird WebHook"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Authorization required';
            return;
        }
        echo 'Webhook Doorbird IP-Symcon';

        //workaround for bug
        if (!isset($_IPS)) {
            global $_IPS;
        }
        if ($_IPS['SENDER'] == 'Execute') {
            echo 'This script cannot be used this way.';
            return;
        }
        //Auswerten von Events von Doorbird
        // Doorbird nutzt GET
        if (isset($_GET['doorbirdevent'])) {
            $this->SendDebug('Doorbird:', json_encode($_GET), 0);
            $data = $_GET['doorbirdevent'];
            if ($data == 'doorbell111') {
                $this->SetLastRingtone(1);
            } elseif ($data == 'doorbell211') {
                $this->SetLastRingtone(2);
            } elseif ($data == 'doorbell311') {
                $this->SetLastRingtone(3);
            } elseif ($data == 'motionsensor') {
                $this->SetLastMovement();
            } elseif ($data == 'dooropen') {
                $this->SetLastDoorOpen(1);
            } elseif ($data == 'dooropen2') {
                $this->SetLastDoorOpen(2);
            }
        }
    }

    //Profile zuweisen und Geräte anlegen
    public function SetupNotification()
    {
        $sip = [];
        $http = [];
        $favorites = $this->GetFavorites();
        if($favorites)
        {
            $data = json_decode($favorites, true);
            $sip = $data['sip'];
            $http = $data['http'];
        }
        if(!empty($sip))
        {
            foreach ($sip as $key => $sipclient) {
                $this->SendDebug('Doorbird SIP Title', $sipclient['title'], 0);
                $this->SendDebug('Doorbird SIP Value', $sipclient['value'], 0);
                $this->SendDebug('Doorbird SIP Key', $key, 0);
            }
        }
        $webhook_call_motion      = $this->GetFavoritURL('motionsensor');
        $webhook_call_doorbell111 = $this->GetFavoritURL('doorbell111');
        $webhook_call_doorbell211 = $this->GetFavoritURL('doorbell211');
        $webhook_call_doorbell311 = $this->GetFavoritURL('doorbell311');
        $webhook_call_dooropen    = $this->GetFavoritURL('dooropen');
        $webhook_call_dooropen2   = $this->GetFavoritURL('dooropen2');
        $duplicate_motionsensor   = false;
        $duplicate_dooropen       = false;
        $duplicate_dooropen2      = false;
        $duplicate_doorbell111    = false;
        $duplicate_doorbell112    = false;
        $duplicate_doorbell113    = false;
        if(!empty($http))
        {
            foreach ($http as $key => $http_call) {
                $this->SendDebug('Doorbird HTTP Key', $key, 0);
                $this->SendDebug('Doorbird HTTP Title', $http_call['title'], 0);
                $this->SendDebug('Doorbird HTTP Value', $http_call['value'], 0);
                if (($webhook_call_motion == $http_call['value'] && $duplicate_motionsensor == true)
                    || ($webhook_call_doorbell111 == $http_call['value']
                        && $duplicate_doorbell111 == true)
                    || ($webhook_call_doorbell211 == $http_call['value'] && $duplicate_doorbell112 == true)
                    || ($webhook_call_doorbell311 == $http_call['value'] && $duplicate_doorbell113 == true)
                    || ($webhook_call_dooropen == $http_call['value'] && $duplicate_dooropen == true)
                    || ($webhook_call_dooropen2 == $http_call['value'] && $duplicate_dooropen2 == true)) {
                    $this->SendDebug('Doorbird HTTP Delete Key', $key, 0);
                    $this->DeleteFavorites($key, 'http');
                }
                if ($webhook_call_motion == $http_call['value']) {
                    $duplicate_motionsensor = true;
                }
                if ($webhook_call_doorbell111 == $http_call['value']) {
                    $duplicate_doorbell111 = true;
                }
                if ($webhook_call_doorbell211 == $http_call['value']) {
                    $duplicate_doorbell112 = true;
                }
                if ($webhook_call_doorbell311 == $http_call['value']) {
                    $duplicate_doorbell113 = true;
                }
                if ($webhook_call_dooropen == $http_call['value']) {
                    $duplicate_dooropen = true;
                }
                if ($webhook_call_dooropen2 == $http_call['value']) {
                    $duplicate_dooropen2 = true;
                }
            }
        }
        //doorbell add favorites
        if (!$duplicate_doorbell111) {
            $this->AddHTTPFavorite('IPSDoorbell', 'doorbell111', '111 IPSDoorbell');
            IPS_Sleep(300);
        }
        //motionsensor
        if (!$duplicate_motionsensor) {
            $this->AddHTTPFavorite('IPSMotionsensor', 'motionsensor', 'IPSMotionsensor');
            IPS_Sleep(300);
        }
        //dooropen
        if (!$duplicate_dooropen) {
            $this->AddHTTPFavorite('IPSDooropen', 'dooropen', 'IPSDooropen');
            IPS_Sleep(300);
        }
        $model = $this->ReadPropertyInteger('model');
        if ($model == self::D2101V || $model == self::D2102V || $model == self::D2103V) {
            if (!$duplicate_dooropen2) {
                $this->AddHTTPFavorite('IPSDooropen2', 'dooropen2', 'IPSDooropen2');
                IPS_Sleep(300);
            }
        }
        if ($model == self::D2102V || $model == self::D2103V) {
            if (!$duplicate_doorbell112) {
                $this->AddHTTPFavorite('IPSDoorbell2', 'doorbell211', '211 IPSDoorbell2');
                IPS_Sleep(300);
            }
        }
        if ($model == self::D2103V) {
            if (!$duplicate_doorbell113) {
                $this->AddHTTPFavorite('IPSDoorbell3', 'doorbell311', '311 IPSDoorbell3');
                IPS_Sleep(300);
            }
        }
        $schedule = $this->GetSchedule();
        if ($schedule) {
            $data = json_decode($schedule);
            if (is_null($data)) {
                $this->SendDebug('Doorbird', 'could not get schedule', 0);
                echo 'could not get schedule';
            } else {
                foreach ($data as $key => $entry) {
                    if ($entry->input == 'doorbell') {
                        $output = $entry->output;
                        $this->SendDebug('Doorbird doorbell', json_encode($output), 0);
                        $this->SendDebug('Doorbird', 'create schedule with favorite 112', 0);
                        foreach ($output as $outputentry) {
                            $event = $outputentry->event;
                            $param = $outputentry->param;
                            if ($event == 'http' && $param == '111') {
                                $this->SendDebug('Doorbird', 'schedule with favorite 111 exists', 0);
                            } else {
                                $this->SendDebug('Doorbird', 'create schedule with favorite 111', 0);
                                $this->AddHTTPDoorbellSchedule();
                            }
                        }
                    }
                    if ($entry->input == 'motion') {
                        $output = $entry->output;
                        $this->SendDebug('Doorbird motion', json_encode($output), 0);
                        foreach ($output as $outputentry) {
                            $event = $outputentry->event;
                            $param = $outputentry->param;
                            if ($event == 'http' && $param == '112') {
                                $this->SendDebug('Doorbird', 'schedule with favorite 112 exists', 0);
                            } else {
                                $this->SendDebug('Doorbird', 'create schedule with favorite 112', 0);
                                $this->AddHTTPMotionSchedule();
                            }
                        }
                    }
                }
                $current_schedule = $this->GetSchedule();
                $this->WriteAttributeString('schedule', $current_schedule);
            }
        }
    }

    public function GetFavorites()
    {
        $URL       = self::GET_FAVORITES;
        $favorites = $this->SendDoorbird($URL);
        return $favorites;
    }

    public function DeleteFavorites(int $id, string $type)
    {
        $URL    = self::DELETE_FAVORITE . $type . '&id=' . $id;
        $result = $this->SendDoorbird($URL);
        return $result;
    }

    public function AddHTTPFavorite(string $title, string $event, string $message)
    {
        $event_value = $this->GetEventValue();
        $URL         = self::SET_HTTP_FAVORITE . $title . $event_value . $event;
        $this->SendDebug('Doorbird', 'Add Favorite ' . $message, 0);
        $result = $this->SendDoorbird($URL);
        return $result;
    }

    private function GetEventValue()
    {
        $event_value = '&value=' . $this->GetEventValueURL();
        return $event_value;
    }

    private function GetFavoritURL($event)
    {
        $url = $this->GetEventValueURL() . $event;
        return $url;
    }

    private function GetEventValueURL()
    {
        $hostips         = $this->ReadPropertyString('IPSIP');
        $portips         = $this->ReadPropertyInteger('PortIPS');
        $webhookusername = $this->ReadPropertyString('webhookusername');
        $webhookpassword = $this->ReadPropertyString('webhookpassword');
        $prefixips       = $this->GetURLPrefix($hostips);
        $url             =
            $prefixips . $webhookusername . ':' . $webhookpassword . '@' . $hostips . ':' . $portips . '/hook/doorbird' . $this->InstanceID
            . '?doorbirdevent=';
        return $url;
    }

    private function GetDoorbirdURL()
    {
        $hostdoorbird   = $this->ReadPropertyString('Host');
        $portdoorbell   = $this->ReadPropertyInteger('PortDoorbell');
        $prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
        $Doorbird_URL   = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell;
        return $Doorbird_URL;
    }

    public function SendDoorbird(string $URL)
    {
        $doorbirduser     = $this->ReadPropertyString('User');
        $doorbirdpassword = $this->ReadPropertyString('Password');
        $Doorbird_URL     = $this->GetDoorbirdURL() . $URL;
        $this->SendDebug('Doorbird URL', $Doorbird_URL, 0);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Doorbird_URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); //timeout after 5 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$doorbirduser:$doorbirdpassword");
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        $this->SendDebug('Doorbird', 'Status Code ' . $status_code, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function GetSchedule()
    {
        $URL    = self::GET_SCHEDULE;
        $result = $this->SendDoorbird($URL);
        $this->SendDebug('Doorbird Schedule', $result, 0);
        return $result;
    }

    public function AddSchedule(string $schedule)
    {
        $URL    = self::GET_SCHEDULE;
        $result = $this->SendDoorbirdPOST($URL, $schedule);
        return $result;
    }

    protected function AddHTTPDoorbellSchedule()
    {
        $postdata  = [
            'input'  => 'doorbell',
            'param'  => '1',
            'output' => [
                [
                    'enabled'  => '1',
                    'event'    => 'notify',
                    'param'    => '',
                    'schedule' => [
                        'weekdays' => [
                            [
                                'from' => '0',
                                'to'   => '604799']]]],
                [
                    'enabled'  => '1',
                    'event'    => 'http',
                    'param'    => '0',
                    'schedule' => [
                        'weekdays' => [
                            [
                                'from' => '0',
                                'to'   => '604799']]]]]];
        $data_json = json_encode($postdata);
        $result    = $this->AddSchedule($data_json);
        return $result;
    }

    protected function AddHTTPMotionSchedule()
    {
        $postdata  = [
            'input'  => 'motion',
            'param'  => '',
            'output' => [
                [
                    'enabled'  => '1',
                    'event'    => 'notify',
                    'param'    => '',
                    'schedule' => [
                        'weekdays' => [
                            [
                                'from' => '0',
                                'to'   => '604799']]]],
                [
                    'enabled'  => '1',
                    'event'    => 'http',
                    'param'    => '1',
                    'schedule' => [
                        'weekdays' => [
                            [
                                'from' => '0',
                                'to'   => '604799']]]]]];
        $data_json = json_encode($postdata);
        $result    = $this->AddSchedule($data_json);
        return $result;
    }

    protected function SendDoorbirdPOST(string $URL, string $data_json)
    {
        $doorbirduser     = $this->ReadPropertyString('User');
        $doorbirdpassword = $this->ReadPropertyString('Password');
        $Doorbird_URL     = $this->GetDoorbirdURL() . $URL;
        $this->SendDebug('Doorbird URL', $Doorbird_URL, 0);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Doorbird_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Content-Length: ' . strlen($data_json)]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$doorbirduser:$doorbirdpassword");
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        $this->SendDebug('Doorbird Status Code', $status_code, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function GetInfo()
    {
        $URL    = self::GET_INFO;
        $result = $this->SendDoorbird($URL);
        $this->SendDebug('Doorbird Info:', $result, 0);
        $result = json_decode($result);
        if (isset($result->BHA->VERSION[0]->FIRMWARE)) {
            $firmware = $result->BHA->VERSION[0]->FIRMWARE;
            $this->SetValue('FirmwareVersion', $firmware);
        }
        if (isset($result->BHA->VERSION[0]->BUILD_NUMBER)) {
            $buildnumber = $result->BHA->VERSION[0]->BUILD_NUMBER;
            $this->SetValue('Buildnumber', $buildnumber);
        }
        if (isset($result->BHA->VERSION[0]->WIFI_MAC_ADDR)) {
            $wifimacaddr = $result->BHA->VERSION[0]->WIFI_MAC_ADDR;
            $this->SetValue('MACAdress', $wifimacaddr);
        }
        return $result;
    }

    public function GetHistory()
    {
        $name        = 'Doorbird Klingel';
        $ident       = 'DoorbirdRingPic';
        $picturename = 'doorbirdringpic_';
        for ($i = 1; $i <= 20; $i++) {
            $URL     = self::GET_HISTORY . $i;
            $Content = $this->SendDoorbird($URL);

            //testen ob im Medienpool existent
            $catid = $this->ReadPropertyInteger('categoryhistory');

            $MediaID = @IPS_GetObjectIDByIdent($ident . $i, $catid);
            if ($MediaID === false) {
                $MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
                IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie Historie
                IPS_SetIdent($MediaID, $ident . $i);
                IPS_SetPosition($MediaID, $i);
                IPS_SetMediaCached($MediaID, true);
                // Das Cachen für das Mediaobjekt wird aktiviert.
                // Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
                // und zukünftig nur noch im Arbeitsspeicher verarbeitet.
                $ImageFile = IPS_GetKernelDir() . 'media' . DIRECTORY_SEPARATOR . $picturename . $i . '.jpg';  // Image-Datei
                IPS_SetMediaFile($MediaID, $ImageFile, false);    // Image im MedienPool mit Image-Datei verbinden
                //$savetime = date('d.m.Y H:i:s');
                //IPS_SetName($MediaID, $name.' '.$i.' '.$savetime); // Medienobjekt benennen
                IPS_SetName($MediaID, $name . ' ' . $i); // Medienobjekt benennen
                //IPS_SetInfo ($MediaID, $savetime);
                IPS_SetMediaContent($MediaID, base64_encode($Content));  //Bild Base64 codieren und ablegen
                IPS_SendMediaEvent($MediaID); //aktualisieren
            } else {
                //$savetime = date('d.m.Y H:i:s');
                //IPS_SetName($MediaID, $name.' '.$currentsnapshotid.' '.$savetime); // Medienobjekt benennen
                //IPS_SetInfo ($MediaID, $savetime);
                IPS_SetMediaContent($MediaID, base64_encode($Content));  //Bild Base64 codieren und ablegen
                IPS_SendMediaEvent($MediaID); //aktualisieren
            }
            IPS_Sleep(200);
        }
    }

    public function GetSnapshot()
    {
        $name         = 'Doorbird Snapshot';
        $ident        = 'DoorbirdSnapshotPic';
        $picturename  = 'doorbirdsnapshot_';
        $picturelimit = $this->ReadPropertyInteger('picturelimitsnapshot');
        $catid        = $this->ReadPropertyInteger('categorysnapshot');
        if ($catid > 0) {
            $this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid);
        } else {
            $this->SendDebug('Doorbird', 'No category is set, please set category.', 0);
            $this->LogMessage('Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.', KL_DEBUG);
            echo 'Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.';
        }
    }

    public function GetRingPicture()
    {
        $this->SetRingPicture(1);
    }

    private function SetRingPicture($ring_category)
    {
        $name         = 'Doorbird Klingel';
        $picturelimit = $this->ReadPropertyInteger('picturelimitring');
        $catid        = $this->ReadPropertyInteger('categoryhistory');
        if ($catid > 0) {
            $model = $this->ReadPropertyInteger('model');
            if ($model == self::D101 || $model == self::D202 || $model == self::D2101V || $model == self::D21DKV || $model == self::D21DKH) {
                $ring_category_1 = $this->CreateRingCategory(1);
            }
            if ($model == self::D2102V) {
                $ring_category_1 = $this->CreateRingCategory(1);
                $ring_category_2 = $this->CreateRingCategory(2);
            }
            if ($model == self::D2103V) {
                $ring_category_1 = $this->CreateRingCategory(1);
                $ring_category_2 = $this->CreateRingCategory(2);
                $ring_category_3 = $this->CreateRingCategory(3);
            }
            if($ring_category == 1)
            {
                $ident        = 'DoorbirdRing1Pic';
                $picturename  = 'doorbirdring1pic_';
                $this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $ring_category_1);
            }
            if($ring_category == 2)
            {
                $ident        = 'DoorbirdRing2Pic';
                $picturename  = 'doorbirdring2pic_';
                $this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $ring_category_2);
            }
            if($ring_category == 3)
            {
                $ident        = 'DoorbirdRing3Pic';
                $picturename  = 'doorbirdring3pic_';
                $this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $ring_category_3);
            }
        } else {
            $this->SendDebug('Doorbird', 'No category is set, please set category.', 0);
            $this->LogMessage('Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.', KL_DEBUG);
            echo 'Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.';
        }
    }

    protected function CreateRingCategory($ring_category)
    {
        $categoryhistory = $this->ReadPropertyInteger('categoryhistory');
        //Prüfen ob Kategorie schon existiert
        $RingPictureCategoryID = @IPS_GetObjectIDByIdent('Cat_Doorbird_Ringpicture' . $ring_category, $categoryhistory);
        if ($RingPictureCategoryID === false) {
            $RingPictureCategoryID = IPS_CreateCategory();
            IPS_SetName($RingPictureCategoryID, $this->Translate('Ring Pictures ' . $ring_category));
            IPS_SetIdent($RingPictureCategoryID, 'Cat_Doorbird_Ringpicture' . $ring_category);
            IPS_SetInfo($RingPictureCategoryID, $this->Translate('Ring Pictures ' . $ring_category));
            IPS_SetParent($RingPictureCategoryID, $categoryhistory);
        }
        $this->SendDebug('Ring Picture Category', strval($RingPictureCategoryID), 0);
        return $RingPictureCategoryID;
    }

    private function GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid)
    {
        $URL     = self::GET_IMAGE;
        $Content = $this->SendDoorbird($URL);
        //lastsnapshot bestimmen
        $mediaids     = IPS_GetChildrenIDs($catid);
        $countmedia   = count($mediaids);
        $lastsnapshot = $countmedia;
        if ($lastsnapshot == $picturelimit) {
            //neu beschreiben und Bilder um +1 neu zuordnen
            //Images base 64 codiert in allmedia einlesen

            $allmedia = $this->GetallImages($mediaids);
            if ($allmedia) {
                $lastmediaid = array_search($picturelimit, array_column($allmedia, 'picid'));
                unset($allmedia[$lastmediaid]);
                //Neues Bild zu allmedia hinzufügen
                $allmedia = $this->AddCurrentPic($allmedia, $mediaids, $Content);
                //allmedia schreiben
                $this->SaveImagestoPicSlot($allmedia, $ident, $name, $catid);
            } else {
                $this->SendDebug('Doorbird', 'No media image found', 0);
            }
        } else {
            // neues Mediaobjekt anlegen
            //testen ob im Medienpool existent
            $currentsnapshotid = $lastsnapshot + 1;
            $MediaID           = @IPS_GetObjectIDByIdent($ident . $currentsnapshotid, $catid);
            if ($MediaID === false) {
                $MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
                IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie
                IPS_SetIdent($MediaID, $ident . $currentsnapshotid);
                IPS_SetPosition($MediaID, $currentsnapshotid);
                IPS_SetMediaCached($MediaID, true);
                // Das Cachen für das Mediaobjekt wird aktiviert.
                // Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
                // und zukünftig nur noch im Arbeitsspeicher verarbeitet.
                $ImageFile = IPS_GetKernelDir() . 'media' . DIRECTORY_SEPARATOR . $picturename . $currentsnapshotid . '.jpg';  // Image-Datei
                IPS_SetMediaFile($MediaID, $ImageFile, false);    // Image im MedienPool mit Image-Datei verbinden

                if ($currentsnapshotid == 1) {
                    //Auf Position 1 anlegen und beschreiben
                    $savetime = date('d.m.Y H:i:s');
                    IPS_SetName($MediaID, $name . ' ' . $currentsnapshotid . ' ' . $savetime); // Medienobjekt benennen
                    IPS_SetInfo($MediaID, $savetime);
                    IPS_SetMediaContent($MediaID, base64_encode($Content));  //Bild Base64 codieren und ablegen
                    IPS_SendMediaEvent($MediaID); //aktualisieren
                } else {
                    //Array auslesen und Bilder +1 neu zuordnen
                    //Images base 64 codiert in allmedia einlesen
                    $allmedia = $this->GetallImages($mediaids);
                    if ($allmedia) {
                        //Neues Bild zu allmedia hinzufügen
                        $allmedia = $this->AddCurrentPic($allmedia, $mediaids, $Content);
                        //allmedia schreiben
                        $this->SaveImagestoPicSlot($allmedia, $ident, $name, $catid);
                    } else {
                        $this->SendDebug('Doorbird', 'No media image found', 0);
                    }
                }

            }
        }
    }

    private function GetallImages($mediaids)
    {
        $countmedia = count($mediaids);
        if ($countmedia > 0) {
            $allmedia = [];
            for ($i = 0; $i <= ($countmedia - 1); $i++) {
                $mediakey = IPS_GetObject($mediaids[$i])['ObjectIdent'];
                $mediakey = explode('Pic', $mediakey);
                $mediakey = intval($mediakey[1]);
                //$name = IPS_GetName($mediaids[$i]);
                //$name = explode(' ', $name);
                //$savedate = $name[3];
                //$savetime = $name[4];
                //$saveinfo =  $savedate.' '.$savetime;
                $saveinfo                    = IPS_GetObject($mediaids[$i])['ObjectInfo'];
                $allmedia[$i]['objid']       = $mediaids[$i];
                $allmedia[$i]['picid']       = $mediakey;
                $allmedia[$i]['saveinfo']    = $saveinfo;
                $allmedia[$i]['imagebase64'] = IPS_GetMediaContent($mediaids[$i]); //base64 codiert

            }
        } else {
            $allmedia = false;
        }

        return $allmedia;

    }

    private function SaveImagestoPicSlot($allmedia, $ident, $name, $catid)
    {

        foreach ($allmedia as $media) {
            $picid    = $media['picid'];
            $newpicid = $picid + 1;
            $mediaid  = @IPS_GetObjectIDByIdent($ident . $newpicid, $catid);
            if ($mediaid) {
                $saveinfo    = $media['saveinfo'];
                $imagebase64 = $media['imagebase64'];
                IPS_SetMediaContent($mediaid, $imagebase64);  //Bild Base64 codiert ablegen
                IPS_SetName($mediaid, $name . ' ' . $newpicid . ' ' . $saveinfo); // Medienobjekt benennen
                IPS_SetInfo($mediaid, $saveinfo);
                IPS_SendMediaEvent($mediaid); //aktualisieren
            } else {
                $this->SendDebug('Doorbird', 'No picture with ident ' . $ident . $newpicid . ' found', 0);
            }
        }
    }

    private function AddCurrentPic($allmedia, $mediaids, $Content)
    {
        $lastid = count($allmedia);

        // Neues Bild ergänzen
        $allmedia[$lastid]['objid']       = $mediaids[0];
        $allmedia[$lastid]['picid']       = 0;
        $saveinfo                         = date('d.m.Y H:i:s');
        $allmedia[$lastid]['saveinfo']    = $saveinfo;
        $allmedia[$lastid]['imagebase64'] = base64_encode($Content);  //Bild Base64 codieren und ablegen;
        return $allmedia;
    }

    public function Light()
    {
        $URL    = self::LIGHT;
        $result = $this->SendDoorbird($URL);
        return $result;
    }

    public function OpenDoor()
    {
        $URL    = self::OPEN_DOOR;
        $result = $this->SendDoorbird($URL);
        return $result;
    }

    public function OpenDoorRelais(string $doorcontrollerID, int $relaisnumber)
    {
        $URL    = self::OPEN_DOOR . '?r=' . $doorcontrollerID . '@' . $relaisnumber;
        $result = $this->SendDoorbird($URL);
        return $result;
    }

    public function OpenDoorRelaisNumber(int $relaisnumber)
    {
        $URL    = self::OPEN_DOOR . '?r=' . $relaisnumber;
        $result = $this->SendDoorbird($URL);
        return $result;
    }

    /** Request Action
     *
     * @param $Ident
     * @param $Value
     *
     * @return bool|void
     */
    public function RequestAction($Ident, $Value)
    {
        switch ($Ident) {
            case 'DoorbirdButtonLight':
                $this->Light();
                break;
            case 'DoorbirdButtonDoor':
                $this->OpenDoor();
                break;
            case 'DoorbirdButtonSnapshot':
                $this->GetSnapshot();
                break;
            default:
                $this->SendDebug('Doorbird', 'Invalid ident', 0);
        }
    }

    //Profile
    protected function RegisterProfileIntegerDoorbird($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize, $Digits)
    {

        if (!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 1);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if ($profile['ProfileType'] != 1) {
                $this->SendDebug('Doorbird', 'Variable profile type does not match for profile ' . $Name, 0);
            }
        }

        IPS_SetVariableProfileIcon($Name, $Icon);
        IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
        IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
        IPS_SetVariableProfileValues(
            $Name, $MinValue, $MaxValue, $StepSize
        ); // string $ProfilName, float $Minimalwert, float $Maximalwert, float $Schrittweite
    }

    protected function RegisterProfileIntegerDoorbirdAss($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Associations)
    {
        if (count($Associations) === 0) {
            $MinValue = 0;
            $MaxValue = 0;
        }
        $this->RegisterProfileIntegerDoorbird($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits);

        //boolean IPS_SetVariableProfileAssociation ( string $ProfilName, float $Wert, string $Name, string $Icon, integer $Farbe )
        foreach ($Associations as $Association) {
            IPS_SetVariableProfileAssociation($Name, $Association[0], $Association[1], $Association[2], $Association[3]);
        }
    }

    protected function RegisterProfileStringDoorbird($Name, $Icon)
    {

        if (!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 3);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if ($profile['ProfileType'] != 3) {
                $this->SendDebug('Doorbird', 'Variable profile type does not match for profile ' . $Name, 0);
            }
        }

        IPS_SetVariableProfileIcon($Name, $Icon);
        //IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
        //IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize);
    }

    protected function GetIPSVersion()
    {
        $ipsversion = floatval(IPS_GetKernelVersion());
        if ($ipsversion < 4.1) // 4.0
        {
            $ipsversion = 0;
        } elseif ($ipsversion >= 4.1 && $ipsversion < 4.2) // 4.1
        {
            $ipsversion = 1;
        } elseif ($ipsversion >= 4.2 && $ipsversion < 4.3) // 4.2
        {
            $ipsversion = 2;
        } elseif ($ipsversion >= 4.3 && $ipsversion < 4.4) // 4.3
        {
            $ipsversion = 3;
        } elseif ($ipsversion >= 4.4 && $ipsversion < 5) // 4.4
        {
            $ipsversion = 4;
        } else   // 5
        {
            $ipsversion = 5;
        }

        return $ipsversion;
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
        return json_encode(
            [
                'elements' => $this->FormHead(),
                'actions'  => $this->FormActions(),
                'status'   => $this->FormStatus()]
        );
    }

    /**
     * return form configurations on configuration step.
     *
     * @return array
     */
    protected function FormHead()
    {
        $form = [
            [
                'type'  => 'Image',
                'image' => 'data:image/png;base64, ' . self::PICTURE_LOGO_DOORBIRD],
            [
                'type'    => 'Select',
                'name'    => 'model',
                'caption' => 'Type',
                'options' => [
                    [
                        'label' => 'Please select a device type',
                        'value' => 0],
                    [
                        'label' => 'D101',
                        'value' => self::D101],
                    [
                        'label' => 'D202',
                        'value' => self::D202],
                    [
                        'label' => 'D2101V',
                        'value' => self::D2101V],
                    [
                        'label' => 'D2102V',
                        'value' => self::D2102V],
                    [
                        'label' => 'D2103V',
                        'value' => self::D2103V],
                    [
                        'label' => 'D21DKV',
                        'value' => self::D21DKV],
                    [
                        'label' => 'D21DKH',
                        'value' => self::D21DKH]]

            ]];

        //Check if notification setup is already done. Otherwise show a button to create it
        $doorbirdreturn = $this->ReadAttributeString('schedule');
        if ($doorbirdreturn == '[]') {
            $form = array_merge_recursive(
                $form, [
                    [
                        'type'  => 'Label',
                        'label' => 'Please fill in all fields in this form and then press the button below for the notification setup of the Doorbird for IP-Symcon'],
                    [
                        'type'  => 'Label',
                        'label' => 'Setup notifications from doorbird to IP-Symcon'],
                    [
                        'type'    => 'Button',
                        'label'   => 'Setup notifications from doorbird to IP-Symcon',
                        'onClick' => 'Doorbird_SetupNotification($id);']]
            );
        }
        $form = array_merge_recursive(
            $form, [
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'Doorbird Settings',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'IP adress or hostname Doorbird'],
                        [
                            'name'    => 'Host',
                            'type'    => 'ValidationTextBox',
                            'caption' => 'IP Doorbird'],
                        [
                            'type'  => 'Label',
                            'label' => 'port of Doorbell'],
                        [
                            'name'    => 'PortDoorbell',
                            'type'    => 'NumberSpinner',
                            'caption' => 'Port Doorbell']]],
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'Doorbird login credentials',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'Doorbird user with authorization as API-Operator'],
                        [
                            'name'    => 'User',
                            'type'    => 'ValidationTextBox',
                            'caption' => 'User'],
                        [
                            'name'    => 'Password',
                            'type'    => 'PasswordTextBox',
                            'caption' => 'Password']]],
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'Doorbird Picture Settings',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'category for doorbird ring pictures, please create first a category in the objekt tree of IP-Symcon and then select it in the field below'],
                        [
                            'type'  => 'Label',
                            'label' => 'doorbird ring pictures category'],
                        [
                            'name'    => 'categoryhistory',
                            'type'    => 'SelectCategory',
                            'caption' => 'ring pictures'],
                        [
                            'type'  => 'Label',
                            'label' => 'picture limit for doorbird ring pictures'],
                        [
                            'name'    => 'picturelimitring',
                            'type'    => 'NumberSpinner',
                            'caption' => 'limit ring pictures'],
                        [
                            'type'  => 'Label',
                            'label' => 'category for doorbird snapshots pictures, please create first a category in the objekt tree of IP-Symcon and then select it in the field below'],
                        [
                            'type'  => 'Label',
                            'label' => 'doorbird snapshot pictures category'],
                        [
                            'name'    => 'categorysnapshot',
                            'type'    => 'SelectCategory',
                            'caption' => 'snapshot pictures'],
                        [
                            'type'  => 'Label',
                            'label' => 'picture limit for doorbird snapshots pictures'],
                        [
                            'name'    => 'picturelimitsnapshot',
                            'type'    => 'NumberSpinner',
                            'caption' => 'limit snapshots']]],
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'IP Symcon Settings',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'IP adress IP-Symcon Server'],
                        [
                            'name'    => 'IPSIP',
                            'type'    => 'ValidationTextBox',
                            'caption' => 'IP adress'],
                        [
                            'type'  => 'Label',
                            'label' => 'port of IP-Symcon'],
                        [
                            'name'    => 'PortIPS',
                            'type'    => 'NumberSpinner',
                            'caption' => 'Port IPS']]],
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'notification preferences',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'parameter relaxation:  min 10s max 10000s'],
                        [
                            'type'  => 'Label',
                            'label' => 'notification activ for:'],
                        [
                            'name'    => 'doorbell',
                            'type'    => 'CheckBox',
                            'caption' => 'doorbell'],
                        [
                            'type'  => 'Label',
                            'label' => 'Relaxation time for doorbell (seconds)'],
                        [
                            'name'    => 'relaxationdoorbell',
                            'type'    => 'NumberSpinner',
                            'caption' => 'relaxation (s)'],
                        [
                            'name'    => 'motionsensor',
                            'type'    => 'CheckBox',
                            'caption' => 'motionsensor'],
                        [
                            'type'  => 'Label',
                            'label' => 'Relaxation time for motionsensor (seconds)'],
                        [
                            'name'    => 'relaxationmotionsensor',
                            'type'    => 'NumberSpinner',
                            'caption' => 'relaxation (s)'],
                        [
                            'name'    => 'dooropen',
                            'type'    => 'CheckBox',
                            'caption' => 'door open'],
                        [
                            'type'  => 'Label',
                            'label' => 'Relaxation time for dooropen (seconds)'],
                        [
                            'name'    => 'relaxationdooropen',
                            'type'    => 'NumberSpinner',
                            'caption' => 'relaxation (s)']]]]
        );
        $form = array_merge_recursive(
            $form, [
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'email notification settings',
                    'items'   => $this->FormShowEmail()]]
        );
        $form = array_merge_recursive(
            $form, [
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'alternative view',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'if there are problems with the live image in the webfront you can active alterative view'],
                        [
                            'name'    => 'altview',
                            'type'    => 'CheckBox',
                            'caption' => 'alternative view']]],
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'IP Symcon Webhook Settings',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'Connection from Doorbird to IP-Symcon'],
                        [
                            'type'  => 'Label',
                            'label' => 'authentication for Doorbird webhook'],
                        [
                            'name'    => 'webhookusername',
                            'type'    => 'ValidationTextBox',
                            'caption' => 'username'],
                        [
                            'name'    => 'webhookpassword',
                            'type'    => 'PasswordTextBox',
                            'caption' => 'Password']]]]
        );
        $form = array_merge_recursive(
            $form, [
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'Doorbird Favorites',
                    'items'   => $this->FormShowFavorites()]]
        );
        $form = array_merge_recursive(
            $form, [
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'Doorbird Schedule',
                    'items'   => $this->FormShowSchedule()],
                [
                    'type'    => 'ExpansionPanel',
                    'caption' => 'Webfront Doorbird App',
                    'items'   => [
                        [
                            'type'  => 'Label',
                            'label' => 'when viewing the webfront in a browser on an iOS or Android device, the Doorbird app can be optionally started from the webfront to talk to the visitor'],
                        [
                            'name'    => 'doorbird_app',
                            'type'    => 'CheckBox',
                            'caption' => 'Enable Variable for launching the Doorbird App']
                    ]]]
        );
        return $form;
    }

    protected function FormShowFavorites()
    {
        $result = $this->GetFavorites();
        $sip = [];
        $http = [];
        $rowcount_sip = 1;
        $rowcount_http = 1;
        if($result)
        {
            $data = json_decode($result, true);
            if(isset($data['sip']))
            {
                $sip = $data['sip'];
                $rowcount_sip = count($sip);
            }
            else
            {
                $rowcount_sip = 1;
            }
            if(isset($data['http']))
            {
                $http = $data['http'];
                $rowcount_http = count($http);

            }
            else
            {
                $rowcount_http = 1;
            }
        }
        $form = [
            [
                'type'     => 'List',
                'name'     => 'list_sip',
                'caption'  => 'SIP Numbers',
                'rowCount' => $rowcount_sip,
                'add'      => false,
                'delete'   => false,
                'sort'     => [
                    'column'    => 'ID',
                    'direction' => 'ascending'
                ],
                'columns' => [
                    [
                        'name'    => 'ID',
                        'caption' => 'ID',
                        'width'   => '100px',
                        'visible' => true
                    ],
                    [
                        'name'    => 'Title',
                        'caption' => 'Title',
                        'width'   => '370px',
                        'visible' => true
                    ],
                    [
                        'name'    => 'Value',
                        'caption' => 'Value',
                        'width'   => 'auto',
                        'visible' => true
                    ]
                ],
                'values' => $this->Get_SIPListConfiguration($sip)
            ],
            [
                'type'     => 'List',
                'name'     => 'list_favorites',
                'caption'  => 'HTTP(S) Calls',
                'rowCount' => $rowcount_http,
                'add'      => false,
                'delete'   => false,
                'sort'     => [
                    'column'    => 'ID',
                    'direction' => 'ascending'
                ],
                'columns' => [
                    [
                        'name'    => 'ID',
                        'caption' => 'ID',
                        'width'   => '100px',
                        'visible' => true
                    ],
                    [
                        'name'    => 'Title',
                        'caption' => 'Title',
                        'width'   => '370px',
                        'visible' => true
                    ],
                    [
                        'name'    => 'Value',
                        'caption' => 'Value',
                        'width'   => 'auto',
                        'visible' => true
                    ]
                ],
                'values' => $this->Get_HTTPListConfiguration($http)
            ]
        ];
        return $form;
    }

    private function Get_SIPListConfiguration($sip)
    {
        $form = [];
        if(empty($sip))
        {
            $this->SendDebug('SIP', 'No SIP data found', 0);
        }
        else{
            foreach ($sip as $key => $sipclient) {
                $form[] = [
                    'ID'     => $key,
                    'Title'  => $sipclient['title'],
                    'Value'  => $sipclient['value'], ];
            }
        }
        return $form;
    }

    private function Get_HTTPListConfiguration($http)
    {
        $form = [];
        if(empty($http))
        {
            $this->SendDebug('HTTP', 'No HTTP Favorites found', 0);
        }
        else{
            foreach ($http as $key => $http_call) {
                $form[] = [
                    'ID'     => $key,
                    'Title'  => $http_call['title'],
                    'Value'  => $http_call['value'], ];
            }
        }
        return $form;
    }

    protected function FormShowSchedule()
    {
        $schedule = $this->GetSchedule();
        $rowcount_schedule = 1;
        $schedule_data = [];
        if ($schedule != '') {
            $schedule_data = json_decode($schedule);
            if (is_null($schedule_data)) {
                $this->SendDebug('Doorbird', 'could not get schedule', 0);
            } else {
                $rowcount_schedule = count($schedule_data)+5;
            }
        }
        $form = [
            [
                'type'     => 'Tree',
                'name'     => 'list_schedule',
                'caption'  => 'Doorbird Schedule',
                'rowCount' => $rowcount_schedule,
                'add'      => false,
                'delete'   => false,
                'sort'     => [
                    'column'    => 'ident',
                    'direction' => 'ascending'
                ],
                'columns' => [
                    [
                        'name'    => 'ident',
                        'caption' => 'Ident',
                        'width'   => '70px',
                        'visible' => true
                    ],
                    [
                        'name'    => 'input',
                        'caption' => 'Input',
                        'width'   => '150px',
                        'visible' => true
                    ],
                    [
                        'name'    => 'inputparam',
                        'caption' => 'Input Param',
                        'width'   => '150px',
                        'visible' => true
                    ],
                    [
                        'name'    => 'outputevent',
                        'caption' => 'Output Event',
                        'width'   => '150px',
                    ],
                    [
                        'name'    => 'outputparam',
                        'caption' => 'Output Param',
                        'width'   => '150px',
                    ],
                    [
                        'name'    => 'schedule_type',
                        'caption' => 'Schedule Type',
                        'width'   => '150px',
                    ],
                    [
                        'name'    => 'schedule_interval',
                        'caption' => 'Interval',
                        'width'   => 'auto',
                    ]
                ],
                'values' => $this->Get_ScheduleListConfiguration($schedule_data)
            ]
        ];
        return $form;
    }

    private function Get_ScheduleListConfiguration($schedule_data)
    {
        $form = [];
        $from = 0;
        $to = 0;
        if(empty($schedule_data))
        {
            $this->SendDebug('Schedule', 'No Schedule found', 0);
        }
        else{
            foreach ($schedule_data as $key => $entry) {
                $input = $entry->input;
                $inputparam = $entry->param;
                $output = $entry->output;
                foreach ($output as $outputentry) {
                    $event = $outputentry->event;
                    $param = $outputentry->param;
                    //$enabled = $outputentry->enabled;
                    $schedule = $outputentry->schedule;
                    foreach ($schedule as $schedule_type => $schedule_entry) {
                        if($schedule_type == 'weekdays')
                        {
                            $from = $schedule_entry[0]->from;
                            $to = $schedule_entry[0]->to;
                        }
                    }
                }
                $form[] = [
                    'id'    => $key+1,
                    'ident' => $key,
                    'input' => $this->Translate($input),
                ];
                $form[] = [
                    'id'                 => $key+100,
                    'parent'             => $key+1,
                    'ident'              => $key,
                    'input'              => $this->Translate($input),
                    'inputparam'         => $inputparam,
                    'outputevent'        => $event,
                    'outputparam'        => $param,
                    'schedule_type'      => $this->Translate($schedule_type),
                    'schedule_interval'  => $from . ' - ' . $to, ];
            }
        }
        return $form;
    }

    protected function FormShowEmail()
    {
        $activeemail2  = $this->ReadPropertyBoolean('activeemail2');
        $activeemail3  = $this->ReadPropertyBoolean('activeemail3');
        $activeemail4  = $this->ReadPropertyBoolean('activeemail4');
        $activeemail5  = $this->ReadPropertyBoolean('activeemail5');
        $activeemail6  = $this->ReadPropertyBoolean('activeemail6');
        $activeemail7  = $this->ReadPropertyBoolean('activeemail7');
        $activeemail8  = $this->ReadPropertyBoolean('activeemail8');
        $activeemail9  = $this->ReadPropertyBoolean('activeemail9');
        $activeemail10 = $this->ReadPropertyBoolean('activeemail10');
        $activeemail11 = $this->ReadPropertyBoolean('activeemail11');
        $form          = [
            [
                'type'  => 'Label',
                'label' => 'optionally notification via email (configurated SMTP module required)'],
            [
                'type'  => 'Label',
                'label' => 'active email notification'],
            [
                'name'    => 'activeemail',
                'type'    => 'CheckBox',
                'caption' => 'active email'],
            [
                'name'    => 'smtpmodule',
                'type'    => 'SelectInstance',
                'caption' => 'SMTP module'],
            [
                'type'  => 'Label',
                'label' => 'notification email adress'],
            [
                'name'    => 'email',
                'type'    => 'ValidationTextBox',
                'caption' => 'email'],
            [
                'type'  => 'Label',
                'label' => 'email subject'],
            [
                'name'    => 'subject',
                'type'    => 'ValidationTextBox',
                'caption' => 'subject'],
            [
                'type'  => 'Label',
                'label' => 'email text'],
            [
                'name'    => 'emailtext',
                'type'    => 'ValidationTextBox',
                'caption' => 'email text'],
            [
                'name'    => 'activeemail2',
                'type'    => 'CheckBox',
                'caption' => 'active email 2']];
        if ($activeemail2) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule2',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email2',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject2',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext2',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail3',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 3']]
            );
        }
        if ($activeemail3) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule3',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email3',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject3',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext3',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail4',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 4']]
            );
        }
        if ($activeemail4) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule4',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email4',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject4',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext4',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail5',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 5']]
            );
        }
        if ($activeemail5) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule5',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email5',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject5',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext5',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail6',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 6']]
            );
        }
        if ($activeemail6) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule6',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email6',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject6',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext6',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail7',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 7']]
            );
        }
        if ($activeemail7) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule7',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email7',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject7',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext7',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail8',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 8']]
            );
        }
        if ($activeemail8) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule8',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email8',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject8',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext8',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail9',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 9']]
            );
        }
        if ($activeemail9) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule9',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email9',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject9',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext9',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail10',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 10']]
            );
        }
        if ($activeemail10) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule10',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email10',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject10',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext10',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text'],
                    [
                        'name'    => 'activeemail11',
                        'type'    => 'CheckBox',
                        'caption' => 'active email 11']]
            );
        }
        if ($activeemail11) {
            $form = array_merge_recursive(
                $form, [
                    [
                        'name'    => 'smtpmodule11',
                        'type'    => 'SelectInstance',
                        'caption' => 'SMTP module'],
                    [
                        'type'  => 'Label',
                        'label' => 'notification email adress'],
                    [
                        'name'    => 'email11',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email'],
                    [
                        'type'  => 'Label',
                        'label' => 'email subject'],
                    [
                        'name'    => 'subject11',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'subject'],
                    [
                        'type'  => 'Label',
                        'label' => 'email text'],
                    [
                        'name'    => 'emailtext11',
                        'type'    => 'ValidationTextBox',
                        'caption' => 'email text']]
            );
        }
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
                'type'  => 'Label',
                'label' => 'Setup notifications from doorbird to IP-Symcon'],
            [
                'type'    => 'Button',
                'label'   => 'Setup Notification',
                'onClick' => 'Doorbird_SetupNotification($id);'],
            [
                'type'  => 'Label',
                'label' => 'Get buildnumber, WLAN MAC and firmwareversion of Doorbird'],
            [
                'type'    => 'Button',
                'label'   => 'get info',
                'onClick' => 'Doorbird_GetInfo($id);'],
            [
                'type'  => 'Label',
                'label' => 'Get snapshot from the doorbird camera'],
            [
                'type'    => 'Button',
                'label'   => 'get snapshoot',
                'onClick' => 'Doorbird_GetSnapshot($id);'],
            [
                'type'    => 'Button',
                'label'   => 'open door',
                'onClick' => 'Doorbird_OpenDoor($id);'],
            [
                'type'  => 'Label',
                'label' => 'turn on ir light of doorbird'],
            [
                'type'    => 'Button',
                'label'   => 'ir light',
                'onClick' => 'Doorbird_Light($id);']];

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
                'caption' => 'Creating instance.'],
            [
                'code'    => 102,
                'icon'    => 'active',
                'caption' => 'Doorbird accessible.'],
            [
                'code'    => 104,
                'icon'    => 'inactive',
                'caption' => 'interface closed.'],
            [
                'code'    => 201,
                'icon'    => 'inactive',
                'caption' => 'Please follow the instructions.'],
            [
                'code'    => 202,
                'icon'    => 'error',
                'caption' => 'Doorbird IP adress must not empty.'],
            [
                'code'    => 203,
                'icon'    => 'error',
                'caption' => 'No valid IP adress or host.'],
            [
                'code'    => 204,
                'icon'    => 'error',
                'caption' => 'connection to Doorbird lost.'],
            [
                'code'    => 205,
                'icon'    => 'error',
                'caption' => 'field must not be empty.'],
            [
                'code'    => 206,
                'icon'    => 'error',
                'caption' => 'category must not be empty.'],
            [
                'code'    => 207,
                'icon'    => 'error',
                'caption' => 'email not valid.'],
            [
                'code'    => 208,
                'icon'    => 'error',
                'caption' => 'category doorbird snapshot not set.'],
            [
                'code'    => 209,
                'icon'    => 'error',
                'caption' => 'category doorbird history not set.'],
            [
                'code'    => 210,
                'icon'    => 'error',
                'caption' => 'doorbird user not set.'],
            [
                'code'    => 211,
                'icon'    => 'error',
                'caption' => 'doorbird password not set.'],
            [
                'code'    => 212,
                'icon'    => 'error',
                'caption' => 'webhook user not set.'],
            [
                'code'    => 213,
                'icon'    => 'error',
                'caption' => 'webhook password not set.'],
            [
                'code'    => 214,
                'icon'    => 'error',
                'caption' => 'email not set.'],
            [
                'code'    => 215,
                'icon'    => 'error',
                'caption' => 'Could not connect. Please check the Doorbird password.'],
            [
                'code'    => 216,
                'icon'    => 'error',
                'caption' => 'Could not connect. Please check the Doorbird username.'],
            [
                'code'    => 217,
                'icon'    => 'error',
                'caption' => 'the user has no authority as an API operator. Please make sure that the user who has been deposited in IP-Symcon has been assigned API operator rights.'],
            [
                'code'    => 218,
                'icon'    => 'error',
                'caption' => 'No valid Doorbird IP adress or host.'],
            [
                'code'    => 219,
                'icon'    => 'error',
                'caption' => 'No valid IP-Symcon IP adress or host.']];

        return $form;
    }

    //Add this Polyfill for IP-Symcon 4.4 and older
    protected function SetValue($Ident, $Value)
    {

        if (IPS_GetKernelVersion() >= 5) {
            parent::SetValue($Ident, $Value);
        } else {
            SetValue($this->GetIDForIdent($Ident), $Value);
        }
    }
}
