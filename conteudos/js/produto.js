var about_btn = document.querySelector('.about-btn');
var detail_btn = document.querySelector('.detail-btn')
var about = document.querySelector('.about');
var detail = document.querySelector('.detail')
var close_btn1 = document.querySelector('.close-about');
var close_btn2 = document.querySelector('.close-detail');

about_btn.onclick = function(){
    // Se detalhes não estiver aberto:
    if(!detail.classList.contains('open')){
        about.classList.add('open');
    }
};

close_btn1.onclick = function(){
    about.classList.remove('open');
};
about.classList.remove('open');


detail_btn.onclick = function(){
    // Se sobre não estiver aberto:
    if(!about.classList.contains('open')){
        detail.classList.add('open');
    }
};


close_btn2.onclick = function(){
    detail.classList.remove('open');
};
detail.classList.remove('open');

function clickedTam(tamanho){
    
    class_tam = document.querySelector("."+tamanho);

    if(class_tam.classList.contains("selectable")){

        document.querySelector(".btn12").classList.remove('clicked');
        document.querySelector(".btn14").classList.remove('clicked');
        document.querySelector(".btn16").classList.remove('clicked');
        document.querySelector(".btnpp").classList.remove('clicked');
        document.querySelector(".btnp").classList.remove('clicked');
        document.querySelector(".btnm").classList.remove('clicked');
        document.querySelector(".btng").classList.remove('clicked');
        document.querySelector(".btngg").classList.remove('clicked');

        class_tam.classList.toggle('clicked');
    }    

}

var more_btn = document.querySelector('.mais');
var less_btn = document.querySelector('.menos');
var quantity = document.querySelector('#qnt');

more_btn.onclick = function(){
    quantity.value++;
    verTamanho()
};

less_btn.onclick = function(){
    quantity.value--;
    verTamanho()
};

function verTamanho(tecla){
    if(tecla >=48 && tecla<=57){
        for(i=1; i<=6;i++){
            if(quantity.value >= Math.pow(10, i)-1){
                quantity.style.width = i+1+"7px";
            }
        }
        return true;
    }else
    return false;
}