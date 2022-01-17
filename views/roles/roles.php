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
                    Roles
                   <?php if ( ($_SESSION && in_array('7', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {?>
                    <a href="<?php echo $PATH_INI ?>views/roles/rolcrea.php" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                    <?php } ?>
                </div>
               <?php include_once($SIH_PATH.'partials/alerts.php');  ?>
                <div class="card-body">
                    <table id="idtabla" class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10px">Id</th>
                                <th>Nombre</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $sqlrol="SELECT id,name FROM roles";
                            $rowrol=datos($sqlrol);
                            foreach ($rowrol as  $rol) {
                                $action ="rolcrea.php?id=".$rol[id];?>
                                <tr>
                                    <td> <?=$rol[id]?> </td>
                                    <td> <?=$rol[name]?> 
                                    <?php if ( ($_SESSION && in_array('8', $ARse)) || ($_SESSION && in_array('all-access', $ARper)) ) {  ?>
                                        <a href='javascript: window.location.href="<?php echo $action ?>"'  
                                            class="btn btn-sm btn-success float-right">
                                            Ver/Editar
                                        </a>
                                    <?php } ?>
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