# laravel-post-system
A simple web application built with Laravel where users can create and view posts. Each post contains a subject, title, and description. Admins can view, update, and delete any post.

## Features
User registration and login
Role-based access (Admin/User)
Logged-in users can:
Create posts with subject, title, and description
View their own posts
Admins can:
View all users’ posts
Update or delete posts
CSRF protection and form validation
Passwords are hashed for security 
Placeholder profile page for future development

## Installation
1. Clone the repository
git clone https://github.com/akramisha/laravel-post-system.git

## Navigate to the project folder:
cd laravel-post-system

## Install PHP dependencies using Composer:
composer install

## Copy .env.example to .env and update database credentials:
cp .env.example .env

## Generate the application key:
php artisan key:generate

## Run migrations to create database tables:
php artisan migrate

## (Optional) Seed admin and sample user for demo:
php artisan db:seed --class=RegisterSeeder

## Start the local development server:
php artisan serve

## Open in your browser:
http://127.0.0.1:8000