## Выполнить следующие команды после развертывания

- sudo docker-compose exec app composer install
- создать .env
- sudo docker-compose exec app php artisan key:generate
- sudo docker-compose exec app php artisan config:cache
- настроить подключение бд в .env
- sudo docker-compose exec app php artisan migrate

