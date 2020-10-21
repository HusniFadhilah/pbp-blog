$(window).scroll(function () {
    if ($(this).scrollTop()) {
        $('#scroll-to-top').show();
    } else {
        $('#scroll-to-top').hide();
    }
});

$("#scroll-to-top").click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, 1000);
});

(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        let validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    alert('Success! Thank you for filling the form.')
                    return true;
                }
                form.classList.add('was-validated');
            }, false);
        });

    }, false);
})();