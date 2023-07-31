        <div class="text-center mainLogin">

            <form action="logar" method="post" class="login-form">
                <?= csrf_field() ?>
                <div class="log">
                    <input type="email" name="email" id="E-mail" placeholder="Email" class="btn-aplicacao" value="<?= set_value('email') ?>">
                </div>
                <div class="password">
                    <input type="password" name="senha" id="Password" placeholder="Senha" class="btn-aplicacao" value="<?= set_value('senha') ?>">
                </div>

                <h4>Se você não tem cadastro, <a href="/usuario/cadastro">Clique Aqui</a></h4>
                <button type="submit" class="btn-aplicacao">Confirmar</button>
            </form>

        </div>