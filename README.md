# Blast application

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]
[![Coverage Status](https://img.shields.io/coveralls/phpthinktank/blast-application/master.svg?style=flat-square)](https://coveralls.io/github/phpthinktank/blast-application?branch=1.0.x-dev)

The goal of Blast application is to deliver a framework agnostic application life-cycle having regard on modern standards.
 
PSR-0, PSR-1, PSR-2, PSR-3, PSR-4, PSR-7, PSR-11 (Container-interop) are supported standards. 


## Install

Via Composer

``` bash
$ composer require blast/application
```

## Usage

Lets build our first base application.

### The foundation

```php
<?php

use Blast\Application\Kernel\Foundation as Application

$application = new Application();
```

#### Configuration

Our application foundation has been set, now we are able to set our config.

Application configuration is an `Array` and just need to passed to our config.

We could pass directly:

```php
<?php

$application->setConfig([
  'name' => 'base application'
]);
```

Or receive config data from anywhere

```php
<?php

//should return an array!
$config = require_once __DIR__ . '/config.php';
$application->setConfig($config);
```

You are free to choose how to pass configuration. You could also use packages like 

 - [blast\config](https://github.com/phpthinktank/blast-config)
 - [more](https://packagist.org/search/?q=config)
 
#### Container

Modern application needs to decouple complexity. That means we want to manage services and inject them automatically. 
Blast application is following the standard of `container-interop/container-interop`.

We use [`league/container`](http://container.thephpleague.com/) for example.

```
<?php

use League\Container;

$application->setContainer(new Container());
```

Here is an list of [container-interop](https://github.com/container-interop/container-interop#projects-implementing-containerinterface) implementations.

#### Dispatching

Our application is dispatching an added strategy with an PSR-7 request and response. Within this strategy you could 
define your own logic. 

For example we use [`wellrested/wellrested`](https://github.com/wellrestedphp/wellrested) for our PSR-7 implementation.

```php
<?php

use WellRESTed\Message\Response;
use WellRESTed\Message\ServerRequest;
use Acme\Strategy;

$application->setStrategy(new Strategy);
$application->dispatch(ServerRequest::getServerRequest(), new Response);

```

Their are more PSR-7 compatible packages available on [packagist](https://packagist.org/providers/psr/http-message-implementation) or the following:

 - symfony/http-foundation with symfony/psr-http-message-bridge

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Marco Bunge][link-author]
- [All contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/blast/application.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/phpthinktank/blast-application/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/blast/application.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/blast/application
[link-travis]: https://travis-ci.org/phpthinktank/blast-application
[link-downloads]: https://packagist.org/packages/blast/application
[link-author]: https://github.com/mbunge
[link-contributors]: ../../contributors
