<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/locacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';

$id = $_GET['id'];

$dalLocacao = new \DAL\LocacaoDAL();
$locacao = $dalLocacao->SelectById($id);

$dalVeiculo = new \DAL\VeiculoDAL();
$veiculo = $dalVeiculo->SelectById($locacao->getVeiculoId());

$dataInicio = $locacao->getDataLocacao();
?>

<div class="container">
    <h3 class="center-align">Confirmar Devolução</h3>
    <div class="card-panel">
        <h5>Dados da Locação</h5>
        <div class="row">
            <div class="col s6"><strong>Cliente:</strong> <?php echo $locacao->getNomeCliente(); ?></div>
            <div class="col s6"><strong>Veículo:</strong> <?php echo $veiculo->getModelo(); ?></div>
            <div class="col s6"><strong>Data de Início:</strong> <?php echo $dataInicio->format('d/m/Y'); ?></div>
            <div class="col s6"><strong>Valor da Diária:</strong> R$ <?php echo number_format($veiculo->getValorDiaria(), 2, ',', '.'); ?></div>
        </div>
        <div class="divider"></div>

        <form action="opDevolucao.php" method="POST" id="form-devolucao" class="col s12" style="margin-top: 20px;">
            <input type="hidden" name="locacao_id" value="<?php echo $locacao->getId(); ?>">
            <input type="hidden" id="valor_diaria" value="<?php echo $veiculo->getValorDiaria(); ?>">
            <input type="hidden" id="data_inicio_locacao" value="<?php echo $dataInicio->format('Y-m-d'); ?>">
            <input type="hidden" id="valor_final" name="valor_final" value="0">

            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" class="datepicker" id="data_devolucao" name="data_devolucao" required>
                    <label for="data_devolucao">Confirmar Data de Devolução</label>
                </div>
                <div class="col s12 m6" style="padding-top: 25px;">
                     <h5 class="center-align">Valor Final Recalculado: <strong id="valor-final-display" class="red-text">R$ 0,00</strong></h5>
                </div>
            </div>

            <div class="center-align">
                <button class="btn waves-effect waves-light green" type="submit">Confirmar Devolução</button>
                <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstLocacao.php'">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
   
    var datepicker = document.getElementById('data_devolucao');
    M.Datepicker.init(datepicker, {
        format: 'yyyy-mm-dd',
        autoClose: true,
        defaultDate: new Date(),
        setDefaultDate: true
    });

    const dataDevolucaoInput = document.getElementById('data_devolucao');
    const valorDiaria = parseFloat(document.getElementById('valor_diaria').value);
    const dataInicioStr = document.getElementById('data_inicio_locacao').value;
    const dataInicio = new Date(dataInicioStr + 'T00:00:00');
    
    const valorFinalDisplay = document.getElementById('valor-final-display');
    const valorFinalHidden = document.getElementById('valor_final');

    function recalcularTotal() {
        const dataFim = M.Datepicker.getInstance(dataDevolucaoInput).date;

        if (valorDiaria > 0 && dataFim && dataFim >= dataInicio) {
            const diffTime = Math.abs(dataFim - dataInicio);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            const dias = diffDays === 0 ? 1 : diffDays;

            const total = dias * valorDiaria;
            
            valorFinalDisplay.textContent = 'R$ ' + total.toFixed(2).replace('.', ',');
            valorFinalHidden.value = total.toFixed(2);
        } else {
            valorFinalDisplay.textContent = 'Data Inválida';
            valorFinalHidden.value = 0;
        }
    }

    dataDevolucaoInput.addEventListener('change', recalcularTotal);
    recalcularTotal();
});
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>