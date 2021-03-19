## Выполнить следующие команды после развертывания

- sudo docker-compose exec app composer install
- создать .env
```DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=test_ticketon
DB_USERNAME=root
DB_PASSWORD=12345```
- sudo docker-compose exec app php artisan key:generate
- sudo docker-compose exec app php artisan config:cache
- настроить подключение бд в .env
- sudo docker-compose exec app php artisan migrate

