<?php
$_conn = mysqli_connect('localhost', 'root', '', 'php1');

if(isset($_GET['deleteid'])){

    $deleteid=$_GET['deleteid'];

    $sql="DELETE FROM student WHERE id=$deleteid";

    if(mysqli_query($_conn,$sql)==true){
        header('location:view.php');
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
            <div class="col-sm-1">

            </div>
            <div class="col-sm-10  pt-4 mt-4 border border-success">
                <h2 class="text-center p-2 m-2 bg-success">User From</h2>
                <?php
                $sql="SELECT * FROM student";
                $query=mysqli_query($_conn,$sql);

                echo "<table class='table table success'>
                
          
                    <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    </tr>";
                    while($_data=mysqli_fetch_assoc($query)){
                        $id=$_data['id'];
                        $firstname=$_data['firstname'];
                        $lastname=$_data['lastname'];
                        $email=$_data['email'];
                        echo "<tr>
                            <td>$id</td>
                            <td>$firstname</td>
                            <td>$lastname</td>
                            <td>$email</td>
                            <td><span class='btn btn-success'><a href='edit.php?id=$id'>Edit</a></span></td>
                            <td><span class='btn btn-danger'><a href='view.php?deleteid=$id'>Delete</a></span></td>
                        
                        </tr>";
                    }
                
                ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>