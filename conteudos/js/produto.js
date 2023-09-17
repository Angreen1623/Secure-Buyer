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