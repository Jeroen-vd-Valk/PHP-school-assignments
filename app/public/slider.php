<!-- NOTE - for demo/exercise purposes only. For the assignment, use routing!!! -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JS Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">RGB Background Color Changer</h1>
        <div class="row mt-4">
            <div class="col-md-12">
                <!-- Red Slider -->
                <label for="redSlider" class="form-label">Red</label>
                <input type="range" class="form-range" id="redSlider" min="0" max="255">
            </div>
            <div class="col-md-12 mt-3">
                <!-- Green Slider -->
                <label for="greenSlider" class="form-label">Green</label>
                <input type="range" class="form-range" id="greenSlider" min="0" max="255">
            </div>
            <div class="col-md-12 mt-3">
                <!-- Blue Slider -->
                <label for="blueSlider" class="form-label">Blue</label>
                <input type="range" class="form-range" id="blueSlider" min="0" max="255">
            </div>
        </div>
    </div>
    <script src="/assets/js/slider.js"></script>
</body>

</html>