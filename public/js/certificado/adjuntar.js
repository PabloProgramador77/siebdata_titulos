jQuery.noConflict();
jQuery(document).ready(function(){

    /**Pasando ID de Responsable */
    $('.firma').on('click', function(e){

        e.preventDefault();

        $("#id").val( $(this).attr('data-id') );

    });

    /*Archivando Certificado */
    $("#adjuntar").on('click', function(e){

        e.preventDefault();

        let procesamiento;

        Swal.fire({

            title: 'Procesando Archivo',
            html: 'Un momento por favor: <b></b>',
            timer: 9975,
            allowOutsideClick: false,
            didOpen: ()=>{

                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector('b');
                procesamiento = setInterval(()=>{

                    b.textContent = Swal.getTimerLeft();

                }, 100);

                let archivo = $("#key").prop('files')[0];
                let dataForm = new FormData();
                dataForm.append('archivo', archivo);
                dataForm.append('password', $("#password").val());
                dataForm.append('id', $("#id").val());

                $.ajax({

                    type: 'POST',
                    url: '/firma/archivar',
                    data: dataForm,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    encode: true

                }).done(function(respuesta){

                    if( respuesta.exito ){

                        Swal.fire({

                            icon: 'success',
                            title: 'Firma Descifrada, Archivada y Registrada.',
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){

                                $("#modalFirmas").hide();

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