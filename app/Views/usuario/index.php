<h2><?= esc($title) ?></h2>

<?php if (! empty($usuario) && is_array($usuario)): ?>

    <?php foreach ($usuario as $usuario_item): ?>

        <h3><?= esc($usuario_item['nome']) ?></h3>

        <div class="main">
            <?= esc($usuario_item['email']) ?>
        </div>
        <p><a href="/usuario/<?= esc($usuario_item['id'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>