<?php if (! empty($usuario) && is_array($usuario)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $usuario_item): ?>
                <tr>
                    <td><?= esc($usuario_item['id']) ?></td>
                    <td><?= esc($usuario_item['nome']) ?></td>
                    <td><?= esc($usuario_item['email']) ?></td>
                    <td><div>
                        <button>
                            <p><a href="/usuario/edicao/<?= esc($usuario_item['id'], 'url') ?>">editar</a></p>
                        </button>
                        <button>
                            <p><a href="/usuario/deletar/<?= esc($usuario_item['id'], 'url') ?>">deletar</a></p>
                        </button>
                    </div></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <h3>Sem usuários cadastrados</h3>
<?php endif ?>