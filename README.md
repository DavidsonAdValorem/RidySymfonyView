# RidySymfonyView
Application Symfony Vue to make CRUD skill
Installation:
  -clone project: git clone git@github.com:DavidsonAdValorem/RidySymfonyView.git
  -install symfony dependencies: composer install
  -install js dependencies: npm install

Run Application:
  -start symfony server: symfony server:start (that open app to default local port)
  -start build js: npm run watch

Config database:
  -config .env.local database, create database: php bin/console doctrine:database:create
  -make migration: php bin/console doctrine:migrations:migrate
  -create fixture on database:  php bin/console doctrine:fixtures:load

  
