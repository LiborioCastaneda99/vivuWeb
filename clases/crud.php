<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			
			$sql="INSERT INTO cursos (codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio,
			direccion, formacion, centro, descripcion, nombre_grupo, estado) 
			VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[5]','$datos[6]','$datos[7]','$datos[8]',
			'$datos[9]','$datos[10]','$datos[4]','$datos[12]','$datos[3]','$datos[11]')";
	
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($id){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql = "SELECT id, curso, jornada, horario, intensidad, fecha_inicio, municipio, 
			direccion, formacion, centro, descripcion, nombre_grupo, estado, rol FROM cursos WHERE id = '$id'";
			$result = mysqli_query($conexion,$sql);
			$ver = mysqli_fetch_row($result);
			
			$datos = array(
				'id' => $ver[0],
				'curso' => $ver[1],
				'jornada' => $ver[2],
				'horario' => $ver[3],
				'intensidad' => $ver[4],
				'fecha_inicio' => $ver[5],
				'municipio' => $ver[6],
				'direccion' => $ver[7],
				'formacion' => $ver[8],
				'centro' => $ver[9],
				'descripcion' => $ver[10],
				'nombre_grupo' => $ver[11],
				'estado' => $ver[12]
			);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql="UPDATE cursos SET curso ='$datos[1]',jornada='$datos[2]', horario='$datos[5]',intensidad='$datos[6]',
			fecha_inicio='$datos[7]',municipio='$datos[8]',direccion='$datos[9]',formacion='$datos[10]',centro='$datos[4]',
			descripcion='$datos[12]',nombre_grupo='$datos[3]',estado='$datos[11]' WHERE id='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminar($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="DELETE FROM cursos WHERE id='$id'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>