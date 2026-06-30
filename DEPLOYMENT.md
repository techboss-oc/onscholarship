# Deployment Checklist

## Pre-Deployment

- [ ] Set production environment in .env (`APP_ENV=production`, `APP_DEBUG=false`)
- [ ] Configure production database credentials
- [ ] Set up email configuration (SMTP/Mailgun/etc.)
- [ ] Configure file storage (s3 or local private storage)
- [ ] Generate and set a secure APP_KEY
- [ ] Configure trusted proxies if behind a load balancer

## Server Setup

- [ ] Install PHP 8.2+ with required extensions
- [ ] Install Composer
- [ ] Install Node.js & npm for asset compilation
- [ ] Set up web server (Nginx/Apache)
- [ ] Configure SSL certificate (HTTPS)
- [ ] Set proper file permissions (storage and bootstrap/cache directories writable)

## Deployment Steps

1. [ ] Pull latest code from repository
2. [ ] Install/update dependencies:
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   ```
3. [ ] Run database migrations:
   ```bash
   php artisan migrate --force
   ```
4. [ ] Clear and cache configuration, routes, and views:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
5. [ ] Set up queue worker if needed
6. [ ] Set up cron job for Laravel scheduler
7. [ ] Restart web server and PHP-FPM

## Post-Deployment Checks

- [ ] Verify all pages load correctly
- [ ] Test contact form submission
- [ ] Test login/registration
- [ ] Test file uploads
- [ ] Check error logs
- [ ] Verify security headers are present
- [ ] Test database connections
- [ ] Check email sending

## Maintenance

- [ ] Set up regular backups (database and files)
- [ ] Monitor application performance
- [ ] Keep dependencies updated
- [ ] Review logs periodically

