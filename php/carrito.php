<?php

    session_start();

    include ("../php/config.php");

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            foreach ($_SESSION['add_carro'] as $key => $value) {
                if ($value['item_id'] == $_GET['id']) {
                    unset($_SESSION['add_carro'][$key]);
                    echo '<script>alert("El producto fue eliminado del carrito!");</script>';
                    echo '<script>window.location="carrito.php";</script>';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/carrito.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/carrito.css?v=<?php echo(rand()); ?>" />
    <title>Carrito de compras</title>
    <link rel="icon" href="../img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3eb129e6b3.js" crossorigin="anonymous"></script>
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

        <h1>Carrito de compras</h1>

        <section class="cart">

            <div class="pago">

                <div class="payment">
                    
                    <h2>Productos</h2>

                    <div class="cart-items">

                        <?php

                            $total = 0;
                            if (!empty($_SESSION["add_carro"])) {
                                
                                foreach ($_SESSION["add_carro"] as $keys => $values) {
                                ?>
                                   
                                   <div class="cajaprocs">
                                    
                                    <div class="producs">

                                        <img style="border-radius: 20px; height: 5rem; width: 5rem;" src="../img/<?php echo $values['item_img']; ?>" alt="">
                                        
                                        <h3><?php echo $values["item_nombre"]; ?></h3>

                                        <h3>$<?php echo $values["item_precio"]; ?></h3>

                                        <div class="cantidad">
                                            <label><?php echo $values["item_cantidad"]; ?></label>
                                        </div>

                                        <div class="clear">
                                            <a href="carrito.php?action=delete&id=<?php echo $values["item_id"]; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </a>
                                        </div>

                                    </div>

                                </div>

                                <?php
                                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);
                                    $_SESSION['total'] = $total;
                                }
                                ?>

                            <?php
                            } else {
                                unset($_SESSION['add_carro']);
                            ?>
                                
                                <span class="noprod">No se han agregado productos.</span>
                                
                            <?php
                            }
                        ?>

                    </div>

                </div>

                <div class="pagr">
                    <!--Formulario de compra-->
                    <h2 style="width: max-content;">Detalles de productos</h2>
                    
                    <form action="./pago.php" method="POST">

                        <div class="efec">
                            <input type="checkbox" name="metpago" required>
                            <label for="metpago">Pago en efectivo</label>
                        </div>
                        <div class="cvc">
                            <label class="label">Productos</label>
                            <div class="total">
                                <?php
                                    if (isset($_SESSION['add_carro'])){
                                        $count  = count($_SESSION['add_carro']);
                                        echo "$count items";
                                    }else{
                                        echo "0 items";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="cvc">
                            <label class="label">Total</label>
                            <div class="total">$ <?php echo number_format($total, 2); ?></div>
                        </div>
                                    
                        <div id="btnen">
                            <input class="btn2 vermas2" type="submit" name="comprar" value="Comprar">
                            <input type="hidden" name="IDCliente" value="<?php echo $_SESSION['IDCliente'];?>" />
                        </div>

                    </form>

                        <a style="color: #E6FFEB;" href="../paginas/404.html">Términos y condiciones</a>
                </div>

            </div>

        </section>

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