# Instrucciones

Este repositorio contiene los pasos para crear una imagen de docker que contenga php, extensiones para la BBDD y alguna más para tratar con imágenes.

Igualmente tiene composer instalado y el instalador de symfony.

### Creación de la imagen

**docker build -t symfony-php-apache .**

### Ejecución del contenedor

Para ejecutar el contenedor, id a cualquier directorio (vacío si vamos a crear por primera vez nuestra aplicación Symfony) y ejecutad lo siguiente (el puerto y el volumen lo podéis configurar como querais):

**docker run -it --rm -p 8080:80 -v "$PWD":/application --name symfony-php symfony-php-apache bash**

### Instalar symfony skeleton (dependencias mínimas)

Para instalar symfony con las dependencias mínimas, ejecutar lo siguiente:

**composer create-project symfony/skeleton .**

Y la manera sencilla de levantar un servidor web es utilizar el servidor embebido en php (ideal para desarrollo): 

**php -S 0.0.0.0:80 -t public**

O usar el propio apache que ya está levantado.

Ahora ya podréis acceder en vuestro navegador a la url http://localhost:8080 y comprobar que symfony se ha instalado correctamente

