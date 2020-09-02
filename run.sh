#!/bin/bash
mkdir storage
cd storage
mkdir logs
mkdir framework
cd framework
mkdir sessions && mkdir views && mkdir cache
cd ..
cd ..
composer install
chmod 777 -R storage/
php artisan optimize
