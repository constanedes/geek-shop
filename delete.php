<?php

require("db/connection.php");


class Delete extends Conection {

    protected $conn;

    public function __construct(protected string $tipoProducto, protected string $marcaProducto, protected string $modeloProducto,  protected int $precioArs,  protected int $precioUsd, protected int $stock, protected $fechaIngreso, $conn)
    {
       $this->conn = $conn;
    }


    public function borrarProducto(){

        $sql = "DELETE FROM productos(`tipo`, `marca`, `modelo`, `precio_ars`, `precio_usd`, `stock`, `fecha_ingreso`) VALUES('$this->tipoProducto', '$this->marcaProducto', '$this->modeloProducto', '$this->precioArs', '$this->precioUsd', '$this->stock', '$this->fechaIngreso')";

        $result = $this->conn->prepare($sql);
        $result->execute();

        if(!$result){
            die("Error en la consulta.");
        }
        else{
            header("Location:index.php");
        }
    }
}
?>