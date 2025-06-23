<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/menu.php'; ?>

<div class="container">
    <h3 class="center-align">Bem-vindo ao Sistema de Locação de Veículos</h3>
    <div class="row center-align" style="margin-top: 50px;">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <i class="material-icons large light-blue-text text-darken-4">people</i>
                    <p>Gerenciamento de clientes.</p>
                </div>
                <div class="card-action">
                    <a href="/locadora_carros/VIEW/cliente/lstCliente.php">Ir para Clientes</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <i class="material-icons large light-blue-text text-darken-4">directions_car</i>
                    <p>Cadastro e administração da frota de veículos.</p>
                </div>
                <div class="card-action">
                    <a href="/locadora_carros/VIEW/veiculo/lstVeiculo.php">Ir para Veículos</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <i class="material-icons large light-blue-text text-darken-4">assignment</i>
                    <p>Controle das locações de veículos.</p>
                </div>
                <div class="card-action">
                    <a href="/locadora_carros/VIEW/locacao/lstLocacao.php">Ir para Locações</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>