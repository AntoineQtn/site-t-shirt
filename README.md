# site-t-shirt

#Initialisation

When project is cloned : 

	-cp .env.example .env
	-composer install

	-sudo mysql

	-CREATE DATABASE t_shirt;
	-CREATE USER '.....'@'localhost' IDENTIFIED BY 'motdepasse';
	-GRANT ALL PRIVILEGES ON t_shirt.* TO '......'@'localhost';
	-EXIT;

	Then, edit the .env to change with your database

	Then :

	- php artisan migrate


	
