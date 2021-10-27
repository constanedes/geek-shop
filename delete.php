<?php

require("db/connection.php");

class Delete extends Conection {

    protected $conn;

    public function __construct(protected int $id, $conn)
    {
       $this->conn = $conn;
    }

    public function validar(){

        $idExiste = "SELECT count(*) FROM productos WHERE id = $this->id";
        $validacion = $this->conn->prepare($idExiste);
        $validacion->execute();
        $nRows = $validacion->fetchColumn(); 
        echo $nRows;


        if($nRows >= 1){
            return true;
        }
        else {
            return false;
        }
    }

    public function borrarProducto(){

        if($this->validar() == true){

            $sql = "DELETE FROM productos WHERE id = '$this->id'";
            $result = $this->conn->prepare($sql);
            $result->execute();

            if(!$result){
                die("Error en la consulta.");
            }
            else{
                header("Location:index.php");
            }
        }
        else{
            header("Location:index.php");
        }
    }
}


$db = new Conection(); 
$db = $db->connect();

$idBorrar = $_GET['id'];

$obj = new Delete($idBorrar,$db);
$obj->borrarProducto();

?>