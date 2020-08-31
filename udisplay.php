<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dispay</title>
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <style>
    .button{
    width:400px;
    height:50px;
    margin:auto;
    }
    </style>
</head>
<body>
<div class="container"><br>

<div class="col-lg-12">
<a href="hello.php" class="btn btn-success" role="button">Back</a>
</div>
    <div class="col-lg-12">
        <br>
        <h2 class="text-warning text-center"> User Details</h2>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <tr class="text-center">
                <th>id</th>
                <th>Username</th>
                <th>usn</th>
                <th>Location</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
    <?php
           require_once "config.php";  
  
            $sql="SELECT * FROM `user_regg`";

            $query=mysqli_query($link,$sql);
            
            while($res=mysqli_fetch_array($query)){
    ?>
            <tr class="text-center">
                <td> <?php echo $res['id'];  ?></td>
                <td> <?php echo $res['username'];?></td>
                <td> <?php echo $res['usn'];?></td>
                <td> <?php echo $res['location']; ?></td>
                <td><a href="userupdate.php?id=<?php echo $res['id'];?>" class="btn btn-info" role="button">Update</a></td>
                <td><a href="userdelete.php?id=<?php echo $res['id'];?>" class="btn btn-danger" role="button">Delete</a></td>
            </tr>

              </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>  
</body>
</html>