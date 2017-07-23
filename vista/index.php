<?php  
	require "../modelo/registrar.php";
	$objRegistrar = new Registrar();
?>
<head>
<title>Subir archivos al servidor por medio de AJAX, PHP, JQuery.</title>
<!--  ----------------------------------------------INPUT FILE------------------------------------------------------------ -->
<script language="javascript" src="../jquery/jquery-1.7.1.min.js"></script>
<script language="javascript" src="../ajax/AjaxUpload.2.0.min.js"></script>
<link href="../css/estilos.css">
<script language="javascript">
$(document).ready(function(){
	var button = $('#upload_button'), interval;
	var resultados = document.getElementById("resultados");
	var lista = document.getElementById("lista");
	new AjaxUpload('#upload_button', {
        action: '../controlador/controlador.php?subir=si',
		onSubmit : function(file , ext){
		//mas extensions rar|doc|zip|ppt|docx|pptx|txt|html|mp3|wma|xls|xlsx|pdf
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extensiones permitidas
			alert('Error, Solo se permiten archivos con extension:\n jpg, png, jpeg, gif.');			
			return false;
		} else {			
		    //aquí el código que se debe ejecutar al hacer clic
			$("#resultados").css("display", "block");			
			resultados.innerHTML = '<img src="../img/ajax-loader.gif" />';
			this.disable();
		}
		},
		onComplete: function(file, response){	
			resultados.innerHTML = '';
			resultados.innerHTML = file;
			this.enable();
		}	
	});
});
</script>
<!--  ---------------------------------------------------------------------------------------------------------- -->
<link href="../css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
	<form method="post" action="../controlador/controlador.php" >   
    <center>
    <font class="title"><b><i>Subir archivos al servidor por medio de AJAX, PHP y JQuery</i></b></font>	    
    <br />
    <font class="subtitulo"><a href="http://codigoweblibre.tk">http://codigoweblibre.tk</a></font>
    <br /><br />
    <table border="0">
    	<tr><td><label>Nombres:</label> </td><td> <input autofocus="autofocus" type="text" name="nombres" id="nombres" required="required" /></td></tr>
        <tr><td><label>Apellidos:</label> </td><td> <input type="text" name="apellidos" id="apellidos" required="required" /></td></tr>
        <tr><td><label>Tel&eacute;fono:</label> </td><td> <input type="text" name="telefono" id="telefono" required="required" /></td></tr>
        <tr><td><label>Ciudad:</label> </td><td> <input type="text" name="ciudad" id="ciudad" required="required" /></td></tr>
        <tr>
        	<td><input type="button"  id="upload_button" value="Adjuntar Imagen" /></td>
            <td><input type="submit" name="registrar" id="registrar" value="Registrar" /></td>
       	</tr>
        <tr><td colspan="2">Tama&ntilde;o max. 2MB.</td></tr>
    </table>
    <div id="resultados"></div>
    <?php
    	if(isset($_GET["ver_usuario"])){
			$objRegistrar->listar();	
		}
	?>
    </center>
    </form>              
</body>
</html>