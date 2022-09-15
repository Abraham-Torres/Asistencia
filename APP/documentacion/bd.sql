CREATE DATABASE asistencia;

USE asistencia;

CREATE TABLE Puesto(

    Id_Puesto int NOT NULL AUTO_INCREMENT,
    Puesto varchar(200),
    CONSTRAINT PK_ID_PUES PRIMARY KEY(Id_Puesto)
);

insert into Puesto(Puesto) values('Operador');

    CREATE TABLE Empleado(
    Id_Empleado int NOT NULL AUTO_INCREMENT,
    Nombre varchar(200),
    Correo varchar(100),
    Edad int,
    Password varchar(200),
    Puesto int,
    Activo boolean,
    CONSTRAINT PK_ID_EMPL PRIMARY KEY(Id_Empleado),
    CONSTRAINT FK_PUES_EMP FOREIGN KEY(Puesto) REFERENCES Puesto(Id_Puesto)
    
);


CREATE TABLE Estado(
    Id_Estado int NOT NULL AUTO_INCREMENT,
    Estado varchar(100),
    CONSTRAINT PK_ID_ESTA PRIMARY KEY(Id_Estado)
);
insert into Estado(Estado) values('Carga');

CREATE TABLE Jornada(
    Id_Jornada int NOT NULL ,
    Empleado int,
    Nombre varchar(150),
    Estado varchar(150),
    Puesto varchar(150),
    Fecha date,
    Entrada time,
    Salida time
);


CREATE TABLE Administrador(
    Id_Administrador int NOT NULL AUTO_INCREMENT,
    Nombre varchar(150),
    Correo varchar(150),
    Edad int,
    Password varchar(150),
    CONSTRAINT PK_ID_ADMI PRIMARY KEY(Id_Administrador)
     
);

insert into Administrador(Nombre,Correo,Edad,Password) 
values ('Eduardo Efrain Santos Arellano','system.otmx@gmail.com',22,'root');

CREATE TABLE Telefono_Empleado(
    Id_Telefono_Emp int NOT NULL AUTO_INCREMENT,
    Empleado int,
    Telefono varchar(10),
    CONSTRAINT PK_ID_TELE PRIMARY KEY(Id_Telefono_Emp) ,
    CONSTRAINT FK_EMPL_TEL FOREIGN KEY(Empleado) REFERENCES Empleado(Id_Empleado) 
    
);

CREATE TABLE Telefono_Administrador(
    Id_Telefono_Adm int NOT NULL AUTO_INCREMENT,
    Administrador int,
    Telefono varchar(10),
    CONSTRAINT PK_ID_TELE PRIMARY KEY(Id_Telefono_Adm),
    CONSTRAINT FK_ADMI_TEL FOREIGN KEY(Administrador) REFERENCES Administrador(Id_Administrador)
    
);
