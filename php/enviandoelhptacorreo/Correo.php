<?php
require '../conexion.php';

$cedula = $_POST['id_user'];
$correo = $_POST['correo'];
$nom = $_POST['nombre'];



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$docu = $cedula[0];

$compracodigo = "SELECT compra.id_compra, compra.cedula, compra.date, compra.date_vcto, compra.valor, compra.tickest, card.N_person, card.name_card FROM compra, card WHERE compra.cedula = '$docu' and compra.id_card = card.id_card and compra.tickest = card.tickets and compra.valor = card.precio ";



$query2 = mysqli_query($conexion, $compracodigo);
$fila = mysqli_fetch_array($query2);

for ($i=0; $i < count($correo); $i++) { 

 
 

    

  
 


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
    $mail->addAddress($correo[$i], $nom[$i]);     //Add a recipient

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
          background: #343a40;
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
          color: #004085;
          background-color: #cce5ff;
          border-color: #b8daff;
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
            <strong>Mensaje para: </strong> '".$nom[$i]."'
          </div>

          <div class='mensaje'>
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
            </table>
            <h3class='con'>RECORDAR</h3>
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
?>