<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BD Redis</title>
</head>
<body>
    <h1>ingresa tu datos</h1>

    <form action="vista.php" method="post">
        <p>ingresa tu nombre: <input type="text" name="nombre"></p>
        <p>ingresa tu numero de celular: <input type="text" name="cel"></p>
        <p>ingresa tu compra: <input type="text" name="compra"></p>
        <input type="submit" value="enviar">
        <input type="submit" value="mostrar" name="mostrar">
    </form>

<?php
    include 'conexion.php';
    
    if (isset($_REQUEST['nombre'])) {
        if (empty($_POST['nombre'])) {
            echo "<script>alert('el nombre esta vacio')</script>";
        }else{
            $nombre = $_POST['nombre'];
            $cel = $_POST['cel'];
            $prod = $_POST['compra'];
            $clave = $nombre.$cel;

            if (!empty($_POST['compra'])) {
                $redis->rpush($clave,$prod);
            }

            if (isset($_REQUEST['mostrar'])) {
                $lista = $redis->lrange($clave, 0 ,-1);
                foreach ($lista as $key) {
                    echo "<li>".$key. "</li>";
                }
            }

        }
    }

?>
</body>
</html>