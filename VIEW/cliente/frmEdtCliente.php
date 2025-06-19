<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/cliente.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$id = $_GET['id'];
$dalCliente = new \DAL\ClienteDAL();
$cliente = $dalCliente->SelectById($id);
?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Editar Cliente</h3>
            <div class="card-panel">
                <form action="opEdtCliente.php" method="POST" class="col s12" id="form-cliente">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="hidden" name="id" value="<?php echo $cliente->getId(); ?>">
                            <label for="id_display" class="active">ID: <?php echo $cliente->getId(); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nome" name="nome" type="text" class="validate" value="<?php echo $cliente->getNome(); ?>" required>
                            <label for="nome" class="active">Nome Completo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="cpf" name="cpf" type="text" class="validate cpf" value="<?php echo $cliente->getCpf(); ?>" required>
                            <label for="cpf" class="active">CPF</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="telefone" name="telefone" type="text" class="validate" value="<?php echo $cliente->getTelefone(); ?>" required>
                            <label for="telefone" class="active">Telefone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate" value="<?php echo $cliente->getEmail(); ?>" required>
                            <label for="email" class="active">Email</label>
                            <span class="helper-text" data-error="Email inválido" data-success="OK"></span>
                        </div>
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light green" type="submit">
                            Salvar <i class="material-icons right">save</i>
                        </button>
                        <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstCliente.php'">
                            Voltar <i class="material-icons right">arrow_back</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>