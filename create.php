<?php

require("db/connection.php");

class Create extends Conection {

    protected $conn;

   public function __construct(protected string $tipoProducto, protected string $marcaProducto, protected string $modeloProducto,  protected int $precioArs,  protected int $precioUsd, protected int $stock, protected $fechaIngreso, $conn){
       
    $this->conn = $conn;
    }

    public function crearProducto(){

        $sql = "INSERT INTO productos(`tipo`, `marca`, `modelo`, `precio_ars`, `precio_usd`, `stock`, `fecha_ingreso`) VALUES('$this->tipoProducto', '$this->marcaProducto', '$this->modeloProducto', '$this->precioArs', '$this->precioUsd', '$this->stock', '$this->fechaIngreso')";

        $result = $this->conn->prepare($sql);
        $result->execute();

        if(!$result){
            die("Error al ingresar los datos.");
        }
        else{
            header("Location:index.php");
        }
    }
}




$tipoProducto = $_GET['tipo']; 
$marcaProducto = $_GET['marca'];
$modeloProducto = $_GET['modelo'];
$precioArs = $_GET['ars'];
$precioUsd = $_GET['usd'];
$stock = $_GET['stock'];
$fechaIngreso = $_GET['fingreso'];


if((isset($tipoProducto) && !empty($tipoProducto)) && (isset($marcaProducto) && !empty($marcaProducto)) && (isset($modeloProducto) && !empty($modeloProducto)) && (isset($precioArs) && !empty($precioArs)) && (isset($precioUsd) && !empty($precioUsd)) && (isset($stock) && !empty($stock))){

    $db = new Conection(); 
    $db = $db->connect();

    $obj = new Create($tipoProducto, $marcaProducto,$modeloProducto, $precioArs, $precioUsd, $stock, $fechaIngreso, $db);
    $obj->crearProducto();

}
else {
    header("Location:index.php");
}





//$add = new Create($tipoProducto, $marcaProducto, $modeloProducto, $precioArs, $precioUsd,$stock, $fechaIngreso, $db);


        
?>