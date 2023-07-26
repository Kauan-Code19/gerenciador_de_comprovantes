<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="infoPage">
        <h6>Acesse aqui seus documentos</h6>
    </div>

    <div class="main">
        <h1>Faça seu login.</h1>

            <form action="/auth/login" method="post" class="login-form">
                <div class="log">
                    <label for="Cpf/E-mail">CPF ou E-mail:</label>
                    <input type="text" name="Cpf/E-mail" id="Cpf/E-mail">
                </div>
                <div class="password">
                    <label for="Password">SENHA:</label>
                    <input type="password" name="Password" id="Password">
                </div>

                <h4>SE VOCÊ NÃO TEM CADASTRO, <a href="#">CLIQUE AQUI</a></h4>
            </form>

            <button class="butonForm">Confirmar</button>
    </div>
</body>
</html>