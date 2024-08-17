1. **Clone the Git Repository

   Access your server via SSH, navigate to the desired directory where you want to deploy the project, and clone the repository:**

   ```
   git clone https://github.com/MatviyRoman/Laravel-Task-Manager.git

   cd Laravel-Task-Manager
   ```


2. **Install Dependencies via Composer

   Ensure that Composer is installed on your server. Then, run the following command:**

   ```
   composer install
   ```

   This will install all the necessary dependencies as specified in the `composer.json` file.


3. **Configure the `.env` File**

   ```
   cp .env.example .env
   ```

Open the `.env` file and configure it according to your hosting environment:

* **APP_NAME** : The name of your application.
* **APP_ENV** : The environment (e.g., `production`).
* **APP_KEY** : This can be generated in the next step.
* **DB_CONNECTION** : The type of database (e.g., `mysql`).
* **DB_HOST** : The database host.
* **DB_PORT** : The database port (typically `3306` for MySQL).
* **DB_DATABASE** : The name of your database.
* **DB_USERNAME** : The database username.
* **DB_PASSWORD** : The database password.


4. **Generate APP_KEY

   Generate a unique application key by running the following command:**

   ```
   php artisan key:generate
   ```

5. **Set Permissions

   Ensure that the web server (e.g., Nginx or Apache) has access to the `storage` and `bootstrap/cache` directories. You can do this with the following command:**

   ```
   chmod -R 775 storage bootstrap/cache
   ```
6. **Configure the Web Server**

   Configure your web server (Apache, Nginx) to serve the Laravel application. The main thing to ensure is that the web server points to the `public/index.php` file as the entry point.
7. Optimize the Application

   To improve performance, you can clear and optimize the application cache:

   ```
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
8. **Test the Application**

   After completing all the steps, visit your domain in a web browser and make sure the application is running correctly.
9. Set Permissions for .env (Optional)

    For security purposes, you can make the `.env` file readable only by the owner:

    ```
    chmod 600 .env
    ```
10. Run project

    ```
    php artisan serve
    ```
