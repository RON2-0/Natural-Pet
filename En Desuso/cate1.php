<?php

    session_start();

    require_once '../php/config.php';

?>

<!DOCTYPE html>
<html lang="en" class="bg-categorias">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="../css/style2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>" />
    <link rel="icon" href="../img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
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
                    <form method="POST" action="../php/pago.php">
                        
                            <!--Instrumentos de cuerda-->
                            <div class="product">
                                <p class="product-title"><?php echo $row['producto']; ?></p>
                                <div class="cen">
                                    <div class="circle">
                                        <img src="../img/<?php echo $row['imagen']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="product-text">
                                    <p>$<?php echo $row['precio']; ?></p>
                                </div>
                                <div id="btnpro">
                                    <input class="btn vermas" type="submit" name="agregar" value="Agregar">
                                    <input class="btn" type="submit" name="comprar" value="Comprar" style=" color: black; font-weight: 600; background-color: #FFD97D; box-shadow: 0px 5px 0px 0px #ecbe51;">
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