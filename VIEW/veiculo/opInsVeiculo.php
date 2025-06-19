<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$veiculo = new \MODEL\Veiculo();
$veiculo->setModelo($_POST['modelo']);
$veiculo->setMarca($_POST['marca']);
$veiculo->setAno((int)$_POST['ano']);
$veiculo->setPlaca($_POST['placa']);
$veiculo->setValorDiaria((float)$_POST['valor_diaria']);
$veiculo->setStatus($_POST['status']);

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $nomeArquivo = uniqid() . '-' . basename($_FILES["imagem"]["name"]);
    $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/imagens/';
    $caminhoCompleto = $diretorio . $nomeArquivo;

    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoCompleto)) {
        $veiculo->setImagem($nomeArquivo);
    }
}

$dalVeiculo = new \DAL\VeiculoDAL();
$dalVeiculo->Insert($veiculo);

header("location: lstVeiculo.php");
?>