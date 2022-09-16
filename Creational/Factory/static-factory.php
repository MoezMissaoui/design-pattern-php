<?php
/*
    Ce pattern est similaire au pattern Abstract Factory, ce pattern est utilisé pour créer une série d’objets.
    La différence entre cela et le pattern Abstract Factory est que le pattern Static Factory
    utilise une seule méthode statique pour créer tous les types d’objets qu’il peut créer.
*/

// la classe factory
final class ProductFactory
{
    public static function factory(string $type): Product
    {
        if ($type == 'a')
            return new ProductA();
        else
            return new ProductB();
    }
}

interface Product
{
    public function display();
}

class ProductA implements Product
{
    public function display()
    {
        echo 'Product A';
    }
}

class ProductB implements Product
{
    public function display()
    {
        echo 'Product B';
    }
}
