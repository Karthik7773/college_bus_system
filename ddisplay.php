<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Driver Dispay</title>
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
    <div class="button">
    <a href="driverinsert.php"><button type="button" class="btn btn-primary btn-lg btn-block "> Insertion Of New Driver Details</button></a><br><br>
    </div>
    <div class="col-lg-12">
        <br>
        <h2 class="text-warning text-center"> Driver Details</h2>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <tr class="text-center">
            <th>Driver_id</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Update</th>
            </tr>
    <?php
           require_once "config.php";  
  
            $sql="select * from driver";

            $query=mysqli_query($link,$sql);

            while($res=mysqli_fetch_array($query)){
    ?>
            <tr class="text-center">
                <td> <?php echo $res['id'];  ?></td>
                <td> <?php echo $res['name'];  ?></td>
                <td> <?php echo $res['contact'];  ?></td>
                <td> <?php echo $res['email'];  ?></td>
                <td> <?php echo $res['address'];  ?></td>
                <td><a href="driverupdate.php?id=<?php echo $res['id'];?>" class="btn btn-info" role="button">Update</a></td>
<!--   <div>
                   <button type="button" class="btn btn-primary "> <a href="driverupdate.php">Update</a></button>
                </div>
                </td>-->

              </tr>
            <?php
            }
            ?>
        </table>
    </div>
    </div>  
</body>
</html>