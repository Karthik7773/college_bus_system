<?php

session_start();
 
require_once "config.php";

$username=$usn=$location="";
$username_err=$usn_err=$location_err=""; 

if(isset($_POST['payment'])){ 

   //username
    if(empty(trim($_POST["username"]))) {
        $username_err= "please enter the username";
    } else{
         $username=trim($_POST["username"]);
      }  

     //usn 
     if(empty(trim($_POST["usn"]))){
        $usn_err = "Please enter your usn";
    }
    elseif(strlen(trim($_POST["usn"])) < 10){
        $usn_err = "usn invalid";
    } elseif(strlen(trim($_POST["usn"])) > 10){
        $usn_err = "usn invalid";
    } else{
          $sql = "SELECT id FROM user_regg WHERE usn = ?"; 
        
        if($stmt = mysqli_prepare($link, $sql)){
          
            mysqli_stmt_bind_param($stmt, "s", $param_usn);
            
            $param_usn = trim($_POST["usn"]);
            
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){   
                    $usn_err = "This usn is already exits and registered";
                } else{
                    $usn = trim($_POST["usn"]);
                }
            } else{
                echo "Please try again later";
            }
        }  mysqli_stmt_close($stmt);
              
    }

     //location
    if(empty(trim($_POST["location"]))) {
        $location_err= "please enter your location";
    } else{
         $location=trim($_POST["location"]);
      }  

    if(empty($username_err) && empty($usn_err) && empty($location_err)){

        $sql = "INSERT INTO user_regg (username,usn,location) VALUES ( ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_usn,$param_location);

            $param_username = $username;
            $param_usn = $usn;
            $param_location = $location;

            if(mysqli_stmt_execute($stmt)){ 

                header("location: payment.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);   
    }
    mysqli_close($link);  
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div>

    <center>
    
     <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="">MITE bus register</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="reset.php"> reset password</a></li>
                        <li><a href="logout.php"> Logout</a></li>
                    </ul>
                </div>
            </div>
     </div>

     <div class="page-header"><br><br>
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>  Welcome to MITE bus registration</h1>
        <img src="mite.jpg" alt="mite" width="100px" height="100px">
    </div>
   
    <div class="wrapper">
        <h2>Registration form</h2>
        <p>Please fill to register</p>

<div class="form-group ">
        <form action="" method="post">

            <input type="text" name="stops" class="form-control" placeholder="enter your place"><br>
            <input type="submit" class="btn btn-primary" name="search" value="search">
        </form>
</div>       
<?php   

if(isset($_POST['search'])){

    $stops=$_POST['stops'];

    $query="select * from route where stops='$stops'";

    $query_run=mysqli_query($link,$query);

        while($row=mysqli_fetch_array($query_run))
        {
                   ?>
                      <form action="" method="get">
                          <label>Stops</label>
                          <input type="text" name="stops" class="form-control" value="<?php echo $row['stops'] ?>"><br>
                          <label>Timing</label>
                          <input type="text" name="time" class="form-control" value="<?php echo $row['time'] ?>"><br>
                          <label>Amount</label>
                          <input type="text" name="amount" class="form-control" value="<?php echo $row['amount'] ?>"><br>
                          <label>BUS NO</label>
                          <input type="text" name="bus_id" class="form-control" value="<?php echo $row['bus_id'] ?>"><br>
                      </form>
                   <?php
        
                    $_SESSION['location']= $row['stops'];

                    if($_SESSION['location']==false){ 
                        exit(0);
                      }
                      else{
                          $location=$_SESSION['location'];
                      }
         } 
         if(mysqli_num_rows($query_run)==0){
             echo "<script>alert('route not exits');</script>";
         }

        mysqli_close($link); 
}
 ?>

    </form>
</div>

<div class="wrapper">
    <form action="" method="post">

        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]) ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>  

        <div class="form-group <?php echo (!empty($usn_err)) ? 'has-error' : ''; ?>">
            <label>USN</label>
            <input type="text" name="usn" class="form-control" value="<?php echo $usn; ?>" placeholder="4mt00is000" >
            <span class="help-block"><?php echo $usn_err; ?></span>
        </div>  

        <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($location) ?>">
            <span class="help-block"><?php echo $location_err; ?></span>
        </div>  

    <div class="form-group">
                <input type="submit" name="payment" class="btn btn-primary" value="payment">
    </div>
</div>

</body>
</html>



