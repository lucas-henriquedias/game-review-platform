function filtrarJogos() {
    const termo = document.getElementById('pesquisa-jogo').value.toLowerCase();
    const itens = document.querySelectorAll('#lista-jogos-dropdown div');
    const dropdown = document.getElementById('lista-jogos-dropdown');
    dropdown.style.display = 'block';
    itens.forEach(item => {
        item.style.display = item.textContent.toLowerCase().includes(termo) ? 'block' : 'none';
    });
}

function selecionarJogo(id, nome) {
    document.getElementById('jogo_id').value = id;
    document.getElementById('pesquisa-jogo').value = nome;
    document.getElementById('lista-jogos-dropdown').style.display = 'none';
}

document.addEventListener('click', function(e) {
    if (!e.target.closest('.search-box')) {
        document.getElementById('lista-jogos-dropdown').style.display = 'none';
    }
});