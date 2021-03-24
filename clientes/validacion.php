<?php
   session_start();

    if(!isset($_SESSION['cc']) || !isset($_SESSION['idq']))
    {
       header("location: ../index.php");
        exit;
   }
?>   