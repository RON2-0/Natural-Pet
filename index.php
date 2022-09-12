<?php 

include ("./php/config.php");

error_reporting(0);

session_start();

setcookie("usuario", "naturalpet@gamil.com", time() + 84600);

if (isset($_SESSION['usuario'])) {
    header("Location: ./paginas/inicio.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./css/log.css">
    <link rel="icon" href="./img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/log.css?v=<?php echo(rand()); ?>" />
    <!-- Java Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/sweetalert.js"></script>
    <script src="./js/sweetalert.js<?php echo(rand()); ?>"></script>
</head>

<body>

<main>

    <div class="left-text">

        <div class="item1">
            <a href="#"><img src="./img/dogoo.svg" alt=""></a>
        </div>

        <div class="leftbox1">

            <script>

                function alerta_epass(){ 
                    Swal.fire({
                        title: 'Error',
                        text: "El correo o la contraseña son incorrectos.",
                        icon: 'warning',
                        iconColor: '#F7BAB6',
                        confirmButtonColor: '#6FC39C',
                    });
                }

                function alerta_ini(){ 
                    Swal.fire({
                        title: '¡Felicidades!',
                        text: "Haz iniciado sesión correctamente.",
                        icon: 'success',
                        confirmButtonColor: '#6FC39C',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./paginas/inicio.php";
                        }
                    })
                } 

            </script>  

            <?php 
            
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = md5($_POST['password']);

                $sql = "SELECT * FROM clientes WHERE email='$email' AND password='$password'";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['usuario'] = $row['usuario'];
                    $_SESSION['IDCliente'] = $row['IDCliente'];
                    $_SESSION['password'] = $row['password'];  
                    echo "<script>alerta_ini()</script>";
                } else {
                    echo "<script>alerta_epass()</script>";
                }
            }
            
            ?>

            <div class="box1">

                <form action="" method="POST">

                    <div class="intext">
                        <h1>Bienvenido de vuelta</h1>
                        <p>Para iniciar sesión pon tu correo y contraseña.</p>
                    </div>

                    <div class="cor">
                        <input type="email" placeholder="Correo" name="email" value="<?php echo $email; ?>"  required>
                    </div>

                    <div class="contra">
                        <input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    
                    <div class="botones">
                        <div id="button">
                        <input type=button class="bt register" onClick="parent.location='./php/register.php'" value='Registrarse'>
                        </div>
                        
                        <div id="button">
                            <input class="btn login" type="submit" name="submit" value="Iniciar sesión">
                        </div>
                    </div>

                    <div class="recontra">
                        <a href="mailto:naturalpet@gmail.com?subject=Recuperar%20contraseña">
                            ¿Se te olvidó la contraseña?
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <div class="right-img">
        <img src="./img/2222.png" alt="">
    </div>

</main>

<!-- #Footer -->
<?php include ("./php/footer.php") ?>
    
</body>

</html>