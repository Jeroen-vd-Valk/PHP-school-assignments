<!-- NOTE - for demo/exercise purposes only. For the assignment, use routing!!! -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add script link here -->
    <title>JS Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm">
        <h1 class="mt-5">TODO App</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Add item</div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="todoText" class="form-label">Description:</label>
                                <textarea class="form-control" placeholder="Enter your TODO item here"
                                    id="todoText"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="addItem();">
                                Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mt-5">TODO Items</h2>
        <div class="row" id="itemList">
            <!-- placeholder card start -->
            <div class="col-md-6 col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
                            qui reprehenderit quia fugiat. Enim accusantium excepturi error
                            dicta! Sint voluptate laboriosam architecto est facere quam corporis
                            quos non minima enim.
                        </p>
                    </div>
                </div>
            </div>
            <!-- placeholder card end -->
        </div>
    </div>
    <script src="/assets/js/todo.js"></script>
</body>

</html>