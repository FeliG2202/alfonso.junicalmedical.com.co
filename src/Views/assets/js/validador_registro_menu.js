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