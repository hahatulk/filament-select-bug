# This is clean laravel+filament app with docker

### Start page is default of filament: <br><br> `http://localhost:8000/admin`
### Select problem repro is at: <br><br> `http://localhost:8000/admin/users/create`

## Install guide
### 1. Install docker
### 2. Run `docker-compose up -d --build`
### 3. Run `docker-compose exec app composer install`
### 4. Run `docker-compose exec app php artisan migrate:fresh --seed`
