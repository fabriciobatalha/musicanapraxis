'use strict';

function hidemenu() {
    var x = document.getElementById("menu"),
        y = document.getElementById("btmenu");

    x.classList.toggle("menushow");
    y.classList.toggle("btmenumargin");
}


$(function() {
    $("#selectTopico").change( () => {
        $.get('painel.php?topico_id='+$("#selectTopico").val(), (subtopico) => {
            $("#subtopico").html("");
            for (var i = 0; i < subtopico.length; i++) {
                $("#subtopico").append("<option value=" + subtopico[i].id + ">" + subtopico[i].subtopico + "</option>");
            }
        }, 'JSON');
    });


    // $("form:first").on('submit', (e) => { // Envia formulario
    //     $.ajax({
    //         url: "painel.php",
    //         cache: false,
    //         method: "POST",
    //         contentType: "multipart/form-data",
    //         success: () => {
    //             alert("Artigo Cadastrado");
    //         }
    //     });
    //     e.preventDefault(); // Faz com que a pagina nao atualize ao enviar formulario
    // });
});
