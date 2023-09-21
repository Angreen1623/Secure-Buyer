var more_btn = document.querySelector('.mais');
var less_btn = document.querySelector('.menos');
var quantitys = document.querySelector('#qnt');

more_btn.onclick = function(){
    quantity.value++;
    verTamanho();
};

less_btn.onclick = function(){
    quantity.value--;
    verTamanho();
};

function verTamanho(){
    for(i=1; i<=6;i++){
        if(quantity.value >= Math.pow(10, i)-1){
            quantity.style.width = i+1+"7px";
        }
    }
}