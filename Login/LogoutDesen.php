<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

unset($_SESSION['SESSION_DESENV_DESENVOLVEDOR']);
unset($_SESSION['SESSION_DESENV_EMAIL']);
unset($_SESSION['SESSION_DESENV_SENHA']);

session_destroy();

header('Location: ../Telas/Login.php');


?>