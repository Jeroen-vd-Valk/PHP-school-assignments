<?php

use App\ViewModels\ArticleViewModel;

/** @var ArticleViewModel $article */

?>

<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="row justify-content-between p-5">
    <section class="row justify-content-between p-0 mx-0 mb-4 rounded bg-light">
        <a href="/articles" class="col-1 mx-3 btn btn-sm btn-outline-primary align-self-center">Go back</a>

        <h2 class="col text-center">Article details</h2>

        <a href="/articles/add" class="col-1 mx-3 btn btn-sm btn-outline-primary align-self-center">Add</a>
    </section>

    <?php require __DIR__ . '/../partials/article.php'; ?>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>