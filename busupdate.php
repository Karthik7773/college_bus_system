<?php
   
  require_once "config.php";

      if(isset($_POST['done'])){
       
           $id=$_GET['id'];

           $driver_id=$_POST['driver_id'];
           $bus_no=$_POST['bus_no'];
           $destination=$_POST['destination'];

          $q="UPDATE bus SET driver_id='$driver_id',bus_no='$bus_no',destination='$destination' WHERE id=$id";
         
         $query=mysqli_query($link,$q);

         header('location:bdisplay.php');

   } 

    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Insertion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; text-align:center;}
    </style>
    
   </head>
<body><center>

<div class="wrapper">
<h2>Bus update</h2> 

        <form method="POST"> 
                    
                <input type="hidden" name="id" class="form-control">    

                <label>Driver_id:</label>
                <input type="text" name="driver_id" class="form-control"  required>
    
                <label>Bus Number:</label>
                <input type="text" name="bus_no" class="form-control"  required>
                      
                <label>Destionation:</label>
                <input type="text" name="destination" class="form-control" required ><br><br>
            
                <div class="form-group">
                <input type="submit"  name="done" class="btn btn-primary" value="Submit">
                </div>

                <a href="bdisplay.php">back</a>
        </form>
    </div>
</body>
</html>
