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

