# Laravel with Vue 2 Twitter Clone

This project combines Laravel as the backend framework with an external Vue 2 project for the frontend. Follow the instructions below to set up and run the project.

## Prerequisites

- [PHP](https://www.php.net/) (>= 7.2)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (>= 10.x)
- [npm](https://www.npmjs.com/) (comes with Node.js)
- [MySQL](https://www.mysql.com/) or another database of your choice

## Getting Started

1. **Clone the repository:**

   ```bash
   git https://github.com/imsat/x-clone.git
   
2. **Install Laravel dependencies:**

    ```bash
   composer install

3. **Install Laravel dependencies:**

    ```bash
    cp .env.example .env
   
4. **Update the database configuration in the .env file:**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=your_database_host
    DB_PORT=your_database_port
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

5. **Generate the application key:**
    ```bash
    php artisan key:generate
    php artisan jwt:secret
   
6. **Run database migrations and seed data:**
    ```bash
    php artisan migrate --seed

7. **Install Node.js dependencies for the Vue 2 project:**
    ```bash
    cd frontend
   cp .env.example .env
   npm install 

## Running the Application

8. **Run the Laravel development server:**
    ```bash
    php artisan serve 

Now copy that server running on url http://127.0.0.1:8000 + /api/v1/ plus add this extra key = http://127.0.0.1:8000/api/v1/

9. **Copy that url and paste this value in frontend .env file  in this key "VITE_API_BASE_URL=":**

    ```bash
    cd frontend
   cp .env.eample .env

10. **Run the Vue 2 development server (in a separate terminal window):**
    ```bash
    cd frontend
    npm run dev

11. **Access the application in your browser:**

Open your browser and navigate to http://localhost:5173/. The Laravel backend will serve the Vue 2 frontend.


   
   
    





