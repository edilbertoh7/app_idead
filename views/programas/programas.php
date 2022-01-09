<?php 
$requestUri=$_SERVER['REQUEST_URI'];
$dirIdead=explode("/",$requestUri);
$dirIdead=$dirIdead[1];
$PATH_INI="/".$dirIdead."/"; // path del index
$SIH_PATH=$_SERVER['DOCUMENT_ROOT']."/".$dirIdead."/";// path raiz
include_once($SIH_PATH.'scripts/consultas.php');

include_once($SIH_PATH.'partials/head.php'); 

include_once($SIH_PATH.'partials/navbar.php'); 

?>
<div class="container arriba">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Programas
                    
                    <a href="<?php echo $PATH_INI ?>views/programas/create.php" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                   
                </div>

                <div class="card-body">
                    <?php include_once($SIH_PATH.'partials/alerts.php');  ?>
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	$campos ="id,nombre,activo";
                        	$tabla ="programas ";
                        	$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
                        	foreach ($rowdatos as $value) {
                        		$action ="create.php?id=".$value[id];
                        		?>
                            <tr class="ideadtext">
                                <td> <?=$value[id]?> </td>
                                <td> <?=$value[nombre]?> </td>
                                <td> <?=$value[activo] == 1? 'Activo' : 'Inactivo'?> </td>

                                    <td width="10px">
                                        <a href='javascript: window.location.href="<?php echo $action ?>"'  
                                        class="btn btn-sm btn btn-success ideadtext">
                                            ver/Editar
                                        </a>
                                    </td>                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>                 
                </div>
            </div>
        </div>
    </div>
</div>