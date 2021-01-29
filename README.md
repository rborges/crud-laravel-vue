# crud-laravel-vue
First test crud laravel-vue 
```sh
```
## Rodar aplicação
```sh
docker-compose up -d --build
```
## Entrar no container
```sh
docker exec -it laravel-php-fpm sh
```

## Rodar migrations
```sh
php artisan migrate:fresh
```

## Rodar seeds
```sh
php artisan db:seed
```
