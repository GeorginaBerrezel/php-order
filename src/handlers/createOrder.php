<?php
session_start();
require_once dirname(__FILE__) . '/../models/Order.php';

if (!empty($_POST["product_id"])) {
    $order = new Order();
    $result= $order
        ->setUserId(filter_var($_SESSION['user_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
        ->setProductId(filter_var($_POST['product_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
        ->setQuantity(filter_var($_POST['quantity'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
        ->setOrderDate()
        ->save();
    header("Location: /parts/orderList.php");
}