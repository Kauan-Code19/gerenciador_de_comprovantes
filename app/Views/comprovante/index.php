        <div class="container py-2 my-2">
            <div class="d-grid gap-2 mb-4 d-md-flex align-items-center justify-content-md-between">
                <a class="btn btn-light mt-1" href="/comprovante/cadastrar" role="button">Criar novo comprovante</a>
            </div>
            <?php if (!empty($Comprovante) && is_array($Comprovante)): ?>
                <div class="row row-cols-1 row-cols-md-2 g-4" id=listaComprovantes>
                    <?php foreach ($Comprovante as $comprovante): ?>
                        <div class="col-md-3 mb-3">
                            <div class="card comprovante-card">
                                <a href="/comprovante/upload/<?= esc($comprovante['id'])?>" class="btn  focus-ring focus-ring-secondary img-upload">download document</a>
                                <iframe src="<?= base_url('uploads/'.$comprovante['comprovante_img']) ?>" class="card-img-top" alt="<?= esc($comprovante['descricao']) ?>" frameborder="0"></iframe>
                                <div class="card-body">
                                    <h5 class="card-title">ID:<?= esc($comprovante['id']) ?></h5>
                                    <p class="card-text"><?= esc($comprovante['descricao']) ?></p>
                                    <p class="card-text"><?= esc(date("d-m-Y", strtotime($comprovante['data_pagamento']))) ?></p>
                                    <p class="card-text"><?= esc($comprovante['status']) ?></p>
                                </div>
                                <div class="card-footer  d-flex justify-content-between">
                                    <a href="comprovante/edicao/<?= esc($comprovante['id'], 'url') ?>"><i class="bi bi-pencil-square"></i></a>
                                    <a href="comprovante/deletar/<?= esc($comprovante['id'], 'url') ?>"><i class="bi bi-trash3-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php else: ?>
                <h3>Sem Comprovantes Cadastrados</h3>
            <?php endif ?>
        </div>