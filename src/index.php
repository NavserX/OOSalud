<?php

include_once "vendor/autoload.php";

use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;


$router = new RouteCollector();


$router->get('/',function (){
    //include_once "app/View/principal.php";
    $controlador = new \App\Controlador\PacienteControlador();
    return $controlador->listar();
});
$router->post('/paciente',[\App\Controlador\PacienteControlador::class, 'store']);
$router->get('/paciente/create',[\App\Controlador\PacienteControlador::class, 'create']);

$router->put('/paciente/{id}',[\App\Controlador\PacienteControlador::class, 'update']);


//Resolución de rutas
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}
catch(HttpRouteNotFoundException $e){
    return "Ruta no encontrada";
}
// Print out the value returned from the dispatched function
echo $response;
