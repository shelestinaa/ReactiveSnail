#!/usr/bin/env bash

composer install
./artisan sleepingowl:install
./artisan migrate
./artisan db:seed

npm install
npm run prod
