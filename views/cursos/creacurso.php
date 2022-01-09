<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php'); 
if ($_GET !='') {	
	$campos ="c.id,c.programa_id,p.nombre AS nomnprog, c.nombre AS nombcurso,c.activo";
	$tabla ="cursos c";
	$join = "INNER JOIN programas p ON(c.programa_id = p.id)";
	$where = "WHERE c.id='$_GET[id]'";
	$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
	foreach ($rowdatos as $datoscurso) {
	} 
}
?>
<div class="container arriba " >
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					Cursos
					<?php include_once($SIH_PATH.'partials/volver.php');  ?>
				</div>
				<form method="POST" action="datacursos.php">
					<div class="form-group container arriba">
						<div class="row">
							<div class="col-md-12">
								<input type="hidden" name="idi" id="idi" value="<?=$datoscurso[id]?>">
								<label>Programa</label>
								<select class="form-control ideadtext inactiva1" type="text" name="programa" id="programa">
									<?php
									$campos ="id,nombre";
									$tabla ="programas";
									$rowdepa = datos(consultasql($campos,$tabla,'','consulta',''));
									foreach ($rowdepa as $program) {
										echo '<option value="'.$program[id].'"';
										if ($program[id]==$datoscurso[programa_id]) {
											echo "selected";
										}

										echo"> ".$program[nombre]."</option>";
									}

									?>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group container arriba">
						<div class="row">
							<div class="col-md-12">
								<label>Nombre del curso</label>
								<input class="form-control ideadtext inactiva" type="text" name="nombre" id="nombre" value="<?=$datoscurso[nombcurso]?>">
							</div>
						</div>
					</div>

					<div class="form-group container arriba">
						<div class="row container arriba">
							<div class="col-md-1.5">
								<label>Activo</label>
								<select class="form-control inactiva" type="text" name="Activo" id="Activo">
									<option value="1" <?php if($datoscurso[activo]=='1') echo 'selected';?>>si</option>
									<option value="2" <?php if($datoscurso[activo]=='2') echo 'selected';?>>No</option>
								</select>
							</div>
						</div>
					</div>

					<?php
					$datosbot = $datoscurso;
					include_once($SIH_PATH.'partials/botonera.php');  ?>

				</form>
			</div>
		</div>
	</div>
</div>