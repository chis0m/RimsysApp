#! /bin/bash
  cd laranuxt

  cp .env.example .env

#  ./sail down --rmi all -v || true #Optional - This will remove images that may interfere with the installation

  ./sail build

  ./sail up -d

  ./sail composer install

  ./sail artisan key:generate

  ./sail artisan migrate:fresh --seed

  ./sail yarn

  ./sail yarn dev:host

