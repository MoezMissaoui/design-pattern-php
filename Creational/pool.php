<?php


/*
    Le pattern pool est un design pattern utilisé dans des situations où le coût d’initialisation
    d’une instance de classe est élevé.
    Il peut offrir une amélioration significative au niveau de performances.
*/

/*
    Le pattern pool gère les classes instanciées.
    Le code client a accès au pool et peut ensuite l’utiliser pour éviter de créer
    de nouveaux objets en parcourant le pool pour trouver celui qui a déjà été instancié.
    Lorsque le pool est vide, il crée de nouveaux objets.
    En fonction de l’implémentation et des fonctionnalités souhaitées,
    le pool peut également être défini pour limiter le nombre de classes instanciées.
*/

class Pool
{
    private $instances = [];
    public function get($key)
    {
        return $this->instances[$key];
    }

    public function add($obj, $key)
    {
        $this->instances[$key] = $obj;
    }
}
class ObjectReusable
{
    public function operation()
    {
        // ...
    }
}
// test
$pool = new Pool();
$obj1 = new ObjectReusable();
$pool->add($obj1, 'object_key_1');
$obj1 = $pool->get('object_key_1');
$obj1->operation();


/*
    Quand dois-je utiliser le pattern Pool?
    Voici quelques cas où nous pourrions l’utiliser pour résoudre le problème:

    1- Lorsque nous devons créer et détruire un grand nombre d’objets en continu en peu de temps.
    2- Lorsque nous devons utiliser des objets similaires au lieu d’initialiser un nouvel objet sans discrimination et de façon incontrôlable.
    3- Lorsque nous devons créer des objets qui nécessitent un coûts plus élevé.
    4- Lorsqu’il y a plusieurs clients, qui ont besoin des mêmes ressources à des moments différents.
*/
