<?php

require("db/connection.php"); //Requiere la base de datos, caso contrario da error fatal 
include("includes/header.php"); 
include("includes/nav.php"); 

?>

<div class=" table-responsive ">
    <table class="table caption-top table-bordered table-hover">
        <caption>List of users</caption>
        <thead class=" table-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th scope="row" class=" border-dark border-1 ">4</th>
                <td class=" border-dark border-1 ">Larry</td>
                <td class=" border-dark border-1 ">the Bird</td>
                <td class=" border-dark border-1 ">@twitter</td>
            </tr>
        </tfoot>
    </table>
</div>


<form action="create.php" method="GET">
   <input type="text" name="tipo">
     <br>
    <input type="text" name="marca">
    <br>
    <input type="text" name="modelo">
    <br>
    <input type="number" name="ars">
    <br>
    <input type="number" name="usd">
    <br>
    <input type="number" name="stock">
    <br>
    <input type="date" name="fingreso">
    <br><br>
    <input type="submit" value="enviar">
</form>

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

