<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
spl_autoload_register(function ($class) {
    if(file_exists("./$class.php"))
        require_once("$class.php");
    if(file_exists("./controllers/$class.php"))
        require_once("./controllers/$class.php");
});

$app = AppFactory::create();

$app->addBodyParsingMiddleware();

$app->get('/', 'SiteController:index');
$app->get('/impianto', 'ImpiantoController:index');
$app->get('/rilevatori_di_umidita', 'ImpiantoController:rilevatoriUmidita');
$app->get('/rilevatori_di_umidita/{identificativo}', 'ImpiantoController:rilevatoriUmiditaByID');
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni', 'ImpiantoController:rilevatoriUmiditaMisurazioni');
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni/maggioredi/{valore}', 'ImpiantoController:rilevatoriUmiditaMisurazioniMaggioreDi');
$app->get('/rilevatori_di_temperatura', 'ImpiantoController:rilevatoriTemperatura');
$app->get('/rilevatori_di_temperatura/{identificativo}', 'ImpiantoController:rilevatoriTemperaturaByID');
$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni', 'ImpiantoController:rilevatoriTemperaturaMisurazioni');
$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni/maggioredi/{valore}', 'ImpiantoController:rilevatoriTemperaturaMisurazioniMaggioreDi');

$app->run();
