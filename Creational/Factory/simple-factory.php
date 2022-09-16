<?php

/*
    Le design patterns Simple factory génère une instance d’un objet pour
    le client sans exposer aucune implémentation au client.
    Dans la POO, le factory est un objet pour créer d’autres objets.
*/


interface Car
{
}


class Audi implements Car
{
}
class BM implements Car
{
}
class Mercedes implements Car
{
}


class CarFactory
{
    public function makeAudi(): Car
    {
        return new Audi;
    }
    public function makeBM(): Car
    {
        return new BM;
    }
    public function makeMercedes(): Car
    {
        return new Mercedes;
    }
}
