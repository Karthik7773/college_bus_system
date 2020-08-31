<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: hello.php");
    exit;
}

require_once "config.php";

$addname=$password="";
$addname_err=$password_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //admin
     if(empty(trim($_POST["addname"]))){
         $addname_err = "please enter admin name";
     }else {
         $addname=trim($_POST["addname"]);
      }
 
     //password
     if(empty(trim($_POST["password"]))){
         $password_err = "please enter the password";
     }else {
         $password = trim($_POST["password"]);
      }
 

 if(empty($addname_err) && empty($password_err)){
 
         $sql = "SELECT id,addname,password from admin where addname=? and password=?";
 
         if($stmt = mysqli_prepare($link, $sql)){
 
         mysqli_stmt_bind_param($stmt, "ss", $param_addname,$param_password);
 
             $param_addname=$addname;
             $param_password=$password;


             if(mysqli_stmt_execute($stmt)){

               mysqli_stmt_store_result($stmt);

             if(mysqli_stmt_num_rows($stmt) == 1){                    
            
                if(mysqli_stmt_fetch($stmt)){

                    session_start();
                        
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["addname"] = $addname;

                    header("location: hello.php");
                }

                else{
                    $password_err = "only admin can login";
                }
            }
         }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
         mysqli_stmt_close($stmt);
        }
    }
        
        mysqli_close($link);
    }
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; text-align:center;}
    </style>
    <title>Admin</title>
</head>
<body>
<center>

<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">                        
                </button>
                    <a class="navbar-brand" href="">MITE bus maintainer</a>
                </div>
            </div>
     </div><br><br><br><br>


<div class="wrapper">
<img src="mite.jpg" alt="mite" width="100px" height="100px">
        <h2>Admin Login</h2>
        <p>Please fill to login</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         
             <div class="form-group <?php echo (!empty($addname_err)) ? 'has-error' : ''; ?>">
                <label>Admin</label>
                <input type="text" name="addname" class="form-control" value="<?php echo $addname; ?>">
                <span class="help-block"><?php echo $addname_err; ?></span>
            </div>    

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>    

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>

        </form>

        <a href="login.php" class="btn btn-success" role="button">Back</a>
</div>


    
</body>
</html>