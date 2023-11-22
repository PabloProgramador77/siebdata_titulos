jQuery.noConflict();
jQuery(document).ready(function(){

    $("#actualizar").attr('disabled', true);

    $("#editar").on('click', function(e){

        e.preventDefault();

        $.ajax({

            type: 'POST',
            url: '/responsable/buscar',
            data:{

                'id' : $(this).attr('data-id'),
                '_token' : $("#token").val()

            },
            dataType: 'json',
            encode: true

        }).done(function(respuesta){

            if( respuesta.exito ){

                $("#nombreEditar").val( respuesta.nombre );
                $("#primerApellidoEditar").val( respuesta.apellido1 );
                $("#segundoApellidoEditar").val( respuesta.apellido2 );
                $("#curpEditar").val( respuesta.curp );
                $("#tituloEditar").val( respuesta.titulo );
                $("#cargoEditar").prepend( '<option value="'+respuesta.idCargo+'">'+respuesta.cargo+'</option>' );
                $("#cargoEditar").val( respuesta.idCargo);
                $("#cargoEditar option[value='"+respuesta.idCargo+"']:not(:first)").remove();
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

                        window.location.href = '/responsables';

                    }

                });

                $("#actualizar").attr('disabled', true);

            }

        });

    });

});