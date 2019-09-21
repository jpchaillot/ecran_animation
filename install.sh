#!/bin/sh
sudo apt-get update -y # To get the latest package lists
sudo apt-get upgrade -y
sudo apt-get update -y

sudo apt-get install git -y
sudo apt-get install vim -y
sudo apt-get install aptitude -y
sudo apt-get install youtube-dl -y

sudo aptitude install apache2 -y

sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 770 /var/www/html/

sudo aptitude install php -y


#ensuite installation de composer et avec installation de youtube-dl-php de norkumas
curl -sS https://getcomposer.org/installer | php
php composer.phar require norkunas/youtube-dl-php
