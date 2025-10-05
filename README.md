## 🖥 Requirements

The following tools are required in order to start the installation.

* PHP 8.3 or higher
* Database (eg: MySQL, MariaDB)
* Web Server (eg: Nginx, Apache)
* Local Development (Valet/Herd for Mac or Laragon for Windows)

## 🚀 Installation

To install the application, follow these steps:

**Option 1: Using script (recommended)**

Run this command in your terminal:
```shell
./scripts/install.sh
```

To update the project:
```shell
./scripts/update.sh
```

**Option 2: Manual installation**

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

## Assignment Questions

1. Write a password generator which is able to have small, capital letters, numbers, symbols and minimum length. The generator can customize it such as small, capital letters, numbers and minimum length or all above. Symbols: `['!', '#', '$', '%', '&', '(', ')', '*', '+', '@', '^']`. **Print out the password.**


   * [app/Services/PasswordGeneratorService.php](app/Services/PasswordGeneratorService.php)
   * [app/Console/Commands/PasswordGenerator.php](app/Console/Commands/PasswordGenerator.php)
   * [app/Http/Controllers/PasswordGenerateController.php](app/Http/Controllers/PasswordGenerateController.php) `Add header: Accept: application/json`

2. Build a simple automatic pizza ordering program.
   * Small pizza: RM15
   * Medium pizza: RM22
   * Large pizza: RM30
   * Pepperoni for small pizza: +RM3
   * Pepperoni for medium pizza: +RM5
   * Extra cheese for any size pizza: +RM6

    Based on an user’s order, work out their final bill.

* [app/Services/PizzaOrderService.php](app/Services/PizzaOrderService.php)
* [app/Console/Commands/PizzaOrder.php](app/Console/Commands/PizzaOrder.php)
* [app/Http/Controllers/PizzaOrderController.php](app/Http/Controllers/PizzaOrderController.php) `Add header: Accept: application/json`

