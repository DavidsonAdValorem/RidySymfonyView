# RidySymfonyView
Application Symfony Vue to make CRUD skill
requirements:

  -install PHP 8.1 or higher
  
  -install composer
  
  -install symfony CLI(optional)
  
  
Installation:

  -clone project: git clone git@github.com:DavidsonAdValorem/RidySymfonyView.git
  
  -install symfony dependencies: composer install
  
  -install js dependencies: npm install


Run Application:

  -start build js: npm run watch
  
  -start symfony server: symfony server:start (that open app to default local port)


Config database:

  -config .env.local database, create database: php bin/console doctrine:database:create
  
  -make migration: php bin/console doctrine:migrations:migrate
  
  -create fixture on database:  php bin/console doctrine:fixtures:load

  
