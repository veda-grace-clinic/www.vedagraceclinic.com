#!/bin/sh

# Install PHP
curl -sSL http://www.php.net/distributions/php-7.3.5.tar.xz --output php-7.3.5.tar.xz
tar -zxvf php-7.3.5.tar.xz
cd php-7.3.5
./configure --prefix=/usr                \
            --sysconfdir=/etc            \
            --localstatedir=/var         \
            --datadir=/usr/share/php     \
            --mandir=/usr/share/man      \
            --without-pear               \
            --enable-fpm                 \
            --with-fpm-user=apache       \
            --with-fpm-group=apache      \
            --with-config-file-path=/etc \
            --with-zlib                  \
            --enable-bcmath              \
            --with-bz2                   \
            --enable-calendar            \
            --enable-dba=shared          \
            --with-gdbm                  \
            --with-gmp                   \
            --enable-ftp                 \
            --with-gettext               \
            --enable-mbstring            \
            --with-readline              &&
make

make install                                     &&
install -v -m644 php.ini-production /etc/php.ini &&

install -v -m755 -d /usr/share/doc/php-7.3.5 &&
install -v -m644    CODING_STANDARDS EXTENSIONS INSTALL NEWS README* UPGRADING* php.gif \
                    /usr/share/doc/php-7.3.5 &&
ln -v -sfn          /usr/lib/php/doc/Archive_Tar/docs/Archive_Tar.txt \
                    /usr/share/doc/php-7.3.5 &&
ln -v -sfn          /usr/lib/php/doc/Structures_Graph/docs \
                    /usr/share/doc/php-7.3.5

cd ../

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