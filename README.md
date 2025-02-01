<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# TeamFlow - Project Management System

**TeamFlow** is a modern and efficient project management system designed to help teams collaborate seamlessly. Built with **Laravel 11**, it provides an intuitive dashboard for managing projects, tasks, and teams efficiently.

## Features

### Authentication & Authorization
- User registration & login (Laravel Breeze)
- Role-based access control (Admin, Project Manager, Team Member)
- Profile management

### Project Management
- CRUD operations for projects
- Task assignment and tracking
- Project status updates

### Team Management
- Assign users to projects
- Manage team members and roles

### Dashboard & Analytics
- Project overview
- Task statistics
- Recent activity log

## Technical Stack

| Component       | Technology |
|----------------|------------|
| Backend        | Laravel 10 |
| Frontend      | Bootstrap |
| Database      | SQLite |
| Authentication | Laravel Breeze |
| 

## Installation Guide

1. **Clone Repository**
   ```sh
   git clone https://github.com/your-repo/teamflow.git
   cd teamflow
   ```
2. **Install Dependencies**
   ```sh
   composer install
   npm install
   ```
 
3. **Configure Environment**
   ```sh
   cp .env.example .env 
   php artisan key:generate
   ```
   Update database credentials in `.env` file.
 
4. **Migrate Database**

   ```sh
   php artisan migrate
   ```
   
5. **Seed Database**
   ```sh
   php artisan migrate --seed

   ```

6. **Start Development Server**
   ```sh
   php artisan serve
   ```
   Visit `http://localhost:8000` in your browser.
   
7. **Access Admin Panel**
   Visit `http://localhost:8000/admin` to access the admin panel.

8. **Access User Panel**
   Visit `http://localhost:8000` to access the user panel.
  
9. **Explore Features**
   Explore the project management features and start managing your projects!
   
10. **Contribute**
   Contributions are welcome! Feel free to open issues or submit pull requests.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Happy project managing! 🚀