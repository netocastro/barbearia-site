<?php $v->layout('_templateAdmin'); ?>

<?php $v->start('css'); ?>
<?php $v->end(); ?>

<div class="container mt-3">
    <h1 class="text-center">Lista de Contatos</h1>
    <hr>

    <table class="table table-hover table-striped table-hover table-sm table-responsive">
        <thead>
            <tr>
                <th>Apelido</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th></th>
            </tr>
        </thead>
        <?php if (isset($users)) : ?>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr id="<?= $user->id; ?>" style="font-weight:<?= ($user->status == '0' ? 'bold' : 'none'); ?> ;">
                        <td class="nick"><?= $user->nick; ?></td>
                        <td class="name" class="text-truncate"><?= $user->name; ?></td>
                        <td class="email"><?= $user->email; ?></td>
                        <td class="cpf"><?= $user->cpf; ?></td>
                        <td><button data-bs-target="#delete" data-bs-toggle="modal" class="btn delete"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Apagar mensagem"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
</div>

<!-- Modal Deletar Informações-->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border">
                <h6 class="modal-title">
                    Confirmação
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-3 ps-2 " id="delete-message">
                <div class="text-center"> Tem certeza que deseja deletar essa mensagem?</div>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-primary confirm-delete" data-id="0" data-bs-dismiss="modal" data-url="<?= $route->route('user.delete') ?>">Confirmar</button>
                </div>
            </div>

            <div class="modal-footer ">
                <button type="button" class="btn btn-outline-secondary " data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php $v->start('js'); ?>

<script src="<?= url('theme/admin/js/userList.js'); ?>"></script>
<?php $v->end(); ?>