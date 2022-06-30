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
<!-- <META HTTP-EQUIV="Refresh" CONTENT="10"> -->
	<!-- CSS TABLE/MAIN CSS -->

	<link rel="stylesheet" type="text/css" href="total/css_table/main.css">

	<title>-registros Fontana Viamonte </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
</head>

<!-- TERMINA HEAD -->
<!-- EMPIEZA BODY -->

<center>


<body>

<!-- NAV BAR -->

		<header>

			<ul class="nav">
				<li class="liLeft">
					<a href="index.php">Inicio</a
				></li>
				<li class="liLeft">
				<a href="registrar.php">Registrar</a>
			    </li>
				<li class="liLeft">
				<a href="deposito.php">Depósito</a>
				</li>
				<li class="liRight">
				<a href="#about">About</a>
		        </li>
				<li class="liLeft">
				<a href="resumen.php">Resumen</a>
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
					<div class="logoB">
						     <div class="divLogo">
								<h1 class="h1Logo">VENTAS MOSTRADOR - BRIAN </h1>
						     </div>
						     </div>
						<div id="tablas" class="tablas">
						<table class="tabla_izq">
							<?php
								require('conectar.php');
							?>				

                            <thead id="tabla">
								<tr class='row100 head'>
									<th class='ventas-totales-diarias-1'>
										<center class="numero">FECHA</center>
									</th>
									<th class='ventas-totales-diarias-2b' data-column='column2'>
										<center class="producto">TOTAL TOTAL DIARIO DINERO</center>
										<center class="producto">(descontando débitos y fiados)</center>
									</th>
								</tr>
							</thead>
							<tbody>

								<?php
				
								$sql = "SELECT SUM(acuenta) AS totalacuenta, SUM(detalleferreteria) AS totalfer, SUM(detallemateriales) AS totalmat, SUM(detallepedido) AS totalpedidos, fechaing 
								FROM productos WHERE serie = 'brian' and pagotipo = 'contado' GROUP BY fechaing order by id DESC ";
								$result = mysqli_query($con, $sql);
								while ($crow = mysqli_fetch_assoc($result)) {
								?>
									<tr id='filas_resumenes' class='row100 '>
										<td>
											<center><?php echo $crow['fechaing']; ?></center>
										</td>
										<td>
										<center>
										    <div class="materiales_precios">
												<div class="materiales_0">
													<div class="material_tipo_1">Materiales:</div>
													<div class="material_tipo_2">Ferreteria:</div>
													<div class="material_tipo_3">Pedidos:</div>
													<div class="material_tipo_4">A cuenta:</div>
													<div class="material_tipo_4">Total:</div>
												</div>
												<div class="precios_0">
													<div class="precio_tipo_1">$ <?php echo $crow['totalmat']; ?></div>
													<div class="precio_tipo_2">$ <?php echo $crow['totalfer']; ?></div>
													<div class="precio_tipo_3">$ <?php echo $crow['totalpedidos']; ?></div>
													<div class="precio_tipo_4">$ <?php echo $crow['totalacuenta']; ?></div>
													<div class="precio_tipo_4">$ <?php echo $crow['totalacuenta'] + $crow['totalmat'] + $crow['totalfer'] + $crow['totalpedidos']?></div>
												</div>
											</div>
								        </center>
										</td>
									</tr>
								<?php
								}
								?>

							</tbody>
							
							<thead id="tabla">
								<tr class='row100 head'>
									<th class='ventas-totales-diarias-1'>
										<center class="numero">FECHA</center>
									</th>
									<th class='ventas-totales-diarias-2' data-column='column2'>
										<center class="producto">TOTAL DIARIO PEDIDOS</center>
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT SUM(detallepedido) AS totalpedidos, fechaing from productos WHERE detallepedido != '' AND serie = 'brian' GROUP BY fechaing order by id DESC ";
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
							
							
							<thead id="tabla">
								<tr class='row100 head'>
									<th class='ventas-totales-diarias-1'>
										<center class="numero">FECHA</center>
									</th>
									<th class='ventas-totales-diarias-2' data-column='column2'>
										<center class="producto">TOTAL PEDIDOS</center>
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT pedido, detallepedido,producto, detallemateriales, ferreteria, detalleferreteria, fechaing from productos WHERE detallepedido != '' AND serie = 'brian' order by id DESC ";
								$result = mysqli_query($con, $sql);
								while ($crow = mysqli_fetch_assoc($result)) {
								?>
									<tr class='row100'>
										<td>
											<center><?php echo $crow['fechaing']; ?></center>
										</td>
										<td>
										<center>
										    <div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_1">Materiales:</div>
												</div>
												<div class="detalles">
												 <?php echo $crow['producto']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detallemateriales']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_2">Ferreteria:</div>
												</div>
												<div class="detalles">
												<?php echo $crow['ferreteria']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detalleferreteria']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_3">Pedidos:</div>
												</div>
												<div class="detalles">
												<?php echo $crow['pedido']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detallepedido']; ?>
												</div>
											</div>
								        </center>
						
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
							<thead id="tabla">
								<tr class='row100 head'>
									<th class='ventas-totales-diarias-1'>
										<center class="numero">FECHA</center>
									</th>
									<th class='ventas-totales-diarias-2' data-column='column2'>
										<center class="producto">TOTAL DEBITOS</center>
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT detallemateriales, detalleferreteria, producto, ferreteria, pedido, detallepedido, fechaing 
								FROM productos WHERE pagotipo = 'debito' AND serie = 'brian' order by id DESC ";
								$result = mysqli_query($con, $sql);
								while ($crow = mysqli_fetch_assoc($result)) {
								?>
									<tr class='row100'>
										<td>
											<center><?php echo $crow['fechaing']; ?></center>
										</td>
										<td>
										<center>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_1">Materiales:</div>
												</div>
												<div class="detalles">
												 <?php echo $crow['producto']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detallemateriales']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_2">Ferreteria:</div>
												</div>
												<div class="detalles">
												<?php echo $crow['ferreteria']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detalleferreteria']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_3">Pedidos:</div>
												</div>
												<div class="detalles">
												<?php echo $crow['pedido']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detallepedido']; ?>
											    </div>
											</div>
											
								        </center>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
							<thead id="tabla">
								<tr class='row100 head'>
									<th class='ventas-totales-diarias-1'>
										<center class="numero">FECHA</center>
									</th>
									<th class='ventas-totales-diarias-2' data-column='column2'>
										<center class="producto">TOTAL CLIENTES</center>
									</th>
	
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT detallemateriales, producto, ferreteria, detalleferreteria, id, pagotipo, acuenta, cliente, fechaing, pagotipo
								 FROM productos WHERE serie = 'brian'and (cliente != '' OR pagotipo = 'fiado') order by id DESC ";
								$result = mysqli_query($con, $sql);
								while ($crow = mysqli_fetch_assoc($result)) {
								?>
									<tr class='row100'>
										<td>
											<center><?php echo $crow['fechaing']; ?></center>
											<center>ID <?php echo $crow['id']; ?></center>
											<?php echo $crow['pagotipo']; ?>
										</td>
										<td>
										<center>					    
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_1">Materiales:</div>
												</div>
												<div class="detalles">
												 <?php echo $crow['producto']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detallemateriales']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_2">Ferreteria:</div>
												</div>
												<div class="detalles">
												<?php echo $crow['ferreteria']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detalleferreteria']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_3">A cuenta:</div>
												</div>
												<div class="detalles">
												</div>
												<div class="precios">
												$ <?php echo $crow['acuenta']; ?>
											    </div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_4">Cliente:</div>
												</div>
												<div class="detalles">
											    <?php echo $crow['cliente']; ?>
												</div>
												<div class="precios">
											    </div>
											</div>
								        </center>
					
									</tr>
								<?php
								}
								?>
							</tbody>
		
</table>
						<table class="resumenes" data-vertable='ver1'>
						     

							
							<thead id="tabla">
								<tr class='row100 head'>
									<th class='ventas-totales-diarias-1'>
										<center class="numero">FECHA</center>
									</th>
									<th class='ventas-totales-diarias-2b' data-column='column2'>
										<center class="producto">TOTAL MATERIALES, FERRETERIA, Y PEDIDOS - BRIAN</center>
									</th>
									<th class='column200 column5' data-column='column3'>
										<center class="producto">$</center>
									</th>
									<th class='column200 column5' data-column='column3'>
										<center class="producto">ID</center>
									</th>
									<th class='column200 column5' data-column='column3'>
										<center class="producto">Nº</center>
									</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$sql= "SELECT fechaing, ferreteria, detalleferreteria, pedido, detallepedido, producto, detallemateriales, pagotipo, id, numero 
								from productos WHERE serie = 'brian' order by id DESC ";
								$result = mysqli_query($con, $sql);
								while ($crow = mysqli_fetch_assoc($result)) {
								?>
									<tr class='row100'>
									
								
									    <td>
											<center class="fecha_resumenes"><input type="checkbox"><?php echo $crow['fechaing']; ?></center>
										</td>
						
						
										<td>
										
										<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_1">Materiales:</div>
												</div>
												<div class="detalles">
												 <?php echo $crow['producto']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detallemateriales']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_2">Ferreteria:</div>
												</div>
												<div class="detalles">
												<?php echo $crow['ferreteria']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detalleferreteria']; ?>
												</div>
											</div>
											<div class="materiales_precios">
												<div class="materiales">
												<div class="material_tipo_3">Pedidos:</div>
												</div>
												<div class="detalles">
												<?php echo $crow['pedido']; ?>
												</div>
												<div class="precios">
												$ <?php echo $crow['detallepedido']; ?>
											    </div>
											</div>
											
										</td>
										<td>
										<center><?php echo $crow['pagotipo']; ?></center>

                                        </td>
										<td>
											<center><?php echo $crow['id']; ?></center>
										</td>
										<td>
											<center><?php echo $crow['numero']; ?></center>
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
		<script src="total/js/resumenes.js"></script>
	</body>
</center>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?desconectar=si">Desconectar</a>

</html>