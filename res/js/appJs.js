(function() {
    $(document).ready(function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    } else {
                        event.preventDefault();
                        $.ajax({
                            url: $('#rackspace-form').attr('action'),
                            method: 'post',
                            dataType: 'json',
                            data: $('#rackspace-form').serialize(),
                        }).done(function(response) {
                            if (response.status) {
                                window.location = './create-shorty.php';
                            } else {
                                $("#error-message").html(response.message);
                                $("#err_div").css("display", "block");
                            }
                        });
                    }
                    form.classList.add('was-validated')
                }, false)
            });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
})(jQuery)