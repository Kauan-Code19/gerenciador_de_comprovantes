        <div class="row justify-content-center align-items-center rowFormEdicao">
            <div class="card">
                <div class="card-body">
                    <?= validation_list_errors() ?>
                
                        <form action="/usuario/atualizar" method="post" class="divFormEdicao">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

                            <div class="form-group text-left">
                                <label for="nome" class="label">Nome:</label>
                                <input class="form-control btn-aplicacao" type="text" name="nome" value="<?php echo $usuario['nome']; ?>">
                            </div>
                    
                            <div class="form-group text-left">
                                <label for="email" class="label">Email:</label>
                                <input class="form-control btn-aplicacao" type="email" name="email" value="<?php echo $usuario['email']; ?>">
                            </div>

                            <div class="form-group text-left">
                                <label for="password" class="label">Senha:</label>
                                <input class="form-control btn-aplicacao" type="password" name="password" value="<?php echo $usuario['senha']; ?>">
                            </div>

                            <div class="form-group text-left">
                                <label for="confirmpassword" class="label">Confirme sua senha:</label>
                                <input class="form-control btn-aplicacao" type="password" name="confirmpassword" value="<?php echo $usuario['senha']; ?>">
                            </div>

                            <div class="form-group text-left">
                                <input type="submit"  class="btn btn-aplicacao" name="submit" value="Atualizar">
                            </div>
                        </form>

                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        </div>