<?php
   session_start();

    if(!isset($_SESSION['usu']) || !isset($_SESSION['tip']))
    {
       header("location: ../index.php");
        exit;
   }
?>   