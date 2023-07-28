<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/usuario/atualizar" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

    <label for="nome">Nome</label>
    <input type="input" name="nome" value="<?php echo $usuario['nome']; ?>">
    <br>

    <label for="email">email</label>
    <input type="input" name="email" value="<?php echo $usuario['email']; ?>">
    <br>

    <input type="submit" name="submit" value="Atualizar">
</form>
