<?php

use App\Item;
use App\Constants;

require_once ('src/Item.php');
require_once ('config/Constants.php');

class Pan extends Item
{
    private $dm;
    private $count = 0;

    public function __construct()
    {
        $this->name = Constants::PAN;
    }

    public function setDm($dm)
    {
        $this->dm = $dm;
    }

    public function getDm()
    {
        return $this->dm;
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
