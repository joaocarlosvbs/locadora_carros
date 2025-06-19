<?php
namespace MODEL;

class Cliente {
    private ?int $id;
    private ?string $nome;
    private ?string $cpf;
    private ?string $telefone;
    private ?string $email;

    public function __construct() {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getCpf(): ?string {
        return $this->cpf;
    }

    public function setCpf(string $cpf) {
        $this->cpf = $cpf;
    }

    public function getTelefone(): ?string {
        return $this->telefone;
    }

    public function setTelefone(string $telefone) {
        $this->telefone = $telefone;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }
}
?>