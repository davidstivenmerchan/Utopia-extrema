<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <title>INGRESAR</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h1>INICIAR SESION</h1>
    <form action="php/validar.php" method="POST">
        <label for="usu">Ingrese su usuario</label>
        <input type="text" id="usu" autocomplete="off" name="usu">
        <label for="pass">Ingrese su contraseña</label>
        <input type="password" id="pass" autocomplete="off" name="pass">
        <input type="submit" value="INGRESAR">
    </form>
    <br>
    <br>
    <br>
    <div class="compra">
        <h1>COMPRA DE TARJETA</h1>
        <div class="card">
        <form method="post">
            <h2>DATOS TARJETA</h2>
            <label for="">Seleccione el tipo de tarjeta que desea comprar: </label>
            <select name="tipo_card" id="">
                <option value="0" placeholder=""></option>
                <?php foreach ($query2 as $card) : ?>
                <option value="<?php echo $card['id_card'] ?> ">
                <?php echo $card['name_card'] ?></option>
                <?php endforeach;?>
            </select>
            <input type="submit" name="insertar" value="Seleccionar"/>
        </form>
        </div>

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
                        <td><label >'.$info["precio"].'</label></td>
                    </table>
                    <input type="hidden" name="Eliminar" value=""/>
                    <h2>REGISTRO DE USUARIOS</h2>
                ');
                
                for ($i = 1; $i <= $info["N_person"]; $i++){
                    
            ?>
            <table class="table">
            <tr class="fila">
                <td>
                <label for="">Tipo Documento</label>
                <select required name="tipo_docu[]" id="">
                    <option value="0" placeholder=""></option>
                    <?php foreach ($query as $tip_docu) : ?>
                    <option value="<?php echo $tip_docu['id_tipo_docu'] ?> ">
                    <?php echo $tip_docu['nom_docu'] ?></option>
                    <?php endforeach;?>
                </select>
                </td>
                <td><label for="">Número de Documento</label><input type= "number" required name="id_user[]"/></td>
                <td><label for="">Nombre</label><input type= "text" required name="nombre[]"/></td>
                <td><label for="">Apellidos</label><input type= "text" required name="apellidos[]"/></td>
                <td><label for="">Edad</label><input type= "number" required name="edad[]"/></td>
                <td><label for="">Telefono</label><input type= "number" required name="cel[]"/></td>
                <td><label for="">Correo</label><input type= "email" required name="correo[]"/></td>
            </tr>
            </table>
            
            <?php }
            echo('
            <div class="datosPago">
                <h2>DATOS DE PAGO</h2>
                <table class="table" >
                <tr class="fila">
                    <td><label for="">Número de Tarjeta: </label><input type= "number" required name="num_card"/></td>
                    <td><label for="">Fecha de Vencimiento:</label><input type= "date" required name="date_vto"/></td>
                    <td><label for="">Código de seguridad (CVV):</label><input type= "text" required name="cod_card"/></td>
                </tr>
                </table>
            </div>
            <div class="acciones">
                <input type="submit" value="Comprar" />
            </div>'
            );
            } 
            ?>
        
        </form>
        </div>
    </div>
    <script src="js/compraCard.js" ></script>

</body>

<br>
<br>
<br>
<br>
<br>
<br>


    <h1>COMPRAR BOLETOS</h1>


    <a href="php/generarQR.php">Comprar</a>



    <a href="php/correo.php">ENVIAR CORREO</a>


   <!--  <div class="clienteC">
        <form action="php/validar.php" method="POST">
            <label for="cc">Ingrese su Cedula</label>
            <input type="text" id="cc" autocomplete="off" name="cc">

            <label for="nom">Ingrese su nombre</label>
            <input type="text" id="nom" autocomplete="off" name="nom">

            <label for="ape">Ingrese su apellido</label>
            <input type="text" id="ape" autocomplete="off" name="ape">
            
            <label for="ape">Seleccion el metodo de pago</label>
           <select name="" id="">
            <option value="">--</option>
               <option value="">Efectivo</option>
               <option value="">Tarjeta</option>
           </select>
            
            <input type="submit" value="INGRESAR">
        </form>
    </div>   -->

</html>