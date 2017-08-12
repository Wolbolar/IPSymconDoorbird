# IPSymconDoorbird

Modul für IP-Symcon ab Version 4. Ermöglicht die Kommunikation mit einer Doorbird Türsprechanlage.

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
 - Doorbird Türsprechanlage, Hardware Version 1.00 und höher. Firmware Version 000098 und höher.
 - der Master Branch ist für die aktuelle IP-Symcon Version ausgelegt.
 - bei IP-Symcon Versionen kleiner 4.1 ist der Branch _Old-Version_ zu wählen

## 3. Installation

### a. Laden des Moduls


Die IP-Symcon (min Ver. 4.x) Konsole öffnen. Im Objektbaum unter Kerninstanzen die Instanz __*Modules*__ durch einen doppelten Mausklick öffnen.

![Modules](docs/Modules.png?raw=true "Modules")

In der _Modules_ Instanz rechts oben auf den Button __*Hinzufügen*__ drücken.

![Modules](docs/Hinzufuegen.png?raw=true "Hinzufügen")
 
In dem sich öffnenden Fenster folgende URL hinzufügen:

	
    `https://github.com/Wolbolar/IPSymconDoorbird`  
    
und mit _OK_ bestätigen.    
    
![Modules](docs/RepositoryURLDoorbird.png?raw=true "URL Doorbird") 
    
Anschließend erscheint ein Eintrag für das Modul in der Liste der Instanz _Modules_    

![Modules](docs/Liste-Doorbird.png?raw=true "URL Doorbird") 

Es wird im Standard der Zweig (Branch) _master_ geladen, dieser enthält aktuelle Änderungen und Anpassungen.
Nur der Zweig _master_ wird aktuell gehalten. Sollte eine ältere Version von IP-Symcon 4 die kleiner ist als Version 4.1 eingesetzt werden ist auf den Stift rechts in der Liste zu klicken.
Es öffnet sich ein weiteres Fenster, hier kann man auf einen anderen Zweig wechseln, für ältere Versionen kleiner als 4.1 ist hier
_Old-Version_ auszuwählen. 

![Modules](docs/Branch-Doorbird.png?raw=true "Branch Doorbird")

### b. Einrichtung in IPS


Bevor die eigentliche Instanz angelegt wird, müssen zwei Kategorien an einer gewünschten Stelle im Objektbaum angelegt werden.
In diese beiden Kategorien werden dann später vom Modul bei einem Klingelsignal oder bei einer Bewegungserkennung oder manueller Aufforderung, jeweils ein Bild zum Zeitpunkt des Events abgelegt.
Wir legen also eine Kategorie an der gewünschten Position im Objektbaum an (_CTRL+0_) und benennen diese z.B. mit den Namen _Doorbird Besucherhistorie_ und _Doorbird Klingelhistorie_.
	
In IP-Symcon nun _Instanz hinzufügen_ (_CTRL+1_) auswählen unter der Kategorie, unter der man die Doorbird hinzufügen will, und _Doorbird_ auswählen.
Im Konfigurationsformular ist der Doorbird User und das Doorbird Passwort zu ergänzen. Hierbei ist darauf zu achten, dass in der Doorbird App unter _Einstellungen_ (Zahnrad) unter _Weitere Funktionen_ ->
_Administration_ ein neuer Nutzer angelegt worden ist. Es muss ein Nutzer mit User und Passwort im Modul eingtragen werden und nicht der Administartor Account benutzt werden.
Wenn bereits ein Nutzer angelegt worden ist, können Username und Passwort in der Doorbird App nachgeschlagen werden. Die IP Adresse von Doorbird
und die IP Adresse von IP-Symcon ist zu ergänzen.
Bei jeder ausgelösten Bewegung wird von der Doorbird ein Snapshoot angefordert und in
IP-Symcon abgelegt. Ebenso wird bei jedem Klingeln ein Foto in IP-Symcon abgelegt. Unter Anzahl
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




