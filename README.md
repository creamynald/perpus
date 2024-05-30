## INFORMATION

-   this is cms, can use for multiple purpose
-   auth from ui/bootstrap and using spatie for permissions

## REQUIREMENTS

-   brain (akwakwkakw)

## INSTALATION

1. git clone [link] or use [folder name] for specific folder name
2. run composer install
3. make new file .env and paste env dummy
4. edit .env and make sure edit *DB_DATABASE* to your database
5. run *php artisan key:generate*
6. run *php artisan migrate:fresh --seed*
7. If u have local serve like laragon, just start and run [foldername].test for run the app
8. and the last one dont forget to run npm run dev

## ROLES & PERMISSIONS

we play roles and permission with spatie, go to documentation if u need more information.
and we are :

1. roles is automaticly running if u run migrate with --seed
2. for demo purpose, u can use :
    - super admin is superadmin@perpus.test
    - admin is admin@perpus.test
    - kepsek is kepsek@perpus.test
    - also user is siswa@perpus.test
    - and then, default password is _password_

THANKS
