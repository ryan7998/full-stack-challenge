# WiseJobs

**WiseJobs** is a sophisticated job portal built with Laravel, designed to seamlessly connect job seekers with employers. This platform leverages advanced backend architecture patterns and modern frontend technologies to deliver a robust, scalable, and user-friendly experience.

Admin: admin@wisejobs.com
Password: password123
(after seeding the db)

## Features

- **User Authentication:** Secure login and registration for job seekers and employers. 
- **Job Listings:** Employers can create, edit, and delete job postings.
- **Advanced Search & Filtering:** Job seekers can search and filter job listings based on various criteria.
- **Application Management:** Employers can manage companies and their job postings.
- **Responsive Design:** Optimized for desktops, tablets, and mobile devices.
- **Admin Dashboard:** Comprehensive dashboard to manage job listings, and companies.

## Architecture

WiseJobs employs a clean and maintainable architecture by adhering to SOLID principles and utilizing design patterns that promote separation of concerns and scalability.

### Backend

#### Repository Pattern

The **Repository Pattern** is implemented to abstract the data layer, providing a clean API for data access and manipulation. This promotes loose coupling and makes it easier to switch data sources or implement caching mechanisms without affecting the business logic.

#### Service Classes

**Service Classes** encapsulate the business logic of the application, acting as an intermediary between controllers and repositories. This separation ensures that controllers remain slim and focused solely on handling HTTP requests and responses.

#### Interfaces

Utilizing **Interfaces** for repositories and services promotes dependency inversion, allowing for easier testing and flexibility in swapping implementations.

- **Benefits:**
  - Facilitates mocking during unit testing.
  - Enhances code maintainability and scalability.
  - Encourages adherence to contracts, ensuring consistency across implementations.

### Frontend

#### Blade Templates

WiseJobs utilizes **Blade**, Laravel's powerful templating engine, to build dynamic and reusable frontend components. Blade's syntax allows for clean and readable code, making it easier to maintain and extend the frontend.

#### Alpine.js

For interactive UI components, **Alpine.js** is integrated with Blade templates. Alpine.js provides lightweight JavaScript functionality.

## Technologies & Methodologies

- **Laravel 10.x:** Robust PHP framework for building scalable web applications.
- **PHP 8.0+:** Modern PHP version with enhanced performance and features.
- **MySQL/MariaDB:** Reliable relational database management systems.
- **Composer:** Dependency management for PHP.
- **Node.js & NPM:** Managing frontend dependencies and build tools.
- **Alpine.js:** Lightweight JavaScript framework for interactive UI components.
- **Blade:** Laravel's templating engine for building dynamic views.
- **Repository Pattern:** Abstracts data layer for cleaner architecture.
- **Service-Oriented Architecture:** Encapsulates business logic within service classes.
- **SOLID Principles:** Ensures maintainable and scalable codebase.

## Installation

Follow these steps to set up WiseJobs on your local machine for development and testing purposes.

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/wisejobs.git
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

### 7. Set Up the Database

1. **Create a Database:**

   Log into your MySQL or MariaDB server and create a new database:

2. **Run Migrations and Seeders:**

   ```bash
   php artisan migrate --seed
   ```

## Running the Application

Start the local development server using Artisan:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser to see the application in action.

## License

This project is licensed under the [MIT License](LICENSE).
