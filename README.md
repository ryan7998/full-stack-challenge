# WiseJobs

**WiseJobs** is a comprehensive job portal built with Laravel, designed to connect job seekers with employers seamlessly. Whether you're looking to post job listings, search for your next career opportunity, or manage applications, WiseJobs provides a robust platform to meet your needs.

## Table of Contents

-   [Features](#features)
-   [Demo](#demo)
-   [Prerequisites](#prerequisites)
-   [Installation](#installation)
-   [Configuration](#configuration)
-   [Running the Application](#running-the-application)
-   [Testing](#testing)
-   [Deployment](#deployment)
-   [Contributing](#contributing)
-   [License](#license)
-   [Contact](#contact)

## Features

-   **User Authentication:** Secure login and registration for job seekers and employers.
-   **Job Listings:** Employers can create, edit, and delete job postings.
-   **Job Search:** Job seekers can search and filter job listings based on various criteria.
-   **Application Management:** Employers can manage applications received for their job postings.
-   **Responsive Design:** Optimized for desktops, tablets, and mobile devices.
-   **Admin Dashboard:** Manage users, job listings, and site settings.

## Demo

Not Available yet.

## Prerequisites

Before you begin, ensure you have met the following requirements:

-   **Operating System:** Linux, macOS, or Windows
-   **Web Server:** Apache or Nginx
-   **PHP:** Version 8.0 or higher
-   **Database:** MySQL or MariaDB
-   **Composer:** Dependency Manager for PHP
-   **Node.js and NPM:** For frontend asset compilation
-   **Git:** Version control system

## Installation

Follow these steps to set up WiseJobs on your local machine for development and testing purposes.

### 1. Clone the Repository

```bash
git clone https://github.com/ryan7998/full-stack-challenge.git
cd wisejobs
```

### 2. Install Composer Dependencies

Ensure you have [Composer](https://getcomposer.org/) installed. Then run:

```bash
composer install
```

### 3. Install NPM Dependencies

Ensure you have [Node.js and NPM](https://nodejs.org/) installed. Then run:

```bash
npm install
```

### 4. Compile Frontend Assets

```bash
npm run dev
```

_For production:_

```bash
npm run production
```

### 5. Create Environment Configuration

Copy the example `.env` file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

### 6. Configure Environment Variables

Open the `.env` file and set your database credentials and other configurations:

```env
APP_NAME=WiseJobs
APP_ENV=local
APP_KEY=base64:YourGeneratedKey
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wisejobs
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

```

### 7. Set Up the Database

1. **Create a Database:**

    Log into your MySQL or MariaDB server and create a new database:

    ```sql
    CREATE DATABASE wisejobs;
    CREATE USER 'wisejobsuser'@'localhost' IDENTIFIED BY 'your_strong_password';
    GRANT ALL PRIVILEGES ON wisejobs.* TO 'wisejobsuser'@'localhost';
    FLUSH PRIVILEGES;
    ```

2. **Run Migrations and Seeders:**

    ```bash
    php artisan migrate --seed
    ```

### 8. Configure Storage Links

```bash
php artisan storage:link
```

## Running the Application

Start the local development server using Artisan:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser to see the application in action.
