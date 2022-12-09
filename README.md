# laravel-model-log

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
- Access the logs by ``/model-log`` *uri* added to your application by the package
- To customize the log *view*, publish package views:
```
php artisan vendor:publish --provider="KamrulHaque\LaravelModelLog\ModelLogServiceProvider" --tag="views"
```
