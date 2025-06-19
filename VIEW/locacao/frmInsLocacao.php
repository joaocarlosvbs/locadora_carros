<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/cliente.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$dalCliente = new \DAL\ClienteDAL();
$lstClientes = $dalCliente->Select();

$dalVeiculo = new \DAL\VeiculoDAL();
$lstVeiculos = $dalVeiculo->SelectByStatus('D'); // Apenas veículos disponíveis
?>

<div class="container">
    <h3 class="center-align">Nova Locação</h3>
    <div class="card-panel">
        <form action="opInsLocacao.php" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="cliente_id" required>
                        <option value="" disabled selected>Escolha o Cliente</option>
                        <?php foreach ($lstClientes as $cliente) { ?>
                            <option value="<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNome(); ?></option>
                        <?php } ?>
                    </select>
                    <label>Cliente</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="veiculo_id" required>
                        <option value="" disabled selected>Escolha o Veículo</option>
                        <?php foreach ($lstVeiculos as $veiculo) { ?>
                            <option value="<?php echo $veiculo->getId(); ?>">
                                <?php echo $veiculo->getModelo() . ' - ' . $veiculo->getMarca() . ' (' . $veiculo->getPlaca() . ')'; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label>Veículo Disponível</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="datepicker" name="data_locacao" required>
                    <label>Data da Locação</label>
                </div>
            </div>
            <div class="center-align">
                <button class="btn waves-effect waves-light green" type="submit">
                    Registrar <i class="material-icons right">save</i>
                </button>
                 <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstLocacao.php'">
                    Voltar <i class="material-icons right">arrow_back</i>
                </button>
            </div>
        </form>
    </div>
</div>