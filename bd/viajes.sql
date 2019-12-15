
/*CREATE DATABASE IF NOT EXISTS viajes;*/
USE a18NeiGutCha_viajes;
CREATE TABLE IF NOT EXISTS usuari(
	nomUsuari VARCHAR(50) PRIMARY KEY,
    pwd VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS experiencia (
  codExp TiNYINT AUTO_INCREMENT PRIMARY KEY,
  titol VARCHAR(30),
  data DATE,
  text VARCHAR (50),
  imatge VARCHAR (50),
  coordenades VARCHAR(300),
  valPos INT,
  valNeg INT,
  estat VARCHAR (50),
  usuari VARCHAR (50),
  FOREIGN KEY (usuari) REFERENCES usuari(nomUsuari) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS categories(
	codCat TINYINT AUTO_INCREMENT PRIMARY KEY,
    nomCat VARCHAR(70)

);

CREATE TABLE IF NOT EXISTS pertany(
	codExp TINYINT,
    codCat TINYINT,
    primary key(codExp,codCat),
    FOREIGN KEY (codExp) REFERENCES experiencia(codExp) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (codCat) REFERENCES categories(codCat)  ON UPDATE CASCADE ON DELETE CASCADE
);
