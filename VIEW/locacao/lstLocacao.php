<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$dalLocacao = new \DAL\LocacaoDAL();
$lstLocacoes = $dalLocacao->Select();
?>

<div class="container">
    <h3 class="center-align">Registro de Locações</h3>
    <table class="striped responsive-table highlight">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Datas (Locação / Prev. Devolução)</th>
                <th>Valor Total</th>
                <th>Status Pagamento</th>
                <th>Devolução</th>
                <th>Operações
                    <a class="btn-floating btn-small waves-effect waves-light green" href="frmInsLocacao.php" title="Adicionar Nova Locação">
                        <i class="material-icons">add</i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lstLocacoes)) {
                foreach ($lstLocacoes as $locacao) { ?>
                    <tr>
                        <td><?php echo $locacao->getNomeCliente(); ?></td>
                        <td><?php echo $locacao->getModeloVeiculo() . ' (' . $locacao->getPlacaVeiculo() . ')'; ?></td>
                        <td>
                            <?php
                                if ($locacao->getDataLocacao()) {
                                    echo $locacao->getDataLocacao()->format('d/m/Y');
                                } else {
                                    echo 'N/A';
                                }
                                echo ' - ';
                                if ($locacao->getDataPrevDevolucao()) {
                                    echo $locacao->getDataPrevDevolucao()->format('d/m/Y');
                                } else {
                                    echo 'N/A';
                                }
                            ?>
                        </td>
                        <td>R$ <?php echo number_format($locacao->getValorTotal(), 2, ',', '.'); ?></td>
                        <td>
                            <?php 
                                $status = $locacao->getStatusPagamento();
                                $cor = 'grey';
                                if ($status == 'Pago') $cor = 'green';
                                if ($status == 'Pendente') $cor = 'red';
                                if ($status == 'Pago Parcialmente') $cor = 'orange';
                                echo "<span class='new badge $cor' data-badge-caption=''>$status</span>";
                            ?>
                        </td>
                        <td>
                            <?php 
                            if ($locacao->getDataDevolucao()) {
                                echo $locacao->getDataDevolucao()->format('d/m/Y');
                            } else {
                                echo "<span class='new badge blue' data-badge-caption=''>Ativa</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php if (!$locacao->getDataDevolucao()) { ?>
                                <a class="btn-small waves-effect waves-light purple" onclick="devolver(<?php echo $locacao->getId(); ?>)">
                                    Devolver
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="7" class="center-align">Nenhuma locação encontrada.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    </div>

<script>
    function devolver(id) {
        if (confirm('Confirmar a devolução para esta locação?')) {
            location.href = 'opDevolucao.php?id=' + id;
        }
    }
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>