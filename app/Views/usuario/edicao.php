        <div class="row justify-content-center align-items-center rowFormEdicao">
            <div class="card">
                <div class="card-body">
                    <?= validation_list_errors() ?>
                
                        <form action="/usuario/atualizar" method="post" class="divFormEdicao">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

                            <div class="form-group text-left">
                                <label for="nome" class="label">Nome:</label>
                                <input class="form-control" type="input" name="nome" value="<?php echo $usuario['nome']; ?>">
                            </div>
                            <br>
                    
                            <div class="form-group text-left">
                                <label for="email" class="label">Email:</label>
                                <input class="form-control" type="input" name="email" value="<?php echo $usuario['email']; ?>">
                            </div>
                            <br>

                            <div class="form-group text-center">
                                <input type="submit"  class="btn btn-primary" name="submit" value="Atualizar">
                            </div>
                        </form>

                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        </div>