<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/clientes.css">
    <title>Clientes</title>

</head>
<body>
    <h2>Cliente: <?php echo $_SESSION['cc'] ?> </h2>
   <form action="restarti.php">
       <p>maquina 1</p>
       <input type="hidden" value="1">
       <input type="submit" value="MONTAR">
   </form>
   <form action="">
       <p>maquina 2</p>
       <input type="hidden" value="2">
       <input type="submit" value="MONTAR">
   </form>
   

</body>
</html>