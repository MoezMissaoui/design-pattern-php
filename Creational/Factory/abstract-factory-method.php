<?php

/*
    Abstract Factory définit une interface pour créer tous les objets,
    mais laisse la création réelle de l’objet aux classes du Factory concrètes.
    Chaque type de Factory correspond à une certaine variété d’objets.

    Le code client appelle les méthodes de création de l’objet factory au lieu de créer
    des objets directement avec un appel de constructeur (via l’opérateur new).
    Puisqu’un objet factory correspond à une seule variante, tous ses objets seront compatibles.
*/


/**
 * Car Factory class
 */
abstract class AbstractCarFactory {
    abstract function makeEngine();
    abstract function makeRadiator();
}

class AudiCarFactory extends AbstractCarFactory {
    private $name = "Audi";
    function makeEngine() {
        return new AudiEngineCar;
    }
    function makeRadiator() {
        return new AudiRadiatorCar;
    }
}

/**
 * Car classes
 */
abstract class AbstractCar {
    abstract function getName();
    abstract function getModel();
}

abstract class AbstractRadiatorCar extends AbstractCar {
    protected $piece = "Radiator";
}

class AudiRadiatorCar extends AbstractRadiatorCar {
    private $name;
    private $model;
    function __construct() {
        $this->name = 'MV50';
        $this->model = 'v1';
    }
    function getName() {
        return $this->name;
    }
    function getModel() {
        return $this->model;
    }
}

abstract class AbstractEngineCar extends AbstractCar {
    protected $piece = "Engine";
}

class AudiEngineCar extends AbstractEngineCar {
    private $name;
    private $model;
    function __construct() {
        $this->name = 'S10';
        $this->model = 'v5';
    }
    function getName() {
        return $this->name;
    }
    function getModel() {
        return $this->model;
    }
}

// test du abstract factory
$instance = new AudiCarFactory;

$obj = $instance->makeEngine();
print('Le nom de moteur est '. $obj->getName());
print('Le modéle de moteur est '. $obj->getModel());
