-- CREATE DATABASE BY GRUPO2
CREATE DATABASE SHOPPINGCART;
USE SHOPPINGCART;

CREATE TABLE Departamento (
    id_departamento INT PRIMARY KEY AUTO_INCREMENT,
    nombre_departamento VARCHAR(50) NOT NULL
);

CREATE TABLE Municipio (
    id_municipio INT PRIMARY KEY AUTO_INCREMENT,
    nombre_municipio VARCHAR(50) NOT NULL,
    id_departamento INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamento(id_departamento)
);

CREATE TABLE Usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(30) NOT NULL,
    apellidos VARCHAR(30) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(16) NOT NULL,
    direccion VARCHAR(80) NOT NULL,
    id_municipio INT NOT NULL,
    password VARCHAR(80) NOT NULL,
    foto_perfil BLOB,
    acepto_terminos BOOLEAN NOT NULL,
    FOREIGN KEY (id_municipio) REFERENCES Municipio(id_municipio)
);

CREATE TABLE Producto (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR(100) NOT NULL,
    precio_producto DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

CREATE TABLE Carrito (
    id_carrito INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

CREATE TABLE Carrito_Producto (
    id_carrito_producto INT PRIMARY KEY AUTO_INCREMENT,
    id_carrito INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_carrito) REFERENCES Carrito(id_carrito),
    FOREIGN KEY (id_producto) REFERENCES Producto(id_producto)
);

INSERT INTO municipio (id_municipio, nombre_municipio, id_departamento)
VALUES (11,"POPAYAN", 1);

INSERT INTO departamento (id_departamento, nombre_departamento)
VALUES (1,"CAUCA");