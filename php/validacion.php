<?php
   session_start();

    if(!isset($_SESSION['cc']) || !isset($_SESSION['idc']))
    {
       header("location: ../index.php");
        exit;
   }
?>   