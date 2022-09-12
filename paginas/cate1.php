<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
    }    

    error_reporting(0);

    include ("../php/config.php");

    if (isset($_POST['agregar'])){
        /// print_r($_POST['product_id']);
        if(isset($_SESSION['add_carro'])){
    
            $item_array_id = array_column($_SESSION['add_carro'], "item_id");
    
            if(in_array($_POST['item_id'], $item_array_id)){
                echo "<script>alert('Product is already added in the cart..!')</script>";
                echo "<script>window.location = 'cate1.php'</script>";
            }else{
    
                $count = count($_SESSION['add_carro']);
                $item_array = array(
                    'item_id' => $_POST['item_id'],
                    'item_nombre' => $_POST['item_nombre'],
                    'item_precio' => $_POST['item_precio'],
                    'item_img' => $_POST['item_img'],
                    'item_cantidad' => $_POST['item_cantidad'],
                );
    
                $_SESSION['add_carro'][$count] = $item_array;
            }
    
        }else{
    
            $item_array = array(
                'item_id' => $_POST['item_id'],
                'item_nombre' => $_POST['item_nombre'],
                'item_precio' => $_POST['item_precio'],
                'item_img' => $_POST['item_img'],
                'item_cantidad' => $_POST['item_cantidad'],
            );
    
            // Create new session variable
            $_SESSION['add_carro'][0] = $item_array;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="../css/cates.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/cates.css?v=<?php echo(rand()); ?>" />
    <link rel="icon" href="../img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="../js/jquery.nice-number.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../js/jquery.nice-number.css?v=<?php echo(rand()); ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/jquery.nice-number.js"></script>
    <script src="../js/jquery.nice-number.js<?php echo(rand()); ?>"></script>
    <script>
        $(function(){
            $('input[type="number"]').niceNumber();
        });
    </script>
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

        <!-- Contenido -->
        <div class="content-area">
            
            <h2>Los mejores juguetes para tus mascotas.</h2>
            
            <!-- Fila 1 -->
            <div class="flex-container">
            <?php
                $sql = "SELECT * FROM productos WHERE IDCategoria = '00001' ";
                $resul = mysqli_query($conn, $sql);
                if (mysqli_num_rows($resul) > 0) {
                    while ($row = mysqli_fetch_array($resul)) {
                ?>
                    <form method="POST" action="">
                        
                            <!--Instrumentos de cuerda-->
                            <div class="product">
                                <p class="product-title"><?php echo $row['producto']; ?></p>
                                <div class="cen">
                                    <div class="circle">
                                        <img src="../img/<?php echo $row['imagen']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="cantidad">
                                    <center><input type="number" name="item_cantidad" min="1" max="100" value="1" readonly/></center>
                                </div>
                                <div class="product-text">
                                    <p>$<?php echo $row['precio']; ?></p>
                                </div>
                                <div id="btnpro">
                                    <input class="btn vermas" type="button" onClick="parent.location='./<?php echo $row['href']; ?>'" name="vermas" value="Ver más">
                                    <input class="btn agregar" type="submit" name="agregar" value="Agregar">
                                    <input type="hidden" name="item_id" value="<?php echo $row['IDProducto']; ?>">
                                    <input type="hidden" name="item_nombre" value="<?php echo $row['producto']; ?>" />
                                    <input type="hidden" name="item_precio" value="<?php echo $row['precio']; ?>" />
                                    <input type="hidden" name="item_img" value="<?php echo $row['imagen']; ?>" />
                                </div>
                            </div>  
                        
                        </form>
                        <?php
                    }
                }
            ?>

        </div>

        </div>

    </main>

    <div class="text1"><p>Imágenes con fines ilustrativos</p></div>

    <footer>
        <p>Copyright &copy; 
            <script>document.write(new Date().getFullYear());
            </script>, Natural Pet
        </p>
        <!-- #copyright -->
    </footer>
    
</body>
</html>