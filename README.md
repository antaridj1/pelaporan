<p align="center"><a href="https://github.com/antaridj1/reporting-web" target="_blank"><img src="https://github.com/antaridj1/reporting-web/blob/c7540d6749cf04a3311305d9e387e674cfd3ae6f/public/assets/img/logo_bri.png" width="400" alt="RentCar Logo"></a></p>


## About BRI Reporting Web

**BRI Reporting Web** is a web application built with Laravel 8, designed to support reporting services for internal corporate of BRI Bank in Denpasar. 

### Key Features

- **Report System:** Reporting feature that helps employees of the corporate to contact each other for reporting issues or troubles according to the certain sector
- **Email Notification:** Email will be sent after reporting
- **Admin Dashboard:** Manage the reports with a comprehensive dashboard.
- **Responsive Design:** Optimized for both desktop and mobile devices.

## Getting Started

### Requirements

- **PHP** >= 8.0
- **Composer**
- **MySQL** database
- **Web Server:** Apache, Nginx, or similar

### Installation

1. **Clone Repository**

   ```bash
    git clone https://github.com/your-username/reporting.git
    cd reporting
    composer install
    ```
2. **Create Environtment** Don't forget to add mail credential for email notification
    ```bash
    cp .env.example .env
    ```
3. **Generate Key in .env**
    ```bash
    php artisan key:generate
    ```
4. **Create Database**
    Create a database named "rentcar"

5. **Run The Migrations**
    ```bash
    php artisan migrate --seed
    ```
6. **Run The Web**
    ```bash
    php artisan server
    ```
    Visit http://127.0.0.1:8000 to access the application.