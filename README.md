# Guest Manager

## Docker

- To start working environment, please run `docker-composer up -d`
- To access laravel app, access address `http://localhost:8087`
- To access database, please use credentials following:

```
Hostname: localhost
Port: 33001
Username: root
Password: smartmap
```

## Install

- copy file .env.example file to .env file
- run `docker exec -it smartmap-app bash` in the project root directory
- run `composer install`
- run `php artisan key:generate`
- run `php artisan migrate`
- run `php artisan db:seed`
- run `chown -R www-data:www-data storage`
- run `composer dump-autoload`
