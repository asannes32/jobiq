### Dockerized PHP Slim app

#### Copy the dockerfile 

`$ cp docker-compose.yml.dist docker-compose.yml`

#### Install Composer dependencies 

`$ composer install`

#### Run Docker

`$ docker-compose up -d`

#### Routes
Endpoints available in ServiceProvider/AppProvider.php