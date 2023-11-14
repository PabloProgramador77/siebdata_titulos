jQuery.noConflict();
jQuery(document).ready(function(){

    //Click en Guardar Cambios
    $("#actualizar").on('click', function(e){

        e.preventDefault();
        let procesamiento;

        //Bloqueando pantalla
        Swal.fire({

            title: 'Actualizando datos',
            html: 'Un momento por favor: <b></b>',
            timer: 9975,
            allowOutsideClick: false,
            didOpen: ()=>{

                //Mostrando bloqueo de pantalla
                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector('b');
                procesamiento = setInterval(()=>{

                    b.textContent = Swal.getTimerLeft();

                }, 1000);

                //Ejecutando metodo AJAX para actualización
                $.ajax({

                    type: 'POST',
                    url: '/ipes/actualizar',
                    data:{

                        'id' : $("#id").val(),
                        'name' : $("#nombre").val(),
                        'clave' : $("#clave").val(),
                        'email' : $("#email").val(),
                        'password' : $("#password").val(),
                        '_token' : $("#token").val()

                    },
                    dataType: 'json',
                    encode: true

                }).done(function(respuesta){

                    if( respuesta.exito ){

                        Swal.fire({

                            icon: 'success',
                            title: 'Datos actualizados.',
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){

                                window.location.href = '/profile/username';

                            }

                        });

                    }else{

                        Swal.fire({

                            icon: 'error',
                            title: respuesta.mensaje,
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){

                                window.location.href = '/profile/username';

                            }

                        });

                    }

                });

            },
            willClose: ()=>{

                clearInterval( procesamiento );

            }

        }).then((resultado)=>{

            if( resultado.dismiss == Swal.DismissReason.timer ){

                Swal.fire({

                    icon: 'warning',
                    title: 'Hubo un inconveniente. Trata de nuevo.',
                    allowOutsideClick: false,
                    showConfirmButton: true

                }).then((resultado)=>{

                    if( resultado.isConfirmed ){

                        window.location.href = '/profile/username';

                    }

                });

            }

        });

    });

});