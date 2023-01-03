<?php
$processed=false;
$idCliente = $_GET['idCliente'];
$updateCliente = new Cliente($idCliente);
$updateCliente -> select();
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$cuenta="";
if(isset($_POST['cuenta'])){
	$cuenta=$_POST['cuenta'];
}
$saldo="";
if(isset($_POST['saldo'])){
	$saldo=$_POST['saldo'];
}
if(isset($_POST['update'])){
	$updateCliente = new Cliente($idCliente, $nombre, $cuenta, $saldo);
	$updateCliente -> update();
	$updateCliente -> select();
	$user_ip = getenv('REMOTE_ADDR');
	$agent = $_SERVER["HTTP_USER_AGENT"];
	$browser = "-";
	if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
		$browser = "Internet Explorer";
	} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Chrome";
	} else if (preg_match('/Edge\/\d+/', $agent) ) {
		$browser = "Edge";
	} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Firefox";
	} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Opera";
	} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Safari";
	}
	if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Editar Cliente", "Nombre: " . $nombre . "; Cuenta: " . $cuenta . "; Saldo: " . $saldo, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	$processed=true;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Editar Cliente</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/cliente/updateCliente.php") . "&idCliente=" . $idCliente ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateCliente -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Cuenta*</label>
							<input type="text" class="form-control" name="cuenta" value="<?php echo $updateCliente -> getCuenta() ?>" required />
						</div>
						<div class="form-group">
							<label>Saldo*</label>
							<input type="text" class="form-control" name="saldo" value="<?php echo $updateCliente -> getSaldo() ?>" required />
						</div>
						<button type="submit" class="btn btn-info" name="update">Editar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
