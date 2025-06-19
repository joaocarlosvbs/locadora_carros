<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$id = $_GET['id'];
$dalVeiculo = new \DAL\VeiculoDAL();
$veiculo = $dalVeiculo->SelectById($id);
?>

<div class="container">
    <h3 class="center-align">Detalhes do Veículo</h3>
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m6">
                <h5><strong>ID:</strong> <?php echo $veiculo->getId(); ?></h5>
                <h5><strong>Modelo:</strong> <?php echo $veiculo->getModelo(); ?></h5>
                <h5><strong>Marca:</strong> <?php echo $veiculo->getMarca(); ?></h5>
                <h5><strong>Ano:</strong> <?php echo $veiculo->getAno(); ?></h5>
                <h5><strong>Placa:</strong> <?php echo $veiculo->getPlaca(); ?></h5>
                <h5><strong>Valor da Diária:</strong> R$ <?php echo number_format($veiculo->getValorDiaria(), 2, ',', '.'); ?></h5>
                <h5><strong>Status:</strong> <?php echo ($veiculo->getStatus() == 'D') ? 'Disponível' : 'Indisponível'; ?></h5>
            </div>
            <div class="col s12 m6 center-align">
                <?php if ($veiculo->getImagem()) { ?>
                    <img src="../imagens/<?php echo $veiculo->getImagem(); ?>" alt="Foto do Veículo" class="responsive-img" style="max-height: 250px;">
                <?php } else { ?>
                    <p>Veículo sem imagem.</p>
                <?php } ?>
            </div>
        </div>

        <div class="center-align" style="margin-top: 20px;">
            <button class="btn waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtVeiculo.php?id=<?php echo $veiculo->getId(); ?>'">
                Editar <i class="material-icons right">edit</i>
            </button>
            <button class="btn waves-effect waves-light red" onclick="remover(<?php echo $veiculo->getId(); ?>)">
                Remover <i class="material-icons right">delete</i>
            </button>
            <button class="btn waves-effect waves-light blue" onclick="JavaScript:location.href='lstVeiculo.php'">
                Voltar <i class="material-icons right">arrow_back</i>
            </button>
        </div>
    </div>
</div>

<script>
    function remover(id) {
        if (confirm('Deseja realmente excluir este veículo?')) {
            location.href = 'opRemVeiculo.php?id=' + id;
        }
    }
</script>