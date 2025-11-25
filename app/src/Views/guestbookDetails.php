<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body class="d-flex flex-column h-100">
    <div class="container-lg py-4 flex-shrink-0">
        <h1> Guestbook Entries</h1>
        <a href="/guestbook" class="btn btn-sm btn-primary mb-3">Back to overview</a>
        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <ul class="list-group">
                <li class="list-group-item card-header">
                    <h4> <?= $post['name']; ?></h4>
                </li>
                <li class="list-group-item border-0">
                    Email address: <?= $post['email'] ?>
                </li>
                <li class="list-group-item border-0">
                    <?= nl2br($post['message']); ?>
                </li>
                <li class="list-group-item card-footer text-muted">
                    <span>Message id: <?= $post['id']; ?> </span> <br />
                    <?= $post['posted_at']; ?>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>