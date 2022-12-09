# TestLara

1
___
```bash
docker-compose build
```
2
```bash
docker-compose up -d
```

3
```bash
docker exec -it $(docker-compose ps -q php) composer install
```
4
```bash
docker exec -it $(docker-compose ps -q php) php artisan migrate --seed
```