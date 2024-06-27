<?php

namespace App;

trait CartTrait
{
    private $items = [];
    private $item;

    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

    public function getItems()
    {
        return $this->items;
    }
}