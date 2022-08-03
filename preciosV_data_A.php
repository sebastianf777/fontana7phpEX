<?php
require('conectar.php');
?>

<?php
$sql = "SELECT id, material, precio From precios_viamonte";
$result = mysqli_query($con, $sql);
while ($crow = mysqli_fetch_assoc($result)) {
?>

    <tr>
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