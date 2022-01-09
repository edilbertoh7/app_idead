<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/";
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";
include_once($SIH_PATH.'config/conex.php'); 
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php 
 	include_once($SIH_PATH.'partials/head.php'); 
 	?>
 </head>
 <body>
 	<?php include_once($SIH_PATH.'partials/navbar.php'); ?>
 
 	<?php
 	$bandconv =1;
 	 include_once($SIH_PATH.'views/convocatorias/convocatorias.php'); ?>
 </body>
 </html>