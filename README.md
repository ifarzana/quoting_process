# Quoting

Multi step quoting process.

1. Go to **localhost/step1**.
1. Add the user details and click next
1. Select a product type and a product, fill other fields, then click next
1. If you want to add more product click on **yes** else click on **No, but generate quote** to generate a quote. 

# Routes
1. localhost/step1
1. localhost/step2
1. localhost/step3
1. localhost/quote/{quote_id}

## Starting the application

1. Run **composer update** to install the project dependencies.
1. Configure your web server to have the **public** folder as the web root.
1. Open [App/Config/Database.php](App/Config/Database.php) and enter your database configuration data.
1. Run the script in **db.sql** to populate the database.

In case you are on Ubuntu, edit the file /etc/apache2/apache2.conf (here we have an example of  /var/www):
```php
<Directory /var/www/site>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>
```
and change it to;
```php
<Directory /var/www/site>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
```
then,
```php
sudo service apache2 restart
```
You may need to also do **sudo a2enmod rewrite** to enable module rewrite.