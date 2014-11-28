<?php

namespace serhatozles\elfinder;

use Yii;
use yii\helpers\Json;
use yii\web\Controller as BaseController;

class Controller extends BaseController {

    public $options = [
	'uiOptions' => [
	    'toolbar' => [
		['back', 'forward'],
		['netmount'],
		['upload'],
		['open', 'download', 'getfile'],
		['info'],
		['quicklook'],
		['rm'],
		['edit', 'resize'],
		['search'],
		['view', 'sort'],
		['help']
	    ]
	],
	'contextmenu' => [
	    'navbar' => ['open', '|', 'info'],
	    'cwd' => ['reload', 'back', '|', 'upload', '|', 'sort', '|', 'info'],
	    'files' => ['getfile', '|', 'open', 'quicklook', '|', 'download', '|', 'rm', '|', 'edit', 'resize', '|', 'info']
	],
	'onlyMimes' => ["image"],
    ];

    public function actionControl($ajax) {

	if (!empty($ajax)) {


	    $wid = new \yii\base\Widget;

	    elFinderAsset::register($this->getView());

	    $this->options['url'] = $ajax;

	    if (!empty($this->language)) {

		$this->options['lang'] = $this->language;

		$this->getView()->registerJsFile(__DIR__ . "/assets/js/i18n/elfinder." . $this->language . ".js");
	    }

	    if (empty($this->options['id'])) {
		$this->options['id'] = $wid->getId();
	    }

	    Yii::$app->assetManager->bundles = [
		'yii\bootstrap\BootstrapPluginAsset' => false,
		'yii\bootstrap\BootstrapAsset' => false,
		'yii\web\JqueryAsset' => false,
	    ];
	    
	    $this->getView()->registerJs("$('#" . $this->options['id'] . "').elfinder(" . Json::encode($this->options) . ").elfinder('instance');");
	    $this->getView()->registerCss("#" . $this->options['id'] . " * {box-sizing: unset;}");

	    return $this->renderFile(__DIR__ . "/views/client.php", ['content' => '<div id="' . $this->options['id'] . '"></div>']);
	}
    }

}
