#!/bin/bash

sudo cp /var/www/torg94.loc/torg94.loc.conf /etc/apache2/sites-available/torg94.loc.conf
sudo cp /var/www/torg94.loc/backend.torg94.loc.conf /etc/apache2/sites-available/backend.torg94.loc.conf
sudo a2ensite torg94.loc
sudo a2ensite backend.torg94.loc
sudo service apache2 restart

xhost="127.0.0.1";xuser="root";xpass="root"
xdb="%dbname%"

mysql --host=$xhost --user=$xuser --password=$xpass << EOF
CREATE DATABASE torg94 DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

exit
EOF
