<?php
namespace MODEL;

use DateTime;

class Locacao {
    private ?int $id;
    private ?int $cliente_id;
    private ?int $veiculo_id;
    private ?DateTime $data_locacao;
    private ?DateTime $data_devolucao;

    // Propriedades para dados das junções
    private ?string $nome_cliente;
    private ?string $modelo_veiculo;
    private ?string $placa_veiculo;
    
    public function __construct() {
        // Inicializa todas as propriedades que podem ser nulas para evitar erros.
        $this->data_devolucao = null;
        $this->nome_cliente = null;
        $this->modelo_veiculo = null;
        $this->placa_veiculo = null;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getClienteId(): ?int {
        return $this->cliente_id;
    }

    public function setClienteId(int $cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function getVeiculoId(): ?int {
        return $this->veiculo_id;
    }

    public function setVeiculoId(int $veiculo_id) {
        $this->veiculo_id = $veiculo_id;
    }

    public function getDataLocacao(): ?DateTime {
        return $this->data_locacao;
    }

    public function setDataLocacao(DateTime $data_locacao) {
        $this->data_locacao = $data_locacao;
    }

    public function getDataDevolucao(): ?DateTime {
        return $this->data_devolucao;
    }

    public function setDataDevolucao(?DateTime $data_devolucao) {
        $this->data_devolucao = $data_devolucao;
    }
    
    // Getters e Setters para dados das junções
    public function getNomeCliente(): ?string {
        return $this->nome_cliente;
    }

    public function setNomeCliente(string $nome_cliente) {
        $this->nome_cliente = $nome_cliente;
    }

    public function getModeloVeiculo(): ?string {
        return $this->modelo_veiculo;
    }

    public function setModeloVeiculo(string $modelo_veiculo) {
        $this->modelo_veiculo = $modelo_veiculo;
    }

    public function getPlacaVeiculo(): ?string {
        return $this->placa_veiculo;
    }

    public function setPlacaVeiculo(string $placa_veiculo) {
        $this->placa_veiculo = $placa_veiculo;
    }
}
?>