<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <title>-registros Fontana Viamonte </title>

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

<center>

    <body>

        <!-- NAV BAR -->

        <header>

            <ul class="nav">
                <li class="liLeft"><a href="index.php">Inicio</a></li>
                <li class="liLeft"><a href="registrar.php">Registrar</a></li>
                <li class="liRight"><a href="#about">About</a></li>
                <li class="liLeft active">

                    <button id="btn" style="font-family: 'PT Serif', serif; margin: 0px; width: 110px; height:47px;
						 color:white ; border-right: grey solid .1px; cursor: pointer;" type="submit"
                        onclick="javascript: location.href='deposito.php';">Depósito</button>

                </li>
                <li class="liLeft">

                    <button id="btn" style="font-family: 'PT Serif', serif; margin: 0px; width: 110px; height:47px;
						 color:white ; border-right: grey solid .1px; cursor: pointer;" type="submit"
                        onclick="javascript: location.href='resumen.php';">Resumen</button>

                </li>
            </ul>
        </header>

        <!-- TABLA VENTAS -->

        <div class="content">
            <div class="container">
                <div class='wrap-table100'>
                    <div class='table100 ver1 m-b-110'>
                        <table data-vertable='ver1'>
                            <div class="logoB">
                                <div class="divLogo">
                                    <h1 class="h1Logo">VENTAS MOSTRADOR - FONTANA VIAMONTE </h1>
                                </div>

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
                </div>
                <div>
                </div>
            </div>
        </div>
    </body>
</center>
<script>

</script>

</html>