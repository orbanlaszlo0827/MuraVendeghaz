# Mura Guesthouse - Booking & Management System

A complete booking and management web application built with Laravel. This project was developed as my BSc Thesis in Computer Science. It features a public-facing website for showcasing the guesthouse and a secure admin dashboard for managing content, bookings, and settings dynamically.

## 🚀 Features
- Dynamic content management for rooms, features, and image gallery
- Full booking request system with calendar integration
- Secure admin dashboard with authentication
- Responsive UI built with Bootstrap 5
- Email notifications (simulated in local environment)

## 🛠️ Tech Stack
- **Backend:** PHP 8.1+, Laravel
- **Frontend:** HTML, CSS, JavaScript, Bootstrap 5, Vite
- **Database:** MySQL / MariaDB

## ⚙️ System Requirements
- PHP (>= 8.1)
- Composer
- Node.js & npm
- MySQL / MariaDB database server

## 💻 Installation Guide

Execute the following commands in your terminal at the root directory of the project.

**1. Database Setup**  
Create an empty database on your MySQL/MariaDB server. 
By default, the `.env` file expects the database name to be `muravendeghaz`. If you choose a different name, make sure to update the `DB_DATABASE=` line in your `.env` file to match your new database name.

**2. Install Backend Dependencies**  
Install required PHP packages using Composer:
```bash
composer install
```

**3. Install and Build Frontend Dependencies**  
Install Node modules and compile the frontend assets:
```bash
npm install
npm run build
```

**4. Run Migrations and Seed Test Data**  
To build the database schema and populate it with the required initial data (prices, settings, room descriptions, admin credentials), run:
```bash
php artisan migrate:fresh --seed
```

**5. Link Storage (For Image Gallery)**  
To make uploaded images accessible on the public website, link the storage directory:
```bash
php artisan storage:link
```

**6. Start the Local Server**  
Start the Laravel development server:
```bash
php artisan serve
```
The public website will now be available at: http://127.0.0.1:8000/

## 🔐 Admin Access & Test Data
You can access the admin dashboard at: http://127.0.0.1:8000/admin

Email: admin@muravendeghaz.hu

Password: password123

## 📝 Notes
Email Testing: Since this is a local development environment, outbound emails are not sent. Instead, booking confirmation emails are logged and can be reviewed in the storage/logs/laravel.log file.

## 📖 Thesis Documentation
For deep architectural details, database schema explanations, and the complete development process, please refer to my full BSc Thesis (available in Hungarian) located in the docs/ folder.