<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/usuario.php';

$usuario = trim($_POST['usuario']);
$senha = trim($_POST['senha']);

if (!empty($usuario) && !empty($senha)) {
    $dalUsuario = new \DAL\UsuarioDAL();
    $user = $dalUsuario->SelectUsuario($usuario);

    if ($user != null) {
        if (md5($senha) == $user->getSenha()) {
            $_SESSION['login'] = $user->getUsuario();
            header("location: home.php");
        } else {
            header("location: index.php");
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: index.php");
}
?>