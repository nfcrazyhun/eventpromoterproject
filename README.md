<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Event Promoter Project
## About this app
This web application made in:\
**TAL**_(L)_ stack - **T**ailwind, **A**lpine.js, **L**aravel, _but (without Livewire)_

**This application made for learning purpose.**

## Features
**You can expect functionalities like:**

- List Locations with events
- List Performers with events
- List Event with Location and Performers
- Buy Tickets to Event
- List your past ticket purchases

## Installation guide
1. Open a terminal
2. Clone this repository
```
git clone https://github.com/nfcrazyhun/eventpromoterproject.git
```
3. `cd` into it

4. Install dependencies
```
composer install
```
5. (Optional) Build front-end assets
> **Note:** Since **Laravel v9.19.0** the default asset builder was replaced from _Laravel Mix_ to **Vite**<br>
> More info: [https://youtu.be/epMbfE37014](https://youtu.be/epMbfE37014) <br>
> (old) npm run watch &rarr; (new) npm run dev <br>
> (old) npm run dev/prod &rarr; (new) npm run build
```
npm install
npm run build
```
6. Copy then rename .env.example to .env
```
copy .env.example .env
```
7. Generate application key
```
php artisan key:generate
```
8. Create a database. (collation: utf8mb4_unicode_ci)

9. Update database credentials in the .env

10. Set up database tables (with demo data)
```
php artisan migrate:refresh --seed
```

### The application comes with default user.
-   email: `admin@admin.com`
-   password: `admin`

## Note
The project was made with the following software versions:
- PHP 8.1.5
- Laravel Framework 9.19.0
- Tailwind CSS 3.1.5
- Alpine.js 3.10.2

## Roadmap
- Admin page to manage
  - Locations
  - Events
  - Performers
  - Tickets

## Screenshots
- WIP
