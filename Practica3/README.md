##Práctica 3 

###Prueba de configuraciones de distintas máquinas virtuales, como servidores, y elección de la mejor:



Vamos a desarrollar la práctica con máquinas virtuales proporcionadas por Windows Azure, conectándonos con ellas por SSH.

Hemos ejecutado la aplicación que  utilizamos en la pasada práctica, que se puede descargar en el siguiente enlace: https://github.com/rafaelgonz/Practicas/tree/master/Practica2/calculadora


Y para la configuración de las mismas, hemos realizado lo siguiente:

1. Instalar apache: sudo apt-get install apache2

2. Instalar git: sudo apt-get install git

3. Clonar repositorio con web: git clone git://github.com/rafaelgonz/Practicas

4. Mover la carpeta calculadora a /var/www con: sudo mv calculadora /var/www/

5. Ejecutar apache benchmark con el siguiente comando:
    ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php

De modo que se solicitará la página 1000 veces de 5 en 5


Dicho esto, la batería de pruebas es la siguiente:



###1º PRUEBA

* Sistema Operativo: Ubuntu server 13.10
* Configuración: 1 núcleo,  1.75 GB

    

![pantallazo1](https://dl.dropbox.com/s/slczqwql5e7bhpb/pantallazo1.png)

![pantallazo2](https://dl.dropbox.com/s/er35p8fouijqafh/pantallazo2.png)

Nos conectamos mediante SSH:

![pantallazo3](https://dl.dropbox.com/s/bweeonagdgy06h5/pantallazo3.png)

Ahora instalamos apache y git, tal y como hemos explicado al principio de esta práctica, y nos descargamos el repositorio de prácticas, para tener la aplicación que vamos a probar:



![pantallazo4](https://dl.dropbox.com/s/f4ej2b24ms6tau1/pantallazo4.png)

y movemos los ficheros en cuestión a /var/www/ y mediante curl, comprobamos la página php:

![pantallazo5](https://dl.dropbox.com/s/fm9jdyzkovsfv43/pantallazo5.png)

Y ya sólo falta...


        azureuser@ivubuntu1:/var/www$ ab -n 1000 -c 5 http://127.0.0.1/calculadora.php 
        This is ApacheBench, Version 2.3 <$Revision: 1430300 $> 
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/ 
        Licensed to The Apache Software Foundation, http://www.apache.org/ 
        
        Benchmarking 127.0.0.1 (be patient) 
        Completed 100 requests 
        Completed 200 requests 
        Completed 300 requests 
        Completed 400 requests 
        Completed 500 requests 
        Completed 600 requests 
        Completed 700 requests 
        Completed 800 requests 
        Completed 900 requests 
        Completed 1000 requests 
        Finished 1000 requests 
        
        
        Server Software:        Apache/2.4.6 
        Server Hostname:        127.0.0.1 
        Server Port:            80 
        
        Document Path:          /calculadora.php 
        Document Length:        3109 bytes 
        
        Concurrency Level:      5 
        Time taken for tests:   0.285 seconds 
        Complete requests:      1000 
        Failed requests:        0 
        Write errors:           0 
        Total transferred:      3332000 bytes 
        HTML transferred:       3109000 bytes 
        Requests per second:    3502.73 [#/sec] (mean) 
        Time per request:       1.427 [ms] (mean) 
        Time per request:       0.285 [ms] (mean, across all concurrent requests) 
        Transfer rate:          11397.54 [Kbytes/sec] received 
        
        Connection Times (ms) 
                      min  mean[+/-sd] median   max 
        Connect:        0    0   0.1      0       1 
        Processing:     0    1   0.3      1       5 
        Waiting:        0    1   0.3      1       5 
        Total:          1    1   0.3      1       5 
        
        Percentage of the requests served within a certain time (ms) 
          50%      1 
          66%      1 
          75%      1 
          80%      1 
          90%      1 
          95%      2 
          98%      2 
          99%      2 
         100%      5 (longest request) 




###2º PRUEBA

* S.O -> Ubuntu server 12.04
* Configuración: 1 núcleo,  1.75 GB
    
![pantallazo7](https://raw2.github.com/rafaelgonz/Practicas/master/Practica3/pantallazos/pantallazo7.png)

Nos conectamos por ssh, y realizamos lo mismo que en el apartado anterior:

![pantallazo8](https://raw2.github.com/rafaelgonz/Practicas/master/Practica3/pantallazos/pantallazo8.png)

Y ahora ejecutamos apache benchmark:


        azureuser@ivubuntu2:/var/www/calculadora$ ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php
        This is ApacheBench, Version 2.3 <$Revision: 655654 $>
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
        Licensed to The Apache Software Foundation, http://www.apache.org/
        
        Benchmarking 127.0.0.1 (be patient)
        Completed 100 requests
        Completed 200 requests
        Completed 300 requests
        Completed 400 requests
        Completed 500 requests
        Completed 600 requests
        Completed 700 requests
        Completed 800 requests
        Completed 900 requests
        Completed 1000 requests
        Finished 1000 requests
        
        
        Server Software:        Apache/2.2.22
        Server Hostname:        127.0.0.1
        Server Port:            80
        
        Document Path:          /calculadora/calculadora.php
        Document Length:        3109 bytes
        
        Concurrency Level:      5
        Time taken for tests:   0.248 seconds
        Complete requests:      1000
        Failed requests:        0
        Write errors:           0
        Total transferred:      3378000 bytes
        HTML transferred:       3109000 bytes
        Requests per second:    4025.72 [#/sec] (mean)
        Time per request:       1.242 [ms] (mean)
        Time per request:       0.248 [ms] (mean, across all concurrent requests)
        Transfer rate:          13280.15 [Kbytes/sec] received
        
        Connection Times (ms)
                      min  mean[+/-sd] median   max
        Connect:        0    0   0.1      0       1
        Processing:     0    1   2.2      1      51
        Waiting:        0    1   1.6      0      51
        Total:          0    1   2.2      1      51
        
        Percentage of the requests served within a certain time (ms)
          50%      1
          66%      1
          75%      1
          80%      1
          90%      2
          95%      2
          98%      4
          99%      6
         100%     51 (longest request)



Hasta ahora, los tiempos han sido mejores los de ubuntu 12.04, así que vamos a probar con ubuntu 12.10, para ver las posibles diferencias.


###3º PRUEBA

        
* Sistema Operativo: Ubuntu server 12.10
* Configuración: 1 núcleo,  1.75 GB
    
        azureuser@ivubuntu3:~/Practicas/Practica2$ ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php
        This is ApacheBench, Version 2.3 <$Revision: 655654 $>
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
        Licensed to The Apache Software Foundation, http://www.apache.org/
        
        Benchmarking 127.0.0.1 (be patient)
        Completed 100 requests
        Completed 200 requests
        Completed 300 requests
        Completed 400 requests
        Completed 500 requests
        Completed 600 requests
        Completed 700 requests
        Completed 800 requests
        Completed 900 requests
        Completed 1000 requests
        Finished 1000 requests
        
        
        Server Software:        Apache/2.2.22
        Server Hostname:        127.0.0.1
        Server Port:            80
        
        Document Path:          /calculadora/calculadora.php
        Document Length:        3109 bytes
        
        Concurrency Level:      5
        Time taken for tests:   0.264 seconds
        Complete requests:      1000
        Failed requests:        0
        Write errors:           0
        Total transferred:      3339000 bytes
        HTML transferred:       3109000 bytes
        Requests per second:    3789.66 [#/sec] (mean)
        Time per request:       1.319 [ms] (mean)
        Time per request:       0.264 [ms] (mean, across all concurrent requests)
        Transfer rate:          12357.10 [Kbytes/sec] received
        
        Connection Times (ms)
                      min  mean[+/-sd] median   max
        Connect:        0    0   0.1      0       2
        Processing:     0    1   0.3      1       5
        Waiting:        0    1   0.3      1       5
        Total:          0    1   0.3      1       5
        
        Percentage of the requests served within a certain time (ms)
          50%      1
          66%      1
          75%      1
          80%      1
          90%      1
          95%      2
          98%      2
          99%      2
         100%      5 (longest request)
         
         
###4º PRUEBA
    
    
* Sistema operativo: Ubuntu server 13.04
* Configuración: 1 núcleo,  1.75 GB
            
        
        azureuser@ivubuntu5:~/Practicas/Practica2$  ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php
        This is ApacheBench, Version 2.3 <$Revision: 655654 $>
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
        Licensed to The Apache Software Foundation, http://www.apache.org/
        
        Benchmarking 127.0.0.1 (be patient)
        Completed 100 requests
        Completed 200 requests
        Completed 300 requests
        Completed 400 requests
        Completed 500 requests
        Completed 600 requests
        Completed 700 requests
        Completed 800 requests
        Completed 900 requests
        Completed 1000 requests
        Finished 1000 requests
        
        
        Server Software:        Apache/2.2.22
        Server Hostname:        127.0.0.1
        Server Port:            80
        
        Document Path:          /calculadora/calculadora.php
        Document Length:        3109 bytes
        
        Concurrency Level:      5
        Time taken for tests:   0.276 seconds
        Complete requests:      1000
        Failed requests:        0
        Write errors:           0
        Total transferred:      3339000 bytes
        HTML transferred:       3109000 bytes
        Requests per second:    3621.25 [#/sec] (mean)
        Time per request:       1.381 [ms] (mean)
        Time per request:       0.276 [ms] (mean, across all concurrent requests)
        Transfer rate:          11807.95 [Kbytes/sec] received
        
        Connection Times (ms)
                      min  mean[+/-sd] median   max
        Connect:        0    0   0.1      0       2
        Processing:     0    1   0.6      1      17
        Waiting:        0    1   0.6      1      17
        Total:          0    1   0.6      1      17
        
        Percentage of the requests served within a certain time (ms)
          50%      1
          66%      1
          75%      1
          80%      1
          90%      2
          95%      2
          98%      2
          99%      3
          100%     17 (longest request)


###5º PRUEBA

    
* Sistema Operativo: Ubuntu server 12.04
* Configuración: 2 núcleos,  3.75 GB
    
![pantallazo9](https://raw2.github.com/rafaelgonz/Practicas/master/Practica3/pantallazos/pantallazo9.png)

        azureuser@ivubuntu4:~/Practicas/Practica2$ ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php
        This is ApacheBench, Version 2.3 <$Revision: 655654 $>
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
        Licensed to The Apache Software Foundation, http://www.apache.org/
        
        Benchmarking 127.0.0.1 (be patient)
        Completed 100 requests
        Completed 200 requests
        Completed 300 requests
        Completed 400 requests
        Completed 500 requests
        Completed 600 requests
        Completed 700 requests
        Completed 800 requests
        Completed 900 requests
        Completed 1000 requests
        Finished 1000 requests
        
        
        Server Software:        Apache/2.2.22
        Server Hostname:        127.0.0.1
        Server Port:            80
        
        Document Path:          /calculadora/calculadora.php
        Document Length:        3109 bytes
        
        Concurrency Level:      5
        Time taken for tests:   0.198 seconds
        Complete requests:      1000
        Failed requests:        0
        Write errors:           0
        Total transferred:      3378000 bytes
        HTML transferred:       3109000 bytes
        Requests per second:    5044.70 [#/sec] (mean)
        Time per request:       0.991 [ms] (mean)
        Time per request:       0.198 [ms] (mean, across all concurrent requests)
        Transfer rate:          16641.59 [Kbytes/sec] received
        
        Connection Times (ms)
                      min  mean[+/-sd] median   max
        Connect:        0    0   0.1      0       1
        Processing:     0    1   0.4      1       4
        Waiting:        0    1   0.4      1       4
        Total:          0    1   0.5      1       5
        
        Percentage of the requests served within a certain time (ms)
          50%      1
          66%      1
          75%      1
          80%      1
          90%      2
          95%      2
          98%      2
          99%      3
         100%      5 (longest request)

###PRUEBA 6º

* Sistema operativo: Ubuntu server 12.04
* Configuración: núcleo compartido,  0.75 GB
    
![pantallazo10](https://raw2.github.com/rafaelgonz/Practicas/master/Practica3/pantallazos/pantallazo10.png)

        azureuser@ivubuntu6:~/Practicas/Practica2$ ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php
        This is ApacheBench, Version 2.3 <$Revision: 655654 $>
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
        Licensed to The Apache Software Foundation, http://www.apache.org/
        
        Benchmarking 127.0.0.1 (be patient)
        Completed 100 requests
        Completed 200 requests
        Completed 300 requests
        Completed 400 requests
        Completed 500 requests
        Completed 600 requests
        Completed 700 requests
        Completed 800 requests
        Completed 900 requests
        Completed 1000 requests
        Finished 1000 requests
        
        
        Server Software:        Apache/2.2.22
        Server Hostname:        127.0.0.1
        Server Port:            80
        
        Document Path:          /calculadora/calculadora.php
        Document Length:        3109 bytes
        
        Concurrency Level:      5
        Time taken for tests:   0.350 seconds
        Complete requests:      1000
        Failed requests:        0
        Write errors:           0
        Total transferred:      3378000 bytes
        HTML transferred:       3109000 bytes
        Requests per second:    2853.25 [#/sec] (mean)
        Time per request:       1.752 [ms] (mean)
        Time per request:       0.350 [ms] (mean, across all concurrent requests)
        Transfer rate:          9412.40 [Kbytes/sec] received
        
        Connection Times (ms)
                      min  mean[+/-sd] median   max
        Connect:        0    0   0.1      0       2
        Processing:     0    2   9.8      1     275
        Waiting:        0    1   9.0      1     275
        Total:          0    2   9.8      1     275
        
        Percentage of the requests served within a certain time (ms)
          50%      1
          66%      1
          75%      1
          80%      1
          90%      2
          95%      3
          98%      7
          99%     17
         100%    275 (longest request)
         
El tiempo empleado es mayor por lo que no seguimos probando con este tipo de configuración.


###6º PRUEBA
    
* Sistema operativo: Ubuntu server 13.04
* Configuración: 2 núcleos,  3.75 GB
    
    
        azureuser@ivubuntu7:~/Practicas/Practica2$ ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php
        This is ApacheBench, Version 2.3 <$Revision: 655654 $>
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
        Licensed to The Apache Software Foundation, http://www.apache.org/
        
        Benchmarking 127.0.0.1 (be patient)
        Completed 100 requests
        Completed 200 requests
        Completed 300 requests
        Completed 400 requests
        Completed 500 requests
        Completed 600 requests
        Completed 700 requests
        Completed 800 requests
        Completed 900 requests
        Completed 1000 requests
        Finished 1000 requests
        
        
        Server Software:        Apache/2.2.22
        Server Hostname:        127.0.0.1
        Server Port:            80
        
        Document Path:          /calculadora/calculadora.php
        Document Length:        3109 bytes
        
        Concurrency Level:      5
        Time taken for tests:   0.218 seconds
        Complete requests:      1000
        Failed requests:        0
        Write errors:           0
        Total transferred:      3339000 bytes
        HTML transferred:       3109000 bytes
        Requests per second:    4593.60 [#/sec] (mean)
        Time per request:       1.088 [ms] (mean)
        Time per request:       0.218 [ms] (mean, across all concurrent requests)
        Transfer rate:          14978.56 [Kbytes/sec] received
        
        Connection Times (ms)
                      min  mean[+/-sd] median   max
        Connect:        0    0   0.2      0       1
        Processing:     0    1   0.5      1       8
        Waiting:        0    1   0.5      1       6
        Total:          0    1   0.6      1       8
        
        Percentage of the requests served within a certain time (ms)
          50%      1
          66%      1
          75%      1
          80%      1
          90%      2
          95%      2
          98%      3
          99%      3
         100%      8 (longest request)




###7º PRUEBA

* Sistema Operativo: centOS
* Configuración: 2 núcleos,  3.75 GB
    
Su instalación, es un poco diferente a las ubuntu:

![pantallazo11](https://raw2.github.com/rafaelgonz/Practicas/master/Practica3/pantallazos/pantallazo11.png)

![pantallazo12](https://raw2.github.com/rafaelgonz/Practicas/master/Practica3/pantallazos/pantallazo12.png)

![pantallazo13](https://raw2.github.com/rafaelgonz/Practicas/master/Practica3/pantallazos/pantallazo13.png)

Nos conectamos por ssh e instalamos apache mediante: yum install httpd

y repetimos los pasos tradicionales hasta poder ejecutar a.b:


        [azureuser@centos1 Practica2]$ ab -n 1000 -c 5 http://127.0.0.1/calculadora/calculadora.php
        This is ApacheBench, Version 2.3 <$Revision: 655654 $>
        Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
        Licensed to The Apache Software Foundation, http://www.apache.org/
        
        Benchmarking 127.0.0.1 (be patient)
        Completed 100 requests
        Completed 200 requests
        Completed 300 requests
        Completed 400 requests
        Completed 500 requests
        Completed 600 requests
        Completed 700 requests
        Completed 800 requests
        Completed 900 requests
        Completed 1000 requests
        Finished 1000 requests
        
        
        Server Software:        Apache/2.2.15
        Server Hostname:        127.0.0.1
        Server Port:            80
        
        Document Path:          /calculadora/calculadora.php
        Document Length:        300 bytes
        
        Concurrency Level:      5
        Time taken for tests:   0.229 seconds
        Complete requests:      1000
        Failed requests:        0
        Write errors:           0
        Non-2xx responses:      1000
        Total transferred:      480000 bytes
        HTML transferred:       300000 bytes
        Requests per second:    4364.26 [#/sec] (mean)
        Time per request:       1.146 [ms] (mean)
        Time per request:       0.229 [ms] (mean, across all concurrent requests)
        Transfer rate:          2045.75 [Kbytes/sec] received
        
        Connection Times (ms)
                      min  mean[+/-sd] median   max
        Connect:        0    0   0.2      0       2
        Processing:     0    1   0.3      1       2
        Waiting:        0    0   0.2      0       2
        Total:          0    1   0.5      1       3
        
        Percentage of the requests served within a certain time (ms)
          50%      1
          66%      1
          75%      2
          80%      2
          90%      2
          95%      2
          98%      3
          99%      3
         100%      3 (longest request)


Así, que terminadas todas las pruebas, tenemos los siguientes datos:

Time per request (main):

![pantallazopenultimo](https://dl.dropbox.com/s/h2myeom7tkrk4aq/pantallazo15.png)

Tiempo total:

![pantallazoultimo](https://dl.dropbox.com/s/27jtl32e07tf118/pantallazo14.png)


La mejor opción, es el sistema operativo Ubuntu server 12.04, con la configuración de 2 núcleos  y 3.7 GB, y si eligieramos la opción 1 con núcleo y 1.75 GB, también es buena, presentando tan buenos resultados, como pueden presentar otras versiones de ubuntu server con 2 núcleos.



