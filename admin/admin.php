<?php
    require_once("../php/valiadmi.php");
?>
<?php


$c=$_SESSION['cc'];

include('../php/conexion.php');


$sql ="SELECT * from usuarios WHERE cedula='$c'";
$resul = mysqli_query($conexion, $sql);
$fila=mysqli_fetch_array($resul);

$sql2 = "SELECT * FROM card";
$query2 = mysqli_query($conexion, $sql2);
$info = mysqli_fetch_assoc($query2);

$sql3 = "SELECT * FROM estado";
$query3 = mysqli_query($conexion, $sql3);

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
          if(@$_POST['buscar']){
            $card = $_POST['tipo_card'];
            $estado = $_POST['estado'];
            $sql2 = "SELECT compra.id_compra, compra.date, card.name_card, usuarios.nombre, usuarios.apellido, usuarios.celular, usuarios.correo, compra.date_vcto FROM compra, card , usuarios WHERE compra.id_card= '$card' and compra.id_estados = '$estado'  and compra.id_card = card.id_card and compra.cedula = usuarios.cedula";
            $query2 = mysqli_query($conexion, $sql2);
            
             
            echo "<table  class = 'tables'>";
                echo "<caption>Registros encontrados</caption>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th scope='col'>Codigo de compra</th>";
                        echo "<th scope='col'>Tipo tarjeta</th>";
                        echo "<th scope='col'>Nombre cliente</th>";
                        echo "<th scope='col'>Telefono de contacto</th>";
                        echo "<th scope='col'>Correo</th>";
                        echo "<th scope='col'>Fecha compra</th>";
                        echo "<th scope='col'>Dias restantes</th>";
                    echo "</tr>";
                echo "</thead>";


        ?>
        <?php 
            while($columna=mysqli_fetch_array($query2))
            {
                $hoy = date("Y-m-d");
                $fechaAc= date_create($hoy);
                $vencimiento = date_create($columna[7]);
                $dias = date_diff($fechaAc,$vencimiento);
                $dia = $dias->format("%R%a");
                    
                   

                echo "<tbody>";
                    echo "<tr>";
                        echo "<th scope='row'>$columna[0]</th>";
                        echo "<td>$columna[2]</td>";
                        echo "<td>$columna[3]$columna[4]</td>";
                        echo "<td>$columna[5]</td>";
                        echo "<td>$columna[6]</td>";
                        echo "<td>$columna[1]</td>";
                        echo "<td>$dia</td>";
                    echo "</tr>";
                echo "</tbody>";
            }
        }
        echo "</table>";
        ?>
    </div>

    <div id="planeacion">
        <form action="planeacion.php" method="POST">
            <h2>PLANEACION</h2>
            <p>Seleccione las maquinas que estaran en servicio el dia de hoy: </p><br>
            <?php 
                $sql4 = "SELECT atraccion.id_atraccion, tipo_atraccion.nom_tip_atraccion, atraccion.nom_atraccion, ubicacion.nom_ubi FROM atraccion, tipo_atraccion, ubicacion WHERE atraccion.id_tip_atraccion = tipo_atraccion.id_tip_atraccion and atraccion.id_ubi = ubicacion.id_ubi ";
                $query4 = mysqli_query($conexion, $sql4);
            ?>
            <table >
                <thead>
                    <tr>
                        <th>Tipo de atracción</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>

            <?php 
                while($column=mysqli_fetch_array($query4))
                {
             ?> 
                  <tbody>
                      <tr>
                          <td><?php echo $column[1]; ?> </td>
                          <td><?php echo $column[2]; ?> </td>
                          <td><?php echo $column[3];?> </td>
                          <td><input type="checkbox" name="atraccion[]" value=<?php echo $column[0]; ?> ></td>
                      </tr>
                  </tbody>

            <?php         
                }
            ?>  
            </table><br>
            <div class="horas">
                <label>HORA INICIO:</label>
                <input type="time" name="h_inicio" min="04:00" max="24:00" required>
                <label>HORA FIN:</label>
                <input type="time" name="h_fin" min="04:00" max="24:00" required>
            </div><br>
            <div class="botones">
              <input type="submit" name="planeacion"  value="Programar" />
              <input type="hidden" name="cedula" value=<?php echo $fila ['cedula'];?>>
            </div>

        </form>
    </div>   

    <div class="control">
        <h2>CONTROL DE MAQUINARIA</h2>
        <form  method="POST">
            <label for="">Seleccione la fecha a buscar</label>
            <input type="date" id="fecha" name="fecha"  value="<?php echo date("Y-m-d");?>">
            <input type="submit" name="Buscar" value= "Buscar">
        </form>
      
        <?php 
            $buscardor = mysqli_query($conexion,"SELECT atraccion.id_atraccion, atraccion.nom_atraccion, planeacion.fecha_reg, planeacion.h_inicio, planeacion.h_fin FROM atraccion,planeacion WHERE  atraccion.id_atraccion = planeacion.id_atraccion"); 
            
        ?>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Ubicación</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Hora restante</th>
                    <th>Hora acumuladas</th>
                    
                </tr>
            </thead>
        <?php

            while($row=mysqli_fetch_array($buscardor)){
            date_default_timezone_set('America/Bogota');

            $hora1 = new DateTime(date("H:i:s"));//hora actual
            $hora2 = new DateTime($row[4]);//hora de cierre

            $intervalo = $hora1->diff($hora2);
            $tiempoR = $intervalo->format('%R %H horas %i minutos %s segundos');
            $busca = strpos($tiempoR, "+");
     
            if($busca === false){

               /*  $horasT = "SELECT total_h FROM horas_trabajo WHERE id_atraccion = '$row[0]' ";
                $ejecutar1 = mysqli_query($conexion, $horasT); */

                $hora3 = new DateTime($row[3]);//hora de inicio
                $intervalo2 = $hora2->diff($hora3);
                $tiempo = $intervalo2->format('%H:%i:%s');

                /* $total = $hello->date_interval_create_from_date_string($tiempo);
                $totalH = $total->format("%H:%i:%s"); */
                

                $consultica = "UPDATE horas_trabajo SET total_h = '$tiempo' WHERE  id_atraccion = '$row[0]' ";
                $ejecutar2 = mysqli_query($conexion, $consultica);
                
        

        ?>
            <tbody>
                <tr>
                    <td><?php echo $row[0]; ?> </td>
                    <td><?php echo $row[1]; ?> </td>
                    <td><?php echo $row[3];?> </td>
                    <td><?php echo $row[4];?> </td>
                    <td><?php echo $tiempoR;?> </td>
                    <td><?php echo $tiempo;?> </td>
                </tr>
            </tbody>

        <?php         
          }else{
        }
    }
        ?>  
      </table>

    </div>
