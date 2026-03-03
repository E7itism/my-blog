# My Blog

A blog website built with Laravel, Vue.js, Inertia.js, Bootstrap 4 and MySQL.

## Tech Stack
- PHP 8.2
- Laravel 12
- Vue.js 3
- Inertia.js
- Bootstrap 4
- MySQL 8.0

## Requirements
- PHP 8.0+
- Composer
- Node.js
- MySQL 8.0

## Installation

1. Clone the repository
git clone https://github.com/YOURUSERNAME/my-blog.git

2. Install PHP dependencies
composer install

3. Install JS dependencies
npm install --legacy-peer-deps

4. Copy .env file
cp .env.example .env

5. Generate app key
php artisan key:generate

6. Configure database in .env
DB_DATABASE=my_blog
DB_USERNAME=root
DB_PASSWORD=

7. Run migrations
php artisan migrate

8. Start servers
php artisan serve
npm run dev

9. Visit http://127.0.0.1:8000
