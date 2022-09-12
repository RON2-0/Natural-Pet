<?php

    session_start();

    include ("./config.php");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link href="../css/pago.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body>

    <header>
        <div>
            <a href="../paginas/inicio.html"><img src="../img/dogoo.svg" alt=""></a>
        </div>

        <nav>
            <ul>
                <li><a href="../paginas/categorias.php">Categorías</a></li>
                <li><a href="../paginas/nosotros.html">Nosotros</a></li>
                <li><a href="../paginas/contactanos.php">Contáctanos</a></li>
            </ul>
      </nav>

      <div class="rbox" style="display: flex;">
          <div class="logout" style="display: flex; align-items: center; justify-content: center; margin-right: 3rem;">
              <?php echo "<h2>" . $_SESSION['usuario'] . "</h2>"; ?>
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

        <h1>Pago de Productos</h1>

        <div class="pago">

            <div class="payment">

                <h2 style="margin-bottom: 1rem;">Realiza tu pago</h2>

                <div class="cajaprocs">
                    
                    <div class="producs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>

                        <h3>X producto</h3>

                        <div class="add">
                            <input style="width: 2rem; height: 1.5rem;" type="number" name="cantidad" class="form-control" min="1" max="100" value="1"/>
                        </div>

                        <div class="clear">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                        </div>

                    </div>

                </div>

            </div>

            <div class="pagr">
                 <!--Formulario de compra-->
                 <h2>Formulario de pago</h2>
                 <form id="formulario-pago" action="./recibo.php" method="POST">
                        <div class="nombre">
                            <label class="label">Nombre Apellido</label>
                            <input type="text" name="nombreapellido" id="nombreapellido" placeholder="Juan Manuel" required>

                            <label class="label">DUI</label>
                            <input type="number" name="dui" id="dui" placeholder="0000000-0" required>
                        </div>
                        <div class="numerotar">
                            <label class="label">Método de pago</label>
                            <select name="metod" id="metod" required>
                                <option value="efectivo">Efectivo</option>
                                <option value="otro" >Otro</option>
                                <option value="elegir" selected>Elegir una opción</option>
                            </select>
                        </div>
                        <div class="fechas">
                        <div class="vence">
                            <label class="label">Teléfono</label>
                            <input type="number" name="phone" id="phone" placeholder="0000-0000" required>
                        </div>
                        <div class="cvc">
                            <label class="label">Total</label>
                            <div class="total">$000</div>
                        </div>
                        </div>
                        <!--link a página de compra realizada-->
                        <div id="btnen">
                            <input class="btn vermas" type="submit" value="Realizar Pago">
                        </div>
                    </form>
                    <a style="color: #E6FFEB;" href="../paginas/404.html">Términos y condiciones</a>
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