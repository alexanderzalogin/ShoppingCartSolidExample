<?php

require_once ('config/Constants.php');
require_once ('src/Calc.php');
require_once ('src/models/Tv.php');
require_once ('src/models/Phone.php');
require_once ('src/models/Pan.php');

use Config\Constants;
use App\Calc;
use Tv;
use Phone;
use Pan;

$calc = Calc::getInstance();

$tv = new Tv();
$phone = new Phone();
$pan = new Pan();

$phone->setPrice(12000);
$pan->setPrice(2000);
$tv->setBrand('LG');
$phone->setBrand('Samsung');
$pan->setBrand('Tefal');
$tv->setDg(35);
$phone->setDg(6);
$pan->setDm(22);
$calc->addItem($tv);
$calc->addItem($phone);
$calc->addItem($pan);

$tv2 = new Tv();
$phone2 = new Phone();
$pan2 = new Pan();
$tv2->setPrice(5000);
$phone2->setPrice(12000);
$pan2->setPrice(2000);
$tv2->setBrand('LG');
$phone2->setBrand('Samsung');
$pan2->setBrand('Tefal');
$tv2->setDg(35);
$phone2->setDg(6);
$pan2->setDm(22);
$calc->addItem($tv2);
$calc->addItem($phone2);
$calc->addItem($pan2);
$pan = new Pan();
$pan->setPrice(2000);
$pan->setBrand('Tefal');
$pan->setDm(22);
$calc->addItem($pan);
echo $calc->getTotalAmount();


