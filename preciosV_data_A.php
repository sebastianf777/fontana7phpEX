<?php
require('conectar.php');
?>

<?php
$sql = "SELECT id, material, precio From precios_viamonte";
$result = mysqli_query($con, $sql);
while ($crow = mysqli_fetch_assoc($result)) {
    $id = $crow['id'];
    $material = $crow['material'];
    $precio = $crow['precio'];

?>

<option id='<?php echo $crow['id']; ?>' data-precio='<?php echo $crow['precio']; ?>' value='<?php echo $crow['material']; ?>'><?php echo $crow['material']; ?></option>";
<?php
}
?>