# 🏨 Hotel Management System

A complete **Hotel Management System** developed using **PHP, MySQL, HTML, CSS, and JavaScript**.
This project helps manage hotel operations like room booking, customer records, and admin control with a clean and simple interface.

---


## ✨ Features Overview

### 👨‍💼 Admin Panel

* Secure login system
* Add / Edit / Delete rooms
* View bookings
* Manage customers

### 🧑‍💻 User Panel

* Browse available rooms
* Book rooms easily
* View booking details

---

## 🛠️ Tech Stack

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Server:** XAMPP (Apache)

---

## ⚙️ Installation Guide

### 1️⃣ Setup XAMPP

* Install XAMPP
* Start **Apache** and **MySQL**

### 2️⃣ Move Project

Copy project folder to:

```
C:\xampp\htdocs\
```

### 3️⃣ Setup Database

* Open: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
* Create database:

```
hotel
```

### 4️⃣ Import SQL File

* Click **Import**
* Select the `.sql` file from project

### 5️⃣ db Database

Edit `db.php`:

```php
$conn = new mysqli("localhost", "root", "", "hotel");
```

### 6️⃣ Run Project

Open:

```
http://localhost/hotel-management-system
```

---

## 🔐 Admin Login

| Username | Password |
| -------- | -------- |
| admin    | admin123 |

⚠️ Change credentials after setup for security.

---

## 📂 Project Structure

```
hotel-management-system/
│── admin/
│── customer/
│── css/
│── database/
│── db.php
│── index.php
```

---
## 📸 Screenshots

[View Screenshots](https://drive.google.com/drive/folders/1H8sytZUs9FMw3DF0axiavRNVmGzKImq2?usp=drive_link)

---
## 🚀 Deployment

You can host this project on:

* InfinityFree
* 000WebHost
* cPanel Hosting

❌ Netlify not supported (PHP required)

---

## 📈 Future Enhancements

* 💳 Payment Gateway Integration
* 📧 Email Notifications
* 📱 Fully Responsive UI
* 🔑 Role-Based Access (Admin / Staff)

---

## 🤝 Contributing

Feel free to fork this project and improve it.

---

## ⭐ Support

If you like this project:

* ⭐ Star the repository
* 📢 Share it

---
