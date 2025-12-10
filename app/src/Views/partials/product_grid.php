<?php

/** @var \App\ViewModels\ProductsViewModel $vm */
?>

<ul class="container">
    <h2>Products</h2>
    <div class="row justify-content-around">
        <?php foreach ($vm->products as $product) { ?>
            <?php require __DIR__ . "/../partials/product_card.php" ?>

        <?php } ?>
    </div>
</ul>