jQuery.noConflict();
jQuery(document).ready(function(){

    $("#actualizar").on('click', function(e){

        e.preventDefault();

        let procesamiento;

        Swal.fire({

            title: 'Actualizando Alumno',
            html: 'Un momento por favor: <b></b>',
            timer: 9975,
            allowOutsideClick: false,
            didOpen: ()=>{

                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector('b');
                procesamiento = setInterval(()=>{

                    b.textContent = Swal.getTimerLeft();

                }, 100);

                $.ajax({

                    type: 'POST',
                    url: '/alumno/actualizar',
                    data:{

                        'id' : $("#id").val(),
                        'nombre' : $("#nombreEditar").val(),
                        'primerApellido' : $("#apellido1Editar").val(),
                        'segundoApellido' : $("#apellido2Editar").val(),
                        'curp' : $("#curpEditar").val(),
                        'email' : $("#emailEditar").val(),
                        'idCarrera' : $("#carreraEditar").val(),
                        'fechaInicio' : $("#fechaInicioEditar").val(),
                        'fechaTermino' : $("#fechaTerminoEditar").val()

                    },
                    dataType: 'json',
                    encode: true

                }).done(function(respuesta){

                    if( respuesta.exito ){

                        $("#actualizar").attr('disabled', true);

                        Swal.fire({

                            icon: 'success',
                            title: 'Alumno Actualizado.',
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){
                                
                                window.location.href = '/alumnos';

                            }

                        });

                    }else{

                        $("#actualizar").attr('disabled', true);

                        Swal.fire({

                            icon: 'error',
                            title: respuesta.mensaje,
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){

                                window.location.href = '/alumnos';

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

                        window.location.href = '/alumnos';

                    }

                });

            }

        });

    });

});