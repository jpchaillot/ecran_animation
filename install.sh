#!/bin/sh
sudo apt-get update -y # To get the latest package lists
sudo apt-get upgrade -y
sudo apt-get update -y

sudo apt-get install git -y
sudo apt-get install vim -y
sudo apt-get install aptitude -y
sudo apt-get install youtube-dl -y
# mettre a jour youtube dl
sudo youtube-dl -U

sudo aptitude install apache2 -y

sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 770 /var/www/html/
sudo mkdir /var/www/html/video
sudo chmod -R 770 /var/www/html/video


sudo aptitude install php -y

wget -P /var/www/html https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/envoi.php
wget -P /var/www/html https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/index.php
wget -P /var/www/html https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/suppression.php

sudo git clone https://github.com/adafruit/pi_video_looper.git /home/pi/pi_video_looper/
sudo sh ./home/pi/pi_video_looper/install.sh

sudo rm /boot/video_looper.ini
sudo wget -P /boot/ https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/video_looper.ini
