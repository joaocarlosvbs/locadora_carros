<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LoCCar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #e3f2fd; /* Um azul bem claro para o fundo */
        }
        main {
            flex: 1 0 auto;
        }
        .login-card {
            padding: 20px;
            margin-top: 5vh;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    
                    <div class="center-align" style="padding-top: 40px; padding-bottom: 20px;">
                        <img src="/locadora_carros/VIEW/imagens/teto.GIF" style="height: 80px; vertical-align: middle; margin-right: 15px;">
                        <span style="font-size: 3rem; font-weight: 500; vertical-align: middle; color: #0D47A1;">LoCCar</span>
                    </div>

                    <div class="card login-card">
                        <div class="card-content">
                            <span class="card-title center-align">Acesso ao Sistema de Locação de Veículos</span>
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
                                <div class="center-align" style="margin-top: 20px;">
                                    <button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="width: 100%;">
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
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/VIEW/menus/footer.php'; ?>
</body>
</html>