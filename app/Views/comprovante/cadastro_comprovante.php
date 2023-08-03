        <div class="container py-2 my-2">
            <div class="row justify-content-center rowFormComprovante d-flex">
                <div class="card col-md-5 mr-1 mt-1 flex-direction-column flex-grow-1">
                    <div class="card-body card-color">
                        <form action="/Comprovante/salvar" method="post" class="divFormComprovante" enctype="multipart/form-data">
                            <div class="form-group d-flex align-items-center flex-column">
                                <label for="descricao">Descrição:</label>
                                <input type="text" class="form-control btn-aplicacao" id="descricao" name="descricao" required>
                            </div>
                            <div class="form-group d-flex align-items-center flex-column">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control btn-aplicacao" id="numero" name="numero" required>
                            </div>
                            <div class="form-group d-flex align-items-center flex-column">
                                <label for="valor">Valor:</label>
                                <input type="number" class="form-control btn-aplicacao" id="valor" name="valor" step="0.01" required>
                            </div>
                            <div class="form-group d-flex align-items-center flex-column">
                                <label for="dataPagamento">Data de Pagamento:</label>
                                <input type="date" class="form-control btn-aplicacao" id="dataPagamento" name="dataPagamento" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card col-md-5 mt-1 flex-direction-column flex-grow-1">
                    <div class="card-body card-color">
                        <form action="/Comprovante/salvar" method="post" class="divFormComprovante" enctype="multipart/form-data">
                            <div class="form-group d-flex align-items-center flex-column">
                                <label for="dataVencimento">Data de Vencimento:</label>
                                <input type="date" class="form-control btn-aplicacao" id="dataVencimento" name="dataVencimento" required>
                            </div>
                            <div class="form-group d-flex align-items-center flex-column">
                                <label for="metodo">Método de Pagamento:</label>
                                <select class="form-control btn-aplicacao" id="metodo" name="metodo" required>
                                    <option value="pix">PIX</option>
                                    <option value="boleto">Boleto</option>
                                    <option value="cartao">Cartão</option>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center flex-column">
                                <label for="comprovante">Upload do Comprovante:</label>
                                <input type="file" class="form-control-file btn-aplicacao" id="comprovante" name="comprovante" required>
                            </div>
                            <div class="form-group group-button">
                                <button type="submit" class="btn btn-aplicacao">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>