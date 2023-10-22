/*const input = document.querySelector('.cnpjmask')

input.addEventListener('keypress', () => {
    let inputLength = input.value.length

    // MAX LENGHT 18  CNPJ
    if (inputLength == 2 || inputLength == 6) {
        input.value += '.'
    }else if (inputLength == 10) {
        input.value += '/'
    }else{if (inputLength == 15) {
            input.value += '-'}} 

})*/

const inputArquivo = document.querySelector(".img-form input");
const imagem = document.querySelector(".img-form img");

inputArquivo.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo.files.length > 0) {  //Verifica se há um arquivo selecionado.
    imagem.src = URL.createObjectURL(inputArquivo.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
  }

};

//função para coleta de dados do cnpj
function checkcnpj(cnpj) {
  $.ajax({
      'url': 'https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''), //link da api da receita federal,com um replace para remover os pontos e barras da mascara (senao a consulta de cnpj falha)
      'type': "GET",
      'dataType': 'jsonp',
      'success': function(dado) {
      if (dado.nome == undefined) {
            $('#cnpj-error-message').show();
            $('input[name="cnpj"]').addClass('input-border'); // Adiciona a classe para a borda vermelha
            cnpjvalido = false;  // CNPJ é inválido, mostra mesnagem de erro
            } else {
            $('#cnpj-error-message').hide();
            $('input[name="cnpj"]').removeClass('input-border'); // Remove a classe da borda vermelha
            cnpjvalido = true;   // CNPJ é válido, esconde mesnagem de erro
            }
            console.log(dado);//ver no inspecionar elemento os dados da consulta
      }
  });
}

$(document).ready(function() { //confirmar se o cnpj está com ou sem mensagem de erro antes de submeter o formulario
          $('form').on('submit', function(e) {
          if (!cnpjvalido) {
          e.preventDefault();  // impede o envio do formulário
          alert('Por favor, corrija os erros antes de submeter.');
      }
  });
});