
CREATE DATABASE IF NOT EXISTS viajes;

CREATE TABLE IF NOT EXISTS viajes.usuari(
	nomUsuari VARCHAR(50) PRIMARY KEY,
    pwd VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS viajes.experiencia (
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

CREATE TABLE IF NOT EXISTS viajes.categories(
	codCat TINYINT AUTO_INCREMENT PRIMARY KEY,
    nomCat VARCHAR(70)

);

CREATE TABLE IF NOT EXISTS viajes.pertany(
	codExp TINYINT,
    codCat TINYINT,
    primary key(codExp,codCat),
    FOREIGN KEY (codExp) REFERENCES experiencia(codExp) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (codCat) REFERENCES categories(codCat)  ON UPDATE CASCADE ON DELETE CASCADE
);
