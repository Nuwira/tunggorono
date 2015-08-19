# Tunggorono

[![Build Status](https://travis-ci.org/Nuwira/tunggorono.svg)](https://travis-ci.org/Nuwira/tunggorono)

Base application based on Laravel 5 to ease our job.

## Installation

### Composer

Run this command from `path/where/to/install`.

```bash
composer create-project nuwira/tunggorono path/where/to/install --prefer-dist --dev
```

Or you can clone this repository and then `composer update` from the path.

### Set Environment

Edit the `.env` file, fill the database section.

```bash
APP_ENV=local
APP_DEBUG=true
APP_KEY=rKgGw2WsrWMAeO2fCJ7nUssERmp61uYW

DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
```

### Database Migration

Do migration to build the base data structure.

```bash
php artisan migrate --seed
```

### Login

Now you can login using this account.

```
Username: nuwira
Password: nuwira
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
