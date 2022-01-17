<?php 
$conex = null;
session_start();

 function conecta()
{
	global $conex;
$conex=mysqli_connect("192.168.0.80","root","14152680","idead");
if (!$conex) {
        echo "no se ha podido establecer conexion.";
        exit();
    }
mysqli_set_charset($conex,"utf8");
}
// se crea un a funcion que permite recorrer las consultas sql
function datos($sql,$band='')
{ $conex = conecta();// se hace el llamado a la funcion que realiza la conexion
	global $conex;
	if ($band == 1) {
		$result = $conex -> query($sql);
  while ($row = $result -> fetch_row()) {
  	return $row;
  }
	}else{

	$row=$conex->query($sql);
	return $row;	
	}
}
	?>