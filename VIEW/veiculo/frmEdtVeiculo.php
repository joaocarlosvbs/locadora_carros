<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/veiculo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$id = $_GET['id'];
$dalVeiculo = new \DAL\VeiculoDAL();
$veiculo = $dalVeiculo->SelectById($id);
?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Editar Veículo</h3>
                <form action="opEdtVeiculo.php" method="POST" enctype="multipart/form-data" class="col s12">
                    
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="modelo" name="modelo" type="text" class="validate" value="<?php echo $veiculo->getModelo(); ?>" required>
                            <label for="modelo" class="active">Modelo</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="marca" name="marca" type="text" class="validate" value="<?php echo $veiculo->getMarca(); ?>" required>
                            <label for="marca" class="active">Marca</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="ano" name="ano" type="number" class="validate" value="<?php echo $veiculo->getAno(); ?>" required>
                            <label for="ano" class="active">Ano</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="placa" name="placa" type="text" class="validate" value="<?php echo $veiculo->getPlaca(); ?>" required>
                            <label for="placa" class="active">Placa</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="valor_diaria" name="valor_diaria" type="number" step="0.01" class="validate" value="<?php echo $veiculo->getValorDiaria(); ?>" required>
                            <label for="valor_diaria" class="active">Valor da Diária (R$)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="status" required>
                                <option value="D" <?php echo ($veiculo->getStatus() == 'D') ? 'selected' : ''; ?>>Disponível</option>
                                <option value="I" <?php echo ($veiculo->getStatus() == 'I') ? 'selected' : ''; ?>>Indisponível</option>
                            </select>
                            <label>Status</label>
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn light-blue darken-4">
                                <span>Alterar Imagem</span>
                                <input type="file" name="imagem">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Selecione nova imagem (opcional)">
                            </div>
                        </div>
                    </div>
                     <?php if ($veiculo->getImagem()) { ?>
                        <div class="row">
                             <div class="col s12 center-align">
                                <p>Imagem Atual:</p>
                                <img src="../imagens/<?php echo $veiculo->getImagem(); ?>" alt="Imagem Atual" class="responsive-img" width="200">
                             </div>
                        </div>
                    <?php } ?>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light green" type="submit">
                            Salvar <i class="material-icons right">save</i>
                        </button>
                        <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstVeiculo.php'">
                            Voltar <i class="material-icons right">arrow_back</i>
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div>