***************
*
*
*      BEST VIEWED IN 1920x1080 monitor :D
*      but works on table and a bitof mobile view (its not fully responsive) half of it are.
*
*
*
***************


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

    > url: /login                 login panel. (login using the credentials from the DatabaseSeeder

    > url: /admin/dashboard       dashboard graphs. (made it simple i was running out of time)

    > url: /admin/product         product page

___________________________________________________________________           

    > Search  
![image](https://github.com/reydm-7166/praxxys-backend/assets/98306215/c52ebed9-f459-4e14-bd71-836bbc4517fa)

    > Add Product  
![image](https://github.com/reydm-7166/praxxys-backend/assets/98306215/6d49177a-b4e9-4ee7-9618-1b9670d80289)

    > Filter   
![image](https://github.com/reydm-7166/praxxys-backend/assets/98306215/5f227412-57cf-42f1-9c3f-693424f701c8)

     > Action [view, edit, delete] 
![image](https://github.com/reydm-7166/praxxys-backend/assets/98306215/7e26ccba-b5af-47a9-ba0e-95434fa7734e)

    > Pagiantion 
![image](https://github.com/reydm-7166/praxxys-backend/assets/98306215/45ad5932-05fd-4169-817d-e4c8f94122f4)


