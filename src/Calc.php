<?php

namespace App;

require_once ('src/interfaces/ICalc.php');
require_once ('src/CalcTrait.php');
require_once ('src/CartTrait.php');

use ICalc;

class Calc implements ICalc
{
    use CalcTrait;
    use CartTrait;

    private $calc;

    public function getTotalAmount()
    {
        $items = $this->getItems();
        $count = 0;
        $productsCount = [];
        $productsTotal = [];
        $productsStr = '';

        foreach ($items as $item) {

            if (isset($productsCount[$item->getName()])) {
                $count++;
                $item->setCount($count);
                $productsCount[$item->getName()] += $item->getCount();
            } else {
                $item->setCount($count);
                $productsCount[$item->getName()] = $item->getCount();
            }
            if (isset($productsTotal[$item->getName()])) {
                $productsTotal[$item->getName()] += $item->getCount() * $item->getPrice();
            } else {
                $productsTotal[$item->getName()] = $item->getCount() * $item->getPrice();
            }
        }

        foreach ($productsTotal as $key => $value) {
            $productsStr .= $key . ': Количество = ' . $productsCount[$key] . ', Цена = ' . $value/$productsCount[$key] . ', Итого = ' . $value . PHP_EOL;
        }

        return $productsStr;
    }
}