
В composer.json добавляем в блок require
```json
 "vis/comments": "1.0.*"
```

Выполняем
```json
composer update
```

Добавляем в app.php
```php
  'Vis\Comments\CommentsServiceProvider',
```

Выполняем миграцию таблиц
```json
   php artisan migrate --package=vis/comments
```

Публикуем js файлы
```json
   php artisan asset:publish vis/comments
```

И если нужно публикуем views
```json
   php artisan view:publish vis/comments
```
-----------------------------------
Использование на фронтенде:

Показываем форму для комментария на странице
```php
{{Comments::showForm($page)}}
```

Показываем список комментариев это страницы
```php
{{Comments::showListComments($page)}}
```