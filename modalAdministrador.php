<?php
require("business/Administrador.php");
require("business/LogAdministrador.php");
require("business/Cliente.php");
require_once("persistence/Connection.php");
$idAdministrador = $_GET ['idAdministrador'];
$administrador = new Administrador($idAdministrador);
$administrador -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Administrador</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<td><?php echo $administrador -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $administrador -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $administrador -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Foto</th>
				<td><img class="rounded" src="<?php echo $administrador -> getFoto() ?>" height="300px" /></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><?php echo $administrador -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>Celular</th>
			<td><?php echo $administrador -> getCelular() ?></td>
		</tr>
		<tr>
			<th>Estado</th>
			<td><?php echo ($administrador -> getEstado()==1?"Habilitado":"Deshabilitado") ?> </td>
		</tr>
	</table>
</div>
