<?php $v->layout('_template'); ?>

<?php $v->start('css'); ?>

<link href="<?= url('node_modules/fullcalendar/main.css'); ?>" rel='stylesheet' />

<?php $v->end(); ?>

<div class="row mt-3 no-spaces" style="font-family: Arial, Helvetica, sans-serif !important;">
    <div class="col col-sm-2"></div>
    <div class="col-12 col-sm-8 pt-3">
        <div id='calendar'></div>
    </div>
    <div class="col col-sm-2"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-2 col-sm-3 col-md-2"></div>
                    <div class="col-10 col-sm-9 col-md-10">
                        <form id="form-scheduling" action="<?= $route->route('event.store') ?>" method="POST" data-type="JSON">
                            <label for="service">Serviço: </label>
                            <select name="service" id="service" class="form-select form-select-sm w-75 d-inline">
                                <?php foreach ($services as $service) : ?>
                                    <option value="<?= $service->id ?>"><?= $service->name ?></option>
                                <?php endforeach ?>
                            </select><br>
                            Data : <span id="data"></span>
                            <input type="hidden" name="data" value=""><br>
                            Hora : <span id="hora"></span><br>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                            <button type="submit" class="btn btn-primary btn-sm">confirmar</button>

                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<?php $v->start('js'); ?>

<script>
    let login = "<?= $route->route('web.login'); ?>";
    let agendamentos = "<?= $route->route('web.agendamentos'); ?>";
    let myEvents = "<?= $route->route('event.index'); ?>";
</script>

<script src="<?= url('node_modules/fullcalendar/main.js'); ?>"></script>
<script src="<?= url('theme/js/fullcalendar.js'); ?>"></script>

<?php $v->end(); ?>