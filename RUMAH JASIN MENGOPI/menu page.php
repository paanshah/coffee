<?php
$products = [
    "coffee" => [
        ["name" => "Kopi Suria", "cold_price" => "RM6.00", "hot_price" => "RM5.00", "img" => "images/coffee1.jpg"],
        ["name" => "Mocha Nuansa", "cold_price" => "RM7.00", "hot_price" => "RM6.00", "img" => "images/coffee2.jpg"],
        ["name" => "Coklat Rembulan", "cold_price" => "RM6.00", "hot_price" => "RM5.00", "img" => "images/coffee3.jpg"],
        ["name" => "Matcha Prima", "cold_price" => "RM7.00", "hot_price" => "RM6.00", "img" => "images/coffee4.jpg"],
    ],
    "pastries" => [
        ["name" => "Croissant Lembut", "cold_price" => "RM4.00", "hot_price" => "-", "img" => "images/pastries1.jpg"],
        ["name" => "Donat Gula", "cold_price" => "RM3.50", "hot_price" => "-", "img" => "images/pastries2.jpg"]
    ],
    "merchandise" => [
        ["name" => "Coffee Mug", "cold_price" => "RM12.00", "hot_price" => "-", "img" => "images/merch1.jpg"],
        ["name" => "Tote Bag", "cold_price" => "RM18.00", "hot_price" => "-", "img" => "images/merch2.jpg"]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rumah Jasin Mengopi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>RUMAH JASIN MENGOPI</h1>
        <div class="nav-buttons">
            <button class="tab-btn active" onclick="showCategory('coffee')">COFFEE</button>
            <button class="tab-btn" onclick="showCategory('pastries')">PASTRIES</button>
            <button class="tab-btn" onclick="showCategory('merchandise')">MERCHANDISE</button>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search..." id="searchInput" onkeyup="filterCards()">
        </div>
    </div>

    <div class="container">
        <?php foreach ($products as $category => $items): ?>
            <div class="product-grid" id="<?= $category ?>" style="<?= $category !== 'coffee' ? 'display:none;' : '' ?>">
                <?php foreach ($items as $product): ?>
                    <div class="card">
                        <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                        <h3 class="product-name"><?= $product['name'] ?></h3>
                        <label><input type="radio" name="<?= $product['name'] ?>_temp"> COLD <?= $product['cold_price'] ?></label><br>
                        <?php if ($product['hot_price'] !== "-"): ?>
                            <label><input type="radio" name="<?= $product['name'] ?>_temp"> HOT <?= $product['hot_price'] ?></label>
                        <?php endif; ?>
                        <div class="qty">
                            <button onclick="adjustQty(this, -1)">-</button>
                            <input type="text" value="0">
                            <button onclick="adjustQty(this, 1)">+</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="arrow-controls">
        <button onclick="nextCategory()">➡️</button>
    </div>

    <script src="script.js"></script>
</body>
</html>
