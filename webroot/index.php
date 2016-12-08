<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('VIEWS_PATH', ROOT.DS.'views');
require_once (ROOT.DS.'lib'.DS.'bootstrap.php');
App::run($_SERVER['REQUEST_URI']);