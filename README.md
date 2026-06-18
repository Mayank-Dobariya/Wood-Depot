# Wood Depot - Furniture & Interior Design E-Commerce System

## Overview

Wood Depot is a web-based furniture and interior design management system that allows customers to browse products, place orders, manage carts, and communicate with interior designers. The system also provides an administrative dashboard for managing products, categories, users, orders, and website content.

---

## Features

### Customer Module
- User Registration & Login
- Product Browsing
- Product Search
- Shopping Cart Management
- Checkout Process
- Address Management
- Order Tracking
- Payment Integration (Razorpay)
- Customer Profile Management

### Interior Designer Module
- Designer Registration
- Designer Login
- Project Management
- Customer Request Handling
- Appointment/Consultation Management

### Admin Module
- Dashboard Analytics
- Product Management
- Category Management
- Customer Management
- Order Management
- Banner Management
- Designer Management
- Reports and Monitoring

---

## Technologies Used

### Frontend
- HTML5
- CSS3
- Bootstrap
- JavaScript
- jQuery

### Backend
- PHP

### Database
- MySQL

### Payment Gateway
- Razorpay

### Admin Panel
- AdminLTE

---

## Project Structure

```
Wood Depot/
│
├── Admin/                  # Admin Dashboard
├── InteriorDesigner/       # Interior Designer Module
├── Images/                 # Product Images
├── css/                    # Stylesheets
├── js/                     # JavaScript Files
├── connection.php          # Database Connection
├── config.php              # Application Configuration
├── index.php               # Homepage
└── ruper.sql               # Database File
```

---

## Installation Guide

### Prerequisites

- XAMPP / WAMP
- PHP 7.x or later
- MySQL
- Web Browser

---

### Step 1: Clone Repository

```bash
git clone https://github.com/yourusername/wood-depot.git
```

or download ZIP and extract it.

---

### Step 2: Move Project

Copy the project folder to:

```
xampp/htdocs/
```

Example:

```
xampp/htdocs/WoodDepot
```

---

### Step 3: Create Database

1. Open phpMyAdmin
2. Create a new database:

```sql
wood_depot
```

3. Import:

```
ruper.sql
```

---

### Step 4: Configure Database

Open:

```php
connection.php
```

Update credentials:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wood_depot";
```

---

### Step 5: Start Server

Start:

- Apache
- MySQL

from XAMPP Control Panel.

---

### Step 6: Run Project

Open browser:

```
http://localhost/WoodDepot/
```

---

## Database

Database file:

```
ruper.sql
```

This file contains:

- Tables
- Relationships
- Sample Data
- User Information
- Product Information

---

## Modules

### Admin
- Manage Products
- Manage Categories
- Manage Orders
- Manage Customers
- Manage Designers

### Customer
- Register/Login
- Browse Products
- Add to Cart
- Place Orders
- Track Orders

### Interior Designer
- Manage Design Requests
- Customer Communication
- Project Handling

---

## Future Improvements

- Email Notifications
- Mobile Application
- Advanced Analytics
- AI-Based Product Recommendations
- Multi-Vendor Support

---

## Author

Mayank Dobariya

M.Sc. Computer Science

IU International University of Applied Sciences

---

## License

This project was developed for educational and academic purposes.
