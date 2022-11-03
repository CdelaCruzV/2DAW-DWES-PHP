<?php

    $CONEX = mysqli_connect('localhost','root','','viajes');
    $CONEX -> set_charset('utf8');

    $SQL = "
        INSERT INTO CLIENTES (NOMBRE,APELLIDOS,FNACI,EMAIL,COLORF) VALUES
        ('".$_POST['nom']."','".$_POST['apel']."','".$_POST['fecha']."','".$_POST['correo']."','".$_POST['color']."');    
    ";

    mysqli_query($CONEX,$SQL);


    mysqli_close($CONEX);
?>