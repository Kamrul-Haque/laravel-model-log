# laravel-model-log

[![Latest Stable Version](http://poser.pugx.org/kamrul-haque/laravel-model-log/v)](https://packagist.org/packages/kamrul-haque/laravel-model-log) [![Total Downloads](http://poser.pugx.org/kamrul-haque/laravel-model-log/downloads)](https://packagist.org/packages/kamrul-haque/laravel-model-log) [![Latest Unstable Version](http://poser.pugx.org/kamrul-haque/laravel-model-log/v/unstable)](https://packagist.org/packages/kamrul-haque/laravel-model-log) [![License](http://poser.pugx.org/kamrul-haque/laravel-model-log/license)](https://packagist.org/packages/kamrul-haque/laravel-model-log) ![GitHub Repo stars](https://img.shields.io/github/stars/Kamrul-Haque/laravel-model-log?color=%23FFC107)

Log model events with data by simply adding a Trait

## Installation

Install the package via [composer](https://getcomposer.org/):
```
composer require kamrul-haque/laravel-model-log
```

Migrate the necessary database tables:
```
php artisan migrate
```

## Usage

- Add ``KamrulHaque\LaravelModelLog\Traits\Loggable`` *Trait* to the *Model* you want to log
- Access the logs by ``/model-logs`` *uri* added to your application by the package
- To customize the log *view*, publish package views:
```
php artisan vendor:publish --provider="KamrulHaque\LaravelModelLog\ModelLogServiceProvider" --tag="views"
```
