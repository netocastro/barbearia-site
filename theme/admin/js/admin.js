$(function () {
    let minWidth = 750

    if (window.innerWidth < minWidth) {
        $('#navbarMini').removeClass('d-none');
        return false;

    }
    if (window.innerWidth > minWidth) {
        $('#navbarDefault').removeClass('d-none');
        return false;
    }

    $(window).on('resize', function () {
        console.log('navbar mini');
        if (window.innerWidth < minWidth) {
            $('#navbarMini').removeClass('d-none');
            $('#navbarDefault').addClass('d-none');
            return false;

        }
        if (window.innerWidth > minWidth) {
            console.log('navar normal');
            $('#navbarDefault').removeClass('d-none');
            $('#navbarMini').addClass('d-none');
            return false;
        }

    });


    myFunction();
    $(window).on('resize', myFunction);


    function myFunction() {
       alert('oi')
    }
});