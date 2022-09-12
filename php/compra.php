<?php 

if (isset($_POST['agregar'])){
    /// print_r($_POST['product_id']);
    $compra = $_SESSION['add_carro'];

    $_SESSION['compra'] = $compra;

    session_start($_SESSION['compra']);
    
}else{
    
    echo '<script>window.location="./pago.php";</script>';
}

?>