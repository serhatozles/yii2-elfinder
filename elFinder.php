<?php

namespace serhatozles\elfinder;

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

	    $this->getView()->registerJs("$('#elfinder').elfinder(" . Json::encode($this->options) . ").elfinder('instance');");

	    return "Hello!";
	}
    }

}
