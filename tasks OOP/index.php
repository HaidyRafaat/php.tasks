<?php

class Product {
    public $name;
    public $price;
    public $brand;
    public $image;
    public $description;
    public $tax;
    public $priceAfterdiscount;

    function get_name(){
        echo "product name" . $this->name ."<br>";
    }
    function priceAfterdiscount(){
        $this->priceAfterdiscount = $this->price - ($this->price * 0.10 );
        echo "price is" . $this->priceAfterdiscount ."<br>" ;
    }
    function getFinalprice(){

        echo "Final price is" . ($this->priceAfterdiscount + $this->tax) ."<br>" ."<br>";
    }

}
$pro1 = new Product();
$pro1->name ="lolo";
$pro1->price ="10";
$pro1->brand ="ddd";
$pro1->tax ="20";
$pro1->get_name();
$pro1->priceAfterdiscount();
$pro1->getFinalprice();

$pro2 = new Product();
$pro2->name ="gogo";
$pro2->price ="20";
$pro2->brand ="ddd";
$pro2->tax ="50";
$pro2->get_name();
$pro2->priceAfterdiscount();
$pro2->getFinalprice();

$pro3 = new Product();
$pro3->name ="koko";
$pro3->price ="40";
$pro3->brand ="ddd";
$pro3->tax ="90";
$pro3->get_name();
$pro3->priceAfterdiscount();
$pro3->getFinalprice();