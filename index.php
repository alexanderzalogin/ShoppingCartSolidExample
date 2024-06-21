<?php

	interface IItem {
	}
	
	class Item implements IItem {
		private $price;
		private $brand;
		private $name;
		private $count = 0;

		public function setPrice($price) {
			$this->price = $price;
		}
		public function getPrice() {
			return $this->price;
		}
		public function setBrand($brand) {
			$this->brand = $brand;
		}
		public function getBrand() {
			return $this->brand;
		}
		public function setName($name) {
			$this->name = $name;
		}
		public function getName() {
			return $this->name;
		}
		public function setCount($count) {
			$this->count = $count;
		}
		public function getCount() {
			return $this->count;
		}
	}
	
	class Tv extends Item {
		private $dg;
		
		public function __constructor() {
			$this->name = 'Телевизор';
		}
		public function setDg($dg) {
			$this->dg = $dg;
		}
		public function getDg() {
			return $this->dg;
		}
		
	}
	class Phone extends Tv{
		public function __constructor() {
			$this->name = 'Телефон';
		}
	}
	class Pan extends Item {
		private $dm;
		public function __constructor() {
			$this->name = 'Сковородка';
		}
		public function setDm($dm) {
			$this->dm = $dm;
		}
		public function getDm() {
			return $this->dm;
		}
	}
	
	interface ICalc
	{
		public static function getInstance();
	}
	
	trait CalcTrait
	{
		private static $instances = [];
		private $items = [];

		public static function getInstance()
		{
			$self = static::class;
			if (!isset(self::$instances[$self])) {
				self::$instances[$self] = new $self;
			}
			return self::$instances[$self];
		}

		
		protected static function hasInstance()
		{
			$self = static::class;
			return isset(self::$instances[$self]);
		}
		
		
	}
	
	class Calc implements ICalc
	{
		use CalcTrait;
		use CartTrait;
		
		private $calc;
		
		
		private function __constructor() {
		}
		
		public function getTotalAmount() {
			$items = $this->getItems();
			$tvs = 0;
			$phones = 0;
			$pans = 0;
            $count = 0;
			$tv = [];
			$phone = [];
			$pan = [];
            $products = [];
			$tvStr = '';
			$phoneStr = '';
			$panStr = '';
            $productsStr = '';

			foreach($items as $item) {
                $count++;
                $item->setCount($count);
                $products[] = [$item->getCount(), $item->getPrice(), $item->getBrand()];
			}
			foreach ($products as $product) {
				$productsStr = $product[2] . ': Количество = ' . $product[0] . ', цена = ' . $product[0]*$product[1] . PHP_EOL;
			}

			return $productsStr;
		}
	}
	
	trait CartTrait {
		private $items = [];
		private $item;
		public function addItem(Item $item) {
			$this->items[] = $item;
		}
		public function getItems() {
			return $this->items;
		}
	}
	
	$calc = Calc::getInstance();
	$tv = new Tv();
	$phone = new Phone();
	$pan = new Pan();
	$tv->setPrice(5000);
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
	$tv = new Tv();
	$phone = new Phone();
	$pan = new Pan();
	$tv->setPrice(5000);
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
	$pan = new Pan();
	$pan->setPrice(2000);
	$pan->setBrand('Tefal');
	$pan->setDm(22);
	$calc->addItem($pan);
	echo $calc->getTotalAmount();

//TODO refactor
//use PHPUnit\Framework\MockObject\Generator;
//use PHPUnit\Framework\TestCase;
//
//class CalcTest extends TestCase {
//
//	public function testSuccess() {
//	   $calc = Calc::getInstance();
//
//	   $input = '1 телевизоров по цене 5000
//1 телефонов по цене 12000
//2 сковородок по цене 4000
//';
//
//	   CalcClassMock::expects($input);
//	   $this->assertEquals($input, $calc->getTotalAmount());
//	}
//
//}
//class CalcClassMock
//{
//	public static function expects($input) {
//        $mock =  (new PHPUnit\Framework\MockObject\Generator)->getMock(
//			'Calc',
//			array('getTotalAmount'),
//			array(),
//			'',
//			false
//		);
//
//		$mock
//			->expects(new PHPUnit\Framework\MockObject\Rule\AnyInvokedCount(1))
//			->method('getTotalAmount')
//			->will(new PHPUnit\Framework\MockObject\Stub\ReturnStub($input));
//
//    }
//}
