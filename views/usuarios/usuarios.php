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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Usuarios
                    
                    <a href="{{ route('users.create') }}" 
                    class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                   
                </div>

                <div class="card-body">
                   <?php include_once($SIH_PATH.'partials/alerts.php');  ?>
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10px">Id</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $campos ="u.id,u.email,d.primer_nombre,d.segundo_nombre,d.primer_apellido,d.segundo_apellido";
                        	$tabla ="users u";
                        	$join = "INNER JOIN users_detail d ON(u.id = d.user_id)";
                        	$rowdatos = datos(consultasql($campos,$tabla,$join,'consulta',$where));
                        	foreach ($rowdatos as $datauser) {?>

                            <tr>
                                <td> <?=$datauser[id]?> </td>
                                <td><?=$datauser[email]?></td>
                                <td> <?=$datauser[primer_nombre]?> <?=$datauser[segundo_nombre]?>  <?=$datauser[primer_apellido]?>  <?=$datauser[segundo_apellido]?> </td>
                               
                                <td width="10px">
                                    <a href="{{ route('users.show', $user->id) }}" 
                                    class="btn btn-sm btn btn-primary">
                                        Ver
                                    </a>
                                </td>
                                
                                <td width="10px">
                                    <a href="{{ route('users.edit', $user->id) }}" 
                                    class="btn btn-sm btn btn-success">
                                        Editar
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