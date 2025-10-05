#!/bin/bash
set -e

# Start time
START_TIME=$(date +%s)

echo
echo "============================================"
echo "🔄  Laravel Update Script"
echo "============================================"
echo

echo "🔁 STEP 1: Pulling latest changes from git..."
echo "--------------------------------------------"
git pull
echo

echo "📦 STEP 2: Updating Composer dependencies..."
echo "--------------------------------------------"
composer install --no-interaction --prefer-dist --optimize-autoloader
echo

echo "🌐 STEP 3: Updating NPM dependencies..."
echo "--------------------------------------------"
npm install
echo

echo "📂 STEP 4: Running migrations..."
echo "--------------------------------------------"
php artisan migrate --force
echo

echo "⚡ STEP 5: Compiling assets..."
echo "--------------------------------------------"
npm run build
echo

# End time
END_TIME=$(date +%s)
DURATION=$((END_TIME - START_TIME))

echo
echo "✅ DONE: Laravel update completed successfully!"
echo "🕒 Completed in $DURATION seconds"
echo "============================================"
