<?php
ini_set('display_errors', 'on');


define('WEBROOT', dirname(__FILE__));
define ('ROOT',dirname(WEBROOT));
define('DS',DIRECTORY_SEPARATOR);

define('CORE',ROOT.DS.'core');

require CORE.DS.'includes.php';

new Dispatcher();
