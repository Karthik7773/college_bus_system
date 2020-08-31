<?php
   
   require_once "config.php";

      if(isset($_POST['done'])){
       
           $id=$_GET['id'];

           $username=$_POST['username'];
           $usn=$_POST['usn'];
           $location=$_POST['location'];

       //   $q="UPDATE user_regg SET bus_id='$bus_id',stops='$stops',time= '$time',distance='$distance',amount='$amount' WHERE id=$id";
         
         $q="UPDATE user_regg SET username='$username',usn= '$usn',location='$location' WHERE id=$id";

         $query=mysqli_query($link,$q);

        header('location:udispaly.php');

   } 

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>User updation</title>
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
                    
                <input type="hidden" name="id" class="form-control">    

                <label>Username:</label>
                <input type="text" name="username" class="form-control">
    
                <label>USN:</label>
                <input type="text" name="usn" class="form-control">
                      
                <label>Location:</label>
                <input type="text" name="location" class="form-control"><br><br>
            
                <div class="form-group">
                <input type="submit"  name="done" class="btn btn-primary" value="Submit">
                </div>

                <a href="udisplay.php">back</a>
        </form>
    </div>
</body>
</html>