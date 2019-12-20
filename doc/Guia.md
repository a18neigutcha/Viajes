# Viajes
Guia de uso

## Instalacion

  Requisitos:
    - La pagina web esta pensada para ser desplegada en un servidor apache.
    - Una base de datos mysql.

  Proceso:
    Si ya cuentas con un servidor apache y el mysql primero que nada es necesario hacer un clone del repositorio del proyecto.
    Para eso necesitas ejecutar esta linea de comando en la termina desde el directorio "/var/www/html".

      git clone https://github.com/a18neigutcha/Viajes.git

    Despues de eso necesitas crear una base de datos en el mysqladmin ejecutando el script que hay en el repositorio que se clono del proyecto
    
       bd/viajes.sql
    
    Para llenar la base de datos ejecuta el script en

      bd/pruebas.sql

## Distribucion del repositorio

  El repositorio git se destribuye de la siguiente manere.

    - index.php
    - api.php
    - README.md
    - admin/
    - bd/
    - css/
    - doc/
    - img/
    - js/
    - pass/

### index.php

 El fichero index contiene toda la disctribucion inicial de la pagina web y es el que llama tanto al script.js y al css.
 La pagina web usa distribucion bootstrap. 


  
  
