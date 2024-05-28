const btnApagar = document.querySelector('#btnAtivarModalId');
const btnCancelar = document.querySelector('#btnCancelarId');
const modalDialog = document.querySelector('#modalConfirmacao');

btnApagar.addEventListener('click', () => {
    const selectAmbiente = document.querySelector('#ambienteId');
    const radioBtn = document.querySelector('#ambienteId');
    if (radioBtn == null || selectAmbiente.value == 'null') {
        modalDialog.innerHTML = `<div class="texto"><h4>Excluir</h4><p>É necessário selecionar o item que deseja excluir.</p></div>` ;
    }
    modalDialog.showModal();
});
btnCancelar.addEventListener("click", function () {
    modalDialog.close();
});
window.addEventListener('click', (event) => {
    if (event.target === modalDialog) {
        modalDialog.close();
    }
});