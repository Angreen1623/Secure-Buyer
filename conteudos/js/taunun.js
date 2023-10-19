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

const inputArquivo = document.querySelector(".img-form input");
const imagem = document.querySelector(".img-form img");


inputArquivo.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo.files.length > 0) {  //Verifica se há um arquivo selecionado.
    imagem.src = URL.createObjectURL(inputArquivo.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
  }

};

const userImage = imagem.src; // Armazena a imagem atual do usuário quando a página é carregada.