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
                    Cursos
                    <a href="<?php echo $PATH_INI ?>views/cursos/creacurso.php" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                </div>

                <div class="card-body">
                    <?php include_once($SIH_PATH.'partials/alerts.php');  ?>
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Programa</th>
                                <th>Curso</th>
                                <th>Estado</th>
                                <!-- <th colspan="3">&nbsp;</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $campos ="c.id,p.nombre AS nomnprog, c.nombre AS nombcurso,c.activo";
                        	$tabla ="cursos c";
                        	$join = "INNER JOIN programas p ON(c.programa_id = p.id)";

                        	$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
                        	foreach ($rowdatos as  $curso) {
                        		$action ="creacurso.php?id=".$curso[id];
                        		?>
                            <tr class="ideadtext" onclick='javascript: window.location.href="<?php echo $action ?>"'>
                                <td> <?=$curso[id]?> </td>
                                <td> <?=$curso[nomnprog]?> </td>
                                <td> <?=$curso[nombcurso]?> </td>
                                <td> <?=$curso[activo] == 1? 'Activo' : 'Inactivo'?> </td>

                                <!-- <td width="10px">
                                    <a href="{{ route('cursos.show', $curso->id) }}" 
                                    class="btn btn-sm btn btn-primary ideadtext">
                                        Ver
                                    </a>
                                </td>
                                    <td width="10px">
                                        <a href="{{ route('cursos.edit', $curso->id) }}" 
                                        class="btn btn-sm btn btn-success ideadtext">
                                            Editar
                                        </a>
                                    </td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>