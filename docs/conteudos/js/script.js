var bag_btn = document.getElementById('bag-btn')
var bag = document.querySelector('.bag');
var close_btn = document.querySelector('.close-icon');

bag_btn.onclick = function(){
    bag.classList.toggle('open');
};
close_btn.onclick = function(){
    bag.classList.remove('open');
};
bag.classList.remove('open');

function clickedTam(tamanho){

    document.querySelector(".btn12").classList.remove('clicked');
    document.querySelector(".btn14").classList.remove('clicked');
    document.querySelector(".btn16").classList.remove('clicked');
    document.querySelector(".btnpp").classList.remove('clicked');
    document.querySelector(".btnp").classList.remove('clicked');
    document.querySelector(".btnm").classList.remove('clicked');
    document.querySelector(".btng").classList.remove('clicked');
    document.querySelector(".btngg").classList.remove('clicked');

    class_tam = document.querySelector("."+tamanho);

    class_tam.classList.add('clicked');

}