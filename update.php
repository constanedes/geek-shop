<?php

require("db/connection.php");
include("functions.php");
include("includes/header.php");
include("includes/nav.php");

class Update extends Conection {

    public function __construct(private int $id, $conn)
    {
        $this->conn = $conn;
    }

    public function validar(){
        
        $idExiste = "SELECT count(*) FROM productos WHERE id = $this->id";
        $validacion = $this->conn->prepare($idExiste);
        $validacion->execute();
        $nRows = $validacion->fetchColumn(); 

        if($nRows == 1){
            
            $selecProducto = "SELECT  tipo, marca, modelo, precio_ars, precio_usd, stock, fecha_ingreso FROM productos WHERE id = '$this->id'";
            $selec = $this->conn->prepare($selecProducto);
            $selec->execute();

            if(!$selec){
                die("Error en la consulta.");
            }

            $datos = $selec->fetch();
            return $datos;
        }
        else {
            return false;
        }
    }
     
    public function actualizarProducto($productInf){

        $sql = "UPDATE `productos` SET `tipo` = '$productInf[0]', `marca` = '$productInf[1]', `modelo` = '$productInf[2]', `precio_ars` = '$productInf[3]', `precio_usd` = '$productInf[4]', `stock` = '$productInf[5]', `fecha_ingreso` = '$productInf[6]' WHERE `id` = '$this->id'";

        $resultado = $this->conn->prepare($sql);
        $resultado->execute();


        if(!$resultado){
            die("Error en la consulta");
        }
        else {
            header("Location:index.php");
        }
        
    }
}

// =======================================================================
// =======================================================================

$db = new Conection(); 
$db = $db->connect();
if(isset($_GET['id'])){
    $idActualizar = $_GET["id"];
}

$obj = new Update($idActualizar, $db);
$data = $obj->validar();


if($data != false){

    $tipoProducto = $data['tipo']; 
    $marcaProducto = $data['marca'];
    $modeloProducto = $data['modelo'];
    $precioArs = $data['precio_ars'];
    $precioUsd = $data['precio_usd'];
    $stock = $data['stock'];
    $fechaIngreso = $data['fecha_ingreso'];

    $productInf = array($tipoProducto, $marcaProducto,  $modeloProducto, $precioArs,  $precioUsd,  $stock,  $fechaIngreso);
    
} 
?>

<?php
if(isset($_GET['act'])){

    $tipoProducto = $_GET['tipo']; 
    $marcaProducto = $_GET['marca'];
    $modeloProducto = $_GET['modelo'];
    $precioArs = $_GET['ars'];
    $precioUsd = $_GET['usd'];
    $stock = $_GET['stock'];
    $fechaIngreso = $_GET['fingreso'];
    $idActualizar = $_GET['id'];
    $productInf = array($tipoProducto, $marcaProducto,  $modeloProducto, $precioArs,  $precioUsd,  $stock,  $fechaIngreso);
    $obj->actualizarProducto($productInf, $idActualizar);
}
?>

<div class="mt-10">
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="GET">
        <div class="container-sm pt-xxl-up">
            <div class="row gx-3 mb-4   input-group-lg  justify-content-center">
                <div class="col col-md-3 ">
                    <input class="form-control form-control" type='text' placeholder="Tipo" name='tipo' required
                        maxlength="30" autofocus value="<?=$productInf[0]?>">
                </div>
                <div class="col col-md-3 ">
                    <input class="form-control form-control" type='text' maxlength="40" placeholder="Marca" name='marca'
                        required autofocus value="<?=$productInf[1]?>">
                </div>
            </div>
            <div class="row gx-3 mb-4 input-group-lg justify-content-center">
                <div class="col col-md-6">
                    <input class="form-control form-control" type='text' maxlength="50" name="modelo"
                        placeholder="Modelo" required autofocus value="<?=$productInf[2]?>">
                </div>
            </div>
            <div class="row gx-3 mb-4 input-group-lg justify-content-center">
                <div class="col col-md-3">

                    <input class="form-control form-control" type='number' placeholder="$ARS" name='ars' required
                        autofocus value="<?=$productInf[3]?>">
                    <div id="passwordHelpBlock" class="form-text">
                        Precio en pesos argentinos
                    </div>
                </div>
                <div class="col col-md-3">
                    <input class="form-control form-control" type='number' name='usd' placeholder="$USD" required
                        autofocus value="<?=$productInf[4]?>">
                    <div id="passwordHelpBlock" class="form-text">
                        Precio en dolares estadounidenses
                    </div>
                </div>
            </div>
            <div class="row gx-3 mb-3  input-group-lg  justify-content-center">
                <div class="col  col-md-3">

                    <input class="form-control form-control" type='number' name='stock' placeholder="Stock" required
                        autofocus value="<?=$productInf[5]?>">
                    <div id="passwordHelpBlock" class="form-text">
                        Stock recibido
                    </div>
                </div>
                <div class="col col-md-3">

                    <input class="form-control form-control" type='date' name='fingreso' required autofocus
                        value="<?=$productInf[6]?>">
                    <div id="passwordHelpBlock" class="form-text">
                        Fecha de ingreso del producto
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="d-grid gap-2  col-6 me-auto ms-auto mt-5">
                        <input type="submit" name="act" class="btn sec border-2 border-dark active btn-lg"
                            value="Actualizar registro">
                    </div>

                </div>
                <div class=" row justify-content-center">
                    <div class="col">
                        <input class="form-control form-control" type="hidden" value="<?= $_GET['id'] ?>" name='id'>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<?php include("includes/footer.php"); ?>