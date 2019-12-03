<?php

 include('database.php');

 $query = "SELECT * FROM libros";
  $result = mysqli_query($connection, $query);

 if(!$result){
    die('Query Failed'. mysqli_error($connection));
 }

 $json = array();
 while($row = mysqli_fetch_array($result)){ //obtengo una fila por cada dato de la base de datos
        $json[] = array(   
         'codigo_libro' => $row ['codigo_libro'],
         'nombre_libro' => $row['nombre_libro'],
         'autor_libro' => $row['autor_libro'],
         'tipo_de_libro' => $row['tipo_de_libro'],
         'estado_del_libro' => $row['estado_del_libro']
    
        );
    }
 $jsonstring = json_encode($json); //codificalo
 echo $jsonstring;



?>