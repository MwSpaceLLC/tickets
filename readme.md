<p align="center"><img src="https://avatars0.githubusercontent.com/u/29952045?s=460&v=4" width="150">Tickets</p>

## About MwSpace
MwSpace LLC is a most advanced brand for develop any idea e/o startup. Our business is to boost any company with our services (SASS, PASS, IASS).

### Why ?
This product help many companies to manage work with simple ticket system.
No mounthly cost, only deploy app on cloud, & work every u want! 

### Contributing
Thank you for considering contributing to the Tickets Project, if u want to hep us, 
u can become a [Patreon] (https://www.patreon.com/user?u=24519588)

### Security & Tug Track
If you discover a security vulnerability within Tickets, please send an e-mail to support via [support@mwspace.com](mailto:support@mwspace.com). All security vulnerabilities will be promptly addressed.

### License
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### First Install ?
U can deploy on cPanel as git version control, or container with docker, in cloud run, app engine or any choise.

so u must login as user in to ssh & cd in your project:

    composer install && php artisan optimize

After this, u must update in env file your DB/URL & MAIL configuration (https://laravel.com/docs/6.x/database)

    APP_URL=http://localhost
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
   
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null

Fine Work! if all work u can run:

    php artisan migrate
    
If u have any problem, please first read the Laravel's guide =)
