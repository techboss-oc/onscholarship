# Project Todo List

## Critical Security Issues
- [x] **CSRF Protection Check**: Verify all POST/PUT/DELETE routes have proper CSRF protection (already using Laravel's built-in, but double-check)
- [x] **File Upload Validation**: Add strict validation for student document uploads (file types, size limits, sanitization) in `Student\StudentController.php`
- [x] **Environment Variables**: Remove sensitive info from `.env` file, ensure it's not committed to version control
- [x] **XSS Protection**: Sanitize all user-generated content in blog posts, university descriptions, etc., before displaying (Laravel auto-escapes by default)
- [x] **SQL Injection**: Verify all queries use parameterized bindings (Laravel ORM/Query Builder does this by default, but check any raw queries)
- [x] **Rate Limiting**: Add rate limiting to login, register, and contact form endpoints to prevent brute-force attacks
- [x] **Secure Headers**: Add security headers (X-Frame-Options, X-XSS-Protection, Content-Security-Policy)

## Bugs
- [x] **Contact Form Not Connected**: The contact form in `pages/contact.blade.php` doesn't submit to any backend route/controller
- [x] **Duplicate Route Definition**: In `web.php`, the admin applications route is defined twice (lines 98 and 99)
- [x] **Missing Views?**: Check if admin/student/agent views are fully implemented

## Incomplete Features
- [x] **Contact Form Backend**: Create controller method and route to handle contact form submissions, store in `ContactRequest` model, and send email notifications
- [ ] **Email Configuration**: Set up proper email sending (SMTP/Mailgun/etc.) for password reset, contact forms, and notifications (requires external service configuration)
- [x] **File Storage**: Ensure uploaded documents are stored securely (preferably in private storage, not public)
- [x] **User Roles/Permissions**: Verify all role checks are properly implemented (using spatie/laravel-permission?)
- [ ] **Analytics/Tracking**: Set up basic analytics or tracking if needed (requires external service)
- [x] **Error Handling**: Improve error pages (404, 500, etc.)
- [ ] **Testing**: Write PHPUnit tests for all critical functionality (requires writing test cases)
- [x] **SEO**: Check and improve meta tags, open graph tags, and SEO for all pages
- [ ] **Accessibility**: Improve accessibility (ARIA labels, keyboard navigation, color contrast) (optional future improvement)
- [ ] **Performance**: Optimize page load speeds, implement caching where appropriate (optional future improvement)

## Pages/Sections Needing Fixes/Improvements
- [x] **Contact Page**: Connect form to backend
- [x] **Admin Dashboard**: Check all admin views are functional
- [x] **Agent Dashboard**: Verify all agent views are complete
- [x] **Student Dashboard**: Ensure all student views are working properly

## Other Tasks
- [ ] **Clean Up**: Remove any unused files, debug code, or comments (low priority)
- [x] **Documentation**: Add/improve project documentation (README, API docs if needed)
- [x] **Deployment Checklist**: Create a deployment checklist for production
