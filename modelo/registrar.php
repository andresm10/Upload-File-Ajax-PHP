<?php 
		require "../conexion/conexion.php";

		class Registrar{				
			var $conn;
			var $conexion;
			function Registrar(){		
				$this->conexion = new  Conexion();				
				$this->conn=$this->conexion->conectarse();
			}
			
			function registrarUsuario($nombre, $apellidos, $telefono, $ciudad, $imagen){
				$sql = "insert into usuarios (nombres, apellidos, telefono, ciudad, imagen) values ('".$nombre."','".$apellidos."','".$telefono."','".$ciudad."', '".$imagen."')";
				mysqli_query($this->conn, $sql);
			}			
									
			function listar(){
				$sql="select * from usuarios";
				//$rs=mysql_query($sql,$this->conn); //tipo de conexion 1
				$rs=mysqli_query($this->conn,$sql); //tipo de conexion 2				
				//while($datos=mysql_fetch_array($rs)){//tipo de conexion 1
				while($datos=mysqli_fetch_array($rs)){ //tipo de conexion 2
					$codigo=$datos["codigo"];
					$nombre=$datos["nombres"];
					$apellidos=$datos["apellidos"];
					$telefono=$datos["telefono"];
					$ciudad=$datos["ciudad"];
					$imagen=$datos["imagen"];
				}
				echo "<table border='0' align='center'>";
				echo  "<tr><td rowspan='5'>
					   <img src='".$imagen."' width='300px' height='300px' title='".$nombre."' /></td></tr>".
					  "<tr><th>Nombres</th><td>".$nombre."</td></tr>".
					  "<tr><th>Apellidos</th><td>".$apellidos."</td></tr>".
					  "<tr><th>Tel&eacute;fono</th><td>".$telefono."</td></tr>".
					  "<tr><th>Ciudad</th><td>".$ciudad."</td></tr>";
				echo "</table>";
			}
		}
?>				



