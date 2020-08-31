<?php

session_start();

require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <title>Hello</title>
</head>
<body>
<center>
     <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="">MITE bus maintainer</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="alogout.php"> Logout</a></li>
                    </ul>
                </div>
            </div>
     </div>

     <div class="page-header"><br><br>
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["addname"]); ?></b> you can access all the detials now</h1>
        <img src="mite.jpg" alt="mite" width="100px" height="100px">
    </div>

    <h1>welcome</h1><br><br><br>

    <a href="ddisplay.php" class="btn btn-success" role="button">Driver view</a>

    <a href="bdisplay.php" class="btn btn-success" role="button">Bus view</a>

    <a href="rdispaly.php" class="btn btn-success" role="button">Route view</a>

    <a href="udisplay.php" class="btn btn-success" role="button">User-register view</a>


</body>
</html>