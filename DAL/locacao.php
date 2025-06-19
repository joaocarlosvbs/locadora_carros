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
                if (!empty($linha['data_prev_devolucao'])) {
                    $locacao->setDataPrevDevolucao(new \DateTime($linha['data_prev_devolucao']));
                }
                if (!empty($linha['data_devolucao'])) {
                    $locacao->setDataDevolucao(new \DateTime($linha['data_devolucao']));
                }
                $locacao->setValorTotal((float)$linha['valor_total']);
                $locacao->setValorPago((float)$linha['valor_pago']);
                $locacao->setStatusPagamento((string)$linha['status_pagamento']);
                $locacao->setNivelTanque((string)$linha['nivel_tanque']);
                
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
             if (!empty($linha['data_prev_devolucao'])) {
                $locacao->setDataPrevDevolucao(new \DateTime($linha['data_prev_devolucao']));
            }
            if (!empty($linha['data_devolucao'])) {
                $locacao->setDataDevolucao(new \DateTime($linha['data_devolucao']));
            }
            $locacao->setValorTotal((float)$linha['valor_total']);
            $locacao->setValorPago((float)$linha['valor_pago']);
            $locacao->setStatusPagamento((string)$linha['status_pagamento']);
            $locacao->setNivelTanque((string)$linha['nivel_tanque']);
        }
        return $locacao;
    }

    public function Insert(\MODEL\Locacao $locacao) {
        $sql = "INSERT INTO locacao (cliente_id, veiculo_id, data_locacao, data_prev_devolucao, valor_total, valor_pago, status_pagamento, nivel_tanque) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        
        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $dataLoc = $locacao->getDataLocacao() ? $locacao->getDataLocacao()->format('Y-m-d') : null;
        $dataPrevDev = $locacao->getDataPrevDevolucao() ? $locacao->getDataPrevDevolucao()->format('Y-m-d') : null;

        $result = $query->execute([
            $locacao->getClienteId(),
            $locacao->getVeiculoId(),
            $dataLoc,
            $dataPrevDev,
            $locacao->getValorTotal(),
            $locacao->getValorPago(),
            $locacao->getStatusPagamento(),
            $locacao->getNivelTanque()
        ]);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Locacao $locacao) {
        $sql = "UPDATE locacao SET cliente_id=?, veiculo_id=?, data_locacao=?, data_prev_devolucao=?, data_devolucao=?, valor_total=?, valor_pago=?, status_pagamento=?, nivel_tanque=? WHERE id=?;";
        
        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $dataLoc = $locacao->getDataLocacao() ? $locacao->getDataLocacao()->format('Y-m-d') : null;
        $dataPrevDev = $locacao->getDataPrevDevolucao() ? $locacao->getDataPrevDevolucao()->format('Y-m-d') : null;
        $dataDev = $locacao->getDataDevolucao() ? $locacao->getDataDevolucao()->format('Y-m-d') : null;

        $result = $query->execute([
            $locacao->getClienteId(),
            $locacao->getVeiculoId(),
            $dataLoc,
            $dataPrevDev,
            $dataDev,
            $locacao->getValorTotal(),
            $locacao->getValorPago(),
            $locacao->getStatusPagamento(),
            $locacao->getNivelTanque(),
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

    // --- MÉTODOS PARA RELATÓRIOS ---

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

    public function getFinancialSummary() {
        $sql = "SELECT 
                    SUM(valor_total) as faturamento_total, 
                    SUM(valor_pago) as total_recebido,
                    (SUM(valor_total) - SUM(valor_pago)) as pendente
                FROM locacao;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute();
        $con = Conexao::desconectar();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}
?>