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

1. [Create parcel](https://github.com/codeboxrcodehub/ecourier-courier#1-get-ecourier-delivery-city-list)
2. [Parcel tracking](https://github.com/codeboxrcodehub/ecourier-courier#2-get-ecourier-delivery-thanaupzilla-list)
3. [Parcel details](https://github.com/codeboxrcodehub/ecourier-courier#3-get-ecourier-delivery-postcode-list)
4. [Cancel parcel](https://github.com/codeboxrcodehub/ecourier-courier#3-get-ecourier-delivery-postcode-list)


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

### 1. Get ecourier delivery city list
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
