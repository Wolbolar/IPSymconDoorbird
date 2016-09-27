# IPSymconDoorbird

Modul für IP-Symcon ab Version 4. Ermöglicht die Kommunikation mit einer Doorbird Türsprechanlage.
Beta Test

## Dokumentation

**Inhaltsverzeichnis**

1. [Funktionsumfang](#1-funktionsumfang)  
2. [Voraussetzungen](#2-voraussetzungen)  
3. [Installation](#3-installation)  
4. [Funktionsreferenz](#4-funktionsreferenz)
5. [Konfiguration](#5-konfiguartion)  
6. [Anhang](#6-anhang)  

## 1. Funktionsumfang

Mit dem Modul lassen sich Befehle an eine Doorbird Türsprechanlage senden und die Statusrückmeldung in IP-Symcon (ab Version 4) empfangen. 

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

 - IPS 4.x
 - Doorbird Türsprechanlage, hardware version 1.00 und höher. Firmware Version 000098 und höher.

## 3. Installation

### a. Laden des Moduls

   Über das 'Modul Control' in IP-Symcon (Ver. 4.x) folgende URL hinzufügen:
	
    `https://github.com/Wolbolar/IPSymconDoorbird`  

### b. Einrichtung in IPS

	In IP-Symcon Instanz hinzufügen auswählen unter der Kategorie
	unter der man die Doorbird hinzufügen will und Doorbird auswählen.
	nach Abschluss der Instanzkonfiguartion werden zwei Kategorien angelegt. Eine für
	Doorbird Klingelhistorie, hier werden die Bilder der Doorbird bei einem Klingelsignal
	abgelegt. Eine weitere Kategorie Doorbird Besucherhistorie, hier werden Bilder bei einer
	Bewegungsauslösung oder maueller Anforderung abgelegt.	
	Im Konfigurationsformular ist der Doorbird User und das Doorbird Passwort zu ergänzen.
	Diese können in der Doorbird App nachgeschlagen werden. Die IP Adresse von Doorbird
	und die IP Adresse von IP-Symcon ist zu ergänzen.
	Bei jeder ausgelösten Bewegung wird von der Doorbird ein Snapshoot angefordert und in
	IP-Symcon abgelegt. Ebenso wird bei jedem Klingeln ein Foto in Ip-Symcon abgelegt. Unter Anzahl
	der zu speichernden Bilder kann das maximale Limit der zu speichernden Bilder angegeben werden.
	Wird das Limit erreicht werden die Bilder von vorne überschrieben.


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



###  b. GUIDs und Datenaustausch:

#### Doorbird:

GUID: `{D489FA0B-765D-451E-8B21-C6B61ECAC00E}` 




