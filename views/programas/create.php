<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php');
if ($_GET[id] !='') {

$campos ="id,nombre,activo";
$tabla ="programas ";
$where = "WHERE id='$_GET[id]'";
$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
foreach ($rowdatos as $datosprog) {
} 
}
?>
<div class="container arriba ">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					Programas
					<?php include_once($SIH_PATH.'partials/volver.php');  ?>
				</div>
				<form method="POST" action="dataprogram.php">
					<div class="card-body">
						<div class="form-group container arriba">
							<div class="row container arriba">
								<div class="col-md-12">
									<label>Nombre</label>
									<input type="hidden" name="idi" id="idi" value="<?=$datosprog[id]?>">
									<input class="form-control ideadtext inactiva" type="text" name="nombre" id="nombre" value="<?=$datosprog[nombre]?>"   autofocus>
								</div>
							</div>
						</div>

						<div class="form-group container arriba">
							<div class="row container arriba">
								<div class="col-md-1.5">
									<label>Activo</label>
									<select class="form-control ideadtext inactiva" type="text" name="Activo" id="Activo">
										<option value="1" <?php if($datosprog[activo]=='1') echo 'selected';?>>si</option>
										<option value="2" <?php if($datosprog[activo]=='2') echo 'selected';?>>No</option>
									</select>
								</div>
							</div>

						</div>

						<?php
						$datosbot = $datosprog;
						include_once($SIH_PATH.'partials/botonera.php');  ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>