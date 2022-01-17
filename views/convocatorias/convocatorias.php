<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php'); 

?>
<div class="container arriba">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Convocatorias
					<?php if ( ($_SESSION && in_array('23', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {  ?>
					<a href="<?php echo $PATH_INI ?>views/convocatorias/createcovoc.php" class="btn btn-sm btn-primary float-right">
						Crear
					</a>
				<?php } ?>
				</div>

				<div class="card-body">
					<?php include_once($SIH_PATH.'partials/alerts.php');  ?>
					<table id="idtabla" class="table table-striped table-hover table-sm">
						<thead class="thead-dark">
							<tr class="ideadtext">
								<th>id</th>
								<th>Año</th>
								<th>Descripción</th>
								<th>Fecha de Inicio</th>
								<th>Fecha de Finalización</th>
								<th>Estado</th>
								<?php if ($bandconv ==1) {?>
									<th>Ver más</th>
								<?php } ?>
								
							</tr>
						</thead>
						<tbody>
							<?php 
							$campos ="c.id,c.descripcion,c.fecha_inicio,c.fecha_finalizacion,c.activa";
							$tabla ="convocatorias c";
							$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
							foreach ($rowdatos as $convdata) {
								$action ="createcovoc.php?id=".$convdata[id];
								?>
								<tr class="ideadtext">

									<td> <?=$convdata[id]?> </td>
									<td> <?=date('Y',strtotime($convdata[fecha_inicio]))?> </td>
									<td> <?=$convdata[descripcion]?> </td>
									<td> <?=$convdata[fecha_inicio]?> </td>
									<td> <?=$convdata[fecha_finalizacion]?> </td>
									<td > <?=$convdata[activa] == 1? 'Activa' : 'Terminada'?> 

									<?php if ($bandconv!=1) {
										if ( ($_SESSION && in_array('22', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) { ?>
											<a href="#" 
												class="btn btn-sm btn btn-secondary">
												Pre-seleccionar
											</a>
										<?php } if ( ($_SESSION && in_array('34', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) { ?>
											<a href="#" 
												class="btn btn-sm btn btn-dark">
												Evaluar
											</a>
										<?php } if ( ($_SESSION && in_array('24', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {  ?>
											<a class="btn btn-sm btn btn-primary" href='javascript: window.location.href="<?php echo $action ?>"'>
												Editar
											</a>
									<?php } if ( ($_SESSION && in_array('26', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {  ?>
											<a href="#" 
												class="btn btn-sm btn btn-info">
												Detalle
											</a>
										<?php } if ( ($_SESSION && in_array('36', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {  ?>
											<a href="#" class="nav-item dropdown">
												<a id="navbarDropdown" class="dropdown-toggle btn-sm btn  btn btn-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
													Reportes 
													<span class="caret"></span>
												</a>

												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="#"
														target="_blank">
														Perfiles Convocatoria
													</a>
													<a class="dropdown-item" href="#"
														target="_blank">
														Listado de pre-seleccionados
													</a>
													<a class="dropdown-item" href="#"
														target="_blank">
														Resultados finales
													</a>
												</div>

											</a>
											 <?php }
											  include_once($SIH_PATH.'partials/space.php');  ?>
										</td>
									<?php }else{?>
										<td width="10px">
											<a href="{{ route('detalleConvocatorias.index', $convocatoria->id) }}" 
												class="btn btn-sm btn btn-info">
												Ver detalle
											</a>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>