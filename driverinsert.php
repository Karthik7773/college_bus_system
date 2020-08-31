<?php

    require_once "config.php";

    $name=$phone=$email=$address="";
    $name_err=$phone_err=$email_err=$address_err="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

         //name
     if(empty(trim($_POST["name"]))){
        $name_err = "please enter the name";
    }else {
        $name=trim($_POST["name"]);
     }
  
     //phone
     if(empty(trim($_POST["phone"]))){
        $phone_err = "please enter the phone no";
    }else {
        $phone=trim($_POST["phone"]);
     }

     //email
     if(empty(trim($_POST["email"]))){
        $email_err = "please enter the email";
    }else {
        $email=trim($_POST["email"]);
     }


     //address
     if(empty(trim($_POST["address"]))){
        $address_err = "please enter the address";
    }else {
        $address=trim($_POST["address"]);
     }

     if(empty($name_err) && empty($phone_err) && empty($email_err) && empty($address_err)){
                
      
            $s="insert into driver(`name`, `contact`, `email`, `address`) VALUES (? ,? ,? ,?)";

            if($stmt = mysqli_prepare($link, $s)){
 
                mysqli_stmt_bind_param($stmt, "siss", $param_name,$param_phone,$param_email,$param_address);
    
                $param_name=$name;
                $param_phone=$phone;
                $param_email=$email;
                $param_address=$address;
    
                if(mysqli_stmt_execute($stmt)){
                   header("location: ddisplay.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);

         /*  
            if(isset($_POST['done'])){
            $id=$_POST['id'];

            $name=$_POST['name'];
            $phone=$_POST['contact'];
            $email=$_POST['email'];
            $address=$_POST['address']; 
           
            $s="insert into driver(`id`, `name`, `contact`, `email`, `address`) VALUES ('$id','$name',$phone,'$email','$address')";
            
            $query=mysqli_query($link,$s);
    
           header('location: ddisplay.php');  */
           
        }

        mysqli_close($link);
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
<h2>Driver Detail Insertion</h2> 

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
        
        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>"> 
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>


            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>"> 
                <label>Phone Number:</label>
                <input type="text" name="phone" class="form-control"  value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>"> 
                <label>Email:</label>
                <input type="text" name="email" class="form-control"  value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>"> 
                <label>Address:</label>
                <input type="text" name="address" class="form-control"  value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>

                <div class="form-group">
                <input type="submit"  name="done" class="btn btn-primary" value="Submit">
                </div>

                <a href="ddisplay.php" class="btn btn-success" role="button">Back</a>

                
        </form>
    </div>
</body>
</html>