<div class="container py-2 my-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if (! empty($usuario) && is_array($usuario)): ?>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr class="text-center th">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuario as $usuario_item): ?>
                                <tr class="text-center tb">
                                    <td>
                                        <div class="divCenter"><?= esc($usuario_item['id']) ?></div>
                                    </td>
                                    <td>
                                        <div class="divCenter"><?= esc($usuario_item['nome']) ?></div>
                                    </td>
                                    <td>
                                        <div  class="divCenter"><?= esc($usuario_item['email']) ?></div>
                                    </td>
                                    <td><div class="button">
                                        <div class="btn btn-primary btn-aplicacao">
                                            <p><a class="text-decoration-none text-white" href="/usuario/edicao/<?= esc($usuario_item['id'], 'url') ?>">editar</a></p>
                                        </div>
                                        <button>
                                            <p><a href="/usuario/deletar/<?= esc($usuario_item['id'], 'url') ?>" class="link-danger">deletar</a></p>
                                        </button>
                                    </div></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <h3>Sem usuários cadastrados</h3>
            <?php endif ?>
        </div>
    </div>
</div>