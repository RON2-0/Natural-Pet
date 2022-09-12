<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
    }  

    include ("../php/config.php");

?>

<!DOCTYPE html>
<html lang="en" class="bg-nosotros">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link href="../css/style2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>" />
    <link rel="icon" href="../img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3eb129e6b3.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <header>
        <div>
            <a href="../paginas/inicio.php"><img src="../img/dogoo.svg" alt=""></a>
        </div>

        <nav>
            <ul>
                <li><a href="./categorias.php">Categorías</a></li>
                <li><a href="./nosotros.php">Nosotros</a></li>
                <li><a href="./contactanos.php">Contáctanos</a></li>
            </ul>
        </nav>

        <div class="rbox" style="display: flex;">
          <div class="logout" style="display: flex; align-items: center; justify-content: center; margin-right: 3rem;">
              <?php echo "<h2>" . $_SESSION['usuario'] . "</h2>"; ?>
              <div class="carticon">
                  <a href="../php/carrito.php" class="nav-item nav-link active">
                      <h5>
                          <i class="fas fa-shopping-cart"></i>
                          <?php

                          if (isset($_SESSION['add_carro'])){
                              $count = count($_SESSION['add_carro']);
                              echo "<span id='cart_count' class=''>$count</span>";
                          }else{
                              echo "<span id='cart_count' class=''>0</span>";
                          }

                          ?>
                      </h5>
                  </a>
                </div>
            </div>
            <div class="upbtns" style="width: auto; justify-content: center;">
                <a href="../php/logout.php" style="text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                </a>
            </div>
        </div>

    </header>

    <main>
        <div class="nosotros">
            <h1>Nuestra Misión</h1>
            <p>
                Somos un emprendimiento dedicado a brindar artículos innovadores esenciales para el cuidado y mantenimiento de mascotas; además de productos de diversión y accesorios. Estamos comprometidos con brindar calidad y un excelente servicio.
            </p>
            <h1>Nuestra Visión</h1>
            <p>
                Ser una empresa moderna que brinde los mejores artículos de aseo, diversión y accesorios para mascotas de la región, solucionando así las necesidades reales que tienen nuestros clientes con sus mascotas, gracias a nuestra excelente calidad en productos y atención.
            </p>
            <h1>¿Qué es Natural Pet?</h1>
            <p>
                Natural Pet es una empresa dirigida a proteger, y cuidar a las mascotas del hogar y al medio ambiente, por medio de nuestros productos naturales y reciclados, ayudando a solventar un gran problema que enfrenta la sociedad, como lo es la contaminación; además, de reducir el impacto de productos contaminantes, consentimos a las mascotas del hogar, que son como un miembro más de la familia. Contamos con el mejor personal calificado para dar un excelente servicio y atención cada uno de nuestros consumidores.
            </p>

            <!--Integrantes y descripciones-->
            <h1>Integrantes</h1>
            <dl>
                <dt>Ronald Guevara- Director de operaciones (COO)</dt>
                <dd> Posee un cargo estratégico en Natural Pet, es el responsable de gestionar los recursos, procesos y la información del emprendimiento para asegurar su competitividad en el mercado y añadir valor a los productos para mascotas.  </dd>

                <dt>Tatiana Carranza- Directora financiera (CFO)</dt>
                <dd> Es la responsable financiera de la Natural Pet. Su función es la planificación económica y la gestión contable del emprendimiento en base a los objetivos previamente establecidos.</dd>

                <dt>Michelle Zepeda -Directora ejecutiva (CEO)</dt>
                <dd> Entre sus grandes responsabilidades, esta el tomar las decisiones más importantes y dirigir las estrategias que llevarán al emprendimiento a conseguir sus objetivos, ama crear estrategias que impulsen el desarrollo del emprendimiento. </dd>
                
                <dt>Elisa Peñate -Directora de marketing (CMO) </dt>
                <dd> El cariño hacia los animales que posee la ha llevado a diseñar y publicitar diferentes productos para el aseo y recreación de las mascotas. Es la encargada de supervisar la estrategia de marketing de Natural Pet y sentar las bases para políticas, objetivos e iniciativas para el lanzamiento de nuevos productos.</dd>
                
                <dt> Liliana Valdés-Directora comercial (CSO)</dt>
                <dd> Ha trabajado para mejorar las gestiones comerciales de Natural Pet e innovar constantemente la relación con nuestros clientes; además ha impulsado diferentes iniciativas para el desarrollo y comercialización de los productos ecológicos para mascotas en nuestro emprendimiento.</dd>
            </dl>

        </div>

    </main>

     <!--Créditos-->
    <div class="creditos">
                    
        <h5>Créditos</h5>
    
        <div class="creditos-container">

        <div class="person">
            <div class="container">
            <div class="container-inner">
                <img
                class="circle"
                src="../img/fondo.png"/>
                <img
                class="img img1"
                src="../img/Ronald-Imagen.png"/>
            </div>
            </div>
            <div class="divider"></div>
            <div class="name">Ronald G.</div>
            <div class="title">COO</div>
        </div>
        <div class="person">
            <div class="container">
            <div class="container-inner">
                <img
                class="circle"
                src="../img/fondo.png"
                />
                <img
                class="img img3"
                src="../img/Tati-Imagen.png"
                />
            </div>
            </div>
            <div class="divider"></div>
            <div class="name">Tatiana C.</div>
            <div class="title">CFO</div>
        </div>
        <div class="person">
            <div class="container">
                <div class="container-inner">
                <img
                    class="circle"
                    src="../img/fondo.png"
                />
                <img
                    class="img img4"
                    src="../img/Michelle-Imagen.png"
                />
                </div>
            </div>
            <div class="divider"></div>
            <div class="name">Michelle Z.</div>
            <div class="title">CEO</div>
        </div>
        <div class="person">
            <div class="container">
                <div class="container-inner">
                <img
                    class="circle"
                    src="../img/fondo.png"
                />
                <img
                    class="img img3"
                    src="../img/Marce-Imagen.png"
                />
                </div>
            </div>
            <div class="divider"></div>
            <div class="name">Elisa P.</div>
            <div class="title">CMO</div>
        </div>
        <div class="person">
            <div class="container">
                <div class="container-inner">
                <img
                    class="circle"
                    src="../img/fondo.png"
                />
                <img
                    class="img img3"
                    src="../img/Lili-Imagen.png"
                />
                </div>
            </div>
            <div class="divider"></div>
            <div class="name">Liliana V.</div>
            <div class="title">CSO</div>
        </div>

        </div>
        <!--Honor code-->
        <h1>Código de Honor</h1>

        <p>"Hacemos constar que no hemos dado ni recibido ayuda no autorizada durante la realización de este proyecto"</p>
    </div>

    <footer>
        <p>Copyright &copy; 
            <script>document.write(new Date().getFullYear());
            </script>, Natural Pet
        </p>
        <!-- #copyright -->
    </footer>


</body>
</html>