<?php

   include('database.php');
   $id = $_POST['id'];
   $query = "SELECT * FROM libros WHERE codigo_libro = $id";
   $result = mysqli_query($connection, $query);

   if(!$result) {
      die('consulta Failed.');
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
    //envialo al frontend como un string
   $jsonstring = json_encode($json[0]); //codifica el primer elemento
       echo $jsonstring;




?>