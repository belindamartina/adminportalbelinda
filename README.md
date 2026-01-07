# Admin Portal Belinda
[![CodeIgniter Version](https://img.shields.io/badge/CodeIgniter-v4.x-orange)](https://codeigniter.com/)
[![PHP Version](https://img.shields.io/badge/PHP-8.x-blue)](https://www.php.net/)

A comprehensive student and contact management system built with **CodeIgniter 4**. This project serves as a showcase of full-stack development, database architecture, and secure deployment practices.

## 🚀 Live Demo
**URL:** [https://admin-portal-belinda.wuaze.com/](https://admin-portal-belinda.wuaze.com/)  
*(Hosted on InfinityFree)*

## ✨ Key Features
* **Secure Authentication:** Integrated with **CodeIgniter Shield** for robust user registration and login.
* **CRUD Management:** Full Create, Read, Update, and Delete functionality for student records.
* **Modern UI:** Responsive dashboard built with **Bootstrap 5** and custom CSS.
* **Relational Database:** Optimized MySQL schema for managing student data and contact details.

## 🛠️ Tech Stack
* **Backend:** PHP 8.x (CodeIgniter 4 Framework)
* **Authentication:** CodeIgniter Shield
* **Database:** MySQL
* **Frontend:** Bootstrap 5, JavaScript
* **Web Server:** Apache (via InfinityFree)

## 💡 Lessons Learned & Challenges
* **Deployment Logic:** Successfully configured custom `.htaccess` and URI protocols to handle InfinityFree's security tokens and routing constraints.
* **Environment Parity:** Resolved cross-platform challenges between local development (Windows) and production (Linux) regarding case-sensitivity and directory structures.
* **Git Mastery:** Handled complex Git workflows, including submodule resolution and `.gitignore` optimization for framework-based projects.

## ⚙️ Installation (Local Development)
1. Clone the repo: `git clone https://github.com/belindamartina/adminportalbelinda.git`
2. Install dependencies: `composer install`
3. Configure your `.env` file with database credentials.
4. Run migrations: `php spark migrate`
5. Serve locally: `php spark serve`
