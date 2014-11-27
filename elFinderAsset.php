<?php

/**
 * @copyright Copyright &copy; Serhat OZLES, nippy.in, 2014
 * @package yii2-elfinder
 * @version 1.0.0
 */

namespace serhatozles\elfinder;

/**
 * elFinder bundle for \kartik\elfinder\elFinder.
 *
 * @author Serhat OZLES <serhatozles@gmail.com>
 * @since 1.0
 */
class elFinderAsset extends \yii\web\AssetBundle
{
    
    public $css = [
        'css/elfinder.min.css',
        'css/theme.css',
    ];
    public $js = [
	'js/elfinder.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__."/assets";
        parent::init();
    }

}