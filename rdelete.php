<?php
     
     require_once "config.php";

      $id=$_GET['id'];

      $q="DELETE FROM `route` WHERE id=$id";

      mysqli_query($link,$q);

      header('location: rdispaly.php');
  ?>