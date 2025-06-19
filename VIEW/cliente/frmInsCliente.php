<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php'; ?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Novo Cliente</h3>
                <form action="opInsCliente.php" method="POST" class="col s12" id="form-cliente">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nome" name="nome" type="text" class="validate" required>
                            <label for="nome">Nome Completo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="cpf" name="cpf" type="text" class="validate cpf" required>
                            <label for="cpf">CPF</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="telefone" name="telefone" type="text" class="validate" required>
                            <label for="telefone">Telefone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate" required>
                            <label for="email">Email</label>
                            <span class="helper-text" data-error="Email inválido" data-success="OK"></span>
                        </div>
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light green" type="submit">
                            Salvar <i class="material-icons right">save</i>
                        </button>
                        <button class="btn waves-effect waves-light red" type="reset">
                            Limpar <i class="material-icons right">clear_all</i>
                        </button>
                        <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstCliente.php'">
                            Voltar <i class="material-icons right">arrow_back</i>
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php';?>