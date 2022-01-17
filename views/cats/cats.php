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

	<div class="container arriba" >
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    CAT
                    <?php if ( ($_SESSION && in_array('11', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) { ?>
                    <a href="<?php echo $PATH_INI ?>views/cats/create.php" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                <?php } ?>
                </div>
                <div class="card-body">
                    <?php include_once($SIH_PATH.'partials/alerts.php');  ?>
                   
                    <table id="idtabla" class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr class="ideadtext">
                                <th>id</th>
                                <th>CAT</th>
                                <th>Dirección</th>
                                <th>Email</th>
                                <th>Departamento</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	$campos ="c.id,c.nombre,c.direccion,c.email,d.nombre AS depa,m.nombre AS muni,c.activo";
                        	$tabla ="cat c";
                        	$join = "INNER JOIN departamentos d ON(c.departamento_id = d.id), INNER JOIN municipios m ON(c.municipio_id = m.id)";

                        	$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
                        	foreach ($rowdatos as $key => $value) {
                                $action ="create.php?id=".$value[id];
                                if ( ($_SESSION && in_array('12', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {
                                ?>
                            <tr class="ideadtext" onclick='javascript: window.location.href="<?php echo $action ?>"' >
                            <?php }else{ ?>
                        	<tr class="ideadtext"  >
                            <?php } ?>
                                <td> <?=$value[id]?></td>
                                <td> <?=$value[nombre]?></td>
                                <td> <?=$value[direccion]?></td>
                                <td> <?=$value[email]?> </td>
                                <td> <?=$value[depa]?> </td>
                                <td> <?=$value[muni]?> </td>
                                <td> <?=$value[activo] == 1? 'Activo' : 'Inactivo'?>
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



