<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="pt-5">Files overview</h1>
        
        <?php
        $dir = __DIR__ . "/uploads/";

        $a = scandir($dir);

        for ($i = 2; $i < count($a); $i++) {
            echo "<a href=uploads/" . $a[$i] . ">" . $a[$i] . "</a> <br/>";
        }
        
        var_dump($a);

        ?>
    </div>
</body>

</html>