<?php
   
   require_once "config.php";

      if(isset($_POST['done'])){
       
        $id=$_GET['id'];

        $name=$_POST['name'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $address=$_POST['address'];


        $q="UPDATE driver SET name='$name',contact='$contact',email='$email',address='$address' where id=$id";
         
        $query=mysqli_query($link,$q);

         header('location:ddisplay.php');

   } 

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Driver Insertion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; text-align:center;}
    </style>
    
   </head>
<body><center>

<div class="wrapper">
<h2>Driver Update Detail</h2> 

        <form method="POST"> 
       
                <label>Name:</label>
                <input type="text" name="name" class="form-control"  required>
    
                <label>Phone Number:</label>
                <input type="text" name="contact" class="form-control"  required>
                      
                <label>Email:</label>
                <input type="text" name="email" class="form-control"  required>
            
                <label>Address:</label>
                <input type="text" name="address" class="form-control"  required><br><br>
               
                <div class="form-group">
                <input type="submit"  name="done" class="btn btn-primary" value="Submit">
                </div>

                <a href="ddisplay.php">back</a>
        </form>
    </div>
</body>
</html>