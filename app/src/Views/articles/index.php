<?php

use App\ViewModels\ArticlesViewModel;

/** @var ArticlesViewModel $vm */

?>

<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="row justify-content-around p-0 m-0">
    <section class="row justify-content-between p-0 mx-0 mb-4 rounded bg-light">
        <h2 class="col-4">Dashboard</h2>

        <a href="/articles/add" class="col-1 mx-3 btn btn-sm btn-outline-primary align-self-center">Add</a>
    </section>



    <?php
    foreach ($vm->articles as $article) {
        require __DIR__ . '/../partials/article.php';
    } ?>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>