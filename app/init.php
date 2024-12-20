<?php
use vilshub\http\Request;
use vilshub\router\Router;

//Load required files
require_once(dirname(__DIR__)."/app/lib/vendor/autoload.php");

//register error handler
ErrorHandler::listenForErrors();

//Load config files
$config       = require_once(dirname(__DIR__)."/config/app.php");

//System applications
$systemAppsHandler = require_once(dirname(__DIR__)."/config/applications.php");

//Instantiate App
$app          = new App(new Loader, new Router($routes, $socketFiles, $config), $config);

//Configure application router
$app->router->dynamicRoute     = true;

$app->boot(new FileSystem($config->envFile));

if(Request::isForApplication($systemAppsHandler->ids)){ //application
  
  $systemApp    = $systemAppsHandler->{Request::$id};
  $apiHandler   = $systemApp->routeFiles->apiHandler;
  $apiID        = $systemApp->apiId;
  
  if(Request::isFor("web", $apiID, 2)){
    require_once($webHandler);
  }else{
    require_once($apiHandler);
  }

}else{ //system
  require_once(dirname(__DIR__)."/http/api.php");
}
?>