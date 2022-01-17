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
// echo"arreglo =".$chkperm[1];
// echo "<br>";
// echo"especial =".$special1[1];


$especial = $special1 == 1? $especial = 'all-access' : $especial = 'no-access';

if (!$eliminar) {

	$sqlrol="SELECT name FROM roles WHERE name ='$nombre'";
	$row = datos($sqlrol)->num_rows;
	if ($row>0 && !$idi) {
			$action= "Ya existe un Rol con ese nombre";
			$tipomsg ="warning";

	}else{
		if ($idi) {
		
		$sqlroles="UPDATE `roles` SET `name`='$nombre', `slug`='$nombre', `description`='$descripcion', `updated_at`=CURDATE(), `special` = '$especial' WHERE  `id`='$idi'";
		datos($sqlroles);
		$sqlidper="DELETE FROM `permission_role` WHERE  `role_id`='$idi'";
		datos($sqlidper);
		foreach ($chkperm as $key => $id_permi) {
		
			$permRol="INSERT INTO `permission_role` (`permission_id`, `role_id`, `created_at`) VALUES ('$id_permi', '$idi', CURTIME());";
			datos($permRol);
		}
		$action= "Se ha actualizado correctamente el rol";
			$tipomsg ="info";

		}else{
	// insertaecho

			$sqlroles="INSERT INTO `roles` (`name`, `slug`, `description`, `created_at`,  `special`) VALUES ('$nombre', '$nombre', '$descripcion', CURTIME(), '$especial')";
			datos($sqlroles);
			$maxrol="SELECT MAX(id) FROM roles";
			$id = datos($maxrol,1)[0];

			foreach ($chkperm as $key => $id_permi) {

				$permRol="INSERT INTO `permission_role` (`permission_id`, `role_id`, `created_at`) VALUES ('$id_permi', '$id', CURTIME());";
				datos($permRol);
			}

			$action= "Se ha creado un nuevo rol";
			$tipomsg ="info";
	
		}
	}

}else{
	
$sqlidper="DELETE FROM `roles` WHERE  `id`='$idi'";
datos($sqlidper);
$action= "El rol se elimino satisfactoriamente";
			$tipomsg ="info";
}

$action ="roles.php?mensaje=".$action."&tipomsg=".$tipomsg;
echo '<script>
 window.location.href="'.$action.'";
</script>';
?>