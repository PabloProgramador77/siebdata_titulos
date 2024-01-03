jQuery.noConflict();
jQuery(document).ready(function(){

    $("#actualizar").attr('disabled', true);

    $(".editar").on('click', function(e){

        e.preventDefault();

        $.ajax({

            type: 'POST',
            url: '/alumno/buscar',
            data:{

                'id' : $(this).attr('data-id')

            },
            dataType: 'json',
            encode: true

        }).done(function(respuesta){

            if( respuesta.exito ){

                $("#nombreEditar").val( respuesta.nombre );
                $("#apellido1Editar").val( respuesta.primerApellido );
                $("#apellido2Editar").val( respuesta.segundoApellido );
                $("#curpEditar").val( respuesta.curp );
                $("#emailEditar").val( respuesta.email );
                $("#fechaInicioEditar").val( respuesta.fechaInicio );
                $("#fechaTerminoEditar").val( respuesta.fechaTermino );
                $("#id").val( respuesta.id );

                $("#carreraEditar").prepend( '<option value="'+respuesta.idCarrera+'">'+respuesta.carrera+'</option>' );
                $("#carreraEditar").val( respuesta.idCarrera);
                $("#carreraEditar option[value='"+respuesta.idCarrera+"']:not(:first)").remove();

                $("#actualizar").attr('disabled', false);

            }else{

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

                $("#actualizar").attr('disabled', true);

            }

        });

    });

});