<?php
require('conectar.php');
?>
<option value="">Elegir-opción</option>

<?php
$sql = "SELECT id, material, precio From precios_viamonte";
$result = mysqli_query($con, $sql);
while ($crow = mysqli_fetch_assoc($result)) {
    $id = $crow['id'];
    $material = $crow['material'];
    $precio = $crow['precio'];

?>

    <option id='<?php echo $crow['material']; ?>' data-precio='<?php echo $crow['precio']; ?>' value='<?php echo $crow['id']; ?>'><?php echo $crow['material']; ?></option>
<?php
}
?>