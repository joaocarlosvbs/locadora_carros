<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

// 1. Criar e Inserir a Locação
$locacao = new \MODEL\Locacao();
$locacao->setClienteId((int)$_POST['cliente_id']);
$locacao->setVeiculoId((int)$_POST['veiculo_id']);

// Formatar data de 'dd-mm-yyyy' para 'Y-m-d' para o banco de dados
$dataLocacao = \DateTime::createFromFormat('d-m-Y', $_POST['data_locacao']);
$locacao->setDataLocacao($dataLocacao);

$dalLocacao = new \DAL\LocacaoDAL();
$dalLocacao->Insert($locacao);

// 2. Atualizar o Status do Veículo para 'Indisponível'
$dalVeiculo = new \DAL\VeiculoDAL();
$veiculo = $dalVeiculo->SelectById($locacao->getVeiculoId());
$veiculo->setStatus('I'); // 'I' de Indisponível
$dalVeiculo->Update($veiculo);

header("location: lstLocacao.php");
?>