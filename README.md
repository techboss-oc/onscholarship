# Onscholarship

Connecting African students with quality education in China.

## About

Onscholarship is an educational consulting platform that simplifies the process of securing admission to top universities in China. We provide comprehensive services including admission processing, scholarship placement, visa assistance, and more.

## Features

- Multi-user roles (Admin, Agent, Student)
- University browsing and filtering
- Scholarship listings
- Online application with document upload
- Application tracking
- Contact form

## Tech Stack

- Laravel 11
- Tailwind CSS
- AOS (Animate On Scroll)
- MySQL Database

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL

### Installation

1. Clone the repository
2. Install dependencies:
    ```bash
    composer install
    npm install
    ```
3. Copy `.env.example` to `.env` and configure your database and other settings
4. Generate application key:
    ```bash
    php artisan key:generate
    ```
5. Run migrations and seed database:
    ```bash
    php artisan migrate --seed
    ```
6. Build assets:
    ```bash
    npm run build
    ```
7. Start the server:
    ```bash
    php artisan serve
    ```

## Project Structure

- **app/Models/** - Database models
- **app/Http/Controllers/** - Application controllers
- **resources/views/** - Blade templates
- **routes/web.php** - Web routes

## Security Measures Implemented

- Secure headers middleware
- Rate limiting
- File upload validation and private storage
- CSRF protection
- Role-based access control

## Deployment Checklist

For deployment checklist, see DEPLOYMENT.md

## License

This is a proprietary project.
