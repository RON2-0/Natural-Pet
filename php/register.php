<?php 

include ("./config.php");

error_reporting(0);

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="../css/log.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/log.css?v=<?php echo(rand()); ?>" />
    <!-- Java Script -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/sweetalert.js?php echo(rand()); ?>"></script>
    <script src="../js/sweetalert.js"></script>
</head>

<body>

<main>

    <div class="left-text">

        <div class="item1">
            <a href="../index.php"><img src="../img/dogoo.svg" alt=""></a>
        </div>

        <div class="leftbox1">

            <script>

                function alerta_mal(){ 
                    Swal.fire({
                        title: 'Error',
                        text: "Losentimos, algo salió mal.",
                        icon: 'warning',
                        iconColor: '#F7BAB6',
                        confirmButtonColor: '#6FC39C',
                    });
                } 

                function alerta_mail(){ 
                    Swal.fire({
                        title: 'Error',
                        text: "Este correo ya existe, inténtalo de nuevo.",
                        icon: 'warning',
                        iconColor: '#F7BAB6',
                        confirmButtonColor: '#6FC39C',
                    });
                } 

                function alerta_pass(){ 
                    Swal.fire({
                        title: 'Error',
                        text: "La contraseña no coincide.",
                        icon: 'warning',
                        iconColor: '#F7BAB6',
                        confirmButtonColor: '#6FC39C',
                    });
                } 

                function alerta_done(){ 
                    Swal.fire({
                        title: 'Registrado',
                        text: "Feliciades, haz completado el registro de manera correcta.",
                        icon: 'success',
                        confirmButtonColor: '#6FC39C',
                        confirmButtonText: 'Iniciar Sesión',
                        footer: 'Debes inciar sesión para completar el proceso.',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "../paginas/inicio.php";
                        }
                    })
                }

            </script>  

            <?php

                if (isset($_POST['submit'])) {
                    $usuario = $_POST['usuario'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    $cpassword = md5($_POST['cpassword']);

                    if ($password == $cpassword) {
                        $sql = "SELECT * FROM clientes WHERE email='$email'";
                        $result = mysqli_query($conn, $sql);
                        if (!$result->num_rows > 0) {
                            $sql = "INSERT INTO clientes (usuario, email, password) VALUES ('$usuario', '$email', '$password')";
                            $result = mysqli_query($conn, $sql);
                            if ($result == true) {
                                echo "<script>alerta_done()</script>";
                                $usuario = "";
                                $email = "";
                                $_POST['password'] = "";
                                $_POST['cpassword'] = "";
                            } else {
                                echo "<script>alerta_mal()</script>";
                            }
                        } else {
                            echo "<script>alerta_mail()</script>";
                        }
                        
                    } else {
                        echo "<script>alerta_pass()</script>";
                    }
                }

            ?>

            <div class="box1">

                <form action="" method="POST">
        
                    <div class="intext">
                        <h1>Esperamos verte pronto</h1>
                        <p>Ingresa los datos necesarios.</p>
                    </div>

                    <div class="cor">
                        <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>" required>
                    </div>

                    <div class="cor">
                        <input type="email" name="email" id="email" placeholder="Correo" value="<?php echo $email; ?>" required>
                    </div>

                    <div class="contra">
                        <input class="input100" type="password" name="password" placeholder="Contraseña" value="<?php echo $_POST['password']; ?>" required>
                    </div>

                    <div class="contra">
                        <input class="input100" type="password" name="cpassword" placeholder="Confirmar Contraseña" value="<?php echo $_POST['cpassword']; ?>" required>
                    </div>
                    
                    <div class="botones"> 
                        <div id="button">
                            <input class="btn login" type="submit" name="submit" value="Registrarse">
                        </div>
                    </div>

                    <div class="recontra">
                        <a href="../index.php">
                            ¿Ya tienes una cuenta?
                        </a>
                    </div>

                </form>

            </div>

        </div>
        
    </div>

    <div class="right-img">
        <img src="../img/2222.png" alt="">
    </div>

</main>

<!-- Footer -->
<?php include("../php/footer.php") ?>
    
</body>

</html>