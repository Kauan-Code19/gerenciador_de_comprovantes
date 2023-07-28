<!-- <h2><?= esc($title) ?></h2> -->

<table class="table">
    <th>
        <td>nome</td>
        <td>email</td>
    </th>
<?php if (! empty($usuario) && is_array($usuario)): ?>

    <?php foreach ($usuario as $usuario_item): ?>
    <tr>
        <td><?= esc($usuario_item['nome']) ?></td>
        <td><?= esc($usuario_item['email']) ?></td>
        <!-- <p><a href="/usuario/<?= esc($usuario_item['id'], 'url') ?>">View article</a></p> -->
    </tr>
    <?php endforeach ?>

<?php else: ?>

    <h3>Sem usuários cadastrados</h3>
<?php endif ?>

</table>