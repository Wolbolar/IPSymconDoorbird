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
		$this->RegisterPropertyString("User", "");
		$this->RegisterPropertyString("Password", "");
		$this->RegisterPropertyInteger("picturelimitring", 20);
		$this->RegisterPropertyInteger("picturelimitsnapshot", 20);
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
		$this->RegisterVariableString("DoorbirdReturn", "Doorbird Return", "~String", 25);
		$this->RegisterVariableInteger("DoorbirdSnapshotCounter", "Doorbird Snapshot Counter", "", 26);
		$this->RegisterVariableInteger("DoorbirdRingCounter", "Doorbird Ring Counter", "", 26);
		$lightass =  Array(
				Array(0, "Licht einschalten",  "Light", -1)
				);
		$doorass =  Array(
				Array(0, "Tür öffnen",  "LockOpen", -1)
				);
		$snapass =  Array(
				Array(0, "Bild speichern",  "Image", -1)
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
		IPS_SetHidden($this->GetIDForIdent('DoorbirdReturn'), true);
		IPS_SetHidden($this->GetIDForIdent('DoorbirdSnapshotCounter'), true);
		IPS_SetHidden($this->GetIDForIdent('DoorbirdRingCounter'), true);
		SetValue($this->GetIDForIdent('DoorbirdSnapshotCounter'), 0);
		SetValue($this->GetIDForIdent('DoorbirdRingCounter'), 0);
		$this->RegisterVariableInteger("ObjIDHist", "ObjektId History", "", 13);
		IPS_SetHidden($this->GetIDForIdent('ObjIDHist'), true);
		$this->RegisterVariableInteger("ObjIDSnap", "ObjektId Snapshot", "", 14);
		IPS_SetHidden($this->GetIDForIdent('ObjIDSnap'), true);
		
		
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
				SetValueString($this->GetIDForIdent('DoorbirdVideo'), $DoorbirdVideoHTML);
				
				//prüfen ob Script existent
				$SkriptID = @IPS_GetScriptIDByName("Doorbird IPS Interface", $this->InstanceID);
				if ($SkriptID === false)
					{
						$ID = $this->RegisterScript("DoorbirdIPSInterface", "Doorbird IPS Interface", $this->CreateWebHookScript(), 19);
						IPS_SetHidden($ID, true);
						$this->RegisterHook('/hook/doorbird' . $this->InstanceID, $ID);
					}
				else
					{
						//echo "Die Skript-ID lautet: ". $SkriptID;
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
				
				//Skript bei Bewegung				
				$IDSnapshot = @($this->GetIDForIdent('GetDoorbirdSnapshot'));
				if ($IDSnapshot === false)
					{
						$IDSnapshot = $this->RegisterScript("GetDoorbirdSnapshot", "Get Doorbird Snapshot", $this->CreateSnapshotScript(), 17);
						IPS_SetHidden($IDSnapshot, true);
						$this->SetSnapshotEvent($IDSnapshot);
					}
				else
					{
						//echo "Die Skript-ID lautet: ". $SkriptID;
					}
				
				//Skript beim Klingeln	
				$IDRing = @($this->GetIDForIdent('GetDoorbirdRingPic'));
				if ($IDRing === false)
					{
						$IDRing = $this->RegisterScript("GetDoorbirdRingPic", "Get Doorbird Ring Picture", $this->CreateRingPictureScript(), 18);
						IPS_SetHidden($IDRing, true);
						$this->SetRingEvent($IDRing);
					}
				else
					{
						//echo "Die Skript-ID lautet: ". $SkriptID;
					}	
					
				//Kategorie anlegen
				$objidhis = $this->GetIDForIdent('ObjIDHist');
				$objidsnap = $this->GetIDForIdent('ObjIDSnap');
				//$CatIDHistory = @($this->GetIDForIdent('DoorbirdKatHistory'));
				$CatIDHistory = GetValue($objidhis);
				
				//if ($CatIDHistory === false)
				if ($CatIDHistory === 0)	
				{
					$CatIDHistory = IPS_CreateCategory();       // Kategorie anlegen
					$ParentID = IPS_GetParent ($this->InstanceID);
					IPS_SetName($CatIDHistory, "Doorbird Klingelhistorie"); // Kategorie benennen
					IPS_SetParent($CatIDHistory, $ParentID); // Kategorie einsortieren
					IPS_SetIdent ($CatIDHistory, "DoorbirdKatHistory");
					SetValue($objidhis, $CatIDHistory);
				}
						
				//$CatIDSnapshot = @($this->GetIDForIdent('DoorbirdKatSnapshots'));
				$CatIDSnapshot = GetValue($objidsnap);
				//if ($CatIDSnapshot === false)
				if ($CatIDSnapshot === 0)
				{
					$CatIDSnapshot = IPS_CreateCategory();       // Kategorie anlegen
					$ParentID = IPS_GetParent ($this->InstanceID);
					IPS_SetName($CatIDSnapshot, "Doorbird Besucherhistorie"); // Kategorie benennen
					IPS_SetParent($CatIDSnapshot, $ParentID); // Kategorie einsortieren
					IPS_SetIdent ($CatIDHistory, "DoorbirdKatSnapshots");
					SetValue($objidsnap, $CatIDSnapshot);	
				}			
				
				$change = true;
				// Status Aktiv
				$this->SetStatus(102);	
			}
		
		//Import Kategorie für History und Snapshot
		/*
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
		*/	
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
	
	private function CreateRingPictureScript()
	{
		$Script = '<?
//Do not delete or modify.
Doorbird_GetRingPicture('.$this->InstanceID.');		
?>';	
		return $Script;	
	}
	
	private function SetSnapshotEvent(integer $IDSnapshot)
	{
		//prüfen ob Event existent
		$ParentID = $IDSnapshot;

		$EreignisID = @($this->GetIDForIdent('EventGetDoorbirdSnapshot'));
		if ($EreignisID === false)
			{
				$EreignisID = IPS_CreateEvent (0);
				IPS_SetName($EreignisID, "GetDoorbirdSnapshot");
				IPS_SetIdent ($EreignisID, "EventGetDoorbirdSnapshot");
				IPS_SetEventTrigger($EreignisID, 0,  $this->GetIDForIdent('LastMovement'));   //bei Variablenaktualisierung
				IPS_SetParent($EreignisID, $ParentID);
				IPS_SetEventActive($EreignisID, true);             //Ereignis aktivieren	
			}
			
		else
			{
			//echo "Die Ereignis-ID lautet: ". $EreignisID;	
			}
	}
	
	private function SetRingEvent(integer $IDRing)
	{
		//prüfen ob Event existent
		$ParentID = $IDRing;

		$EreignisID = @($this->GetIDForIdent('EventGetDoorbirdRingPic'));
		if ($EreignisID === false)
			{
				$EreignisID = IPS_CreateEvent (0);
				IPS_SetName($EreignisID, "GetDoorbirdRingPic");
				IPS_SetIdent ($EreignisID, "EventGetDoorbirdRingPic");
				IPS_SetEventTrigger($EreignisID, 0,  $this->GetIDForIdent('LastRingtone'));   //bei Variablenaktualisierung
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
					SetValue($ringid, date('d.m.y H:i:s'));
				}
			elseif ($data == "motionsensor")
				{
					SetValue($movementid, date('d.m.y H:i:s'));
				}
			elseif ($data == "dooropen")
				{
					SetValue($doorid, date('d.m.y H:i:s'));
				}
			}	
	}
	
	//Profile zuweisen und Geräte anlegen
	public function SetupNotification()
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		$ipsip = $this->ReadPropertyString('IPSIP');
		//doorbell
		$URL='http://'.$doorbirdip.'/bha-api/notification.cgi?event=doorbell&subscribe=1&url=http://'.$ipsip.':3777/hook/doorbird'.$this->InstanceID.'?doorbirdevent=doorbell';
		$result = $this->SendDoorbird($URL);
		IPS_Sleep(300);
		//motionsensor
		$URL='http://'.$doorbirdip.'/bha-api/notification.cgi?event=motionsensor&subscribe=1&url=http://'.$ipsip.':3777/hook/doorbird'.$this->InstanceID.'?doorbirdevent=motionsensor';
		$result = $this->SendDoorbird($URL);
		IPS_Sleep(300);
		//dooropen
		$URL='http://'.$doorbirdip.'/bha-api/notification.cgi?event=dooropen&subscribe=1&url=http://'.$ipsip.':3777/hook/doorbird'.$this->InstanceID.'?doorbirdevent=dooropen';
		$result = $this->SendDoorbird($URL);
		SetValueString($this->GetIDForIdent('DoorbirdReturn'),$result);
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
			$catid = GetValue($this->GetIDForIdent('ObjIDHist'));
			
			$MediaID = @IPS_GetObjectIDByIdent("DoorbirdHistoryPic".$i, $catid);
			if ($MediaID === false)
				{
					$MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
					IPS_SetMediaCached($MediaID, true);
					// Das Cachen für das Mediaobjekt wird aktiviert.
					// Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
					// und zukünftig nur noch im Arbeitsspeicher verarbeitet.
					IPS_SetMediaFile($MediaID, $doorbirdimage, false);   // Image im MedienPool mit Image-Datei verbinden
					IPS_SetName($MediaID, "Doorbird Historie ".$i." ".date('d.m.Y H:i:s')); // Medienobjekt benennen
					IPS_SetIdent ($MediaID, "DoorbirdHistoryPic".$i);
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
		$name = "Doorbird Snapshot";
		$ident = "DoorbirdSnapshotPic";
		$picturename = "doorbirdsnapshot_";
		$picturelimit = $this->ReadPropertyInteger('picturelimitsnapshot');
		$counterid = $this->GetIDForIdent('DoorbirdSnapshotCounter');
		$catid = GetValue($this->GetIDForIdent('ObjIDSnap'));
		$this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $counterid, $catid);
	}
	
	public function GetRingPicture()
	{
		$name = "Doorbird Klingel";
		$ident = "DoorbirdRingPic";
		$picturename = "doorbirdringpic_";
		$picturelimit = $this->ReadPropertyInteger('picturelimitring');
		$counterid = $this->GetIDForIdent('DoorbirdRingCounter');
		$catid = GetValue($this->GetIDForIdent('ObjIDHist'));
		$this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $counterid, $catid);
	}
	
	private function GetImageDoorbell($name, $ident, $picturename, $picturelimit, $counterid, $catid)
	{
		$doorbirdip = $this->ReadPropertyString('Host');
		$URL='http://'.$doorbirdip.'/bha-api/image.cgi';
		$Content = $this->SendDoorbird($URL);
		$lastsnapshot = GetValue($counterid);
		if ($lastsnapshot == $picturelimit)
			{
			   $currentsnapshotid = 1;
			   SetValue($counterid, 0);
			}
		else
			{
			   $currentsnapshotid = $lastsnapshot + 1;
			   SetValue($counterid, $currentsnapshotid);
			}
		$doorbirdimage = IPS_GetKernelDir()."media".DIRECTORY_SEPARATOR.$picturename.$currentsnapshotid.".png";  // Raspberry

		// Bild in Datei speichern
		file_put_contents($doorbirdimage, $Content);

		//testen ob im Medienpool existent
		$MediaID = @IPS_GetObjectIDByIdent($ident.$currentsnapshotid, $catid);
		if ($MediaID === false)
			{
				$MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
				IPS_SetMediaCached($MediaID, true);
				// Das Cachen für das Mediaobjekt wird aktiviert.
				// Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
				// und zukünftig nur noch im Arbeitsspeicher verarbeitet.
				IPS_SetMediaFile($MediaID, $doorbirdimage, false);   // Image im MedienPool mit Image-Datei verbinden
				//IPS_SetName($MediaID, $name." ".$currentsnapshotid); // Medienobjekt benennen
				IPS_SetName($MediaID, $name." ".$currentsnapshotid." ".date('d.m.Y H:i:s')); // Medienobjekt benennen
				IPS_SetIdent ($MediaID, $ident.$currentsnapshotid);
				IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie Historie
				IPS_SetPosition($MediaID, $currentsnapshotid);
			}
		else
			{
			  IPS_SetMediaFile($MediaID, $doorbirdimage, false);   // Image im MedienPool mit Image-Datei verbinden
			  IPS_SetName($MediaID, $name." ".$currentsnapshotid." ".date('d.m.Y H:i:s')); // Medienobjekt benennen
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
        switch($Ident) {
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
                throw new Exception("Invalid ident");
        }
    }
	
	//Profile
	protected function RegisterProfileIntegerDoorbird($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize, $Digits)
	{
        
        if(!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 1);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if($profile['ProfileType'] != 1)
            throw new Exception("Variable profile type does not match for profile ".$Name);
        }
        
        IPS_SetVariableProfileIcon($Name, $Icon);
        IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
		IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
        IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize); // string $ProfilName, float $Minimalwert, float $Maximalwert, float $Schrittweite
        
    }
	
	protected function RegisterProfileIntegerDoorbirdAss($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Associations)
	{
        if ( sizeof($Associations) === 0 ){
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
        foreach($Associations as $Association) {
            IPS_SetVariableProfileAssociation($Name, $Association[0], $Association[1], $Association[2], $Association[3]);
        }
        
    }
	
}

?>