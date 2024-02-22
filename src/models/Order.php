<?php
require_once dirname(__FILE__) . '/../config/db.php';

class Order
{
    private $id;
    private $user_id;
    private $product_id;
    private $quantity;
    private $order_date;

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

    public function setUserId($user_id) {
        $this->user_id = $user_id;
        return $this;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
        return $this;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setOrderDate() {
        $this->order_date = new DateTime('now');
        return $this;
    }

    public function getOrderDate()
    {
        return $this->order_date;
    }

    public function toString() {
        return "Order id: '$this->id', User id: '$this->user_id', product id: '$this->product_id', order date: '$this->order_date'";
    }



    // Fonction qui récupère les commandes d'un user
    public static function getListOrderUser($user_id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);
        $stmt = $dbh->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $resultArray = $stmt->fetchAll();
        return array_map(function ($item) {
            return $item;
        }, $resultArray);
    }

    // Fonction qui récupère une commande à partir de son id
    public static function getOrder($id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("SELECT * FROM orders WHERE id = :id");
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }

    // Fonction qui enregistre une nouvelle commande
    public function save()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);
        $oder_dater = $this->order_date->format('Y-m-d H:i:s');

        $stmt = $dbh->prepare("INSERT INTO orders (user_id, product_id, quantity, order_date) VALUES (:user_id, :product_id, :quantity, :order_date)");
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':product_id', $this->product_id);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':order_date', $oder_dater);

        return $stmt->execute();
    }
}