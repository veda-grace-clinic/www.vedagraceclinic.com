#!/bin/sh

# Install PHP
sudo apt-get install php

# Install Composer
EXPECTED_SIGNATURE=$(curl -sS https://composer.github.io/installer.sig)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")
if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]
then
    >&2 echo 'ERROR: Invalid installer signature'
    rm composer-setup.php
    exit 1
fi
php composer-setup.php --quiet 
RESULT=$?

# Install Plugin & Theme Dependencies via Composer
php composer.phar install 


exit 0