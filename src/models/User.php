<?php
require_once dirname(__FILE__) . '/../config/db.php';

class User
{
    private $id;
    private $name;
    private $email;

    public function __construct($name = null)
    {
        if (!empty($name)) {
            $this->setName($name);
        }
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        if (strlen($name) < 2) {
            throw new Exception("Nom trop court.");
        }
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public static function getList()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $stmt = $dbh->prepare("SELECT id, name FROM user");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function toString() {
        return "(User) id: '$this->id', name: '$this->name', email: '$this->email'";
    }

    public static function get($user_id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("SELECT id, name FROM user WHERE id = :user_id");
            $stmt->bindParam(':user_id', $user_id);

            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }
}
