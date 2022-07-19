<?php
//include connection
include("conectar.php");

session_start();

//Retrieve the value of the hidden field
$form_secret = isset($_POST["form_secret"])?$_POST["form_secret"]:'';


if(isset($_SESSION["FORM_SECRET"])) {
    if(strcasecmp($form_secret, $_SESSION["FORM_SECRET"]) === 0) {
        /*Put your form submission code here after processing the form data, unset the secret key from the session*/
        if(isset($_POST['submit']))
{

$numero = mysqli_real_escape_string($conn, $_POST['element_1']);
$producto = mysqli_real_escape_string($conn, $_POST['element_2']);
$serie = mysqli_real_escape_string($conn, $_POST['element_3']);
$fechaing = mysqli_real_escape_string($conn, $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2']);
$detallemateriales = mysqli_real_escape_string($conn, $_POST['element_5']);
$ferreteria = mysqli_real_escape_string($conn, $_POST['element_6']);
$detalleferreteria = mysqli_real_escape_string($conn, $_POST['element_7']);
$pagotipo = mysqli_real_escape_string($conn, $_POST['element_8']);
$pedido = mysqli_real_escape_string($conn, $_POST['element_9']);
$detallepedido = mysqli_real_escape_string($conn, $_POST['element_10']);
$cliente = mysqli_real_escape_string($conn, $_POST['element_11']);
$acuenta = mysqli_real_escape_string($conn, $_POST['element_12']);
$mostrar = mysqli_real_escape_string($conn, $_POST['element_13']);



$stmt = $con->prepare("INSERT INTO productos ( numero, producto, detallemateriales, fechaing, serie, ferreteria, detalleferreteria, pagotipo, pedido, detallepedido, cliente, acuenta, mostrar ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('issssssssssss', $numero, $producto, $detallemateriales, $fechaing, $serie, $ferreteria, $detalleferreteria, $pagotipo, $pedido, $detallepedido, $cliente, $acuenta, $mostrar );

$stmt->execute();
if ($stmt->error){
    echo '<script type="text/javascript">'; 
    echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");'; 
    echo 'window.location = "registrar.php";';
    echo '</script>';
        }  else{
            sleep(3);
            echo '<script type="text/javascript">'; 
            echo 'alert("REGISTRO DE DATOS CORRECTO");'; 
            echo 'window.location = "registrar.php";';
            echo '</script>';
            }
} 
        unset($_SESSION["FORM_SECRET"]);
    }else {
        //Invalid secret key
    }
} else {
	//Secret key missing
    echo '<script type="text/javascript">'; 
    echo 'alert("ERROR DUPLICADO! - el duplicado no se cargó");'; 
    echo 'window.location = "registrar.php";';
    echo '</script>';
}

$stmt->close();
?>