elFinder
========
Yii2 Elfinder

See: http://elfinder.org/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist serhatozles/yii2-elfinder "*"
```

or add

```
"serhatozles/yii2-elfinder": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

Add Main.php
```php
'controllerMap' => [
    'elfinder' => [
	'class' => 'serhatozles\elfinder\Controller',
    ]
],
```

View:
```php
    echo \serhatozles\elfinder\elFinder::widget([
	'ajax' => Url::to(['site/elfinder']),
    ]); 
```

Controller Action:
```php

    public $enableCsrfValidation = false;

    public function actionElfinder() {

	$elFinder = new \serhatozles\elfinder\elFinder;
	$elFinder->connector([
	    // 'debug' => true,
	    'roots' => [
		[
		    'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
		    'path' => Yii::getAlias('@webroot/files/'), // path to files (REQUIRED)
		    'URL' => Yii::getAlias('@web/files/'), // URL to files (REQUIRED)
		],
	    ]
	]);
    }
```
