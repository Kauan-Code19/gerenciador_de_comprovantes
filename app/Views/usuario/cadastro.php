        <div class="row justify-content-center align-items-center rowFormCadastro">
            <div class="card">
                <div class="card-body">
                    <?= validation_list_errors() ?>
                
                        <form action="/usuario/salvar" method="post" class="divFormCadastro">
                            <?= csrf_field() ?>

                            <div class="form-group text-left">
                                <label for="nome" class="label">Nome:</label>
                                <input class="form-control btn-aplicacao" type="text" name="nome" value="<?= set_value('nome') ?>">
                            </div>
                    
                            <div class="form-group text-left">
                                <label for="email" class="label">Email:</label>
                                <input class="form-control btn-aplicacao" type="email" name="email"><?= set_value('email') ?></textarea>
                            </div>

                            <div class="form-group text-left">
                                <label for="password" class="label">Senha:</label>
                                <input class="form-control btn-aplicacao" type="password" name="password"><?= set_value('senha') ?>
                            </div>

                            <div class="form-group text-left">
                                <label for="confirmpassword" class="label">Confirme sua senha:</label>
                                <input class="form-control btn-aplicacao" type="password" name="confirmpassword"><?= set_value('senha') ?>
                            </div>

                            <div class="form-group text-left">
                                <input type="submit"  class="btn btn-aplicacao" name="submit" value="Create news item">
                            </div>
                        </form>

                    <?= session()->getFlashdata('error') ?>
                </div> 
            </div>
        </div>