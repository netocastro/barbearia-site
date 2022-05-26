<?php $v->layout('_templateAdmin'); ?>

<?php $v->start('css'); ?>
<?php $v->end(); ?>

<div class="container mt-3">
    <h1 class="text-center">Lista de Contatos</h1>
    <hr>

    <table class="table table-hover table-striped table-hover table-sm table-responsive">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Mensagem</th>
                <th>Data de recbimento</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <?php if (isset($contacts)) : ?>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr id="<?= $contact->id; ?>" style="font-weight:<?= ($contact->status == '0' ? 'bold' : 'none'); ?> ;">
                        <td class="name"><?= $contact->name; ?></td>
                        <td class="email"><?= $contact->email; ?></td>
                        <td class="text-truncate text_email" style="max-width: 15vw;"><?= $contact->text_email; ?></td>
                        <td class="email"><?= $contact->created_at; ?></td>
                        <td><button data-url="<?= $route->route('adminRequest.readContact') ?>" data-bs-target="#list" data-bs-toggle="modal" class="btn readContact"><i class="fas fa-book-open" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ler mensagem"></i></button></td>
                        <td><button data-bs-target="#delete" data-bs-toggle="modal" class="btn delete"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Apagar mensagem"></i></button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
</div>

<!-- Modal ver Informações-->
<div class="modal fade modal-dialog-scrollable" id="list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="read-message"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body message" style="height: 50vh;">

            </div>
        </div>
    </div>
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
                    <button type="button" class="btn btn-primary confirm-delete" data-id="0" data-bs-dismiss="modal" data-url="<?= $route->route('contact.delete') ?>">Confirmar</button>
                </div>
            </div>

            <div class="modal-footer ">
                <button type="button" class="btn btn-outline-secondary " data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php $v->start('js'); ?>

<script src="<?= url('theme/admin/js/contactList.js'); ?>"></script>
<?php $v->end(); ?>