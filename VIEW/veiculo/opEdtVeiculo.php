<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$veiculo = new \MODEL\Veiculo();
$veiculo->setId((int)$_POST['id']);
$veiculo->setModelo($_POST['modelo']);
$veiculo->setMarca($_POST['marca']);
$veiculo->setAno((int)$_POST['ano']);
$veiculo->setPlaca($_POST['placa']);
$veiculo->setValorDiaria((float)$_POST['valor_diaria']);
$veiculo->setStatus($_POST['status']);
$veiculo->setImagem($_POST['imagem_antiga']);

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    
    if (!empty($_POST['imagem_antiga'])) {
        $caminho_antigo = $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/imagens/' . $_POST['imagem_antiga'];
        if (file_exists($caminho_antigo)) {
            unlink($caminho_antigo);
        }
    }

    $nomeArquivo = uniqid() . '-' . basename($_FILES["imagem"]["name"]);
    $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/imagens/';
    $caminhoCompleto = $diretorio . $nomeArquivo;

    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoCompleto)) {
        $veiculo->setImagem($nomeArquivo);
    }
}

$dalVeiculo = new \DAL\VeiculoDAL();
$dalVeiculo->Update($veiculo);

header("location: lstVeiculo.php");
?>