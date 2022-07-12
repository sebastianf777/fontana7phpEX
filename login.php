<?php

include('conectar.php');
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
    //  $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");


    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $usuario_db_pass = $row['password'];
        $verifico_password = password_verify($_POST['password'], $usuario_db_pass);
        //  echo '<p class="error">Username password combination is wrong!</p>';
        if ($verifico_password === TRUE) {
            //  $_SESSION['user_id'] = $result['id'];
            session_regenerate_id(true);

            $_SESSION['user_id'] = $username;
            sleep(3);
            header("refresh:5;url=resumen.php");
            echo '<p class="success">Felicidades, estás logueado! Redireccionando...</p>';
            exit();
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    } else {
        echo "Password o email incorrectos.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/css/login.css">
    <title>Log In</title>
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <section>
        <form id="accesspanel" method="post" action="" name="signin-form">
            <h1 id="litheader">Fontana Materiales</h1>

            <!-- <div class="form-element">
                <label>Username</label>
                <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" required />
            </div> -->

            <div class="inset">
                <p>
                    <input type="text" name="username" pattern="[a-zA-Z0-9]+" placeholder="Usuario" required>
                </p>
                <p>
                    <input type="password" name="password" placeholder="Código de Acceso" required>
                </p>
            </div>

            <p class="p-container">
                <!-- <button type="submit" name="login" value="login">Log In</button> -->

                <input type="submit" name="login" id="go" value="Authorize">
            </p>
        </form>
        <div class="background-wrap">
            <div class="background"></div>
        </div>

        <!-- <form id="accesspanel" action="login" method="post">
            <h1 id="litheader">Fontana Materiales</h1>
            <div class="inset">
                <p>
                    <input type="text" name="username" id="username" placeholder="Usuario">
                </p>
                <p>
                    <input type="password" name="password" id="password" placeholder="Código de Acceso">
                </p>
                <div style="text-align: center;">
                    <div class="checkboxouter">
                        <input type="checkbox" name="rememberme" id="remember" value="Remember">
                        <label class="checkbox"></label>
                    </div>
                    <label for="remember">Remember me for 14 days</label>
                </div>
                <input class="loginLoginValue" type="hidden" name="service" value="login" />
            </div>
            <p class="p-container">
                <input type="submit" name="login" id="go" value="login">
            </p>
        </form> -->
    </section>
    <script src="/js/login.js"></script>
</body>

</html>