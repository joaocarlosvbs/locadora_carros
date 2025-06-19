<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php'; ?>

<div class="container">
    <h3 class="center-align">Novo Usuário</h3>
    <div class="card-panel">
        <form action="opInsUsuario.php" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="usuario" name="usuario" type="text" class="validate" required>
                    <label for="usuario">Nome de Usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="senha" name="senha" type="password" class="validate" required>
                    <label for="senha">Senha</label>
                </div>
            </div>
            <div class="center-align">
                <button class="btn waves-effect waves-light green" type="submit">Salvar</button>
                <button class="btn waves-effect waves-light blue" type="button" onclick="JavaScript:location.href='lstUsuario.php'">Voltar</button>
            </div>
        </form>
    </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>