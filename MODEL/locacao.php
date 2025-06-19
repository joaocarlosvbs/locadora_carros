<?php
namespace MODEL;

use DateTime;

class Locacao {
    private ?int $id;
    private ?int $cliente_id;
    private ?int $veiculo_id;
    private ?DateTime $data_locacao;
    private ?DateTime $data_prev_devolucao;
    private ?DateTime $data_devolucao;
    private ?float $valor_total;
    private ?float $valor_pago;
    private ?string $status_pagamento;
    private ?string $nivel_tanque;

    // Propriedades para dados das junções (JOIN)
    private ?string $nome_cliente;
    private ?string $modelo_veiculo;
    private ?string $placa_veiculo;
    
    public function __construct() {
        // Inicializa todas as propriedades que podem ser nulas para evitar erros de inicialização
        $this->id = null;
        $this->cliente_id = null;
        $this->veiculo_id = null;
        $this->data_locacao = null;
        $this->data_prev_devolucao = null;
        $this->data_devolucao = null;
        $this->valor_total = 0.0;
        $this->valor_pago = 0.0;
        $this->status_pagamento = null;
        $this->nivel_tanque = null;
        $this->nome_cliente = null;
        $this->modelo_veiculo = null;
        $this->placa_veiculo = null;
    }

    // Getters e Setters para as propriedades
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getClienteId(): ?int {
        return $this->cliente_id;
    }

    public function setClienteId(int $cliente_id): void {
        $this->cliente_id = $cliente_id;
    }

    public function getVeiculoId(): ?int {
        return $this->veiculo_id;
    }

    public function setVeiculoId(int $veiculo_id): void {
        $this->veiculo_id = $veiculo_id;
    }

    public function getDataLocacao(): ?DateTime {
        return $this->data_locacao;
    }

    public function setDataLocacao(?DateTime $data_locacao): void {
        $this->data_locacao = $data_locacao;
    }

    public function getDataPrevDevolucao(): ?DateTime {
        return $this->data_prev_devolucao;
    }

    public function setDataPrevDevolucao(?DateTime $data_prev_devolucao): void {
        $this->data_prev_devolucao = $data_prev_devolucao;
    }

    public function getDataDevolucao(): ?DateTime {
        return $this->data_devolucao;
    }

    public function setDataDevolucao(?DateTime $data_devolucao): void {
        $this->data_devolucao = $data_devolucao;
    }

    public function getValorTotal(): ?float {
        return $this->valor_total;
    }

    public function setValorTotal(?float $valor_total): void {
        $this->valor_total = $valor_total;
    }

    public function getValorPago(): ?float {
        return $this->valor_pago;
    }

    public function setValorPago(?float $valor_pago): void {
        $this->valor_pago = $valor_pago;
    }

    public function getStatusPagamento(): ?string {
        return $this->status_pagamento;
    }

    public function setStatusPagamento(?string $status): void {
        $this->status_pagamento = $status;
    }

    public function getNivelTanque(): ?string {
        return $this->nivel_tanque;
    }

    public function setNivelTanque(?string $nivel): void {
        $this->nivel_tanque = $nivel;
    }

    // Getters e Setters para dados das junções
    public function getNomeCliente(): ?string {
        return $this->nome_cliente;
    }

    public function setNomeCliente(string $nome_cliente): void {
        $this->nome_cliente = $nome_cliente;
    }

    public function getModeloVeiculo(): ?string {
        return $this->modelo_veiculo;
    }

    public function setModeloVeiculo(string $modelo_veiculo): void {
        $this->modelo_veiculo = $modelo_veiculo;
    }

    public function getPlacaVeiculo(): ?string {
        return $this->placa_veiculo;
    }

    public function setPlacaVeiculo(string $placa_veiculo): void {
        $this->placa_veiculo = $placa_veiculo;
    }
}
?>