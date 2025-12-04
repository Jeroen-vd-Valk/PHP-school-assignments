<?php

/** @var \App\ViewModels\ProductViewModel $vm */

?>

<?php require __DIR__ . "/../partials/productHeader.php" ?>


<h2><?php echo htmlspecialchars($product->title, ENT_QUOTES, 'UTF-8'); ?></h2>


<?php require __DIR__ . "/../partials/productFooter.php" ?>