<?php

/**
 * @copyright Copyright &copy; Serhat OZLES, nippy.in, 2014
 * @package yii2-elfinder
 * @version 1.0.0
 */

namespace serhatozles\elfinder;

/**
 * elFinder bundle for \serhatozles\elfinder\elFinder.
 *
 * @author Serhat OZLES <serhatozles@gmail.com>
 * @since 1.0
 */
class elFinderAsset extends \yii\web\AssetBundle
{
    
    public $css = [
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css',
        'css/elfinder.min.css',
        'css/theme.css',
    ];
    public $js = [
	'//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
	'//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js',
	'js/elfinder.min.js',
    ];
    public $depends = [
    ];

    public function init()
    {
        $this->sourcePath = __DIR__."/assets";
        parent::init();
    }

}