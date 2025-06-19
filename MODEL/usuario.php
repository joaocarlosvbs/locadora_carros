<?php
namespace MODEL;

class Usuario {
    private ?int $id;
    private ?string $usuario;
    private ?string $senha;

    public function __construct() {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getUsuario(): ?string {
        return $this->usuario;
    }

    public function setUsuario(string $usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha(): ?string {
        return $this->senha;
    }

    public function setSenha(string $senha) {
        $this->senha = $senha;
    }
}
?>