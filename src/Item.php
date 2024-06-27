<?php

namespace App;

require_once ('src/interfaces/IItem.php');

use IItem;

class Item implements IItem
{
    private $price;
    private $brand;

    protected $name;


    private $items = [
        'Tv' => Constants::TV,
        'Phone' => Constants::PHONE,
        'Pan' => Constants::PAN
    ];

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getName()
    {
        return $this->name;
    }
}
