<?php

/*
    Prototype est un design pattern qui permet de cloner des objets, même complexes, sans se coupler à leurs classes spécifiques.
*/

/*
    Toutes les classes prototypes devraient avoir une interface commune qui permet de copier
    des objets même si leurs classes concrètes sont inconnues. Les objets prototypes
    peuvent produire des copies complètes car les objets de la même classe peuvent accéder
    aux champs privés les uns des autres.
*/

/*
    Le pattern Prototype est disponible en PHP prêt à l’emploi.
    Vous pouvez utiliser le mot clé « clone » pour créer une copie exacte d’un objet.
    Pour ajouter la prise en charge du clonage à une classe, vous devez implémenter la méthode « __clone ».
*/

/*
    Dans cet exemple, nous avons une classe CarPrototype abstraite,
    avec deux sous-classes concrètes, AudiCarPrototype et BmwCarPrototype.
    Pour créer un objet en utilisant AudiCarPrototype ou BmwCarPrototype, nous appelons la méthode « clone ».
*/

abstract class CarPrototype
{
    protected $name;
    protected $model;

    abstract function __clone();

    function getModel()
    {
        return $this->model;
    }
    function setModel($model)
    {
        $this->model = $model;
    }
    function getName()
    {
        return $this->name;
    }
}
class AudiCarPrototype extends CarPrototype
{
    function __construct()
    {
        $this->name = 'Audi';
    }
    function __clone()
    {
    }
}
class BmwCarPrototype extends CarPrototype
{
    function __construct()
    {
        $this->name = 'Bmw';
    }
    function __clone()
    {
    }
}

//test
$audiProto = new AudiCarPrototype();
$bmwProto = new BmwCarPrototype();
$car1 = clone $audiProto;
$car1->setModel('A7');
print('Name : ' . $car1->getName() . "<br>");
print('Model : ' . $car1->getModel() . "<br>");
print("<br>");
$car2 = clone $bmwProto;
$car2->setModel('X25');
print('Name : ' . $car2->getName() . "<br>");
print('Model : ' . $car2->getModel() . "<br>");
print("<br>");
