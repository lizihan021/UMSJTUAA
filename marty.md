---
title: DIY Marty the Robot
tags: 
- Marty
- RaspberryPi
- openCV
- 3D_print
- i2c_Communication
author: Li Zihan 
---
## **Abstract**
**Marty the robort** is a crowd-funding project on Indiegogo. The estimated comeout time of Marty's design is Semptember 2016. I don't want to wait that long for the design so I build the robort myself... 
![Marty the Robot (from Indiegogo.com)](/pic/marty/1.PNG)

This report is a tutorial of how to build robot Marty by yourself. Problems being solved in this tutorial:
1. How to config i2c communication on Raspberry Pi 3 (with PCA9685).
2. How to install openCV-3.0.0 on Raspbian Jessie system based on Raspberry Pi 3.
3. How to use 3D printer.

## **System Implementation**
### **1. Setup**
#### **Hardware:**
* 8mm*M3 screws 
* a 3D printer with plenty of PLA
* SG90 Servo *9
* PCA9685 module
* Raspberry Pi 3 B+
* Pi Camera
* 500 mAh, 11.1 V Li-battery
* voltage reduction module 11.1 V to 6 V

#### **Software:**
1. When you buy a raspberrypi, it's just a bare board without any operating system. Let's assume you have already installed latest Raspbian OS on your raspberrypi and and have succesfully remote control your pi. If you haven't yet finished, please follow the instruction below to **initialize your raspberrypi**:
http://yesyzq.github.io/2016/01/09/raspberry/
Make sure that you have network environment for raspberry pi to work properly.

2. In case you are not familiar with **Linux command**:
http://yesyzq.github.io/2016/01/17/Linux%E5%91%BD%E4%BB%A4%E4%BB%A5%E5%8F%8A%E5%BF%AB%E6%8D%B7%E9%94%AE%E6%95%B4%E7%90%86/
You may also refer to any other guide online. There are always abundant resources waiting for you to explore on the internet.

### **2. Implementation:**
#### **Hardware:**
I 3D printed all the parts that are needed to build Marty. The parts are designed using UG NX 10.0 and are exported to .stl files. Then those .stl files are used to generate .gcode or .pcode using slicing softwares. 
![Assemble the parts in UG](/pic/marty/2.PNG)
That is what marty is going to look like. (I'm too lazy to assemble another leg ...)
The following are all the files:
![all the .prt files](/pic/marty/3.PNG)
You need to export *.prt files to *.stl files for 3D printing.
You need to print:

* 12 pieces of MMarty1.prt - connecting bar
* 8 pieces of marty4.prt ----- supporting plate
* 4 pieces of marty3.prt ----- servo connecting bar
* 2 pieces of marty2.prt ----- third servo
* 2 pieces of marty5.prt ----- feet of marty
* 2 pieces of marty6.prt ----- second servo
* 2 pieces of marty7.prt ----- first servo
* 2 pieces of shou.prt ------- arms of marty
* 2 pieces of yanjing.prt ---- eyes of marty
* 1 piece of body.prt --------- body of marty

Then with the parts, you can assemble marty:
![leg of marty](/pic/marty/2.JPG)
![leg of marty](/pic/marty/3.JPG)
![marty](/pic/marty/4.JPG)

I also added a speaker on Marty:
![circuit of marty](/pic/marty/10.JPG)

#### **Software:**
##### **I. Install OpenCV**
To make Marty capable of face detecting, we install openCV-3.0.0 in Pi 3. The tutorial is mainly based on [this tutorial](http://www.pyimagesearch.com/2015/10/26/how-to-install-opencv-3-on-raspbian-jessie/) Notice you need to run this line of code to solve the depencence problem. `sudo apt-get install build-essential libgtk2.0-dev libjpeg-dev libtiff5-dev libjasper-dev libopenexr-dev cmake python-dev python-numpy python-tk libeigen2-dev yasm libopencore-amrnb-dev libopencore-amrwb-dev libtheora-dev libvorbis-dev libxvidcore-dev libx264-dev libqt4-dev libqt4-opengl-dev sphinx-common texlive-latex-extra libv4l-dev libdc1394-22-dev libavcodec-dev libavformat-dev libswscale-dev libeigen3-dev` 
##### **II. Driver**
To drive Marty, I wrote a library that contains basic instructions to control Marty.
```
Main files: 
	duo.py  # this is the main driven program of marty.
		    # it defines an object called duo which include following functions:
		    # .dance(times, speed) to dance "times" times at "speed" speed
		    # .walk(times, speed)  to walk "times" times at "speed" speed
		    # .turn(angle, speed)  to turn "angle" at "speed" speed
		    # .zhuanyan(times, range, speed) to rotate eyes with range "range"
		    # .dongshou(times, jizhun, range, speed) to move hand at a base angle of 
		    # "jizhun" and range "range"

	face.py # this is the face detection file marty will take picture around every 
			# 0.5 seconds. Pictures is under /pic folder.
			# If there is face detected, Marty will turn to the direction 
			# of the face. If the face is far from Marty, it will walk toward the 
			# direction of the face.
			# **this file must be run in cv environment**

	boom.py # this file serves as a example if you want to move Marty's hand, eyes
			# and legs simultaniously. DO NOT TRY TO WALK AND DANCE SIMUTANIOUSLY,
			# BECAUSE THAT MIGHT CAUSE ERRORS. 

	PCA9685.py video.py common.py and <files in /xmlf> come from 3rd party.

	other files are test files and serves as examples about how to control Marty.
```
![Driver of Marty](/pic/marty/4.PNG)

##### **III. Open i2c communication**
Search i2c at `/boot/config.txt` and change the item to 'on'. Then reboot. Check you have open i2c successfully by `sudo i2cdetect -y 1`
### **3. DEMO**
face detection by opencv:
<video controls><source src="/video/marty/1.mp4" type="video/mp4"></video> 

walking:
<video controls><source src="/video/marty/2.mp4" type="video/mp4"></video>

turning:
<video controls><source src="/video/marty/3.mp4" type="video/mp4"></video>

singing:
<video controls><source src="/video/marty/4.mp4" type="video/mp4"></video>

dancing:
<video controls><source src="/video/marty/5.mp4" type="video/mp4"></video>

pretend busy programming:
<video controls><source src="/video/marty/6.mp4" type="video/mp4"></video>

face detecting, when marty see me, it will turn to my direction and move forward. 
however, his head is too heavy that he cannot move fluently. 
<video controls><source src="/video/marty/7.mp4" type="video/mp4"></video>
<video controls><source src="/video/marty/8.mp4" type="video/mp4"></video>
<video controls><source src="/video/marty/9.mp4" type="video/mp4"></video>