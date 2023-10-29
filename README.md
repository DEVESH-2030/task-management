# Task Management System

## Screenshots:

### web page
- ![Alt text](<Screenshot from 2023-10-30 01-36-57.png>)

### Save/Create Task
- ![Alt text](<Screenshot from 2023-10-30 01-31-19.png>)

### Update Task
- ![Alt text](<Screenshot from 2023-10-30 01-30-45.png>)

### Delete Button 
- Delete is use to delete.remove the record from database (soft delete)  and you can see response message also
- ![Alt text](<Screenshot from 2023-10-30 01-30-16.png>)

### Pagination 
- In pagination only 10 records will show per page (1st page)
- ![Alt text](<Screenshot from 2023-10-30 01-42-42.png>)

- 2nd page
- ![Alt text](<Screenshot from 2023-10-30 01-43-25.png>)

### Task validations
- ![Alt text](<Screenshot from 2023-10-30 01-47-19.png>)


### Projet Section
![Alt text](<Screenshot from 2023-10-30 01-45-34.png>)

- List of all projects page not designed
- New edit button is not working right now
- Delete project page is not desined

### Project validation
![Alt text](<Screenshot from 2023-10-30 01-48-05.png>)


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



## Installation of Laravel and Google sheet
- Create a laravel project using this command
```
    - Laravel project
    composer create-project laravel/laravel task-management
```

# Using bootstrap 5 for designing 

### Database setup
- Created a database as `task_management`
- Create Project migration schema file with all
- Create task migration schema file
```
    php artisan make:model Project --all
    php artisan make:model Task --all
```
- Stored default one record for user, project, adn task as well using seeder
- Run migration
- please follow as:
```
    composer install / update

    composer dump-autoload

    php artisan key:generate

    php artisan optimize:clear

    php artisan cache:clear

    php artisan congig:clear

    php artisan migrate:fresh --seed
```

- I have used `users` table to store my users records
- `In this table have created column as: first_name, last_name, email, password, email_verify_at, created_at, updated_at, deleted_at`
- I have used `tasks` table to store my task records
- `In this table have created column as: name, priority, project_id, order, created_at, updated_at, deleted_at`
- I have used `projects` table to store my project records
- `In this table have created column as: name, created_at, updated_at, deleted_at`
- Added soft deletes feature

### Pagination
- Added pagination by using $tasks->links()
- Bind Paginator bootstrap fine in AppService Provider file

### Used Service/ Repository pattern
- Created Internal servies
- created external services
```
    TaskService, ProjectSerice
```
- create model based repository file and baseRepository file
```
    BaseRepository, TaskRepository, ProjectRepository
```

### Virtual Host
- I have generated virtual Host for task-management project url
- By using `Docker` and `ingnx`
- url created in linux system as 
```
    sudo nano /etc/hosts   file
```
- And then added `127.0.0.1   task-management.test`
- After added this ulr then add in .env file URL. `APP_URL=task-management.test `
- Also create configuration in `Docker/ingnx/sites/taskmanagement.conf`


### Frontend desing and pages layout
- Created layout
    - Layout directory for wab page layout
        - app, app-style (for CSS), app-js (for JavaScript), header, and response-messages 
    - Project directory for project section pages, Task Directory for task section pages `balde template engine`
        - as: Index, create, edit,
  

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

