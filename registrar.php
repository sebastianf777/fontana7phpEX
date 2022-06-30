<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>-formulario Fontana Viamonte</title>

<!-- CSS FORM/VIEW CSS  -->

<link rel="stylesheet" type="text/css" href="total/ccs_form/view.css" media="all">
</head>

<body id="main_body" class="bodyR" >
	
<header>

	<ul class="nav">
	  <li class="liLeft"><a href="index.php">Inicio</a></li>
	  <li class="liLeft active"><a href="registrar.php">Registrar</a></li>
	  <li class="liRight"><a href="#about">About</a></li>
	  <li class="liLeft">
			  <form  target="_blank"  method="post"  action="deposito.php" style="height: 44px;">
							<input id="TABLA" name="TABLA" type="hidden" value="productos">
							<button style= "font-family: 'PT Serif', serif; margin: 0px; width: 110px; height:47px;
							 color:white; background:transparent; border-right: grey solid .1px; cursor: pointer;"
							  type="submit" onclick="javascript: form.action='deposito.php';">Depósito</button>
			  </form>
	  </li>
	  <li class="liLeft">
			  <form target="_self" method="post" action="resumen.php" style="height: 46px;">
						<input id="TABLA" name="TABLA" type="hidden" value="productos">
						<button id="btn" style="font-family: 'PT Serif', serif; margin: 0px; width: 110px; height:47px;
						 color:white ; border-right: grey solid .1px; cursor: pointer;" type="submit" 
						 onclick="javascript: form.action='resumen.php';">Resumen</button>
			  </form>
	  </li>
</ul>
</header>

 <div class="clearFloats">
</div>

</header>
	<div id="form_container">
		<form id="form_18653" class="appnitro"  method="post" action="registrar_formulas.php">
					<div class="form_description">
			<p>FONTANA MATERIALES VIAMONTE</p>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">NÚMERO: </label>
		<div>
			<input id="element_1" name="element_1" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		
		
		<li id="li_2" >
		<label class="description titulo_materiales" for="element_2">MATERIALES:</label>
		<div>
			<input id="element_2" name="element_2" class="materiales element text medium" type="text" maxlength="255" value=""/> 
		</div>
		</li>		
        <li>

		<label class="description" for="element_5">IMPORTE MATERIALES: </label>
		<div class="signo_importe">
		    <div class="signo">$</div> 
			<input id="element_5" name="element_5" class="signo_input element text " type="number" maxlength="255" value="" step=".01"/> 
		</div>
        </li>
		<li>

		<label class="description titulo_ferreteria" for="element_6">FERRETERIA: </label>
		<div >
			<input id="element_6" name="element_6" class="ferreteria element text medium" type="text" maxlength="255" value=""/> 
		</div>
		</li>

		<li>
		<label class="description" for="element_7">IMPORTE FERRETERIA: </label>
		<div class="signo_importe">
		     <div class="signo">$</div>
			 <input id="element_7" name="element_7" class="signo_input element text " type="number" maxlength="255" value="" step=".01"/> 
		</div> 
		</li>	
		<li>
		
		<li>
		<label class="description titulo_pedido" for="element_9">PEDIDO: </label>
		<div >
			<input id="element_9" name="element_9" class="pedido element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>	
		<li>
		<label class="description" for="element_10">IMPORTE PEDIDO: </label>
		<div class="signo_importe">
		     <div class="signo">$</div>
			 <input id="element_10" name="element_10" class="signo_input element text " type="number" maxlength="255" value="" step=".01"/> 
		</div> 
		</li>
		<li>
		<label class="description titulo_cliente" for="element_11">CLIENTE: </label>
		<div >
			<input id="element_11" name="element_11" class="cliente element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>	
		<li>
		<label class="description" for="element_12">A CUENTA: </label>
		<div class="signo_importe">
		     <div class="signo">$</div>
			 <input id="element_12" name="element_12" class="signo_input element text " type="number" maxlength="255" value="" step=".01"/> 
		</div> 
		<li class="radial_li" id="li_3" >
		<label class="description">TIPO DE PAGO: </label>
		<div class="radial_options">
		<label class="radial_label" for="element_8_1">Contado</label> 
		<input id="element_8_1" name="element_8" class="element text" type="radio" maxlength="255" value="Contado" checked="checked"/>
		<label class="radial_label" for="element_8_2">Débito</label>
	    <input id="element_8_2" name="element_8" class="element text" type="radio" maxlength="255" value="Debito"/> 
		<label class="radial_label" for="element_8_3">Fiado</label> 
		<input id="element_8_3" name="element_8" class="element text" type="radio" maxlength="255" value="Fiado"/> 
		</div>
		<li class="radial_li" id="li_3" >
		<label class="description" >MOSTRAR: </label>
		<div class="radial_options">
		<label class="radial_label" for="element_13_1">SI</label>
		<input id="element_13_1" name="element_13" class="element text" type="radio" maxlength="255" value="Si"/>
		<label class="radial_label" for="element_13_2">NO</label>
		<input id="element_13_2" name="element_13" class="element text" type="radio" maxlength="255" value="No" checked="checked"/>			
        </div>
		</li>	
		<li class="radial_li">	
		<label class="description" >VENDEDOR: </label>
		<div class="radial_options">
		<label class="radial_label" for="element_3_1">Brian</label>
		<input id="element_3_1" name="element_3" class="element text" type="radio" maxlength="255" value="Brian" checked="checked"/>
		<label class="radial_label" for="element_3_2">Sebastian</label>
		<input id="element_3_2" name="element_3" class="element text" type="radio" maxlength="255" value="Sebastian"/>
			</div>
		</li>	
		<li id="li_4">
		<label class="description" for="element_4">FECHA DE INGRESO : </label>
		<span>
			<input id="element_4_1" name="element_4_1" class="element text" size="2" maxlength="2" value="" type="text" required> /
			<label for="element_4_1">MM</label>
		</span>
		<span>
			<input id="element_4_2" name="element_4_2" class="element text" size="2" maxlength="2" value="" type="text" required> /
			<label for="element_4_2">DD</label>
		</span>
		<span>
	 		<input id="element_4_3" name="element_4_3" class="element text" size="4" maxlength="4" value="" type="text" required>
			<label for="element_4_3">YYYY</label>
		</span>
	
		<span id="calendar_4">
			<img id="cal_img_4" class="datepicker" src="total/js_calendar/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_4_3",
			baseField    : "element_4",
			displayArea  : "calendar_4",
			button		 : "cal_img_4",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate,
			
			});
		</script>
		</li>
			
		<li class="buttons">
			    <input type="hidden" name="form_id" value="18653" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="/total/js/registrar.js"></script>
	</body>
</html>