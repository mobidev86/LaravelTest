## Laravel CRUD Operation Implementation With Livewire

This Laravel project showcases a CRUD operation of Item Management with real-time updates.

## Requirements

Before you start using this project, please ensure that you have the following dependencies and software installed:

- PHP: This project requires PHP 8.2. Make sure you have PHP installed on your system and properly configured.
- Composer: Composer is a dependency management tool for PHP. You'll need Composer to install the project's PHP dependencies. You can download and install Composer from https://getcomposer.org.
- Database: This project uses a database (such as MySQL, PostgreSQL, or SQLite) to store user information and other data. Make sure you have a database system installed and configured, and update the .env file with the appropriate database connection details.

## Getting Started

1. Clone the repository:
```bash
git clone https://github.com/mobidev86/LaravelTest.git
```
2. Navigate to the project directory
```bash
cd LaravelTest
```
3. install the dependencies using Composer:
```bash
composer install
```
4. Copy the .env.example file to .env and configure your database settings and other environment variables:
```bash
cp .env.example .env
```
5. Generate an application key:
```bash
php artisan key:generate
```
6. Run database migrations:
```bash
php artisan migrate
```
7. Install node dependencies using :
```bash
npm install && npm run dev
```
8. Serve the application:
```bash
php artisan serve
```

Ensure your Laravel development server is running by executing the following command:
```bash
php artisan serve
```
Open your web browser and enter the appropriate URL based on your environment setup and follow below steps :

```bash
Step1 : Reigster yourself on the app
Step2 : Login
```

## Tests
The project includes comprehensive test coverage to ensure functionality and reliability. To run the tests:
```bash
php artisan test
```
