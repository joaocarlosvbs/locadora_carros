<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$id = $_GET['id'];

// 1. Atualizar a data de devolução na locação
$dalLocacao = new \DAL\LocacaoDAL();
$locacao = $dalLocacao->SelectById($id);
$locacao->setDataDevolucao(new \DateTime()); // Data e hora atuais
$dalLocacao->Update($locacao);

// 2. Atualizar o Status do Veículo para 'Disponível'
$dalVeiculo = new \DAL\VeiculoDAL();
$veiculo = $dalVeiculo->SelectById($locacao->getVeiculoId());
$veiculo->setStatus('D'); // 'D' de Disponível
$dalVeiculo->Update($veiculo);

header("location: lstLocacao.php");
?>