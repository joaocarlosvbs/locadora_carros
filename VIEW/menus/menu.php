<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: /locadora_carros/VIEW/menus/index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora de Veículos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <nav class="light-blue darken-4" style="height: 200px; line-height: 80px;">
        <div class="nav-wrapper container">

            <a href="/locadora_carros/VIEW/menus/home.php" class="brand-logo">
                <img src="/locadora_carros/VIEW/imagens/teto.GIF" style="height: 200px; vertical-align: middle; margin-right: 10px;">
                <span style="vertical-align: middle;">LoCCar</span>
            </a>

            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            
            <ul class="right hide-on-med-and-down">
                <li><a href="/locadora_carros/VIEW/menus/home.php" style="font-size: 1.2em;">🏠</a></li>
                <li><a href="/locadora_carros/VIEW/cliente/lstCliente.php" style="font-size: 1.5em;">Clientes</a></li>
                <li><a href="/locadora_carros/VIEW/veiculo/lstVeiculo.php" style="font-size: 1.5em;">Veículos</a></li>
                <li><a href="/locadora_carros/VIEW/locacao/lstLocacao.php" style="font-size: 1.5em;">Locações</a></li>
                <li><a href="/locadora_carros/VIEW/usuarios/lstUsuario.php" style="font-size: 1.5em;">Usuários</a></li>
                <li><a href="/locadora_carros/VIEW/relatorios/menu_relatorios.php" style="font-size: 1.5em;">Relatórios</a></li>
                <li><a href="/locadora_carros/VIEW/menus/logout.php" style="font-size: 1.5em;">Logout</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="/locadora_carros/VIEW/menus/home.php">🏠</a></li>
        <li><a href="/locadora_carros/VIEW/cliente/lstCliente.php">Clientes</a></li>
        <li><a href="/locadora_carros/VIEW/veiculo/lstVeiculo.php">Veículos</a></li>
        <li><a href="/locadora_carros/VIEW/locacao/lstLocacao.php">Locações</a></li>
        <li><a href="/locadora_carros/VIEW/usuarios/lstUsuario.php">Usuários</a></li>
        <li><a href="/locadora_carros/VIEW/relatorios/menu_relatorios.php">Relatórios</a></li>
        <li><a href="/locadora_carros/VIEW/menus/logout.php">Logout</a></li>
    </ul>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('select').formSelect();
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                autoClose: true
            });
        });
    </script>
</body>
</html>