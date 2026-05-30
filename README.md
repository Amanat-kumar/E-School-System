# E-School System

A school management web app I made as my final year college project (B.Tech CSE, 2023).
The idea was to put all the things a school usually does on paper — attendance, fees, marks,
notices, leave letters, library books etc — into one website so students, teachers, parents
and admin can all use the same place.

Built with PHP and MySQL on XAMPP.

## Users

Five types of logins:

- **Admin** – manages students, teachers, parents, fees, marks, notices, routine
- **Library Admin** – manages book records
- **Teacher** – adds marks, posts notices, marks attendance
- **Student** – views marks, attendance, fees, notices, applies for leave
- **Parent** – views their child's marks, attendance and fees

## Features

- Login with forgot password
- Add / edit / delete students, teachers, parents (CRUD)
- Fee management
- Marks entry and report card view
- Attendance
- Notices board
- Class routine / timetable
- Leave letter requests
- Library book records
- Gallery page, About Us, Contact Us

## Tech used

- PHP (no framework)
- MySQL
- HTML, CSS, Bootstrap, JavaScript
- PDO for database (to avoid SQL injection)
- XAMPP (Apache + MySQL) for local hosting

## How to run

1. Install XAMPP and start Apache + MySQL.
2. Copy this whole folder into `xampp/htdocs/`.
3. Open phpMyAdmin and import `e_school_system.sql`.
4. Update DB credentials in `Login_System/db_conn.php` (and `pdo.php`) if needed. Default is `root` with empty password.
5. Open `http://localhost/E-School-System/` in browser.

## Folder layout

```
Login_System/   -> login, signup, forgot password
Admin/          -> admin dashboard, fees, marks, notices, routine, leave letters
Library/        -> library admin and book records
Teachers/       -> teacher dashboard
Student/        -> student dashboard
Parent/         -> parent dashboard
Attendance/    -> attendance module
crud/           -> CRUD pages for students, teachers, parents
e_school_system.sql -> database dump
```

## Note

This was my first big project so the code is simple PHP, not very modular.
If I rewrite it today I'd probably use Spring Boot + Angular and proper REST APIs.
Keeping it here as a memory of where I started.
