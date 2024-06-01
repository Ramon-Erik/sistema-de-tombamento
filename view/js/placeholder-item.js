const tipoIdent = document.querySelector('#tipoIdentId');
const numIdentId = document.querySelector('#numIdentId');

tipoIdent.addEventListener('change', function () {
    let valor = tipoIdent.value
    let textoPlaceholder
    switch (valor) {
        case 'num-tomb':
            textoPlaceholder = '2055893'
            break;
        case 'num-serie':
            textoPlaceholder = 'CY5KH4ZT201891D'
            break;
        case 'contagem':
            textoPlaceholder = '1, ou 2, ou 3...'
            break;
        default:
            textoPlaceholder = 'Recarregue a página'
            break;
    }
    numIdentId.setAttribute('placeholder', `Ex: ${textoPlaceholder}`)
})
