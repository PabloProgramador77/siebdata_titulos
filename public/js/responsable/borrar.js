jQuery.noConflict();
jQuery(document).ready(function(){

    $(".eliminar").on('click', function(e){

        e.preventDefault();

        Swal.fire({

            icon: 'warning',
            title: '¿En verdad deseas borrar el responsable de firma?',
            html: 'Los datos no podrán ser recuperados de ninguna manera.',
            allowOutsideClick: false,
            showConfirmButton: true,
            showDenyButton: true,

        }).then((resultado)=>{

            if( resultado.isConfirmed ){

                $.ajax({

                    type: 'POST',
                    url: '/responsable/borrar',
                    data:{

                        'id' : $(this).attr('data-id'),
                        '_token' : $("#token").val()

                    },
                    dataType: 'json',
                    encode: true

                }).done(function(respuesta){

                    if( respuesta.exito ){

                        Swal.fire({

                            icon: 'success',
                            title: 'Responsable Borrado.',
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){

                                window.location.href = '/responsables';

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

                                window.location.href = '/responsables';

                            }

                        });

                    }

                });

            }

        });

    });

});