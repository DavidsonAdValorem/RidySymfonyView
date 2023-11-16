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
  
  -create fixture on database:  php bin/console doctrine:fixtures:load (this commande will create 3 skills in your database and can view it on skills page)

Description:

This application was developed for create, read, update and delete skill* card who contains the descprition, level, and others information about the skill. To create skill in the app, install project, run it locally following the instructions above, go to the form page and complete fields. Yon can see your new skill created in the skills page. Each skill create can be modified and removed with button. You can also view in details on click more button, it show a modal content all information about the skill. 

Note:

*On this project skill is generaly based on web dev such as an language, framework, tech, etc... 
