<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php';

$dalUsuario = new \DAL\UsuarioDAL();
$lstUsuarios = $dalUsuario->Select();
?>

<div class="container">
    <h3 class="center-align">Gerenciamento de Usuários</h3>
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Operações
                    <a class="btn-floating btn-small waves-effect waves-light green" onclick="JavaScript:location.href='frmInsUsuario.php'">
                        <i class="material-icons">add</i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lstUsuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario->getId(); ?></td>
                    <td><?php echo $usuario->getUsuario(); ?></td>
                    <td>
                        <a class="btn-floating btn-small waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtUsuario.php?id=<?php echo $usuario->getId(); ?>'">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="btn-floating btn-small waves-effect waves-light red" onclick="remover(<?php echo $usuario->getId(); ?>, '<?php echo $usuario->getUsuario(); ?>')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function remover(id, user) {
        if (confirm('Deseja realmente excluir o usuário ' + user + '?')) {
            
            let usuarioLogado = "<?php echo $_SESSION['login']; ?>";
            if (user === usuarioLogado) {
                alert("Você não pode excluir o seu próprio usuário.");
                return;
            }
            location.href = 'opRemUsuario.php?id=' + id;
        }
    }
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>