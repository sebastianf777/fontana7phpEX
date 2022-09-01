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
            $numero_pedido = mysqli_real_escape_string($conn, $_POST['element_1']);
            $cliente = mysqli_real_escape_string($conn, $_POST['element_11']);
            $direccion = mysqli_real_escape_string($conn, $_POST['element_9']);
            $fechaing = mysqli_real_escape_string($conn, $_POST['element_4_3'] . "-" . $_POST['element_4_1'] . "-" . $_POST['element_4_2']);

            $serie = mysqli_real_escape_string($conn, $_POST['element_3']);
            $pagotipo = mysqli_real_escape_string($conn, $_POST['element_8']);
            $total_pedido = mysqli_real_escape_string($conn, $_POST['element_10']);
            $acuenta = mysqli_real_escape_string($conn, $_POST['element_12']);
            $mostrar = mysqli_real_escape_string($conn, $_POST['element_13']);

            $count_mat = count($_POST['count_mat']);
            $count_fer = count($_POST['count_fer']);
            $cantidad_rows_mat = $_POST['count_mat'];
            $cantidad_rows_fer = $_POST['count_fer'];
            ($count_mat >= $count_fer) ? $bigger_count = $count_mat : $bigger_count = $count_fer;

            for ($i = 0; $i < $bigger_count; $i++) {
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $cantidad_materiales = mysqli_real_escape_string($conn, $_POST['count_mat'][$i]) : $cantidad_materiales = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $materiales = mysqli_real_escape_string($conn, $_POST['element_2'][$i]) : $materiales = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $total_materiales = mysqli_real_escape_string($conn, $_POST['element_5'][$i]) : $total_materiales = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_mat)) ? $cantidad_ferreteria = mysqli_real_escape_string($conn, $_POST['count_fer'][$i]) : $cantidad_ferreteria = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_fer)) ? $ferreteria = mysqli_real_escape_string($conn, $_POST['element_6'][$i]) : $ferreteria = '';
                array_key_exists($i, array_keys((array)$cantidad_rows_fer)) ? $total_ferreteria = mysqli_real_escape_string($conn, $_POST['element_7'][$i]) : $total_ferreteria = '';

                $stmt->execute();
            }

            // $query = "INSERT INTO productos ( numero, producto, total_materiales, fechaing, serie, ferreteria, total_ferreteria, pagotipo, pedido, total_pedido, cliente, acuenta, mostrar, count_mat, count_fer ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = "INSERT INTO productos ( numero_pedido, cliente, direccion, fechaing, cantidad_materiales, materiales, total_materiales, cantidad_ferreteria, ferreteria, total_ferreteria ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $con->prepare($query);

            // $stmt->bind_param('issssssssssssss', $numero_pedido, $materiales, $total_materiales, $fechaing, $serie, $ferreteria, $total_ferreteria, $pagotipo, $direccion, $total_pedido, $cliente, $acuenta, $mostrar, $cantidad_materiales, $cantidad_ferreteria);
            $stmt->bind_param('issssssss', $numero_pedido, $cliente, $fechaing, $direccion, $cantidad_materiales, $materiales, $total_materiales, $cantidad_ferreteria, $ferreteria, $total_ferreteria);

            

            if ($stmt->error) {
                echo '<script type="text/javascript">';
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