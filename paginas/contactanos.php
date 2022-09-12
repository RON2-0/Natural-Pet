<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
    }  

    include ("../php/config.php");

?>

<!DOCTYPE html>
<html lang="en" class="bg-contact">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="../css/style3.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style3.css?v=<?php echo(rand()); ?>" />
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

    </header>

    <main>
        <h1>Contáctanos</h1>
        <p>¿Tienes alguna pregunta o comentario? ¡Escríbenos!</p>

        <div class="contactanos">
            <div class="contact-in">
                <div class="continfo">
                    <h1>Información de contacto</h1>
                    <p>Llena el formulario y nuestro equipo te responderá en menos de 24 horas.</p>
                    <p><i class="fa fa-phone" aria-hidden="true" style="color: white; margin-right: 1rem;"></i> (+503) 456-789</p>
                    <p><i class="fa fa-envelope" aria-hidden="true" style="color: white; margin-right: 1rem;"></i>naturalpet@gmail.com</p>
                    <p><i class="fa fa-map-marker" aria-hidden="true" style="color: white; margin-right: 1rem;"></i> Oportunidades FGK, Santa Ana</p>
                </div>
                <div class="continfo2">
                    <ul>
                        <li><a href="https://www.facebook.com/Natural-Pet-105352708580198/" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="../paginas/404.html"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/_natural_pet/?utm_medium=copy_link" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                    
                </div>
                <div class="contr">
                    
                    <form id="formulario-contacto" action="../php/recibido.php" method="POST">
                        <div class="nombres">
                            <div class="nom">
                                <label for="nombre">Primer Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Juan" required>
                            </div>
                            <div class="ape">
                                <label for="apellido">Primer Apellido</label>
                                <input type="text" name="apellido" id="apellido" placeholder="Ramírez" required>
                            </div>
                        </div>
                        <div class="infor">
                            <div class="tel">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" name="telefono" id="telefono" placeholder="+503 23456789">
                            </div>
                            <div class="cor">
                                <label for="correo-e">Correo</label>
                                <input type="email" name="correo-e" id="correo-e" placeholder="email@gmail.com" required>
                            </div>
                        </div>
                        
                        <div class="h1d">
                        <label for="selec">¿Qué es lo que nececitas?</label>
                        </div>
                        <div class="selec">
                            <input type="radio" name="product" id="comida" required>
                            <label for="comida">Comida</label>
                    
                            <input type="radio" name="product" id="juguetes" required>
                            <label for="juguetes">Juguetes</label>
                    
                            <input type="radio" name="product" id="accesorios" required>
                            <label for="accesorios">Accesorios</label>

                            <input type="radio" name="product" id="otros" required>
                            <label for="otros">Otros</label>
                        </div>
                        <div class="mens">
                            <label for="mensaje">Mensaje</label>
                            <textarea placeholder="Escribe tu mensaje..." id="mensaje" required></textarea>
                        </div>
                    <div id="btnen">
                        <input class="btn vermas" type="submit" value="Enviar Mensaje">
                    </div>
                        
                    </form>

                </div>
                
        </div>

    </main>



    <footer>
        <p>Copyright &copy; 
            <script>document.write(new Date().getFullYear());
            </script>, Natural Pet
        </p>
        <!-- #copyright -->
    </footer>
    
</body>
</html>