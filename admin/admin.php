
<?php
session_start();

$c=$_SESSION['cc'];

include('../php/conexion.php');


$sql ="SELECT * from usuarios WHERE cedula='$c'";
$resul = mysqli_query($conexion, $sql);
$fila=mysqli_fetch_array($resul);

$sql2 = "SELECT * FROM card";
$query2 = mysqli_query($conexion, $sql2);
$info = mysqli_fetch_assoc($query2);

$sal = "SELECT * FROM estado";
$query3 = mysqli_query($conexion, $sal);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../imagenes/PRIMERLOGO.png" alt="">
            <h2>UTOPIA-EXTREMA</h2>
        </div>
        <div class="accesos">

            <div class="verPerfil">

                <div class="icono" id="icono">
                    <i class="fas fa-user-circle"></i>   
                </div>

                <div class="datos uno" id="datos">
                    
                    <div class="info">
                    <h2>Datos de Usuario</h2>
                        <div class="img">
                            <img src="../imagenes/admin.jpg">
                        </div>
                            <h2>Nombres:<?php echo $fila ['nombre'];?></h2>
                            <h2>Apellidos: <?php echo $fila ['apellido'];?></h2>
                            <h2>Correo: <?php echo $fila ['correo']?></h2>
                             
                        </div>
                    </div>
                </div>

            <div class="exit">
                <a href="../php/cerrar.php"><i class="fas fa-sign-out-alt"></i></a>
            </div>

        </div>

    </header>

    <div class="filtro">
      <form method="post">
          <br>
          <h2>VENCIMIENTO DE TARJETAS</h2>
          <label for="">Seleccione el tipo de tarjeta que desea buscar: </label>
          <select name="tipo_card" id="">
            <option value="0" placeholder=""></option>
            <?php foreach ($query2 as $card) : ?>
            <option value="<?php echo $card['id_card'] ?> ">
            <?php echo $card['name_card'] ?></option>
            <?php endforeach;?>
          </select>
          <label for="">Seleccione el estado que desea buscar: </label>
          <select name="estado" id="">
            <option value="0" placeholder=""></option>
            <?php foreach ($query3 as $estado) : ?>
            <option value="<?php echo $estado['id_estados'] ?> ">
            <?php echo $estado['nom_estado'] ?></option>
            <?php endforeach;?>
          </select>
          <input type="submit" name="buscar" value="Buscar"/>
          <br>
          <br>
      </form>
    </div>

    <div class="vencimiento">
        <?php 
          if(isset($_POST['buscar'])){
            $card = $_POST['tipo_card'];
            $estado = $_POST['estado'];
            $sql2 = "SELECT id_compra, date, date_vcto, name_card FROM compra, card WHERE compra.id_card= $card and compra.id_estados = $estado and compra.id_card = card.id_card";
            $query2 = mysqli_query($conexion, $sql2);
            
             
            echo "<table  class = 'tables'>";
            echo "<caption>Registros encontrados</caption>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>Codigo de compra</th>";
            echo "<th scope='col'>Tipo tarjeta</th>";
            echo "<th scope='col'>Fecha compra</th>";
            echo "<th scope='col'>Fecha vencimiento</th>";
            echo "<th scope='col'>Dias restantes</th>";
            echo "</tr>";
            echo "</thead>";


        ?>
        <?php 
            while($columna=mysqli_fetch_array($query2))
            {
                $hoy = date("Y-m-d");
                $fechaAc= date_create($hoy);
                $vencimiento = date_create($columna[2]);
                $dias = date_diff($fechaAc,$vencimiento);
                $dia = $dias->format("%R%a");
                    
                   

                echo "<tbody>";
                echo "<tr>";
                echo "<th scope='row'>$columna[0]</th>";
                echo "<td>$columna[3]</td>";
                echo "<td>$columna[1]</td>";
                echo "<td>$columna[2]</td>";
                echo "<td>$dia</td>";
                echo "</tr>";
                echo "</tbody>";
            }
        }
        echo "</table>";
        ?>
    </div>
    
            

    <script src="app.js"></script>
</body>
</html>