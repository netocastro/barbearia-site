
<!doctype html>
<html lang="<?= LANGUAGE ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="<?= CHARSET ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Barbearia">

    <?= $v->section('css') ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= url('cdn/libs/bootstrap/dist/bootstrap-5.0.0-beta3/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= url('theme/css/style.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href=" <?= url('cdn/assets/media/images/fav-icons/favicon.ico'); ?>">
    <title><?= $title . " | " . ucfirst(explode('.', $_SERVER['HTTP_HOST'])[0])  ?></title>
</head>

<body>

    <?= $v->insert('fragments/navbar'); ?>

    <?= $v->section('content'); ?>

    <?= $v->insert('fragments/footer'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?= url('cdn/libs/jquery/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?= url('cdn/libs/bootstrap/dist/bootstrap-5.0.0-beta3/js/popper.min.js'); ?>"></script>
    <script src="<?= url('cdn/libs/bootstrap/dist/bootstrap-5.0.0-beta3/js/bootstrap.min.js'); ?>"></script>

    <script src="<?= url('cdn/js/global.js'); ?>"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));

        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    </script>
    <?= $v->section('js') ?>

</body>

</html>

