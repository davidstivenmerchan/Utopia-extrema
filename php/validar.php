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
        $resultado = mysqli_query($conexion, $consulta);
        $fila=mysqli_num_rows($resultado);
        
    
        $_SESSION['idq'] = $arreglo['id_qr'];
        $_SESSION['idc'] = $idc;
        $_SESSION['cc'] =  $cc;
        
        
            if($fila){
        
                header("location: ../clientes/clientes.php");
            }else{
                ?>
                <?php
                include('../index.php');
                ?>
                <h1>error</h1>
                <?php
            }
            mysqli_free_result($resultado);
            mysqli_close($conexion);
    
   }elseif($tipousu==2){

        $consulta = "SELECT * FROM usuarios WHERE password='$idc' and cedula = '$cc'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila=mysqli_num_rows($resultado);
        

      
        
        
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
            mysqli_free_result($resultado);
            mysqli_close($conexion);

   }

}


?>




