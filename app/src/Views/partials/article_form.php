<?php

use App\Models\ArticleModel;

/** @var ArticleModel|null $article */

$isUpdate = isset($article) && $article !== null;
$formAction = $isUpdate ? "/articles/{$article->id}" : "/articles";
?>

<article class="card w-75 mx-auto">
    <h2> <?= $isUpdate ? 'Update Article' : 'Create Article' ?></h2>

    <form method="POST" action="<?= htmlspecialchars($formAction) ?>" class="needs-validation mb-4">
        <input type="hidden" id="id" name="id" value="<?= $isUpdate ? htmlspecialchars($article->id) : '' ?>" />

        <div class="row">
            <div class="col mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="<?= $isUpdate ? htmlspecialchars($article->title) : '' ?>" required>
                <div class="invalid-feedback">
                    Please provide a title.
                </div>
            </div>

            <div class="col mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author"
                    value="<?= $isUpdate ? htmlspecialchars($article->author) : '' ?>" required>
                <div class="invalid-feedback">
                    Please provide an author.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="textarea" class="form-control" id="content" name="content" rows="16" required><?= $isUpdate ? htmlspecialchars($article->content) : '' ?></textarea>
            <div class="invalid-feedback">
                Please provide content.
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary mt-3 align-self-end">Submit</button>
        </div>
    </form>
</article>