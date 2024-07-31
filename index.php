<?php
$_conn = mysqli_connect('localhost', 'root', '', 'php1');
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $_sql = "INSERT INTO `student` (`id`, `firstname`, `lastname`, `email`) VALUES (NULL, '$firstname', '$lastname', '$email')";

    if (mysqli_query($_conn, $_sql) == true) {
        echo "ok";
        header('location:index.php');
    } else {
        echo "No";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6  pt-4 mt-4 border border-success">
                <h1>Registratiion Form</h1>
                <form action="index.php" method="POST">
                    FIRST NAME:
                    <input type="text" name="firstname"> <br><br>
                    LAST NAME:
                    <input type="text" name="lastname"><br><br>
                    Email:
                    <input type="text" name="email"><br><br>
                    <input type="submit" value="insert" name="submit" class="btn btn-success">
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>