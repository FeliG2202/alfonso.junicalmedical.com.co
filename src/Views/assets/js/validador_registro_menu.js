// VALIDADOR PARA REGISTRAR MENUS CON LOS CHECK Y LOS BOTONES
 function handleCheckboxClick(checkbox, cardId) {
   const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
   const allSubmitButtons = document.querySelectorAll('button[name="btnPedDatosPers"]');
   allCheckboxes.forEach((cb) => {
     if (cb.parentNode.parentNode.parentNode.parentNode.parentNode.id !== checkbox.parentNode.parentNode.parentNode.parentNode.parentNode.id) {
       cb.checked = false;
     }
   });
   allSubmitButtons.forEach((btn, index) => {
     if (index === cardId) {
       btn.disabled = !document.querySelectorAll('#form' + cardId + ' input[type="checkbox"]:checked').length;
     } else {
       btn.setAttribute('disabled', 'disabled');
     }
   });
 }

  // Espera a que la página se cargue completamente
window.onload = function() {
            // Verifica si el parámetro 'message' está presente en la URL
  if (window.location.search.includes("message=true")) {
                // Elimina el parámetro 'message' de la URL actual
    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname + window.location.search.replace(/&?message=true/, '');

                // Reemplaza la URL actual sin el parámetro 'message'
    history.replaceState({path: newURL}, '', newURL);
  } if (window.location.search.includes("message=false")) {
                // Elimina el parámetro 'message' de la URL actual
    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname + window.location.search.replace(/&?message=false/, '');

                // Reemplaza la URL actual sin el parámetro 'message'
    history.replaceState({path: newURL}, '', newURL);
  }
}