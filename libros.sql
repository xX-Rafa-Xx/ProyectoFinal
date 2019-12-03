CREATE database biblioteca
	CREATE TABLE libros (
    codigo_libro int(10) primary key,
    nombre_libro varchar(30) not null,
    autor_libro varchar(30) not null,
    tipo_de_libro varchar(30) not null,
    estado_del_libro varchar(12) not null
		)
    CREATE UNIQUE INDEX INDICE1 ON libros (codigo_libro)

	CREATE TABLE usuario (
    id int (10) PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(30) not null,
    apellido varchar(30) not null,
    user varchar(8) not null,
    contraseña varchar(10) not null,
    tipo_de_usuario varchar(12) not null
            
    )
        CREATE UNIQUE INDEX INDICE2 ON usuario (user)

		INSERT INTO usuario VALUES ('','rafael','inclan','rafa','rony','admin')





    CREATE TABLE prestarlibros (
    matricula int (6) primary key,
    alumno varchar(30) not null,
    apellido varchar(30) not null,
    nombre_libro varchar(30) not null,
    codigo_libro int (10) not null,

    FOREIGN KEY(codigo_libro) REFERENCES libros(codigo_libro)

    )
      INSERT into prestarlibros VALUES ('59025','raf','inclan','python','22222')
     INSERT into prestarlibros VALUES ('59075','raf','inclan','python','20002')

    
  

  

