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
            <div class="d-flex justify-content-between align-items-center">
                <h1> Guestbook Entries</h1>
                <a href="/login" class="btn btn-sm btn-primary">To login</a>
            </div>
            <?php if (!empty($_SESSION["user"])) { ?>
                <a href="/guestbook/management" class="btn btn-sm btn-primary mb-3">Manage posts</a>
            <?php }
            if (!empty($_SESSION['error'])) {
                echo $_SESSION['error'] . "<br/>";
                unset($_SESSION["error"]);
            } ?>
            <?php foreach ($posts as $post) { ?>
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <ul class="list-group">
                        <li class="list-group-item card-header">
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <h4> <?= $post['name']; ?></h4>

                                <a href="/guestbook/details/<?= $post['id'] ?>" class="btn btn-sm btn-primary mx-1">View details</a>
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

        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <form action="/guestbook" method="post">
                <h3 class="card-header">Add a message</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col m-3">
                            <label class="form-label fw-bold" for="Name">Name</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Enter name here" required>
                        </div>

                        <div class="col m-3">
                            <label class="form-label fw-bold" for="email">email (Optional)</label>
                            <input class="form-control" type="email" id="emial" name="email" placeholder="Enter email here">
                        </div>
                    </div>

                    <div class="m-3">
                        <label class="form-label fw-bold" for="Message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter message here" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary m-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>