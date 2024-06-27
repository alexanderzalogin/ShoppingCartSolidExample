<?php

use App\Constants;

require_once ('config/Constants.php');

class Phone extends Tv
{
    private $count = 0;

    public function __construct()
    {
        $this->name = Constants::PHONE;
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
