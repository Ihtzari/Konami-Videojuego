<?php
	require_once "../clases/conexion.php";
	$con = new conectar();
	$conexion = $con->conexion();
	$sql = "SELECT id_videojuego, nombre, tipo, fecha_lanzamiento, descripcion FROM videojuegos";
	$result = mysqli_query($conexion, $sql);  
?>


<button class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">
 	<span class="fab fa-playstation"></span> Agregar nuevo videojuego
</button>

<hr> 
<table class="table table-hover" id="tablaDatos" width="100%" border="4" bordercolor="8DFFEE" cellspacing="10" cellpadding="10">>
	<thead>
		<tr>
			
			<td align="center"><h4><p style="color:#F3FF00;">Id videojuego</td></p></h4>
			<td align="center"><h4><p style="color:#F3FF00;">Nombre</td></p></h4>
			<td align="center"><h4><p style="color:#F3FF00;">Tipo</td></p></h4>
			<td align="center"><h4><p style="color:#F3FF00;">Fecha de Lanzamiento</td></p></h4>
			<td align="center"><h4><p style="color:#F3FF00;">Descripción</td></p></h4>
			<td align="center"><h4><p style="color:#F3FF00;">Editar</td></p></h4>
			<td align="center"><h4><p style="color:#F3FF00;">Eliminar</td></p></h4>
				
		</tr>
	</thead>
	<tbody background-color:white;> 
		<?php 
		while ($ver=mysqli_fetch_row($result)) {
			?>
			<tr>

				</style>
				<td align="center"><h4><p style="color:#F3FF00;"><?php echo $ver[0] ?></td></p></h4>
				<td align="center"><h5><p style="color:#F3FF00;"><?php echo $ver[1] ?></td></p></h5>
				<td align="center"><h5><p style="color:#F3FF00;"><?php echo $ver[2] ?></td></p></h5>
				<td align="center"><h5><p style="color:#F3FF00;"><?php echo $ver[3] ?></td></p></h5>
				<td align="center"><h5><p style="color:#F3FF00;"><?php echo $ver[4] ?></td></p></h5>
				<td style="text-align: center">
					<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $ver[0] ?>')">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td style="text-align: center">
					<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $ver[0] ?>')">
						<span class="fa fa-trash"></span>
					</span>
				</td>
			</tr>
			<?php 
		}
		?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatos').DataTable();

	});

</script>