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

$sql3 = "SELECT * FROM estado WHERE id_estados != 3";
$query3 = mysqli_query($conexion, $sql3);

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="icon" href="../imagenes/PRIMERLOGO.ico">
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
    <nav class="navegacion">
      <ul >
          <div class="panel1" id="panel1">
            <li ><i class="fas fa-credit-card"></i><br>VENCIMIENTO DE TARJETA</li>
          </div>

          <div class="panel2" id="panel2">
            <li ><i class="far fa-calendar-plus"></i><br>PLANEACION</li>
          </div>

          <div class="panel3" id="panel3">
            <li ><i class="fas fa-sign-out-alt"></i></li>
          </div>

          <div class="panel4" id="panel4">
            <li ><i class="fas fa-charging-station"></i></li>
          </div>

          <div class="panel5" id="panel5">
            <li ><i class="fas fa-pencil-alt"></i></li>
          </div>

      </ul>
    </nav>

    <div class="vencimiento uno" id="vencimiento">
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

    <div>
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
    

    <div class="planeacion" id="planeacion">
        <form action="php/planeacion.php"  class = "form_plan" method="POST">
            <h2>PLANEACION</h2>
            <p>Seleccione las maquinas que estaran en servicio el dia de hoy: </p>
            <section>
			    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		    </section><br>
            <section id="tabla_resultado"></section><br>
            <div class="horas">
                <label>HORA INICIO:</label>
                <input type="time" name="h_inicio" required>
                <label>HORA FIN:</label>
                <input type="time" name="h_fin" required>
            </div><br>
            <div class="botones">
              <input type="submit" name="planeacion"  value="Programar" />
              <input type="hidden" name="cedula" value=<?php echo $fila ['cedula'];?>>
            </div>

        </form>
    </div>

    <div class="verPrograma uno" id="verPrograma">
        <h2>PROGRAMACION DE MAQUINARIA</h2>
        <form  method="POST">
            <label for="">Seleccione la fecha a buscar</label>
            <input type="date" id="fecha" name="fecha"  value="<?php echo date("Y-m-d");?>">
            <input type="submit" name="Buscar" value= "Buscar">
        </form>
      
        <?php 
        if (@$_POST['Buscar']){

            $fecha_reg= $_POST['fecha'];
            $buscardor = mysqli_query($conexion,"SELECT atraccion.id_atraccion, atraccion.nom_atraccion, planeacion.fecha_reg, planeacion.h_inicio, planeacion.h_fin, horas_trabajo.total_h FROM atraccion,planeacion,horas_trabajo WHERE  atraccion.id_atraccion = planeacion.id_atraccion and  horas_trabajo.id_atraccion = atraccion.id_atraccion and planeacion.fecha_reg = '$fecha_reg' "); 
            
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

            $hora1 = new DateTime(date("H:i:s"));//Hora actual
            $hora2 = new DateTime($row[4]);//Hora de cierre
            $hora3 = new DateTime($row[3]);//Hora de inicio
            $horaA = $row[5]; // Horas de trabajo acumuladas en bd

            $intervalo = $hora1->diff($hora2);
            $tiempoR = $intervalo->format('%R %H horas %i minutos %s segundos');
           
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row[0]; ?> </td>
                    <td><?php echo $row[1]; ?> </td>
                    <td><?php echo $row[3];?> </td>
                    <td><?php echo $row[4];?> </td> 
        <?php

        $busca = strpos($tiempoR, "+");

        //rango de horas a trabajar
        $intervalo2 = $hora2->diff($hora3);
        $tiempo = $intervalo2->format('%h');

        //Acumular horas
        $horas_t = $horaA + $tiempo;
        
        //comprabar si ya termino horas a trabajar
        if($busca === false){
            
            $consultica = "UPDATE horas_trabajo SET total_h = '$horas_t' WHERE  id_atraccion = '$row[0]' ";
            $ejecutar2 = mysqli_query($conexion, $consultica);

            $tiempoR = "Fin de Jornada";
            echo "<td>$tiempoR</td>";
            echo "<td>$horaA</td>";
            echo "</tr>";
            echo "</tbody>";

        }else{
            echo "<td>$tiempoR</td>";
            echo "<td>$horaA</td>";
            echo "</tr>";
            echo "</tbody>";
        }
    }
}
        ?>
            
      </table>

    </div>


    <div class="mantenimiento uno" id = "mantenimiento">
        <h2>MAQUINARIA EN MANTENIMIENTO</h2><br>
        <?php 

            $mantenimiento = mysqli_query($conexion,"SELECT atraccion.id_atraccion, atraccion.nom_atraccion FROM atraccion WHERE atraccion.id_estado = 3" ); 
              
        ?>
        <table>
        <caption>Resultados encontrados</caption>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
            </tr>
            
        <?php
            while($filas=mysqli_fetch_array($mantenimiento)){
        ?>
            <tr>
                <td><?php echo $filas[0]; ?> </td>
                <td><?php echo $filas[1]; ?> </td>
            </tr>
        <?php 
            } 
        ?>
        </table>
    </div>
<?php

   $query5=mysqli_query($conexion,"SELECT * FROM tipo_atraccion");

   $query6=mysqli_query($conexion,"SELECT * FROM ubicacion");

    



?>

    <div class="form_maquinas uno" id="form_maquinas">
                <h4>FORMULARIO PARA REGISTRAR ATRACIONES</h4>
        <form action="php/regi_atracciones.php" method="POST" id="formumaquinas">

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
    <!-- <section>
			<input type="date" name="busqueda" id="busqueda" placeholder="Buscar...">
		</section>

		<section id="tabla_resultado">
		AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA
                </section> --><br><br><br><br>

    <script src="main.js"></script>
</body>
</html>