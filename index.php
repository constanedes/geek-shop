<?php

require("db/connection.php"); //Requiere la base de datos, caso contrario da error fatal 

include("includes/header.php"); 
include("includes/nav.php"); 

?>




<?php

include("includes/footer.php")

/*
$obj = new Conection();
$conn = $obj->connect();

$sql = "SELECT * FROM task";
$result = $conn->prepare($sql);

$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);

dump_debug($data);
*/
?>