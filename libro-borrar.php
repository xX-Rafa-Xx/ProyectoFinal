<?php

   include('database.php');
   if(isset($_POST['id'])){
     $id = $_POST['id'];
     $query = "DELETE FROM libros WHERE codigo_libro= $id";
     $result = mysqli_query($connection, $query);
     if(!$result) {
          die('Fallo al modificiacion.');
        }
     echo "Libro eliminado correctamente";
    }

?>