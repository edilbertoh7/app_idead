<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php'); 
foreach ($_GET as $variable => $valor) {
	$$variable=$valor;
}
$ROL=='';
if ($id) {
	$sqlrol="SELECT r.id,r.name,r.description,p.permission_id, if(r.special='all-access',1,2) AS special
	FROM roles r
	LEFT JOIN permission_role p ON(r.id = p.role_id)
	WHERE r.id ='$id'";
	$rowRol=datos($sqlrol);
	foreach ($rowRol as $Rol) {
		$ROL[]=$Rol[permission_id];
	}
}
// echo "<br>";
// echo "stringstringstring";

// print_r($ROL)
?>
<div class="container arriba">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Roles
					<?php include_once($SIH_PATH.'partials/volver.php');  ?>
				</div>
				<!-- @include('alerts.errors')
				@include('alerts.info') -->
				<div class="card-body">                    
					<form method="POST" action="datarol.php">
						<div class="form-group">
							<label>Nombre </label>
								<input type="hidden" name="idi" id="idi" value="<?=$Rol[id]?>">
								<input class="form-control ideadtext inactiva" type="text" name="nombre" id="nombre" value="<?=$Rol['name']?>"  autofocus>

							
						</div>
						
						<div class="form-group">
							<label>Descripción </label>
							<textarea class="form-control ideadtext inactiva" rows="13" name="descripcion" id="descripcion"> <?=$Rol['description']?> </textarea>
						</div>
						<hr>
						<h3>Permiso especial</h3>
						<div class="form-group">
							<label class="ideadtext"> <input class="inactiva" type="radio" name="special1" id="special1" value="1" 
								 <?php if ( $Rol[special]==1 && $ROL[0]=='' ) {echo "checked";} ?> > Acceso total 
						</label>
							<label class="ideadtext"> <input class="inactiva" type="radio" name="special1" id="special1" value="2" 
								<?php if ( $Rol[special]==2  && $ROL[0]=='') {echo "checked";} ?> > Ningún acceso 
							</label>
						
						<hr>
						<h3>Lista de permisos</h3>
						<div class="form-group">
							<ul class="list-unstyled">
								<?php 
								$sqlperm="SELECT id, name, description FROM permissions";
								$rowperm=datos($sqlperm);
								foreach ($rowperm as $key => $permiso) {?>
								 <li>
									<label class="ideadtext">
										<input type="hidden" name="idperm" id="idperm" value="<?=$chkperm?>">
										<input type="checkbox" class="marcar inactiva" name=" chkperm[]"  id="chkperm" <?php if ( in_array($permiso[id], $ROL) ) echo "checked"?>
										value="<?=$permiso[id]; ?>">
										<?=$permiso[id].'-'. $permiso[name]; ?>	<em>(<?=$permiso[description]; ?>)</em>
									</label>
								</li>
								<?php } ?>
							</ul>
						</div>
						<?php
						$datosbot = $Rol;
						include_once($SIH_PATH.'partials/botonera.php');  ?>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>