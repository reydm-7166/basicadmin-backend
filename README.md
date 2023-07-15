STEP 1: 

    composer install (if doesnt work append this --ignore-platform-reqs)
	composer update (if doesnt work append this --ignore-platform-reqs)

STEP 2: 

    npm install


STEP 3: 

    php artisan storage:link

STEP 4:

	rename .env.example file to .env only
	change the database name to praxxys
	put the db_username and db_password with your db username and password
	create database named praxxys


STEP 5: 

    php artisan migrate:fresh --seed

STEP 6: 

    php artisan key:generate
	php artisan serve
	npm run dev

STEP 7: Navigate to /login :> i did not put anything on / only.




___________________________________________________________________




FOR THE features.

login using the credentials in the DatabaseSeeder.


