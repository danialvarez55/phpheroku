DROP DATABASE IF EXISTS reservasvuelos;
CREATE DATABASE reservasvuelos;
use reservasvuelos;
CREATE  TABLE IF NOT EXISTS pasajeros (
  DNI VARCHAR(9) NOT NULL  PRIMARY KEY,
  Nombre VARCHAR(45) NOT NULL ,
  Apellidos VARCHAR(45) NOT NULL ,
  pass VARCHAR(40)
 )ENGINE = InnoDB charset=utf8;
INSERT INTO pasajeros VALUES 
('3334445-A','Juan','Gomez Finistrosa',SHA1('Juan')),
('1234567-B','Ana','Alonso Perez',SHA1('Ana')),
('9876543-Z','Luis','Gutierrez Arenas',SHA1('Luis')),
('1222333-P','Jose','Ruiz Velasco',SHA1('Jose'));

CREATE  TABLE IF NOT EXISTS vuelos (
  Num_Vuelo VARCHAR(9) NOT NULL PRIMARY KEY,
  Origen VARCHAR(45) NOT NULL ,
  Destino VARCHAR(45) NOT NULL ,
  Hora_Salida VARCHAR(5) NULL ,
  Modelo_Avion VARCHAR(50),
  Num_Plazas_Turista int,
  Num_Plazas_Business int
   )ENGINE = InnoDB charset=utf8;
INSERT INTO `vuelos` VALUES 
('IB-3410','Valladolid','Ibiza','08:00','Boeing 747',375,100),
('AA-0025','Valladolid','A Coruña','10:00','Airbus A340',300,75),
('MH16','Valladolid','Fuerteventura','16:00','McDonnell Douglas MD-80',325,100);

CREATE  TABLE IF NOT EXISTS reservas (
  DNI VARCHAR(9) not null,
  Num_Vuelo VARCHAR(9) NOT NULL ,
  Fecha Date,
  Tipo ENUM('Turista','Business') NULL ,
  PRIMARY KEY (Num_Vuelo,DNI,Fecha),
FOREIGN KEY (DNI)
      REFERENCES pasajeros(DNI)
      ON UPDATE CASCADE ON DELETE CASCADE, 
FOREIGN KEY (Num_Vuelo)
      REFERENCES vuelos(Num_Vuelo)
      ON UPDATE CASCADE ON DELETE cascade  
)ENGINE = InnoDB charset=utf8;

INSERT INTO `reservas` VALUES 
('3334445-A','IB-3410','2016-1-1','Turista'),
('1234567-B','AA-0025','2016-1-1','Business'),
('3334445-A','IB-3410','2016-1-5','Turista');

CREATE TABLE usuarios_login(
usuario varchar(30) PRIMARY KEY,
pass    varchar(40)
);
INSERT INTO usuarios_login VALUE 
('Fernando', SHA1('Fernando')),
('Ana', SHA1('Ana')),
('profesor', SHA1('profesor')),
('Manolo', SHA1('Manolo'));
('Juan', SHA1('Juan'));
