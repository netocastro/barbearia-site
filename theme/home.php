<?php $v->layout('_template'); ?>

<?php $v->start('css'); ?>

<?php $v->end(); ?>

<!--<div class="header-home">

</div> -->

<div class="row">
    <div class="col-md-12">
        <section>
            <img src="<?= url('cdn/assets/images/fundo-barbearia.png'); ?>" class="w-100 mural">
        </section>
    </div>
</div>

<section class="section1 pb-5">
    <div class="container">
        <p class="title py-3 text-center">NOSSOS DIFERENCIAIS</p>
        <div class="row">
            <div class="col-md-6 d-flex align-items-center flex-column mb-5">
                <p class="subtitle">
                    Profissionais treinados e capacitados. Temos um controle
                    rigoroso de qualidadequanto aos profissionais em nossas unidades
                    Atendimento, cuidado e bem-estar
                </p>
                <img src="<?= url('cdn/assets/images/imagem-2.jpg'); ?>" class="w-75 mt-5 justfy-content-between">
            </div>

            <div class="col-md-6 d-flex align-items-center flex-column">
                <img src="<?= url('cdn/assets/images/imagem-3.jpg'); ?>" class="w-75 mb-5">
                <p class="subtitle">
                    Na Barbearia VIP, todo o seu consumo vale pontos para você trocar por serviços,
                    produtos ou descontos.
                </p>
            </div>

        </div>
    </div>

</section>

<section class="section2">
    <div class="row no-spaces">
        <div class="col-md-6 d-flex align-items-center flex-column pt-5 " style="background-color: black;">
            <p class="title mt-3">FAÇA PARTE DA NOSSA EQUIPE</p>
            <form action="" class="d-flex align-items-center flex-column w-75" id="contact">
                <input type="text" name="name" placeholder="Nome(obrigatório)" require>
                <input type="email" name="email" placeholder="E-mail(obrigatório)" require>
                <input type="text" name="phone" placeholder="Telefone(obrigatório)" require>
                <input type="text" name="city" placeholder="Cidade onde pretende trabalhar(obrigatório)" require>
                <input type="text" name="instagram" placeholder="Deixe aqui seu @instrgram">

                <textarea name="experience" cols="50" rows="10" placeholder="Conte um pouco sobre sua experiência como barbeiro"></textarea>
                <button type="submit" class="py-2 px-4 mb-5 mt-3 btn btn-warning">Enviar</button>
            </form>
        </div>

        <div class="col-md-6" id="imagem5">

        </div>

    </div>

</section>

<?php $v->start('js'); ?>

<script src="<?= url('theme/js/home.js'); ?>"></script>

<?php $v->end(); ?>