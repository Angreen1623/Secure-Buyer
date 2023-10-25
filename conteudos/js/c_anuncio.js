// var more_btn = document.querySelector('.mais');
// var less_btn = document.querySelector('.menos');
// var quantitys = document.querySelector('#qnt');

// more_btn.onclick = function(){
//     quantity.value++;
//     verTamanho();
// };

// less_btn.onclick = function(){
//     quantity.value--;
//     verTamanho();
// };

// function verTamanho(){
//     for(i=1; i<=6;i++){
//         if(quantity.value >= Math.pow(10, i)-1){
//             quantity.style.width = i+1+"7px";
//         }
//     }
// }                                            Não ta funcionando, n sei arrumar ainda

var img1 = document.querySelector('.img1');
const inputArquivo1 = document.querySelector("#imagem1");

var img2 = document.querySelector('.img2');
const inputArquivo2 = document.querySelector("#imagem2");

var img3 = document.querySelector('.img3');
const inputArquivo3 = document.querySelector("#imagem3");

var img4 = document.querySelector('.img4');
const inputArquivo4 = document.querySelector("#imagem4");

var img5 = document.querySelector('.img5');
const inputArquivo5 = document.querySelector("#imagem5");

inputArquivo1.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo1.files.length > 0) {  //Verifica se há um arquivo selecionado.
    img1.src = URL.createObjectURL(inputArquivo1.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
  }

};
inputArquivo2.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo2.files.length > 0) {  //Verifica se há um arquivo selecionado.
    img2.src = URL.createObjectURL(inputArquivo2.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
  }

};
inputArquivo3.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo3.files.length > 0) {  //Verifica se há um arquivo selecionado.
    img3.src = URL.createObjectURL(inputArquivo3.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
  }

};
inputArquivo4.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo4.files.length > 0) {  //Verifica se há um arquivo selecionado.
    img4.src = URL.createObjectURL(inputArquivo4.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
  }

};
inputArquivo5.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo5.files.length > 0) {  //Verifica se há um arquivo selecionado.
    img5.src = URL.createObjectURL(inputArquivo5.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
  }

};