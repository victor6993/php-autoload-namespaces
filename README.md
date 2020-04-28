# Instrucciones

Este repositorio contiene los pasos para crear una imagen de docker que contenga php, extensiones para la BBDD y alguna más para tratar con imágenes.

Igualmente tiene composer instalado y el instalador de symfony.

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

