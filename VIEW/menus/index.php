<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Locadora de Veículos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #f5f5f5;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="row" style="margin-top: 10vh;">
                <div class="col s12 m6 offset-m3">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Acesso ao Sistema</span>
                            <form action="opLogin.php" method="POST">
                                <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                    <input id="usuario" type="text" name="usuario" class="validate" required>
                                    <label for="usuario">Usuário</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="senha" type="password" name="senha" class="validate" required>
                                    <label for="senha">Senha</label>
                                </div>
                                <div class="center-align">
                                    <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
                                        Entrar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>

</html>