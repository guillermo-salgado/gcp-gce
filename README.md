# Steps to run LAMPP stack on GCP

## Install LAMP

### Install Apache and PHP

1. Create virtual machine debian
2. Connect through ssh
3. sudo apt-get update
4. sudo apt-get upgrade
5. sudo apt-get install apache2 php libapache2-mod-php
6. sudo systemctl status apache2

### Instal mysql and phpmyadmin

1. sudo apt-get install mysql-server php-mysql php-pear
2.  sudo mysql_secure_installation
3. sudo apt-get install phpmyadmin
    1. Select apache2.
    2. Select yes to use dbconfig-common for database setup.
    3. Enter the database administrator's password that you chose during MySQL configuration.
    4. Enter a password for the phpMyAdmin application.
4. sudo ln -s /usr/share/phpmyadmin /var/www/html/

### Create phpmyadmin user
1. sudo mariadb
2. CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
3. GRANT ALL PRIVILEGES ON \*.\* TO 'user'@'localhost' WITH GRANT OPTION;

## Deploy
1. Upload project folder to bucket_name
2. sudo gsutil cp -r gs://bucket_name/folder_name /var/www/html/
