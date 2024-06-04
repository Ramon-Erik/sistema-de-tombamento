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
        case 'serie':
            numIdentId.type = 'number'
            numIdentId.setAttribute('min', 1)
            numIdentId.setAttribute('placeholder', `Informe a quatidade de itens a ser criado.`)
            break;
        default:
            textoPlaceholder = 'Recarregue a página'
            break;
    }
    if (textoPlaceholder !== undefined || valor !== 'serie') {
        // console.log('aaaaaaaaa')
        numIdentId.type = 'text'
        numIdentId.value = null
        numIdentId.setAttribute('placeholder', `Ex: ${textoPlaceholder}`)
    }
})