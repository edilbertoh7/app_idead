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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ideadtext">Acceder</div>

                <div class="card-body">
                    <form method="POST" action="iniciosesion.php">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right ideadtext">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" id="email" value="<?=$_GET[usuario]?>" required autofocus>

                                <?php if ($_GET['mensaje']): ?>
                                 <!-- muestra mensaje de error si se llega a presentar -->
                                 <span class="text-danger" role="alert">
                                    <strong> <?php echo $_GET['mensaje'] ?> </strong>
                                </span>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right ideadtext">Contraseña</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                                <label class="form-check-label ideadtext" for="remember">
                                    Recordar
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Acceder
                            </button>
                            <a class="btn btn-link" href="">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>