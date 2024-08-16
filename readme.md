
# Goal: Setup Docker ENV for development

Containing:
- Apache
- PHP
- MySQL

Docker login == GIT Login

## Resources
https://doc4dev.com/en/create-a-web-site-php-apache-mysql-in-5-minutes-with-docker/

### Notes
-    app/index.php: The entry point of our website, we will write our PHP code there
-    build/mysql/Dockerfile: Docker configuration file that describes how to install MySQL
-    build/php/Dockerfile: Docker configuration file that describes how to install Apache and PHP
-    docker-compose.yml: Docker-compose configuration file, which when executed will launch the containers and run our architecture.


## PHP

```
volumes:
  - ./app:/var/www/html
```

Map our `app` directory to the default root directory for Apache

# MySQL

`mysql:latest` is 8.3   (too new for my Navicat)

`mysql:5-debian` is 5.7.4, same as WAMP  (works in Navicat)

Switching versions ?
* you need to remove containers, images, etc... 
* try --build  ??
* try  -V  ??

```
MYSQL_ROOT_PASSWORD: "super-secret-password"
MYSQL_DATABASE: "my-wonderful-website"
```
Variables are declared & executed during installation of MySQL
DB will be created (if it doesn't exist) when container is launched

```
volumes:
  - dbData:/var/lib/mysql
```
A volume is created so that the data is not lost when the container is shut down ?????

```
RUN chmod 755 /var/lib/mysql
```
Change permissions on the container directory, to allow PHP to connect to it


## WSL, Ubuntu

`/mnt/` has windows mounts already (did I create these ?)

## Connect to MySQL

```
docker exec -it project-docker-mysql-1 bash
>> mysql -u<user> -p<password>
>> show databases;
>> use <dbname>
>> show tables;
>> ...
```


```



Try...

docker run -it --network some-network --rm mysql mysql -hsome-mysql -uexample-user -p



### Issues..?
if :

The command 'docker-compose' could not be found in this WSL 2 distro.
We recommend to activate the WSL integration in Docker Desktop settings.

Then docker-desktop is not running
