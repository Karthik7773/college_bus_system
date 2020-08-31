<?php
   
   require_once "config.php";

      if(isset($_POST['done'])){
       
        $id=$_GET['id'];

        $bus_id=$_POST['bus_id'];
        $stops=$_POST['stops']; 
        $time=$_POST['time'];
        $distance=$_POST['distance'];
        $amount=$_POST['amount'];

 $q="UPDATE route SET bus_id='$bus_id',stops='$stops',time= '$time',distance='$distance',amount='$amount' WHERE id=$id";
         
         $query=mysqli_query($link,$q);

         header('location:rdispaly.php');

   } 
   
?>


<!DOCTYPE html>
<html>
<head>
    <title>Route Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; text-align:center;}
    </style>
    
   </head>
<body><center>

<div class="wrapper">
<h2>Route update</h2> 

        <form method="POST"> 
                    
                <input type="hidden" name="id" class="form-control"  required>    

                <label>Bus_id:</label>
                <input type="text" name="bus_id" class="form-control"  required>
    
                <label>Stops:</label>
                <input type="text" name="stops" class="form-control"  required>
                      
                <label>Time:</label>
                <input type="text" name="time" class="form-control"  required>

                <label>Distance:</label>
                <input type="text" name="distance" class="form-control"  required>

                <label>Amount:</label>
                <input type="text" name="amount" class="form-control"  required><br><br>
            
                <div class="form-group">
                <input type="submit"  name="done" class="btn btn-primary" value="Submit">
                </div>

                <a href="rdispaly.php">back</a>
        </form>
    </div>
</body>
</html>