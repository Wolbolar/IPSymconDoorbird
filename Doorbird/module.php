<?
define("IPS_BASE", 10000);
define("IPS_INSTANCEMESSAGE", IPS_BASE + 500);
define("IM_CHANGESTATUS", IPS_INSTANCEMESSAGE + 5);

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
		$this->RegisterPropertyInteger("PortDoorbell", 80);
		$this->RegisterPropertyString("IPSIP", "");
		$this->RegisterPropertyInteger("PortIPS", 3777);
		$this->RegisterPropertyString("User", "");
		$this->RegisterPropertyString("Password", "");
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
		$this->RegisterPropertyBoolean("altview", false);
		$this->RegisterPropertyString("subject", "Doorbell Klingel!");
		$this->RegisterPropertyString("emailtext", "Da hat jemand an der Tür geklingelt, aber du bist leider nicht da!");
		$this->RegisterPropertyString("webhookusername", "ipsymcon");
		$this->RegisterPropertyString("webhookpassword", "user@h0me");	
    }

    public function ApplyChanges()
    {
	//Never delete this line!
        parent::ApplyChanges();
		
		$this->RegisterVariableString("DoorbirdVideo", "Doorbird Video", "~HTMLBox", 1);
		$this->RegisterProfileStringDoorbird("Doorbird.Ring", "Alert");
		$this->RegisterVariableString("LastRingtone", "Zeitpunkt letztes Klingelsignal", "Doorbird.Ring", 2);
		$this->RegisterProfileStringDoorbird("Doorbird.Movement", "Motion");
		$this->RegisterVariableString("LastMovement", "Zeitpunkt letzte Bewegung", "Doorbird.Movement", 3);
		$this->RegisterProfileStringDoorbird("Doorbird.LastDoor", "LockOpen");
		$this->RegisterVariableString("LastDoorOpen", "Zeitpunkt letzte Türöffnung", "Doorbird.LastDoor", 4);
		$this->RegisterProfileStringDoorbird("Doorbird.Firmware", "Robot");
		$this->RegisterVariableString("FirmwareVersion", "Doorbird Firmware Version", "Doorbird.Firmware", 5);
		$this->RegisterProfileStringDoorbird("Doorbird.Buildnumber", "Gear");
		$this->RegisterVariableString("Buildnumber", "Doorbird Build Number", "Doorbird.Buildnumber", 6);
		$this->RegisterProfileStringDoorbird("Doorbird.MAC", "Notebook");
		$this->RegisterVariableString("MACAdress", "Doorbird WLAN MAC", "Doorbird.MAC", 7);
		$this->RegisterVariableString("DoorbirdReturn", "Doorbird Return", "~String", 25);
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
		
		
		$hostdoorbell = $this->ReadPropertyString('Host');
		$hostips = $this->ReadPropertyString('IPSIP');
		$doorbirduser = $this->ReadPropertyString('User');
		$password = $this->ReadPropertyString('Password');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$webhookusername = $this->ReadPropertyString('webhookusername');
		$webhookpassword = $this->ReadPropertyString('webhookpassword');
		
		//IP Doorbell prüfen
		if (!filter_var($hostdoorbell, FILTER_VALIDATE_IP) === false)
			{
				//IP ok
				$ipcheckdoorbird = true;
			}
		else
			{
				$ipcheckdoorbird = false;
			}
			
		//IP IP-Symcon prüfen
		if (!filter_var($hostips, FILTER_VALIDATE_IP) === false)
			{
				//IP ok
				$ipcheckips = true;
			}
		else
			{
				$ipcheckips = false;
			}	
			
		//Domain Doorbell prüfen
		if(!$this->is_valid_domain($hostdoorbell) === false)
		{
			//Domain ok
			$domaincheckdoorbell = true;
		}
		else
		{
			$domaincheckdoorbell = false;
		}
		
		//Domain IP-Symcon prüfen
		if(!$this->is_valid_domain($hostips) === false)
		{
			//Domain ok
			$domaincheckips = true;
		}
		else
		{
			$domaincheckips = false;
		}
		
		if (($domaincheckdoorbell === true || $ipcheckdoorbird = true) && ($domaincheckips = true || $ipcheckips === true))
		{
			$hostcheck = true;
		}
		else
		{
			$hostcheck = false;
			$this->SetStatus(203); //IP Adresse oder Host ist ungültig
		}		
		$change = false;	
		//User und Passwort prüfen
		if ($doorbirduser == "" || $password == "" || $webhookusername == "" || $webhookpassword == "")
			{
				$this->SetStatus(205); //Felder dürfen nicht leer sein
			}
		elseif ($doorbirduser !== "" && $password !== "" && $hostcheck === true)
			{
				$selectionaltview = $this->ReadPropertyBoolean('altview');
				$prefix = $this->GetURLPrefix($hostdoorbell);
				if ($selectionaltview)
				{
					$DoorbirdVideoHTML = '<img src="'.$prefix.$hostdoorbell.':'.$portdoorbell.'/bha-api/video.cgi?http-user='.$doorbirduser.'&http-password='.$password.'" style="width: 960px; height:540px;" >';
				}
				else
				{
					$DoorbirdVideoHTML = '<iframe src="'.$prefix.$hostdoorbell.':'.$portdoorbell.'/bha-api/video.cgi?http-user='.$doorbirduser.'&http-password='.$password.'" border="0" frameborder="0" style= "width: 100%; height: 500px;"/></iframe>';
				}
				SetValueString($this->GetIDForIdent('DoorbirdVideo'), $DoorbirdVideoHTML);
				
				$ipsversion = $this->GetIPSVersion();
				if($ipsversion == 0)
				{
					//prüfen ob Script existent
					$SkriptID = @IPS_GetObjectIDByIdent("DoorbirdIPSInterface", $this->InstanceID);
					if ($SkriptID === false)
						{
							$ID = $this->RegisterScript("DoorbirdIPSInterface", "Doorbird IPS Interface", $this->CreateWebHookScript(), 19);
							IPS_SetHidden($ID, true);
							$this->RegisterHookOLD('/hook/doorbird' . $this->InstanceID, $ID);
						}
					else
						{
							//echo "Die Skript-ID lautet: ". $SkriptID;
						}
				}
				else
				{
					$SkriptID = @IPS_GetObjectIDByIdent("DoorbirdIPSInterface", $this->InstanceID);
					if ($SkriptID > 0)
					{
						$this->UnregisterHook("/hook/doorbird" . $this->InstanceID);
						$this->UnregisterScript("DoorbirdIPSInterface");
					}
					$this->RegisterHook("/hook/doorbird" . $this->InstanceID);
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

                if($ipsversion == 0)
                {
                    //Skript bei Bewegung
                    $IDSnapshot = @($this->GetIDForIdent('GetDoorbirdSnapshot'));
                    if ($IDSnapshot === false) {
                        $IDSnapshot = $this->RegisterScript("GetDoorbirdSnapshot", "Get Doorbird Snapshot", $this->CreateSnapshotScript(), 17);
                        IPS_SetHidden($IDSnapshot, true);
                        $this->SetSnapshotEvent($IDSnapshot);
                    }
                    else
                    {
                        //echo "Die Skript-ID lautet: ". $SkriptID;
                    }
                }
                else
                {
                    if($this->ReadPropertyInteger("LastMovement") > 0)
                    {
                        $this->RegisterMessage($this->ReadPropertyInteger("LastMovement"), IM_CHANGESTATUS);
                    }
                }

                if($ipsversion == 0)
                {
                    //Skript beim Klingeln
                    $IDRing = @($this->GetIDForIdent('GetDoorbirdRingPic'));
                    if ($IDRing === false) {
                        $IDRing = $this->RegisterScript("GetDoorbirdRingPic", "Get Doorbird Ring Picture", $this->CreateRingPictureScript(), 18);
                        IPS_SetHidden($IDRing, true);
                        $this->SetRingEvent($IDRing);
                    }
                    else
                    {
                        //echo "Die Skript-ID lautet: ". $SkriptID;
                    }
                }
                else
                {
                    if($this->ReadPropertyInteger("LastRingtone") > 0)
                    {
                        $this->RegisterMessage($this->ReadPropertyInteger("LastRingtone"), IM_CHANGESTATUS);
                    }
                }

                if($ipsversion >= 1)
                {
                    if($this->ReadPropertyInteger("LastDoorOpen") > 0)
                    {
                        $this->RegisterMessage($this->ReadPropertyInteger("LastDoorOpen"), IM_CHANGESTATUS);
                    }
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
				$this->SetupNotification();
				$this->GetInfo();
				
				//Email
				$emailalert = $this->ReadPropertyBoolean('activeemail');
				if ($emailalert)
				{
					$email = $this->ReadPropertyString('email');
					if ($email == "")
					{
						$this->SetStatus(205); //Felder dürfen nicht leer sein
					}
					if (filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						//email valid
                        if($ipsversion == 0)
                        {
                            //Skript beim EmailAlert
                            $IDEmail = @($this->GetIDForIdent('SendEmailAlert'));
                            if ($IDEmail === false)
                            {
                                $IDEmail = $this->RegisterScript("SendEmailAlert", "Email Alert", $this->CreateEmailAlertScript($email), 19);
                                IPS_SetHidden($IDEmail, true);
                            }
                            $this->SetEmailEvent($IDEmail, true);
                        }

					}
					else
					{
						
						$this->SetStatus(207); //email not valid
					}

				}
				else
				{
					$IDEmail = @($this->GetIDForIdent('SendEmailAlert'));
                    if($ipsversion == 0)
                    {
                        if ($IDEmail > 0) {
                            $this->SetEmailEvent($IDEmail, false);
                        }
                    }

				}
				
				
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
			
	private function RegisterHookOLD($WebHook, $TargetID)
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
	
	private function RegisterHook($WebHook)
		{
  			$ids = IPS_GetInstanceListByModuleID("{015A6EB8-D6E5-4B93-B496-0D3F77AE9FE1}");
  			if(sizeof($ids) > 0)
				{
  				$hooks = json_decode(IPS_GetProperty($ids[0], "Hooks"), true);
  				$found = false;
  				foreach($hooks as $index => $hook)
					{
					if($hook['Hook'] == $WebHook)
						{
						if($hook['TargetID'] == $this->InstanceID)
  							return;
						$hooks[$index]['TargetID'] = $this->InstanceID;
  						$found = true;
						}
					}
  				if(!$found)
					{
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
        if (sizeof($ids) > 0)
        {
            $hooks = json_decode(IPS_GetProperty($ids[0], "Hooks"), true);
            $found = false;
            foreach ($hooks as $index => $hook)
            {
                if ($hook['Hook'] == $WebHook)
                {
                    $found = $index;
                    break;
                }
            }
            if ($found !== false)
            {
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
		if(!isset($urlparts['host'])){
			$urlparts['host'] = $urlparts['path'];
		}

		if($urlparts['host']!=''){
		   /*Add scheme if not found*/
			if (!isset($urlparts['scheme'])){
				$urlparts['scheme'] = 'http';
			}
			/*Validation*/
			if(checkdnsrr($urlparts['host'], 'A') && in_array($urlparts['scheme'],array('http','https')) && ip2long($urlparts['host']) === FALSE){ 
				$urlparts['host'] = preg_replace('/^www\./', '', $urlparts['host']);
				$url = $urlparts['scheme'].'://'.$urlparts['host']. "/";            
				
				if (filter_var($url, FILTER_VALIDATE_URL) !== false && @get_headers($url)) {
					$validation = TRUE;
				}
			}
		}

		if(!$validation)
		{
			//echo $url." Its Invalid Domain Name.";
			$domaincheck = false;
			return $domaincheck;
		}
		else
		{
			//echo $url." is a Valid Domain Name.";
			$domaincheck = true;
			return $domaincheck;
		}

	}
	
	protected function GetURLPrefix($url)
	{
		$prehttp = strpos($url, "http://");
		$prehttps = strpos($url, "https://");
		if ($prehttp === 0)
		{
		    $prefix = "http://"; //Prefix ist http
		}
		elseif ($prehttps === 0)
		{
			$prefix = "https://"; //Prefix ist https
		}
		else
		{
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

		if($ConnectControl > 0)
        {
            $connectinfo = CC_GetUrl($ConnectControl);
            return $connectinfo;
        }
		else
        {
            return false;
        }
	}

    public function MessageSink($TimeStamp, $SenderID, $Message, $Data)
    {
        if ($SenderID == "LastRingtone")
        {
            $this->GetRingPicture();
            $email = $this->ReadPropertyString("email");
            $this->EmailAlert($email);
            $this->SendDebug("Doorbird recieved LastRingtone at",date("H:i", $TimeStamp),0);
            //IPS_LogMessage("Doorbird", "Message from SenderID ".$SenderID." with Message ".$Message."\r\n Data: ".print_r($Data, true));
            IPS_LogMessage("Doorbird", "Message from SenderID ".$SenderID." with Message ".$Message."\r\n Data: ".print_r($Data, true));
        }
        elseif($SenderID == "LastMovement")
        {
            $this->GetSnapshot();
            $this->SendDebug("Doorbird recieved LastMovement at",date("H:i", $TimeStamp),0);
            //IPS_LogMessage("Doorbird", "Message from SenderID ".$SenderID." with Message ".$Message."\r\n Data: ".print_r($Data, true));
            IPS_LogMessage("Doorbird", "Message from SenderID ".$SenderID." with Message ".$Message."\r\n Data: ".print_r($Data, true));
        }

    }

	private function CreateWebHookScript()
    {
        $Script = '<?
//Do not delete or modify.
Doorbird_ProcessHookDataOLD('.$this->InstanceID.');		
?>';
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
	
	private function CreateEmailAlertScript($email)
	{
		$Script = '<?
//Do not delete or modify.
Doorbird_EmailAlert('.$this->InstanceID.', "'.$email.'");		
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
	
	private function SetEmailEvent(integer $IDEmail, boolean $state)
	{
		//prüfen ob Event existent
		$ParentID = $IDEmail;

		//$EreignisID = @($this->GetIDForIdent('EventDoorbirdEmail'));
		$EreignisID = @IPS_GetObjectIDByIdent("EventDoorbirdEmail", $ParentID);
		if ($EreignisID === false)
			{
				$EreignisID = IPS_CreateEvent (0);
				IPS_SetName($EreignisID, "Doorbird Email Alert");
				IPS_SetIdent ($EreignisID, "EventDoorbirdEmail");
				IPS_SetEventTrigger($EreignisID, 0,  $this->GetIDForIdent('LastRingtone'));   //bei Variablenaktualisierung
				IPS_SetParent($EreignisID, $ParentID);
				IPS_SetEventActive($EreignisID, $state);             //Ereignis aktivieren	/ deaktivieren
			}
			
		else
			{
			//echo "Die Ereignis-ID lautet: ". $EreignisID;
			IPS_SetEventActive($EreignisID, $state);             //Ereignis aktivieren	/ deaktivieren
			}
			
	}
	
	public function EmailAlert(string $email)
	{
		$catid = GetValue($this->GetIDForIdent('ObjIDHist'));
		
		$subject = $this->ReadPropertyString('subject');
		$emailtext = $this->ReadPropertyString('emailtext');
		$mediaids = IPS_GetChildrenIDs($catid);
		// $countmedia = count($mediaids);
		foreach ($mediaids as $key=>$mediaid)
		{
			$mediainfo = IPS_GetMedia($mediaid);
			if($mediainfo["MediaFile"] == "media/doorbirdringpic_1.jpg")
			{
				$mailer = $this->ReadPropertyInteger('smtpmodule');
				SMTP_SendMailMediaEx($mailer, $email, $subject, $emailtext, $mediaid);
			}
			
		}
	}
	
	public function ProcessHookDataOLD()
	{
		$ringid = $this->GetIDForIdent('LastRingtone');
		$movementid = $this->GetIDForIdent('LastMovement');
		$doorid = $this->GetIDForIdent('LastDoorOpen');
		$webhookusername = $this->ReadPropertyString('webhookusername');
		$webhookpassword = $this->ReadPropertyString('webhookpassword');
		if(!isset($_SERVER['PHP_AUTH_USER']))
		$_SERVER['PHP_AUTH_USER'] = "";
		if(!isset($_SERVER['PHP_AUTH_PW']))
			$_SERVER['PHP_AUTH_PW'] = "";
		 
		if(($_SERVER['PHP_AUTH_USER'] != $webhookusername) || ($_SERVER['PHP_AUTH_PW'] != $webhookpassword)) {
			header('WWW-Authenticate: Basic Realm="Doorbird WebHook"');
			header('HTTP/1.0 401 Unauthorized');
			echo "Authorization required";
			return;
		}
		echo "Webhook Doorbird IP-Symcon 4";

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
	
	/**
 	* This function will be called by the hook control. Visibility should be protected!
  	*/
		
	protected function ProcessHookData()
	{
		$ringid = $this->GetIDForIdent('LastRingtone');
		$movementid = $this->GetIDForIdent('LastMovement');
		$doorid = $this->GetIDForIdent('LastDoorOpen');
		$webhookusername = $this->ReadPropertyString('webhookusername');
		$webhookpassword = $this->ReadPropertyString('webhookpassword');
		if(!isset($_SERVER['PHP_AUTH_USER']))
		$_SERVER['PHP_AUTH_USER'] = "";
		if(!isset($_SERVER['PHP_AUTH_PW']))
			$_SERVER['PHP_AUTH_PW'] = "";
		 
		if(($_SERVER['PHP_AUTH_USER'] != $webhookusername) || ($_SERVER['PHP_AUTH_PW'] != $webhookpassword)) {
			header('WWW-Authenticate: Basic Realm="Doorbird WebHook"');
			header('HTTP/1.0 401 Unauthorized');
			echo "Authorization required";
			return;
		}
		echo "Webhook Doorbird IP-Symcon 4";

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
		$hostdoorbird = $this->ReadPropertyString('Host');
		$hostips = $this->ReadPropertyString('IPSIP');
		$portips = $this->ReadPropertyInteger('PortIPS');
		$portdoorbell = $this->ReadPropertyInteger('PortDoorbell');
		$selectiondoorbell = $this->ReadPropertyBoolean('doorbell');
		$webhookusername = $this->ReadPropertyString('webhookusername');
		$webhookpassword = $this->ReadPropertyString('webhookpassword');
		if ($selectiondoorbell == true)
			{
			$selectiondoorbell = 1;
			}
		else
			{
			$selectiondoorbell = 0;
			}
		$relaxationdoorbell = $this->ReadPropertyInteger('relaxationdoorbell');
		$selectionmotionsensor = $this->ReadPropertyBoolean('motionsensor');
		if ($selectionmotionsensor == true)
			{
			$selectionmotionsensor = 1;
			}
		else
			{
			$selectionmotionsensor = 0;
			}
		$relaxationmotionsensor = $this->ReadPropertyInteger('relaxationmotionsensor');
		$selectiondooropen = $this->ReadPropertyBoolean('dooropen');
		if ($selectiondooropen == true)
			{
			$selectiondooropen = 1;
			}
		else
			{
			$selectiondooropen = 0;
			}
		$relaxationdooropen = $this->ReadPropertyInteger('relaxationdooropen');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$prefixips = $this->GetURLPrefix($hostips);
		//doorbell
		$URL = $prefixdoorbird.$hostdoorbird.':'.$portdoorbell.'/bha-api/notification.cgi?event=doorbell&subscribe='.$selectiondoorbell.'&relaxation='.$relaxationdoorbell.'&user='.$webhookusername.'&password='.$webhookpassword.'&url='.$prefixips.$hostips.':'.$portips.'/hook/doorbird'.$this->InstanceID.'?doorbirdevent=doorbell';
		$this->SendDoorbird($URL);
		IPS_Sleep(300);
		//motionsensor
		$URL = $prefixdoorbird.$hostdoorbird.':'.$portdoorbell.'/bha-api/notification.cgi?event=motionsensor&subscribe='.$selectionmotionsensor.'&relaxation='.$relaxationmotionsensor.'&user='.$webhookusername.'&password='.$webhookpassword.'&url='.$prefixips.$hostips.':'.$portips.'/hook/doorbird'.$this->InstanceID.'?doorbirdevent=motionsensor';
		$this->SendDoorbird($URL);
		IPS_Sleep(300);
		//dooropen
		$URL = $prefixdoorbird.$hostdoorbird.':'.$portdoorbell.'/bha-api/notification.cgi?event=dooropen&subscribe='.$selectiondooropen.'&relaxation='.$relaxationdooropen.'&user='.$webhookusername.'&password='.$webhookpassword.'&url='.$prefixips.$hostips.':'.$portips.'/hook/doorbird'.$this->InstanceID.'?doorbirdevent=dooropen';
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
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird.$hostdoorbird.'/bha-api/info.cgi';
		$result = $this->SendDoorbird($URL);
		$result = json_decode($result);
		$firmware = $result->BHA->VERSION[0]->FIRMWARE;
		SetValue($this->GetIDForIdent("FirmwareVersion"), $firmware);
		$buildnumber = $result->BHA->VERSION[0]->BUILD_NUMBER;
		SetValue($this->GetIDForIdent("Buildnumber"), $buildnumber);
		$wifimacaddr = $result->BHA->VERSION[0]->WIFI_MAC_ADDR;
		SetValue($this->GetIDForIdent("MACAdress"), $wifimacaddr);
		return $result;
	}
	
	public function GetHistory()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$name = "Doorbird Klingel";
		$ident = "DoorbirdRingPic";
		$picturename = "doorbirdringpic_";
		for ($i = 1; $i <= 20; $i++)
		{
			$URL = $prefixdoorbird.$hostdoorbird.'/bha-api/history.cgi?index='.$i;
			$Content = $this->SendDoorbird($URL);
			

			//testen ob im Medienpool existent
			$catid = GetValue($this->GetIDForIdent('ObjIDHist'));
			
			$MediaID = @IPS_GetObjectIDByIdent($ident.$i, $catid);
			if ($MediaID === false)
				{
					$MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
					IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie Historie
					IPS_SetIdent ($MediaID, $ident.$i);
					IPS_SetPosition($MediaID, $i);
					IPS_SetMediaCached($MediaID, true);
					// Das Cachen für das Mediaobjekt wird aktiviert.
					// Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
					// und zukünftig nur noch im Arbeitsspeicher verarbeitet.
					$ImageFile = IPS_GetKernelDir()."media".DIRECTORY_SEPARATOR.$picturename.$i.".jpg";  // Image-Datei
					IPS_SetMediaFile($MediaID, $ImageFile, False);    // Image im MedienPool mit Image-Datei verbinden
					//$savetime = date('d.m.Y H:i:s');
					//IPS_SetName($MediaID, $name." ".$i." ".$savetime); // Medienobjekt benennen
					IPS_SetName($MediaID, $name." ".$i); // Medienobjekt benennen
					//IPS_SetInfo ($MediaID, $savetime);
					IPS_SetMediaContent($MediaID, base64_encode($Content));  //Bild Base64 codieren und ablegen
					IPS_SendMediaEvent($MediaID); //aktualisieren	
				}
			else
				{
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
		$catid = GetValue($this->GetIDForIdent('ObjIDSnap'));
		$this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid);
	}
	
	public function GetRingPicture()
	{
		$name = "Doorbird Klingel";
		$ident = "DoorbirdRingPic";
		$picturename = "doorbirdringpic_";
		$picturelimit = $this->ReadPropertyInteger('picturelimitring');
		$catid = GetValue($this->GetIDForIdent('ObjIDHist'));
		$this->GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid);
	}
	
	private function GetImageDoorbell($name, $ident, $picturename, $picturelimit, $catid)
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird.$hostdoorbird.'/bha-api/image.cgi';
		$Content = $this->SendDoorbird($URL);
		//lastsnapshot bestimmen
		$mediaids = IPS_GetChildrenIDs($catid);
	 	$countmedia = count($mediaids);
		$lastsnapshot = $countmedia;
		if ($lastsnapshot == $picturelimit)
			{
				//neu beschreiben und Bilder um +1 neu zuordnen
				//Images base 64 codiert in allmedia einlesen
						
				$allmedia = $this->GetallImages($mediaids);
				$mediaid20 = array_search(20, array_column($allmedia, 'picid'));
				unset ($allmedia[$mediaid20]);
				//Neues Bild zu allmedia hinzufügen
				$allmedia = $this->AddCurrentPic($allmedia, $mediaids, $Content);
				//allmedia schreiben
				$this->SaveImagestoPicSlot($allmedia, $ident, $name, $catid);
			}
		else
			{
				// neues Mediaobjekt anlegen
				//testen ob im Medienpool existent
				$currentsnapshotid = $lastsnapshot + 1;
				$MediaID = @IPS_GetObjectIDByIdent($ident.$currentsnapshotid, $catid);
				if ($MediaID === false)
				{
					$MediaID = IPS_CreateMedia(1);                  // Image im MedienPool anlegen
					IPS_SetParent($MediaID, $catid); // Medienobjekt einsortieren unter der Doorbird Kategorie
					IPS_SetIdent ($MediaID, $ident.$currentsnapshotid);
					IPS_SetPosition($MediaID, $currentsnapshotid);
					IPS_SetMediaCached($MediaID, true);
					// Das Cachen für das Mediaobjekt wird aktiviert.
					// Beim ersten Zugriff wird dieses von der Festplatte ausgelesen
					// und zukünftig nur noch im Arbeitsspeicher verarbeitet.
					$ImageFile = IPS_GetKernelDir()."media".DIRECTORY_SEPARATOR.$picturename.$currentsnapshotid.".jpg";  // Image-Datei
					IPS_SetMediaFile($MediaID, $ImageFile, False);    // Image im MedienPool mit Image-Datei verbinden
					
					if ($currentsnapshotid == 1)
					{
						//Auf Position 1 anlegen und beschreiben
						$savetime = date('d.m.Y H:i:s');
						IPS_SetName($MediaID, $name." ".$currentsnapshotid." ".$savetime); // Medienobjekt benennen
						IPS_SetInfo ($MediaID, $savetime);
						IPS_SetMediaContent($MediaID, base64_encode($Content));  //Bild Base64 codieren und ablegen
						IPS_SendMediaEvent($MediaID); //aktualisieren
					}
					else
					{
						//Array auslesen und Bilder +1 neu zuordnen
						//Images base 64 codiert in allmedia einlesen
						$allmedia = $this->GetallImages($mediaids);
						//Neues Bild zu allmedia hinzufügen
						$allmedia = $this->AddCurrentPic($allmedia, $mediaids, $Content);
						//allmedia schreiben
						$this->SaveImagestoPicSlot($allmedia, $ident, $name, $catid);
					}
				
				}
			}
	}
	
	private function GetallImages($mediaids)
	{
		$countmedia = count($mediaids);
		$allmedia = array();
		for ($i = 0; $i <= ($countmedia-1); $i++)
			{
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
		return $allmedia;
		
	}
	
	private function SaveImagestoPicSlot($allmedia, $ident, $name, $catid)
	{
		
		foreach ($allmedia as $media)
			{
			 	$picid = $media['picid'];
 				$newpicid = $picid+1;
				$mediaid = IPS_GetObjectIDByIdent($ident.$newpicid, $catid);
				$saveinfo = $media['saveinfo'];
				$imagebase64 = $media['imagebase64']; 
				IPS_SetMediaContent($mediaid, $imagebase64);  //Bild Base64 codiert ablegen
				IPS_SetName($mediaid, $name." ".$newpicid." ".$saveinfo); // Medienobjekt benennen					
				IPS_SetInfo ($mediaid, $saveinfo);
				IPS_SendMediaEvent($mediaid); //aktualisieren
			}
	}
	
	private function AddCurrentPic($allmedia, $mediaids, $Content)
	{
		$lastid = count($allmedia);
				
		// Neues Bild ergänzen
 		$allmedia[$lastid]['objid'] = $mediaids[0];
		$allmedia[$lastid]['picid'] = 0;
		$saveinfo =  date('d.m.Y H:i:s');
		$allmedia[$lastid]['saveinfo'] = $saveinfo;
		$allmedia[$lastid]['imagebase64'] = base64_encode($Content);  //Bild Base64 codieren und ablegen;
		return $allmedia; 
	}
	
	public function Light()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird.$hostdoorbird.'/bha-api/light-on.cgi';
		$result = $this->SendDoorbird($URL);
		return $result;
	}
	
	public function OpenDoor()
	{
		$hostdoorbird = $this->ReadPropertyString('Host');
		$prefixdoorbird = $this->GetURLPrefix($hostdoorbird);
		$URL = $prefixdoorbird.$hostdoorbird.'/bha-api/open-door.cgi';
		$result = $this->SendDoorbird($URL);
		return $result;
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
	
	protected function RegisterProfileStringDoorbird($Name, $Icon)
	{
        
        if(!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 3);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if($profile['ProfileType'] != 3)
            throw new Exception("Variable profile type does not match for profile ".$Name);
        }
        
        IPS_SetVariableProfileIcon($Name, $Icon);
        //IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
        //IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize);
        
    }
	
	protected function GetIPSVersion ()
		{
			$ipsversion = IPS_GetKernelVersion ( );
			$ipsversion = explode( ".", $ipsversion);
			// $ipsmajor = intval($ipsversion[0]);
			$ipsminor = intval($ipsversion[1]);
			if($ipsminor < 10) // 4.0
			{
				$ipsversion = 0;
			}
			elseif ($ipsminor >= 10 && $ipsminor < 20) // 4.1
			{
				$ipsversion = 1;
			}
			else   // > 4.2
			{
				$ipsversion = 2;
			}
			return $ipsversion;
		}
}

?>