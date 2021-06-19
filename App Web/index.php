<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="description" content="">
    
   
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Proyecto NFC-RFID</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>





    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Proyecto NFC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="https://informatica.iesgrancapitan.org/">Departamento Informática</a>
          </li>

        </ul>
        <form class="d-flex">
          <a type="button" class="btn btn-success btn-lg" href="acceso.php">Acceso NFC</a>
        </form>
      </div>
    </div>
  </nav>
</header>

<main>




  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
<br>
    <div class="row">
		<h2 align="center"><b>Software utilizado en Proyecto NFC-RFid</b></h2>
		<p></p>
      <div class="col-lg-4">
        <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
		--><img src="./imagenes/raspbian.png" width="140" height="140">
        <h2>Raspbian</h2>
        <p>Raspberry Pi OS es una distribución del sistema operativo GNU/Linux basado en Debian, y por lo tanto libre para la SBC Raspberry Pi, orientado a la enseñanza de informática. El lanzamiento inicial fue en junio de 2012</p>
        <p><a class="btn btn-info" href="https://es.wikipedia.org/wiki/Raspberry_Pi_OS">Detalles</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
		--><img src="./imagenes/mysql.jpeg" width="140" height="140">
        <h2>MySQL</h2>
        <p>MySQL es un sistema de gestión de bases de datos relacional desarrollado bajo licencia dual: Licencia pública general/Licencia comercial por Oracle Corporation y está considerada como la base de datos más usada en la actualidad.</p>
        <p><a class="btn btn-info" href="https://es.wikipedia.org/wiki/MySQL">Detalles</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
        --><img src="./imagenes/python.png" width="140" height="140">
        <h2>Python</h2>
        <p>Python es un lenguaje de programación interpretado cuya filosofía hace hincapié en la legibilidad de su código.​ Se trata de un lenguaje de programación multiparadigma, ya que soporta parcialmente la orientación a objetos, imperativa y funcional.</p>
        <p><a class="btn btn-info" href="https://es.wikipedia.org/wiki/Python">Detalles</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
		<h2 align="center"><b>Componentes Hardware</b></h2>
		<p></p>
      <div class="col-md-7">
        <h2 class="featurette-heading">Raspberry Pi 4 B 4GB. <span class="text-muted">El cerebro de todo el proyecto</span></h2>
        <p class="lead">Raspberry Pi es uno de los ordenadores más básicos que podemos encontrar, también uno de los más vendidos de toda la historia informática. Su atractivo precio ha hecho que se vendan millones y millones de unidades generación tras generación. Nos centraremos en  Raspberry Pi 4. Esta nueva versión con una CPU ARM Cortex-A72 permite, entre otras cosas, la decodificación de vídeo 4K a 60 fps (sin compatibilidad con HDR).Raspberry Pi 4 es una actualización mayor de lo que podemos ver a primera vista, el cambio de procesador a un ARM Cortex-172 con cuatro núcleos a 1,5 GHz también implicaba pasar de los 40 nm a los 28 nm. En consecuencia, todos los componentes y la potencia del dispositivo ha cambiado, con respecto a la Raspberry Pi 3B+.</p>
      </div>
      <div class="col-md-5">
        <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		--><img src="./imagenes/raspberry.png" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Rele 5v 1 canal. <span class="text-muted"></span></h2>
        <p class="lead">Utilizado con aislamiento optoacoplador SMD, gran capacidad de conducción y rendimiento estable, disparador de corriente de 5 mA. Utilice un relé de alta calidad                             genuino, carga máxima de interfaz normalmente abierta: CA 250V / 10A, DC 30V / 10A. El disparador de alto nivel o el disparador de bajo nivel se pueden configurar                         por puente.
                        Diseño tolerante a fallos, incluso si se rompe la línea de control, el relé no funcionará.
                        Interfaz de diseño fácil de usar, todas las interfaces se pueden conectar directamente a través del bloque de terminales, lo cual es muy conveniente.</p>
      </div>
      <div class="col-md-5">
        <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		--><img src="./imagenes/rele.jpeg" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Sensor RFID-RC522 <span class="text-muted"></span></h2>
        <p class="lead">El RFID (Identificador por radiofrecuencia) es un conjunto de tecnologías diseñadas para leer etiquetas (tags) a distancia de forma inalámbrica. Los lectores RFID                         pueden estar conectados a una Raspberry Pi.
                        Las etiquetas RFID están disponibles en una gran variedad de formatos, tales como pegatinas adheribles, tarjetas, llaveros, pueden integrarse en un determinado                               producto.
                        Los RFID son ampliamente empleados, por ejemplo, en sistemas de alarma, aplicaciones comerciales en sustitución de códigos de barras, cerraduras electrónicas,                         sistemas de pago, tarjetas personales, control de accesos recintos como gimnasios o piscinas, fichaje en empresas, entre otras muchas aplicaciones.
                        En nuestros proyectos de electrónica con Arduino podemos usar el RFID, por ejemplo, en aplicaciones comerciales para mostrar en una pantalla los datos al acercar un                          producto, cambiar la luz o iluminación , abrir una puerta con una tarjeta personal, o hacer que un robot se comporte de forma distinta pasándole una tarjeta.</p>
      </div>
      <div class="col-md-5">
        <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		--><img src="./imagenes/rc522.jpeg" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">
    
        <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Tarjetas NFC <span class="text-muted"></span></h2>
        <p class="lead">Chip: tarjeta NXP NTAG213 compatible con todos los teléfonos móviles con sistema operativo Android, iPhone IOS con función NFC.
                        La tarjeta nfc 213 puede funcionar como una información de contacto de la tienda de tarjetas de visita, como dirección de correo electrónico, facebook, twitter, etc.
                        Sigue el estándar ISO 14443</p>
      </div>
      <div class="col-md-5">
        <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		--><img src="./imagenes/tarjeta.jpeg" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">
    
        <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Cerradura <span class="text-muted"></span></h2>
        <p class="lead">Material de alta calidad: la carcasa exterior está hecha de acero y las partes internas de acero al carbono.
                        Seguridad: El gancho puede soportar una fuerza de tracción de 150 kg, no produce una deformación permanente obvia y también tiene un antichoque y evita el robo.
                        Diseño elástico: Elástico ajustable, peso adecuado de aproximadamente 0,5-3 kg puerta.
                        Instalación: La instalación es simple, no diferencie entre izquierda y derecha y frente y atrás. Además, se reserva una posición de desbloqueo mecánico de                         emergencia.
                        Uso: gabinetes de teléfonos móviles, gabinetes de servicio automático, buzones de correo, gabinetes para llaves, armarios exprés, armarios, casilleros, casilleros de                         supermercados, etc.</p>
      </div>
      <div class="col-md-5">
        <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		--><img src="./imagenes/cerradura.jpeg" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">
    
        <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Fuente Alimentacion 12V <span class="text-muted"></span></h2>
        <p class="lead">Se puede convertir de una toma de corriente doméstica o industrial (AC100V - 260V) a una fuente de alimentación de CC (DC5V).
                        Amplio rango de voltajes de entrada (AC 100V - 260V), voltaje de salida estable y preciso (DC 5V). Protección contra cortocircuitos, protección contra sobrecarga y                         protección contra tensión.
                        Ideal para uso residencial, comercial, para equipos electrónicos, en sensores electrónicos para el automóvil, iluminación LED, electrodomésticos, etc.
                        Antes de usar, si es necesario, recuerde reemplazar el voltaje de este producto a 110V (el ajuste de fábrica es 220V). Las fuentes de alimentación conmutada pueden                         ser peligrosas si el usuario no está familiarizado con el uso de los mismos, es siempre recomendable consultar con un técnico capacitado.</p>
      </div>
      <div class="col-md-5">
        <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		--><img src="./imagenes/fuente.jpeg" width="400" height="400">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Volver Arriba</a></p>
    <p>&copy; 2020-2021 IES Gran Capitan &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
