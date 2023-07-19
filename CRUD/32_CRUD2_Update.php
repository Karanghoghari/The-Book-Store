<?php
// Create a connection...

$servername = "localhost";
$username = "root";
$password = "";
$database = "CRUD";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Failed to connect with the database....!" . mysqli_error($conn));
} else {
    // echo "Connection created successfully....!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Oldtitle = $_POST['Oldtitle'];
    $Newtitle = $_POST['Newtitle'];
    $Newdescription = $_POST['Newdescription'];

    $sql = "UPDATE `CRUDdata` SET `Title`='$Newtitle', `Description`='$Newdescription' WHERE `Title`= '$Oldtitle'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div class='alert alert-success' role='alert'>
            The has been Updated successfully!
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
            The Note has not been Updated due to this error -->
            </div>" . mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
                        <a class="nav-link active" aria-current="page" href="#">ContactUs</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <form action="/CRUD/32_CRUD2_Update.php" method="post">
            <h3 style="color: #545452; font-weight: normal">Update the book</h3>
            <div class="mb-3 mt-3">
                <label for="bookname" class="form-label">Title (You want to change)</label>
                <input type="text" class="form-control" id="Oldtitle" name="Oldtitle" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Write the title of the book you want to Update.</div>
            </div>
            <div class="mb-3">
                <label for="bookname" class="form-label">Title (You want to keep)</label>
                <input type="text" class="form-control" id="Newtitle" name="Newtitle" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Write the title of the book you want to keep.</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descriptions</label>
                <textarea class="form-control" id="Newdescription" name="Newdescription" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
        </form>
    </div>
</body>

</html>