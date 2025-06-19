<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php'; ?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Novo Veículo</h3>
                <form action="opInsVeiculo.php" method="POST" enctype="multipart/form-data" class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="modelo" name="modelo" type="text" class="validate" required>
                            <label for="modelo">Modelo</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="marca" name="marca" type="text" class="validate" required>
                            <label for="marca">Marca</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="ano" name="ano" type="number" class="validate" required>
                            <label for="ano">Ano</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="placa" name="placa" type="text" class="validate" required>
                            <label for="placa">Placa</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="valor_diaria" name="valor_diaria" type="number" step="0.01" class="validate" required>
                            <label for="valor_diaria">Valor da Diária (R$)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="status" required>
                                <option value="" disabled selected>Escolha o status</option>
                                <option value="D">Disponível</option>
                                <option value="I">Indisponível</option>
                            </select>
                            <label>Status</label>
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn light-blue darken-4">
                                <span>Imagem</span>
                                <input type="file" name="imagem">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light green" type="submit">
                            Salvar <i class="material-icons right">save</i>
                        </button>
                        <button class="btn waves-effect waves-light red" type="reset">
                            Limpar <i class="material-icons right">clear_all</i>
                        </button>
                        <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstVeiculo.php'">
                            Voltar <i class="material-icons right">arrow_back</i>
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div>