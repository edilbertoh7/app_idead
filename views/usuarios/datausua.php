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
$password = md5($passwd);
$Err1 = !$numeDoc ? $mensaje = '*El campo Numero de documento es obligatorio,':'';
$Err2 = !$primNombre ? $mensaje = '*El campo Primer nombre es obligatorio,':'';
$Err3 = !$primeApell ? $mensaje = '*El campo Primer apellido es obligatorio,':'';
$Err4 = !$passwd ? $mensaje = '*El campo Contraseña es obligatorio,':'';
$Err5 = !$C_passwd ? $mensaje = '*El campo Confirmacion de contraseña es obligatorio,':'';
$Err6 = !$email ? $mensaje = '*El campo Correo electronico es obligatorio,':'';


if (!$eliminar) {
$sqluser="SELECT numero_documento FROM users_detail WHERE numero_documento ='$numeDoc'";
$row = datos($sqluser)->num_rows;
$ERR=0;

if ($Err1 || $Err2 || $Err3 || $Err4 || $Err5 || $Err6 ) {
// 	echo "errores";
	
	
// 	$action1= $Err;
$ERR =1;
}
if ($passwd != $C_passwd) {

	$Err7 = $passwd != $C_passwd ? $mensaje = '*las contraseñas no coinciden,':'';
}
elseif (($row>0 && !$idi) && $ERR !=1) {
	$action="Existe ya un usuario creado con el numero de documento ".$numeDoc;
	$tipomsg ="danger";
}elseif (($row>0 && $idi) && $ERR !=1) {
	echo$sqluser="UPDATE `users` SET `email`='$email', `password`='$password' WHERE  `id`=$idi";
	datos($sqluser);

	 $sqluserdt="UPDATE `users_detail` SET `tipo_documento_id`='$tipodoc', `numero_documento`='$numeDoc', `primer_nombre`='$primNombre', `segundo_nombre`='$seguNombre', `primer_apellido`='$primeApell', `segundo_apellido`='$seguApell', `updated_at`= CURTIME() WHERE  `user_id`='$idi'";
	datos($sqluserdt);

	echo$sqldelrol="DELETE FROM `idead`.`role_user` WHERE  `user_id`='$idi' ";
	datos($sqldelrol);
	

	foreach ($chkrol as $key => $id_rol) {
	$sqlrol="INSERT INTO `role_user` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES ('$id_rol', '$idi', CURTIME() , CURTIME() )";
	datos($sqlrol);
	datos($sqlrol);

}	
// exit;


	$action="El usuario se actualizo satisfactoriamente ";
	$tipomsg ="info";
}elseif ($ERR !=1){
	sleep(1);
	
// inserta
	// query("START TRANSACTION");
	$rol=$chkrol == 1? $rol='administrador': $rol='internal';
	$sqluser="INSERT INTO `users` (`name`, `email`, `password`, `created_at`) VALUES ('$rol', '$email', '$password', CURTIME())";
	datos($sqluser);

	$sqlmax="SELECT MAX(id) AS id FROM users";

	 $id = datos($sqlmax,1)[0];


	 $sqluserdt="INSERT INTO `users_detail` (`user_id`, `tipo_documento_id`, `numero_documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `created_at`) 
								VALUES ('$id', '$tipodoc', '$numeDoc', '$primNombre', '$seguNombre', '$primeApell', '$seguApell', CURTIME())";
datos($sqluserdt);								

foreach ($chkrol as $key => $id_rol) {
	$sqlrol="INSERT INTO `role_user` (`role_id`, `user_id`, `created_at`) VALUES ('$id_rol', '$id', CURTIME() )";
	datos($sqlrol);
}	


	// query("COMMIT"); 
	$action="el registro fue creado con exito ";
	$tipomsg ="info";
	
} 




}else{

	$sqlrol="DELETE FROM `idead`.`role_user` WHERE `user_id`='$idi AND role_id ='$chkrol'";
	datos($sqlrol);

	$sqluserdt="DELETE FROM `idead`.`users_detail` WHERE `user_id`='$idi' ";
	datos($sqluserdt);
	$sqluser="DELETE FROM `idead`.`users` WHERE  `id`='$idi'";
	datos($sqluser);
	$action="el registrose ha eliminado correctamente";
	$tipomsg ="info";

}
	// print_r($action);

if ($ERR ==1) {
$errores = "&Err1=".$Err1."&Err2=".$Err2."&Err3=".$Err3."&Err4=".$Err4."&Err5=".$Err5."&Err6=".$Err6 ."&Err7=".$Err7;
}
!$idi? $idi =$id : $idi = $idi;
$datausua="&tipodoc=".$tipodoc."&numeDoc=".$numeDoc."&primNombre=".$primNombre."&seguNombre=".$seguNombre."&primeApell=".$primeApell."&seguApell=".$seguApell."&passwd=".$passwd."&C_passwd=".$C_passwd."&email=".$email."&chkrol=".$chkrol."&id=".$idi;
	$action ="usuacrea.php?mensaje=".$action."&tipomsg=".$tipomsg.$datausua.$errores;
echo '<script>
 window.location.href="'.$action.'";
</script>';
