$(document).ready(function() {
    console.log('jquery');

    let editar = false;
    $('#libros-resul').hide(); // selecciona el elemento libros-resul y ocultalo al iniciar
    fetchLibros();

    //     PARA BUSCAR                 cuando el usuario a presionado una tecla
    $('#buscar').keyup(function() {
        if ($('#buscar').val()) { //si el usuario ha tipeado algo entonces has la busqueda
            let buscar = $('#buscar').val();
            $.ajax({ //este metodo se encargara de hacer una peticion
                url: 'buscalibro.php',
                type: 'POST',
                data: { buscar },
                success: function(response) { //funcion que obtendra una respuesta del servidor

                    let libros = JSON.parse(response);
                    //console.log(libros);
                    let template = '';
                    //empieza a recorrer estas tareas y cada vez obten una unica tarea para mostrar
                    libros.forEach(libro => {
                        template += `<li>
                        ${libro.nombre_libro}
                    </li>` //estas tilde permiten poner multiples string
                    });
                    $('#container').html(template);
                    $('#libros-resul').show(); //muestra los elementos
                }
            });
        }
    });
    $('#forma').submit(function(e) { //captura la funcion del evento en e
        const postData = {
            //obten los valores de input nombre y guardalo en nombre
            nombre_libro: $('#nombre_libro').val(),
            autor_libro: $('#autor_libro').val(),
            tipo_de_libro: $('#tipo_de_libro').val(),
            estado_del_libro: $('#estado_del_libro').val(),
            codigo_libro: $('#codigo_libro').val()
        };

        //si nuestro formulario no se esta editando mandalo a agregar si esta editandose a edit.php
        let url = editar === false ? 'libros-add.php' : 'libro-edit.php';
        console.log(url)

        $.post(url, postData, function(response) {
            console.log(url);
            alert(response)
            fetchLibros(); //obten nuevamente las tareas. mostrará en tiempo real lo que se agregue a la base de datos
            $('#forma').trigger('reset');
        });
        // e.preventDefault(); //para cancelar el comportamiento por defecto del formulario
    });


    function fetchLibros() { // se ejecuta de forma asincrona
        $.ajax({
            url: 'libros-list.php',
            type: 'GET',
            success: function(response) {
                // console.log(response);
                let libros = JSON.parse(response); // error
                //  console.log(libros);
                let template = '';
                libros.forEach(libro => {
                    template += `
                    <tr libroId="${libro.codigo_libro}">
                      <td>${libro.codigo_libro}</td>
                      <td> 
                      <a href="#" class="libro-item" style="color: white;">${libro.nombre_libro}</a>
                      </td>
                     <td>${libro.autor_libro}</td>
                     <td>${libro.tipo_de_libro}</td>
                     <td>${libro.estado_del_libro}</td>
                     <td>
                       <button class=" libro-borrar btn btn-danger" >Borrar</button>
                     </td>
                    </tr> 

                `
                });
                $('#libro').html(template); //insertamos la plantilla en el id tarea
            }
        });
    }

    //PARA BORRAR
    //en el documento escucha el evento click solo de los elementos libro-borrar
    $(document).on('click', '.libro-borrar', function() { //ejecuta una funcion
        if (confirm('Estas seguro de querrer eliminar este libro?')) {
            let element = $(this)[0].parentElement.parentElement; //permite acceder al elemento padre de su elemento padre
            let id = $(element).attr('libroId'); //selecciona el elemento que tenga el atributo tareaId
            //enviamos el id al backed
            $.post('libro-borrar.php', { id }, function(response) { //mandalo a libroborrar y crea una funcion que escuche una respuesta
                fetchLibros();
                // alert(response);
            });

        }
    });

    //PARA EDITAR  ----------------------> AHORA SI VIENE LO MAS COMPLICADO :(
    $(document).on('click', '.libro-item', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('libroId');
        $.post('libro-single.php', { id }, function(response) {
            const libro = JSON.parse(response);
            //alert(response) //muestra los datos 

            $('#codigo_libro').val(libro.codigo_libro);
            $('#nombre_libro').val(libro.nombre_libro);
            $('#autor_libro').val(libro.autor_libro);
            $('#tipo_de_libro').val(libro.tipo_de_libro);
            $('#estado_del_libro').val(libro.estado_del_libro);
            // alert(response);
            editar = true;
        })
    });

});
s