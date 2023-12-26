jQuery.noConflict();
jQuery(document).ready(function(){

    $("#actualizar").attr('disabled', true);

    $(".editar").on('click', function(e){

        e.preventDefault();

        $.ajax({

            type: 'POST',
            url: '/carrera/buscar',
            data:{

                'id' : $(this).attr('data-id')

            },
            dataType: 'json',
            encode: true

        }).done(function(respuesta){

            if( respuesta.exito ){

                $("#nombreEditar").val( respuesta.nombre );
                $("#rvoeEditar").val( respuesta.rvoe );
                $("#claveEditar").val( respuesta.clave );
                $("#autoridadEditar").prepend( '<option value="'+respuesta.idAutoridad+'">'+respuesta.autoridad+'</option>' );
                $("#autoridadEditar").val( respuesta.idAutoridad);
                $("#autoridadEditar option[value='"+respuesta.idAutoridad+"']:not(:first)").remove();
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

                        window.location.href = '/carreras';

                    }

                });

                $("#actualizar").attr('disabled', true);

            }

        });

    });

});