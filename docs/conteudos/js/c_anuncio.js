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


//variaveis das checkboxes
let checkbox1 = document.getElementById('t12');
let checkbox2 = document.getElementById('t14');
let checkbox3 = document.getElementById('t16');
let checkbox4 = document.getElementById('tpp');
let checkbox5 = document.getElementById('tp');
let checkbox6 = document.getElementById('tm');
let checkbox7 = document.getElementById('tg');
let checkbox8 = document.getElementById('tgg');

var errorDiv = document.getElementById('errorDiv');

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

function checarimg()
{
  if(inputArquivo1.files.length == 0 || inputArquivo2.files.length == 0 || inputArquivo3.files.length == 0|| inputArquivo4.files.length == 0|| inputArquivo5.files.length == 0)
  {
    
  }
  return true
}

function checartam()
{
  if(!checkbox1.checked && !checkbox2.checked && !checkbox3.checked && !checkbox4.checked && !checkbox5.checked && !checkbox6.checked && !checkbox7.checked && !checkbox8.checked) 
  {
    errorDiv.textContent = "Por favor, preencha todos os campos solicitados.";
    return false;
  }
  return true;
}

function checarsex()
{
  if(!document.getElementById("masculino").checked && !document.getElementById("feminino").checked && !document.getElementById("unissex").checked)
  {
    errorDiv.textContent = "Por favor, preencha todos os campos solicitados.";
    return false;
  }
  return true;
}

function checartipo()
{
  if(!document.getElementById("camisa").checked && !document.getElementById("blusa").checked && !document.getElementById("calcado").checked && !document.getElementById("calca").checked)
  {
    errorDiv.textContent = "Por favor, preencha todos os campos solicitados.";
    return false;
  }
  return true;
}



function blockletras(keypress)
{//bloqueia letras
  
 

    if (keypress>=48 && keypress<=57 || keypress==44 && !event.target.value.includes(',')/*impede a inserção de mais de uma virgula*/)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function formatar(input) {
  input.value = input.value.replace(/[^0-9,]/g, '');//sem isso ele adiciona um R$ a cada input
  // Divide o valor em duas partes, antes e depois da vírgula
  const partes = input.value.split(',');
  // deixa apenas os primeiros dois dígitos após a vírgula
  if (partes.length > 1) {
    partes[1] = partes[1].slice(0, 2);
  }
  // Recriando o valor com no máximo 2 dígitos após a vírgula
  input.value = "R$" + partes.join(',');
}


function substituir() {//função para replicar a virgula pelo ponto e o r$ por nada no banco de dados
  var campo = document.getElementById("valor");
  campo.value = campo.value.replace(",", ".");
  campo.value = campo.value.replace("R$", "");

}