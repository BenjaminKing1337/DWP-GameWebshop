<?php
$baseDir = dirname(__DIR__) . '/';
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
define('ROOTURL', $rootUrl);
define('BASEDIR', $baseDir);

define('STYLEDIR', ROOTURL . 'styles/');

?>