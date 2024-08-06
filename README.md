Запуск приложения в docker-compose

Сначала установите ядро фреймворка через Composer, затем накатите этот репозиторий.

После этого перейдите в папку с проектом и запустите следующие команды

docker-compose run --rm backend composer install

docker-compose run --rm backend php /app/init

docker-compose up -d


Описание методов 

Котроллер API расположен по backend\controllers\UserController

действия view, index, update, delete - реализованы стандартными средствами фреймворка

действие actionCreate - позволяет создать пользователя. Обязательные к заполнению поля - 
username, password_hash, email

действие actionAuth - авторизация по username, password
