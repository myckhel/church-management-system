
# Laravel Countries

A Laravel countries list package

## Installation

Via Composer

``` bash
$ composer require daveismyname/laravel-countries
```

In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider in config/app.php file:

```
'providers' => [
    // ...
    Daveismyname\Countries\CountriesServiceProvider::class,
];
```


## Usage

In a controller import the class:

```
use Daveismyname\Countries\Facades\Countries;
```

In a view or closure call the facade:

This will return an object of countries

```
Countries::all();

```


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.


## Contributing

Contributions are welcome and will be fully credited.

Contributions are accepted via Pull Requests on [Github](https://github.com/daveismyname/laravel-countries).

## Pull Requests

- **Document any change in behaviour** - Make sure the `readme.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

## Security

If you discover any security related issues, please email dave@daveismyname.com email instead of using the issue tracker.

## License

license. Please see the [license file](license.md) for more information.
