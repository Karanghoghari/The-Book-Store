<?php
//Create connection...

$servername = "localhost";
$username = "root";
$password = "";
$database = "CRUD";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo "Connection failed...!" . mysqli_error($conn);
}

$insert = false;

// Insert the Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql = "INSERT INTO `CRUDdata` (`Title`, `Description`) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $insert = true;
    } else {
        echo "failed to add Notes!";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/CRUD/32_CRUD.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/CRUD/32_CRUD2_Delete.php">Delete</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/CRUD/32_CRUD.php">ContactUs</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?php

    if ($insert) {
        echo "<div class='alert alert-success' role='alert'>
            The Note has been inserted successfully!
            </div>";
    }
    ?>

    <div class="container mt-4">
        <form action="/CRUD/32_CRUD.php" method="post">
            <h3 style="color: #545452; font-weight: normal">Add the book</h3>
            <div class="mb-3 mt-3">

                <label for="title" class="form-label">Add Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descriptions</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        <div class="container mt-4 mb-3">
            <table class="table mt-4" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Descriptions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM `CRUDdata`";
                    $result = mysqli_query($conn, $sql);
                    $num = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $num + 1;
                        echo "<tr>
                        <th scope='row'>" . $num . "</th>
                        <td>" . $row['Title'] . "</td>
                        <td>" . $row['Description'] . "</td>
                        <td><a href='/CRUD/32_CRUD2_Update.php' id='Up' name='Up' class='btn btn-primary'>Update</a> &nbsp &nbsp<a href='/CRUD/32_CRUD2_Delete.php' id='Up' name='Dl' class='btn btn-primary'>Delete</a></td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>


</body>

</html>