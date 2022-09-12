<?php

session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
    }

    error_reporting(0);
    
    include ("../php/config.php");

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
    <script src="https://kit.fontawesome.com/3eb129e6b3.js" crossorigin="anonymous"></script>
    <!-- Java Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/sweetalert.js"></script>
    <script src="../js/sweetalert.js<?php echo(rand()); ?>"></script>
    <script src="../js/script.js"></script>
    <script src="../js/script.js<?php echo(rand()); ?>"></script>
</head>
<body>

    <header>
        <div>
            <a href="../paginas/inicio.php"><img src="../img/dogoo.svg" alt=""></a>
        </div>

        <nav>
            <ul>
                <li><a href="../paginas/categorias.php">Categorías</a></li>
                <li><a href="../paginas/nosotros.php">Nosotros</a></li>
                <li><a href="../paginas/contactanos.php">Contáctanos</a></li>
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

        <h1>Detalles de la orden</h1>

        <div class="pago">

            <script>

                function alerta_no(){ 
                    Swal.fire({
                        title: '¡Error!',
                        text: "No hay ningún producto en el carrito.",
                        icon: 'warning',
                        confirmButtonColor: '#6FC39C',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./carrito.php";
                        }
                    })
                }
                
                function alerta_pa(){ 
                    Swal.fire({
                        title: '¡Error!',
                        text: "La contraseña no coincide.",
                        icon: 'warning',
                        confirmButtonColor: '#6FC39C',
                    })
                }

            </script> 

        <?php 

            if (isset($_POST['comprar'])){

                if (!isset($_SESSION['add_carro'])) {
                    echo "<script>alerta_no();</script>";
                }else{
                    header("Location: pago.php");
                }
            }

        ?>

            <div class="payment">

                <h2 style="margin-bottom: 1rem;">Resumen de productos</h2>

                <div class="cajaprocs">
                    
                    <table>

                        <tr>
                            <td>Producto</td>

                            <td>Cantidad</td>

                            <td>Precio</td>

                            <td>Total</td>
                        </tr>

                        <?php

                            $tot = 0;

                            foreach ($_SESSION["add_carro"] as $keys => $values) {

                                
                            $tot = ($values["item_cantidad"] * $values["item_precio"]);

                            ?>

                            <tr>
                                <td><?php echo $values["item_nombre"]; ?></td>

                                <td><?php echo $values["item_cantidad"]; ?></td>

                                <td>$ <?php echo $values["item_precio"]; ?></td>

                                <td>$ <?php echo number_format($tot, 2); ?></td>
                            </tr>

                            <?php

                            }
                        ?>

                    </table>

                </div>

            </div>

            <div class="pagr">
                
                 <!--Formulario de compra-->
                 <h2>Formulario de pago</h2>
                 <form action="./recibo.php" method="POST" id="form_pago">
                        <div class="nombre">
                            <label class="label">Nombre Apellido</label>
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre Apellido" required>

                            <label class="label">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Contraseña" required>
                        </div>
                        <div class="numerotar">
                            <label class="label">Dirreción de envío</label>
                            <input type="text" name="direccion" placeholder="Dirección de envío" required>
                        </div>
                        <div class="fechas">
                        <div class="vence">
                            <label class="label">Teléfono</label>
                            <input type="tel" name="telefono" id="telefono" placeholder="0000-0000" required>
                        </div>
                        <div class="cvc">
                            <label class="label">Subtotal</label>
                            <div class="total">$ <?php echo number_format($_SESSION['total'], 2) ?></div>
                        </div>
                        </div>
                        <!--link a página de compra realizada-->
                        <div id="btnen">
                            <input class="btn vermas" name="pagar" type="submit" value="Realizar Pago">
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