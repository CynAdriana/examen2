<?php

	Echo "Iniciando proceso de transferencia de archivo</br>";


//conexion a bd
	$servername="localhost";
	$username = "root";
	$password = "";
	$database = "examen2";

	$conexion=mysqli_connect($servername,$username,$password,$database);

	//$nombre_viajero= $_POST["nombre_viajero"];
	//$fecha_viaje=$_POST["fecha_viaje"];



	if(isset($_POST["submit"])){
    echo "</br> Se presiono con un boton submit con metodo POST </br>";

    $archivoOrigen= $_FILES["fileToUpload"]["tmp_name"];
    $archivoDestino="imge/".$_FILES["fileToUpload"]["name"];
    echo "El archivo a enviar es : ".$archivoDestino."<br>";
    
    //parte 2
    $imageFileType= pathinfo($archivoDestino, PATHINFO_EXTENSION);
    
     $check = getimagesize($archivoOrigen);
    
    echo "extension del archivo: ".$imageFileType."</br>";
    
    if($imageFileType == 'gif'){
        echo "El archivo es una imagen <br>";
        
        move_uploaded_file($archivoOrigen,$archivoDestino);
        $query="INSERT INTO viajeros (id_viajero, nombre_viajero,fecha_viaje,url_boleto_avion) values (null,'$nombre_viajero','$fecha_viaje','$archivoDestino')";
        echo "query a ejecutar: ".$query."<br>";
        
        if($query_a_ejecutar=mysqli_query($conexion,$query)){
            echo "query ejecutando correctamente</br>";
            header("refresh:5; url=subirArchivo2.html");
        }else {
            echo "query no ejecutado </br>";
        }
    }else{
            echo "el archivo no es una imagen </br>";
            header("refresh:3;url=exatabla.php");
        }
}
?>