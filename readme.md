# lishe-pro

A dietary clinic with tools, products and nutritional help to help you reach your fitness goals

# Installation

The project requires:

- A minimum of PHP 7.1.3
- Composer installed
- Npm and git installed

## 1. Clone the project

Run the following command:
```bash
git clone https://github.com/bryceandy/lishe-pro.git
```

## 2. Install dependencies

After downloading the project now we install PHP and Node dependencies with the following commands:
```bash
cd lishe-pro && composer install && npm install
```

## 3. Complete required configurations

There are some configurations that are needed to be fixed prior launching the project.

- Copy the content of the file .env.example to .env file. Create a .env file in the root if it doesnt exist, or use the following:
```bash
mv .env.example .env
```

- APP_KEY env variable should be set. You can obtain a new one with the command
```bash
php artisan key:generate
```

- The database should be configured. DB_DATABASE, DB_HOST, DB_PASSWORD & DB_USERNAME should be set in the .env according to your database settings.

- Login and registration with Facebook, Twitter and Google Plus has been omitted due to the following reasons:
    1. Google Plus API no longer supports this feature.
    2. Facebook integration encountered issues with privacy violation.
    3. Twitter API has changed
    
So in order to keep up with this form of login and registration, the integration needs to be done a fresh with **Laravel socialite**, and update the required values in app/services.php

- All emails in the app were being sent by my personal gmail, so the proper integration would be to use Mailgun, Sparkpost or other APIs you are comfortable with. Read the laravel docs on how to integrate with these services or have a read on a blog post I wrote for easier integration - http://www.bryceandy.com/devblog/Sparkpost-as-an-Alternative-to-Gmail-with-Laravel-5.7

After completing this stage make sure to update the .env variables 'MAIL_USERNAME' & 'MAIL_PASSWORD'

## 4. Migrate the database

Make sure your app server is running by running by running:
```bash
php -S localhost:8000 -t public
```
Or you can choose other server options you want

Then create your local database and migrate the tables by running the command
```bash
php artisan migrate
``` 

## 5. Image assets

All image assets are contained in an AWS account that Sauli has access to, that's why in most images you will find a src attribute in the following format
```html
<img src="https://s3.us-east-2.amazonaws.com/lishepro/someImage.jpg" alt="image">
```
In case you want to to store images in a directory such as **app/public/images**, it is your own choice.
  
## 6. Compiling scss

After writing your styles in scss files, run **npm run prod** to compile to css as it is not proper to modify the compiled app.css or app.min.css.

Otherwise if you do not prefer scss then write your own css files in the public folder.
