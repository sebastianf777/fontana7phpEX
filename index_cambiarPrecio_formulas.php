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

            $id = mysqli_real_escape_string($conn, $_POST['id_index']);
            $precio = mysqli_real_escape_string($conn, $_POST['precio_index']);

            $query= "UPDATE precios_viamonte SET precio = ? WHERE id = ?;";

            $stmt = $con->prepare($query);

            $stmt->bind_param('is', $precio, $id);

            $stmt->execute();

            if ($stmt->error) {
                echo '<script type="text/javascript">';
                echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");';
                echo 'window.location = "registrar.php";';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("REGISTRO CORRECTO");';
                echo 'window.location = "index.php";';
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
    echo 'window.location = "index.php";';
    echo '</script>';
}
$stmt->close();
?>