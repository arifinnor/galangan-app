<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
<<<<<<< Current (Your changes)
=======

# Laravel Filament RBAC Implementation

This project demonstrates a Role-Based Access Control (RBAC) system implemented using Laravel Filament and Spatie Laravel Permission.

## Features

- **Filament Admin Panel**: Modern admin interface for managing users, roles, and permissions
- **RBAC System**: Three predefined roles with specific permissions:
  - **Administrator**: Full system access
  - **Supervisor**: Management and reporting capabilities
  - **Cashier**: Transaction processing capabilities

## Installation

1. **Install Dependencies**:
   ```bash
   composer install
   ```

2. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Setup**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

4. **Start the Server**:
   ```bash
   php artisan serve
   ```

## Access

- **Admin Panel**: http://localhost:8000/admin
- **Default Users**:
  - **Administrator**: admin@example.com / password
  - **Supervisor**: supervisor@example.com / password
  - **Cashier**: cashier@example.com / password

## Role Permissions

### Administrator
- Full system access
- User management (view, create, edit, delete)
- Role management (view, create, edit, delete)
- Permission management (view, create, edit, delete)
- System management
- All transaction and reporting capabilities

### Supervisor
- User management (view, edit)
- Reports (view, generate)
- Inventory management
- Transaction approval
- Transaction processing

### Cashier
- Transaction processing
- View transactions
- Create transactions
- Edit transactions

## File Structure

```
app/
├── Filament/
│   └── Resources/
│       ├── UserResource.php
│       ├── RoleResource.php
│       └── PermissionResource.php
├── Models/
│   └── User.php (with HasRoles trait)
└── Providers/
    └── Filament/
        └── AdminPanelProvider.php

database/
└── seeders/
    └── RolePermissionSeeder.php
```

## Customization

### Adding New Permissions

1. Add the permission to the `RolePermissionSeeder.php`
2. Run `php artisan db:seed --class=RolePermissionSeeder`

### Adding New Roles

1. Create the role in the seeder
2. Assign appropriate permissions
3. Run the seeder

### Protecting Routes

Use middleware in your routes:
```php
Route::middleware(['role:administrator'])->group(function () {
    // Administrator only routes
});

Route::middleware(['permission:view reports'])->group(function () {
    // Routes for users with 'view reports' permission
});
```

## Technologies Used

- **Laravel 12**: PHP framework
- **Filament 4**: Admin panel builder
- **Spatie Laravel Permission**: RBAC package
- **SQLite**: Database (can be changed to MySQL/PostgreSQL)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> Incoming (Background Agent changes)
