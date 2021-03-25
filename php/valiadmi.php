<?php
   session_start();

    if(!isset($_SESSION['idc']) || !isset($_SESSION['cc']))
    {
       header("location: ../index.php");
        exit;
   }
?>   