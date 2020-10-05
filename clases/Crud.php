<?php 
 	class crud {
		public function agregar($datos) {
			$obj= new conectar();
			$conexion=$obj->conexion();	
			
			$sql="INSERT INTO videojuegos (nombre, tipo, fecha_lanzamiento, descripcion)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]')";
			return mysqli_query($conexion, $sql);
		}
		public function obtenDatos($idjuego){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_videojuego,
							nombre,
							tipo,
							fecha_lanzamiento,
							descripcion
					from videojuegos 
					where id_videojuego='$idjuego'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_videojuego' => $ver[0],
				'nombre' => $ver[1],
				'tipo' => $ver[2],
				'fecha_lanzamiento' => $ver[3],
				'descripción' => $ver[4]
				);
			return $datos;
		}
		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE videojuegos set nombre='$datos[0]',
										tipo='$datos[1]',
										fecha_lanzamiento='$datos[2]',
										descripcion='$datos[3]'
						where id_videojuego='$datos[4]'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminar($idjuego){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from videojuegos where id_videojuego='$idjuego'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>