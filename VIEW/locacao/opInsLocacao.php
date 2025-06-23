<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$locacao = new \MODEL\Locacao();
$locacao->setClienteId((int)$_POST['cliente_id']);
$locacao->setVeiculoId((int)$_POST['veiculo_id']);

$locacao->setDataLocacao(new \DateTime($_POST['data_locacao']));
$locacao->setDataPrevDevolucao(new \DateTime($_POST['data_prev_devolucao']));

$locacao->setValorTotal((float)$_POST['valor_total']);
$locacao->setValorPago((float)$_POST['valor_pago']);
$locacao->setNivelTanque($_POST['nivel_tanque']);

if ($locacao->getValorPago() >= $locacao->getValorTotal() && $locacao->getValorTotal() > 0) {
    $locacao->setStatusPagamento('Pago');
} elseif ($locacao->getValorPago() > 0) {
    $locacao->setStatusPagamento('Pago Parcialmente');
} else {
    $locacao->setStatusPagamento('Pendente');
}

$dalLocacao = new \DAL\LocacaoDAL();
$dalLocacao->Insert($locacao);

$dalVeiculo = new \DAL\VeiculoDAL();
$veiculo = $dalVeiculo->SelectById($locacao->getVeiculoId());
$veiculo->setStatus('I');
$dalVeiculo->Update($veiculo);

header("location: lstLocacao.php");
?>