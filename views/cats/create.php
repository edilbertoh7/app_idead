<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php'); 
if ($_GET[id]!='') {
	
	$campos ="c.id,c.nombre,c.direccion,c.email,c.departamento_id,d.nombre AS depa,c.municipio_id,m.nombre AS muni,c.activo";
	$tabla ="cat c";
	$join = "INNER JOIN departamentos d ON(c.departamento_id = d.id), INNER JOIN municipios m ON(c.municipio_id = m.id)";
	$where = "WHERE c.id='$_GET[id]'";
	$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
	foreach ($rowdatos as $datoscat) {
	} 
}
?>
<div class="container arriba ideadtext" >
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					CAT
					<?php include_once($SIH_PATH.'partials/volver.php');  ?>
				</div>
				<form  method="POST" action=" <?php echo $PATH_INI.'views/cats/datacreate.php'?>">
					<div class="form-group container arriba">
						<div class="row">
							<div class="col-md-12">
								<label>Nombre CAT</label>
								<input type="hidden" name="idi" id="idi" value="<?=$datoscat[id]?>">
								<input class="form-control ideadtext inactiva" type="text" name="nombre" id="nombre" value="<?=$datoscat[nombre]?>" onfocus="getMunicipios(departamento.value)" autofocus>
							</div>
						</div>
					</div>

				<div class="form-group container arriba">
					<div class="row">
						<div class="col-md-12">
							<label>Direccion</label>
							<input class="form-control ideadtext inactiva" type="text" name="direccion" id="direccion" value="<?=$datoscat[direccion]?>">
						</div>
					</div>
				</div>

				<div class="form-group container arriba">
					<div class="row">
						<div class="col-md-12">
							<label>Correo electronico</label>
							<input class="form-control ideadtext inactiva" type="text" name="email" id="email" value="<?=$datoscat[email]?>">
						</div>
					</div>
				</div>

				<div class="form-group container arriba">
					<div class="row">
						<div class="col-md-6">
							<label>Departamento</label>
							<select class="form-control ideadtext inactiva" type="text" name="departamento" id="departamento" onchange="getMunicipios(this.value)">	
								<?php
								$campos ="d.id,d.nombre";
								$tabla ="departamentos d";
								$rowdepa = datos(consultasql($campos,$tabla,'','consulta',''));
								foreach ($rowdepa as $key => $value) {
									echo '<option value="'.$value[id].'"';
									if ($value[id]==$datoscat[departamento_id]) {
										echo "selected";
									}
									echo"> ".$value[nombre]."</option>";
								}

									?>
							</select>
						</div>

						<div class="col-md-6">
							<label>Municipio</label>
							<select class="form-control ideadtext inactiva" type="text" name="municipio" id="municipio">
							</select>
						</div>
					</div>
				</div>

				<div class="form-group container arriba">
					<div class="row container arriba">
						<div class="col-md-1.5">
							<label>Activo</label>
							<select class="form-control inactiva" type="text" name="Activo" id="Activo">
								<option value="1" <?php if($datoscat[activo]=='1') echo 'selected';?>>si</option>
								<option value="2" <?php if($datoscat[activo]=='2') echo 'selected';?>>No</option>
							</select>
						</div>
					</div>

				</div>
				<?php
				$datosbot = $datoscat;
				 include_once($SIH_PATH.'partials/botonera.php');  ?>
				</form>
			</div>
		</div>
	</div>
</div>