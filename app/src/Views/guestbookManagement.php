<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body class="d-flex flex-column h-100">
    <div class="container-lg py-4 flex-shrink-0">
        <?php if (!empty($posts)) { ?>
            <h1> Guestbook Management</h1>
            <a href="/guestbook" class="btn btn-sm btn-primary mb-3">Back to overview</a>
            <?php foreach ($posts as $post) { ?>
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <ul class="list-group">
                        <li class="list-group-item card-header">
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <h4> <?= $post['name']; ?></h4>

                                <div class="d-flex flex-row">
                                    <a href="/guestbook/edit/<?= $post['id'] ?>" class="btn btn-sm btn-primary mx-1">Edit item</a>

                                    <form action="/guestbook/delete" method="post">
                                        <button type="submit" name="id" value="<?= $post['id'] ?>" class="btn btn-sm btn-danger mx-1">Remove item</a>
                                    </form>
                                </div>

                            </div>
                        </li>
                        <li class="list-group-item border-0">
                            <?= nl2br($post['message']); ?>
                        </li>
                        <li class="list-group-item card-footer text-muted">
                            <?= $post['posted_at']; ?>
                        </li>
                    </ul>
                </div>
                <br />
            <?php } ?>
        <?php } else { ?>
            <p> No entries found</p>
        <?php } ?>
    </div>
</body>

</html>