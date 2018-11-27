# Quoting

Multi step quoting process. 

## Starting an applicatio

1. Run **composer update** to install the project dependencies.
1. Configure your web server to have the **public** folder as the web root.
1. Open [App/Config/Database.php](App/Config/Database.php) and enter your database configuration data.

In case you are on Ubuntu, edit the file /etc/apache2/apache2.conf (here we have an example of  /var/www):

<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>
and change it to;

<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
then,

sudo service apache2 restart
You may need to also do sudo a2enmod rewrite to enable module rewrite.

See below for more details.
