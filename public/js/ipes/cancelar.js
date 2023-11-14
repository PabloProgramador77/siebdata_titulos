jQuery.noConflict();
jQuery(document).ready(function(){

    //Cargando funcion de perfil
    function cancelar(){

        window.location.href = '/';

    }

    //Click en boton cancelar
    $("#cancelar").on('click', function(e){

        e.preventDefault();

        setTimeout(cancelar, 0);

    });

});