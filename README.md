**Required Software:**
	Docker Desktop – for up and run the docker container in Windows


**project folder structure:**
Root folder: D:\work\rackspace  (based on my development)
D:\work\rackspace:
	**App** – application related PHP source 
	**docker-files** (PHP Docker- PHP\Dockerfile, Apache Docker- Apache\Dockerfile , Apache config file - Apache\apache-conf\*, Apache https SSL certificate - Apache\apache-conf\ssl)
	**db\migrations** – need to keep migrations script 
	**res** – static resource (css, js, img)
	**tests** – Test script 
	**vendor****** – external library 
	**.env** – docker environment values and config details 
	**Composer** – required php external library details 
	**docker-compose.yml** – docker compose file
	**redis-data** – Redis data 
	**index.php** - application bootstrap 
	
	
**List of External Modules used in this project: **

	Composer require robmorgan/phinx - Simple PHP Database Migrations
	Composer required phpunit/php-timer – PHPuntil framework 

All the modules already included in the composer.json 

**Download and Install external library using composer:** 
 Composer install 

Apache https SSL certificate: 
docker run --rm -v D:\work\rackspace\docker-files\Apache\apache-conf\ssl:/certificates -e "SERVER=server.example.com" jacoelho/generate-certificate
** Not a mandatory, if you need to run the app https then only required 
**Composer UP CMD:**
	Cd D:\work\rackspace
	docker-compose up 
**document .env file**
	--Apache VHSOT--
	APACHE_HOST=rackspace.example.com

	--shorty alias VHOST--
	HOST_SHORT_ALIAS=rs.io

	-- MySQL--
	MYSQL_VERSION=8
	MYSQL_HOST=mysql
	MYSQL_DATABASE=rackspace
	MYSQL_ROOT_USER=root
	MYSQL_ROOT_PASSWORD=root

	--REDIS--
	REDIS_PASSWORD=rackspace

**migrations migrations:**
	cd D:\work\rackspace
	 ./vendor/bin/phinx  migrate #improt all date in to database 
	./vendor/bin/phinx  rollback #rollback all the change 
**Add hosts file entry (C:\Windows\System32\drivers\etc\hosts): **
127.0.0.1 rackspace.example.com
127.0.0.1 rs.io

**Check the URL is working in the host machine browser:**
https://rackspace.example.com – open the home page 
http://rackspace.example.com:8080 – phpMyAdmin
http://rs.io – local shorty server and  it’s just alias for webserver 
 




