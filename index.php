<?php

require("db/connection.php"); //Requiere la base de datos, caso contrario da error fatal 
include("includes/header.php"); 
include("includes/nav.php"); 



$db = new Conection(); 
$db = $db->connect();

$vista = "SELECT 
                id,
                tipo,
                marca,
                modelo,
                precio_ars,
                precio_usd,
                stock,
                fecha_ingreso
                FROM
                productos
                ORDER BY id DESC
                LIMIT 100;";


$tabla = $db->prepare($vista);
$tabla->execute();
?>

<div class="table-responsive">
    <table class="table caption-top table-bordered table-hover">
        <form class="needs-validation" action="create.php" method="POST">
            <thead class="table-primary fs-5-5">
                <tr>
                    <?php
                for($i = 0; $i < $tabla->columnCount(); $i++):
                $infoCampo = $tabla->getColumnMeta($i);
                echo "<th class=' text-capitalize text-center'>" . $infoCampo['name'] . "</th>";
                endfor;
                ?>
                    <?= str_repeat("<th></th>", 2) ?>
                </tr>
            </thead>
            <tbody class="fs-6-5">
                <?php
            while($fila = $tabla->fetch()):  
                echo "<tr>";

            for($j = 0; $j < $tabla->columnCount(); $j++):
                echo "<td class=' text-capitalize text-center'>" . $fila[$j] . "</td>";  
            endfor;

            // cada link envia el ID del elemento correspondiente por GET
            echo ('<td><a class="btn btn-outline-warning mx-auto d-block" href="update.php?id=' . $fila[0] . '">Editar</a></td>'   . 
                '<td><a class="btn btn-outline-danger mx-auto d-block" href="delete.php?id=' . $fila[0] . '">Eliminar</a></td>' . 
                '</tr>'); 
            endwhile;
            ?>
            </tbody>
            <tfoot class="">
                <tr>
                    <div>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <input class="form-control form-control" type='text' placeholder="Tipo" name='tipo' required
                                maxlength="30" autofocus>
                        </td>
                        <td>
                            <input class="form-control form-control" type='text' maxlength="40" placeholder="Marca"
                                name='marca' required>
                        </td>
                        <td>
                            <input class="form-control form-control" type='text' maxlength="50" name="modelo"
                                placeholder="Modelo" required>
                        </td>
                        <td>
                            <input class="form-control form-control" type='number' placeholder="$ARS" name='ars'
                                required>
                        </td>
                        <td>
                            <input class="form-control form-control" type='number' name='usd' placeholder="$USD"
                                required>
                        </td>
                        <td>
                            <input class="form-control form-control" type='number' name='stock' placeholder="Stock"
                                required>
                        </td>
                        <td>
                            <input class="form-control form-control" type='date' name='fingreso' required>
                        </td>
                    </div>
                    <td>
                        <input class="form-control form-control btn btn-primary" type='submit' name='insertar'
                            value='INSERTAR'>
                    </td>
                </tr>
            </tfoot>
        </form>
    </table>
</div class="pb-5">

<?php include("includes/footer.php") ?>