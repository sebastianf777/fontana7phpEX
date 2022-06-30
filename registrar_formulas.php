<?php
//include connection
include("conectar.php");

if(isset($_POST['submit']))
{

$numero = $_POST['element_1'];
$producto = $_POST['element_2'];
$serie = $_POST['element_3'];
$fechaing = $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2'];
$detallemateriales = $_POST['element_5'];
$ferreteria = $_POST['element_6'];
$detalleferreteria = $_POST['element_7'];
$pagotipo = $_POST['element_8'];
$pedido = $_POST['element_9'];
$detallepedido = $_POST['element_10'];
$cliente = $_POST['element_11'];
$acuenta = $_POST['element_12'];
$mostrar = $_POST['element_13'];

$stmt = $con->prepare("INSERT INTO productos ( numero, producto, detallemateriales, fechaing, serie, ferreteria, detalleferreteria, pagotipo, pedido, detallepedido, cliente, acuenta, mostrar ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('issssssssssss', $numero, $producto, $detallemateriales, $fechaing, $serie, $ferreteria, $detalleferreteria, $pagotipo, $pedido, $detallepedido, $cliente, $acuenta, $mostrar );

$stmt->execute();
} 
// if ($conn-> query($stmt) === TRUE)
// {
//     echo "The New Inserted Id is:" .$conn-> insert_id;
// }
// else
// {
//     echo "Not Inserted";
// }

if ($stmt->error)
	{
echo '<script type="text/javascript">'; 
echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");'; 
echo 'window.location = "registrar.php";';
echo '</script>';
    }
    else
    {
echo '<script type="text/javascript">'; 
echo 'alert("REGISTRO DE DATOS CORRECTO");'; 
echo 'window.location = "registrar.php";';
echo '</script>';
    }

$stmt->close();
?>  