<?php

session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
    }
    
    include ("../php/config.php");

    $nombre=  $_POST['nombre'];
    $direccion=  $_POST['direccion'];
    $telefono=  $_POST['telefono'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo</title>
    <link href="../css/stylephp.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/stylephp.css?v=<?php echo(rand()); ?>" />
    <link rel="icon" href="../img/dogoo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!-- Java Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/sweetalert.js"></script>
    <script src="../js/sweetalert.js<?php echo(rand()); ?>"></script>
</head>
<body>

    <header>
        <div>
            <a href="../paginas/inicio.php"><img src="../img/dogoo.svg" alt=""></a>
        </div>
    </header>

    <main>

        <script>
            
            function alerta_pa(){ 
                Swal.fire({
                    title: '¡Error!',
                    text: "La contraseña no coincide.",
                    icon: 'warning',
                    confirmButtonColor: '#6FC39C',
                    allowOutsideClick: false,
                }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./pago.php";
                        }
                    })
            }

            function alerta_in(){ 
                Swal.fire({
                    title: '¡Error!',
                    text: "No se pudo insertar.",
                    icon: 'warning',
                    confirmButtonColor: '#6FC39C',
                })
            }

            function alerta_done(){ 
                Swal.fire({
                    title: '¡Felicidades!',
                    text: "La compra se realizó de manera correcta.",
                    icon: 'success',
                    confirmButtonColor: '#6FC39C',
                })
            }

        </script>


        <?php 

            if (isset($_POST['pagar'])){
                
                $password=  md5($_POST['password']);

                if ( $password == $_SESSION['password']) {
                    
                    foreach($_SESSION["add_carro"] as $keys => $values){

                        $IDProducto= $values["item_id"];
                        $IDCliente= $_SESSION['IDCliente'];                   
                        
                        $Consulta2="INSERT INTO `ventas`(`IDCliente`, `IDProducto`) VALUES  ('$IDCliente', '$IDProducto')";
                        //Verificamos si los datos se almacenaron correctamente en la tabla, caso contrario mostraremos un mensaje de error, haciendo uso de “or die”.
                        $resultado2= mysqli_query($conn,$Consulta2) or die ( "<script>alerta_in();</script>");

                    }
                    
                        if($resultado2!=0){
                            echo "<script>alerta_done();</script>"; 
                            unset($_SESSION['add_carro']);   
                        }
                }else{
                    echo "<script>alerta_pa();</script>";  
                }

                
            }

        ?>

        <h1 class="reh1">¡Esperamos verte pronto!</h1>

        <div class="recibo">
            <div class="reiz">

                <p>Resumen de orden:</p>
                <br>
                <h2>ID de la orden</h2>
                <br>
                <p>Nombre del comprador: </p>
                <br>
                <h3><?php echo $nombre; ?></h3>
                <br>
                <p> Dirección de envío: </p>
                <br>
                <h3><?php echo $direccion; ?></h3>

            </div>
            <div class="rede">

                <div class="cude">
                    <img src="../img/garrapata.svg" alt="">
                </div>
                <h2>¡Gracias por su compra!</h2>
                
            </div>
        </div>

        <div class="rebtns">
            <div id="btnen">
            <a href="../paginas/404.html"><input class="btn2 vermas" type="submit" value="Descargar Recibo"></a> 
            </div>
            <div id="btnen">
            <a href="../paginas/inicio.php"><input class="btn2 vermas2" type="submit" value="Regresar a inicio"></a> 
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