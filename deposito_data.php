<?php
require('conectar.php');
?>
<thead>
    <tr>
        <th class="deposito_numero">
            Nº
        </th>
        <th class="deposito_producto">
            PRODUCTO
        </th>
        <th class="deposito_vendedor">
            VENDEDOR
        </th>
        <th class="deposito_id">
            ID
        </th>
    </tr>
</thead>
<?php
$sql = "SELECT numero, UPPER(producto) AS ferremat, count_mat AS cantidad, serie, id from productos WHERE detallemateriales != '' 
                        UNION
                        SELECT numero, UPPER(ferreteria) AS ferremat, count_fer AS cantidad, serie, id from productos WHERE mostrar = 'Si' AND detalleferreteria != '' order by id DESC LIMIT 30 ";
$result = mysqli_query($con, $sql);
while ($crow = mysqli_fetch_assoc($result)) {
?>

        <tr >
            <td class="deposito_numero">
                <?php echo $crow['numero']; ?>
            </td>
            <td class="deposito_ferremat">
                <?php echo $crow['cantidad']; ?>
                <?php echo $crow['ferremat']; ?>
            </td>
            <td class="deposito_serie">
                <?php echo $crow['serie']; ?>
            </td>
            <td>
                <?php echo $crow['id']; ?>
            </td>
        </tr>
<?php
}
?>