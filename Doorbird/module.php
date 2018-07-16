<?

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

	public function Create()
	{
//Never delete this line!
		parent::Create();

		//These lines are parsed on Symcon Startup or Instance creation
		//You cannot use variables here. Just static values.
		$this->RequireParent("{82347F20-F541-41E1-AC5B-A636FD3AE2D8}");

		$this->RegisterPropertyString("Host", "");
		$this->RegisterPropertyInteger("PortDoorbell", 80);
		$this->RegisterPropertyString("IPSIP", "");
		$this->RegisterPropertyInteger("PortIPS", 3777);
		$this->RegisterPropertyString("User", "");
		$this->RegisterPropertyString("Password", "");
		$this->RegisterPropertyString("User_1", "");
		$this->RegisterPropertyString("Password_1", "");
		$this->RegisterPropertyInteger("picturelimitring", 20);
		$this->RegisterPropertyInteger("picturelimitsnapshot", 20);
		$this->RegisterPropertyBoolean("doorbell", true);
		$this->RegisterPropertyInteger("relaxationdoorbell", 10);
		$this->RegisterPropertyBoolean("motionsensor", true);
		$this->RegisterPropertyInteger("relaxationmotionsensor", 10);
		$this->RegisterPropertyBoolean("dooropen", true);
		$this->RegisterPropertyInteger("relaxationdooropen", 10);
		$this->RegisterPropertyBoolean("activeemail", false);
		$this->RegisterPropertyString("email", "");
		$this->RegisterPropertyInteger("smtpmodule", 0);
		$this->RegisterPropertyString("subject", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail2", false);
		$this->RegisterPropertyString("email2", "");
		$this->RegisterPropertyInteger("smtpmodule2", 0);
		$this->RegisterPropertyString("subject2", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext2", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail3", false);
		$this->RegisterPropertyString("email3", "");
		$this->RegisterPropertyInteger("smtpmodule3", 0);
		$this->RegisterPropertyString("subject3", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext3", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail4", false);
		$this->RegisterPropertyString("email4", "");
		$this->RegisterPropertyInteger("smtpmodule4", 0);
		$this->RegisterPropertyString("subject4", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext4", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail5", false);
		$this->RegisterPropertyString("email5", "");
		$this->RegisterPropertyInteger("smtpmodule5", 0);
		$this->RegisterPropertyString("subject5", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext5", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail6", false);
		$this->RegisterPropertyString("email6", "");
		$this->RegisterPropertyInteger("smtpmodule6", 0);
		$this->RegisterPropertyString("subject6", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext6", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail7", false);
		$this->RegisterPropertyString("email7", "");
		$this->RegisterPropertyInteger("smtpmodule7", 0);
		$this->RegisterPropertyString("subject7", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext7", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail8", false);
		$this->RegisterPropertyString("email8", "");
		$this->RegisterPropertyInteger("smtpmodule8", 0);
		$this->RegisterPropertyString("subject8", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext8", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail9", false);
		$this->RegisterPropertyString("email9", "");
		$this->RegisterPropertyInteger("smtpmodule9", 0);
		$this->RegisterPropertyString("subject9", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext9", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail10", false);
		$this->RegisterPropertyString("email10", "");
		$this->RegisterPropertyInteger("smtpmodule10", 0);
		$this->RegisterPropertyString("subject10", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext10", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("activeemail11", false);
		$this->RegisterPropertyString("email11", "");
		$this->RegisterPropertyInteger("smtpmodule11", 0);
		$this->RegisterPropertyString("subject11", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext11", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyBoolean("altview", false);
		$this->RegisterPropertyString("webhookusername", "ipsymcon");
		$this->RegisterPropertyString("webhookpassword", "useripsh0me");
		$this->RegisterPropertyInteger("categoryhistory", 0);
		$this->RegisterPropertyInteger("categorysnapshot", 0);
		$this->RegisterPropertyInteger("model", 1);
	}

	public function ApplyChanges()
	{
		//Never delete this line!
		parent::ApplyChanges();

		$this->RegisterVariableString("DoorbirdVideo", "Doorbird Video", "~HTMLBox", 1);
		$this->RegisterProfileStringDoorbird("Doorbird.Ring", "Alert");
		$model = $this->ReadPropertyInteger("model");
		if ($model == 1 || $model == 2 || $model == 3 || $model == 6 || $model == 7) {
			$this->RegisterVariableString("LastRingtone", "Zeitpunkt letztes Klingelsignal", "Doorbird.Ring", 2);
		}
		if ($model == 4) {
			$this->RegisterVariableString("LastRingtone", "Zeitpunkt letztes Klingelsignal", "Doorbird.Ring", 2);
			$this->RegisterVariableString("LastRingtone2", "Zeitpunkt letztes Klingelsignal 2", "Doorbird.Ring", 3);
		}
		if ($model == 5) {
			$this->RegisterVariableString("LastRingtone", "Zeitpunkt letztes Klingelsignal", "Doorbird.Ring", 2);
			$this->RegisterVariableString("LastRingtone2", "Zeitpunkt letztes Klingelsignal 2", "Doorbird.Ring", 3);
			$this->RegisterVariableString("LastRingtone3", "Zeitpunkt letztes Klingelsignal 3", "Doorbird.Ring", 4);
		}

		$this->RegisterProfileStringDoorbird("Doorbird.Movement", "Motion");
		$this->RegisterVariableString("LastMovement", "Zeitpunkt letzte Bewegung", "Doorbird.Movement", 5);
		$this->RegisterProfileStringDoorbird("Doorbird.LastDoor", "LockOpen");
		$this->RegisterVariableString("LastDoorOpen", "Zeitpunkt letzte Türöffnung", "Doorbird.LastDoor", 6);
		$this->RegisterProfileStringDoorbird("Doorbird.Firmware", "Robot");
		$this->RegisterVariableString("FirmwareVersion", "Doorbird Firmware Version", "Doorbird.Firmware", 7);
		$this->RegisterProfileStringDoorbird("Doorbird.Buildnumber", "Gear");
		$this->RegisterVariableString("Buildnumber", "Doorbird Build Number", "Doorbird.Buildnumber", 8);
		$this->RegisterProfileStringDoorbird("Doorbird.MAC", "Notebook");
		$this->RegisterVariableString("MACAdress", "Doorbird WLAN MAC", "Doorbird.MAC", 9);
		$this->RegisterVariableString("DoorbirdReturn", "Doorbird Return", "", 25);
		IPS_SetHidden($this->GetIDForIdent('DoorbirdReturn'), true);
		$lightass = Array(
			Array(0, "Licht einschalten", "Light", -1)
		);
		$doorass = Array(
			Array(0, "Tür öffnen", "LockOpen", -1)
		);
		$snapass = Array(
			Array(0, "Bild speichern", "Image", -1)
		);
		$this->RegisterProfileIntegerDoorbirdAss("Doorbird.Light", "Light", "", "", 0, 0, 0, 0, $lightass);
		$this->RegisterProfileIntegerDoorbirdAss("Doorbird.Door", "LockOpen", "", "", 0, 0, 0, 0, $doorass);
		$this->RegisterProfileIntegerDoorbirdAss("Doorbird.Snapshot", "Image", "", "", 0, 0, 0, 0, $snapass);
		$this->RegisterVariableInteger("DoorbirdButtonLight", "Doorbird IR Beleuchtung", "Doorbird.Light", 10);
		$this->EnableAction("DoorbirdButtonLight");
		$this->RegisterVariableInteger("DoorbirdButtonDoor", "Doorbird Türöffner", "Doorbird.Door", 11);
		$this->EnableAction("DoorbirdButtonDoor");
		$this->RegisterVariableInteger("DoorbirdButtonSnapshot", "Doorbird Bild abspeichern", "Doorbird.Snapshot", 12);
		$this->EnableAction("DoorbirdButtonSnapshot");


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
		$hostdoorbell = $this->ReadPropertyString('Host');
		$hostips = $this->ReadPropertyString('IPSIP');
		$doorbirduser = $this->ReadPropertyString('User');
		$password = $this->ReadPropertyString('Password');
		$doorbirduser_1 = $this->ReadPropertyString('User_1');
		$password_1 = $this->ReadPropertyString('Password_1');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$webhookusername = $this->ReadPropertyString('webhookusername');
		$webhookpassword = $this->ReadPropertyString('webhookpassword');

		//IP Doorbell prüfen
		if (!filter_var($hostdoorbell, FILTER_VALIDATE_IP) === false) {
			//IP ok
			$ipcheckdoorbird = true;
		} else {
			$ipcheckdoorbird = false;
		}

		//IP IP-Symcon prüfen
		if (!filter_var($hostips, FILTER_VALIDATE_IP) === false) {
			//IP ok
			$ipcheckips = true;
		} else {
			$ipcheckips = false;
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
			$this->SetStatus(203); //IP Adresse oder Host ist ungültig
		}

		//User und Passwort prüfen
		if ($doorbirduser == "" || $password == "" || $doorbirduser_1 == "" || $password_1 == "" || $webhookusername == "" || $webhookpassword == "") {
			$this->SetStatus(205); //Felder dürfen nicht leer sein
		} elseif ($doorbirduser !== "" && $password !== "" && $hostcheck === true) {
			$selectionaltview = $this->ReadPropertyBoolean('altview');
			$prefix = $this->GetURLPrefix($hostdoorbell);
			if ($selectionaltview) {
				$DoorbirdVideoHTML = '<img src="' . $prefix . $hostdoorbell . ':' . $portdoorbell . '/bha-api/video.cgi?http-user=' . $doorbirduser . '&http-password=' . $password . '" style="width: 960px; height:540px;" >';
			} else {
				$DoorbirdVideoHTML = '<iframe src="' . $prefix . $hostdoorbell . ':' . $portdoorbell . '/bha-api/video.cgi?http-user=' . $doorbirduser . '&http-password=' . $password . '" border="0" frameborder="0" style= "width: 100%; height: 500px;"/></iframe>';
			}
			$this->SetValue('DoorbirdVideo', $DoorbirdVideoHTML);

			$ipsversion = $this->GetIPSVersion();
			if ($ipsversion == 0) {
				//prüfen ob Script existent
				$SkriptID = @IPS_GetObjectIDByIdent("DoorbirdIPSInterface", $this->InstanceID);
				if ($SkriptID === false) {
					$ID = $this->RegisterScript("DoorbirdIPSInterface", "Doorbird IPS Interface", $this->CreateWebHookScript(), 19);
					IPS_SetHidden($ID, true);
					$this->RegisterHookOLD('/hook/doorbird' . $this->InstanceID, $ID);
				} else {
					$this->SendDebug("Doorbird", "Webhookscript mit " . $SkriptID . " gefunden", 0);
				}
			} else {
				$SkriptID = @IPS_GetObjectIDByIdent("DoorbirdIPSInterface", $this->InstanceID);
				if ($SkriptID > 0) {
					$this->UnregisterHook("/hook/doorbird" . $this->InstanceID);
					$this->UnregisterScript("DoorbirdIPSInterface");
				}
				$this->RegisterHook("/hook/doorbird" . $this->InstanceID);
			}


			// Kategorie prüfen
			$category_snapshot = $this->ReadPropertyInteger('categorysnapshot');
			$category_history = $this->ReadPropertyInteger('categoryhistory');
			if ($category_snapshot > 0) {
				$this->SendDebug("Doorbird", "Kategorie mit ObjektID " . $category_snapshot . " gefunden", 0);
			} else {
				$this->SetStatus(208); //category doorbird snapshot not set
			}
			if ($category_history > 0) {
				$this->SendDebug("Doorbird", "Kategorie mit ObjektID " . $category_history . " gefunden", 0);
			} else {
				$this->SetStatus(209); //category doorbird history not set
			}
			//Timer für Historie
			// Ersetzt durch Event das Bilder bei Klingeln abholt
			/*
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
			*/

			if ($ipsversion == 0) {
				//Skript bei Bewegung
				$IDSnapshot = @($this->GetIDForIdent('GetDoorbirdSnapshot'));
				if ($IDSnapshot === false) {
					$IDSnapshot = $this->RegisterScript("GetDoorbirdSnapshot", "Get Doorbird Snapshot", $this->CreateSnapshotScript(), 17);
					IPS_SetHidden($IDSnapshot, true);
					$this->SetSnapshotEvent($IDSnapshot);
				} else {
					$this->SendDebug("Doorbird", "Doorbird Snapshot Script mit " . $IDSnapshot . " gefunden", 0);
				}
			} else {
				if ($this->GetIDForIdent('LastMovement') > 0) {
					$this->RegisterMessage($this->GetIDForIdent('LastMovement'), VM_UPDATE);
					$this->SendDebug("Doorbird", "Register Message LastMovement", 0);
				}
			}

			if ($ipsversion == 0) {
				//Skript beim Klingeln
				$IDRing = @($this->GetIDForIdent('GetDoorbirdRingPic'));
				if ($IDRing === false) {
					$IDRing = $this->RegisterScript("GetDoorbirdRingPic", "Get Doorbird Ring Picture", $this->CreateRingPictureScript(), 18);
					IPS_SetHidden($IDRing, true);
					$this->SetRingEvent($IDRing);
				} else {
					$this->SendDebug("Doorbird", "Doorbird Ring Picture Script mit " . $IDRing . " gefunden", 0);
				}
			} else {
				if ($this->GetIDForIdent('LastRingtone') > 0) {
					$this->RegisterMessage($this->GetIDForIdent('LastRingtone'), VM_UPDATE);
					$this->SendDebug("Doorbird", "Register Message LastRingtone", 0);
				}
			}

			if ($ipsversion >= 1) {
				if ($this->GetIDForIdent('LastDoorOpen') > 0) {
					$this->RegisterMessage($this->GetIDForIdent('LastDoorOpen'), VM_UPDATE);
					$this->SendDebug("Doorbird", "Register Message LastDoorOpen", 0);
				}
			}

			$this->SetupNotification();
			$this->GetInfo();

			//Email
			$emailalert = $this->ReadPropertyBoolean('activeemail');
			$emailalert2 = $this->ReadPropertyBoolean('activeemail2');
			$emailalert3 = $this->ReadPropertyBoolean('activeemail3');
			$emailalert4 = $this->ReadPropertyBoolean('activeemail4');
			$emailalert5 = $this->ReadPropertyBoolean('activeemail5');
			$emailalert6 = $this->ReadPropertyBoolean('activeemail6');
			$emailalert7 = $this->ReadPropertyBoolean('activeemail7');
			$emailalert8 = $this->ReadPropertyBoolean('activeemail8');
			$emailalert9 = $this->ReadPropertyBoolean('activeemail9');
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
	}

	public function GetConfigurationForParent()
	{
		$Config['Host'] = $this->GetHostIP();
		$Config['Port'] = 6524;
		$Config['BindPort'] = 6524;
		return json_encode($Config);
	}

	protected function GetHostIP()
	{
		$ip = exec("sudo ifconfig eth0 | grep 'inet Adresse:' | cut -d: -f2 | awk '{ print $1}'");
		if ($ip == "") {
			$ipinfo = Sys_GetNetworkInfo();
			$ip = $ipinfo[0]['IP'];
		}
		return $ip;
	}

	protected function CheckEmail($email)
	{
		$ipsversion = $this->GetIPSVersion();
		if ($email == "") {
			$this->SetStatus(205); //Felder dürfen nicht leer sein
		}
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			//email valid
			if ($ipsversion == 0) {
				//Skript beim EmailAlert
				$IDEmail = @($this->GetIDForIdent('SendEmailAlert'));
				if ($IDEmail === false) {
					$IDEmail = $this->RegisterScript("SendEmailAlert", "Email Alert", $this->CreateEmailAlertScript($email), 19);
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
		$ids = IPS_GetInstanceListByModuleID("{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}");
		if (sizeof($ids) > 0) {
			$hooks = json_decode(IPS_GetProperty($ids[0], "Hooks"), true);
			$found = false;
			foreach ($hooks as $index => $hook) {
				if ($hook['Hook'] == $WebHook) {
					if ($hook['TargetID'] == $TargetID)
						return;
					$hooks[$index]['TargetID'] = $TargetID;
					$found = true;
				}
			}
			if (!$found) {
				$hooks[] = Array("Hook" => $WebHook, "TargetID" => $TargetID);
			}
			IPS_SetProperty($ids[0], "Hooks", json_encode($hooks));
			IPS_ApplyChanges($ids[0]);
		}
	}

	private function RegisterHook($WebHook)
	{
		$ids = IPS_GetInstanceListByModuleID("{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}");
		if (sizeof($ids) > 0) {
			$hooks = json_decode(IPS_GetProperty($ids[0], "Hooks"), true);
			$found = false;
			foreach ($hooks as $index => $hook) {
				if ($hook['Hook'] == $WebHook) {
					if ($hook['TargetID'] == $this->InstanceID)
						return;
					$hooks[$index]['TargetID'] = $this->InstanceID;
					$found = true;
				}
			}
			if (!$found) {
				$hooks[] = Array("Hook" => $WebHook, "TargetID" => $this->InstanceID);
			}
			IPS_SetProperty($ids[0], "Hooks", json_encode($hooks));
			IPS_ApplyChanges($ids[0]);
		}
	}

	/**
	 * Löscht einen WebHook, wenn vorhanden.
	 *
	 * @access private
	 * @param string $WebHook URI des WebHook.
	 */
	protected function UnregisterHook($WebHook)
	{
		$ids = IPS_GetInstanceListByModuleID("{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}");
		if (sizeof($ids) > 0) {
			$hooks = json_decode(IPS_GetProperty($ids[0], "Hooks"), true);
			$found = false;
			foreach ($hooks as $index => $hook) {
				if ($hook['Hook'] == $WebHook) {
					$found = $index;
					break;
				}
			}
			if ($found !== false) {
				array_splice($hooks, $index, 1);
				IPS_SetProperty($ids[0], "Hooks", json_encode($hooks));
				IPS_ApplyChanges($ids[0]);
			}
		}
	}

	/**
	 * Löscht eine Script, sofern vorhanden.
	 *
	 * @access private
	 * @param int $Ident Ident der Variable.
	 */
	protected function UnregisterScript($Ident)
	{
		$sid = @IPS_GetObjectIDByIdent($Ident, $this->InstanceID);
		if ($sid === false)
			return;
		if (!IPS_ScriptExists($sid))
			return; //bail out
		IPS_DeleteScript($sid, true);
	}

	protected function is_valid_domain($url)
	{

		$validation = FALSE;
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
			if (checkdnsrr($urlparts['host'], 'A') && in_array($urlparts['scheme'], array('http', 'https')) && ip2long($urlparts['host']) === FALSE) {
				$urlparts['host'] = preg_replace('/^www\./', '', $urlparts['host']);
				$url = $urlparts['scheme'] . '://' . $urlparts['host'] . "/";

				if (filter_var($url, FILTER_VALIDATE_URL) !== false && @get_headers($url)) {
					$validation = TRUE;
				}
			}
		}

		if (!$validation) {
			//echo $url." Its Invalid Domain Name.";
			$domaincheck = false;
			return $domaincheck;
		} else {
			//echo $url." is a Valid Domain Name.";
			$domaincheck = true;
			return $domaincheck;
		}

	}

	protected function is_valid_localdomain($url)
	{

		$validation = FALSE;
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
			if (checkdnsrr($urlparts['host'], 'A') && in_array($urlparts['scheme'], array('http', 'https')) && ip2long($urlparts['host']) === FALSE) {
				$urlparts['host'] = preg_replace('/^www\./', '', $urlparts['host']);
				$url = $urlparts['scheme'] . '://' . $urlparts['host'] . "/";

				if (filter_var($url, FILTER_VALIDATE_URL) !== false && @get_headers($url)) {
					$validation = TRUE;
				}
			}
		}

		if (!$validation) {
			//echo $url." Its Invalid Domain Name.";
			$domaincheck = false;
			return $domaincheck;
		} else {
			//echo $url." is a Valid Domain Name.";
			$domaincheck = true;
			return $domaincheck;
		}

	}

	protected function GetURLPrefix($url)
	{
		$prehttp = strpos($url, "http://");
		$prehttps = strpos($url, "https://");
		if ($prehttp === 0) {
			$prefix = ""; //Prefix ist http
		} elseif ($prehttps === 0) {
			$prefix = ""; //Prefix ist https
		} else {
			$prefix = "http://"; //Prefix ergänzen
		}
		return $prefix;
	}

	protected function GetConnectURL()
	{
		$InstanzenListe = IPS_GetInstanceListByModuleID("{9486D575-BE8C-4ED8-B5B5-20930E26DE6F}");
		$InstanzCount = 0;
		$ConnectControl = false;
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
		IPS_LogMessage(get_class() . '::' . __FUNCTION__, 'SenderID: ' . $SenderID . ', Message: ' . $Message . ', Data:' . json_encode($Data));
		if ($SenderID == $this->GetIDForIdent('LastRingtone')) {
			$this->GetRingPicture();
			$email = $this->ReadPropertyString("email");
			$this->EmailAlert($email);
			$this->SendDebug("Doorbird recieved LastRingtone at", date("H:i", time()), 0);
			$this->SendDebug("Doorbird", "Message from SenderID ".$SenderID." with Message ".$Message."\r\n Data: ".print_r($Data, true), 0);
		} elseif ($SenderID == $this->GetIDForIdent('LastMovement')) {
			$this->GetSnapshot();
			$this->SendDebug("Doorbird recieved LastMovement at", date("H:i", time()), 0);
			$this->SendDebug("Doorbird", "Message from SenderID " . $SenderID . " with Message " . $Message . "\r\n Data: " . print_r($Data, true), 0);
		}

	}

	public function ReceiveData($JSONString)
	{
		// $this->SendDebug("Doorbird:", $JSONString, 0);
		$payload_udp = json_decode($JSONString);
		// $type = $payload->Type;
		$this->SendDebug("Doorbird Recieve:", utf8_decode($payload_udp->Buffer), 1);
		$dataraw = utf8_decode($payload_udp->Buffer);
		$doorbird_user = $this->ReadPropertyString('User_1');
		$INTERCOM_ID = substr($doorbird_user, 0, 6);
		$doorbird_password = $this->ReadPropertyString('Password_1');
		$data = explode(":", $dataraw);
		if (isset($data[1])) {
			$doorbird_id = $data[1];

			if ($doorbird_id == $INTERCOM_ID) {
				$this->SendDebug("Doorbird Recieve:", $payload_udp->Buffer, 0);
			}
		} else {
			// Step 1: get packet via UDP:
			$payload = utf8_decode($payload_udp->Buffer);
			// Step 2: Split up:
			$ident = substr($payload, 0, 3); // lenght 3 Bytes, 0xDE 0xAD 0xBE
			$this->SendDebug("Doorbird Ident:", $ident, 1);
			// $this->SendDebug("Doorbird:", "Ident: ".bin2hex($ident), 0);
			$version = substr($payload, 3, 1); // lenght 1 Bytes, 0x01
			$this->SendDebug("Doorbird Version:", $version, 1);
			//$this->SendDebug("Doorbird:", "Version: ".bin2hex($version), 0);
			$opslimit = substr($payload, 4, 4);// lenght 4 Bytes, Used for password stretching with Argon2i.
			$this->SendDebug("Doorbird OPSLimit:", $opslimit, 1);
			// $this->SendDebug("Doorbird:", "OPSLimit: ".bin2hex($opslimit), 0);
			$memlimit = substr($payload, 8, 4);// lenght 4 Bytes, Used for password stretching with Argon2i.
			$this->SendDebug("Doorbird MEMLimit:", $memlimit, 1);
			// $this->SendDebug("Doorbird:", "MEMLimit: ".bin2hex($memlimit), 0);
			$salt = substr($payload, 12, 16);// lenght 16 Bytes, Used for password stretching with Argon2i.
			$this->SendDebug("Doorbird Salt:", $salt, 1);
			// $this->SendDebug("Doorbird:", "Salt: ".bin2hex($salt), 0);
			$nonce = substr($payload, 28, 8); // lenght 8 Bytes, Used for encryption with ChaCha20-Poly1305
			$this->SendDebug("Doorbird Nonce:", $nonce, 1);
			// $this->SendDebug("Doorbird:", "Nonce: ".bin2hex($nonce), 0);

			$ciphertext = substr($payload, 36, 34); // lenght 8 Bytes, With ChaCha20-Poly1305 encrypted text which contains informations about the Event.
			$this->SendDebug("Doorbird Ciphertext:", $ciphertext, 1);
			// $this->SendDebug("Doorbird:", "Ciphertext: ".bin2hex($ciphertext), 0);
			// Step 3: Generate stretched password
			$password = substr($doorbird_password, 0, 5); // first 5 chars of your password
			$out_len = SODIUM_CRYPTO_SIGN_SEEDBYTES;
			$key = sodium_crypto_pwhash(
				SODIUM_CRYPTO_SIGN_SEEDBYTES,
				$password,
				$salt, // SALT
				unpack("N", $opslimit)[1], //OPSLIMIT
				unpack("N", $memlimit)[1], //MEMLIMIT
				SODIUM_CRYPTO_PWHASH_ALG_ARGON2I13
			);
			$this->SendDebug("Doorbird Key:", $key, 1); // Key für decrypt in HEX
			// Step 4: Decrypt CIPHERTEXT with ChaCha20-Poly1305, use the stretched password and NONCE
			$decrypted = sodium_crypto_aead_chacha20poly1305_decrypt($ciphertext, null, $nonce, $key);
			if ($decrypted) {
				$this->SendDebug("Doorbird:", "decryption successfull", 0);
				$this->SendDebug("Doorbird Decrypted Data:", $decrypted, 1);
				// Step 5: Split the output up
				$INTERCOM_ID = substr($decrypted, 0, 6); // Starting 6 chars from the user name
				$this->SendDebug("Doorbird Intercom ID:", $INTERCOM_ID, 0);
				$EVENT = (int)trim(substr($decrypted, 6, 8));

				if ($EVENT == 1) // Contains the doorbell or „motion“ to detect which event was triggered
				{
					$this->SetLastRingtone();
				}
				$this->SendDebug("Doorbird Event:", $EVENT, 0);
				$TIMESTAMP = unpack('N', substr($decrypted, 14, 4))[1];
				$this->SendDebug("Doorbird Timestamp UTC:", gmdate('H:i:s d.m.Y', $TIMESTAMP), 0);
				$this->SendDebug("Doorbird Timestamp local:", date('H:i:s d.m.Y', $TIMESTAMP), 0);
			} else {
				$this->SendDebug("Doorbird:", "decryption not successfull", 0);
			}
		}
	}

	protected function SetLastRingtone()
	{
		$relaxationdoorbell = $this->ReadPropertyInteger('relaxationdoorbell');
		$last_write = IPS_GetVariable($this->GetIDForIdent("LastRingtone"))["VariableChanged"];
		$current_time = time();
		if (($current_time - $last_write) > $relaxationdoorbell) {
			$this->SendDebug("Doorbird:", "doorbell event", 0);
			$this->SetValue('LastRingtone', date('d.m.y H:i:s'));
		}
	}

	protected function SetLastMovement()
	{
		$relaxationmotionsensor = $this->ReadPropertyInteger('relaxationmotionsensor');
		$last_write = IPS_GetVariable($this->GetIDForIdent("LastMovement"))["VariableChanged"];
		$current_time = time();
		if (($current_time - $last_write) > $relaxationmotionsensor) {
			$this->SendDebug("Doorbird:", "motionsensor event", 0);
			$this->SetValue('LastMovement', date('d.m.y H:i:s'));
		}
	}

	protected function SetLastDoorOpen()
	{
		$relaxationdooropen = $this->ReadPropertyInteger('relaxationdooropen');
		$last_write = IPS_GetVariable($this->GetIDForIdent("LastDoorOpen"))["VariableChanged"];
		$current_time = time();
		if (($current_time - $last_write) > $relaxationdooropen) {
			$this->SendDebug("Doorbird:", "dooropen event", 0);
			$this->SetValue('LastDoorOpen', date('d.m.y H:i:s'));
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
Doorbird_EmailAlert(' . $this->InstanceID . ', "' . $email . '");		
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
			IPS_SetName($EreignisID, "GetDoorbirdSnapshot");
			IPS_SetIdent($EreignisID, "EventGetDoorbirdSnapshot");
			IPS_SetEventTrigger($EreignisID, 0, $this->GetIDForIdent('LastMovement'));   //bei Variablenaktualisierung
			IPS_SetParent($EreignisID, $ParentID);
			IPS_SetEventActive($EreignisID, true);             //Ereignis aktivieren
		} else {
			$this->SendDebug("Doorbird", "Event für Snapshot mit ObjektID" . $EreignisID . " gefunden", 0);
		}
	}

	private function SetRingEvent(int $IDRing)
	{
		//prüfen ob Event existent
		$ParentID = $IDRing;

		$EreignisID = @($this->GetIDForIdent('EventGetDoorbirdRingPic'));
		if ($EreignisID === false) {
			$EreignisID = IPS_CreateEvent(0);
			IPS_SetName($EreignisID, "GetDoorbirdRingPic");
			IPS_SetIdent($EreignisID, "EventGetDoorbirdRingPic");
			IPS_SetEventTrigger($EreignisID, 0, $this->GetIDForIdent('LastRingtone'));   //bei Variablenaktualisierung
			IPS_SetParent($EreignisID, $ParentID);
			IPS_SetEventActive($EreignisID, true);             //Ereignis aktivieren
		} else {
			$this->SendDebug("Doorbird", "Event für Doorbird Ringpicture mit ObjektID" . $EreignisID . " gefunden", 0);
		}
	}

	private function SetEmailEvent(int $IDEmail, bool $state)
	{
		//prüfen ob Event existent
		$ParentID = $IDEmail;

		//$EreignisID = @($this->GetIDForIdent('EventDoorbirdEmail'));
		$EreignisID = @IPS_GetObjectIDByIdent("EventDoorbirdEmail", $ParentID);
		if ($EreignisID === false) {
			$EreignisID = IPS_CreateEvent(0);
			IPS_SetName($EreignisID, "Doorbird Email Alert");
			IPS_SetIdent($EreignisID, "EventDoorbirdEmail");
			IPS_SetEventTrigger($EreignisID, 0, $this->GetIDForIdent('LastRingtone'));   //bei Variablenaktualisierung
			IPS_SetParent($EreignisID, $ParentID);
			IPS_SetEventActive($EreignisID, $state);             //Ereignis aktivieren	/ deaktivieren
		} else {
			//echo "Die Ereignis-ID lautet: ". $EreignisID;
			IPS_SetEventActive($EreignisID, $state);             //Ereignis aktivieren	/ deaktivieren
		}

	}

	public function EmailAlert(string $email)
	{
		$emailalert = $this->ReadPropertyBoolean('activeemail');
		$emailalert2 = $this->ReadPropertyBoolean('activeemail2');
		$emailalert3 = $this->ReadPropertyBoolean('activeemail3');
		$emailalert4 = $this->ReadPropertyBoolean('activeemail4');
		$emailalert5 = $this->ReadPropertyBoolean('activeemail5');
		$emailalert6 = $this->ReadPropertyBoolean('activeemail6');
		$emailalert7 = $this->ReadPropertyBoolean('activeemail7');
		$emailalert8 = $this->ReadPropertyBoolean('activeemail8');
		$emailalert9 = $this->ReadPropertyBoolean('activeemail9');
		$emailalert10 = $this->ReadPropertyBoolean('activeemail10');
		$emailalert11 = $this->ReadPropertyBoolean('activeemail11');
		if ($emailalert) {
			$email = $this->ReadPropertyString('email');
			$subject = $this->ReadPropertyString('subject');
			$emailtext = $this->ReadPropertyString('emailtext');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert2) {
			$email = $this->ReadPropertyString('email2');
			$subject = $this->ReadPropertyString('subject2');
			$emailtext = $this->ReadPropertyString('emailtext2');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert3) {
			$email = $this->ReadPropertyString('email3');
			$subject = $this->ReadPropertyString('subject3');
			$emailtext = $this->ReadPropertyString('emailtext3');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert4) {
			$email = $this->ReadPropertyString('email4');
			$subject = $this->ReadPropertyString('subject4');
			$emailtext = $this->ReadPropertyString('emailtext4');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert5) {
			$email = $this->ReadPropertyString('email5');
			$subject = $this->ReadPropertyString('subject5');
			$emailtext = $this->ReadPropertyString('emailtext5');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert6) {
			$email = $this->ReadPropertyString('email6');
			$subject = $this->ReadPropertyString('subject6');
			$emailtext = $this->ReadPropertyString('emailtext6');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert7) {
			$email = $this->ReadPropertyString('email7');
			$subject = $this->ReadPropertyString('subject7');
			$emailtext = $this->ReadPropertyString('emailtext7');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert8) {
			$email = $this->ReadPropertyString('email8');
			$subject = $this->ReadPropertyString('subject8');
			$emailtext = $this->ReadPropertyString('emailtext8');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert9) {
			$email = $this->ReadPropertyString('email9');
			$subject = $this->ReadPropertyString('subject9');
			$emailtext = $this->ReadPropertyString('emailtext9');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert10) {
			$email = $this->ReadPropertyString('email10');
			$subject = $this->ReadPropertyString('subject10');
			$emailtext = $this->ReadPropertyString('emailtext10');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		} elseif ($emailalert11) {
			$email = $this->ReadPropertyString('email11');
			$subject = $this->ReadPropertyString('subject11');
			$emailtext = $this->ReadPropertyString('emailtext11');
			$this->SendSMTPEmail($email, $subject, $emailtext);
		}
	}

	protected function SendSMTPEmail($email, $subject, $emailtext)
	{
		$catid = $this->ReadPropertyInteger('categoryhistory');
		$mediaids = IPS_GetChildrenIDs($catid);
		// $countmedia = count($mediaids);
		foreach ($mediaids as $key => $mediaid) {
			$mediainfo = IPS_GetMedia($mediaid);
			if ($mediainfo["MediaFile"] == "media/doorbirdringpic_1.jpg") {
				$mailer = $this->ReadPropertyInteger('smtpmodule');
				SMTP_SendMailMediaEx($mailer, $email, $subject, $emailtext, $mediaid);
			}
		}
	}

	public function ProcessHookDataOLD()
	{
		$webhookusername = $this->ReadPropertyString('webhookusername');
		$webhookpassword = $this->ReadPropertyString('webhookpassword');
		if (!isset($_SERVER['PHP_AUTH_USER']))
			$_SERVER['PHP_AUTH_USER'] = "";
		if (!isset($_SERVER['PHP_AUTH_PW']))
			$_SERVER['PHP_AUTH_PW'] = "";

		if (($_SERVER['PHP_AUTH_USER'] != $webhookusername) || ($_SERVER['PHP_AUTH_PW'] != $webhookpassword)) {
			header('WWW-Authenticate: Basic Realm="Doorbird WebHook"');
			header('HTTP/1.0 401 Unauthorized');
			echo "Authorization required";
			return;
		}
		echo "Webhook Doorbird IP-Symcon";

		//workaround for bug
		if (!isset($_IPS))
			global $_IPS;
		if ($_IPS['SENDER'] == "Execute") {
			echo "This script cannot be used this way.";
			return;
		}
		//Auswerten von Events von Doorbird
		// Doorbird nutzt GET
		if (isset($_GET["doorbirdevent"])) {
			$data = $_GET["doorbirdevent"];
			if ($data == "doorbell") {
				$this->SetLastRingtone();
			} elseif ($data == "motionsensor") {
				$this->SetLastMovement();
			} elseif ($data == "dooropen") {
				$this->SetLastDoorOpen();
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
			$_SERVER['PHP_AUTH_USER'] = "";
			$this->SendDebug("Doorbird:", "Webhook user is empty", 0);
		}
		if (!isset($_SERVER['PHP_AUTH_PW'])) {
			$_SERVER['PHP_AUTH_PW'] = "";
			$this->SendDebug("Doorbird:", "Webhook password is empty", 0);
		}

		if (($_SERVER['PHP_AUTH_USER'] != $webhookusername) || ($_SERVER['PHP_AUTH_PW'] != $webhookpassword)) {
			$this->SendDebug("Doorbird:", "wrong webhook user or password", 0);
			header('WWW-Authenticate: Basic Realm="Doorbird WebHook"');
			header('HTTP/1.0 401 Unauthorized');
			echo "Authorization required";
			return;
		}
		echo "Webhook Doorbird IP-Symcon";

		//workaround for bug
		if (!isset($_IPS))
			global $_IPS;
		if ($_IPS['SENDER'] == "Execute") {
			echo "This script cannot be used this way.";
			return;
		}
		//Auswerten von Events von Doorbird
		// Doorbird nutzt GET
		if (isset($_GET["doorbirdevent"])) {
			$this->SendDebug("Doorbird:", json_encode($_GET), 0);
			$data = $_GET["doorbirdevent"];
			if ($data == "doorbell") {
				$this->SetLastRingtone();
			} elseif ($data == "motionsensor") {
				$this->SetLastMovement();
			} elseif ($data == "dooropen") {
				$this->SetLastDoorOpen();
			}
		}
	}

	//Profile zuweisen und Geräte anlegen
	public function SetupNotification()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$hostips = $this->ReadPropertyString('IPSIP');
		$portips = $this->ReadPropertyInteger('PortIPS');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$selectiondoorbell = $this->ReadPropertyBoolean('doorbell');
		$webhookusername = $this->ReadPropertyString('webhookusername');
		$webhookpassword = $this->ReadPropertyString('webhookpassword');
		if ($selectiondoorbell == true) {
			$selectiondoorbell = 1;
		} else {
			$selectiondoorbell = 0;
		}
		$selectionmotionsensor = $this->ReadPropertyBoolean('motionsensor');
		if ($selectionmotionsensor == true) {
			$selectionmotionsensor = 1;
		} else {
			$selectionmotionsensor = 0;
		}
		$selectiondooropen = $this->ReadPropertyBoolean('dooropen');
		if ($selectiondooropen == true) {
			$selectiondooropen = 1;
		} else {
			$selectiondooropen = 0;
		}
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$prefixips = $this->GetURLPrefix($hostips);
		//doorbell add favorites

		$URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/favorites.cgi?action=save&type=http&title=IPSDoorbell&value=' . $prefixips . $webhookusername . ':' . $webhookpassword . '@' . $hostips . ':' . $portips . '/hook/doorbird' . $this->InstanceID . '?doorbirdevent=doorbell&id=111';
		// $URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/notification.cgi?event=doorbell&subscribe=' . $selectiondoorbell . '&relaxation=' . $relaxationdoorbell . '&user=' . $webhookusername . '&password=' . $webhookpassword . '&url=' . $prefixips . $hostips . ':' . $portips . '/hook/doorbird' . $this->InstanceID . '?doorbirdevent=doorbell';
		$this->SendDebug("Doorbird", "Add Favorite 111 IPSDoorbell", 0);
		$this->SendDoorbird($URL);
		IPS_Sleep(300);
		//motionsensor
		$URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/favorites.cgi?action=save&type=http&title=IPSMotionsensor&value=' . $prefixips . $webhookusername . ':' . $webhookpassword . '@' . $hostips . ':' . $portips . '/hook/doorbird' . $this->InstanceID . '?doorbirdevent=motionsensor&id=112';
		// $URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/notification.cgi?event=motionsensor&subscribe=' . $selectionmotionsensor . '&relaxation=' . $relaxationmotionsensor . '&user=' . $webhookusername . '&password=' . $webhookpassword . '&url=' . $prefixips . $hostips . ':' . $portips . '/hook/doorbird' . $this->InstanceID . '?doorbirdevent=motionsensor';
		$this->SendDebug("Doorbird", "Add Favorite 112 IPSMotionsensor", 0);
		$this->SendDoorbird($URL);
		IPS_Sleep(300);
		//dooropen
		$URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/favorites.cgi?action=save&type=http&title=IPSDooropen&value=' . $prefixips . $webhookusername . ':' . $webhookpassword . '@' . $hostips . ':' . $portips . '?doorbirdevent=dooropen&id=113';
		// $URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/notification.cgi?event=dooropen&subscribe=' . $selectiondooropen . '&relaxation=' . $relaxationdooropen . '&user=' . $webhookusername . '&password=' . $webhookpassword . '&url=' . $prefixips . $hostips . ':' . $portips . '/hook/doorbird' . $this->InstanceID . '?doorbirdevent=dooropen';
		$this->SendDebug("Doorbird", "Add Favorite 113 IPSDooropen", 0);
		$this->SendDoorbird($URL);

		$schedule = $this->GetSchedule();
		$data = json_decode($schedule);
		foreach ($data as $key => $entry) {
			if ($entry->input == "doorbell") {
				$output = $entry->output;
				foreach ($output as $outputentry) {
					$event = $outputentry->event;
					$param = $outputentry->param;
					if ($event == "http" && $param == "111") {
						$this->SendDebug("Doorbird", "schedule with favorite 111 exists", 0);
					} else {
						$this->SendDebug("Doorbird", "create schedule with favorite 111", 0);
						$this->AddHTTPDoorbellSchedule();
					}
				}
			}
			if ($entry->input == "motion") {
				$output = $entry->output;
				var_dump($output);
				foreach ($output as $outputentry) {
					$event = $outputentry->event;
					$param = $outputentry->param;
					if ($event == "http" && $param == "112") {
						$this->SendDebug("Doorbird", "schedule with favorite 112 exists", 0);
					} else {
						$this->SendDebug("Doorbird", "create schedule with favorite 112", 0);
						$this->AddHTTPMotionSchedule();
					}
				}
			}
		}
		$current_schedule = $this->GetSchedule();
		$this->SetValue('DoorbirdReturn', $current_schedule);
	}

	public function SendDoorbird(string $URL)
	{
		$doorbirduser = $this->ReadPropertyString('User');
		$doorbirdpassword = $this->ReadPropertyString('Password');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, "$doorbirduser:$doorbirdpassword");
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
		$this->SendDebug("Doorbird", "Status Code " . $status_code, 0);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	public function GetFavorites()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);

		$URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/favorites.cgi';
		$result = $this->SendDoorbird($URL);
		return $result;
	}

	public function DeleteFavorites(int $id, string $type)
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);

		$URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/favorites.cgi?action=remove&type=' . $type . '&id=' . $id;
		$result = $this->SendDoorbird($URL);
		return $result;
	}

	public function GetSchedule()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);

		$URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/schedule.cgi';
		$result = $this->SendDoorbird($URL);
		return $result;
	}

	public function AddSchedule(string $schedule)
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);

		$URL = $prefixdoorbird . $hostdoorbird . ':' . $portdoorbell . '/bha-api/schedule.cgi';
		$result = $this->SendDoorbirdPOST($URL, $schedule);
		return $result;
	}

	protected function AddHTTPDoorbellSchedule()
	{
		$postdata =
			[
				'input' => 'doorbell',
				'param' => '1',
				'output' => [[
					'enabled' => '1',
					'event' => 'notify',
					'param' => '',
					'schedule' => [
						'weekdays' => [[
							'from' => '0',
							'to' => '604799'
						]]
					]
				],
					[
						'enabled' => '1',
						'event' => 'http',
						'param' => '111',
						'schedule' => [
							'weekdays' => [[
								'from' => '0',
								'to' => '604799'
							]]
						]
					]]
			];
		$data_json = json_encode($postdata);
		$result = $this->AddSchedule($data_json);
		return $result;
	}

	protected function AddHTTPMotionSchedule()
	{
		$postdata =
			[
				'input' => 'motion',
				'param' => '',
				'output' => [[
					'enabled' => '1',
					'event' => 'notify',
					'param' => '',
					'schedule' => [
						'weekdays' => [[
							'from' => '0',
							'to' => '604799'
						]]
					]
				],
					[
						'enabled' => '1',
						'event' => 'http',
						'param' => '112',
						'schedule' => [
							'weekdays' => [[
								'from' => '0',
								'to' => '604799'
							]]
						]
					]]
			];
		$data_json = json_encode($postdata);
		$result = $this->AddSchedule($data_json);
		return $result;
	}

	protected function SendDoorbirdPOST(string $URL, string $data_json)
	{
		$doorbirduser = $this->ReadPropertyString('User');
		$doorbirdpassword = $this->ReadPropertyString('Password');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, "$doorbirduser:$doorbirdpassword");
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
		$this->SendDebug("Doorbird Status Code", $status_code, 0);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	public function GetInfo()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird . $hostdoorbird . '/bha-api/info.cgi';
		$result = $this->SendDoorbird($URL);
		$this->SendDebug("Doorbird Info:", $result, 0);
		$result = json_decode($result);
		if(isset($result->BHA->VERSION[0]->FIRMWARE))
		{
			$firmware = $result->BHA->VERSION[0]->FIRMWARE;
			$this->SetValue('FirmwareVersion', $firmware);
		}
		if(isset($result->BHA->VERSION[0]->BUILD_NUMBER))
		{
			$buildnumber = $result->BHA->VERSION[0]->BUILD_NUMBER;
			$this->SetValue('Buildnumber', $buildnumber);
		}
		if(isset($result->BHA->VERSION[0]->WIFI_MAC_ADDR))
		{
			$wifimacaddr = $result->BHA->VERSION[0]->WIFI_MAC_ADDR;
			$this->SetValue('MACAdress', $wifimacaddr);
		}
		return $result;
	}

	public function GetHistory()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$name = "Doorbird Klingel";
		$ident = "DoorbirdRingPic";
		$picturename = "doorbirdringpic_";
		for ($i = 1; $i <= 20; $i++) {
			$URL = $prefixdoorbird . $hostdoorbird . '/bha-api/history.cgi?index=' . $i;
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
				$ImageFile = IPS_GetKernelDir() . "media" . DIRECTORY_SEPARATOR . $picturename . $i . ".jpg";  // Image-Datei
				IPS_SetMediaFile($MediaID, $ImageFile, False);    // Image im MedienPool mit Image-Datei verbinden
				//$savetime = date('d.m.Y H:i:s');
				//IPS_SetName($MediaID, $name." ".$i." ".$savetime); // Medienobjekt benennen
				IPS_SetName($MediaID, $name . " " . $i); // Medienobjekt benennen
				//IPS_SetInfo ($MediaID, $savetime);
				IPS_SetMediaContent($MediaID, base64_encode($Content));  //Bild Base64 codieren und ablegen
				IPS_SendMediaEvent($MediaID); //aktualisieren
			} else {
				//$savetime = date('d.m.Y H:i:s');
				//IPS_SetName($MediaID, $name." ".$currentsnapshotid." ".$savetime); // Medienobjekt benennen
				//IPS_SetInfo ($MediaID, $savetime);
				IPS_SetMediaContent($MediaID, base64_encode($Content));  //Bild Base64 codieren und ablegen
				IPS_SendMediaEvent($MediaID); //aktualisieren
			}
			IPS_Sleep(200);
		}
	}

	public function GetSnapshot()
	{
		$name = "Doorbird Snapshot";
		$ident = "DoorbirdSnapshotPic";
		$picturename = "doorbirdsnapshot_";
		$picturelimit = $this->ReadPropertyInteger('picturelimitsnapshot');
		$catid = $this->ReadPropertyInteger('categorysnapshot');
		if ($catid > 0) {
			$this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid);
		} else {
			$this->SendDebug("Doorbird", "No category is set, please set category.", 0);
			IPS_LogMessage("Doorbird", "Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.");
			echo "Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.";
		}
	}

	public function GetRingPicture()
	{
		$name = "Doorbird Klingel";
		$ident = "DoorbirdRingPic";
		$picturename = "doorbirdringpic_";
		$picturelimit = $this->ReadPropertyInteger('picturelimitring');
		$catid = $this->ReadPropertyInteger('categoryhistory');
		if ($catid > 0) {
			$this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid);
		} else {
			$this->SendDebug("Doorbird", "No category is set, please set category.", 0);
			IPS_LogMessage("Doorbird", "Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.");
			echo "Es wurde keine Kategorie gesetzt. Die Funktion wurde nicht ausgeführt.";
		}
	}

	private function GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid)
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird . $hostdoorbird . '/bha-api/image.cgi';
		$Content = $this->SendDoorbird($URL);
		//lastsnapshot bestimmen
		$mediaids = IPS_GetChildrenIDs($catid);
		$countmedia = count($mediaids);
		$lastsnapshot = $countmedia;
		if ($lastsnapshot == $picturelimit) {
			//neu beschreiben und Bilder um +1 neu zuordnen
			//Images base 64 codiert in allmedia einlesen

			$allmedia = $this->GetallImages($mediaids);
			if ($allmedia) {
				$lastmediaid = array_search($picturelimit, array_column($allmedia, 'picid'));
				unset ($allmedia[$lastmediaid]);
				//Neues Bild zu allmedia hinzufügen
				$allmedia = $this->AddCurrentPic($allmedia, $mediaids, $Content);
				//allmedia schreiben
				$this->SaveImagestoPicSlot($allmedia, $ident, $name, $catid);
			} else {
				$this->SendDebug("Doorbird", "No media image found", 0);
			}
		} else {
			// neues Mediaobjekt anlegen
			//testen ob im Medienpool existent
			$currentsnapshotid = $lastsnapshot + 1;
			$MediaID = @IPS_GetObjectIDByIdent($ident . $currentsnapshotid, $catid);
			if ($MediaID === false) {
				$MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
				IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie
				IPS_SetIdent($MediaID, $ident . $currentsnapshotid);
				IPS_SetPosition($MediaID, $currentsnapshotid);
				IPS_SetMediaCached($MediaID, true);
				// Das Cachen für das Mediaobjekt wird aktiviert.
				// Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
				// und zukünftig nur noch im Arbeitsspeicher verarbeitet.
				$ImageFile = IPS_GetKernelDir() . "media" . DIRECTORY_SEPARATOR . $picturename . $currentsnapshotid . ".jpg";  // Image-Datei
				IPS_SetMediaFile($MediaID, $ImageFile, False);    // Image im MedienPool mit Image-Datei verbinden

				if ($currentsnapshotid == 1) {
					//Auf Position 1 anlegen und beschreiben
					$savetime = date('d.m.Y H:i:s');
					IPS_SetName($MediaID, $name . " " . $currentsnapshotid . " " . $savetime); // Medienobjekt benennen
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
						$this->SendDebug("Doorbird", "No media image found", 0);
					}
				}

			}
		}
	}

	private function GetallImages($mediaids)
	{
		$countmedia = count($mediaids);
		if ($countmedia > 0) {
			$allmedia = array();
			for ($i = 0; $i <= ($countmedia - 1); $i++) {
				$mediakey = IPS_GetObject($mediaids[$i])['ObjectIdent'];
				$mediakey = explode("Pic", $mediakey);
				$mediakey = intval($mediakey[1]);
				//$name = IPS_GetName($mediaids[$i]);
				//$name = explode(" ", $name);
				//$savedate = $name[3];
				//$savetime = $name[4];
				//$saveinfo =  $savedate." ".$savetime;
				$saveinfo = IPS_GetObject($mediaids[$i])['ObjectInfo'];
				$allmedia[$i]['objid'] = $mediaids[$i];
				$allmedia[$i]['picid'] = $mediakey;
				$allmedia[$i]['saveinfo'] = $saveinfo;
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
			$picid = $media['picid'];
			$newpicid = $picid + 1;
			$mediaid = @IPS_GetObjectIDByIdent($ident . $newpicid, $catid);
			if ($mediaid) {
				$saveinfo = $media['saveinfo'];
				$imagebase64 = $media['imagebase64'];
				IPS_SetMediaContent($mediaid, $imagebase64);  //Bild Base64 codiert ablegen
				IPS_SetName($mediaid, $name . " " . $newpicid . " " . $saveinfo); // Medienobjekt benennen
				IPS_SetInfo($mediaid, $saveinfo);
				IPS_SendMediaEvent($mediaid); //aktualisieren
			} else {
				$this->SendDebug("Doorbird", "No picture with ident " . $ident . $newpicid . " found", 0);
			}
		}
	}

	private function AddCurrentPic($allmedia, $mediaids, $Content)
	{
		$lastid = count($allmedia);

		// Neues Bild ergänzen
		$allmedia[$lastid]['objid'] = $mediaids[0];
		$allmedia[$lastid]['picid'] = 0;
		$saveinfo = date('d.m.Y H:i:s');
		$allmedia[$lastid]['saveinfo'] = $saveinfo;
		$allmedia[$lastid]['imagebase64'] = base64_encode($Content);  //Bild Base64 codieren und ablegen;
		return $allmedia;
	}

	public function Light()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird . $hostdoorbird . '/bha-api/light-on.cgi';
		$result = $this->SendDoorbird($URL);
		return $result;
	}

	public function OpenDoor()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird . $hostdoorbird . '/bha-api/open-door.cgi';
		$result = $this->SendDoorbird($URL);
		return $result;
	}

	public function OpenDoorRelais(string $doorcontrollerID, int $relaisnumber)
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird . $hostdoorbird . '/bha-api/open-door.cgi?r=' . $doorcontrollerID . '@' . $relaisnumber;
		$result = $this->SendDoorbird($URL);
		return $result;
	}

	public function OpenDoorRelaisNumber(int $relaisnumber)
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird . $hostdoorbird . '/bha-api/open-door.cgi?r=' . $relaisnumber;
		$result = $this->SendDoorbird($URL);
		return $result;
	}


	public function RequestAction($Ident, $Value)
	{
		switch ($Ident) {
			case "DoorbirdButtonLight":
				$this->Light();
				break;
			case "DoorbirdButtonDoor":
				$this->OpenDoor();
				break;
			case "DoorbirdButtonSnapshot":
				$this->GetSnapshot();
				break;
			default:
				$this->SendDebug("Doorbird", "Invalid ident", 0);
		}
	}

	//Profile
	protected function RegisterProfileIntegerDoorbird($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize, $Digits)
	{

		if (!IPS_VariableProfileExists($Name)) {
			IPS_CreateVariableProfile($Name, 1);
		} else {
			$profile = IPS_GetVariableProfile($Name);
			if ($profile['ProfileType'] != 1)
				$this->SendDebug("Doorbird", "Variable profile type does not match for profile " . $Name, 0);
		}

		IPS_SetVariableProfileIcon($Name, $Icon);
		IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
		IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
		IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize); // string $ProfilName, float $Minimalwert, float $Maximalwert, float $Schrittweite

	}

	protected function RegisterProfileIntegerDoorbirdAss($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Associations)
	{
		if (sizeof($Associations) === 0) {
			$MinValue = 0;
			$MaxValue = 0;
		}
		/*
		else {
            //undefiened offset
			$MinValue = $Associations[0][0];
            $MaxValue = $Associations[sizeof($Associations)-1][0];
        }
        */
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
			if ($profile['ProfileType'] != 3)
				$this->SendDebug("Doorbird", "Variable profile type does not match for profile " . $Name, 0);
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

	//Configuration Form
	public function GetConfigurationForm()
	{
		$formhead = $this->FormHead();
		$formactions = $this->FormActions();
		$formelementsend = '{ "type": "Label", "label": "__________________________________________________________________________________________________" }';
		$formstatus = $this->FormStatus();
		return '{ ' . $formhead . $formelementsend . '],' . $formactions . $formstatus . ' }';
	}

	//Check if notification setup is already done. Otherwise show a button to create it
	private function isNotificationInstanceValid()
	{
		$doorbirdreturn = GetValue($this->GetIDForIdent('DoorbirdReturn'));
		if ($doorbirdreturn == "") {
			$form = '{ "type": "Label", "label": "Please fill in all fields in this form and then press the button below for the notification setup of the Doorbird for IP-Symcon"},
				{ "type": "Label", "label": "Setup notifications from doorbird to IP-Symcon" },
				{ "type": "Button", "label": "Setup Notification", "onClick": "Doorbird_SetupNotification($id);" },';
		} else {
			$form = '';
		}
		return $form;
	}


	protected function FormHead()
	{
		$form = '"elements":
            [
               { "type": "Select", "name": "model", "caption": "model",
					"options": [
						{ "label": "D101", "value": 1 },
						{ "label": "D202", "value": 2 },
						{ "label": "D2101V", "value": 3 },
						{ "label": "D2102V", "value": 4 },
						{ "label": "D2103V", "value": 5 },
						{ "label": "D21DKV", "value": 6 },
						{ "label": "D21DKH", "value": 7 }
					]
				},
               ' . $this->isNotificationInstanceValid() . '
                { "type": "Label", "label": "IP adress or hostname Doorbird" },
                {
                    "name": "Host",
                    "type": "ValidationTextBox",
                    "caption": "IP Doorbird"
                },
				{ "type": "Label", "label": "port of Doorbell" },
				{ "type": "NumberSpinner", "name": "PortDoorbell", "caption": "Port Doorbell" },
				{ "type": "Label", "label": "Doorbird login credentials" },
				{ "type": "Label", "label": "Doorbird user with authorization as API-Operator" },
                {
                    "name": "User",
                    "type": "ValidationTextBox",
                    "caption": "User"
                },
				{
                    "name": "Password",
                    "type": "ValidationTextBox",
                    "caption": "Password"
                },
                { "type": "Label", "label": "Doorbird user with ID 0001 for data decryption" },
                {
                    "name": "User_1",
                    "type": "ValidationTextBox",
                    "caption": "User 0001"
                },
				{
                    "name": "Password_1",
                    "type": "ValidationTextBox",
                    "caption": "Password for user 0001"
                },
				{ "type": "Label", "label": "category for doorbird ring pictures, please create first a category in the objekt tree of IP-Symcon and then select it in the field below" },
				{ "type": "Label", "label": "doorbird ring pictures category" },
				{ "type": "SelectCategory", "name": "categoryhistory", "caption": "ring pictures" },
				{ "type": "Label", "label": "picture limit for doorbird ring pictures" },
				{ "type": "NumberSpinner", "name": "picturelimitring", "caption": "limit ring pictures", "digits": 0},
				{ "type": "Label", "label": "category for doorbird snapshots pictures, please create first a category in the objekt tree of IP-Symcon and then select it in the field below" },
				{ "type": "Label", "label": "doorbird snapshot pictures category" },
				{ "type": "SelectCategory", "name": "categorysnapshot", "caption": "snapshot pictures" },
				{ "type": "Label", "label": "picture limit for doorbird snapshots pictures" },
				{ "type": "NumberSpinner", "name": "picturelimitsnapshot", "caption": "limit snapshots", "digits": 0},
				{ "type": "Label", "label": "IP adress IP-Symcon Server" },
                {
                    "name": "IPSIP",
                    "type": "ValidationTextBox",
                    "caption": "IP adress"
                },
				{ "type": "Label", "label": "port of IP-Symcon" },
				{ "type": "NumberSpinner", "name": "PortIPS", "caption": "Port IPS" },
				{ "type": "Label", "label": "notification preferences" },
				{ "type": "Label", "label": "parameter relaxation:  min 10s max 10000s" },
				{ "type": "Label", "label": "notification activ for:" },
				{
                    "name": "doorbell",
                    "type": "CheckBox",
                    "caption": "doorbell"
                },
				{ "type": "Label", "label": "Relaxation time for doorbell (seconds)" },
				{ "type": "NumberSpinner", "name": "relaxationdoorbell", "caption": "relaxation (s)", "digits": 0},
				{
                    "name": "motionsensor",
                    "type": "CheckBox",
                    "caption": "motionsensor"
                },
				{ "type": "Label", "label": "Relaxation time for motionsensor (seconds)" },
				{ "type": "NumberSpinner", "name": "relaxationmotionsensor", "caption": "relaxation (s)", "digits": 0},
				{
                    "name": "dooropen",
                    "type": "CheckBox",
                    "caption": "door open"
                },
				{ "type": "Label", "label": "Relaxation time for dooropen (seconds)" },
				{ "type": "NumberSpinner", "name": "relaxationdooropen", "caption": "relaxation (s)", "digits": 0},
				{ "type": "Label", "label": "optionally notification via email (configurated SMTP module required)" },
				{ "type": "Label", "label": "active email notification" },';
		$form .= $this->FormShowEmail();
		$form .= '{ "type": "Label", "label": "if there are problems with the live image in the webfront you can active alterative view" },
				{
                    "name": "altview",
                    "type": "CheckBox",
                    "caption": "alternative view"
                },
				{ "type": "Label", "label": "Connection from Doorbird to IP-Symcon" },
				{ "type": "Label", "label": "authentication for Doorbird webhook" },
				{ "name": "webhookusername", "type": "ValidationTextBox", "caption": "username" },
				{ "type": "PasswordTextBox", "name": "webhookpassword", "caption": "password" },';

		return $form;
	}

	protected function FormShowEmail()
	{
		$activeemail2 = $this->ReadPropertyBoolean("activeemail2");
		$activeemail3 = $this->ReadPropertyBoolean("activeemail3");
		$activeemail4 = $this->ReadPropertyBoolean("activeemail4");
		$activeemail5 = $this->ReadPropertyBoolean("activeemail5");
		$activeemail6 = $this->ReadPropertyBoolean("activeemail6");
		$activeemail7 = $this->ReadPropertyBoolean("activeemail7");
		$activeemail8 = $this->ReadPropertyBoolean("activeemail8");
		$activeemail9 = $this->ReadPropertyBoolean("activeemail9");
		$activeemail10 = $this->ReadPropertyBoolean("activeemail10");
		$activeemail11 = $this->ReadPropertyBoolean("activeemail11");

		$form = '{
                    "name": "activeemail",
                    "type": "CheckBox",
                    "caption": "active email"
                },
				{ "type": "SelectInstance", "name": "smtpmodule", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail2",
                    "type": "CheckBox",
                    "caption": "active email 2"
                },';
		if ($activeemail2) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule2", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email2",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject2",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext2",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail3",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail3) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule3", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email3",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject3",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext3",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail4",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail4) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule4", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email4",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject4",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext4",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail5",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail5) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule5", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email5",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject5",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext5",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail6",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail6) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule6", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email6",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject6",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext6",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail7",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail7) {
			$form .= '
				{ "type": "SelectInstance", "name": "smtpmodule7", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email7",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject7",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext7",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail8",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail8) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule8", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email8",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject8",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext8",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail9",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail9) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule9", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email9",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject9",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext9",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail10",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail10) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule10", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email10",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject10",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext10",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },
                {
                    "name": "activeemail11",
                    "type": "CheckBox",
                    "caption": "active email"
                },';
		}
		if ($activeemail11) {
			$form .= '{ "type": "SelectInstance", "name": "smtpmodule11", "caption": "SMTP module" },
				{ "type": "Label", "label": "notification email adress" },
                {
                    "name": "email11",
                    "type": "ValidationTextBox",
                    "caption": "email"
                },
				{ "type": "Label", "label": "email subject" },
                {
                    "name": "subject11",
                    "type": "ValidationTextBox",
                    "caption": "subject"
                },
				{ "type": "Label", "label": "email text" },
                {
                    "name": "emailtext11",
                    "type": "ValidationTextBox",
                    "caption": "email text"
                },';
		}
		return $form;
	}

	protected function FormActions()
	{
		$form = '"actions":
			[
				{ "type": "Label", "label": "Setup notifications from doorbird to IP-Symcon" },
				{ "type": "Button", "label": "Setup Notification", "onClick": "Doorbird_SetupNotification($id);" },
				{ "type": "Label", "label": "Get buildnumber, WLAN MAC and firmwareversion of Doorbird" },
				{ "type": "Button", "label": "get info", "onClick": "Doorbird_GetInfo($id);" },
				{ "type": "Label", "label": "Get snapshot from the doorbird camera" },
				{ "type": "Button", "label": "get snapshoot", "onClick": "Doorbird_GetSnapshot($id);" },
				{ "type": "Button", "label": "open door", "onClick": "Doorbird_OpenDoor($id);" },
				{ "type": "Label", "label": "turn on ir light of doorbird" },
				{ "type": "Button", "label": "ir light", "onClick": "Doorbird_Light($id);" }
			],';
		return $form;

	}

	protected function FormStatus()
	{
		$form = '"status":
            [
                {
                    "code": 101,
                    "icon": "inactive",
                    "caption": "Creating instance."
                },
				{
                    "code": 102,
                    "icon": "active",
                    "caption": "Doorbird accessible."
                },
                {
                    "code": 104,
                    "icon": "inactive",
                    "caption": "interface closed."
                },
                {
                    "code": 202,
                    "icon": "error",
                    "caption": "Doorbird IP adress must not empty."
                },
				{
                    "code": 203,
                    "icon": "error",
                    "caption": "No valid IP adress or host."
                },
                {
                    "code": 204,
                    "icon": "error",
                    "caption": "connection to Doorbird lost."
                },
				{
                    "code": 205,
                    "icon": "error",
                    "caption": "field must not be empty."
                },
				{
                    "code": 206,
                    "icon": "error",
                    "caption": "category must not be empty."
                },
				{
                    "code": 207,
                    "icon": "error",
                    "caption": "email not valid."
                },
                {
                    "code": 208,
                    "icon": "error",
                    "caption": "category doorbird snapshot not set."
                },
                {
                    "code": 209,
                    "icon": "error",
                    "caption": "category doorbird history not set."
                }
            ]';
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

?>