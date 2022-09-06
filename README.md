<p align="center" style="color: #0b0b0b">
  <img src="http://www.paperfly.com.bd/img/paperfly-logo-bn-white.svg">
</p>

<h1 align="center">Paperfly Courier Banagladesh</h1>
<p align="center" >
<img src="https://img.shields.io/packagist/dt/codeboxr/paperfly-courier">
<img src="https://img.shields.io/packagist/stars/codeboxr/paperfly-courier">
</p>

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
