<?php
require_once dirname(__FILE__) . '/header.php';
require_once(dirname(__FILE__) . '/../models/Product.php');

$products = Product::getListProduct();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les produits avec style</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        #product-section {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            margin-top: 20px;
        }
        .product-article {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
        }
        .product-article h3 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        .product-article a {
            text-decoration: none;
            color: #333;
        }
        .product-article a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>

<h1>Les produits</h1>

<section id="product-section">
    <?php if (empty($products)) : ?>
        <small>Aucun produit pour l'instant</small>
    <?php else : ?>
        <?php foreach ($products as $product): ?>
            <a href="./productDetail.php?product-id=<?php echo $product['id'] ?>">
                <article class="product-article">
                    <h3><?php echo $product['name'] ?></h3>
                </article>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

</body>
</html>
