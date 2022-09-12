<?php 

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en" class="bg-home">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="../css/style2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo(rand()); ?>" />
    <link rel="icon" href="../img/dogoo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3eb129e6b3.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>

        <div class="logo">
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

    <!-- Slider -->
    <div class="img-slider">
        <div class="slide active">
        <a href="./categorias.php"><img src="../img/1.png"></a>
          <div class="info">
            <h2> </h2>
            </div>
        </div>
        <div class="slide">
            <a href="./categorias.php"><img src="../img/2.png" alt=""></a>
          <div class="info">
            <h2> </h2>
            </div>
        </div>
        <div class="slide">
            <a href="./categorias.php"><img src="../img/3.png" alt=""></a>
          <div class="info">
            <h2> </h2>
            </div>
        </div>
        <div class="slide">
            <a href="./categorias.php"><img src="../img/4.png" alt=""></a>
          <div class="info">
            <h2> </h2>
            </div>
        </div>
        <div class="slide">
            <a href="./categorias.php"><img src="../img/5.png" alt=""></a>
          <div class="info">
            <h2> </h2>
            </div>
        </div>
        <div class="navigation">
          <div class="btn active"></div>
          <div class="btn"></div>
          <div class="btn"></div>
          <div class="btn"></div>
          <div class="btn"></div>
        </div>
    </div>

    <!-- Js de Slider -->
    <script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    let currentSlide = 1;

    // Javascript img-slider manual
    var manualNav = function(manual){
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
          btn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
      });
    });

    // Javascript img-slider automático
    var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) => {
            activeSlide.classList.remove('active');
          });

        slides[i].classList.add('active');
        btns[i].classList.add('active');
        i++;

        if(slides.length == i){
          i = 0;
        }
        if(i >= slides.length){
          return;
        }
        repeater();
      }, 10000);
      }
      repeater();
    }
    repeat();
    </script>

    <footer>
        <p>Copyright &copy; 
            <script>document.write(new Date().getFullYear());
            </script>, Natural Pet
        </p>
        <!-- #copyright -->
    </footer>
    
</body>

</html>