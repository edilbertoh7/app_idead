<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php'); 
// echo "<pre>";

foreach($_GET as $variable=>$valor){
    $$variable=$valor;
    // echo $variable."=".$valor."<br>";
}


if ($id) {
	$sqlusuario="SELECT u.id,d.tipo_documento_id,d.numero_documento,u.email,d.primer_nombre,d.segundo_nombre,
	d.primer_apellido,d.segundo_apellido,r.role_id 
	FROM users u 
	INNER JOIN users_detail d ON(u.id = d.user_id) 
	INNER JOIN role_user r ON(d.user_id=r.user_id )
	WHERE u.id='$id'";
	
	$rowdatos = datos($sqlusuario);
	foreach ($rowdatos as $datauser) {
 	// echo $datauser[numero_documento];
 	// echo "<br>";
		$tipodoc=$datauser[tipo_documento_id];
		$numeDoc =$datauser[numero_documento];
		$primNombre=$datauser[primer_nombre];
		$seguNombre=$datauser[segundo_nombre];
		$primeApell=$datauser[primer_apellido];
		$seguApell=$datauser[segundo_apellido];
		$email=$datauser[email];
		$chkrol=$datauser[role_id];
		$ROL[]=$datauser[role_id];

	}
}

?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Usuarios
					<?php include_once($SIH_PATH.'partials/volver.php');  ?>
				</div>
				<?php include_once($SIH_PATH.'partials/alerts.php');  ?>
				<div class="card-body">                    
					<form method="POST" action="datausua.php">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<input type="hidden" name="idi" id="idi" value="<?=$datauser[id]?>">
									<label class="ideadtext">Tipo de Documento</label>
									<select class="form-control inactiva ideadtext " name="tipodoc" id="tipodoc">
										<?php 
										$sqldoc = "SELECT id,descripcion FROM tipos_documento";
										$rowcod = datos($sqldoc);

										foreach ($rowcod as  $value) {
											echo '<option value="'.$value[id].'"';
											if ($value[id]==$tipodoc) {
												echo "selected";
											}
											echo"> ".$value[descripcion]."</option>";
										}
										?>
										
									</select>
								</div>

								<div class="col-md-6">
									<label class="ideadtext">Numero de Documento</label>
									<input class="form-control inactiva ideadtext borrardo" type="text" name="numeDoc" id="numeDoc" value="<?=$numeDoc?>">
									
									<?php if ($Err1 && $Err1!=''): ?>
										<span class="text-danger ideadtext" role="alert">
											<strong> <?=$Err1 ?> </strong>
										</span>
									<?php endif ?>

								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label class="ideadtext">Primer Nombre</label>
									<input class="form-control inactiva ideadtext borrardo" type="text" name="primNombre" id="primNombre" value="<?=$primNombre?>">
									<?php if ($Err2 && $Err2!=''): ?>
										<span class="text-danger ideadtext" role="alert">
											<strong> <?=$Err2 ?> </strong>
										</span>
									<?php endif ?>
								</div>

								<div class="col-md-6">
									<label class="ideadtext">segundo Nombre</label>
									<input class="form-control inactiva ideadtext borrardo" type="text" name="seguNombre" id="seguNombre" value="<?=$seguNombre?>">
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<label class="ideadtext">Primer Apellido</label>
									<input class="form-control inactiva ideadtext borrardo" type="text" name="primeApell" id="primeApell" value="<?=$primeApell?>">
									<?php if ($Err3 && $Err3!=''): ?>
										<span class="text-danger ideadtext" role="alert">
											<strong> <?=$Err3 ?> </strong>
										</span>
									<?php endif ?>
								</div>

								<div class="col-md-6">
									<label class="ideadtext">Segundo Apellido</label>
									<input class="form-control inactiva ideadtext borrardo" type="text" name="seguApell" id="seguApell" value="<?=$seguApell?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label class="ideadtext">Contraseña</label>
									<input class="form-control inactiva ideadtext borrardo" type="password" name="passwd" id="passwd" value="<?=$passwd?>">		
									<?php if ($Err4 && $Err4!=''): ?>
										<span class="text-danger ideadtext" role="alert">
											<strong> <?=$Err4 ?> </strong>
										</span>
									<?php endif ?>							
								</div>

								<div class="col-md-6">
									<label class="ideadtext">Confirmar contraseña</label>
									<input class="form-control inactiva ideadtext borrardo" type="password" name="C_passwd" id="C_passwd" value="<?=$C_passwd?>">
									<?php $errc = $Err7? $errc = $Err7 : $errc = $Err5 ;
									 if ($errc && $errc!='' ): ?>
										<span class="text-danger ideadtext" role="alert">
											<strong> <?=$errc  ?> </strong>
										</span>
									<?php endif ?>		
									
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label class="ideadtext">Correo Electronico</label>
									<input class="form-control inactiva ideadtext borrardo" type="text" name="email" id="email" value="<?=$email?>">
									<?php if ($Err6 && $Err6!=''): ?>
										<span class="text-danger ideadtext" role="alert">
											<strong> <?=$Err6 ?> </strong>
										</span>
									<?php endif ?>	
								</div>
								<div class="col-md-6">
								
								</div>
							</div>
						</div>
					
						<hr>
						<h3>Lista de roles</h3>
						<div class="form-group">
							<ul class="list-unstyled">
								<?php
								// si no hay una sesion iniciada solo mostrara el rol de aspirante
								!$_SESSION ? $where = 'where id = 2' : $where='';
								$sqlroles="select id,name, description from roles $where";
								$aspi=2;
								if (!$chkrol) {
									$chkrol=$aspi;
								}
								$rowdatos = datos($sqlroles);
								foreach ($rowdatos as $rol) {?>
								
								<li>
									<label class="ideadtext">
										<input type="hidden" name="idrol" id="idrol" value="<?=$chkrol?>">
										<input class="inactiva checkbox borrardo" type="checkbox" name="chkrol[]" <?php if ( in_array($rol[id], $ROL) ) echo "checked"?>
										value="<?=$rol[id]; ?>">
										<?= $rol[name]; ?>	<em>(<?=$rol[description]; ?>)</em>
									</label>
								</li>
								<?php } ?>
							</ul>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									
								</div>
							</div>
						</div>
						<?php
						$datosbot = $datauser;
						include_once($SIH_PATH.'partials/botonera.php');  ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>