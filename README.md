<p align="center" style="color: #0b0b0b">
  <img src="https://raw.githubusercontent.com/codeboxrcodehub/paperfly-courier/main/image/logo.png">
</p>

<h1 align="center">Paperfly Courier Banagladesh</h1>
<p align="center" >
<img src="https://img.shields.io/packagist/dt/codeboxr/paperfly-courier">
<img src="https://img.shields.io/packagist/stars/codeboxr/paperfly-courier">
</p>

This is a Laravel/PHP package for [Paperfly](https://paperfly.com.bd/) BD Courier System. This package can be used in laravel or without laravel/php projects. You can use this package for headless/rest implementation as well as blade or regular mode development. We created this package while working for a project and thought to made it release for all so that it helps. This package is available as regular php [composer package](https://packagist.org/packages/codeboxr/paperfly-courier).

## Features

1. [Create parcel](https://github.com/codeboxrcodehub/paperfly-courier#1-parcel-create)
2. [Parcel tracking](https://github.com/codeboxrcodehub/paperfly-courier#2-parcel-tracking)
3. [Parcel details](https://github.com/codeboxrcodehub/paperfly-courier#3-parcel-details)
4. [Cancel parcel](https://github.com/codeboxrcodehub/paperfly-courier#4-cancel-parcel)


## Requirements

- PHP >=7.2
- Laravel >= 6

## Installation

```bash
composer require codeboxr/paperfly-courier
```

### vendor publish (config)

```bash
php artisan vendor:publish --provider="Codeboxr\PaperflyCourier\PaperflyCourierServiceProvider"
```

After publish config file setup your credential. you can see this in your config directory paperfly.php file

```
"sandbox"  => env("PAPERFLY_SANDBOX", false),
"username" => env("PAPERFLY_USERNAME", ""),
"password" => env("PAPERFLY_PASSWORD", ""),
"key"      => env("PAPERFLY_KEY", "")
```

### Set .env configuration

```
PAPERFLY_SANDBOX=true // for production mode use false
PAPERFLY_USERNAME=""
PAPERFLY_PASSWORD=""
PAPERFLY_KEY=""
```

## Usage

### 1. Parcel Create
```
use Codeboxr\PaperflyCourier\Facade\PaperflyCourier;

return PaperflyCourier::order()->create([
  "merOrderRef"          => "", // merchant invoice id
  "pickMerchantName"     => "" // Pickup store name,
  "pickMerchantAddress"  => "" // Pickup address,
  "pickMerchantThana"    => "" // Pickup thana name,
  "pickMerchantDistrict" => "" // Pickup district name,
  "pickupMerchantPhone"  => "" // Pickup contact person name,
  "productSizeWeight"    => "standard",
  "productBrief"         => "" // Parcel product details, 
  "packagePrice"         => "" //parcel price,
  "deliveryOption"       => "regular",
  "custname"             => "" // customer name,
  "custaddress"          => "" // customer address,
  "customerThana"        => "" // customer thana name,
  "customerDistrict"     => "" // customer district name,
  "custPhone"            => "" // customer phone number,
  "max_weight"           => "" // parcel weight in kg
]);
```


### 2. Parcel Tracking
```
use Codeboxr\PaperflyCourier\Facade\PaperflyCourier;

return PaperflyCourier::order()->tracking($trackingNumber) // Tracking Number
```

### 3. Parcel Details
```
use Codeboxr\PaperflyCourier\Facade\PaperflyCourier;

return PaperflyCourier::order()->invoice($referenceNumber) // reference number
```

### 4. Cancel Parcel
```
use Codeboxr\PaperflyCourier\Facade\PaperflyCourier;

return PaperflyCourier::order()->cancel($referenceNumber) // reference number
```

## Contributing

Contributions to the Paperfly package are welcome. Please note the following guidelines before submitting your pull request.

- Follow [PSR-4](http://www.php-fig.org/psr/psr-4/) coding standards.
- Read Paperfly API documentations first

## License

Paperfly package is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2022 [Codeboxr](https://codeboxr.com)
