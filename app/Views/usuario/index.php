<?php if (! empty($usuario) && is_array($usuario)): ?>
    <table class="table table-hover table-bordered table-condensed">
        <thead>
            <tr>
                <th scope="col" class="bg-combined text-white text-center">ID</th>
                <th scope="col" class="bg-name text-white text-center">Nome</th>
                <th scope="col" class="bg-email text-white text-center">E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $usuario_item): ?>
                <tr>
                    <td class="text-center text-white"><span class="badge badge-custom"><?= esc($usuario_item['id']) ?></td>
                    <td class="bgb-name text-white text-center"><?= esc($usuario_item['nome']) ?></td>
                    <td class="bgb-email text-white text-center"><?= esc($usuario_item['email']) ?></td>
                </tr>
            <?php endforeach ?>    
        </tbody>
    </table>
<?php else: ?>
            
    <h3>No News</h3>
            
    <p>Unable to find any news for you.</p>
            
<?php endif ?>