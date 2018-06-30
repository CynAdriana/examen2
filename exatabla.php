<HTML>
    <HEAD>
        <TITLE>Examen Parcial 2</TITLE>
            <meta charset="utf-8">
         
    </HEAD>
    <body>
        <?PHP
        //paso1. conectarse a bd
        //1.1 datos de la conexion
        $servername="localhost";
        $database ="examen2";
        $username="root";
        $password="";
       
        //1.2 funcion para conectarnos
        $conexion= mysqli_connect($servername,$username,$password,$database);
        
            
        //bandera que monitorea
            $banderaconexion=true;
        if($conexion){
            echo "conexion exitosa<br>";
        }else{
            echo "conexion fallida<br>";
            $banderaconexion=false;
        }
        //2.consulta
        if($banderaconexion==true){
            echo "Ejecutando consulta<br>";
            $query="SELECT * FROM viajeros";
            
            echo $query."<br>";
            $resultados=mysqli_query($conexion,$query);
            
            
            //validar la ejecucion
            $banderaconsulta=true;
            
            if(mysqli_query($conexion,$query)){
                echo "consulta ejecutada con exito<br>";
            }else{
                echo"consulta fallida<br>";
                $banderaconsultada=false;
            }
            if($banderaconsulta==true){
                //estableciendo el limite del arreglo, delimitandolo por 
                $num_filas=mysqli_num_rows(mysqli_query($conexion,$query));
                echo"imprimiendo".$num_filas." resultados</br>";
            }
            else{
                echo"no se imprimiran resultados</br>";
            }
        }else{
            echo"no se ejecutara la conexion po palla de conexion <br>";
        }
        
        
    echo "<H1>Lista de registros </H1>";
        // 3.imprimiendo registros
        echo "<table border =1>";
                ECHO "<TH> id_viajero </TH>";
				ECHO "<TH> nombre_viajero </TH>";
				ECHO "<TH> fecha_viaje </TH>";
				ECHO "<TH> url_boleto_avion </TH>";

         //3.1 implementando ciclo while
        while($i= $row =mysqli_fetch_array($resultados,MYSQLI_ASSOC)){
         //3.2 atrapar los indices
            $id_viajero=$row['id_viajero'];
            $nombre_viajero=$row['nombre_viajero'];
            $fecha_viaje=$row['fecha_viaje'];
            $url_boleto_avion =$row['url_boleto_avion'];
           
            //3.3 imprimir resultados
            echo "<tr>";
            echo "<td>".$id_viajero."</td>";
            echo "<td>".$nombre_viajero."</td>";
            echo "<td>".$fecha_viaje."</td>";
            echo "<td> <img src='".$url_boleto_avion."' width=100 height=100> </td>";
            
            echo "</tr>";
        }
        echo "</table>";
        echo "<td> </td>";
        
        ?>
       
    </body>
</HTML>
    
