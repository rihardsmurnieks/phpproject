<?php

namespace Bootcamp\Controlers;

class FruitsController extends AbstractController{


public function fruitsAction(){


    /** @var \Fruits $animals */
    $fruits = $this->container->get('model.fruits');
    $listOfFruits = $fruits->getListOfFruits();
    $templateVariables = ['fruits' => $listOfFruits];
    $template = '/fruits.view.php';
    return $this->render($template, $templateVariables);
}

}