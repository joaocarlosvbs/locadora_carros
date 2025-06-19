<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$termoBusca = isset($_GET['busca']) ? $_GET['busca'] : '';
$dalVeiculo = new \DAL\VeiculoDAL();
$lstVeiculos = $dalVeiculo->Select($termoBusca);
?>

<div class="container">
    <h3 class="center-align">Listagem de Veículos</h3>

    <div class="row">
        <div class="col s12">
            <form action="lstVeiculo.php" method="GET">
                <div class="input-field">
                    <input id="busca" type="text" name="busca" value="<?php echo $termoBusca; ?>">
                    <label for="busca">Buscar por Modelo ou Marca</label>
                    <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Placa</th>
                <th>Valor Diária</th>
                <th>Status</th>
                <th>Operações
                    <a class="btn-floating btn-small waves-effect waves-light green" onclick="JavaScript:location.href='frmInsVeiculo.php'">
                        <i class="material-icons">add</i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lstVeiculos as $veiculo) { ?>
                <tr>
                    <td>
                        <?php if ($veiculo->getImagem()) { ?>
                            <img src="../imagens/<?php echo $veiculo->getImagem(); ?>" alt="Foto do Veículo" width="100">
                        <?php } else { ?>
                            Sem Foto
                        <?php } ?>
                    </td>
                    <td><?php echo $veiculo->getModelo(); ?></td>
                    <td><?php echo $veiculo->getMarca(); ?></td>
                    <td><?php echo $veiculo->getAno(); ?></td>
                    <td><?php echo $veiculo->getPlaca(); ?></td>
                    <td>R$ <?php echo number_format($veiculo->getValorDiaria(), 2, ',', '.'); ?></td>
                    <td><?php echo ($veiculo->getStatus() == 'D') ? 'Disponível' : 'Indisponível'; ?></td>
                    <td>
                        <a class="btn-floating btn-small waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtVeiculo.php?id=<?php echo $veiculo->getId(); ?>'">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="btn-floating btn-small waves-effect waves-light blue" onclick="JavaScript:location.href='frmDetVeiculo.php?id=<?php echo $veiculo->getId(); ?>'">
                            <i class="material-icons">details</i>
                        </a>
                        <a class="btn-floating btn-small waves-effect waves-light red" onclick="remover(<?php echo $veiculo->getId(); ?>)">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function remover(id) {
        if (confirm('Deseja realmente excluir este veículo?')) {
            location.href = 'opRemVeiculo.php?id=' + id;
        }
    }
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>