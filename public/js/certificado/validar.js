jQuery.noConflict();
jQuery(document).ready(function(){

    $("#archivar").attr('disabled', true);

    $("#cer").change(function(){

        let procesamiento;

        Swal.fire({

            title: 'Validando Archivo',
            html: 'Un momento por favor: <b></b>',
            timer: 9975,
            allowOutsideClick: false,
            didOpen: ()=>{

                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector('b');
                procesamiento = setInterval(()=>{

                    b.textContent = Swal.getTimerLeft();

                }, 100);

                let archivo = $("#cer").prop('files')[0];
                let dataForm = new FormData();
                dataForm.append('archivo', archivo);

                $.ajax({

                    type: 'POST',
                    url: '/certificado/validar',
                    data: dataForm,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    encode: true

                }).done(function(respuesta){

                    if( respuesta.exito ){

                        Swal.fire({

                            icon: 'success',
                            title: 'Archivo Valido',
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){

                                $("#archivar").attr('disabled', false);

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

            },
            willClose: ()=>{

                clearInterval(procesamiento);

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

                        window.location.href = '/responsables';

                    }

                });

            }

        });

    });

});