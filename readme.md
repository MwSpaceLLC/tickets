<p align="center"><img src="https://avatars0.githubusercontent.com/u/29952045?s=460&v=4" width="150">Tickets</p>

## About MwSpace
MwSpace LLC is a most advanced brand for develop any idea e/o startup. Our business is to boost any company with our services (SASS, PASS, IASS).

### Why ?
This product help many companies to manage work with simple ticket system.
No mounthly cost, only deploy app on cloud, & work every u want! 

### Important !! 

This repo NOT stable, please download at your risk. Public beta will cooming soon at 30/09/2019

### Contributing
Thank you for considering contributing to the Tickets Project, if u want to hep us, 
u can become a [Patreon] (https://www.patreon.com/user?u=24519588)

### Security & Tug Track
If you discover a security vulnerability within Tickets, please send an e-mail to support via [support@mwspace.com](mailto:support@mwspace.com). All security vulnerabilities will be promptly addressed.

### License
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### First Install ?
U can deploy on cPanel as git version control, or container with docker, in cloud run, app engine or any choise. [cPanel Install from Git](https://www.youtube.com/watch?v=K63EGgPvlIw)

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

### Trick 6 knows

1) Create user,groups, access
1) Control login permission,
1) Change Theme (u can develop a front-end & change it in config),
1) Intelligent Work (see only ticket without reply)
1) Ticket support (Header, Images/cliopard, Link, attachment)
1) Peaple Views & last reply
1) Close, re-open & report
1) Mail allert ticket opened,replied
1) Monthly report status 

Other Futures cooming soon !

### Control Updates

With git, u can update the core. if this repo are Stable, or Beta u can easily update code from git command "pull"

