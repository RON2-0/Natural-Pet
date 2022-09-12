<?php 

session_start();

include ("./config.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
}

if(isset($_POST['action'])){

    $action = $_POST['action'];
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : 0;

    if($action == 'addcantidad'){
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = addcantidad($item_id, $item_cantidad);
        if ($respuesta > 0) {
            $datos ['ok'] = true; 
        }else {
            $datos ['ok'] = false;
        }
        $datos['sub'] = number_format($respuesta, 2);
    }else {
        $datos['ok'] = false;
    }
}

echo json_encode($datos);

function addcantidad($item_id, $item_cantidad){

    $res = 0;

    if($item_id > 0 && $item_cantidad > 0 && is_numeric(($item_cantidad))){
        if(isset($_SESSION['add_carro'][$item_id])){
            $_SESSION['add_carro'][$item_id] = $item_cantidad;

            require_once ("./config.php");

            $sql = "SELECT precio FROM productos WHERE IDProducto=? LIMIT 1 ";
            $resul = mysqli_query($conn, $sql);
            $item_precio = $row['precio'];
            $res = $item_cantidad * $item_precio;

            return $res;
        }  
    }else{
        return $res;
    }

}

?>