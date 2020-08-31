<?php

    require_once "config.php";

    $driver=$busno=$destination="";
    $driver_err=$busno_err=$destination_err="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

     //driver
     if(empty($_POST["driver"])){
        $driver_err = "Please enter valid driver id";
    }
    else{
          $sql = "SELECT id,driver_id FROM bus WHERE driver_id = ?"; 
        
        if($stmt = mysqli_prepare($link, $sql)){
          
            mysqli_stmt_bind_param($stmt, "i",  $param_driver_id);
            
            $param_driver_id =$_POST["driver"];
            
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){   
                    $driver_err = "This driver id is already taken";
                } else{
                    $driver =$_POST["driver"];
                }
            } else{
                echo "Please try again later";
            }
        }  mysqli_stmt_close($stmt);
              
    }

     //busno
     if(empty(trim($_POST["busno"]))){
        $busno_err = "please enter the bus no";
    }else {
        $busno=trim($_POST["busno"]);
     }

     //destination
     if(empty(trim($_POST["destination"]))){
        $destination_err = "please enter the destination";
    }else {
        $destination=trim($_POST["destination"]);
     }


     if(empty(  $driver_err) && empty($busno_err) && empty($destination_err)){

           $s="INSERT INTO bus ( driver_id, bus_no, destination) VALUES (?, ?, ?)";

            if($stmt = mysqli_prepare($link, $s)){
 
                mysqli_stmt_bind_param($stmt, "iss", $param_driver_id,$param_bus_no,$param_destination);
    
                $param_driver_id=$driver;
                $param_bus_no=$busno;
                $param_destination= $destination;
    
                if(mysqli_stmt_execute($stmt)){
                     header("location: bdisplay.php");
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
<h2>Bus Detail Insertion</h2> 

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
        
        <div class="form-group <?php echo (!empty( $driver_err)) ? 'has-error' : ''; ?>"> 
                <label>Driver_id:</label>
                <input type="text" name="driver" class="form-control" value="<?php echo  $driver; ?>">
                <span class="help-block"><?php echo $driver_err; ?></span>
            </div>


            <div class="form-group <?php echo (!empty($busno_err)) ? 'has-error' : ''; ?>"> 
                <label>Bus Number:</label>
                <input type="text" name="busno" class="form-control"  value="<?php echo $busno; ?>">
                <span class="help-block"><?php echo $busno_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($destination_err)) ? 'has-error' : ''; ?>"> 
                <label>Destionation:</label>
                <input type="text" name="destination" class="form-control"  value="<?php echo $destination; ?>">
                <span class="help-block"><?php echo $destination_err; ?></span>
            </div>


                <div class="form-group">
                <input type="submit"  name="done" class="btn btn-primary" value="Submit">
                </div>

                <a href="bdisplay.php" class="btn btn-success" role="button">Back</a>

                
        </form>
    </div>
</body>
</html>