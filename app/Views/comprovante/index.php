        <div class="container py-2 my-2">
            <div class="d-grid gap-2 mb-4 d-md-flex align-items-center justify-content-md-between">
                <a class="btn btn-light mt-1" href="#" role="button">Criar novo comprovante</a>
                <div class="dropdown">
                    <button class="btn btn-light mt-1 dropdown-toggle" type="button" id="filtroDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filtrar
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filtroDropdown">
                        <li><a class="dropdown-item filtro-item" data-status="todos" href="#">Todos</a></li>
                        <li><a class="dropdown-item filtro-item" data-status="vencido" href="#">Vencidos</a></li>
                        <li><a class="dropdown-item filtro-item" data-status="nao-vencido" href="#">Não Vencidos</a></li>
                    </ul>
                </div>
            </div>
            <?php if (!empty($Comprovante) && is_array($Comprovante)): ?>
                <div class="row row-cols-1 row-cols-md-2 g-4" id=listaComprovantes>
                    <?php foreach ($Comprovante as $Comprovante_item): ?>
                        <div class="col-md-3 mb-3 filtered-card" data-status="<?= esc($Comprovante_item->status) ?>">
                            <div class="card comprovante-card" data-status="<?= esc($Comprovante_item->status) ?>">
                                <img src="<?= base_url('assets/img/BoletoBancario.png') ?>" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">ID:<?= esc($Comprovante_item->id) ?></h5>
                                    <p class="card-text"><?= esc($Comprovante_item->descricao) ?></p>
                                </div>
                                <div class="card-footer  d-flex justify-content-between">
                                    <a href="/Comprovante/edicao/<?= esc($Comprovante_item->id, 'url') ?>"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/Comprovante/deletar/<?= esc($Comprovante_item->id, 'url') ?>"><i class="bi bi-trash3-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php else: ?>
                <h3>Sem Comprovantes Cadastrados</h3>
            <?php endif ?>
        </div>