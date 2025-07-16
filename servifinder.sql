DROP DATABASE IF EXISTS servifinder;
CREATE DATABASE IF NOT EXISTS servifinder;
USE servifinder;


-- Tabla de usuarios
CREATE TABLE TUsuarios (
  Id_Usuario INT PRIMARY KEY AUTO_INCREMENT,
  Rol ENUM('Administrador', 'Usuario') NOT NULL DEFAULT 'Usuario',
  Correo VARCHAR(100) NOT NULL UNIQUE,
  Foto varchar(100) not null,
  Estado boolean not null DEFAULT TRUE,
  FechaCreacion date not null,
  password VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Comentarios generales de la página
CREATE TABLE ComentariosPag (
  Id_CPagina INT PRIMARY KEY AUTO_INCREMENT,
  Comentario VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Clientes
CREATE TABLE Clientes (
  Id_Cliente INT PRIMARY KEY AUTO_INCREMENT,
  CURP VARCHAR(18) UNIQUE,
  Nombre VARCHAR(50) NOT NULL,
  F_Nacimiento DATE NOT NULL,
  Genero ENUM('M', 'F', 'no binario') NOT NULL,
  Correo VARCHAR(50) NOT NULL UNIQUE,
  Direccion VARCHAR(200) NOT NULL,
  Id_Usuario INT NOT NULL,
  FOREIGN KEY (Id_Usuario) REFERENCES TUsuarios(Id_Usuario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Comentario en página hecho por cliente
CREATE TABLE ComentarioPagClien (
  Id_ComentarioClien INT PRIMARY KEY AUTO_INCREMENT,
  Id_ComentarioPag INT NOT NULL,
  Id_Cliente INT NOT NULL,
  FOREIGN KEY (Id_ComentarioPag) REFERENCES ComentariosPag(Id_CPagina)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Cliente) REFERENCES Clientes(Id_Cliente)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Doctores
CREATE TABLE Doctores (
  Id_Doctor INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(100) NOT NULL,
  Cedula VARCHAR(50) NOT NULL,
  Telefono varchar(20) not null,
  F_Nacimiento DATE NOT NULL,
  Idioma VARCHAR(50) NOT NULL,
  Descripcion VARCHAR(300) NOT NULL,
  Genero ENUM('M', 'F', 'no binario') NOT NULL NOT NULL,
  Id_Usuario INT NOT NULL,
  FOREIGN KEY (Id_Usuario) REFERENCES TUsuarios(Id_Usuario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Especialidades
CREATE TABLE Especialidad (
  Id_Especialidad INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Asociación doctor-especialidad
CREATE TABLE DocEsp (
  Id_DocEsp INT PRIMARY KEY AUTO_INCREMENT,
  Id_Doctor INT NOT NULL,
  Id_Especialidad INT NOT NULL,
  Costo DECIMAL(6,2),
  Horario VARCHAR(50),
  Dias_labo VARCHAR(50),
  DireccionyRef VARCHAR(300) NOT NULL,
  FOREIGN KEY (Id_Doctor) REFERENCES Doctores(Id_Doctor)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Especialidad) REFERENCES Especialidad(Id_Especialidad)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Reseñas a doctores
CREATE TABLE ReseñaDoc (
  Id_ReseñaDoc INT PRIMARY KEY AUTO_INCREMENT,
  Fecha_hora DATETIME NOT NULL,
  Puntuacion INT CHECK (Puntuacion BETWEEN 1 AND 5),
  Comentario VARCHAR(300),
  NombreUsr varchar(50) NOT NULL,
  Id_Doctor INT NOT NULL,
  FOREIGN KEY (Id_Doctor) REFERENCES Doctores(Id_Doctor)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Comentario página sobre doctores
CREATE TABLE ComentarioPagDoc (
  Id_ComentarioDoc INT PRIMARY KEY AUTO_INCREMENT,
  Id_Doctor INT NOT NULL,
  Id_ComentarioPag INT NOT NULL,
  FOREIGN KEY (Id_ComentarioPag) REFERENCES ComentariosPag(Id_CPagina)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Doctor) REFERENCES Doctores(Id_Doctor)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Profesionistas
CREATE TABLE Profesionistas (
  Id_Profesionista INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(100) NOT NULL,
  Telefono varchar(20) NOT NULL,
  Idiomas VARCHAR(50) NOT NULL,
  Genero ENUM('M', 'F', 'no binario') NOT NULL,
  Descripcion VARCHAR(300) NOT NULL,
  F_Nacimiento DATE NOT NULL,
  Id_Usuario INT NOT NULL,
  FOREIGN KEY (Id_Usuario) REFERENCES TUsuarios(Id_Usuario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Servicios
CREATE TABLE Servicios (
  Id_Servicio INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Asociación profesionista-servicio
CREATE TABLE ProfServ (
  Id_ProfServ INT PRIMARY KEY AUTO_INCREMENT,
  Id_Profesionista INT NOT NULL,
  Id_Servicio INT NOT NULL,
  Costo DECIMAL(8, 2),
  Horario VARCHAR(50),
  Dias_labo VARCHAR(50),
  DireccionyRef VARCHAR(300) NOT NULL,
  FOREIGN KEY (Id_Profesionista) REFERENCES Profesionistas(Id_Profesionista)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Servicio) REFERENCES Servicios(Id_Servicio)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Reseñas a profesionistas
CREATE TABLE ReseñaProf (
  Id_ReseñaProf INT PRIMARY KEY AUTO_INCREMENT,
  Fecha_hora DATETIME NOT NULL,
  Puntuacion INT CHECK (Puntuacion BETWEEN 1 AND 5),
  Comentario VARCHAR(300),
  NombreUsr varchar(50),
  Id_Profesionista INT NOT NULL,
  FOREIGN KEY (Id_Profesionista) REFERENCES Profesionistas(Id_Profesionista)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Comentario página sobre profesionistas
CREATE TABLE ComentarioPagProf (
  Id_ComentarioProf INT PRIMARY KEY AUTO_INCREMENT,
  Id_Profesionista INT NOT NULL,
  Id_ComentarioPag INT NOT NULL,
  FOREIGN KEY (Id_ComentarioPag) REFERENCES ComentariosPag(Id_CPagina)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Profesionista) REFERENCES Profesionistas(Id_Profesionista)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Establecimientos
CREATE TABLE Establecimientos (
  Id_Establecimiento INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(100),
  Descripcion VARCHAR(300),
  Horario VARCHAR(50),
  Dias_labo VARCHAR(50),
  Foto varchar(100),
  DireccionyRef VARCHAR(300)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Reseñas a establecimientos
CREATE TABLE ReseñaEst (
  Id_ReseñaEst INT PRIMARY KEY AUTO_INCREMENT,
  Comentario VARCHAR(300),
  Puntuacion INT CHECK (Puntuacion BETWEEN 1 AND 5),
  Fecha_Hora DATETIME,
  NombreUsr VARCHAR(50) not null,
  Id_Establecimiento INT,
  FOREIGN KEY (Id_Establecimiento) REFERENCES Establecimientos(Id_Establecimiento)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- aquí entran las Citas
CREATE TABLE Cita (
  Id_Cita INT PRIMARY KEY AUTO_INCREMENT,
  Id_Cliente INT NOT NULL,
  Id_Doctor INT NOT NULL,
  Detalle VARCHAR(300) NOT NULL,
  FechaHora_Realizacion DATETIME NOT NULL,
  FechaHora_Cita DATETIME NOT NULL default 'curdate()',
  Estado ENUM('Pendiente','Aceptada','Rechazada') NOT NULL DEFAULT 'Pendiente',
  FOREIGN KEY (Id_Cliente) REFERENCES Clientes(Id_Cliente)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Doctor) REFERENCES Doctores(Id_Doctor)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into Servicios(Nombre) values('Albañil');
insert into Servicios(Nombre) values('Trailero');

insert into Especialidad(Nombre) values('ginecólogo');
insert into Especialidad(Nombre) values('Donanciano');
