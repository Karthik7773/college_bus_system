<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Route Dispay</title>
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
    <a href="rinsert.php"><button type="button" class="btn btn-primary btn-lg btn-block "> Insertion Of New Route Details</button></a><br><br>
    </div>
    <div class="col-lg-12">
        <br>
        <h2 class="text-warning text-center"> Route Details</h2>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <tr class="text-center">
                <th>Route id</th>
                <th>Bus_id</th>
                <th>Stops</th>
                <th>Arrival time</th>
                <th>Distance</th>
                <th>Amount</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
    <?php
           require_once "config.php";  
  
            $sql="select * from route";

            $query=mysqli_query($link,$sql);
            
            while($res=mysqli_fetch_array($query)){
    ?>
            <tr class="text-center">
                <td> <?php echo $res['id'];  ?></td>
                <td> <?php echo $res['bus_id'];  ?></td>
                <td> <?php echo $res['stops'];  ?></td>
                <td> <?php echo $res['time'];  ?></td>
                <td> <?php echo $res['distance'];  ?></td>
                <td> <?php echo $res['amount'];  ?></td>
                <td><a href="routeupdate.php?id=<?php echo $res['id'];?>" class="btn btn-info" role="button">Update</a></td>
                <td><a href="rdelete.php?id=<?php echo $res['id'];?>"  class="btn btn-danger"  role="button">Delete</a></td>
            </tr> </tr>
            <?php
            }
            ?>
        </table>
    </div>
    </div>  
</body>
</html>