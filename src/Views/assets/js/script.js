 function seleccionarInput(id) {
    var input = document.getElementById(id);
    if(input) {
        input.focus();
    } else {
        console.log("No se encontró ningún elemento con el ID proporcionado.");
    }
}