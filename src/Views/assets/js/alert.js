function handleNetworkResponse(response) {
    const { code, message } = response.data;
    const alert = document.createElement('div');
    const alertClasses = ['alert', 'alert-dismissible', 'fade', 'show',
                          code === 200 ? 'alert-success' : code === 500 ? 'alert-danger' : 'alert-warning'];
    alertClasses.forEach(cls => alert.classList.add(cls));
    alert.setAttribute('role', 'alert');

    alert.appendChild(document.createElement('strong'));
    alert.appendChild(document.createTextNode(message));

    const button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.classList.add('btn-close');
    button.setAttribute('data-bs-dismiss', 'alert');
    button.setAttribute('aria-label', 'Close');
    alert.appendChild(button);

    document.getElementById('alert-container').appendChild(alert);

    setTimeout(() => alert.style.display = 'none', 5000);
}

function seleccionarInput(id) {
    var input = document.getElementById(id);
    if(input) {
        input.focus();
    } else {
        console.log("No se encontró ningún elemento con el ID proporcionado.");
    }
}


