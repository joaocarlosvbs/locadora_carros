<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/cliente.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/conexao.php';

use \MODEL\Cliente;

class ClienteDAL {
    public function Select() {
        $sql = "SELECT * FROM cliente;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        $lstClientes = [];
        foreach ($registros as $linha) {
            $cliente = new \MODEL\Cliente();
            $cliente->setId($linha['id']);
            $cliente->setNome($linha['nome']);
            $cliente->setCpf($linha['cpf']);
            $cliente->setTelefone($linha['telefone']);
            $cliente->setEmail($linha['email']);
            $lstClientes[] = $cliente;
        }
        return $lstClientes;
    }

    public function SelectById(int $id) {
        $sql = "SELECT * FROM cliente WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $cliente = new \MODEL\Cliente();
        if ($linha) {
            $cliente->setId($linha['id']);
            $cliente->setNome($linha['nome']);
            $cliente->setCpf($linha['cpf']);
            $cliente->setTelefone($linha['telefone']);
            $cliente->setEmail($linha['email']);
        }
        return $cliente;
    }

    public function Insert(\MODEL\Cliente $cliente) {
        $sql = "INSERT INTO cliente (nome, cpf, telefone, email) VALUES (?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($cliente->getNome(), $cliente->getCpf(), $cliente->getTelefone(), $cliente->getEmail()));
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Cliente $cliente) {
        $sql = "UPDATE cliente SET nome=?, cpf=?, telefone=?, email=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($cliente->getNome(), $cliente->getCpf(), $cliente->getTelefone(), $cliente->getEmail(), $cliente->getId()));
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id) {
        $sql = "DELETE FROM cliente WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }
}
?>