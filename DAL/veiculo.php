<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/conexao.php';

use \MODEL\Veiculo;

class VeiculoDAL {
    public function Select(string $termoBusca = '') {
        if (!empty($termoBusca)) {
            $sql = "SELECT * FROM veiculo WHERE modelo LIKE ? OR marca LIKE ?;";
        } else {
            $sql = "SELECT * FROM veiculo;";
        }
        
        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        if (!empty($termoBusca)) {
            $termo = '%' . $termoBusca . '%';
            $query->execute([$termo, $termo]);
        } else {
            $query->execute();
        }

        $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lstVeiculos = [];
        foreach ($registros as $linha) {
            $veiculo = new \MODEL\Veiculo();
            $veiculo->setId($linha['id']);
            $veiculo->setModelo($linha['modelo']);
            $veiculo->setMarca($linha['marca']);
            $veiculo->setAno($linha['ano']);
            $veiculo->setPlaca($linha['placa']);
            $veiculo->setValorDiaria($linha['valor_diaria']);
            $veiculo->setStatus($linha['status']);
            $veiculo->setImagem($linha['imagem']);
            $lstVeiculos[] = $veiculo;
        }
        return $lstVeiculos;
    }
    
    public function SelectByStatus(string $status): array {
        $sql = "SELECT * FROM veiculo WHERE status = ?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute([$status]);
        $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lstVeiculos = [];
        foreach ($registros as $linha) {
            $veiculo = new \MODEL\Veiculo();
            $veiculo->setId($linha['id']);
            $veiculo->setModelo($linha['modelo']);
            $veiculo->setMarca($linha['marca']);
            $veiculo->setAno($linha['ano']);
            $veiculo->setPlaca($linha['placa']);
            $veiculo->setValorDiaria($linha['valor_diaria']);
            $veiculo->setStatus($linha['status']);
            $veiculo->setImagem($linha['imagem']);
            $lstVeiculos[] = $veiculo;
        }
        return $lstVeiculos;
    }

    public function SelectById(int $id) {
        $sql = "SELECT * FROM veiculo WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $veiculo = new \MODEL\Veiculo();
        if ($linha) {
            $veiculo->setId($linha['id']);
            $veiculo->setModelo($linha['modelo']);
            $veiculo->setMarca($linha['marca']);
            $veiculo->setAno($linha['ano']);
            $veiculo->setPlaca($linha['placa']);
            $veiculo->setValorDiaria($linha['valor_diaria']);
            $veiculo->setStatus($linha['status']);
            $veiculo->setImagem($linha['imagem']);
        }
        return $veiculo;
    }

    public function Insert(\MODEL\Veiculo $veiculo) {
        $sql = "INSERT INTO veiculo (modelo, marca, ano, placa, valor_diaria, status, imagem) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array(
            $veiculo->getModelo(), 
            $veiculo->getMarca(), 
            $veiculo->getAno(), 
            $veiculo->getPlaca(), 
            $veiculo->getValorDiaria(), 
            $veiculo->getStatus(),
            $veiculo->getImagem()
        ));
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Veiculo $veiculo) {
        $sql = "UPDATE veiculo SET modelo=?, marca=?, ano=?, placa=?, valor_diaria=?, status=?, imagem=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array(
            $veiculo->getModelo(), 
            $veiculo->getMarca(), 
            $veiculo->getAno(), 
            $veiculo->getPlaca(), 
            $veiculo->getValorDiaria(), 
            $veiculo->getStatus(),
            $veiculo->getImagem(),
            $veiculo->getId()
        ));
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id) {
        $sql = "DELETE FROM veiculo WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }

     public function getCountByStatus() {
        $sql = "SELECT status, COUNT(*) as total FROM veiculo GROUP BY status;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();
        return $registros;
    }
}
?>