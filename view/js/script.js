const btnApagar = document.querySelector('#btnAtivarModalId');
const btnCancelar = document.querySelector('#btnCancelarId');
const dialogConfirmar = document.querySelector('#modalConfirmacao');
const dialogErro = document.querySelector('#modalErro');
let selectAmbiente;
let radioBtn;

function pegarValores() {
    selectAmbiente = document.querySelector('#ambienteId')? document.querySelector('#ambienteId') : {value: 'null'};
    radioBtn = document.querySelector('input[type=radio]:checked')? document.querySelector('input[type=radio]:checked') : null;
}

btnApagar.addEventListener('click', () => {
    pegarValores();
    if (radioBtn == null & selectAmbiente.value == 'null') {
        dialogErro.showModal();
    } else {
        dialogConfirmar.showModal();
    }
});

btnCancelar.addEventListener("click", function () {
    dialogConfirmar.close();
});

window.addEventListener('click', (event) => {
    if (event.target === dialogConfirmar || event.target === dialogErro) {
        dialogConfirmar.close();
        dialogErro.close();
    }
});