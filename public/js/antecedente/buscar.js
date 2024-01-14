jQuery.noConflict();
jQuery(document).ready(function(){

    $("#guardar").attr('disabled', true);

    $(".editarAntecedente").on('click', function(e){

        e.preventDefault();

        $.ajax({

            type: 'POST',
            url: '/antecedente/buscar',
            data:{

                'id' : $(this).attr('data-id')

            },
            dataType: 'json',
            encode: true

        }).done(function(respuesta){

            if( respuesta.exito ){

                $("#editarNombreAnt").val( respuesta.nombre );
                $("#editarFechaInicioAnt").val( respuesta.fechaInicio );
                $("#editarFechaTerminoAnt").val( respuesta.fechaTermino );
                $("#editarCedula").val( respuesta.cedula );
                $("#idAntecedente").val( respuesta.id );

                $("#editarEstudio").prepend( '<option value="'+respuesta.idEstudio+'">'+respuesta.estudio+'</option>' );
                $("#editarEstudio").val( respuesta.idEstudio);
                $("#editarEstudio option[value='"+respuesta.idEstudio+"']:not(:first)").remove();

                $("#editarEntidad").prepend( '<option value="'+respuesta.idEntidad+'">'+respuesta.entidad+'</option>' );
                $("#editarEntidad").val( respuesta.idEntidad);
                $("#editarEntidad option[value='"+respuesta.idEntidad+"']:not(:first)").remove();

                $("#guardar").attr('disabled', false);

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

                $("#guardar").attr('disabled', true);

            }

        });

    });

});