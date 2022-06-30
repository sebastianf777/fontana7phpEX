<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
    }
if (isset($_GET['desconectar'])) {
	session_destroy();
	header("refresh:5;url=login.php");
	echo("<span style='color:green;'>Haz sido desconectado correctamente. Redireccionando...</span>");
	exit;
	}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- CSS TABLE/MAIN CSS -->
	<link rel="stylesheet" type="text/css" href="total/css_table/main.css">
	<title>-registros Fontana Viamonte </title>
</head>
 
<!-- TERMINA HEAD -->
<!-- EMPIEZA BODY -->

<center>


<body>

<!-- NAV BAR -->

		<header>

			<ul class="nav">
				<li class="liLeft">
				<a href="index.php">Inicio</a>
			    </li>
				<li class="liLeft">
				<a href="registrar.php">Registrar</a>
			    </li>
				<li class="liLeft">
				<a href="deposito.php">Depósito</a>
				</li>
			    <li class="liLeft active">
				<a href="resumen.php">Resumen</a>
			    </li>  
				<li class="liRight">
				<a href="#about">About</a>
				</li>
			</ul>
		</header>

<!-- CLEAR FLOATS -->

		<div class="clearFloats">
		</div>

<!-- TABLA VENTAS -->
<a class="desconectar_boton" href="<?php echo $_SERVER['PHP_SELF']; ?>?desconectar=si">Desconectar</a>
<!-- <button type="submit" name="login" value="desconectar">Desconectar</button> -->

		<div class="content">
			<div class="container">
				<div class='wrap-table100'>
					<div class='table100 ver1 m-b-110'>
					<div class="top_resumenes">
						<div class="divLogo">
								<h1 class="h1Logo">VENTAS MOSTRADOR - FONTANA VIAMONTE </h1>
						</div>
						<div class="resumenes_vendedores">
                              <h2>Resumenes de vendedores</h2>
						      <div>
                               <button>
								   <a href="/resumen_brian.php" target="_blank">
									   Brian
									</a>
								</button>
							   <button>
								   <a href="/resumen_sebastian.php" target="_blank"> 
									   Sebastian
									</a>
								</button>
							  </div>
						</div>	
					</div>
						<div class="tablas">
							<table class="tabla_izq">
							    <thead >
									<tr class='row100 head'>
										<th class='ventas-totales-diarias-1'>
											<center class="numero">FECHA</center>
										</th>
										<th class='ventas-totales-diarias-2' data-column='column2'>
											<center class="producto">TOTAL TOTAL DIARIO CONTADO</center>
										</th>
									</tr>
						        </thead>
								<tbody class="tabla_alt">
								<?php
									require('conectar.php');
									?>
									<?php
									$sql = "SELECT SUM(detallemateriales) AS totalmat,SUM(detalleferreteria) AS totalfer, fechaing from productos WHERE pagotipo = 'contado' GROUP BY fechaing order by id DESC ";
									$result = mysqli_query($con, $sql);
									while ($crow = mysqli_fetch_assoc($result)) {
									?>
										<tr>
											<td>
												<center><?php echo $crow['fechaing']; ?></center>
											</td>
											<td>
												<center>Materiales $<?php echo $crow['totalmat']; ?> - Ferreteria $<?php echo $crow['totalfer']; ?></center>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								
								<thead >
									<tr class='row100 head'>
										<th class='ventas-totales-diarias-1'>
											<center class="numero">FECHA</center>
										</th>
										<th class='ventas-totales-diarias-2' data-column='column2'>
											<center class="producto">TOTAL TOTAL DIARIO DÉBITOS</center>
										</th>
									</tr>
								</thead>
								<tbody class="tabla_alt">
									<?php
									$sql = "SELECT SUM(detallemateriales) AS totaldebitomateriales, SUM(detalleferreteria) AS totaldebitoferreteria, fechaing from productos
									WHERE pagotipo = 'debito' GROUP BY fechaing order by id DESC ";
									$result = mysqli_query($con, $sql);
									while ($crow = mysqli_fetch_assoc($result)) {
									?>
										<tr class='row100'>
											<td>
												<center><?php echo $crow['fechaing']; ?></center>
											</td>
											<td>
												<center>Materiales $<?php echo $crow['totaldebitomateriales']; ?> - Ferreteria $<?php echo $crow['totaldebitoferreteria']; ?></center>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<thead>
									<tr class='row100 head'>
										<th class='ventas-totales-diarias-1'>
											<center class="numero">FECHA</center>
										</th>
										<th class='ventas-totales-diarias-2' data-column='column2'>
											<center class="producto">TOTAL TOTAL DIARIO PEDIDOS</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT SUM(detallepedido) AS totalpedidos, fechaing from productos WHERE detallepedido != 0 GROUP BY fechaing order by id DESC ";
									$result = mysqli_query($con, $sql);
									while ($crow = mysqli_fetch_assoc($result)) {
									?>
										<tr class='row100'>
											<td>
												<center><?php echo $crow['fechaing']; ?></center>
											</td>
											<td>
												<center> $<?php echo $crow['totalpedidos']; ?></center>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<table class="resumenes" data-vertable='ver1'>

								<thead >
									<tr class='row100 head'>
										<th class='ventas-totales-diarias-1'>
											<center class="numero">FECHA</center>
										</th>
										<th class='ventas-totales-diarias-2' data-column='column2'>
											<center class="producto">TOTAL DEBITOS</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">-</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">-</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">-</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT detallemateriales, detalleferreteria, producto, ferreteria, fechaing from productos WHERE pagotipo = 'debito' order by id DESC ";
									$result = mysqli_query($con, $sql);
									while ($crow = mysqli_fetch_assoc($result)) {
									?>
										<tr class='row100'>
											<td>
												<center><?php echo $crow['fechaing']; ?></center>
											</td>
											<td>
												<center>
												<div>
													<div class="debitos_prod_fer">
													<?php echo $crow['producto']?>
													$<?php echo $crow['detallemateriales'] ?>
													</div>
													<div class="debitos_detalles">
													<?php echo $crow['ferreteria']?>
													$<?php echo $crow['detalleferreteria'] ?>
													</div>
												</div>
											</center>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<thead>
									<tr class='row100 head'>
										<th class='ventas-totales-diarias-1'>
											<center class="numero">FECHA</center>
										</th>
										<th class='ventas-totales-diarias-2' data-column='column2'>
											<center class="producto">TOTAL PEDIDOS</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">Monto $</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">-</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">-</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT pedido, detallepedido, fechaing from productos WHERE detallepedido != 0  order by id DESC ";
									$result = mysqli_query($con, $sql);
									while ($crow = mysqli_fetch_assoc($result)) {
									?>
										<tr class='row100'>
											<td>
												<center><?php echo $crow['fechaing']; ?></center>
											</td>
											<td>
												<center><?php echo $crow['pedido']; ?></center>
											</td>
											<td>
												<center> $<?php echo $crow['detallepedido']; ?></center>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							
								<thead>
									<tr class='row100 head'>
										<th class='ventas-totales-diarias-1'>
											<center class="numero">FECHA</center>
										</th>
										<th class='ventas-totales-diarias-2' data-column='column2'>
											<center class="producto">TOTAL TOTAL DIARIO FIADOS y A CUENTAS DE CLIENTES</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">Cliente</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">A Cuenta</center>
										</th>
										<th class='column200 column5' data-column='column3'>
											<center class="producto">Tipo de Pago</center>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT id, producto, serie, ferreteria, detallemateriales, detalleferreteria, cliente, acuenta, fechaing, pagotipo
									FROM productos WHERE cliente != '' order by id DESC ";
									$result = mysqli_query($con, $sql);
									while ($crow = mysqli_fetch_assoc($result)) {
									?>
										<tr class='row100'>
											<td>
												<center><?php echo $crow['fechaing']; ?></center>
												<center>ID <?php echo $crow['id']; ?></center>
												<center>Vendedor <?php echo $crow['serie']; ?></center>
											</td>
											<td>
												<center>
												<div>
													<div class="cliente_prod_fer">
													<?php echo $crow['producto']?>
													$<?php echo $crow['detallemateriales'] ?>
													</div>
													<div class="cliente_detalles">
													<?php echo $crow['ferreteria']?>
													$<?php echo $crow['detalleferreteria'] ?>
													</div>
												</div>
											</center>
											</td>
											<td>
												<center><?php echo $crow['cliente']; ?></center>
											</td>
											<td>
												<center><?php echo $crow['acuenta']; ?></center>
											</td>
											<td>
												<center><?php echo $crow['pagotipo']; ?></center>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>

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