<?php
class Product {
    public $name;
    public $price;
    public $description;
    public $image;

    public function __construct($name, $price, $description, $image) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    public function uploadImage($imgPath) {
        $this->image = $imgPath;
        echo "Image uploaded: " . $this->image . "<br>";
    }

    public function calcPrice() {
        return $this->price;
    }
}

class Book extends Product {
    private $publishers = [];
    public $writer;
    public $color;
    public $supplier;

    public function __construct($name, $price, $description, $image, $writer, $color, $supplier) {
        parent::__construct($name, $price, $description, $image);
        $this->writer = $writer;
        $this->color = $color;
        $this->supplier = $supplier;
    }

    public function setPublisher($publisher) {
        $this->publishers[] = $publisher;
    }

    public function choosePublisher($index) {
        if (isset($this->publishers[$index])) {
            return $this->publishers[$index];
        }
        return "Publisher not found!";
    }

    public function showAllPublishers() {
        foreach ($this->publishers as $pub) {
            echo $pub . "<br>";
        }
    }
}
class BabyCar extends Product {
    public $age;
    public $weight;
    private $materials = [];
    private $specialTax;

    public function __construct($name, $price, $description, $image, $age, $weight, $specialTax) {
        parent::__construct($name, $price, $description, $image);
        $this->age = $age;
        $this->weight = $weight;
        $this->specialTax = $specialTax;
    }

    public function setMaterial($mat) {
        $this->materials[] = $mat;
    }

    public function displayMaterials() {
        foreach ($this->materials as $mat) {
            echo $mat . "<br>";
        }
    }

    public function getFinalPrice() {
        return $this->price + ($this->price * $this->specialTax);
    }
}
//-------------------------------

// Book
$book1 = new Book("OOP Basics", 150, "PHP basics", "php.jpg", "John Doe", "Blue", "ABC Supplier");
$book1->setPublisher("Dar El Shorouk");
$book1->setPublisher("El Nada");
echo "Book Publishers: <br>";
$book1->showAllPublishers();
echo "Chosen Publisher: " . $book1->choosePublisher(1) . "<br><br>";

// BabyCar
$car1 = new BabyCar("Mini Car", 500, "Kids toy car", "car.jpg", 3, 7, 0.11);
$car1->setMaterial("Plastic");
$car1->setMaterial("Metal");
echo "Materials for BabyCar:<br>";
$car1->displayMaterials();
echo "Final Price (with tax): " . $car1->getFinalPrice() . "<br>";

?>