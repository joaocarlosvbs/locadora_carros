<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$id = $_GET['id'];
$dalUsuario = new \DAL\UsuarioDAL();
$usuario = $dalUsuario->SelectById($id);
?>

<div class="container">
    <h3 class="center-align">Editar Usuário</h3>
    <div class="card-panel">
        <form action="opEdtUsuario.php" method="POST" class="col s12">
            <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
            <div class="row">
                <div class="input-field col s12">
                    <input id="usuario" name="usuario" type="text" value="<?php echo $usuario->getUsuario(); ?>" class="validate" required>
                    <label for="usuario" class="active">Nome de Usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="senha" name="senha" type="password" class="validate">
                    <label for="senha">Nova Senha</label>
                    <span class="helper-text">Deixe em branco para não alterar</span>
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