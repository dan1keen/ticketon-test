## Выполнить следующие команды после развертывания

- sudo docker-compose exec app composer install
- sudo docker-compose exec app php artisan key:generate
- создать .env
- sudo docker-compose exec app php artisan config:cache
- sudo docker-compose exec app php artisan migrate

