<?php
//include connection
include("conectar.php");

session_start();

//Retrieve the value of the hidden field
$form_secret = isset($_POST["form_secret"]) ? $_POST["form_secret"] : '';


if (isset($_SESSION["FORM_SECRET"])) {
    if (strcasecmp($form_secret, $_SESSION["FORM_SECRET"]) === 0) {
        /*Put your form submission code here after processing the form data, unset the secret key from the session*/
        if (isset($_POST['submit'])) {

            $serie = mysqli_real_escape_string($conn, $_POST['element_3']);
            $fechaing = mysqli_real_escape_string($conn, $_POST['element_4_3'] . "-" . $_POST['element_4_1'] . "-" . $_POST['element_4_2']);
            $pagotipo = mysqli_real_escape_string($conn, $_POST['element_8']);
            $pedido = mysqli_real_escape_string($conn, $_POST['element_9']);
            $detallepedido = mysqli_real_escape_string($conn, $_POST['element_10']);
            $cliente = mysqli_real_escape_string($conn, $_POST['element_11']);
            $acuenta = mysqli_real_escape_string($conn, $_POST['element_12']);
            $mostrar = mysqli_real_escape_string($conn, $_POST['element_13']);

            $count_mat = count($_POST['count_mat']);
            $count_fer = count($_POST['count_fer']);
            $cantidad_rows_mat = $_POST['count_mat'];
            $cantidad_rows_fer = $_POST['count_fer'];

            $numero = mysqli_real_escape_string($conn, $_POST['element_1']);

            $query = "INSERT INTO productos ( numero, producto, detallemateriales, fechaing, serie, ferreteria, detalleferreteria, pagotipo, pedido, detallepedido, cliente, acuenta, mostrar, count_mat, count_fer ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $con->prepare($query);

            $stmt->bind_param('issssssssssssss', $numero, $producto, $detallemateriales, $fechaing, $serie, $ferreteria, $detalleferreteria, $pagotipo, $pedido, $detallepedido, $cliente, $acuenta, $mostrar, $cantidad_materiales, $cantidad_ferreteria);

            ($count_mat >= $count_fer) ? $bigger_count = $count_mat : $bigger_count = $count_fer;

            for ($i = 0; $i < $bigger_count; $i++) {
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $cantidad_materiales = mysqli_real_escape_string($conn, $_POST['count_mat'][$i]) : $producto = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $producto = mysqli_real_escape_string($conn, $_POST['element_2'][$i]) : $producto = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $detallemateriales = mysqli_real_escape_string($conn, $_POST['element_5'][$i]) : $detallemateriales = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $cantidad_ferreteria = mysqli_real_escape_string($conn, $_POST['count_fer'][$i]) : $producto = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_fer)) ? $ferreteria = mysqli_real_escape_string($conn, $_POST['element_6'][$i]) : $ferreteria = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_fer)) ? $detalleferreteria = mysqli_real_escape_string($conn, $_POST['element_7'][$i]) : $detalleferreteria = '';

                $stmt->execute();
            }

            if ($stmt->error) {
                echo '<script async type="text/javascript">';
                echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");';
                echo 'window.location = "registrar.php";';
                echo '</script>';
            } else {

                $_SESSION['registro'] = 'Success';
                echo '<script type="text/javascript">';
                echo 'window.location = "registrar.php";';
                echo '</script>';
            }
        }
        unset($_SESSION["FORM_SECRET"]);
    } else {
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

<!-- <html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <title>Test Page</title>

</head>

<body>
</body>

</html> -->