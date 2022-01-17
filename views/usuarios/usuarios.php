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
                    <?php if ( ($_SESSION && in_array('3', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {  ?>
                    <a href="<?php echo $PATH_INI?>views/usuarios/usuacrea.php" 
                    class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                   <?php } ?>
                </div>

                <div class="card-body">
                   <?php include_once($SIH_PATH.'partials/alerts.php');  ?>
                    <table id="idtabla" class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr class="ideadtext">
                                <th width="10px">Id</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <!-- <th colspan="2">&nbsp;</th> -->
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $sqlusua ="SELECT u.id,u.email,d.primer_nombre,d.segundo_nombre,d.primer_apellido,d.segundo_apellido
                           FROM users u
                           INNER JOIN users_detail d ON(u.id = d.user_id)
                           ORDER BY u.id";
                           $rowdatos = datos($sqlusua);
                        	foreach ($rowdatos as $datauser) {
                                $action ="usuacrea.php?id=".$datauser[id];
                                ?>

                            <tr class="ideadtext">
                                <td> <?=$datauser[id]?> </td>
                                <td><?=$datauser[email]?></td>
                                <td> <?=$datauser[primer_nombre]?> <?=$datauser[segundo_nombre]?>  <?=$datauser[primer_apellido]?>  <?=$datauser[segundo_apellido]?> 
                                    <?php if ( ($_SESSION && in_array('4', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {  ?>
                                    <a href='javascript: window.location.href="<?php echo $action ?>"' 
                                    class="btn btn-sm btn btn-success ideadtext float-right">
                                        Ver/Editar
                                    </a>
                                <?php } ?>
                            </td>
                               
                               <!--  <td width="10px">
                                    <a href="{{ route('users.show', $user->id) }}" 
                                    class="btn btn-sm btn btn-primary ideadtext">
                                        Ver
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