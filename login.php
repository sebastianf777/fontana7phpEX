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
        $verifico_password =password_verify($_POST['password'], $usuario_db_pass);
        //  echo '<p class="error">Username password combination is wrong!</p>';
        if ( $verifico_password === TRUE) {
            //  $_SESSION['user_id'] = $result['id'];
            session_regenerate_id(true);

            $_SESSION['user_id'] = $username;
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
	<link rel="stylesheet" type="text/css" href="total/css_others/style.css">
    

    <title>Document</title>
</head>
<body>

<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>
</body>
</html>

