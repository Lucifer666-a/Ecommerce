# Stuffus - Minimalist E-Commerce Platform

Stuffus is a modern e-commerce platform designed with a minimalist user interface and backed by robust inventory and transaction management features. This application aims to streamline operations for store owners (Admin) in managing product catalogs and tracking real-time incoming customer orders.

---

## 📺 Application Demo Video
[![Watch Demo Video](https://img.shields.io/badge/YouTube-Demo%20Video-red?style=for-the-badge&logo=youtube)](https://youtu.be/ojAacy5IuLk)
---

## 🚀 Key Features

### 🛒 Customer Side (User Interface)
* **Interactive Product Search:** Allows users to filter their desired products instantly based on matching names and descriptions.
* **Instant Shopping Cart System:** A stable, session-based cart system for adding products ("Add to Cart") seamlessly.
* **Direct Checkout (Buy Now):** A lightning-fast transaction workflow for purchasing a single product without going through the cart queue.
* **Shipping Address Validation:** Protects order integrity by validating shipping forms (Name, Phone Number, Address) before the order is processed.

### 💼 Store Owner Side (Admin Panel)
* **Centralized Dashboard Hub (`/admin`):** A clean central navigation portal that routes the Admin to either product management or sales reports.
* **Custom Security Authentication (Middleware):** Locks down all back-office administrative routes, ensuring only accounts with the `admin` role can gain entry.
* **Full Product CRUD Management:** Features for adding new products, uploading images, adjusting prices, editing details, and deleting items from the catalog.
* **Automated Stock Protection (Race Condition Prevention):** A multi-layered stock validation (*double-validation*) process before checkout to prevent negative stock issues caused by simultaneous purchases.
* **Digital Order History:** An automated digital ledger in the database that tracks customer details, shipping addresses, ordered items, precise transaction timestamps, and total revenue.

---

## 🛠️ Tech Stack

This application is built using a combination of modern technologies:

* **Back-End Framework:** Laravel 11
* **Database Management:** MySQL (Eloquent ORM & Migrations)
* **Front-End Styling:** Tailwind CSS v4 (Minimalist Monochrome Design)
* **Environment Tool:** Laravel Tinker (Administrative Account Management)

---

## 📦 Local Installation Guide

1. **Clone the Repository:**
```bash
   git clone https://github.com/Lucifer666-a/Ecommerce.git
   cd Ecommerce

```

2. **Install Dependencies:**

```bash
   composer install

```

3. **Configure Environment:**
Copy the `.env.example` file to `.env` and set up your MySQL database credentials.

```bash
   cp .env.example .env
   php artisan key:generate

```

4. **Run Database Migrations:**

```bash
   php artisan migrate

```

5. **Create the Initial Admin Account (Via Tinker):**

```bash
   php artisan tinker

```

Inside the Tinker shell, execute:

```php
   \App\Models\User::create(['name' => 'Admin Pro', 'email' => 'admin@stuffus.com', 'password' => bcrypt('password123'), 'role' => 'admin']);

```

Type `exit` to quit Tinker.

6. **Launch the Application:**

```bash
   php artisan serve

```

Open `http://127.0.0.1:8000` in your preferred web browser.

---

© 2026 Stuffus E-Commerce. Built with logic and clean code.

