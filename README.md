# Tunggorono

[![Build Status](https://travis-ci.org/Nuwira/tunggorono.svg)](https://travis-ci.org/Nuwira/tunggorono)

Tunggorono is a application bootstrap based on Laravel 5.4.

This application bootstrap is used by [Nuwira](https://nuwira.co.id) to build application for clients. You may use this application bootstrap to build your own application, but we do not offer support and warranty.

Please keep in mind that the master branch is unstable.

## Installation

Becaues Tunggorono is based on Laravel, the installation process is similar, just like installing Laravel.

### Composer

Assuming you will be install the project in `/project/tunggorono`.

```bash
composer create-project nuwira/tunggorono /project/tunggorono --prefer-dist
```

### Set Environment

The installation process will add `.env` file to give you basic configuration. Edit this file to fit your need, especially in database section.

## Assets Management

For front end assets, we use [Yarn](https://yarnpkg.com). Make sure Yarn is installed properly. You can also use traditional [NPM](https://www.npmjs.com).

To install assets, use `yarn` command.

```console
yarn
```

Tunggorono uses [Laravel Mix](https://laravel.com/docs/5.4/mix) to build assets. To build assets, run this command below.

```console
yarn run dev
```
All build tasks are defined in `package.json` file.

## Database Migration

Do migration to build the base data structure.

```bash
php artisan migrate --seed
```

## Login

Now you can login using this administrator account.

```
E-mail: tunggorono@nuwira.co.id
Password: tunggorono
```

Make sure you change this login info in the seeder on the production. 

### No Registration

For our application specification, we do not support registration by user. All registration process is done by administrator.

## Contribution

Basically we're open for contribution via pull requests. If you have discovered a bug or have an idea, don't hesitate to make a pull request.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)