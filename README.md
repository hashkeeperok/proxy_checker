# proxy_checker

## Требования

[- Для работы отчетов в кубе требуется persistent volume с названием local-pvc-dialer-api -]

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

**Поднять фронт:**
```bash
./vendor/bin/sail npm run dev
```

**Выполнить миграции: (только на dev!!!)**
```bash
./vendor/bin/sail artisan migrate --seed
```

**Во время разработки можно выполнять тесты**
```bash
./vendor/bin/sail test
```

**Для включения xdebug**

В .env добавить
```bash
XDEBUG_ENABLED=on
```

**API будет доступно по адресу [localhost:8000](http://localhost:8000)**

**Для выполнения команд Laravel внутри контейнера можно использовать laravel/sail**
```bash
./vendor/bin/sail composer install
./vendor/bin/sail composer require ...
./vendor/bin/sail artisan ...
```
**Документация по sail https://laravel.com/docs/10.x/sail**

## Установка на сервер (test, stage, prod)

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
composer install --no-dev
```

**Скопировать .env файл из примера:**
```bash
cp .env.example .env
```

**Прописать актуальные подключения к БД и другие параметры в .env**

**Сконфигурировать Apache или Nginx:**
Directory root: ./public
пример конфигурации для nginx
```
charset utf-8;
location / {
  if (!-e $request_filename){
    rewrite ^(.*)$ /index.php break;
  }
}
```
