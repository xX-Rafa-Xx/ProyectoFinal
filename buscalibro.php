<?php

 include('database.php');

 $buscar = $_POST['buscar'];

 if(!empty($buscar)) { //si este valor no esta vcio vamos a tratar de vbuscar en la base de datos
    $query = "SELECT * FROM libros WHERE nombre_libro LIKE '$buscar%' "; //has una busqueda en donde el nombre coincida con lo que estamos recibiendo por medio de $buscar

    $result = mysqli_query($connection, $query); //funcion para ejecutar la consulta
    if(!$result) { //si no obtienes un resultado de la base de datos
       die('Query Error'. mysqli_error($connection)); //termina el proceso
    }
 
    //si obtuviste un resultado conviertelo en formato JSON para devolverselo al frontend
    //convierte en array y dale el valor del resultado
    $json = array(); //crea una variable de tipo json
    while($row = mysqli_fetch_array($result)){
       //por cada recorrido llena la variable
       $json[] = array(   //tu vendras desde la base de datos. la fila del nombre
           'nombre_libro' => $row['nombre_libro'],
           'autor_libro' => $row['autor_libro'],
           'tipo_de_libro' => $row['tipo_de_libro'],

           'estado_del_libro' => $row['estado_del_libro'],
           'codigo_libro' => $row['codigo_libro']  
         );
    }
     //desconvierte y pasale la variable para mandarlo
    $jsonstring = json_encode($json);
    echo $jsonstring; //devuelve este echo string

}
?>