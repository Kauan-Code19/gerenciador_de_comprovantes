        <div class="container py-2 my-2">
            <div class="row justify-content-center">
                <div class="card col-md-8">
                    <div class="card-body card-color">
                        <?= validation_list_errors() ?>
                            <form action="/comprovante/atualizar" method="post" class="divFormComprovante" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?php echo $comprovante['id']; ?>">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="descricao">Descrição:</label>
                                        <input type="text" class="form-control btn-upload" id="descricao" name="descricao" value="<?php echo $comprovante['descricao']; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numero">Número:</label>
                                        <input type="text" class="form-control btn-upload" id="numero" name="numero" value="<?php echo $comprovante['numero']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="valor">Valor:</label>
                                        <input type="number" class="form-control btn-upload" id="valor" name="valor" step="0.01" value="<?php echo $comprovante['valor']; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dataPagamento">Data de Pagamento:</label>
                                        <input type="date" class="form-control btn-upload" id="dataPagamento" name="data_pagamento" value="<?php echo $comprovante['data_pagamento']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="dataVencimento">Data de Vencimento:</label>
                                        <input type="date" class="form-control btn-upload" id="dataVencimento" name="data_Vencimento" value="<?php echo $comprovante['data_vencimento']; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="metodo">Método de Pagamento:</label>
                                        <select class="form-control btn-upload" id="metodo" name="metodo" value="<?php echo $comprovante['metodo']; ?>" required>
                                            <option value="pix">PIX</option>
                                            <option value="boleto">Boleto</option>
                                            <option value="cartao">Cartão</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="comprovante">Upload do Comprovante:</label>
                                        <input type="file" class="form-control-file btn-upload" id="comprovante" name="comprovante" value="comprovante" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-aplicacao" value="Atualizar">Atualizar</button>
                                    </div>
                                </div>
                            </form>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            </div>
        </div>