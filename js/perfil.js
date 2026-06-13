const panelView = document.getElementById('panel-view');
const panelEdit = document.getElementById('panel-edit');
const btnNavEdit = document.getElementById('btn-nav-edit');
const btnNavReviews = document.getElementById('btn-nav-reviews');

function mostrarEdicao() {
    panelView.classList.add('hidden');
    panelEdit.classList.remove('hidden');
    
    btnNavEdit.classList.add('active');
    btnNavReviews.classList.remove('active');
}

function mostrarReviews() {
    panelEdit.classList.add('hidden');
    panelView.classList.remove('hidden');
    
    btnNavReviews.classList.add('active');
    btnNavEdit.classList.remove('active');
}

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