<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/cliente.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$id = $_GET['id'];
$dalCliente = new \DAL\ClienteDAL();
$cliente = $dalCliente->SelectById($id);
?>

<div class="container">
    <h3 class="center-align">Detalhes do Cliente</h3>
    <div class="card-panel">
        <h5><strong>ID:</strong> <?php echo $cliente->getId(); ?></h5>
        <h5><strong>Nome:</strong> <?php echo $cliente->getNome(); ?></h5>
        <h5><strong>CPF:</strong> <?php echo $cliente->getCpf(); ?></h5>
        <h5><strong>Telefone:</strong> <?php echo $cliente->getTelefone(); ?></h5>
        <h5><strong>Email:</strong> <?php echo $cliente->getEmail(); ?></h5>

        <div class="center-align" style="margin-top: 20px;">
            <button class="btn waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtCliente.php?id=<?php echo $cliente->getId(); ?>'">
                Editar <i class="material-icons right">edit</i>
            </button>
            <button class="btn waves-effect waves-light red" onclick="remover(<?php echo $cliente->getId(); ?>)">
                Remover <i class="material-icons right">delete</i>
            </button>
            <button class="btn waves-effect waves-light blue" onclick="JavaScript:location.href='lstCliente.php'">
                Voltar <i class="material-icons right">arrow_back</i>
            </button>
        </div>
    </div>
</div>

<script>
    function remover(id) {
        if (confirm('Deseja realmente excluir este cliente?')) {
            location.href = 'opRemCliente.php?id=' + id;
        }
    }
</script>