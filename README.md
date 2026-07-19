<div align="center">

# 📝 Laravel Post System

A simple, role-based web application built with **Laravel** where users can create and manage posts, and Admins have full oversight across all user content.

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![License](https://img.shields.io/badge/License-MIT-blue?style=for-the-badge)](LICENSE)

</div>

---

## 📖 Overview

Each post contains a **subject**, **title**, and **description**. Regular users can create and view their own posts, while Admins can view, update, and delete any post in the system — with security handled via CSRF protection, form validation, and hashed passwords.

---

## 📸 Screenshots

> 💡 Add screenshots of the login page, post creation form, and admin post list here once available.

| Login | Create Post | Admin View |
| :---: | :---: | :---: |
| ![Login](screenshots/login.png) | ![Create Post](screenshots/create-post.png) | ![Admin View](screenshots/admin-view.png) |

---

## ✨ Features

| Role | Capabilities |
|------|--------------|
| **User** | Register & log in · Create posts (subject, title, description) · View their own posts |
| **Admin** | View all users' posts · Update or delete any post |
| **General** | Role-based access control · CSRF protection & form validation · Hashed passwords · Placeholder profile page (for future development) |

---

## 💻 Tech Stack

- **Backend:** Laravel (PHP)
- **Database:** MySQL
- **Auth:** Laravel's built-in authentication with role-based access

---

## 🚀 Installation

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/akramisha/laravel-post-system.git
cd laravel-post-system

# 2. Install PHP dependencies
composer install

# 3. Set up environment
cp .env.example .env
# then update your database credentials in .env

# 4. Generate application key
php artisan key:generate

# 5. Run migrations
php artisan migrate

# 6. (Optional) Seed admin and sample user for demo
php artisan db:seed --class=RegisterSeeder

# 7. Start the local development server
php artisan serve
```

Then open **http://127.0.0.1:8000** in your browser.

---

## 🗺️ Roadmap

- [ ] Build out the user profile page
- [ ] Add post categories/tags
- [ ] Search and filter posts
- [ ] Pagination for post lists

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome. Check the [issues page](https://github.com/akramisha/laravel-post-system/issues).

---

## 📄 License

This project is open-sourced under the [MIT License](LICENSE).

---

<div align="center">

Made with ❤️ using Laravel

</div>
