        <div class="container py-2 my-2">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php if (! empty($usuario) && is_array($usuario)): ?>
                        <div class="table-container justify-content-center">
                            <table class="table">
                                <thead>
                                    <tr class="text-center thIndex">
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
                                            <td>
                                                <a href="/usuario/edicao/<?= esc($usuario_item['id'], 'url') ?>"><i class="bi bi-pencil-square"></i></a>
                                                <a href="/usuario/deletar/<?= esc($usuario_item['id'], 'url') ?>"><i class="bi bi-trash3-fill"></i></a>
                                            </td>
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