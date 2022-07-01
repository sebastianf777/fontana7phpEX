<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <title>-registros Fontana Viamonte </title>
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        setInterval(function() {
            $("#btn").click();
        }, 7000);
    });
    </script>
</head>
<!-- TERMINA HEAD -->
<!-- EMPIEZA BODY -->

<body>
    <!-- NAV BAR -->
    <header>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <svg xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 40V24H4L24 6l10 8.85V9h4v9.55L44 24h-6v16H26.5V28h-5v12Zm3-3h5.5V25h11v12H35V19.95l-11-10-11 10Zm5.5-12h11-11Zm1.25-5.5h8.5q0-1.65-1.275-2.725Q25.7 15.7 24 15.7q-1.7 0-2.975 1.075Q19.75 17.85 19.75 19.5Z" />
                        </svg>
                        <span class="link-text">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="registrar.php">Registrar</a>
                </li>
                <li class="nav-item">
                    <a href="deposito.php">Depósito</a>
                </li>
                <li class="nav-item">
                    <a href="resumen.php">Resumen</a>
                </li>
                <li class="lnav-item">
                    <a href="#about">About</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- TABLA VENTAS -->
    <div class='tabla_titulo'>
        <div class="titulo">
         VENTAS MOSTRADOR - FONTANA VIAMONTE
        </div>
        <table data-vertable='ver1'>


            <thead id="tabla">
                <tr class='row100 head'>
                    <th class='column100 column1'>
                        <center class="numero">Nº</center>
                    </th>
                    <th class='column100 column2' data-column='column2'>
                        <center class="producto">PRODUCTO</center>
                    </th>
                    <th class='column100 column3' data-column='column3'>
                        <center>VENDEDOR</center>
                    </th>
                    <th class='column100 column4' data-column='column4'>
                        <center>FECHA INGRESO</center>
                    </th>
                    <th class='column100 column5' data-column='column5'>
                        <center>ID</center>
                    </th>

                </tr>
            </thead>
            <tbody>

                <?php
								require('conectar.php');
								?>
                <?php
								$sql = "SELECT numero, UPPER(producto) AS ferremat, serie, fechaing, id from productos WHERE detallemateriales != '' 
								UNION
								SELECT numero, UPPER(ferreteria) AS ferremat, serie, fechaing, id from productos WHERE mostrar = 'Si' AND detalleferreteria != '' order by id DESC LIMIT 15 ";
								$result = mysqli_query($con, $sql);
								while ($crow = mysqli_fetch_assoc($result)) {
								?>
                <tr class='row100'>
                    <td style='width:10px'>
                        <center class="numero"> <?php echo $crow['numero']; ?> </center>
                    </td>
                    <td class="producto">

                        <center class="numero"> <?php echo $crow['ferremat']; ?> </center>
                    </td>
                    <td>
                        <center><?php echo $crow['serie']; ?></center>
                    </td>
                    <td>
                        <center><?php echo $crow['fechaing']; ?></center>
                    </td>
                    <td>
                        <center><?php echo $crow['id']; ?></center>
                    </td>
                </tr>

                <?php
								}
								?>

            </tbody>
        </table>
    </div>
</body>


</html>