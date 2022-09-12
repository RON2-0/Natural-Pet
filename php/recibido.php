<?php

$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibido</title>
    <link href="../css/stylephp.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/stylephp.css?v=<?php echo(rand()); ?>" />
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
                <li><a href="../paginas/categorias.html">Categorías</a></li>
                <li><a href="../paginas/nosotros.html">Nosotros</a></li>
                <li><a href="../paginas/contactanos.html">Contáctanos</a></li>
            </ul>
      </nav>

        <div class="upbtns">
            <a href="../paginas/404.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
            </a>
            <a href="../paginas/html">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </a>
        </div>

    </header>

    <main>

    <h1>Querido <?php echo $nombre ." " . $apellido;?>, su información ha sido envíada con éxito.</h1>

        <img src="../img/box.svg" alt="" class="imgre">

        <div id="btnen">
           <a href="../paginas/inicio.php"><input class="btn2 vermas" type="submit" value="Regresar a inicio"></a> 
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