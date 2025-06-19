<?php
namespace MODEL;

class Veiculo {
    private ?int $id;
    private ?string $modelo;
    private ?string $marca;
    private ?int $ano;
    private ?string $placa;
    private ?float $valor_diaria;
    private ?string $status;
    private ?string $imagem;

    public function __construct() {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getModelo(): ?string {
        return $this->modelo;
    }

    public function setModelo(string $modelo) {
        $this->modelo = $modelo;
    }

    public function getMarca(): ?string {
        return $this->marca;
    }

    public function setMarca(string $marca) {
        $this->marca = $marca;
    }

    public function getAno(): ?int {
        return $this->ano;
    }

    public function setAno(int $ano) {
        $this->ano = $ano;
    }

    public function getPlaca(): ?string {
        return $this->placa;
    }

    public function setPlaca(string $placa) {
        $this->placa = $placa;
    }

    public function getValorDiaria(): ?float {
        return $this->valor_diaria;
    }

    public function setValorDiaria(float $valor_diaria) {
        $this->valor_diaria = $valor_diaria;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(string $status) {
        $this->status = $status;
    }
    
    public function getImagem(): ?string {
        return $this->imagem;
    }

    public function setImagem(?string $imagem) {
        $this->imagem = $imagem;
    }
}
?>