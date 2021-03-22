<?php

    require_once "../codigosQR/phpqrcode/qrlib.php";

    

    $QR = '../codigosQR/imgqr/';

    if(!file_exists($QR))
        mkdir($QR);

    $filename = $QR.'juan.png';

    $tamanio = 5;
    $level = 'Q';
    $frimeSize = 3;
    $contenido = 'que onda';

    QRcode::png($contenido, $filename, $level, $tamanio, $frimeSize);



    echo '<img src="'.$filename.'" /><hr/>';  
   


     

     





?>