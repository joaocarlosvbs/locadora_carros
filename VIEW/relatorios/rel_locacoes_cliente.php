<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$dalLocacao = new \DAL\LocacaoDAL();
$dados = $dalLocacao->getCountByClient();
?>

<div class="container">
    <div class="card-panel">
        <h4 class="center-align">Relatório de Locações por Cliente</h4>
        <p class="center-align">Este relatório totaliza a quantidade de locações feitas por cada cliente, ordenado por quem mais alugou.</p>
        <table class="striped highlight">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Total de Locações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $linha) { ?>
                    <tr>
                        <td><?php echo $linha['nome']; ?></td>
                        <td><?php echo $linha['total']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
         <div class="center-align" style="margin-top: 2rem;">
            <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='menu_relatorios.php'">Voltar</button>
        </div>
    </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>