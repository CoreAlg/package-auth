#!/bin/bash

# cd /var/www/html && rm -rf public/core-cdn
cd /var/www/html && rm -rf resources/views/auth
cd /var/www/html && rm -rf resources/views/emails
# cd /var/www/html && rm -rf config/core-auth.php
# cd /var/www/html && rm -rf resources/lang/en/core-auth.php

cd /var/www/html && composer remove corealg/auth
cd /var/www/html && composer require corealg/auth

cd /var/www/html && php artisan vendor:publish --provider="CoreAlg\Auth\Providers\CoreAuthServiceProvider"

# php artisan migrate:fresh

# cd /var/www/html && php artisan cache:clear
# cd /var/www/html && php artisan view:clear
# cd /var/www/html && php artisan route:clear
# cd /var/www/html && php artisan config:clear
cd /var/www/html && php artisan optimize

cd /var/www/html && php artisan migrate:fresh