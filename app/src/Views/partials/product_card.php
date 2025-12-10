<?php

/** @var \App\Models\ProductModel $product */
?>

<li class="card shadow-lg p-0 my-3 col-md-3">
    <img src="<?= $product->image ?>" class="card-img-top" />
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
            <p class="badge text-bg-secondary"><?= $product->category ?></p>
            <h5 class="text-primary fw-bold">&euro; <?= $product->price ?></h5>
        </div>
        <h2 class="card-title"><?= htmlspecialchars($product->title, ENT_QUOTES, 'UTF-8'); ?></h2>
        <p class="card-text"> <?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="d-flex flex-row">
            <p class="text-warning me-1"> <?= $product->ratingRate ?></p>
            <p class="text-body-secondary"> (<?= $product->ratingCount ?> reviews)</p>
        </div>
        <a href="<?= $product->id ?>" class="btn btn-primary w-100">Details</a>
    </div>
</li>