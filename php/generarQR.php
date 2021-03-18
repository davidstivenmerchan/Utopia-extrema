<?php

    require "../codigosQR/phpqrcode/qrlib.php";

    $QR = '../codigosQR/imgqr/';

    if(!file_exists($QR))
        mkdir($QR);

    $filename = $QR.'prueba.png';

    $tamanio = 5;
    $level = 'H';
    $frimeSize = 3;
    $contenido = 'que honda';

    QRcode::png($contenido, $filename, $level, $tamanio, $frimeSize);


    echo '<img src="'.$filename.'" /><hr/>';  
    






?>