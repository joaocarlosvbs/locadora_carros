<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$id = $_GET['id'];
$dalVeiculo = new \DAL\VeiculoDAL();

$veiculo = $dalVeiculo->SelectById($id);
if ($veiculo->getImagem()) {
    $caminho_imagem = $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/imagens/' . $veiculo->getImagem();
    if (file_exists($caminho_imagem)) {
        unlink($caminho_imagem);
    }
}

$dalVeiculo->Delete($id);

header("location: lstVeiculo.php");
?>