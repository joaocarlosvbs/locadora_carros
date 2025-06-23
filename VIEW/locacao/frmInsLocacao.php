<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/cliente.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$dalCliente = new \DAL\ClienteDAL();
$lstClientes = $dalCliente->Select();

$dalVeiculo = new \DAL\VeiculoDAL();
$lstVeiculos = $dalVeiculo->SelectByStatus('D');
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
                    <select id="veiculo" name="veiculo_id" required>
                        <option value="" data-valor="0" disabled selected>Escolha o Veículo</option>
                        <?php foreach ($lstVeiculos as $veiculo) { ?>
                            <option value="<?php echo $veiculo->getId(); ?>" data-valor="<?php echo $veiculo->getValorDiaria(); ?>">
                                <?php echo $veiculo->getModelo() . ' - R$ ' . number_format($veiculo->getValorDiaria(), 2, ',', '.'); ?>/dia
                            </option>
                        <?php } ?>
                    </select>
                    <label>Veículo Disponível</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" class="datepicker" id="data_locacao" name="data_locacao" required>
                    <label>Data da Locação</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" class="datepicker" id="data_prev_devolucao" name="data_prev_devolucao" required>
                    <label>Data Prevista de Devolução</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="nivel_tanque">
                        <option value="Cheio" selected>Cheio</option>
                        <option value="Meio Tanque">Meio Tanque</option>
                        <option value="Vazio">Vazio (10KM)</option>
                    </select>
                    <label>Nível do Tanque (Saída)</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="number" step="0.01" id="valor_pago" name="valor_pago" value="0.00">
                    <label>Valor Pago Antecipadamente (R$)</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="center-align">Valor Total Estimado: <strong id="valor-total-display">R$ 0,00</strong></h5>
                    <input type="hidden" id="valor_total" name="valor_total" value="0">
                </div>
            </div>

            <div class="center-align">
                <button class="btn waves-effect waves-light green" type="submit">Registrar</button>
                <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstLocacao.php'">Voltar</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona os elementos do formulário
    const veiculoSelect = document.getElementById('veiculo');
    const dataLocacaoInput = document.getElementById('data_locacao');
    const dataDevolucaoInput = document.getElementById('data_prev_devolucao');
    const valorTotalDisplay = document.getElementById('valor-total-display');
    const valorTotalHidden = document.getElementById('valor_total');

    function calcularTotal() {
        const valorDiaria = parseFloat(veiculoSelect.options[veiculoSelect.selectedIndex].getAttribute('data-valor'));
        
        const dataInicio = M.Datepicker.getInstance(dataLocacaoInput).date;
        const dataFim = M.Datepicker.getInstance(dataDevolucaoInput).date;

        if (valorDiaria > 0 && dataInicio && dataFim && dataFim >= dataInicio) {

            const diffTime = Math.abs(dataFim - dataInicio);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            const dias = diffDays === 0 ? 1 : diffDays; // Mínimo de 1 dia de locação

            const total = dias * valorDiaria;
            
            valorTotalDisplay.textContent = 'R$ ' + total.toFixed(2).replace('.', ',');
            valorTotalHidden.value = total.toFixed(2);
        } else {
            valorTotalDisplay.textContent = 'R$ 0,00';
            valorTotalHidden.value = 0;
        }
    }

    veiculoSelect.addEventListener('change', calcularTotal);
    dataLocacaoInput.addEventListener('change', calcularTotal);
    dataDevolucaoInput.addEventListener('change', calcularTotal);
});
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>