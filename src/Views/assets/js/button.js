// El botón de instalación.
const installButton = document.querySelector('button');

// Solo relevante para los navegadores que admiten la instalación.
if ('BeforeInstallPromptEvent' in window) {
  // Variable para guardar el `BeforeInstallPromptEvent`.
  let installEvent = null;

  // Función que se ejecutará cuando se instale la aplicación.
  const onInstall = () => {
    // Deshabilitar el botón de instalación.
    installButton.disabled = true;
    // Ya no es necesario.
    installEvent = null;
  };

  window.addEventListener('beforeinstallprompt', (event) => {
    // No mostrar el aviso de instalación todavía.
    event.preventDefault();
    // Guardar el `BeforeInstallPromptEvent` para más tarde.
    installEvent = event;
    // Habilitar el botón de instalación.
    installButton.disabled = false;
  });

  installButton.addEventListener('click', async () => {
    // Si no hay un `BeforeInstallPromptEvent` guardado, retornar.
    if (!installEvent) {
      return;
    }
    // Usar el `BeforeInstallPromptEvent` guardado para solicitar al usuario.
    installEvent.prompt();
    const result = await installEvent.userChoice;
    // Si el usuario instala la aplicación, ejecutar `onInstall()`.
    if (result.outcome === 'accepted') {
      onInstall();
    }
  });

  // El usuario puede decidir ignorar el botón de instalación
  // y simplemente usar el aviso del navegador directamente. En este caso
  // igualmente ejecutar `onInstall()`.
  window.addEventListener('appinstalled', () => {
    onInstall();
  });
}
