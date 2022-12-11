How to Run
- Clone the repository to C:\xampp\htdocs
- Run XAMPP and start Apache and MySQL
- Open a browser and go to http://localhost/phpmyadmin
- Create a database named "wad_modul5_febri"
- Rename the .env.example file to .env
- Configure the .env file as follows
```
DB_CONNECTION=mysql
DB_HOST={db host}
DB_PORT={db port}
DB_DATABASE=wad_modul5_febri
DB_USERNAME=root
DB_PASSWORD={root password}
```
- Run this code
```
php artisan migrate
php artisan db:seed
php artisan serve
```
- Open a browser and go to http://localhost:8000
- Enjoy the app