<?php
require_once dirname(__FILE__) . '/../config/db.php';

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $img;

    public function __construct()
    {
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function toString() {
        return "Product id: '$this->id', name: '$this->name', description: '$this->description', price: '$this->price'";
    }

    public static function getListProduct()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);
        $stmt = $dbh->prepare("SELECT * FROM product");
        $stmt->execute();
        $resultArray = $stmt->fetchAll();
        return array_map(function ($item) {
            return $item;
        }, $resultArray);
    }

    public static function getProduct($id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("SELECT * FROM product WHERE id = :id");
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }
}