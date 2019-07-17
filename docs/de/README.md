# IPSymconDoorbird
[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Symcon%20Version-5.0%20%3E-green.svg)](https://www.symcon.de/forum/threads/38222-IP-Symcon-5-0-verf%C3%BCgbar)
![Code](https://img.shields.io/badge/Code-PHP-blue.svg)
[![StyleCI](https://github.styleci.io/repos/7548986/shield)](https://github.styleci.io/repos/7548986/shield)

Modul für IP-Symcon ab Version 5.x. Ermöglicht die Kommunikation mit einer Doorbird Türsprechanlage.

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

 - IP-Symcon 5.x
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

Die Webconsole von IP-Symcon mit _http://{IP-Symcon IP}:3777/console/_ öffnen. 

Anschließend den Objektbaum _Öffnen_.

![Objektbaum](img/objektbaum.png?raw=true "Objektbaum")	

Die Instanz _'Modules'_ unterhalb von Kerninstanzen im Objektbaum von IP-Symcon (>=Ver. 5.x) mit einem Doppelklick öffnen und das  _Plus_ Zeichen drücken.

![Modules](img/Modules.png?raw=true "Modules")	

![Plus](img/plus.png?raw=true "Plus")	

![ModulURL](img/add_module.png?raw=true "Add Module")
 
Im Feld die folgende URL eintragen und mit _OK_ bestätigen:

```
https://github.com/Wolbolar/IPSymconDoorbird 
```  
	        
Anschließend erscheint ein Eintrag für das Modul in der Liste der Instanz _Modules_    

Es wird im Standard der Zweig (Branch) _master_ geladen, dieser enthält aktuelle Änderungen und Anpassungen.
Nur der Zweig _master_ wird aktuell gehalten.

![Master](img/master.png?raw=true "master") 

Sollte eine ältere Version von IP-Symcon die kleiner ist als Version 4.1 eingesetzt werden, ist auf das Zahnrad rechts in der Liste zu klicken.
Es öffnet sich ein weiteres Fenster,

![SelectBranch](img/select_branch.png?raw=true "select branch") 

hier kann man auf einen anderen Zweig wechseln, für ältere Versionen kleiner als 4.1 ist hier
_Old-Version_ auszuwählen. 

### b. Einrichtung in IPS


Bevor die eigentliche Instanz angelegt wird, müssen zwei Kategorien an einer gewünschten Stelle im Objektbaum angelegt werden.
In diese beiden Kategorien werden dann später vom Modul bei einem Klingelsignal oder bei einer Bewegungserkennung oder manueller Aufforderung,
jeweils ein Bild zum Zeitpunkt des Events abgelegt.
Wir legen also eine Kategorie an der gewünschten Position im Objektbaum an (_Rechtsklick -> Objekt hinzufügen -> Kategorie_) und benennen diese z.B. mit
den Namen _Doorbird Besucherhistorie_ und _Doorbird Klingelhistorie_.
	
In IP-Symcon nun _Instanz hinzufügen_ (_Rechtsklick -> Objekt hinzufügen -> Instanz_) auswählen unter der Kategorie, unter der man die Doorbird hinzufügen will,
und _Doorbird_ auswählen.
 
Im Konfigurationsformular ist zunächt der passende Gerätetyp der Doorbird auszuwählen.

![Type](img/select_type.png?raw=true "Type") 

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

   



###  b. GUIDs und Datenaustausch:

#### Doorbird:

GUID: `{D489FA0B-765D-451E-8B21-C6B61ECAC00E}` 
