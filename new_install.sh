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
sudo aptitude install php -y

sudo rm -R /var/www/html
sudo mkdir /var/www/html/

sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 777 /var/www/html/

sudo mkdir /var/www/html/video
sudo chown -R pi:www-data /var/www/html/video
sudo chmod -R 777 /var/www/html/video


sudo wget -P /var/www/html https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/envoi.php
sudo wget -P /var/www/html https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/index.php
sudo wget -P /var/www/html https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/suppression.php

sudo chown -R pi:www-data /var/www/html/*
sudo chmod -R 777 /var/www/html/*

# sudo git clone https://github.com/adafruit/pi_video_looper.git /home/pi/pi_video_looper/
# sudo chmod +x /home/pi/pi_video_looper/install.sh
# sudo /home/pi/pi_video_looper/install.sh

# modification de apache pour avoir un timeout largement supp
# sudo sed -i '/Timeout [0-9]+/c\ Timeout 123' /etc/apache2/apache2.conf
sudo sed -ri 's/Timeout [0-9]+/Timeout 50000/g' /etc/apache2/apache2.conf

# modification du php.ini
sudo find /etc/ -name "php.ini" -exec sudo sed -ri 's/post_max_size *= *[0-9]+[MK]?/post_max_size = 1900M/g' {} +
sudo find /etc/ -name "php.ini" -exec sudo sed -ri 's/upload_max_filesize *= *[0-9]+[MK]?/upload_max_filesize = 1900M/g' {} +
sudo find /etc/ -name "php.ini" -exec sudo sed -ri 's/default_socket_timeout *= *[0-9]+/default_socket_timeout = 6000/g' {} +


sudo sed -i '/file_reader = usb_drive/c\# file_reader = usb_drive' /boot/video_looper.ini
sudo sed -i '/# *file_reader = directory/c\file_reader = directory' /boot/video_looper.ini
sudo sed -i '/path = \/home\/pi\/video/c\path = \/var\/www\/html\/video' /boot/video_looper.ini

#sudo rm /boot/video_looper.ini
#sudo wget -P /boot/ https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/video_looper.ini
