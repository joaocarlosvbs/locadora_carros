<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/usuario.php';

$id = $_GET['id'];
$dalUsuario = new \DAL\UsuarioDAL();

$usuarioParaDeletar = $dalUsuario->SelectById($id);
if ($usuarioParaDeletar->getUsuario() != $_SESSION['login']) {
    $dalUsuario->Delete($id);
}

header("location: lstUsuario.php");
?>