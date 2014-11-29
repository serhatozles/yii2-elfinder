<?php

namespace serhatozles\elfinder;

use Yii;
use yii\helpers\Json;
use yii\web\Controller as BaseController;

class Controller extends BaseController {

    public $language;
    public $options = [];
    public $options_ = [
	'uiOptions' => [
	    'toolbar' => [
		['back', 'forward'],
		['netmount'],
		['upload'],
		['open', 'download', 'getfile'],
		['info'],
		['quicklook'],
		['rm'],
		['resize'],
		['search'],
		['view', 'sort'],
		['help']
	    ]
	],
	'contextmenu' => [
	    'navbar' => ['open', '|', 'info'],
	    'cwd' => ['reload', 'back', '|', 'upload', '|', 'sort', '|', 'info'],
	    'files' => ['getfile', '|', 'open', 'quicklook', '|', 'download', '|', 'rm', '|', 'resize', '|', 'info']
	],
	'onlyMimes' => ["image"],
    ];

    public function actionControl($ajax) {

	if (!empty($ajax)) {


	    $wid = new \yii\base\Widget;

	    $this->options['url'] = $ajax;

	    if (!empty($this->language)) {

		$this->options['lang'] = $this->language;

		$languageFile = Yii::$app->assetManager->publish(__DIR__ . "/assets/js/i18n/elfinder." . $this->language . ".js");
		$this->getView()->registerJsFile($languageFile[1], ['depends' => elFinderAsset::className()]);
	    }

	    elFinderAsset::register($this->getView());

	    if (empty($this->options['id'])) {
		$this->options['id'] = $wid->getId();
	    }

	    Yii::$app->assetManager->bundles = [
		'yii\bootstrap\BootstrapPluginAsset' => false,
		'yii\bootstrap\BootstrapAsset' => false,
		'yii\web\JqueryAsset' => false,
	    ];

	    if (!empty($this->options['getFileCallback'])) {
		$this->options['getFileCallback'] = new \yii\web\JsExpression($this->options['getFileCallback']);
	    }
	    if (!isset($this->options['uiOptions'])) {
		$this->options['uiOptions'] = $this->options_['uiOptions'];
	    }
	    if (!isset($this->options['uiOptions']['toolbar'])) {
		$this->options['uiOptions']['toolbar'] = $this->options_['uiOptions']['toolbar'];
	    }
	    if (!isset($this->options['contextmenu'])) {
		$this->options['contextmenu'] = $this->options_['contextmenu'];
	    }
	    if (!isset($this->options['onlyMimes'])) {
		$this->options['onlyMimes'] = $this->options_['onlyMimes'];
	    }

	    $this->getView()->registerJs("$('#" . $this->options['id'] . "').elfinder(" . Json::encode($this->options) . ").elfinder('instance');");
	    $this->getView()->registerCss("#" . $this->options['id'] . " * {box-sizing: unset;}");

	    return $this->renderFile(__DIR__ . "/views/client.php", ['content' => '<div id="' . $this->options['id'] . '"></div>']);
	}
    }

}
