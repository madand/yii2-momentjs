# moment asset for Yii2
Provides the asset bundle for easy integration of [moment](http://momentjs.com/) into your Yii2 application.


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer require --prefer-dist "madand/yii2-momentjs:*"
```

or add

```
"madand/yii2-momentjs": "*"
```

to the `require` section of your `composer.json` file.


## Usage

In the view file register the asset:

```php
// Register only core momentjs with no locale data
\madand\momentjs\MomentJsAsset::register($this);

// Register core momentjs with current app locale. Current locale is activated on DOM ready.
\madand\momentjs\MomentJsLocaleAsset::register($this);

// Register core momentjs with all locales supported by the momentjs.
\madand\momentjs\MomentJsAllLocalesAsset::register($this);
```


## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.
