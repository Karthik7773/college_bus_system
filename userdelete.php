<?php
     
     require_once "config.php";

      $id=$_GET['id'];

      $q="DELETE FROM `user_regg` WHERE id=$id";

      mysqli_query($link,$q);

      header('location: udisplay.php');
  ?>