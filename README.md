# TestLara

#### Для полноценной работы необходимо установить Docker.
https://docker-docs.netlify.app/compose/install/

#### Необходимо собрать контейнеры
```
docker-compose build
```
___

#### Поднимаем контейнеры
```
docker-compose up -d
```
___

#### Запускаем composer install
```
docker exec -it $(docker-compose ps -q php) composer install
```

___

#### Применяем migration и seeders для заполнения БД
```
docker exec -it $(docker-compose ps -q php) php artisan migrate --seed
```

___

#### Генерация API документации
```
cd laravel/documentation
docker-compose up --build
```

___

#### Запуск тестов
Документация для работы с тестами

https://laravel.com/docs/8.x/testing
```
docker exec -it $(docker-compose ps -q php) php artisan test 
```

___

#### Проверка IP адреса клиента осуществляется в 
```
laravel/app/Http/Middleware/IPAddresses.php
```

___

#### Консольная команда для сброса количества запросов в день на получение баланса находится в
```
laravel/app/Console/Commands/UpdateDailyLimitCommand.php
```
