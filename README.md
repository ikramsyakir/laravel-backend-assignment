## 🖥 Requirements

The following tools are required in order to start the installation.

* PHP 8.3 or higher
* Database (eg: MySQL, MariaDB)
* Web Server (eg: Nginx, Apache)
* Local Development (Valet/Herd for Mac or Laragon for Windows)

## 🚀 Installation

1. Clone the repository with `git clone`
2. Copy __.env.example__ file to __.env__ and edit database credentials there

    ```shell
    cp .env.example .env
    ```

3. Install composer packages

    ```shell
    composer install
    ```

4. Install npm packages and compile files

    ```shell
    npm install
    ```

   For **Development**:
    ```shell
    npm run dev
    ```

   For **Production**:
    ```shell
    npm run build
    ```

5. Generate `APP_KEY` in **.env**

    ```shell
    php artisan key:generate
    ```

6. Running migrations and all database seeds

    ```shell
    php artisan migrate --seed
    ```

You can now visit the app in your browser by visiting [https://laravel-backend-assignment.test](https://laravel-backend-assignment.test).

If you seeded the database you can login into a test account with **`superadmin@app.com`** & **`password`**.
