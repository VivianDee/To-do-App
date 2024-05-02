# Laravel Todo Application

This is a simple Todo application built using the Laravel framework. It allows users to create, manage, and mark tasks as completed.

## Features

- **Task Management**: Users can create, edit, delete, and mark tasks as completed.
- **Responsive Design**: The application is designed to work seamlessly across various devices and screen sizes.
- **Data Validation**: Input data is validated on both the client and server sides to ensure data integrity and security.
- **Database Interaction**: Tasks are stored in a MySQL database using Laravel's Eloquent ORM.

## Requirements

- PHP >= 7.3
- Composer
- MySQL or any other supported database server

## Installation

1. Clone the repository to your local machine:

```
git clone https://github.com/VivianDee/To-do-App.git
```

2. Navigate to the project directory:

```
cd To-do-App
```

3. Install dependencies using Composer:

```
composer install
```

4. Create a copy of the `.env.example` file and rename it to `.env`:

```
cp .env.example .env
```

5. Generate an application key:

```
php artisan key:generate
```

6. Configure your database connection in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password
```

7. Migrate the database:

```
php artisan migrate
```

8. Start the Laravel development server:

```
php artisan serve
```

9. Visit `http://localhost:8000` in your web browser to access the application.

## Usage

- Create new tasks, mark tasks as completed, or delete tasks.
- Tasks can be filtered by their status (completed or pending).

## Hosting

The Laravel application is currently hosted at [https://todoapp.wuaze.com/](https://todoapp.wuaze.com/).

## Contributing

Contributions are welcome! If you find any bugs or have suggestions for new features, please open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT license](https://opensource.org/licenses/MIT).
