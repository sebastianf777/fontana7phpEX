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


// for($i=0; $i < $count_fer_array; $i++) {
// $ferreteria = mysqli_real_escape_string($conn, $_POST['element_6']);
// $detalleferreteria = mysqli_real_escape_string($conn, $_POST['element_7']);
// }

$serie = mysqli_real_escape_string($conn, $_POST['element_3']);
$fechaing = mysqli_real_escape_string($conn, $_POST['element_4_3']."-".$_POST['element_4_1']."-".$_POST['element_4_2']);
$pagotipo = mysqli_real_escape_string($conn, $_POST['element_8']);
$pedido = mysqli_real_escape_string($conn, $_POST['element_9']);
$detallepedido = mysqli_real_escape_string($conn, $_POST['element_10']);
$cliente = mysqli_real_escape_string($conn, $_POST['element_11']);
$acuenta = mysqli_real_escape_string($conn, $_POST['element_12']);
$mostrar = mysqli_real_escape_string($conn, $_POST['element_13']);


// $arr = array();
$count_mat = count($_POST['count_mat']);
$count_fer = count($_POST['count_fer']);
$cantidad_rows_mat =$_POST['count_mat'];
$cantidad_rows_fer =$_POST['count_fer'];

// $count_mat_array = array_keys(['count_mat']);
// $count_fet_array = array_keys(['count_fer']);
// $min = min(count($count_mat_array), count($count_fet_array));

// $it = new MultipleIterator();
// $it->attachIterator(new ArrayIterator(array($_POST['element_2'])));
// $it->attachIterator(new ArrayIterator(array($_POST['element_5'])));
// $it->attachIterator(new ArrayIterator(array($_POST['element_6'])));
// $it->attachIterator(new ArrayIterator(array($_POST['element_7'])));



$numero = mysqli_real_escape_string($conn, $_POST['element_1']);


$query = "INSERT INTO productos ( numero, producto, detallemateriales, fechaing, serie, ferreteria, detalleferreteria, pagotipo, pedido, detallepedido, cliente, acuenta, mostrar ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


// $producto = $detallemateriales = '';
$stmt = $con->prepare($query);

$stmt->bind_param('issssssssssss', $numero, $producto, $detallemateriales, $fechaing, $serie, $ferreteria, $detalleferreteria, $pagotipo, $pedido, $detallepedido, $cliente, $acuenta, $mostrar );

// foreach($it as $a) {
//     $key = $it -> key();
//     $producto = mysqli_real_escape_string($conn, $it[0]);
//     $detallemateriales = mysqli_real_escape_string($conn, $it[1]);
//     $ferreteria = mysqli_real_escape_string($conn, $it[2]);
//     $detalleferreteria = mysqli_real_escape_string($conn, $it[3]);
//     echo $producto;
//     $stmt->execute();
//     }



 ($count_mat >= $count_mat) ? $bigger_count = $count_mat : $bigger_array = $count_fet ;

for($i=0; $i < $bigger_count; $i++) {
    array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $producto = mysqli_real_escape_string($conn, $_POST['element_2'][$i]) : $producto = '';
    array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $detallemateriales = mysqli_real_escape_string($conn, $_POST['element_5'][$i]): $detallemateriales = '';
    array_key_exists($i, array_keys((array)$cantidad_rows_fer)) ? $ferreteria = mysqli_real_escape_string($conn, $_POST['element_6'][$i]): $ferreteria = '';
    array_key_exists($i, array_keys((array)$cantidad_rows_fer)) ? $detalleferreteria = mysqli_real_escape_string($conn, $_POST['element_7'][$i]): $detalleferreteria = '';
    echo $producto;
    $stmt->execute();
    }

if ($stmt->error){
    echo '<script type="text/javascript">'; 
    echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");'; 
    echo 'window.location = "registrar.php";';
    echo '</script>';
        }  else{
            // echo $count_mat_array;
            // echo $producto;
            // echo $ferreteria;
            // echo $count_mat_array;
            // sleep(3);
            // echo '<script type="text/javascript">'; 
            // echo 'alert("REGISTRO DE DATOS CORRECTO");'; 
            // echo 'window.location = "registrar.php";';
            // echo '</script>';
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
