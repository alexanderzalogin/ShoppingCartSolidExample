<?php

use App\Item;
use App\Constants;

require_once ('src/Item.php');
require_once ('config/Constants.php');

class Tv extends Item
{
    private $dg;
    private $count = 0;

    public function __construct()
    {
        $this->name = Constants::TV;
    }

    public function setDg($dg)
    {
        $this->dg = $dg;
    }
    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCount()
    {
        return $this->count;
    }
}
