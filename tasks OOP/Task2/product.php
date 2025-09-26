<?php
class product
{
    public $name;
    public $price;
    public $description;
    public $image;
    public function __construct($name, $price, $description, $image)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }
    public function uplode_image()
    {
        return $this->image;
    }
    public function calc_price()
    {
        return $this->price;
    }
}
class Book extends product
{
    private $publishers = [];
    public $writer;
    public $color;
    public $supplier;

    public function choose_publisher()
    {
        $rand = array_rand($this->publishers);
        return $this->publishers[$rand];
    }
    public function set_publisher($publishers)
    {
        $this->publishers[] = $publishers;
    }
    public function show_all_publisher()
    {
        $list = "<ul>";
        foreach ($this->publishers as $pub) {
            $list .= "<li>" . htmlspecialchars($pub) . "</li>";
        }
        $list .= "</ul>";

        return $list;
    }
}
class Baby_Car extends product
{
    public $age;
    public $weight;
    private $material = ['plastic', 'wood', 'metal', 'fiber', 'carbon'];
    private $special_tax = 0.1;

    public function display_materials()
    {
         $list = "<ul>";
        foreach ($this->material as $mat) {
            $list .= "<li>" . htmlspecialchars($mat) . "</li>";
        }
        $list .= "</ul>";

        return $list;
    }
    public function get_final_price()
    {

        $final = $this->price + ($this->price * $this->special_tax);
        return $final;
    }
}
$book1 = new Book('The Lost Kingdom', 150, 'A fantasy story with dragons, magic, and epic adventures.', 'book.jpg');
$book1->set_publisher("Penguin Random House");
$book1->set_publisher("HarperCollins");
$book1->set_publisher("Oxford University Press");
echo "<h2>Book Info</h2>";
echo "Name: " . $book1->name . "<br>";
echo "Price: " . $book1->calc_price() . "<br>";
echo "Description: " . $book1->description . "<br>";
echo  "Image: <img src='" . $book1->uplode_image() . "' alt='book image' width='50'  height='50'> " . "<br>";

echo "Show all publishers: " . $book1->show_all_publisher() . "<br>";
echo "Random Publisher: " . $book1->choose_publisher();
//--------------------------------------------------------------------------
$car1 = new Baby_Car('Baby Car', 200, 'A strong baby car.', 'book.jpg');
echo "<h2>Baby Car Info</h2>";
echo "Name: " . $car1->name . "<br>";
echo "Price: " . $car1->calc_price() . "<br>";
echo "Description: " . $car1->description . "<br>";
echo  "Image: <img src='" . $car1->uplode_image() . "' alt='book image' width='50'  height='50'> " . "<br>";

echo "<h3>Materials:</h3>" . $car1->display_materials();
echo "special_tax: " . $car1->get_final_price() . "<br>";
