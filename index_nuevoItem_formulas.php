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

            $id = mysqli_real_escape_string($conn, $_POST['id_nuevoItem_index']);
            $material = mysqli_real_escape_string($conn, $_POST['material_nuevoItem_index']);
            $precio = mysqli_real_escape_string($conn, $_POST['precio_nuevoItem_index']);
            
            // $query = "SELECT precio, id FROM precios_viamonte;";
            $query= "INSERT INTO precios_viamonte (precio, id, material) VALUES (LOWER(?),LOWER(?),LOWER(?));";

            $stmt = $con->prepare($query);

            $stmt->bind_param('iss', $precio, $id, $material);

            $stmt->execute();

            if ($stmt->error) {
                echo '<script type="text/javascript">';
                echo 'alert("ERROR! REVISAR SI FALTA ALGUN DATO");';
                echo 'window.location = "index.php";';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
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