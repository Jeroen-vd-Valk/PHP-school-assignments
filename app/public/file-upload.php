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
        <h1 class="pt-5">Upload Form</h1>
        <form action="/upload" method="post" enctype="multipart/form-data">
            <label>Your name:</label><br>
            <input type="text" name="name" placeholder="Full name"><br>
            <label>File:</label><br>
            <input type="file" name="fileToUpload"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>