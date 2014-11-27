<?php

namespace serhatozles\elfinder;

// Full Namespace : serhatozles\elfinder\elFinder

use Yii;
use yii\helpers\Json;

/**
 * This is just an example.
 */
class elFinder extends \yii\base\Widget {

    public $ajax;
    public $language;
    public $options = [];

    public function run() {

	if (!empty($this->ajax)) {

	    elFinderAsset::register($this->getView());

	    $this->options['url'] = $this->ajax;

	    if (!empty($this->language)) {

		$this->options['lang'] = $this->language;

		$this->getView()->registerJsFile(__DIR__ . "/assets/js/i18n/elfinder." . $this->language . ".js");
	    }

	    if (empty($this->options['id'])) {
		$this->options['id'] = $this->getId();
	    }

	    $this->getView()->registerJs("$('#" . $this->options['id'] . "').elfinder(" . Json::encode($this->options) . ").elfinder('instance');");
	    $this->getView()->registerCss("#" . $this->options['id'] . " * {box-sizing: unset;}");

	    return '<div id="' . $this->options['id'] . '"></div>';
	}
    }

    public function connector($options = null) {

	if (is_null($options)) {
	    $options = [
		// 'debug' => true,
		'roots' => [
		    [
			'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
			'path' => Yii::getAlias('@webroot/files/'), // path to files (REQUIRED)
			'URL' => Yii::getAlias('@web/files/'), // URL to files (REQUIRED)
			'accessControl' => 'access'      // disable and hide dot starting files (OPTIONAL)
		    ],
		]
	    ];
	}

	return $this->renderFile(__DIR__ . "/views/connect.php", ['options' => $options]);
    }

}
