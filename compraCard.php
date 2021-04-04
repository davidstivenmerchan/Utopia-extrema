<?php
require_once("php/conexion.php");

$sql = "SELECT * FROM tipo_docu";
$query = mysqli_query($conexion, $sql);

$sql2 = "SELECT * FROM card";
$query2 = mysqli_query($conexion, $sql2);
$info = mysqli_fetch_assoc($query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COMPRA TU TARJETA</title>
    <link rel="stylesheet" href="css/compraCard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="icon" href="imagenes/PRIMERLOGO.ico">
</head>

<body>

<div class="capas">
  <div class="formulario">
    <div class="salir">
      <a href="index.php">Volver <i class="fas fa-sign-out-alt"></i></a>
    </div>
    <div class="logo">
      <img src="imagenes/PRIMERLOGO.PNG" alt="" width= "140px" height= "100px">
    </div>
    <h2 class="titulo">COMPRA TU TARJETA AHORA🎢</h2>
    <form method="post" class="filtro">
      <label for="">Seleccione el tipo de tarjeta que desea comprar: </label>
      <div class="barra">
        <select name="tipo_card" id="" class="select">
          <option value="0" placeholder=""></option>
          <?php foreach ($query2 as $card) : ?>
          <option value="<?php echo $card['id_card'] ?> ">
          <?php echo $card['name_card'] ?></option>
          <?php endforeach;?>
        </select>
      </div>
      <input type="submit" class = "boton" name="insertar" value="Seleccionar"/>
      </form>
    

    <div class="users">
      <form id="form_insert">
        <?php 
          if(isset($_POST['insertar'])){
            $card = $_POST['tipo_card'];
            $sql2 = "SELECT * FROM card WHERE id_card = $card";
            $query2 = mysqli_query($conexion, $sql2);
            $info = mysqli_fetch_assoc($query2);


            echo('
                <div class="infoMostrar">
                  <h3>DATOS PAQUETE</h3>
                  <table>
                    <td>TIPO DE TARJETA: </td>
                    <td><label>'.$info["name_card"].'</label></td>
                    </tr>
                    <td>NUMERO DE PERSONAS: </td>
                    <td>'.$info["N_person"].'</td>
                    </tr>
                    <td>NUMERO DE TICKETS: </td>
                    <td><label>'.$info["tickets"].'</label></td>
                    </tr>
                    <td>PRECIO: </td>
                    <td><label >$'.$info["precio"].'</label></td>
                  </table>
                  <br><hr>
                  <h2>REGISTRO DE USUARIOS</h2>
              ');
            
            for ($i = 1; $i <= $info["N_person"]; $i++){
                
        ?>
        
        <table class="table">
          <tr class="fila">
            <br>
            <h3>Datos Persona #<?php echo $i ?></h3>
            <td>
              <label for="">Tipo Documento</label>
              <select class = "dar"required name="tipo_docu[]" id="">
                <option value="0" placeholder=""></option>
                <?php foreach ($query as $tip_docu) : ?>
                <option value="<?php echo $tip_docu['id_tipo_docu'] ?> ">
                <?php echo $tip_docu['nom_docu'] ?></option>
                <?php endforeach;?>
              </select>
            </td>
            <td><label for="">Número de Documento</label><input type= "number" required name="id_user[]"/></td>
            <td><label for="">Nombre</label><input type= "text" required autocomplete="off" name="nombre[]"/></td>
            <td><label for="">Apellidos</label><input type= "text" required autocomplete="off" name="apellidos[]"/></td>
          </tr>
          <tr class="fila">
            <td><label for="">Edad</label><input type= "number" required autocomplete="off" name="edad[]"/></td>
            <td><label for="">Telefono</label><input type= "number" required autocomplete="off" name="cel[]"/></td>
            <td><label for="">Correo</label><input type= "email" required autocomplete="off" name="correo[]"/></td>
          </tr>
        </table><br><hr>
        
        <?php }
        echo('<br>
          <div class="datosPago">
            <h2>DATOS DE PAGO</h2>
            <table class="table" >
              <tr class="fila">
                <td><label for="">Número de Tarjeta: </label><input type= "number" required name="num_card"/></td>
                <td><label for="">Fecha de Vencimiento:</label><input type= "date" required name="date_vto"/></td>
                <td><label for="">Código de seguridad (CVV):</label><input type= "text" required autocomplete="off" name="cod_card"/></td>
              </tr>
            </table>
          </div><br><br>
          <div class="acciones">
              <input type="submit" class = "boton2" value="Comprar" />
          </div>'
        );
        } 
        ?>
       
      </form>
    </div>
    </div>
</div>

    <script src="js/compraCard.js" ></script>
</body>
</html>

