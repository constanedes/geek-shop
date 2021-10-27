<?php

require("db/connection.php");
include("includes/header.php");
include("includes/nav.php");

//$sql = "UPDATE productos SET  tipo = '$tipo', marca = '$marca', modelo = '$marca', precio_ars = '$precio_ars', precio_usd = '$precio_usd', stock = '$stock', fecha_ingreso='$fecha_ingreso' WHERE id = '$id'";



class Update extends Conection {

    public function __construct(private int $id, $conn)
    {
        $this->conn = $conn;
    }

    public function validar(){
        
        // $query = "SELECT count(*) FROM productos WHERE id = $this->id";
        // $var = $nRows->fetchColumn(); 
        // echo $var;
        $nRows = 1; 

        if($nRows == 1){
            
            $selecProducto = "SELECT  tipo, marca, modelo, precio_ars, precio_usd, stock, fecha_ingreso FROM productos WHERE id = '$this->id'";
            $selec = $this->conn->prepare($selecProducto);
            $selec->execute();

            if(!$selec){
                die("Error en la consulta.");
            }

            $selec->fetchAll(PDO::FETCH_ASSOC);

            $tipoProducto = $selec['tipo']; 
            $marcaProducto = $selec['marca'];
            $modeloProducto = $selec['modelo'];
            $precioArs = $selec['precio_ars'];
            $precioUsd = $selec['precio_usd'];
            $stock = $selec['stock'];
            $fechaIngreso = $selec['fecha_ingreso'];

            $productInf = array($tipoProducto, $marcaProducto,  $modeloProducto, $precioArs,  $precioUsd,  $stock,  $fechaIngreso);

            return $productInf;
        }
    }    
}

?>
<div class="mt-10">
    <form class="needs-validation" action="<?= $_SERVER['PHP_SELF'];?>" method="GET" novalidate>
        <div class="container-sm pt-xxl-up  ">
            <div class="row gx-3 mb-4   input-group-lg  justify-content-center">
                <div class="col col-md-3 ">
                    <input class="form-control form-control" type='text' placeholder="Tipo" name='tipo' required
                        maxlength="30"  autofocus>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col col-md-3 ">
                    <input class="form-control form-control" type='text' maxlength="40" placeholder="Marca" name='marca'
                        required autofocus>
                </div>
            </div>
            <div class="row gx-3 mb-4 input-group-lg justify-content-center">
                <div class="col col-md-6">
                    <input class="form-control form-control" type='text' maxlength="50" name="modelo"
                        placeholder="Modelo" required autofocus>
                </div>

            </div>
            <div class="row gx-3 mb-4 input-group-lg justify-content-center">
                <div class="col col-sm-3">

                    <input class="form-control form-control" type='number' placeholder="$ARS" name='ars' required
                        autofocus>
                    <div id="passwordHelpBlock" class="form-text">
                        Precio en pesos argentinos
                    </div>
                </div>
                <div class="col col-sm-3">
                    <input class="form-control form-control" type='number' name='usd' placeholder="$USD" required
                        autofocus>
                    <div id="passwordHelpBlock" class="form-text">
                        Precio en dolares estadounidenses
                    </div>
                </div>
            </div>
            <div class="row gx-3 mb-3  input-group-lg  justify-content-center">
                <div class="col  col-sm-3">

                    <input class="form-control form-control" type='number' name='stock' placeholder="Stock" required
                        autofocus>
                    <div id="passwordHelpBlock" class="form-text">
                        Stock recibido
                    </div>
                </div>
                <div class="col col-sm-3">

                    <input class="form-control form-control" type='date' name='fingreso' required autofocus>
                    <div id="passwordHelpBlock" class="form-text">
                        Fecha de ingreso del producto
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="d-grid gap-2  col-6 me-auto ms-auto mt-5">
                        <input type="submit" class="btn sec border-2 border-dark active btn-lg"
                            value="Actualizar registro">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<?php

$db = new Conection(); 
$db = $db->connect();

$idActualizar = $_GET['id'];

$obj = new Update($idActualizar, $db);
$resultado = $obj->validar();

dump_debug($resultado);


include("includes/footer.php");

?>