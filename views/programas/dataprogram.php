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

$sqlcat ="SELECT id,nombre,activo FROM programas WHERE id = $idi";
$result = datos($sqlcat);
// $row = datos($sqlcat)->num_rows
$row_cnt = $result->num_rows;
foreach ($result as  $id) {
	$id=$id[id];
}
if ($row_cnt>0) {// si hay infomacion actualiza de lo contrario cre un nuevo registro
		$progsql ="UPDATE `programas` SET `nombre`='$nombre', `activo`='$Activo', `updated_at`=CURTIME() WHERE  `id`='$idi'";
		$action= "Se han actualizado correctamente los datos del programa";
		$tipomsg ="info";
	
}else{
	$progsql="INSERT INTO `programas` (`nombre`, activo ,`created_at`) VALUES ('$nombre','$Activo', CURTIME())";
	$action="Se ha creado correctamente el programa";
	$tipomsg ="info";
}

}else{

    $progsql = "DELETE FROM programas WHERE id = '$idi'";
	$action="El programa ha sido eliminado correctamente";
	$tipomsg ="info";
}

datos($progsql);
$action ="programas.php?mensaje=".$action."&tipomsg=".$tipomsg;
echo '<script>
 window.location.href="'.$action.'";
</script>';

 ?>

