<?php
require_once("conexion.php");

//Archivos necesarios para enviar los correos electronicos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Datos users
$cedula = $_POST['id_user'];
$tip_docu = $_POST['tipo_docu'];
$nom = $_POST['nombre'];
$ape = $_POST['apellidos'];
$edad = $_POST['edad'];
$cel = $_POST['cel'];
$correo = $_POST['correo'];

//Datos de pago
$num_card = $_POST['num_card'];
$date_vto = $_POST['date_vto'];
$cod_card = $_POST['cod_card'];






$consul = "INSERT INTO usuarios (cedula, tipo_docu, tipo_user, nombre,apellido, celular, correo, edad) VALUES ";

for ($i=0; $i < count($cedula); $i++) { 
    $consul.="('".$cedula[$i]."', '".$tip_docu[$i]."',1, '".$nom[$i]."', '".$ape[$i]."', '".$cel[$i]."', '".$correo[$i]."', '".$edad[$i]."'),";
}
$cadena_final = substr($consul, 0, -1);
$cadena_final.=";";

if($conexion->query($cadena_final)):

    
    //fecha de vencimiento
    $fechaHoy = date("Y-m-d");
    $holaaa= date_create($fechaHoy);
    $fecha = date_add ($holaaa, date_interval_create_from_date_string("10 days"));
    $lol = date_format($fecha, "y,m,d");
    
    //Datos tarjeta seleccionada
    $person= count($cedula);
    $caon = "SELECT * FROM card WHERE N_person = $person";
    $in=$conexion->query($caon);
    $info = mysqli_fetch_assoc($in);
    $id_card = $info['id_card'];
    $tickest = $info['tickets'];
    $valor = $info['precio'];


    $factura = "INSERT INTO compra (id_compra, id_card, cedula, date, id_estados,tickest,date_vcto, number_of_card,date_vcto_card, cod_card,valor ) VALUES ('','$id_card','".$cedula[0]."','$fechaHoy',1,'$tickest','$lol','$num_card','$date_vto','$cod_card','$valor')";
    $insertarCard=$conexion->query($factura); 

    $docu = $cedula[0];

    $compracodigo = "SELECT * FROM compra WHERE cedula = '$docu' ";
    $query2 = mysqli_query($conexion, $compracodigo);
    $fila = mysqli_fetch_assoc($query2);

    $qr = "INSERT INTO codigo (id_qr, id_compra, cedula) VALUES";
    for ($ar=0; $ar < count($cedula); $ar++) { 
        $qr.="('', '".$fila['id_compra']."','".$cedula[$ar]."'),";
    }
    $cade = substr($qr, 0, -1);
    $cade.=";";
    $conexion->query($cade);
    
    
    // Envio de correos
    $datosFactura = "SELECT compra.id_compra, compra.cedula, compra.date, compra.date_vcto, compra.valor, compra.tickest, card.N_person, card.name_card FROM compra, card WHERE compra.cedula = '$docu' and compra.id_card = card.id_card and compra.tickest = card.tickets and compra.valor = card.precio ";
    
    $query2 = mysqli_query($conexion, $datosFactura);
    $fila = mysqli_fetch_array($query2);
    
    for ($dd=0; $dd < count($cedula); $dd++) { 
    
    $mail = new PHPMailer(true);
    
    try { 
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'extremautopia@gmail.com';                     //SMTP username
        $mail->Password   = 'UtopiaExtrema123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('extremautopia@gmail.com', 'Utopia Extrema');
        $mail->addAddress($correo[$dd], $nom[$dd]);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Tu codigo QR ';
        $mail->Body    = "    <!DOCTYPE html>
        <html lang='es'>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Mensaje</title>
        
          <style>
            * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
            }
        
            .container {
              max-width: 1000px;
              width: 90%;
              margin: 0 auto;
            }
            .bg-dark {
              background: #232424;
              margin-top: 40px;
              padding: 20px 0;
            }
            .alert {
              font-size: 1.5em;
              position: relative;
              padding: .75rem 1.25rem;
              margin-bottom: 2rem;
              border: 1px solid transparent;
              border-radius: .25rem;
            }
            .alert-primary {
              color: #ffffffd7;
              background-color: #6e107ae7;
            }
        
            .img-fluid {
              max-width: 60%;
              height: auto;
            }
        
            .mensaje {
              width: 80%;
              font-size: 15px;
              margin: 0 auto 40px;
              color: #eee;
            }

            .tutilo{
              font-size: 350%; 
              text-align: center;
            }
        
            .texto {
              margin-top: 20px;
              color:#ffffff;
            }
    
            .con{
              color:#ffffff;
            }
        
            .footer {
              width: 100%;
              background: #48494a;
              text-align: center;
              color: #ddd;
              padding: 10px;
              font-size: 14px;
            }
    
            .footer span {
              text-decoration: underline;
            }
          </style>
        </head>
        <body>
          <div class='container'>
            <div class='bg-dark'>
              <div class='alert alert-primary'>
                <strong>Mensaje para: </strong> '".$nom[$dd]."'
              </div>

              <div class='mensaje'>
                <h1 class='titulo'>🎪  UTOPIA EXTREMA  🎪</h1><br>
                <h1>FACTURA</h1>
                <table>
                  <tr>
                    <td><label>Nº DE FACTURA: </label></td>
                    <td><label>".$fila[0]."</label></td>
                  </tr>
                  <tr>
                    <td><h3>PLAN SELECCIONADO</h3></td>
                    <td><label>".$fila[7]."</label></td>
                  </tr>
                  <tr>
                    <td><label>Nº de Tickest Disponibles: </label></td>
                    <td><label>".$fila[5]."</label></td>
                  </tr>
                  <tr>
                    <td><h3>VALOR TOTAL: </h3></td>
                    <td><label>".$fila[4]."</label></td>
                  </tr>
                  <tr></tr>
                  <tr>
                    <td><label>Fecha de Compra: </label></td>
                    <td><label>".$fila[2]."</label></td>
                  </tr>
                  <tr>
                    <td><label>Fecha de Vencimiento de la Compra: </label></td>
                    <td><label> ".$fila[3]."</label></td>
                  </tr>
                </table><br>
                <h3 class='con'><strong>RECORDAR</strong></h3>
                <p class= 'con'>Con el número de su factura usted o cualquiera de sus acompañantes registrados podrán recargar la tarjeta desde los puntos de recarga del parque. </p>
            
                <div class='texto'>Tu codigo para ingresar al parque es el siguiente:</div>
    
                <img class='img-fluid' src='https://es.qr-code-generator.com/wp-content/themes/qr/new_structure/markets/core_market/generator/dist/generator/assets/images/websiteQRCode_noFrame.png' alt='Mensaje'>
             
                
              </div>
        
              <div class='footer'>
                Puedes contactarnos al <span>3156254560</span> o escribirle a <span>extremautopia@gmail.com</span>
              </div>
            </div>
          </div>
        </body>
        </html>
      ";
    
          $mail->send();
          
      } catch (Exception $e) {
          echo "Error Presentado: {$mail->ErrorInfo}";
      }
    }
    
    echo json_encode(array('ERROR' => false));

else:
    echo json_encode(array('ERROR' => true));

endif;


?>