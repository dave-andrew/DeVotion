#!/bin/bash

# Check if the migrations have already been run
if [ ! -f /var/www/html/.migrations_done ]; then
    echo "Running migrations..."
    php artisan migrate:fresh --force
    touch /var/www/html/.migrations_done
else
    echo "Migrations have already been run."
fi
