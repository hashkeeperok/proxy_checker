# proxy_checker

## Установка локально (dev)

**Клонировать:**
```bash
git clone git@github.com:hashkeeperok/proxy_checker.git
```

**Перейти в директорию:**
```bash
cd ./proxy_checker
```

**Установить зависимости:**
```bash
 docker run --rm  -u "$(id -u):$(id -g)" -v $(pwd):/var/www -w /var/www laravelsail/php81-composer:latest composer install --no-cache
```

**Можно создать алиас для sail:**
```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

**Поднять докер контейнеры:**
```bash
./vendor/bin/sail up -d
```

**Выполнить миграции**
```bash
./vendor/bin/sail composer migrate
```

**Поднять фронт:**
```bash
./vendor/bin/sail npm run dev
```

**Для выполнения команд Laravel внутри контейнера можно использовать laravel/sail**
```bash
./vendor/bin/sail composer install
./vendor/bin/sail composer require ...
./vendor/bin/sail artisan ...
```
**Документация по sail https://laravel.com/docs/10.x/sail**
