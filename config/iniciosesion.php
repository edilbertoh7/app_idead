<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/";
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";
// include_once($SIH_PATH.'config/conex.php'); 
include_once($SIH_PATH.'scripts/consultas.php');
foreach($_POST as $variable=>$valor){
    $$variable=$valor;
}
$password = md5($password);

if (validarlogin($email,$password)) {
	header("location: ../");
}else{
	$action ="login.php?mensaje=El usuario o la contraseña son incorrectos&usuario=".$email;
echo '<script>
 window.location.href="'.$action.'";
</script>';
}
?>