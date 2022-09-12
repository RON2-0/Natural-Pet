<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="../css/style3.css" rel="stylesheet" type="text/css">
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
                <li><a href="./nosotros.html">Nosotros</a></li>
                <li><a href="./contactanos.php">Contáctanos</a></li>
            </ul>
        </nav>

        <div class="upbtns">
            <a href="./404.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
            </a>
            <a href="./404.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </a>
        </div>

    </header>

    <main>

        <h1>Detalles del Producto</h1>
        
        <section class="producto">

            <div class="izq">
                <h1>Moños de tela</h1>
                <p>El precio es de $1.50.
                    </p>
                <div class="cajitas">
                    <a href=""><img src="../img/1prro.png" alt=""></a>
                    <a href=""><img src="../img/2prro.png" alt=""></a>
                    <a href=""><img src="../img/3prro.png" alt=""></a>
                </div>
            </div>

            <div class="cen">
                <div class="cenimg">
                    <div class="circle">
                        <img src="https://sc04.alicdn.com/kf/Hd1c4d8fc7cff44419f459a8f308425afi.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="der">
                <h2>Descripción</h2>
                <br>
                <br>
                <p style="margin-bottom: 0;">Viste a la moda a tus perros y gatos con estos espectaculares accesorios de tela.</p>
                <form action="" method="POST" style="display: flex; align-items: center;">
                    <div id="btnpro">
                        <input class="btn vermas" type="submit" name="agregar" value="Agregar">
                        <input class="btn" type="submit" name="comprar" value="Comprar" style=" color: black; font-weight: 600; background-color: #FFD97D; box-shadow: 0px 5px 0px 0px #ecbe51;">
                    </div>
                </form>
            </div>

        </section>

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