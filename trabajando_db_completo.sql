
CREATE DATABASE IF NOT EXISTS trabajando_db;
USE trabajando_db;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    contraseña VARCHAR(100)
);

-- Tabla de contacto
CREATE TABLE IF NOT EXISTS contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    email VARCHAR(100),
    telefono VARCHAR(20),
    mensaje TEXT
);

-- Tabla de reservas
CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    tipo_palco VARCHAR(50),
    email VARCHAR(100),
    telefono VARCHAR(20),
    fecha_reserva DATE,
    hora_reserva TIME,
    lugar VARCHAR(100)
);

-- Datos de ejemplo para usuarios
INSERT INTO usuarios (nombre, apellido, email, contraseña) VALUES
('Carlos', 'Pérez', 'carlos.perez@email.com', 'clave123'),
('Laura', 'Gómez', 'laura.gomez@email.com', 'segura456');

-- Datos de ejemplo para contacto
INSERT INTO contacto (nombre, apellido, email, telefono, mensaje) VALUES
('Ana', 'Ramírez', 'ana.ramirez@email.com', '3001234567', 'Quiero más información sobre los palcos.'),
('Luis', 'Martínez', 'luis.martinez@email.com', '3107654321', '¿Cómo hago una reserva para el sábado?');

-- Datos de ejemplo para reservas
INSERT INTO reservas (nombre, apellido, tipo_palco, email, telefono, fecha_reserva, hora_reserva, lugar) VALUES
('Carlos', 'Pérez', 'VIP', 'carlos.perez@email.com', '3001112233', '2025-05-10', '22:00:00', 'El Centro'),
('Laura', 'Gómez', 'Plata', 'laura.gomez@email.com', '3012223344', '2025-05-11', '21:30:00', 'La Castellana');
