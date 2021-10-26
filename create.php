<?php

require("db/connection.php");


$tipoProducto = $_GET['tipo']; 
$marcaProducto = $_GET['marca'];
$modeloProducto = $_GET['modelo'];
$precioArs = $_GET['ars'];
$precioUsd = $_GET['usd'];
$stock = $_GET['stock'];
$fechaIngreso = $_GET['fingreso'];


$sql = "INSERT INTO productos (`tipo`, `marca`, `modelo`, `precio_ars`, `precio_usd`, `stock`, `fecha_ingreso`) VALUES($tipoProducto, $marcaProducto, $modeloProducto, $precioArs, $precioUsd, $stock)";

    
$resultado = mysqli_query($db, $sql);

//$add = new Create($tipoProducto, $marcaProducto, $modeloProducto, $precioArs, $precioUsd,$stock, $fechaIngreso, $db);


        
?>