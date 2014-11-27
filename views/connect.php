<?php

error_reporting(0);

require_once(__DIR__ . '/../php/elFinderConnector.class.php');
require_once(__DIR__ . '/../php/elFinder.class.php');
require_once(__DIR__ . '/../php/elFinderVolumeDriver.class.php');
require_once(__DIR__ . '/../php/elFinderVolumeLocalFileSystem.class.php');

$connector = new elFinderConnector(new elFinder($options));
$connector->run();