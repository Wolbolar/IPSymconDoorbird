# IPSymconDoorbird
[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Symcon%20Version-5.0%20%3E-green.svg)](https://www.symcon.de/forum/threads/38222-IP-Symcon-5-0-verf%C3%BCgbar)
![Code](https://img.shields.io/badge/Code-PHP-blue.svg)

Module for IP-Symcon from version 5.x. Allows communication with a Doorbird doorphone.

![Doorbird](img/doorbird_logo_dark_small.png?raw=true "Doorbird")

## Documentation

**Table of Contents**

1. [Features](#1-features)
2. [Requirements](#2-requirements)
3. [Installation](#3-installation)
4. [Function reference](#4-functionreference)
5. [Configuration](#5-configuration)
6. [Annex](#6-annex)

## 1. Features

The module can be used to send commands to a Doorbird door intercom and to receive the status feedback in IP-Symcon (version 5 or higher).

### Send commands to Doorbird:  

 - Open door 
 - Turn on the IR light
 - Request snapshot

### Status feedback:  

 - Image display
 - Time last bell
 - Time of last movement
 - Time last door opening
 - Picture on the move
 - Picture at bell signal
  

## 2. Requirements

 - IP-Symcon 5.x
 - Doorbird Doorphone, Hardware Version 1.00 and above. Firmware version 000098 and higher.
 - the Master Branch is designed for the current IP-Symcon version.
 - For IP-Symcon versions smaller than 4.1 the branch _Old-Version_ has to be selected

## 3. Installation

### a. Loading the module

Open the IP Console's web console with _http://{IP-Symcon IP}:3777/console/_.

Then click on the module store icon (IP-Symcon > 5.1) in the upper right corner.

![Store](img/store_icon.png?raw=true "open store")

In the search field type

```
Doorbird
```  


![Store](img/module_store_search_en.png?raw=true "module search")

Then select the module and click _Install_

![Store](img/install_en.png?raw=true "install")

#### Discovery of the Doorbird

After installing the Doorbirds module, the message appears

![Discovery 1](img/discovery_1.png?raw=true "Discovery 1")

Confirm here with _Yes_. The window for creating an instance opens.

![Discovery 2](img/discovery_2.png?raw=true "Discovery 2")

Simply confirm here with _Ok_.

![Discovery 3](img/discovery_3.png?raw=true "Discovery 3")

Select the right Doorbird door intercom system here and click

![Discovery 4](img/discovery_4.png?raw=true "Discovery 4")

#### Install alternative via Modules instance (IP-Symcon < 5.1)

[Install alternative via Modules instance](moduleinstall.md "Install alternative via Modules instance")

### b. Configuration in IP-Symcon

Before the actual instance is created, two categories must be created at a desired position in the object tree.
These two categories are then used later by the module in the event of a ringing signal or motion detection or manual prompting,
one picture at the time of the event.
So we create a category at the desired position in the object tree (_rightclick -> add object -> category_) and name it, e.g. With
the name _Doorbird Visitor History_ and _Doorbird Ring History_.

In IP-Symcon add _Instance_ (_rightclick -> add object -> instance_) under the category under which you want to add the Doorbird,
and select _Doorbird_.
	 
In the configuration form, the appropriate device type of the Doorbird must first be selected.
	 
![Type](img/doorbird_menu_en_1.png?raw=true "Type") 

Enter the IP address of the Doorbird under Doorbird Settings.

![SettingsIP](img/doorbird_setting_ip_en.png?raw=true "Settings IP") 

The configuration form asks for a Doorbird user and the Doorbird password. Care should be taken
that a new user has been created in the Doorbird app under _Preferences_ (gear) under _Other Functions_ -> _Administration_.
A user with user and password must be entered in the module and _**not**_ the administrator account.
A special user should be created for IP-Symcon in the Doorbird app, which must be authorized in the Doorbird app under Permissions
assigned as _API operator_. This user is needed to decrypt the encrypted data transmitted by the Doorbird.
If a user has already been created, the username and password can be looked up in the Doorbird app. The IP address of Doorbird
and the IP address of IP-Symcon must be added.
 
![ModulURL](img/doorbird_setting_doorbird_user_en.png?raw=true "Type") 

For each triggered movement a snapshoot is requested from the Doorbird and addes as a picture to
IP Symcon. Likewise, a photo is placed in IP-Symcon with each ring. You can set the maximum limit of pictures saved in IP-Symcon.
If the limit is reached, the images will be overwritten from the beginning.
 
![Picture](img/doorbird_picture_en.png?raw=true "picture") 

Under IP-Symcon settings the IP-address of IP-Symcon has to be entered the port settings remain unchanged at 3777.

![IPS](img/doorbird_ips_en.png?raw=true "ips")  
 
Insofar as an email instance has been set up in IP-Symcon
this can be stated in the form. If the e-mail notification is optionally activated, an e-mail with text and the photo will be sent every time you ring.

![Email](img/doorbird_email_en.png?raw=true "email")

Under Notification Settings, you can specify whether a notification is to be made and how long the interval should be until another notification is triggered.

![Notification](img/doorbird_notification_en.png?raw=true "Notification")

If there is a problem when the camera image is being viewed in the mobile app, you can optionally enable _Alternative View_.

![View](img/doorbird_view_en.png?raw=true "Doorbird View")

__Important__ 

Doorbird sends information to IP-Symcon via a webhook so for security reasons please enter a value in the username and password field.

![Webhook](img/doorbird_webhook_en.png?raw=true "Doorbird Webhook")

After all necessary information has been made and with _Apply Changes_ everything was saved
 
![ModulURL](img/apply_changes_en.png?raw=true "Add Module")

you can use the test environment.
Press _Setup Notification_ to set up notifications from the Doorbird.
There are also other functions available in the test environment.

![Buttons](img/doorbird_buttons_en.png?raw=true "Buttons")

### c. Setup in the Doorbird App / Doorbird Web Admin

After the module has been set up in IP-Symcon, settings still have to be made in the Doorbird app or via the web admin from IP-Symcon.
In the Doorbird app under _Settings -> Administration_ log in as the admin of the bell, alternatively open the Doorbird Webadmin from the instance in IP-Symcon.
A browser window opens in which you have to log in with the admin login data for the Doorbird.

![Webadmin](img/doorbird_web_admin_de_1.png?raw=true "Webadmin")

First check in the Doorbird App or in the Web Admin whether the HTTP calls from IP-Symcon have been added under _Favorites -> HTTP(S) calls_.

#### 1. Ring notification setup

Under _Expert Settings_ select the menu item _Doorbell Scheduler_.

![Doorbell1](img/doorbell_schedule_1.png?raw=true "Doorbell1")

Click on the icon at the top left and select _HTTP(S) calls_, then click in the middle and select the appropriate entry for the bell from the selection menu.

![Doorbell2](img/doorbell_schedule_2.png?raw=true "Doorbell2")

In the example, select _Ringelevent 1 IP-Symcon_ and then select everything with the icon at the top right.

![Doorbell3](img/doorbell_schedule_3.png?raw=true "Doorbell3")

#### 2. Set up motion notification

If you want to use motion detection, the motion sensor must first be activated under Settings.

![Motion1](img/motion_sensor_1.png?raw=true "Motion1")

Then switch to the settings of the motion sensor. Select the sub-item _Schedule for actions_ here.

![Motion2](img/motion_sensor_2.png?raw=true "Motion2")

Click on the icon at the top left and select _HTTP(S) Calls_ there, then click in the middle and select the appropriate entry for the movement from the selection menu.

![Motion3](img/motion_sensor_3.png?raw=true "Motion3")

Select here in the _movement event IP-Symcon_ and then select everything with the icon at the top right.

![Motion4](img/motion_sensor_4.png?raw=true "Motion4")

#### 3. Relay notification setup

##### 3.1 Setup of RFID

If the model has RFID, you can activate it if you wish. RFID triggers relay 1.

![RFID](img/rfid_1.png?raw=true "RFID")

If you want to receive a notification in IP-Symcon when relay 1 has been switched, you have to make further settings under relay 1.

##### 3.1 Relay 1 setup

If RFID is used, RFID switches relay 1.

![Relay1](img/relay_1.png?raw=true "Relay 1")

Here you select _schedule for follow-up actions_.

Click on the icon at the top left and select _HTTP(S) calls_ there, then click in the middle and select the appropriate entry for relay 1 from the selection menu.

![Relay2](img/relay_2.png?raw=true "Relay 2")

Here in the _Relay 1 event select IP-Symcon_ and then select everything with the icon at the top right.

![Relay3](img/relay_3.png?raw=true "Relay 3")

##### 3.2 Relay 2 setup

If relay 2 is used and a notification is desired, this must also be activated once.
Here you select _schedule for follow-up actions_.

Click on the icon at the top left and select _HTTP(S) calls_ there, then click in the middle and select the appropriate entry for relay 2 from the selection menu.

![Relay4](img/relay_4.png?raw=true "Relay 4")

Select here in the _Relay 2 event IP-Symcon_ and then select everything with the icon at the top right.

![Relay5](img/relay_5.png?raw=true "Relay 5")

As a rule, you set the schedule to always active so that you always receive a notification.


Detailed information on using the Doorbird app can be found in the

[Doorbird App Manual](https://manual.doorbird.com/app/de/ "Doorbird App Manual")

## 4. Functionreference

### Doorbird:

The IP address of the Doorbird and of IP Symcon and the username and password of Doorbird must be specified.
It will be sent a message to IP-Symcon at each event ringing, movement, door open by Doorbird.
With the help of an event that uses variable updating, additional actions can be taken in IP-Symcon.
The live image can be viewed in IP-Symcon as well as the history of the last visitors.


## 5. Configuration:

### Doorbird:

| Property    | Type    | Value        | Description                               |
| :---------: | :-----: | :----------: | :---------------------------------------: |
| IPSIP       | string  |              | IP Adress IP-Symcon                       |
| Host        | string  |              | IP Adress Doorbird                        |
| User        | string  |              | Doorbird User                             |
| Password    | string  |              | Doorbird Password                         |
| picturelimit| integer |    20        | Picture Limit                             |






## 6. Annex

###  a. Functions:

#### Doorbird:

`Doorbird_SetupNotification(integer $InstanceID)`

Set up IP Symcon notifications from Doorbird

`Doorbird_GetInfo(integer $InstanceID)`

Read buildnumber, firmware version and WLAN MAC address of Doorbird

`Doorbird_GetSnapshot(integer $InstanceID)`

Request a snapshoot from Doorbird and put it in IP-Symcon

`Doorbird_Light(integer $InstanceID)`

Turn on the IR lamps of the Doorbird, corresponds to the lamps button in the app

`Doorbird_OpenDoor(integer $InstanceID)`

Press the door opener of the Doorbird

`Doorbird_GetFavorites(integer $InstanceID)`

Reads favorites from the Doorbird


###  b. GUIDs and data exchange:

#### Doorbird:

GUID: `{D489FA0B-765D-451E-8B21-C6B61ECAC00E}` 

### c. Sources

[CSS Fadeshow](https://github.com/alexerlandsson/css-fadeshow "CSSFadeshow") _Alexander Erlandsson_ ([MIT License](https://github.com/alexerlandsson/css-fadeshow/blob/master/LICENSE "MIT"))

[SCSSPHP](https://github.com/scssphp/scssphp "SCSSPHP") _Leaf Corcoran_ ([MIT License](https://github.com/scssphp/scssphp/blob/master/LICENSE.md "MIT"))
