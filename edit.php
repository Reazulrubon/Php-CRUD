<?php
$_conn = mysqli_connect('localhost', 'root', '', 'php1');

if (isset($_GET['id'])) {
    $getid = $_GET['id'];
    $sql = "SELECT * FROM student WHERE id=$getid";
    $query = mysqli_query($_conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $id = $data['id']; // Ensure the column name matches your database schema
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $email = $data['email'];
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $sql1 = "UPDATE student SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id='$id'";

    if (mysqli_query($_conn, $sql1) === TRUE) {
        header('Location: view.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($_conn);
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
            <div class="col-sm-6 pt-4 mt-4 border border-success">
                <h1>Registration Form</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    FIRST NAME:<br><br>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
                    LAST NAME:<br><br>
                    <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
                    Email:<br><br>
                    <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
                    <input type="submit" value="Edit" name="edit" class="btn btn-success">
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
