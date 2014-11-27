elFinder
========
Yii2 Elfinder

I'M DEVELOPING, NOT READY YET

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

View:
```php
<?php 
    echo \serhatozles\elfinder\elFinder::widget([
	'ajax' => Url::to(['site/elfinder']),
    ]); 
?>```

Controller Action:
```php
<?php 
    public function actionElfinder() {

	$elFinder = new \serhatozles\elfinder\elFinder;
	$elFinder->connector([
	    // 'debug' => true,
	    'roots' => [
		[
		    'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
		    'path' => Yii::getAlias('@webroot/files/'), // path to files (REQUIRED)
		    'URL' => Yii::getAlias('@web/files/'), // URL to files (REQUIRED)
		    'accessControl' => 'access'      // disable and hide dot starting files (OPTIONAL)
		],
	    ]
	]);
    }
 ?>```
