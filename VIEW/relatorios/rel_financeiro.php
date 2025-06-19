<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$dalLocacao = new \DAL\LocacaoDAL();
$summary = $dalLocacao->getFinancialSummary();
?>

<div class="container">
    <h4 class="center-align">Relatório Financeiro Geral</h4>
    <p class="center-align">Resumo de todos os valores transacionados no sistema de locações.</p>
    
    <div class="row" style="margin-top: 2rem;">
        <div class="col s12 m4">
            <div class="card-panel green white-text">
                <i class="material-icons large">attach_money</i>
                <h5>Faturamento Total</h5>
                <h4>R$ <?php echo number_format($summary['faturamento_total'] ?? 0, 2, ',', '.'); ?></h4>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card-panel teal white-text">
                <i class="material-icons large">account_balance_wallet</i>
                <h5>Total já Recebido</h5>
                <h4>R$ <?php echo number_format($summary['total_recebido'] ?? 0, 2, ',', '.'); ?></h4>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card-panel red white-text">
                <i class="material-icons large">hourglass_empty</i>
                <h5>Valores Pendentes</h5>
                <h4>R$ <?php echo number_format($summary['pendente'] ?? 0, 2, ',', '.'); ?></h4>
            </div>
        </div>
    </div>

    <div class="center-align" style="margin-top: 2rem;">
        <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='menu_relatorios.php'">Voltar</button>
    </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>