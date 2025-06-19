<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/cliente.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$dalCliente = new \DAL\ClienteDAL();
$lstClientes = $dalCliente->Select();
?>

<div class="container">
    <h3 class="center-align">Listagem de Clientes</h3>
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Operações
                    <a class="btn-floating btn-small waves-effect waves-light green" onclick="JavaScript:location.href='frmInsCliente.php'">
                        <i class="material-icons">add</i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lstClientes as $cliente) { ?>
                <tr>
                    <td><?php echo $cliente->getId(); ?></td>
                    <td><?php echo $cliente->getNome(); ?></td>
                    <td><?php echo $cliente->getCpf(); ?></td>
                    <td><?php echo $cliente->getTelefone(); ?></td>
                    <td><?php echo $cliente->getEmail(); ?></td>
                    <td>
                        <a class="btn-floating btn-small waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtCliente.php?id=<?php echo $cliente->getId(); ?>'">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="btn-floating btn-small waves-effect waves-light blue" onclick="JavaScript:location.href='frmDetCliente.php?id=<?php echo $cliente->getId(); ?>'">
                            <i class="material-icons">details</i>
                        </a>
                        <a class="btn-floating btn-small waves-effect waves-light red" onclick="remover(<?php echo $cliente->getId(); ?>)">
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
        if (confirm('Deseja realmente excluir este cliente?')) {
            location.href = 'opRemCliente.php?id=' + id;
        }
    }
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>