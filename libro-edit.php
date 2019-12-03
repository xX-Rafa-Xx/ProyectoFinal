<?php
    include('database.php');
    
   $codigo_libro = $_POST['codigo_libro'];
   $nombre_libro = $_POST['nombre_libro'];
   $autor_libro = $_POST['autor_libro'];
   $tipo_de_libro = $_POST['tipo_de_libro'];
   $estado_del_libro = $_POST['estado_del_libro'];

   $sql = "UPDATE libros SET nombre_libro = '$nombre_libro', autor_libro = '$autor_libro',
   tipo_de_libro = '$tipo_de_libro', estado_del_libro = '$estado_del_libro' WHERE codigo_libro = '$codigo_libro'";
  echo mysqli_query($connection, $sql);
    if(!$result){
       die('consulta fallida');
    }

    echo "tarea modificada"; 
   /*
   echo $_POST['codigo_libro'];
   echo $_POST['nombre_libro'];
   echo $_POST['autor_libro'];
   echo $_POST['tipo_de_libro'];
   echo $_POST['estado_del_libro'];*/
   
?>