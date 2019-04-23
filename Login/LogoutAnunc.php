<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

unset($_SESSION['SESSION_ANUNC_RAZAO']);
unset($_SESSION['SESSION_ANUNC_EMAIL']);
unset($_SESSION['SESSION_ANUNC_SENHA']);

session_destroy();

header('Location: ../Telas/Login.php');


?>
