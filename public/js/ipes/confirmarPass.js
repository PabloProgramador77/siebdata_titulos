jQuery.noConflict();
jQuery(document).ready(function(){

    //Cambio de valor en campo password
    $("#password").change(function(){

        if( $("#confirmPassword").val() !== '' ){

            $("#confirmPassword").val('');

        }

    });

    //Cambio de valor en campo de confirmación
    $("#confirmPassword").change(function(){

        if( $("#password").val() !== '' ){

            if( $("#password").val() !== $(this).val() ){

                Swal.fire({
    
                    icon: 'warning',
                    title: 'Contraseña no coincide. Intenta de nuevo.',
                    allowOutsideClick: false,
                    showConfirmButton: true,
    
                });
    
                $("#password").val('');
                $("#confirmPassword").val('');
    
                $("#password").focus();
    
            }

        }else{

            Swal.fire({

                icon: 'info',
                title: 'Introduce una contraseña inicial.',
                allowOutsideClick: false,
                showConfirmButton: true,

            });

            $("#password").focus();

        }

    });

});