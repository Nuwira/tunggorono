# Tunggorono

[![Build Status](https://travis-ci.org/Nuwira/tunggorono.svg)](https://travis-ci.org/Nuwira/tunggorono)

Base application based on Laravel 5 to ease our job.

## Installation

### Composer

Run this command from `path/where/to/install`.

```bash
composer create-project nuwira/tunggorono path/where/to/install --prefer-dist --dev
```

Or you can clone this repository and then `composer install` from the path.

### Set Environment

Copy `.env.example` file to `.env` and then edit the `.env` file, fill the database section.

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

## Assets Management

For assets, please install [NPM](https://www.npmjs.com) and [Bower](http://bower.io). From root directory, run this command.

### Install NPM

Bower need NPM to run, so install the NPM requirements.

```bash
npm install
```

### Using Bower

Install assets components using [Bower](http://bower.io):

```bash
bower install
```

It will install [Bootstrap](http://getbootstrap.com), [jQuery](https://jquery.com), and [Font-Awesome](http://fontawesome.io) to `bower_components` directory.

For configuration, check `bower.json` file.

### Using Elixir

To compiled these assets, we use [Gulp](http://gulpjs.com). Run the compilation using this command.

```bash
gulp
```

The assets will be placed in `public/css` for CSS, `public/js` for JS, and `public/fonts` for fonts. Elixir will generate `public/build` that will be used for assets versioning.

For configuration, check `gulp.js` file.

## Database Migration

Do migration to build the base data structure.

```bash
php artisan migrate --seed
```

## Login

Now you can login using this account.

```
Username: nuwira
Password: nuwira
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
