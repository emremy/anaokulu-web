<?php

define('PATH', realpath('.'));
define('_controller',PATH.'/App/Controller/');
define('_model',PATH.'/App/Model/');
define('_middleware',PATH.'/App/Middleware/');
define('_router',PATH.'/Router/');
define('_view',PATH.'/App/Views/');
define('_core',PATH.'/Core/');
define('_plugin',PATH.'/Plugins/');
define('_pass','fb2d64969ad8e5858e611ca8df3b0d97');

session_start();

$Url = $_GET['_url'];
$Url = explode('/',$Url);


require _router.'Routers.php';

require _router.'Web.php';

require _router.'Assembly.php';

