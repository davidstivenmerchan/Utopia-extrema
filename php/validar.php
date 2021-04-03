<?php



$cc = $_POST['cc'];
$idc = $_POST['idc'];

session_start();


include('conexion.php');

$consulta1="SELECT * FROM usuarios where cedula='$cc'";
$resultado1=mysqli_query($conexion,$consulta1);
$fila1=mysqli_fetch_array($resultado1);

if($fila1){

   $tipousu = $fila1['tipo_user'];

   if($tipousu==1){

        $consulta = "SELECT * FROM codigo WHERE id_compra = '$idc' and cedula = '$cc'";
        $resultado48 = mysqli_query($conexion, $consulta);
        $fila=mysqli_fetch_array($resultado48);
         
           
        
        
            if($fila){

                $_SESSION['idq'] = $fila['id_qr'];
                $_SESSION['idc'] = $idc;
                $_SESSION['cc'] =  $cc;
                $qr=$fila['id_qr'];
                $salidamientras = "En el parque";

                $date = strftime('%Y-%m-%d %H:%M:%S');



                $consulta_entrada = "INSERT INTO entry_exit(id_qr, fe_ho_entry ,fe_ho_exit) VALUES($qr,'$date','$salidamientras')";
                $exe_consulta_entra=mysqli_query($conexion,$consulta_entrada);
                
                $consulta_id_entrada = "SELECT * FROM entry_exit where id_ingreso  =  (SELECT max(id_ingreso) FROM entry_exit)";
                $resul_consulta_id_entrada=mysqli_query($conexion,$consulta_id_entrada);
                $fila32=mysqli_fetch_array($resul_consulta_id_entrada);

                if($fila32){

                    
                    $_SESSION['ingreso'] = $fila32['id_ingreso']; 
                }
        
                header("location: ../clientes/clientes.php");
            }else{
                ?>
                <?php
                include('../index.php');
                ?>
                <h1>error</h1>
                <?php
            }
            
    
   }elseif($tipousu==2){

        $consulta = "SELECT * FROM usuarios WHERE password='$idc' and cedula = '$cc'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila=mysqli_num_rows($resultado);


            /* $_SESSION['cceduu']= $fila['cedula'];

            $_SESSION['pass']=$fila['password']; */

            $_SESSION['idc'] = $idc;
            $_SESSION['cc'] =  $cc;
        

      
        
        
            if($fila){
        
                header("location: ../admin/admin.php");
            }else{
                ?>
                <?php
                include('../index.php');
                ?>
                <h1>error</h1>
                <?php
            }

           
           

   }

   

}else {
    echo "<script> alert('ERROR AL INGRESAR VERIFIQUE SU CONTRASEÑA O ID DE COMPRA info: Para ingresar al parque necesita comprar su paquete.');
   window.location= '../index.php';
  </script>";
  exit;
}


?>




