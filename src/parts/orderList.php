<?php
require_once dirname(__FILE__) . '/header.php';
require_once(dirname(__FILE__) . '/../models/Order.php');
require_once(dirname(__FILE__) . '/../models/Product.php');
$orders = Order::getListOrderUser($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes commandes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        #order-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }
        .order-article {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
            width: 45%;
        }
        .order-article h3 {
            color: #007bff;
            margin-bottom: 10px;
        }
        .order-article p {
            margin-bottom: 5px;
        }
        .order-article a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Mes commandes</h1>

<section id="order-section">
    <?php if (empty($orders)) : ?>
        <small>Aucune commande pour l'instant</small>
    <?php else : ?>
        <?php foreach ($orders as $order): ?>
            <article class="order-article">
                <h3>Commande <?php echo $order['id'] ?></h3>
                <p><a href="./productDetail.php?product-id=<?php echo $order['product_id'] ?>">Produit <?php
                        echo Product::getProduct
                        ($order['product_id'])
                            ->getName() ?></a>
                    - Quantité <?php echo $order['quantity'] ?>
                    - Prix total <?php echo $order['quantity'] * Product::getProduct($order['product_id'])->getPrice
                        () ?>€
                </p>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

</body>
</html>
