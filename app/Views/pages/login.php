<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style/style.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="infoPage">
        <h6>Acesse aqui seus documentos</h6>
    </div>

    <div class="main">
        <h1>Faça seu login.</h1>

            <form action="logar" method="post" class="login-form">
                <?= csrf_field() ?>
                <div class="log">
                    <label for="email">CPF ou E-mail:</label>
                    <input type="text" name="email" id="Cpf/E-mail" value="<?= set_value('email') ?>">
                </div>
                <div class="password">
                    <label for="Password">SENHA:</label>
                    <input type="password" name="senha" id="Password" value="<?= set_value('senha') ?>">
                </div>

                <h4>SE VOCÊ NÃO TEM CADASTRO, <a href="#">CLIQUE AQUI</a></h4>
                <button type="submit" class="butonForm">Confirmar</button>
            </form>

    </div>
</body>
</html>