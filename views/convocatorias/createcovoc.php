<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php'); 
if ($_GET['id']!='') {
	$campos ="c.id,c.descripcion,c.fecha_inicio,c.fecha_finalizacion,c.activa";
	$tabla ="convocatorias c";
	$where = "WHERE c.id='$_GET[id]'";
	$rowconv= datos(consultasql($campos,$tabla,$join,'consulta',$where));
	foreach ($rowconv as $datoconv) {
	}
}
?>

<div class="container arriba">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header ideadtext">
					Convocatorias
					<?php include_once($SIH_PATH.'partials/volver.php');  ?>
				</div>

				<div class="card-body">
					<form method="POST" action="dataconvoc.php">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>Descripción</label>
									<input type="hidden" name="idi" id="idi" value="<?=$datoconv[id]?>">
									<textarea class="form-control ideadtext inactiva" rows="13" name="descripcion" id="descripcion"> <?=$datoconv['descripcion']?> </textarea>

								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Fecha de inicio</label>
									<input class="form-control inactiva" type="date" name="fecha_inicio" id="fecha_inicio" value="<?=$datoconv['fecha_inicio']?>">
									
								</div>

								<div class="col-md-6">
									<label>Fecha de finalización</label>
									<input class="form-control inactiva" type="date" name="fecha_finalizacion" id="fecha_finalizacion" value="<?=$datoconv['fecha_finalizacion']?>">
									
								</div>
							</div>
							<div class="row container arriba">
								<div class="col-md-1.5">
									<label>Activo</label>
									<select class="form-control inactiva" type="text" name="Activo" id="Activo">
										<option value="1" <?php if($datoconv[activa]=='1') echo 'selected';?>>si</option>
										<option value="2" <?php if($datoconv[activa]=='2') echo 'selected';?>>No</option>
									</select>
									
								</div>
							</div>
						</div>
						
						<?php
						$datosbot = $datoconv;
						include_once($SIH_PATH.'partials/botonera.php');  ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>