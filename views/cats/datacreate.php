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

$sqlcat ="SELECT c.id FROM cat c WHERE c.nombre ='$nombre' OR c.email ='$email'";
$result = datos($sqlcat);
// $row = datos($sqlcat)->num_rows
$row_cnt = $result->num_rows;
foreach ($result as  $id) {
	$id=$id[id];
}
if ($row_cnt>0) {// si hay infomacion actualiza de lo contrario cre un nuevo registro
	if (!$idi && $guardar =='Guardar') {
		$action= "Ya existe un CAT creado con datos similares revise la informacion";
		$tipomsg ="warning";
	}else{
		$catsql ="UPDATE `cat` SET `nombre`='$nombre', `direccion`='$direccion', `email`='$email', `departamento_id`='$departamento', `municipio_id`='$municipio', `activo`='$Activo' WHERE  `id`='$id'";
		$action= "Se han actualizado correctamente los datos del CAT";
		$tipomsg ="info";
	}
}else{
	$catsql="INSERT INTO `cat` (`nombre`, `direccion`, `email`, `departamento_id`, `municipio_id`, `activo`) VALUES ('$nombre', '$direccion', '$email', '$departamento', '$municipio','$Activo')";
	$action="Se ha creado correctamente el CAT";
	$tipomsg ="info";
}
}else{
    $catsql = "DELETE FROM cat WHERE id = '$idi'";
	$action="El CAT ha sido eliminado correctamente";
	$tipomsg ="info";
}

datos($catsql);
$action ="cats.php?mensaje=".$action."&tipomsg=".$tipomsg;
echo '<script>
 window.location.href="'.$action.'";
</script>';

 ?>

