#!/bin/bash

set -e

# Start time
START_TIME=$(date +%s)

echo
echo "============================================"
echo "🚀  Laravel Installation Script"
echo "============================================"
echo

# STEP 1: Environment file
echo "🔄 STEP 1: Preparing environment file..."
echo "--------------------------------------------"
if [ ! -f ".env" ]; then
    echo "Copying .env.example to .env..."
    cp .env.example .env
else
    echo ".env file already exists."
fi
echo

# STEP 2: Composer install
echo "📦 STEP 2: Installing PHP dependencies..."
echo "--------------------------------------------"
composer install --no-interaction --prefer-dist --optimize-autoloader
echo

# STEP 3: NPM install & build
echo "🌐 STEP 3: Installing and building frontend assets..."
echo "--------------------------------------------"
npm install
npm run build
echo

# STEP 4: Laravel setup
echo "⚙️ STEP 4: Running Laravel commands..."
echo "--------------------------------------------"
echo "🔑 Generating APP_KEY..."
php artisan key:generate
echo

echo "📂 Running migrations and seeding database..."
php artisan migrate --seed --force
echo

# End time
END_TIME=$(date +%s)
DURATION=$((END_TIME - START_TIME))

echo
echo "✅ DONE: Laravel installation completed successfully!"
echo "🕒 Completed in $DURATION seconds"
echo "============================================"
