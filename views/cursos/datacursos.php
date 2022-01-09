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
print_r($_POST);

if (!$eliminar) {
	if (!$idi) {
echo$sqlcat ="SELECT id,nombre FROM cursos WHERE programa_id = '$programa'";
	}else{
echo$sqlcat ="SELECT id,nombre FROM cursos WHERE programa_id = '$programa'AND id ='$idi'";
	}

echo "<br>";
$result = datos($sqlcat);
$row_cnt = $result->num_rows;
foreach ($result as  $value) {
	if (!$idi && $value[nombre] == $nombre) {
		$curso=$value[nombre];
	}
}
$band =1;
if ($row_cnt>0) {// si hay infomacion actualiza de lo contrario cre un nuevo registro
	echo "string = ".$curso; echo "<br>";
	if (!$idi && $guardar =='Guardar' && $nombre == $curso) {
		echo$action= "Ya existe un curso creado con el mismo nombre revise la informacion";
		$tipomsg ="warning";
		$band = 2;
	}elseif ($idi){
		echo
		$cursosql ="UPDATE `cursos` SET `programa_id`='$programa', `nombre`='$nombre', `activo`='$Activo',`updated_at` = CURTIME() WHERE  `id`='$idi'";
		$action= "El curso se ha actualizado correctamente";
		$tipomsg ="info";
	}
}if (!$idi && $band==1){
	echo$cursosql="INSERT INTO `cursos` (`programa_id`, `nombre`, `activo`, `created_at`) VALUES ('$programa', '$nombre', '$Activo', CURTIME());";
	$action="El curso se ha creado correctamente";
	$tipomsg ="info";
}
}else{
   echo $cursosql = "DELETE FROM `cursos` WHERE  `id`=$idi;";
	$action="El CAT ha sido eliminado correctamente";
	$tipomsg ="info";
}

datos($cursosql);
$action ="cursos.php?mensaje=".$action."&tipomsg=".$tipomsg;
echo '<script>
 window.location.href="'.$action.'";
</script>';
?>