<?php

/*
    Builder est une interface qui crée des parties d’un objet complexe.

    Le pattern Builder est un pattern bien connu dans le monde PHP.
    Il est particulièrement utile lorsque vous devez créer un objet avec de nombreuses options de configuration possibles.
*/

/*
    Builder se compose de:
        1- Classe concrète
        2- Une interface builder
        3- Les différentes implémentations de l’interface builder
        4- Une classe directeur qui appelle le builder approprié et le renvoie.
*/

// 1- Classe concrète
class Car
{
    public $name;

    public $model;

    public function __construct()
    {
    }
}

// 2- Interface builder
interface CarBuilderInterface
{
    public function setName();
    public function setModel();
    public function getCar();
}
/*
    Comme indiqué dans le code ci-dessus, l’interface du builder
    contient des méthodes pour préparer le builder lors de sa création et la méthode getCar() retournera l’objet final.
*/

// 3- Implémentations de l’interface builder
class BmwCarBuilder implements CarBuilderInterface
{
    private $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }
    public function setName()
    {
        $this->car->name = "Bmw";
    }

    public function setModel()
    {
        $this->car->model = "X90";
    }
    public function getCar()
    {
        return $this->car;
    }
}

class AudiCarBuilder implements CarBuilderInterface
{
    private $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }
    public function setName()
    {
        $this->car->name = "Audi";
    }

    public function setModel()
    {
        $this->car->model = "A7";
    }
    public function getCar()
    {
        return $this->car;
    }
}
/*
    Comme vous le voyez ci-dessus, nous venons de créer quelques implémentations de l’interface Builder en passant
    la classe concrète d’origine dans chaque constructeur, puis nous avons implémenté
    les setters telles que setName et setModel qui à leur tour fourniront un objet complet qualifié,
    enfin nous avons appelé getCar() pour retourner l’objet Car.
*/

// 4- La classe directeur

/*
    Maintenant, la dernière chose est la classe directeur, la principale responsabilité du directeur est d’obtenir
    une interface builder et d’appeler les méthodes de l’interface builder puis de récupérer l’objet.
*/

class CarDirector
{
    public function build(CarBuilderInterface $builder)
    {
        $builder->setName();
        $builder->setModel();

        return $builder->getCar();
    }
}


/*
    Maintenant, pour utiliser le builder:
*/
$director = new CarDirector();
$audi = $director->build(new AudiCarBuilder(new Car()));
$bmw = $director->build(new BmwCarBuilder(new Car()));
echo "Modél: " . $audi->name . "<br>";
echo "Modél: " . $audi->model . "<br>";
var_dump($audi);
