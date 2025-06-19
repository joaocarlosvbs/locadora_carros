<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$id = $_GET['id'];

$dalLocacao = new \DAL\LocacaoDAL();
$locacao = $dalLocacao->SelectById($id);

if ($locacao) {
    $locacao->setDataDevolucao(new \DateTime());

    $locacao->setValorPago($locacao->getValorTotal()); 
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