<?php

/** @var \App\ViewModels\ProductsViewModel $vm */

?>

<?php require __DIR__ . "/../partials/productHeader.php" ?>


<ul>
    <?php foreach ($vm->products as $product) { ?>
        <li>
            <h2><?php echo htmlspecialchars($product->title, ENT_QUOTES, 'UTF-8'); ?></h2>
        </li>
    <?php } ?>
</ul>

<?php require __DIR__ . "/../partials/productFooter.php" ?>