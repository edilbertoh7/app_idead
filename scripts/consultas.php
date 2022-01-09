<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/";
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";
include_once($SIH_PATH.'config/conex.php'); 
function consultasql($campos,$tabla,$join,$tipo,$where)
{
	if ($where) {
		$WHERE = $where;
	}
	if ($tipo =='consulta') {
		if ($join) { // si existe consulta multitablas
			$joins = explode(',', $join);
			foreach ($joins as $value) {
				$JOIN .=$value;
			}
		}
		$sql ="SELECT $campos
				FROM $tabla
				$JOIN
				$where";
	}
	return $sql;
}

if ($_POST['Accion']=='Municipios') {
	$sqlMuni =" SELECT m.id,m.nombre FROM municipios m WHERE m.departamento_id ='$_POST[id]'";
	$rowMuni = datos($sqlMuni);

	foreach ($rowMuni as $value) {
		$optMuni.="<option value=".$value[id]." >".$value[nombre]."</option>";
	}
	echo $optMuni;
}
//validacion de inicio de sesion
function validarlogin($email,$password)
{
	global $conex;
	$sqllogin = "SELECT email password FROM users WHERE email ='$email' AND password ='$password'";
	$result = datos($sqllogin);
	$row_cnt = $result->num_rows;
	if ($row_cnt>0) {
		session_start();
		$_SESSION['usuario']=$email;
		$_SESSION['correo']=$password;
		return true;
	}
	return false;
}

function hainiciadosesion()
{
	session_start();
	return isset($_SESSION['usuario']);
}



 ?>