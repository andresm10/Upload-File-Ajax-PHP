
<?php 		
		session_start();
		require("../modelo/registrar.php");		
		$objRegistrar = new Registrar();
		$subido="";
		if(isset($_GET["subir"])){
			$nombre_archivo = $_FILES['userfile']['name']; 
			$tipo_archivo = $_FILES['userfile']['type']; 
			$tamano_archivo = $_FILES['userfile']['size'];
			$ruta="../archivos_subidos"."/".$nombre_archivo;
			$_SESSION["ruta_imagen"] = $ruta;
			$subido=move_uploaded_file($_FILES['userfile']['tmp_name'], $ruta);			
		}
		
		if(isset($_POST["registrar"])){
			if(!isset($_SESSION["ruta_imagen"])){
				?>
				<script>
					alert('Debe adjuntar una imagen.');
					location.href="../vista/index.php";
                </script>
                <?php
		}else{
			if(substr($_SESSION["ruta_imagen"],-1)!="/"){
				$objRegistrar->registrarUsuario($_POST["nombres"],$_POST["apellidos"],$_POST["telefono"],$_POST["ciudad"],$_SESSION["ruta_imagen"]);
				unset($_SESSION["ruta_imagen"]);
				?>
				<script>
					alert('Archivo Subido Exitosamente.');
					location.href="../vista/index.php?ver_usuario=si";
                </script>
                <?php
			}else{
					echo "<script>alert('Error al subir el archivo.');</script>";
			}
		}
		}
									
?>
	