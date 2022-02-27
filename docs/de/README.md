# IPSymconDoorbird
[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Symcon%20Version-5.0%20%3E-green.svg)](https://www.symcon.de/forum/threads/38222-IP-Symcon-5-0-verf%C3%BCgbar)
![Code](https://img.shields.io/badge/Code-PHP-blue.svg)

Modul für IP-Symcon ab Version 5.x. Ermöglicht die Kommunikation mit einer Doorbird Türsprechanlage.

![Doorbird](img/doorbird_logo_dark_small.png?raw=true "Doorbird")

## Dokumentation

**Inhaltsverzeichnis**

1. [Funktionsumfang](#1-funktionsumfang)  
2. [Voraussetzungen](#2-voraussetzungen)  
3. [Installation](#3-installation)  
4. [Funktionsreferenz](#4-funktionsreferenz)
5. [Konfiguration](#5-konfiguartion)  
6. [Anhang](#6-anhang)  

## 1. Funktionsumfang

Mit dem Modul lassen sich Befehle an eine Doorbird Türsprechanlage senden und die Statusrückmeldung in IP-Symcon (ab Version 5) empfangen. 

### Befehle an Doorbird senden:  

 - Tür öffnen 
 - IR Licht einschalten
 - Snapshoot anfordern

### Status Rückmeldung:  

 - Bild Anzeige
 - Zeitpunkt letztes Klingelsignal
 - Zeitpunkt letzte Bewegung
 - Zeitpunkt letzte Türöffnung
 - Bild bei Bewegung
 - Bild bei Klingelsignal
	
  

## 2. Voraussetzungen

 - IP-Symcon 6.x
 - Doorbird Türsprechanlage, Hardware Version 1.00 und höher. Firmware Version 000098 und höher.
 - der Master Branch ist für die aktuelle IP-Symcon Version ausgelegt.
 - bei IP-Symcon Versionen kleiner 4.1 ist der Branch _Old-Version_ zu wählen

## 3. Installation

### a. Laden des Moduls

Die Webconsole von IP-Symcon mit _http://{IP-Symcon IP}:3777/console/_ öffnen. 


Anschließend oben rechts auf das Symbol für den Modulstore (IP-Symcon > 5.1) klicken

![Store](img/store_icon.png?raw=true "open store")

Im Suchfeld nun

```
Doorbird
```  

eingeben

![Store](img/module_store_search.png?raw=true "module search")

und schließend das Modul auswählen und auf _Installieren_

![Store](img/install.png?raw=true "install")

drücken.

#### Alternatives Installieren über Modules Instanz (IP-Symcon < 5.1)

[Alternatives Installieren über Modules Instanz](moduleinstall.md "Alternatives Installieren über Modules Instanz")


### b. Einrichtung in IPS


Bevor die eigentliche Instanz angelegt wird, müssen zwei Kategorien an einer gewünschten Stelle im Objektbaum angelegt werden.
In diese beiden Kategorien werden dann später vom Modul bei einem Klingelsignal oder bei einer Bewegungserkennung oder manueller Aufforderung,
jeweils ein Bild zum Zeitpunkt des Events abgelegt.
Wir legen also eine Kategorie an der gewünschten Position im Objektbaum an (_Rechtsklick -> Objekt hinzufügen -> Kategorie_) und benennen diese z.B. mit
den Namen _Doorbird Besucherhistorie_ und _Doorbird Klingelhistorie_.
	
In IP-Symcon nun _Instanz hinzufügen_ (_Rechtsklick -> Objekt hinzufügen -> Instanz_) auswählen unter der Kategorie, unter der man die Doorbird hinzufügen will,
und _Doorbird_ auswählen.
 
Im Konfigurationsformular ist zunächt der passende Gerätetyp der Doorbird auszuwählen.

![Type](img/doorbird_menu_de_1.png?raw=true "Type") 

Unter Doorbird Einstellungen die IP-Adresse des Doorbird eintragen.

![SettingsIP](img/doorbird_setting_ip.png?raw=true "Settings IP") 
 
Im Konfigurationsformular wird ein Doorbird User und das Doorbird Passwort abgefragt. Hierbei ist darauf zu achten,
dass in der Doorbird App unter _Einstellungen_ (Zahnrad) unter _Weitere Funktionen_ ->_Administration_ ein neuer Nutzer angelegt worden ist.
Es muss ein Nutzer mit User und Passwort im Modul eingetragen werden und _**nicht**_ der Administrator Account benutzt werden.
Es kann ein spezieller Nutzer für IP-Symcon in der Doorbird App angelegt werden, dieser muss in der Doorbird App unter Berechtigungen die Berechtigung
als _API Operator_ zugewiesen bekommen. Dieser Benutzer wird gebraucht um Daten, die von der Doorbird verschlüsselt übertragen werden, zu entschlüsseln. 
Wenn bereits ein Nutzer angelegt worden ist, können Username und Passwort in der Doorbird App nachgeschlagen werden. Die IP Adresse von Doorbird
und die IP Adresse von IP-Symcon ist zu ergänzen.

![User](img/doorbird_setting_doorbird_user.png?raw=true "user") 


Bei jeder ausgelösten Bewegung wird von der Doorbird ein Snapshoot angefordert und in
IP-Symcon abgelegt. Ebenso wird bei jedem Klingeln ein Foto in IP-Symcon abgelegt. Unter Anzahl
der zu speichernden Bilder kann das maximale Limit der zu speichernden Bilder angegeben werden.
Wird das Limit erreicht werden die Bilder von vorne überschrieben. 

![Picture](img/doorbird_picture.png?raw=true "picture") 

Bei den IP-Symcon-Einstellungen muss die IP-Adresse von IP-Symcon eingegeben werden. Die Port-Einstellungen bleiben unverändert bei 3777.

![IPS](img/doorbird_ips.png?raw=true "ips") 

Insofern eine Email Instanz in IP-Symcon eingerichtet worden ist
kann diese im Formular angegeben werden. Wenn die Email Benachrichtigung optional aktiv gesetzt wird wird bei jedem Klingeln eine Email mit Text und dem Foto verschickt.

![Email](img/doorbird_email.png?raw=true "email")

Unter Benachrichtigungs Einstellungen kann festgelegt werden ob eine Benachrichigung erfolgen soll und wie lange das Intervall sein soll bis erneut eine Benachrichtigung ausgelöst wird.

![Notification](img/doorbird_notification.png?raw=true "Notification")

Falls es Probleme geben sollte bei der Anscht des Kamerabilds in der mobilen App kann optional _Alternative View_ aktiviert werden.

![View](img/doorbird_view.png?raw=true "Doorbird View")

__Wichtig__ 

Doorbird sendet Infomationen an IP-Symon über einen Webhook, damit dies sicher ist im Feld Benutzername und Passwort ein Wert einzutragen. Dieser wert kann individuell für das Modul festgelegt werden
und hat nichts mit den Zugangsdaten für IP-Symcon zu tun. 

![Webhook](img/doorbird_webhook.png?raw=true "Doorbird Webhook")


Nachdem alle notwendigen Angaben gemacht worden sind und mit _Übernehmen_ alles gespeichert wurde,

![ModulURL](img/Accept_Changes.png?raw=true "Add Module") 
 
kann im Anschluss in der Testumgebung auf
_Benachrichtigung einrichten_ gedrückt werden um die Benachrichtigungen der Doorbird einzurichten.
In der Testumgebung stehen dann noch weitere Funktionen zur Verfügung.

![Buttons](img/doorbird_buttons.png?raw=true "Buttons")

### c. Einrichtung in der Doorbird App / Doorbird Web Admin

Nachdem das Modul in IP-Symcon eingerichtet worden ist, müssen noch Einstellungen in der Doorbird App bzw. über den Webadmin aus IP-Symcon vorgenommen werden.
In der Doorbird App unter _Einstellungen -> Administration_ sich als Admin der Klingel anmelden, alternativ aus der Instanz in IP-Symcon den Doorbird Webadmin öffnen.
Es öffnet sich ein Browser Fenster in dem man sich mit den Admin Anmeldedaten für die Doorbird anmelden muss.

![Webadmin](img/doorbird_web_admin_de_1.png?raw=true "Webadmin")

Zunächst in der Doorbird App bzw. im Web Admin prüfen ob die HTTP Aufrufe von IP-Symcon ergänzt worden sind unter _Favoriten -> HTTP(S) Aufrufe_.

#### 1. Einrichtung der Klingelbenachrichtigung

Unter _Experteneinstellungen_ den Menüpunkt _Zeitplan für Türklingel_ auswählen.

![Doorbell1](img/doorbell_schedule_1.png?raw=true "Doorbell1")

Das Icon oben links anklicken und dort _HTTP(S) Aufrufe_ auswählen, dann in die Mitte klicken und aus dem Auswahlmenü den passenden Eintrag zur Klingel wählen.

![Doorbell2](img/doorbell_schedule_2.png?raw=true "Doorbell2")

Hier im Beispiel _Klingelereignis 1 IP-Symcon_ selektieren und anschließend oben rechts mit dem Icon alles auswählen.

![Doorbell3](img/doorbell_schedule_3.png?raw=true "Doorbell3")

#### 2. Einrichtung der Bewegungsbenachrichtigung

Möchte man die Bewegungserkennung nutzten, muss zunächst der Bewegungssensor unter Einstellungen aktiviert werden.

![Motion1](img/motion_sensor_1.png?raw=true "Motion1")

Anschließend auf die Einstellungen des Motion Senors wechseln. Hier den Unterpunkt _Zeitplan für Aktionen_ auswählen.

![Motion2](img/motion_sensor_2.png?raw=true "Motion2")

Das Icon oben links anklicken und dort _HTTP(S) Aufrufe_ auswählen, dann in die Mitte klicken und aus dem Auswahlmenü den passenden Eintrag zur Bewegung wählen.

![Motion3](img/motion_sensor_3.png?raw=true "Motion3")

Hier im _Bewegungsereignis IP-Symcon_ selektieren und anschließend oben rechts mit dem Icon alles auswählen.

![Motion4](img/motion_sensor_4.png?raw=true "Motion4")

#### 3. Einrichtung der Relaisbenachrichtigung

##### 3.1 Einrichtung von RFID

Sollte das Modell über RFID verfügen kann man dies auf Wunsch aktivieren. RFID löst das Relais 1 aus. 

![RFID](img/rfid_1.png?raw=true "RFID")

Wenn man eine Benachrichtung in IP-Symcon erhalten will wenn das Relais 1 geschaltet wurde muss man weitere Einstellungen unter Relais 1 vornehmen.

##### 3.1 Einrichtung von Relais 1

Wenn RFID genutzt wird, schaltet RFID das Relais 1.

![Relay1](img/relay_1.png?raw=true "Relay 1")

Hier wählt man _Zeitplan für Folgeaktionen_ aus.

Das Icon oben links anklicken und dort _HTTP(S) Aufrufe_ auswählen, dann in die Mitte klicken und aus dem Auswahlmenü den passenden Eintrag zum Relais 1 wählen.

![Relay2](img/relay_2.png?raw=true "Relay 2")

Hier im _Relais 1 Ereignis IP-Symcon_ selektieren und anschließend oben rechts mit dem Icon alles auswählen.

![Relay3](img/relay_3.png?raw=true "Relay 3")

##### 3.1 Einrichtung von Relais 2

Wenn Relais 2 genutzt wird und eine Benachrichtigung gewünscht ist, muss dies ebenfalls einmalig aktiviert werden.
Hier wählt man _Zeitplan für Folgeaktionen_ aus.

Das Icon oben links anklicken und dort _HTTP(S) Aufrufe_ auswählen, dann in die Mitte klicken und aus dem Auswahlmenü den passenden Eintrag zum Relais 2 wählen.

![Relay4](img/relay_4.png?raw=true "Relay 4")

Hier im _Relais 2 Ereignis IP-Symcon_ selektieren und anschließend oben rechts mit dem Icon alles auswählen.

![Relay5](img/relay_5.png?raw=true "Relay 5")

In der Regel setzt man hier den Zeitplan auf immer aktiv damit man auch stets eine Benachrichtigung erhält.


## 4. Funktionsreferenz

### Doorbird:

Die IP Adresse des Doorbird sowie von IP-Symcon und der Username sowie Passwort von Doorbird sind anzugeben.
Es wird bei jedem Event Klingeln, Bewegung, Tür öffnen von Doorbird eine Mitteilung an IP-Symcon gesendet.
Mit Hilfe eines Ereignisses was bei Variablenaktualisierung greift können dann in IP-Symcon weitere Aktionen
ausgelöst werden. Das Livebild kann in IP-Symcon eingesehen werden sowie die Historie der letzten Klingelbesucher.
	


## 5. Konfiguration:

### Doorbird:

| Eigenschaft | Typ     | Standardwert | Funktion                                  |
| :---------: | :-----: | :----------: | :---------------------------------------: |
| IPSIP       | string  |              | IP Adresse IP-Symcon                      |
| Host        | string  |              | IP Adresse Doorbird                       |
| User        | string  |              | Doorbird User                             |
| Password    | string  |              | Doorbird Passwort                         |
| picturelimit| integer |    20        | Limit an abgelegten Bildern               |






## 6. Anhang

###  a. Funktionen:

#### Doorbird:

`Doorbird_SetupNotification(integer $InstanceID)`

Benachrichtigungen zu IP-Symcon von der Doorbird einrichten

`Doorbird_GetInfo(integer $InstanceID)`

Liest Buildnumber, Firmware Version und WLAN MAC Adresse von Doorbird aus

`Doorbird_GetSnapshot(integer $InstanceID)`

Fordert einen Snapshoot von Doorbird an und legt diesen in IP-Symcon ab

`Doorbird_Light(integer $InstanceID)`

Schaltet die IR Lampen des Doorbird ein, entspricht Lampen Button in der App

`Doorbird_OpenDoor(integer $InstanceID)`

Betätigt den Türöffner der Doorbird   

`Doorbird_GetFavorites(integer $InstanceID)`

Liest Favoriten aus der Doorbird aus  

`Doorbird_OpenDoorRelaisNumber(integer $InstanceID, int $relaisnumber)`

Schaltet das Relais mit der Nummer $relaisnumber


###  b. GUIDs und Datenaustausch:

#### Doorbird:

GUID: `{D489FA0B-765D-451E-8B21-C6B61ECAC00E}` 

### c. Quellen

[CSS Fadeshow](https://github.com/alexerlandsson/css-fadeshow "CSSFadeshow") _Alexander Erlandsson_ ([MIT License](https://github.com/alexerlandsson/css-fadeshow/blob/master/LICENSE "MIT"))

[SCSSPHP](https://github.com/scssphp/scssphp "SCSSPHP") _Leaf Corcoran_ ([MIT License](https://github.com/scssphp/scssphp/blob/master/LICENSE.md "MIT"))
