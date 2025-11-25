<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body class="d-flex flex-column h-100">
    <div class="container-lg py-4 flex-shrink-0">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-header">Login</h3>
            <a href="/guestbook" class="btn btn-sm btn-primary">To guestbook</a>
        </div>
        <br />
        <form action="/login" method="post">
            <div class="card-body">
                <?php if (!empty($_SESSION['success'])) {
                    echo $_SESSION['success'] . "<br/>";
                    unset($_SESSION["success"]);
                }
                if (!empty($_SESSION['error'])) {
                    echo $_SESSION['error'] . "<br/>";
                    unset($_SESSION["error"]);
                } ?>
                <label class="form-label fw-bold" for="Username">Username</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Enter username here" required>

                <label class="form-label fw-bold" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter password here" required>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>