<?php

   $query5=mysqli_query($conexion,"SELECT * FROM tipo_atraccion");

   $query6=mysqli_query($conexion,"SELECT * FROM ubicacion");

    



?>

    <div class="form_maquinas">
                <h4>FORMULARIO PARA REGISTRAR ATRACIONES</h4>
        <form action="regi_atracciones.php" method="POST" id="formumaquinas">

            <label for="id_tipo_atraccion">Selecciona el Tipo de Atracccion</label>

            <select name="tip_atraccion" id="id_tipo_atraccion">
                <option value="">--</option>

                <?php
                  
                    while($dcta=mysqli_fetch_array($query5)){
                
                ?>
                    
                <option value="<?php echo $dcta['id_tip_atraccion'] ?>"><?php echo $dcta['nom_tip_atraccion'] ?></option>
                    
                <?php
                    }
                ?>

            </select>
            <div>
            <label for="nom_atraccion">Escriba el Nombre de la Atraccion</label>
            <input type="text" name="nom_atraccion" id="nom_atraccion">
            </div>
            <div>
            <label for="capa">Capacidad</label>
            <input type="text" name="capa" id="capa">
            </div>
            
            
            <label for="id_tipo_atraccion">Selecciona la Ubicacion de la Atracccion</label>

            <select name="ubicacion" id="id_tipo_ubicacion">
                <option value="">--</option>

                <?php
                  
                    while($dctu=mysqli_fetch_array($query6)){
                
                ?>
                    
                <option value="<?php echo $dctu['id_ubi'] ?>"><?php echo $dctu['nom_ubi'] ?></option>
                    
                <?php
                    }
                ?>
                
            </select>
            <div class="bm">
            <input type="submit" value="REGISTRAR" class="rmaquinas" name="registrar_atracciones">
            </div>
            
        </form>
    </div>

    <script src="app.js"></script>
</body>
</html>