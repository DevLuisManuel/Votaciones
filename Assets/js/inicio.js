$(document).ready(function() {

});

function confirmar(idEstudiante,nomEstudiante){
    var idGrado = $('#grado').val();
    if(confirm('¿Quieres votar por el estudiante: '+nomEstudiante+'?')){
        enviarDatos(idGrado,idEstudiante);
    }
}

function enviarDatos(idGrado,idEstudiante){
    var url = "Datos.php";
    $.ajax({
        type: "POST",
        url: url,
        data:
            {
                idGrado: idGrado,
                idEstudiante: idEstudiante
            },
        beforeSend: function(){
           //message = $("<span class='error'>Ha ocurrido un error.</span>");
           // showMessage(message);
        },
        success: function(data){
            $('#terminadoOk').modal({
                show: true
            });
        },
        error: function(){
            //message = $("<span class='error'>Ha ocurrido un error.</span>");
            //showMessage(message);
        }
    });
}
