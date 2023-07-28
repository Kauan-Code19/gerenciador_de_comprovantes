<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/usuario/cadastro" method="post">
    <?= csrf_field() ?>

    <label for="nome">Nome</label>
    <input type="input" name="nome" value="<?= set_value('nome') ?>">
    <br>

    <label for="email">email</label>
    <input name="email"><?= set_value('email') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>
