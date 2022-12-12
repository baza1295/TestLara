# TestLara

#### Для полноценной работы необходимо установить Docker.
https://docker-docs.netlify.app/compose/install/

#### Необходимо собрать контейнеры
```bash
docker-compose build
```
___

#### Поднимаем контейнеры
```bash
docker-compose up -d
```
___

#### Запускаем composer install
```bash
docker exec -it $(docker-compose ps -q php) composer install
```

___

#### Применяем migration и seeders для заполнения БД
```bash
docker exec -it $(docker-compose ps -q php) php artisan migrate --seed
```

___

#### Генерация API документации
```bash
cd laravel/documentation
docker-compose up --build
```

___

#### Запуск тестов
Документация для работы с тестами

https://laravel.com/docs/8.x/testing
```bash
docker exec -it $(docker-compose ps -q php) php artisan test 
```