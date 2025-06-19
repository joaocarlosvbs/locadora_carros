<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$dalLocacao = new \DAL\LocacaoDAL();
$lstLocacoes = $dalLocacao->Select();
?>

<div class="container">
    <h3 class="center-align">Registro de Locações</h3>
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Placa</th>
                <th>Data Locação</th>
                <th>Data Devolução</th>
                <th>Operações
                    <a class="btn-floating btn-small waves-effect waves-light green" onclick="JavaScript:location.href='frmInsLocacao.php'">
                        <i class="material-icons">add</i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lstLocacoes)) {
                foreach ($lstLocacoes as $locacao) { ?>
                    <tr>
                        <td><?php echo $locacao->getId(); ?></td>
                        <td><?php echo $locacao->getNomeCliente(); ?></td>
                        <td><?php echo $locacao->getModeloVeiculo(); ?></td>
                        <td><?php echo $locacao->getPlacaVeiculo(); ?></td>
                        <td><?php echo $locacao->getDataLocacao()->format('d/m/Y'); ?></td>
                        <td>
                            <?php 
                            if ($locacao->getDataDevolucao()) {
                                echo $locacao->getDataDevolucao()->format('d/m/Y');
                            } else {
                                echo "Pendente";
                            }
                            ?>
                        </td>
                        <td>
                            <?php if (!$locacao->getDataDevolucao()) { ?>
                                <a class="btn waves-effect waves-light purple" onclick="devolver(<?php echo $locacao->getId(); ?>)">
                                    Devolver <i class="material-icons right">keyboard_return</i>
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