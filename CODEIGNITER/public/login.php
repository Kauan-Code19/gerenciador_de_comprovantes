<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
</head>
<body>
    <div class="infoPage">
        <h6>Acesse aqui seus documentos</h6>
    </div>

    <h1>Faça seu login</h1>

    <div class="form">
        <form action="/auth/login" method="post">
            <div class="infoForm">
                <label for="Cpf/E-mail">CPF ou E-mail</label>
                <input type="text" name="Cpf/E-mail" id="Cpf/E-mail">
                <label for="Password">Senha</label>
                <input type="password" name="Password" id="Password">
            </div>
            <button class="butonForm">Confirmar</button>
        </form>
    </div>

    <h4>Se você não tem cadastro, <a href="#">clique aqui</a></h4>
</body>
</html>