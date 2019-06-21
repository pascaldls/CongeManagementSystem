## Setup

Composer install
php artisan migrate:fresh
php artisan db:seed

You may run seed as much as need to regenerate db

## Development

TDD Approach to developing

Using laravel, blade template, vue js, ...

###Controllers

Controllers
AccueilController
CongeController

###Migrations

database/migrations/2019_06_21_100332_create_employees_table.php
database/migrations/2019_06_21_101211_create_conges_table.php

###Database Seeding

database/factories/EmployeeFactory.php
database/factories/CongeFactory.php

###Testing php UNIT TEST ( TDD approach)

tests/Feature/accueilTest.php
tests/Feature/demandeCongeTest.php
tests/Unit/CongeTest.php
tests/Unit/EmployeeTest.php

###Views Blade

resources/views/accueil/index.blade.php
resources/views/accueil/show.blade.php
resources/views/conge/create.blade.php
resources/views/inc/messages.blade.php
resources/views/inc/navbar.blade.php
resources/views/layouts/app.blade.php

###Models Eloquent
app/Conge.php
app/Employee.php

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
