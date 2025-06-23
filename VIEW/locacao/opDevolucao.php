<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$id = $_POST['locacao_id'];
$dataDevolucaoStr = $_POST['data_devolucao'];
$valorFinal = (float)$_POST['valor_final'];

$dalLocacao = new \DAL\LocacaoDAL();
$locacao = $dalLocacao->SelectById($id);

if ($locacao) {
    $locacao->setDataDevolucao(new \DateTime($dataDevolucaoStr));
    $locacao->setValorTotal($valorFinal);
    $locacao->setValorPago($valorFinal);
    $locacao->setStatusPagamento('Pago');

    $dalLocacao->Update($locacao);

    $dalVeiculo = new \DAL\VeiculoDAL();
    $veiculo = $dalVeiculo->SelectById($locacao->getVeiculoId());
    if ($veiculo) {
        $veiculo->setStatus('D');
        $dalVeiculo->Update($veiculo);
    }
}

header("location: lstLocacao.php");
?>