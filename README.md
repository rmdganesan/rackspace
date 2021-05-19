Required Software:
•	Docker Desktop – for up and run the docker container in Windows


project folder structure:
Root folder: D:\work\rackspace  (based on my development)
D:\work\rackspace:
App – application related PHP source 
docker-files (PHP Docker- PHP\Dockerfile, Apache Docker- Apache\Dockerfile , Apache config file - Apache\apache-conf\*, Apache https SSL certificate - Apache\apache-conf\ssl)
		db\migrations – need to keep migrations script 
		res – static resource (css, js, img)
		tests – Test script 
		vendor – external library 
		.env – docker environment values and config details 
		Bases.sql – base mysql dump 
		Composer – required php external library details 
		docker-compose.yml – docker compose file 
		index.php - application bootstrap 
List of External Modules used in this project: 
Composer require robmorgan/phinx - Simple PHP Database Migrations
Composer required phpunit/php-timer – PHPuntil framework 

All the modules already included in the composer.json 

Download and Install external library using composer: 
	Composer install 

Apache https SSL certificate: 
docker run --rm -v D:\work\rackspace\docker-files\Apache\apache-conf\ssl:/certificates -e "SERVER=server.example.com" jacoelho/generate-certificate
** Not a mandatory, if you need to run the app https then only required 
Composer UP CMD:
	Cd D:\work\rackspace
	docker-compose up 

migrations migrations:
	cd D:\work\rackspace
	./vendor/bin/phinx init # it’s create phinx.php – this file need to update DB connection string 
	 ./vendor/bin/phinx  migrate #improt all date in to database 
	./vendor/bin/phinx  rollback #rollback all the change 
Add hosts file entry (C:\Windows\System32\drivers\etc\hosts): 
127.0.0.1 rackspace.example.com
Check the URL is working in the host machine browser:
https://rackspace.example.com – open the home page 
http://rackspace.example.com:8080 - phpmyadmin
 




