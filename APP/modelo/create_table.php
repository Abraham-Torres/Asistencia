
<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "asistencias";

$conn = mysqli_connect($server, $user, $pass,$bd);

if(!$conn){
    die("coneccion faillida". mysqli_connect_error());

}

// La variable que creara la tabla en la base de datos.
$table_administrador= "CREATE TABLE administrador(
    Id_Administrador int NOT NULL AUTO_INCREMENT,
    Nombre varchar(100),
    Correo varchar(200),
    Password varchar(200),
    Edad int,
    CONSTRAINT PK_ID_ADMI PRIMARY KEY (Id_Administrador)
)";

// Condicional PHP que creará la tabla
if (mysqli_query($conn, $table_administrador)) {
    // Mostramos mensaje si la tabla ha sido creado correctamente!
        echo "Table MyGuests created successfully";
$Nombre = "Eduardo Santos";
$Correo = "system.otmx@gmail.com";
$Password = "root";
$Edad = "30";
mysqli_query($conn,"INSERT INTO administrador(Nombre,Correo,Password,Edad) VALUES ('$Nombre','$Correo','$Password','$Edad')");
        echo "TABLA CREADA CORRECTAMENTE";
    } else {
        // Mostramos mensaje si hubo algún error en el proceso de creación
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }
    // Cerramos la conexión
    mysqli_close($conn);

?>
