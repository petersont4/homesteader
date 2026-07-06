# Homesteader

A self-hosted web application for tracking homestead data — chickens, eggs, gardens, plants, and harvests. Built with Laravel and Tailwind CSS, designed to be mobile-friendly for use in the field.

## What It Does

Homesteader provides simple data entry forms for recording:

- **Chickens** — track your flock by identifier, breed, egg color, and hatch date
- **Eggs** — record egg collection by chicken, color, date/time, and quality notes
- **Gardens** — organize your growing spaces into gardens, plots, plants, and harvests

The app is intentionally focused on *data entry*, not reporting. It pairs well with a separate reporting/visualization tool (such as Apache Superset) pointed at the same database.

## Requirements

- PHP 8.2 or higher (8.4+ recommended)
- Composer
- Node.js 18+ and npm
- A database supported by Laravel (MySQL, MariaDB, PostgreSQL, SQLite)
- A web server (nginx recommended) or `php artisan serve` for local development

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/petersont4/homesteader.git
cd homesteader
```

### 2. Install PHP dependencies

```bash
apt install php8.5-xml php8.5-mysql npm vite
composer install
```

### 3. Install JavaScript dependencies

```bash
npm install
```

### 4. Configure your environment

Copy the example environment file and open it for editing:

```bash
cp .env.example .env
```

Edit `.env` and set your database connection details:

```env
DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

> **Note:** Homesteader is tested against MySQL/MariaDB, but supports any database Laravel supports. Adjust `DB_CONNECTION` and connection details accordingly.

### 5. Generate an application key

```bash
php artisan key:generate
```

### 6. Run the database migrations

This creates all required tables in your database:

```bash
php artisan migrate
```

### 7. Build frontend assets

```bash
npm run build
```

### 8. Seed the database
Run the following command to fill the database with fake data. 
```bash
php artisan migrate:fresh --seed
```

If you would like to fill just one module with data, use one of the below commands.
```bash
php artisan db:seed --class=ChickenSeeder
php artisan db:seed --class=GardenSeeder
```

## Running the Application

### Local development

Start Laravel's built-in development server:

```bash
php artisan serve
```

Then visit `http://localhost:8000` in your browser.

For Tailwind CSS hot-reloading during development, run in a separate terminal:

```bash
npm run dev
```

### Production (nginx)

Create an nginx site configuration pointing at the `public` directory:

```nginx
server {
    listen 80;
    server_name your-domain-or-ip;

    root /path/to/homesteader/public;
    index index.php index.html;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.5-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

> Adjust the `fastcgi_pass` socket path to match your PHP-FPM version (e.g. `php8.2-fpm.sock`, `php8.4-fpm.sock`).

Set correct file permissions for your web server user (typically `www-data` on Ubuntu/Debian):

```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

Set production environment settings in `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=http://your-domain-or-ip
```

Optimize Laravel for production:

```bash
php artisan optimize
```

## Updating

When pulling new code changes:

```bash
git pull
composer install
php artisan migrate
npm run build
php artisan optimize
```

## Database Schema

Homesteader creates the following tables via migrations:

| Table | Description |
|---|---|
| `chickens` | Your flock — identifier, breed, egg color, hatch date |
| `eggs` | Egg collection records — laid by, color, date/time, quality, notes |
| `gardens` | Named garden areas |
| `garden_plots` | Individual plots within a garden |
| `plants` | Plants within a plot — type, purchase info, planting date, harvest unit |
| `harvests` | Harvest records for each plant — weight and date |

Laravel's standard framework tables (`users`, `sessions`, `cache`, `jobs`) are also created automatically.

## Contributing

Issues and pull requests are welcome. Please open an issue first to discuss any significant changes.

## License

This project is open source. See the [LICENSE](LICENSE) file for details.