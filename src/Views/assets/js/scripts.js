/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
        );
    });
  }
});

function validarNumero(input, siguienteInputId, inputAnteriorId, event) {
  // Elimina todos los caracteres no numéricos
  input.value = input.value.replace(/\D/g, '');

  // Limita la longitud de la entrada a 1
  input.value = input.value.slice(0, 1);

  // Manejo especial para la tecla Backspace
  if (event && event.keyCode === 8) {
    if (input.value.length === 0) {
      // Si se presiona Backspace y la casilla está vacía, mover el foco al campo anterior
      document.getElementById(inputAnteriorId).focus();
      return;
    }

/* Validador de casillas para el código de verificación */
function validarNumero(input, siguienteInputId, inputAnteriorId, event) {
  // Elimina todos los caracteres no numéricos
  input.value = input.value.replace(/\D/g, '');

  // Limita la longitud de la entrada a 1
  input.value = input.value.slice(0, 1);

  // Manejo especial para la tecla Backspace
  if (event && event.keyCode === 8) {
    if (input.value.length === 0) {
      // Si se presiona Backspace y la casilla está vacía, mover el foco al campo anterior
      document.getElementById(inputAnteriorId).focus();
      return;
    }
  }

  if (input.value.length === 0) {
    // Si la casilla está vacía, mover el foco al campo anterior
    document.getElementById(inputAnteriorId).focus();
  } else if (input.value.length > 0) {
    // Si se ha ingresado un número, mover el foco al siguiente campo
    document.getElementById(siguienteInputId).focus();
  }
}

/* Validador de casillas para el código de verificación */
function validarNumero(input, siguienteInputId, inputAnteriorId) {
  // Elimina todos los caracteres no numéricos
  input.value = input.value.replace(/\D/g, '');

  // Limita la longitud de la entrada a 1
  input.value = input.value.slice(0, 1);

  if (input.value.length === 0) {
    // Si la casilla está vacía, mover el foco al campo anterior
    document.getElementById(inputAnteriorId).focus();
  } else if (input.value.length > 0) {
    // Si se ha ingresado un número, mover el foco al siguiente campo
    document.getElementById(siguienteInputId).focus();
  }
}


/*validador de campos de fechas actuales*/
function validarFechas() {
  const fechaInicioInput = document.getElementById("date_start");
  const fechaFinInput = document.getElementById("date_end");

  const fechaInicio = new Date(fechaInicioInput.value);
  const fechaFin = new Date(fechaFinInput.value);
  const fechaActual = new Date(dayjs().format("YYYY-MM-DD"));

  if (fechaInicio > fechaActual) {
    fechaInicioInput.value = "";
    alert("No puedes seleccionar una fecha de inicio futura.");
  }

  if (fechaFin > fechaActual) {
    fechaFinInput.value = "";
    alert("No puedes seleccionar una fecha de finalización futura.");
  }
}


$('.form').find('input, textarea').on('keyup blur focus', function (e) {

  var $this = $(this),
  label = $this.prev('label');

  if (e.type === 'keyup') {
    if ($this.val() === '') {
      label.removeClass('active highlight');
    } else {
      label.addClass('active highlight');
    }
  } else if (e.type === 'blur') {
    if( $this.val() === '' ) {
      label.removeClass('active highlight');
    } else {
      label.removeClass('highlight');
    }
  } else if (e.type === 'focus') {

    if( $this.val() === '' ) {
      label.removeClass('highlight');
    }
    else if( $this.val() !== '' ) {
      label.addClass('highlight');
    }
  }

});

$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});



// Inicializar el componente de pestañas de Bootstrap
$(document).ready(function() {
  $('.nav-tabs a').on('click', function() {
    $(this).tab('show');
  });
});
