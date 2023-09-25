const input = document.querySelector('.cnpjmask')

input.addEventListener('keypress', () => {
    let inputLength = input.value.length

    // MAX LENGHT 18  CNPJ
    if (inputLength == 2 || inputLength == 6) {
        input.value += '.'
    }else if (inputLength == 10) {
        input.value += '/'
    }else{if (inputLength == 15) {
            input.value += '-'}} 

})