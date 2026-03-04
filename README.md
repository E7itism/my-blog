# IngcoBlog

A full-stack blog web application built with Laravel, Vue.js, and Bootstrap 4.

## Features
- User registration and login
- Create, view, edit, and delete blog posts
- Leave comments on blog posts
- My Posts page to manage your own posts
- Profile page to update personal information
- Responsive design with Bootstrap 4

## Tech Stack
- **Backend:** PHP 8.2, Laravel 12
- **Frontend:** Vue.js 3, Inertia.js
- **Database:** MySQL 8.0
- **CSS Framework:** Bootstrap 4
- **Build Tool:** Vite

## Requirements
- PHP 8.0+
- Composer
- Node.js & npm
- MySQL 8.0
- XAMPP (or any local server)

## Installation

1. **Clone the repository**
```
   git clone https://github.com/E7itism/my-blog.git
   cd my-blog
```

2. **Install PHP dependencies**
```
   composer install
```

3. **Install JS dependencies**
```
   npm install --legacy-peer-deps
```

4. **Copy environment file**
```
   cp .env.example .env
```

5. **Generate app key**
```
   php artisan key:generate
```

6. **Configure your database in `.env`**
```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=my_blog
   DB_USERNAME=root
   DB_PASSWORD=
```

7. **Run migrations**
```
   php artisan migrate
```

8. **Start the servers**
```
   php artisan serve
   npm run dev
```

9. **Visit the app**
```
   http://127.0.0.1:8000
```

## Developer
Built by Eliezer Gaudiel as part of a 24-hour programming exam.
