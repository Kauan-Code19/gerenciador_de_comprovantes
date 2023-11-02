        <div class="container py-2 my-2">
            <div class="row justify-content-center">
                <div class="card col-md-8">
                    <div class="card-body card-color">
                        <?= validation_list_errors() ?>
                            <form action="/comprovante/salvar" method="post" class="divFormComprovante" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="descricao">Descrição:</label>
                                        <input type="text" class="form-control btn-upload" id="descricao" name="descricao" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numero">Número:</label>
                                        <input type="text" class="form-control btn-upload" id="numero" name="numero" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="valor">Valor:</label>
                                        <input type="number" class="form-control btn-upload" id="valor" name="valor" step="0.01" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="data_pagamento">Data de Pagamento:</label>
                                        <input type="date" class="form-control btn-upload" id="data_pagamento" name="data_pagamento">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="data_vencimento">Data de Vencimento:</label>
                                        <input type="date" class="form-control btn-upload" id="data_vencimento" name="data_vencimento" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="metodo">Método de Pagamento:</label>
                                        <select class="form-control btn-upload" id="metodo" name="metodo" required>
                                            <option value="pix">PIX</option>
                                            <option value="boleto">Boleto</option>
                                            <option value="cartao">Cartão</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="comprovante">Upload do Comprovante:</label>
                                        <input type="file" class="form-control-file btn-upload" id="comprovante" name="comprovante" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-aplicacao">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            </div>
        </div>