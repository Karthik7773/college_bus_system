<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Dispay</title>
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
    <a href="businsert.php"><button type="button" class="btn btn-primary btn-lg btn-block "> Insertion Of New Bus Details</button></a><br><br>
    </div>
   
    <div class="col-lg-12">
        <br>
        <h2 class="text-warning text-center"> Bus Details</h2>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <tr class="text-center">
            <th>Bus id</th>
                <th>driver_id</th>
                <th>bus number</th>
                <th>Destionation</th>
                <th>Update</th>
            </tr>
    <?php
           require_once "config.php";  
  
            $sql="select * from bus";

            $query=mysqli_query($link,$sql);
            
            while($res=mysqli_fetch_array($query)){
    ?>
            <tr class="text-center">
                <td> <?php echo $res['id'];  ?></td>
                <td> <?php echo $res['driver_id'];  ?></td>
                <td> <?php echo $res['bus_no'];  ?></td>
                <td> <?php echo $res['destination'];  ?></td>
                <td><a href="busupdate.php?id=<?php echo $res['id'];?>" class="btn btn-info" role="button">Update</a></td>
              </tr>
            <?php
            }
            ?>
        </table>
    </div>
    </div>  
</body>
</html>