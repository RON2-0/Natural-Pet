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
                echo "<script>window.location = 'producto1.php'</script>";
            }else{
    
                $count = count($_SESSION['add_carro']);
                $item_array = array(
                    'item_id' => $_POST['item_id'],
                    'item_nombre' => $_POST['item_nombre'],
                    'item_precio' => $_POST['item_precio'],
                    'item_img' => $_POST['item_img'],
                    'item_cantidad' => $_POST['item_cantidad'],
                );
                echo "<script>alert('DONE.')</script>";
                echo "<script>window.location = 'producto1.php'</script>";
    
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
<html lang="en" class="bg-products">

<!-- Head -->

<?php include ("../php/headproduct.php");?>

<?php
        $sql = "SELECT * FROM categorias, productos WHERE categorias.IDCategoria = '00003' AND productos.IDProducto = '00001'";
        $resul = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resul) > 0) {
            while ($row = mysqli_fetch_array($resul)) {
?>
        
    <title><?php echo $row['categoria']; ?> | <?php echo $row['producto']; ?></title>

    <?php
        }
    }
?>

<body>

<!-- #Header -->
<?php include ("../php/headerproductos.php") ?>

    <main>

        <h1>Detalles del Producto</h1>
        
        <section class="producto">

            <?php
                    $sql = "SELECT * FROM productos WHERE IDCategoria = '00003' AND IDProducto = '00007' ";
                    $resul = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($resul) > 0) {
                        while ($row = mysqli_fetch_array($resul)) {
            ?>
                                
                <form method="POST" action="">

                    <div class="izq">

                        <h1><?php echo $row['producto']; ?></h1>
                        <p style="margin-bottom: 0rem;">$<?php echo $row['precio']; ?></p>

                        <div class="cantidad">
                            <input type="number" name="item_cantidad" min="1" max="100" value="1" readonly />
                        </div>

                        <div class="cajitas">
                            <a href=""><img src="../img/<?php echo $row['imagen']; ?>" alt=""></a>
                            <a href=""><img src="../img/<?php echo $row['imagen']; ?>" alt=""></a>
                            <a href=""><img src="../img/<?php echo $row['imagen']; ?>" alt=""></a>
                        </div>

                    </div>

                    <div class="cen">

                        <div class="circle">
                            <img src="../img/<?php echo $row['imagen']; ?>" alt="">
                        </div>

                    </div>

                    <div class="der">

                        <h2>Descripción</h2>
                        <p style="margin-bottom: 0;"><?php echo $row['descripcion']; ?></p>

                        <form action="" method="POST">

                        <div id="btnpro">
                            <input class="btn vermas" type="submit" name="agregar" value="Agregar al carrito">
                            <input type="hidden" name="item_id" value="<?php echo $row['IDProducto']; ?>">
                            <input type="hidden" name="item_nombre" value="<?php echo $row['producto']; ?>" />
                            <input type="hidden" name="item_precio" value="<?php echo $row['precio']; ?>" />
                            <input type="hidden" name="item_img" value="<?php echo $row['imagen']; ?>" />
                        </div>
                        
                        </form>

                    </div>

                </form>

                <?php
                    }
                }
            ?>

        </section>

    </main>

    <div class="text1"><p>Imágenes con fines ilustrativos</p></div>

    <!-- #Footer -->
    <?php include ("../php/footer.php") ?>
    
</body>
</html>