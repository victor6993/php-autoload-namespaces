# Instrucciones

Este repositorio contiene los pasos para crear una imagen de docker que contenga php, extensiones para la BBDD y alguna más para tratar con imágenes.

Igualmente tiene composer instalado y el instalador de symfony.

### Instrucciones para configurar XDEBUG en Visual Studio Code

Para configurar XDebug en VS Code y usarlo en este proyecto, hay que realizar los siguientes pasos:

- Instalar la extensión "PHP Debug" en VS Code.
- Abrir el proyecto en VS Code en la carpeta raiz, al mismo nivel que están los fichero Dockerfile y docker-compose.yml
- Sobre el menú de la izquierda, pulsar en la opción "Run" (representado con un triángulo que simboliza el "play" de un vídeo, bajo el dibujo de una cucaracha, "bug" en inglés)
- Pinchar sobre "create a launch.json file"
- Copiar el siguiente JSON:
~~~
{
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9000,
            "log": true,
            "externalConsole": false,
            "pathMappings": {
                "/var/www/html": "${workspaceRoot}",
            },
            "ignore": [
                "**/vendor/**/*.php"
            ]
        }
    ]
}
~~~
- Abrir un terminal, y ejecutar el comando "ifconfig"
- Obtener la dirección IP de la red llamada "docker0". Suele ser un número que empiece en 192.168 ó bien en 172
- Si la IP es distinta a 192.168.0.1, ir al fichero conf/xdebug.ini, y poner el valor correcto en el parámetro xdebug.remote_host


### Ejecución del contenedor

Disponemos de un fichero _docker-compose.yml_ con el que levantar el contenedor y al mismo tiempo creará la imagen de Docker.

Antes de levantar el contenedor tenemos que modificar el fichero _docker-compose.yml_ y sustituir los valores de user y uid por los que correspondan.

En el fichero de ejemplo están kiko y 1000 

**nota:** también se utiliza el valor 1000 para decirle al servidor Apache que se ejcute con dicho id. 

El valor 1000 es id por defecto que se crea (en distribuciones Linux como por ejemplo Ubuntu), para el primer usuario, por lo tanto es posible que 
os sirva, lo único que tenéis que hacer es es cambiar el nombre de usuario por el de vuestro usuario en vuestra máquina.

Para saber el uid y el nombre de usuario ejecutar lo siguiente:

```
id
```  

dando como resultado algo parecido a esto:
 
 ```
uid=1000(kiko) gid=1000(kiko) groups=1000(kiko),4(adm).......
```

Una vez levantado, podemos asegurarnos que está todo correcto ejecutando:

```
docker-compose ps
```

Para 'entrar' en el contenedor utilizaremos la opción **-u** para indicar el usuario creado anteriormente:

```
docker-compose exec -u kiko webserver bash
```

El puerto utilizado es el **8080**, asi que solamente tendréis que crear algún fichero en el raiz y acceder a la url
 http://localhost:8080 de vuestro navegador y ver que se ejecuta correctamente.

