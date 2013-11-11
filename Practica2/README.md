##Práctica 2: Aislamiento de una aplicación web 

###Crear una mini-aplicación web (un hola mundo o un simple formulario) y aislarlo en una jaula chroot.

Para la realización de la práctica, he instalado una jaula ubuntu, y para la instalación he utilizado debootstrap, en detrimento a las otras herramientas presentadas en clase, ya que su simplicidad y eficiencia me sorprendió desde el mismo día que empezamos este tema. De modo que:

     sudo debootstrap --arch=amd64 quantal /home/quantal/	http://archive.ubuntu.com/ubuntu

Y para ejecutar/instalar aplicaciones hemos realizado lo siguiente:

Nos metemos la jaula mediante chroot:

![captura 1 ] (https://dl.dropbox.com/s/p55ycry4g5zfyav/pantallazo1.png)

y realizamos el siguiente montaje, para poder usar e instalar software en nuestra jaula:

       mount -t proc proc /proc

Y llegados a este punto, ya podemos proceder a instalar lo necesario, para que funcione nuestra aplicación:

- Instalamos apache:

        apt-get update
        apt-get install apache2

- Observamos la IP de nuestra jaula servidor:

![captura 2] (https://dl.dropbox.com/s/1s40vfqfdor5f99/pantallazo2.png)

- Instalamos mysql en nuestra jaula aunque no nos haga falta en esta aplicación, ya que es algo indispensable en un servidor, y así lo tenemos por si nos hiciera falta en el futuro.

         apt-get install mysql-server
         
Si nos diera error al instalarse, probablemente sería, porque en la máquina anfitriona ya esté corriendo mysql, por lo que al parar dicho servicio, podrá instalarse perfectamente.

- Instalamos php:

         apt-get install php5 libapache2-mod-php5
         apt-get install phpmyadmin

- Y terminamos instalando los siguientes paquetes necesarios para que funcione nuestra jaula/servidor

         apt-get install php5-mysql php5-curl php5-gd php5-idn php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl


###2º parte - aplicación

He creado una aplicación php que consiste en una calculadora web, bajo plantilla html gratuita y libre de:

        [Free Web Templates -- http://freewebsitetemplates.com]

![pantallazo 4](https://dl.dropbox.com/s/3mqff4mfeik3hyi/pantallazo4.jpg)

Una vez realizada la aplicación, la pasamos a la carpeta /var/www/ de nuestra jaula mediante:

![pantallazo 5](https://dl.dropbox.com/s/m9kncg10cpgkobm/pantallazo5.jpg)

Y ya podemos visualizar y probar nuestra aplicación, introduciendo en el navegador la IP de la jaula, seguida de la dirección donde se encuentra dicha aplicación:

![pantallazo 6] (https://dl.dropbox.com/s/z379h1cbxwe6ot1/pantallazo6.jpg)



