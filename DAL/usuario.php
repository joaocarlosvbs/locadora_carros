<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/conexao.php';

use \MODEL\Usuario;

class UsuarioDAL {
    public function Select() {
        $sql = "SELECT * FROM usuario;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        $lstUsuarios = [];
        foreach ($registros as $linha) {
            $usuario = new \MODEL\Usuario();
            $usuario->setId($linha['id']);
            $usuario->setUsuario($linha['usuario']);
            // Não retornamos a senha na listagem geral por segurança
            $lstUsuarios[] = $usuario;
        }
        return $lstUsuarios;
    }
    
    public function SelectById(int $id) {
        $sql = "SELECT * FROM usuario WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $usuario = new \MODEL\Usuario();
        if ($linha) {
            $usuario->setId($linha['id']);
            $usuario->setUsuario($linha['usuario']);
            $usuario->setSenha($linha['senha']); //usado no opLogin
        }
        return $usuario;
    }

    public function SelectUsuario(string $usuario) {
        $sql = "SELECT * FROM usuario WHERE usuario = ?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($usuario));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        if ($linha) {
            $user = new \MODEL\Usuario();
            $user->setId($linha['id']);
            $user->setUsuario($linha['usuario']);
            $user->setSenha($linha['senha']);
            return $user;
        }
        return null;
    }

    public function Insert(\MODEL\Usuario $usuario) {
        $sql = "INSERT INTO usuario (usuario, senha) VALUES (?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        // A senha já deve chegar com hash md5
        $result = $query->execute(array($usuario->getUsuario(), $usuario->getSenha()));
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Usuario $usuario) {
        // Verifica se a senha foi fornecida para atualização
        if (!empty($usuario->getSenha())) {
            $sql = "UPDATE usuario SET usuario=?, senha=? WHERE id=?;";
            $parametros = array($usuario->getUsuario(), $usuario->getSenha(), $usuario->getId());
        } else {
            $sql = "UPDATE usuario SET usuario=? WHERE id=?;";
            $parametros = array($usuario->getUsuario(), $usuario->getId());
        }

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute($parametros);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id) {
        $sql = "DELETE FROM usuario WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }
}
?>