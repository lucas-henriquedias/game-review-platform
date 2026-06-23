
let detalhes = {};
const lista = document.getElementById('lista-jogos');
const modal = document.getElementById('modalJogo');


fetch('../php/dados_ranking.php')
.then(r => r.json())
.then(dados => {
    detalhes = dados.detalhes;
    let posicion = 1;

    for (const [jogo, nota] of Object.entries(dados.avaliacoes)) {
        lista.innerHTML += `
        <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl mb-4 cursor-pointer hover:scale-[1.02] hover:border-slate-600 transition-all duration-300 shadow-lg"
             onclick="abrirModal('${jogo}', '${nota}')">
            <h2 class="text-xl font-bold tracking-wide text-white">
                ${posicion}º - ${jogo}
            </h2>
            <p class="text-amber-400 font-medium">
                Nota: ${nota}/5 ⭐
            </p>
        </div>
        `;
        posicion++;
    }
});

// ABRIR MODAL
function abrirModal(nome, nota) {
    const jogo = detalhes[nome];

    const jogoDados = jogo ? jogo : {
        capa: "https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=500",
        comentario: "Este jogo ainda não possui uma review detalhada.",
        dicas: "Nenhuma dica cadastrada para este jogo."
    };

    document.getElementById('modalCapa').src = jogoDados.capa;
    document.getElementById('modalNomeJogo').innerText = nome;
    document.getElementById('modalNotaJogo').innerText = nota + '/5 ⭐';
    document.getElementById('modalComentario').innerText = "💬 " + jogoDados.comentario;
    document.getElementById('modalDicas').innerText = "💡 Dica: " + jogoDados.dicas;

    modal.classList.add('ativo');
}

// FECHAR MODAL
function fecharModal(evento) {
    if (evento.target.id === 'modalJogo') {
        modal.classList.remove('ativo');
    }
}