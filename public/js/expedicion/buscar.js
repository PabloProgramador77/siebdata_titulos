jQuery.noConflict();
jQuery(document).ready(function(){

    $("#actualizar").attr('disabled', true);

    $(".editar").on('click', function(e){

        e.preventDefault();

        $.ajax({

            type: 'POST',
            url: '/expedicion/buscar',
            data:{

                'id' : $(this).attr('data-id')

            },
            dataType: 'json',
            encode: true

        }).done(function(respuesta){

            if( respuesta.exito ){

                if( respuesta.servicio == 1 ){

                    $("#servicioEditar").prepend( '<option value="'+respuesta.servicio+'">Servicio social cumplido</option>' );
                    $("#servicioEditar").val( respuesta.servicio);
                    $("#servicioEditar option[value='"+respuesta.servicio+"']:not(:first)").remove();

                }else{

                    $("#servicioEditar").prepend( '<option value="'+respuesta.servicio+'">Servicio social no cumplido</option>' );
                    $("#servicioEditar").val( respuesta.servicio);
                    $("#servicioEditar option[value='"+respuesta.servicio+"']:not(:first)").remove();

                }

                $("#alumnoEditar").prepend( '<option value="'+respuesta.idAlumno+'">'+respuesta.nombre+' '+respuesta.primerApellido+' '+respuesta.segundoApellido+'</option>' );
                $("#alumnoEditar").val( respuesta.idAlumno);
                $("#alumnoEditar option[value='"+respuesta.idAlumno+"']:not(:first)").remove();

                $("#fundamentoEditar").prepend( '<option value="'+respuesta.idFundamento+'">'+respuesta.nombreFundamento+'</option>' );
                $("#fundamentoEditar").val( respuesta.idFundamento);
                $("#fundamentoEditar option[value='"+respuesta.idFundamento+"']:not(:first)").remove();

                $("#titulacionEditar").prepend( '<option value="'+respuesta.idTitulacion+'">'+respuesta.nombreTitulacion+'</option>' );
                $("#titulacionEditar").val( respuesta.idTitulacion);
                $("#titulacionEditar option[value='"+respuesta.idTitulacion+"']:not(:first)").remove();

                $("#entidadEditar").prepend( '<option value="'+respuesta.idEntidad+'">'+respuesta.nombreEntidad+'</option>' );
                $("#entidadEditar").val( respuesta.idEntidad);
                $("#entidadEditar option[value='"+respuesta.idEntidad+"']:not(:first)").remove();

                $("#fechaExamenEditar").val( respuesta.fechaExamen );
                $("#fechaExencionEditar").val( respuesta.fechaExencion );
                $("#id").val( respuesta.id );

                $("#actualizar").attr('disabled', false);

            }else{

                Swal.fire({

                    icon: 'error',
                    title: respuesta.mensaje,
                    allowOutsideClick: false,
                    showConfirmButton: true

                }).then((resultado)=>{

                    if( resultado.isConfirmed ){

                        window.location.href = '/expediciones';

                    }

                });

                $("#actualizar").attr('disabled', true);

            }

        });

    });

});