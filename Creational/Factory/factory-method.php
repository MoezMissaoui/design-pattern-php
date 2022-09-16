<?php

/*
    Factory Method définit une méthode qui doit être utilisée pour
    créer des objets au lieu d’un appel direct de constructeur (opérateur new).
    Les sous-classes peuvent remplacer cette méthode pour changer la classe d’objets qui seront créés.
*/

class ProductCommand
{
    protected $prodCmd = array();
    protected $prod;

    // fabriquer le produit.
    protected function make($type = null)
    {
        if ($type == 'a')
            return $this->prod = new ProductA();
        else
            return $this->prod = new ProductB();
    }

    // Commander le produit.
    public function command($type = null)
    {
        $prod = $this->make($type);
        $this->prodCmd[] = $prod->getName();
    }

    public function getProdCmd()
    {
        return $this->prodCmd;
    }
}


/*
    Le code ci-dessus montre la fabrication des objets dans une méthode
    de création dédiée appelée ‘make’.
    Cette approche est également connue sous le nom de Factory Method.
*/
