        <div class="row justify-content-center align-items-center rowFormCadastro">
            <div class="card">
                <div class="card-body">
                    <?= validation_list_errors() ?>
                
                        <form action="/usuario/salvar" method="post" class="divFormCadastro">
                            <?= csrf_field() ?>

                            <div class="form-group text-left">
                                <label for="nome" class="label">Nome:</label>
                                <input class="form-control" type="input" name="nome" value="<?= set_value('nome') ?>">
                            </div>
                            <br>
                    
                            <div class="form-group text-left">
                                <label for="email" class="label">Email:</label>
                                <input class="form-control" type="input" name="email"><?= set_value('email') ?></textarea>
                            </div>
                            <br>

                            <div class="form-group text-center">
                                <input type="submit"  class="btn btn-primary" name="submit" value="Create news item">
                            </div>
                        </form>

                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        </div>
<!-- <form action="/usuario/salvar" method="post">
    <?= csrf_field() ?>

    <label for="nome">Nome</label>
    <input type="input" name="nome" value="<?= set_value('nome') ?>">
    <br>

    <label for="email">email</label>
    <input name="email"><?= set_value('email') ?></input>
    <br>

    <input type="submit" name="submit" value="Create news item">
</form> -->