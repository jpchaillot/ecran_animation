notice de l ecran

1 installer rasbian lite

copier les fichier ssh et wpa_supplicant.conf sur la partition boot de la carte sd en y modifiant les valeurs pour le mot de passe wifi

sudo apt-get update  && sudo apt-get upgrade && sudo apt-get update  && sudo apt-get upgrade 

2 Execut'er cette commande

wget https://raw.githubusercontent.com/jpchaillot/ecran_animation/master/install.sh  && sudo chmod +x install.sh && sudo sh ./install.sh


ancienne methode 
executer ces commandes sur le raspberry
sudo apt-get update
sudo apt-get install -y git
git clone https://github.com/adafruit/pi_video_looper.git
cd pi_video_looper
sudo ./install.sh

configuration du /boot/video_looper.ini file ici present


sudo apt-get install youtubedl

sudo aptitude install apache2
sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 770 /var/www/html/
sudo aptitude install php7.0
sudo aptitude install mysql-server php7.0-mysql
sudo aptitude install phpmyadmin


ensuite installation de composer et avec installation de youtube-dl-php de norkumas
curl -sS https://getcomposer.org/installer | php
php composer.phar require norkunas/youtube-dl-php


le fichier de configuration :  
# Main configuration file for video looper.
# You can change settings like what video player is used or where to search for
# movie files.  Lines that begin with # are comments that will be ignored.
# Uncomment a line by removing its preceding # character.
 
# Video looper configuration block follows.
[video_looper]
 
# What video player will be used to play movies.  Can be either omxplayer or
# hello_video.  omxplayer can play common formats like avi, mov, mp4, etc. and
# with full audio and video, but it has a small ~100ms delay between loops.
# hello_video is a simpler player that doesn't do audio and only plays raw H264
# streams, but loops seemlessly.  The default is omxplayer.
video_player = omxplayer
#video_player = hello_video
 
# Where to find movie files.  Can be either usb_drive or directory.  When using
# usb_drive any USB stick inserted in to the Pi will be automatically mounted
# and searched for video files (only in the root directory).  Alternatively the
# directory option will search only a specified directory on the SD card for
# movie files.  Note that you change the directory by modifying the setting in
# the [directory] section below.  The default is usb_drive.
#file_reader = usb_drive
file_reader = /home/pi/video






commande utile:

pour arreter le video loop :
sudo supervisorctl stop video_looper





lien utile
https://learn.adafruit.com/raspberry-pi-video-looper/installation

pour rendre l'ip fixe
http://www.framboise314.fr/allouer-une-adresse-ip-fixe-au-raspberry/
