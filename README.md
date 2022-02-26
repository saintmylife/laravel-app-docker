# docker-laravel-postgres-nginx

Simple docker-compose for Laravel, with postgresql, redis, nginx and php-fpm

# Pre-requisites

- Docker running on the host machine.
- Docker compose running on the host machine.
- Basic knowledge of Docker.

# Installation

- To get started, the following steps needs to be taken:
- Clone the repo.
- open project directory.
- `cp .env.example .env` to use docker env config file
- `cp application/.env.example application/.env` for laravel env (change db,user and password in accordance with the docker .env)
- Run `docker-compose up -d` to start the containers.
- Visit http://localhost:9000 to see your Laravel application.
- Try to connect 127.0.0.1:5433 to access Postgres
- After starting, note that one directory and one file will be created with name _postgres_ and file _data_, this files are Database archives
- After Succesfully Installed. run `docker-compose exec php-fpm composer install && docker-compose exec php-fpm php artisan config:clear && docker-compose exec php-fpm php artisan config:cache && docker-compose exec php-fpm php artisan migrate && docker-compose exec php-fpm php artisan db:seed && docker-compose exec php-fpm php artisan passport:install`
- Paste grant password id and secret to your .env

# usage:

- `docker-compose up -d` to start all containers
- `docker-compose down` to stop all containers
- If you need to restart after modifying _docker-compose.yml_ restart with `docker-compose down` and `docker-compose up -d`

# Images

- redis:alpine
- postgres:12.1-alpine
- nginx:stable-perl
- php:8.1.3-fpm-alpine3.15

# SourceFiles

## Into **sourcefiles** directory, exists others directories: **php-fpm** and **nginx**:

### nginx: nginx.conf

- file conf nginx

### volumes:

- nginx folder
- data(postgres)

### multiple servers:

- create file conf of nginx in nginx directory you should use default.conf as exemple
- restart containers: `docker-compose down` and `docker-composer up -d`

# Troubleshooting

## Nginx log

- Nginx log is available on sourcefiles/nginx/log

## If you need to restart after modifying _Dockerfile_ and have Troubleshooting:

- Verify all containers running: `docker-compose ps -a`
- Stop all containers and remove: `docker-compose down`
- Try to start again `docker-compose up -d`
