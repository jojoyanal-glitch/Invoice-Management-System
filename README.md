# Invoice Management System

## Overview

The Invoice Management System is a web-based application developed using PHP, MySQL, and Bootstrap. It is designed to manage invoices through a structured workflow with different user roles and permissions.

## Features

- User authentication and session management
- Role-based access control
- Invoice creation, viewing, updating, and deletion
- Invoice approval and rejection workflow
- Payment status management
- File upload and download
- Email notifications
- Input validation using PHP
- Responsive user interface with Bootstrap
- Dashboard with invoice statistics

## User Roles

- **Admin:** Manages users and invoices.
- **Department Unit Chair:** Creates invoices.
- **Manager:** Reviews, approves, or rejects invoices.
- **Treasurer:** Processes payments and updates payment status.

## Technologies Used

- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- JavaScript

## Project Structure

```text
Invoice-Management-System/
├── login.php
├── logout.php
├── db_connect.php
├── dashboard/
├── invoices/
├── users/
├── uploads/
├── screenshots/
├── database.sql
└── README.md
```

## Installation

1. Clone or download the repository.
2. Place the project folder in your local server directory, such as `htdocs` in XAMPP.
3. Create a MySQL database.
4. Import the provided `database.sql` file into MySQL.
5. Configure the database connection in `db_connect.php`.
6. Start Apache and MySQL using XAMPP.
7. Open the project in your browser through `http://localhost/Invoice-Management-System/`.


