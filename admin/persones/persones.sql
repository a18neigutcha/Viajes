CREATE DATABASE IF NOT EXISTS patromvc;

CREATE TABLE IF NOT EXISTS patromvc.persones (
  id TiNYINT AUTO_INCREMENT PRIMARY KEY,
  
  nom VARCHAR(30),
  edat TINYINT,
  alcada REAL

);

INSERT INTO patromvc.persones (nom, edat, alcada) VALUES 
  ('Irene',18,1.78),
  ('Nuria',22,1.70),
  ('Joan','19',1.85),
  ('Marc','25',1.80);
  