<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$dalVeiculo = new \DAL\VeiculoDAL();
$dados = $dalVeiculo->getCountByStatus();
?>

<div class="container">
    <div class="card-panel">
        <h4 class="center-align">Relatório de Veículos por Status</h4>
        <p class="center-align">Este relatório mostra a quantidade total de veículos agrupados por sua disponibilidade.</p>
        <table class="striped centered highlight">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Quantidade de Veículos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $linha) { ?>
                    <tr>
                        <td><?php echo ($linha['status'] == 'D') ? 'Disponível' : 'Indisponível (Em Locação)'; ?></td>
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