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

<?php
$format_valid = true;
$name = "";
$postalcode = "";
$remarks = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $postalcode = htmlspecialchars(trim($_POST['postalcode'] ?? ''));
    $language = htmlspecialchars(trim($_POST['language'] ?? ''));
    $options = $_POST['options'] ?? [];
    $remarks = htmlspecialchars(trim($_POST['remarks'] ??''));

    $postalcode_regex = '/^[1-9]{4}\s[A-z]{2}$/';
    if (preg_match(pattern: $postalcode_regex, subject: $postalcode)) {
?>
        <h2>Form Results</h2>
        <p>Name: <?php echo $name ?></p>
        <p>Postal code: <?php echo $postalcode ?></p>
        <p>Preferred language: <?php echo $language ?></p>
        <p>Extra options: <?php
                    for ($i = 0; $i < count($options); $i++){
                        if ($i === count($options)-1 ) {
                            echo "$options[$i].";
                        } else{
                            echo "$options[$i], ";
                        }
                    }
                    ?> 
        </p>
        <p>Remarks: <?php echo nl2br($remarks); ?></p>
        
<?php
        
        die();
    } else{
        $format_valid = false;
    }
}
?>
<body>
    <div class="container">
        <h1 class="pt-5">Assignment Form</h1>
        <p>Chosen language goes here: {language}</p>
        <form method="post" action="assignment-form.php">
            <label>Full name:</label><br>
            <input type="text" name="name" placeholder="Full name" value="<?php echo $name ?>"><br><br>
            <label>Postal code:</label><br>
            <input type="text" name="postalcode" placeholder="Postal code" value="<?php echo $postalcode ?>" required><p style="color:red"><?php if(!$format_valid){echo "Invalid format.";} ?></p>
            <label>Preferred language:</label><br>
            <select name="language"><br>
                <option value="EN">English</option>
                <option value="NL">Dutch</option>
                <option value="DE">German</option>
                <option value="FR">French</option>
            </select><br><br>
            <label>Extra options:</label><br>
            <input type="checkbox" name="options[]" value="Vegetarian"> Vegetarian<br>
            <input type="checkbox" name="options[]" value="Gluten free"> Gluten free<br>
            <input type="checkbox" name="options[]" value="Lactose free"> Lactose
            free<br><br>
            <label>Remarks:</label><br>
            <textarea name="remarks" id="" cols="30" rows="10" value="<?php echo $remarks ?>"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>