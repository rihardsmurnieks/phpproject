<?php

require 'vendor/autoload.php';

use Bootcamp\Controlers\AnimalController;
use Bootcamp\Controlers\CarsController;
use Bootcamp\Controlers\FruitsController;
use Bootcamp\models\Cars;
use Bootcamp\models\Animal;
use Bootcamp\models\Fruits;
use Bootcamp\models\SmallAnimals;
use Bootcamp\Container;

$response = ''; //render('views/landing.view.php');
if (array_key_exists('page', $_GET)) {
    $requestedPage = $_GET['page'];
    $dependencies = [
        'model.animals' => new Animal(),
        'model.animals.small' => new SmallAnimals(),
        'model.cars' => new Cars(),
        'model.fruits' => new Fruits(),
        'resource.views' => __DIR__ . '/App/views'
    ];
    $container = new Container($dependencies);
    $animals = new AnimalController($container);
    $cars = new CarsController($container);
    $fruits = new FruitsController($container);

    $pages = [
        'animals' => [$animals, 'animalsAction'],
        'small-animals' => [$animals, 'smallAnimalsAction'],
        'cars' => [$cars, 'carsAction'],
        'fruits' => [$fruits, 'fruitsAction']

    ];
    if (array_key_exists($requestedPage, $pages)) {
        $response = call_user_func($pages[$requestedPage]);
    } else {
        //http_response_code(404);
        header('HTTP/1.1 404 Not Found');
    }
}
include __DIR__. '/App/view.php';