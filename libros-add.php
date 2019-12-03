<?php

 include('database.php');
 //cuando incluyas este archivo vamos a tratar de recibir estos datos desde el navgador y vamos a comprobarlo
  //si existe la propiedad nombre                                                        
 if(isset($_POST['codigo_libro'])) {
     $codigo_libro = $_POST['codigo_libro'];  //entonces trata de procesarlo  
     $nombre_libro = $_POST['nombre_libro'];
     $autor_libro = $_POST['autor_libro'];
     $tipo_de_libro = $_POST['tipo_de_libro'];
     $estado_del_libro = $_POST['estado_del_libro'];
     $sql = "INSERT INTO libros(codigo_libro, nombre_libro, autor_libro, tipo_de_libro, estado_del_libro) values ('$codigo_libro', 
     '$nombre_libro','$autor_libro','$tipo_de_libro','$estado_del_libro')";
    echo  mysqli_query($connection, $sql);
     //comprobamos si la inserccion se ha llevado acabo bien
    //caso contrario
  
    }

?>