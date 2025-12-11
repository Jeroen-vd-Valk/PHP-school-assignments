<?php

/** @var \App\Models\ArticleModel $article */

?>

<article class="card mb-4 mx-2 p-0 col-5">
    <header class="card-header">
        <h2 class="card-title">
            <a href="/articles/view/<?= $article->id; ?>" class="text-decoration-none">
                <?= htmlspecialchars($article->title); ?>
            </a>
        </h2>

        <p class="text-muted mb-2">
            By <strong> <?= htmlspecialchars($article->author); ?></strong>
            <span class="mx-2">&middot; </span>
            <small> <?= htmlspecialchars($article->datetime); ?></small>
        </p>
    </header>
    <section class="card-body">
        <div class="card-text article-content">
            <?= nl2br(htmlspecialchars($article->content)); ?>
        </div>
    </section>

    <footer class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-muted">Article ID: <?= $article->id; ?></small>

        <div>
            <a href="/articles/update/<?= $article->id; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
            <form method="POST" action="/articles/delete/<?= $article->id; ?>" class="d-inline ms-2"
                onsubmit="return confirm('Are you sure you want to delete this article?') ;">
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        </div>
    </footer>
</article>