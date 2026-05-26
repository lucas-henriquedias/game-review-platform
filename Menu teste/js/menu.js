var sidebarItem = document.querySelectorAll('.sidebar_item');

function selectlink() {
    sidebarItem.forEach((item) =>
        item.classList.remove('ativo'));
    this.classList.add('ativo');
}

sidebarItem.forEach((item) =>
    item.addEventListener('click', selectlink));

var btnExp = document.querySelector('#btn-exp');
var menuLateral = document.querySelector('.menu-lateral');

btnExp.addEventListener('click', function () {

    menuLateral.classList.toggle('expandir'); 
});