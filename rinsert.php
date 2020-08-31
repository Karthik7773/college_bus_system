<?php

    require_once "config.php";

    $bus_id=$stops=$time=$distance=$amount="";
    $bus_id_err=$stops_err=$time_err=$distance_err=$amount_err="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

         //bus
     if(empty(trim($_POST["bus_id"]))){
        $bus_id_err = "please enter the bus id";
    }else {
        $bus_id=trim($_POST["bus_id"]);
     }
  
     //stops
     if(empty(trim($_POST["stops"]))){
        $stops_err = "please enter the stops";
    }else {
        $stops=trim($_POST["stops"]);
     }

     //timmings
     if(empty(trim($_POST["time"]))){
        $time_err = "please enter the stop time";
    }else {
        $time=trim($_POST["time"]);
     }

     //distance
     if(empty(trim($_POST["distance"]))){
        $distance_err = "please enter the distance";
    }else {
        $distance=trim($_POST["distance"]);
     }

     //amount
     if(empty(trim($_POST["amount"]))){
        $amount_err = "please enter the amount";
    }else {
        $amount=trim($_POST["amount"]);
     }

     if(empty($bus_id_err) && empty($stops_err) && empty($time_err) && empty($distance_err) && empty($amount_err)){
                

           $s="INSERT INTO route (bus_id,stops,time,distance,amount) VALUES (?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $s)){
 
                mysqli_stmt_bind_param($stmt, "isisi", $param_bus_id,$param_stops,$param_time,$param_distance,$param_amount);
    
                $param_bus_id=$bus_id;
                $param_stops= $stops;
                $param_time= $time;
                $param_distance=$distance;
                $param_amount= $amount;

    
                if(mysqli_stmt_execute($stmt)){
                   header("location: rdispaly.php");
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
    <title>Route Insertion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; text-align:center;}
    </style>
    
   </head>
<body><center>

<div class="wrapper">
<h2>Route Detail Insertion</h2> 

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
        
        <div class="form-group <?php echo (!empty(  $bus_id_err)) ? 'has-error' : ''; ?>"> 
                <label>Bus_id:</label>
                <input type="text" name="bus_id" class="form-control" value="<?php echo  $bus_id; ?>">
                <span class="help-block"><?php echo $bus_id_err; ?></span>
            </div>


            <div class="form-group <?php echo (!empty( $stops_err)) ? 'has-error' : ''; ?>"> 
                <label>Stops:</label>
                <input type="text" name="stops" class="form-control"  value="<?php echo  $stops; ?>">
                <span class="help-block"><?php echo  $stops_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty( $time_err )) ? 'has-error' : ''; ?>"> 
                <label>Time:</label>
                <input type="text" name="time" class="form-control"  value="<?php echo $time ; ?>">
                <span class="help-block"><?php echo  $time_err ; ?></span>
            </div>

            <div class="form-group <?php echo (!empty(  $distance_err)) ? 'has-error' : ''; ?>"> 
                <label>Distance:</label>
                <input type="text" name="distance" class="form-control"  value="<?php echo  $distance ; ?>">
                <span class="help-block"><?php echo  $distance_err ; ?></span>
            </div>

            <div class="form-group <?php echo (!empty( $amount_err )) ? 'has-error' : ''; ?>"> 
                <label>Amount:</label>
                <input type="text" name="amount" class="form-control"  value="<?php echo  $amount ; ?>">
                <span class="help-block"><?php echo  $amount_err ; ?></span>
            </div>


                <div class="form-group">
                <input type="submit"  name="done" class="btn btn-primary" value="Submit">
                </div>

                <a href="rdispaly.php" class="btn btn-success" role="button">Back</a>

                
        </form>
    </div>
</body>
</html>