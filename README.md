# Slim JSend Helper

[![Packagist Version][icon-packagist]][link-packagist]
[![PHP from Packagist][icon-php-version]][link-packagist]
[![Tests Status][icon-workflow]][link-workflow]
[![Coverage Status][icon-coverage]][link-coverage]
[![License][icon-license]][link-license]
[![Twitter: nekofar][icon-twitter]][link-twitter]

> Slim Framework response helper for JSend specification.

## Installation

To get started, install the package using composer:

```bash
composer require nekofar/slim-jsend
```

Requires Slim Framework 4 and PHP 8.1 or newer.

## Usage

```php
use Nekofar\Slim\JSend\ResponseFactoryDecorator;

$responseFactoryDecorator = new ResponseFactoryDecorator(/* ... */);
$response = $responseFactoryDecorator->createResponse();

// Set success payload
$response = $response->withSuccessPayload($data);
echo $response->getBody()->getContents(); // The response body
```

The resulting response will have the HTTP status code 200 OK and the JSON payload in the JSend format:

```json lines
{
  "status": "success",
  "data": {
    /* Your data here */
  }
}
```
## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

---
[icon-packagist]: https://img.shields.io/packagist/v/nekofar/slim-jsend?include_prereleases
[icon-php-version]: https://img.shields.io/packagist/php-v/nekofar/slim-jsend.svg
[icon-twitter]: https://img.shields.io/badge/follow-%40nekofar-1DA1F2?logo=twitter&style=flat
[icon-coverage]: https://codecov.io/gh/nekofar/slim-jsend/graph/badge.svg
[icon-license]: https://img.shields.io/github/license/nekofar/slim-jsend.svg
[icon-workflow]: https://img.shields.io/github/actions/workflow/status/nekofar/slim-jsend/tests.yml

[link-packagist]: https://packagist.org/packages/nekofar/slim-jsend
[link-twitter]: https://twitter.com/nekofar
[link-coverage]: https://codecov.io/gh/nekofar/slim-jsend
[link-license]: https://github.com/nekofar/slim-jsend/blob/master/LICENSE.md
[link-workflow]: https://github.com/nekofar/slim-jsend/actions/workflows/tests.yml
