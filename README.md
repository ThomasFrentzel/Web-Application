
# Web Application: Employee Management System

This project is a **web application** designed to manage employee data for a company. It provides functionalities to manipulate employee data, including adding new employees, updating their information, and removing them from the database. The application is built with **PHP** for the backend and **MySQL** as the database.

## Table of Contents

1. [Features](#features)
2. [Tech Stack](#tech-stack)
3. [Database Design](#database-design)
   - [Application Domain](#application-domain)
   - [Database Structure](#database-structure)
   - [Normalization](#normalization)
4. [Installation and Setup](#installation-and-setup)
5. [How to Use](#how-to-use)

---

## Features

- **Employee Management**: Add, update, view, and delete employee records.
- **Relational Database**: Utilizes a normalized relational database in 3NF.
- **User-Friendly Interface**: Built with a responsive front-end for smooth interaction.
- **Secure Backend**: Implements PHP to handle all server-side operations securely.

---

## Tech Stack

### Back-End
- **PHP**: Server-side scripting language.
- **MySQL**: Database management system.

### Front-End
- **HTML**: Structure of the web pages.
- **CSS**: Styling and layout.
- **JavaScript**: Interactive elements and client-side validations.

### Development Environment
- **XAMPP**: Local server environment for PHP and MySQL.
- **phpMyAdmin**: MySQL administration tool.
- **Visual Studio Code**: Code editor/IDE.

---

## Database Design

### Application Domain
The database is designed to store and manage employee data for a company. The system supports:

- Employee information (e.g., name, contact details).
- Relationships between employees and their associated data.

### Database Structure

- The database consists of **at least two tables** with referential integrity.
- Relationships are defined through primary and foreign keys.

![image](https://github.com/user-attachments/assets/71cb4154-0d4e-474f-b33a-6ba35af4a0a3)

### Normalization
- The database schema adheres to **3rd Normal Form (3NF)** to minimize redundancy and improve data integrity.

---

## Installation and Setup

### Prerequisites

1. Install **XAMPP**:
   - Includes Apache (HTTP server), PHP, and MySQL.
   - Download from [apachefriends.org](https://www.apachefriends.org/).

2. Install **Visual Studio Code**:
   - IDE for writing and managing the application code.
   - Download from [code.visualstudio.com](https://code.visualstudio.com/).

3. Set up **phpMyAdmin**:
   - Included with XAMPP for MySQL database management.

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/ThomasFrentzel/Web-Application
   ```
2. Place the project folder in the `htdocs` directory of XAMPP.
3. Start XAMPP:
   - Launch Apache and MySQL services.
4. Import the database:
   - Open phpMyAdmin and import the SQL file provided in the `db` folder.
5. Access the application:
   - Open a web browser and go to `http://localhost/<project-folder>`.

---

## How to Use

1. **Home Page**:
   - View all existing employees.
2. **Add Employee**:
   - Use the form to add a new employee to the database.
3. **Update Employee**:
   - Edit details of an existing employee.
4. **Delete Employee**:
   - Remove an employee record permanently.

---
