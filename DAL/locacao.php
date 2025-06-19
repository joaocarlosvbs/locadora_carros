<?php
namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/conexao.php';

use \MODEL\Locacao;

class LocacaoDAL {
    public function Select() {
        $sql = "SELECT l.*, c.nome as nome_cliente, v.modelo as modelo_veiculo, v.placa as placa_veiculo 
                FROM locacao l
                INNER JOIN cliente c ON l.cliente_id = c.id
                INNER JOIN veiculo v ON l.veiculo_id = v.id
                ORDER BY l.data_locacao DESC;";

        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        $lstLocacoes = [];
        if ($registros) {
            foreach ($registros as $linha) {
                $locacao = new \MODEL\Locacao();
                $locacao->setId((int)$linha['id']);
                $locacao->setClienteId((int)$linha['cliente_id']);
                $locacao->setVeiculoId((int)$linha['veiculo_id']);
                $locacao->setNomeCliente((string)$linha['nome_cliente']);
                $locacao->setModeloVeiculo((string)$linha['modelo_veiculo']);
                $locacao->setPlacaVeiculo((string)$linha['placa_veiculo']);
                if (!empty($linha['data_locacao'])) {
                    $locacao->setDataLocacao(new \DateTime($linha['data_locacao']));
                }
                if (!empty($linha['data_devolucao'])) {
                    $locacao->setDataDevolucao(new \DateTime($linha['data_devolucao']));
                }
                $lstLocacoes[] = $locacao;
            }
        }
        return $lstLocacoes;
    }

    public function SelectById(int $id) {
        $sql = "SELECT * FROM locacao WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute([$id]);
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();
        
        $locacao = new \MODEL\Locacao();
        if ($linha) {
            $locacao->setId((int)$linha['id']);
            $locacao->setClienteId((int)$linha['cliente_id']);
            $locacao->setVeiculoId((int)$linha['veiculo_id']);
            if (!empty($linha['data_locacao'])) {
                $locacao->setDataLocacao(new \DateTime($linha['data_locacao']));
            }
            if (!empty($linha['data_devolucao'])) {
                $locacao->setDataDevolucao(new \DateTime($linha['data_devolucao']));
            }
        }
        return $locacao;
    }

    public function Insert(\MODEL\Locacao $locacao) {
        $sql = "INSERT INTO locacao (cliente_id, veiculo_id, data_locacao) VALUES (?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $dataLocacao = $locacao->getDataLocacao() ? $locacao->getDataLocacao()->format('Y-m-d') : null;
        $result = $query->execute([
            $locacao->getClienteId(),
            $locacao->getVeiculoId(),
            $dataLocacao
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Locacao $locacao) {
        $sql = "UPDATE locacao SET cliente_id=?, veiculo_id=?, data_locacao=?, data_devolucao=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $dataLocacao = $locacao->getDataLocacao() ? $locacao->getDataLocacao()->format('Y-m-d') : null;
        $dataDevolucao = $locacao->getDataDevolucao() ? $locacao->getDataDevolucao()->format('Y-m-d') : null;
        $result = $query->execute([
            $locacao->getClienteId(),
            $locacao->getVeiculoId(),
            $dataLocacao,
            $dataDevolucao,
            $locacao->getId()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id) {
        $sql = "DELETE FROM locacao WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute([$id]);
        $con = Conexao::desconectar();
        return $result;
    }
    
    public function getCountByClient() {
        $sql = "SELECT c.nome, COUNT(l.id) as total 
                FROM locacao l 
                JOIN cliente c ON l.cliente_id = c.id 
                GROUP BY c.nome 
                ORDER BY total DESC;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();
        return $registros;
    }
}
?>