#!/bin/bash
set -e

echo "Pulling latest changes from git..."
git pull

echo "Updating Composer dependencies..."
composer install

echo "Updating NPM dependencies..."
npm install

echo "Running migrations..."
php artisan migrate

echo "Compiling assets..."
npm run build

echo "Update complete!"
