<div class="row ">
	<div class="col">
		<div id="app">
			<nav class="navbar navbar-expand-md navbar-light bg-danger">
				<div class="container col-md-9  ">
					<a class="navbar-brand " href="<?php echo $PATH_INI ?>">
						<b>IDEAD</b>
					</a>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav">
							<?php if ($_SESSION) {?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>views/cats/cats.php">CAT</a>
								</li>
							<?php } if ($_SESSION) {?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>views/programas/programas.php">Programas</a>
								</li>
							<?php } if ($_SESSION) {?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>views/cursos/cursos.php">Cursos</a>
								</li>
							<?php } if ($_SESSION) {?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>views/convocatorias/convocatorias.php">Convocatorias</a>
								</li>
							<?php } if ($_SESSION) {?>
								<li class="nav-item">
									<a class="nav-link"  href="<?php echo $PATH_INI ?>views/usuarios/usuarios.php">Usuarios</a>
								</li>
							<?php } if ($_SESSION) {?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>views/cursos/cursos.php">Roles</a>
								</li>
							<?php } if ($_SESSION) {?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>views/cursos/cursos.php">Log</a>
								</li>
							<?php } if (!$_SESSION) { ?>
							</ul>

							<ul class="navbar-nav ml-auto mr-auto">
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>config/login.php">Acceder</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $PATH_INI ?>views/cursos/cursos.php">Registrar</a>
								</li>
						<?php } if ($_SESSION) {?>
							</ul>
							<ul class="navbar-nav ml-auto mr-auto">

							 <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo $_SESSION['usuario'] ?><span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo $PATH_INI ?>config/cerrarsesion.php"
                                      >
                                        Cerrar sesion:
                                    </a>
                                </div>
                            </li>

							
						</ul>

						<?php } ?>
					</div>
				</div>

			</nav>

		</div>

	</div>

</div>