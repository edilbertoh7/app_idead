<?php 
//editado desde ubuntu
session_start();
session_unset();
session_destroy();
header("location: ../");
 ?>