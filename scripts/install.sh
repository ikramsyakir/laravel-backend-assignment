#!/bin/bash
set -e

if [ ! -f ".env" ]; then
  echo "Copying .env.example to .env..."
  cp .env.example .env
fi

echo "Installing Composer dependencies..."
composer install

echo "Installing NPM dependencies..."
npm install

echo "Generating APP_KEY..."
php artisan key:generate

echo "Running migrations and seeding database..."
php artisan migrate --seed --force

echo "Compiling assets..."
npm run build

echo "Done! Visit https://laravel-backend-assignment.test"
