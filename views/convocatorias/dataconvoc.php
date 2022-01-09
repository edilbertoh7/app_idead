<?php 

$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/";
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";
include_once($SIH_PATH.'config/conex.php'); 
foreach($_POST as $variable=>$valor){
	$$variable=$valor;
	// echo $variable."=".$valor."<br>";
}
if (!$eliminar) {
	$sqlconv = "SELECT id,descripcion FROM convocatorias WHERE id ='$idi'";
	$row = datos($sqlconv)->num_rows;
	if ($row>0) {
		
		$sqlgconv ="UPDATE `convocatorias` SET `descripcion`='$descripcion', `fecha_inicio`='$fecha_inicio', `fecha_finalizacion`='$fecha_finalizacion', `activa`='$Activo', `updated_at`=CURTIME()  WHERE  `id`=$idi";
		$action="Se ha actualizado la  correctamente";
		$tipomsg ="info";
	}else{
		$sqlgconv ="INSERT INTO `idead`.`convocatorias` (`descripcion`, `fecha_inicio`, `fecha_finalizacion`, `activa`, `created_at`) VALUES ('$descripcion', '$fecha_inicio', '$fecha_finalizacion', '$Activo',CURTIME())";
		$action="Una nueva convocatoria ha sido creada";
		$tipomsg ="info";
	}

}else{
	$sqlgconv = "DELETE FROM `convocatorias` WHERE  `id`='$idi'";
	$action="La convocatoria se elimino correctamente";
	$tipomsg ="info";
}
datos($sqlgconv);
$action ="convocatorias.php?mensaje=".$action."&tipomsg=".$tipomsg;
echo '<script>
 window.location.href="'.$action.'";
</script>';

?>