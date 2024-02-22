<?php
require_once dirname(__FILE__) . '/header.php';
require_once(dirname(__FILE__) . '/../models/Product.php');

$productId = $_GET['product-id'];
$product = Product::getProduct($productId);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du produit avec style</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h3 {
            color: #333;
            text-align: center;
        }
        p {
            color: #666;
            margin-bottom: 10px;
        }
        form {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        select {
            padding: 5px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h3><?php echo $product->getName() ?></h3>
<p>Description : <?php echo $product->getDescription() ?></p>
<p>Prix : <?php echo $product->getPrice() ?>€</p>
<p>Image : <?php echo $product->getImg() ?></p>

<form action="../handlers/createOrder.php" method="post">
    <div>
        <label for="quantity">Quantité :</label>
        <select name="quantity" id="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
    <button type="submit">Commander</button>
</form>

</body>
</html>
