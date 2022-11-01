<?php
class Product {
    protected string $name;
    protected float $startPrice;
    protected int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name=$name;
        $this->amount=$amount;
        $this->startPrice=$startPrice;
    }
    public function printProduct() :void{
        echo $this->name . ', ' . $this->startPrice . 'EUR, ' .$this->amount . " units\n";
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param float $startPrice
     */
    public function setStartPrice(float $startPrice): void
    {
        $this->startPrice = $startPrice;
    }
}

$products[] = new Product('Logitech mouse', 70.00, 14);
$products[] = new Product('iPhone 5',999.99,3);
$products[] = new Product("Epson EB-U05",440.46,1);

foreach ($products as $product){
    $product->printProduct();
}

echo PHP_EOL;
$products[0]->setStartPrice(71);
$products[1]->setAmount(20);

foreach ($products as $product){
    $product->printProduct();
}

