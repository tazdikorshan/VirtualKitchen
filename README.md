
# Virtual Kitchen

A website that let users to browse, filter and interact with recipes, using a simple account creation system. After creating an account and logging in, users can add and edit food recipes.
# Lessons Learned
- How Laravel Framework works.
- How to actually implement a MVC (e.g., model/view/controller) system.
- How to configure the Blade files.
- How to connect Database to the website.




## For Testing Out

First XAMPP must be on your device (This is a open-source software package that lets you set up a local web server on your computer for development and testing).

Clone the project first

```bash
git clone https://github.com/tazdikorshan/Virtual-Kitchen
```

Change database values to your liking (I am using MySQL):

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vkitchen
DB_USERNAME=root
DB_PASSWORD=
```

Go to the project directory
```bash
cd vkitchen
```
Run Migrations (This creates datable tables)
```bash
php artisan migrate
```
Run Seeder (To test some data)
```bash
php artisan db:seed
```
Start the server
```bash
php artisan serve
```
Hit the link on the terminal and you are good to go!!


# Notes
- Make sure the .env file is configured with the correct database connection.
- Run composer install before migrations and seeders because your clone will be fresh clone.
- The Recipe Seeder file is on the database folder
