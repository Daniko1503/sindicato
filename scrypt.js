// Função para disparar a Ficha de Sindicalização no WhatsApp
document.addEventListener("DOMContentLoaded", () => {
    const formFiliacao = document.getElementById("form-filiacao");
    if (formFiliacao) {
        formFiliacao.addEventListener("submit", (e) => {
            e.preventDefault();
            const nome = document.getElementById("nome").value;
            const matricula = document.getElementById("matricula").value;
            const secretaria = document.getElementById("secretaria").value;
            const whatsapp = document.getElementById("whatsapp").value;

            const texto = `Olá, gostaria de solicitar minha sindicalização!\n\n*Nome:* ${nome}\n*Matrícula:* ${matricula}\n*Secretaria:* ${secretaria}\n*WhatsApp:* ${whatsapp}`;
            const numeroSindicato = "5519999999999"; // Substitua pelo número real com DDI e DDD
            
            window.open(`https://wa.me{numeroSindicato}?text=${encodeURIComponent(texto)}`, "_blank");
        });
    }

    const formDenuncia = document.getElementById("form-denuncia");
    if (formDenuncia) {
        formDenuncia.addEventListener("submit", (e) => {
            e.preventDefault();
            const local = document.getElementById("denuncia-local").value;
            const descricao = document.getElementById("denuncia-desc").value;

            const texto = `*[DENÚNCIA ANÔNIMA]*\n\n*Local:* ${local}\n*Relato:* ${descricao}`;
            const numeroSindicato = "5519999999999"; // Substitua pelo número real
            
            window.open(`https://wa.me{numeroSindicato}?text=${encodeURIComponent(texto)}`, "_blank");
        });

        // --- CONTROLE DO PAINEL DE ALERTA (BOTÃO FECHAR) ---
    const painelAlerta = document.getElementById("painel-alerta");
    const btnFecharAlerta = document.getElementById("fechar-alerta");

    if (btnFecharAlerta && painelAlerta) {
    btnFecharAlerta.addEventListener("click", () => {
        painelAlerta.style.display = "none";
    });
    }

    // --- CONTROLE DO FAQ (ACCORDION) ---
    const perguntasFaq = document.querySelectorAll(".faq-pergunta");

    perguntasFaq.forEach(pergunta => {
    pergunta.addEventListener("click", () => {
        const itemAtivo = document.querySelector(".faq-item.ativo");
        
        // Se já houver um item aberto e não for o atual, fecha ele
        if (itemAtivo && itemAtivo !== pergunta.parentElement) {
            itemAtivo.classList.remove("ativo");
            itemAtivo.querySelector(".faq-resposta").style.maxHeight = null;
        }

        // Alterna o estado do item clicado
        const itemAtual = pergunta.parentElement;
        itemAtual.classList.toggle("ativo");
        
        const resposta = itemAtual.querySelector(".faq-resposta");
        if (itemAtual.classList.contains("ativo")) {
            resposta.style.maxHeight = resposta.scrollHeight + "px";
        } else {
            resposta.style.maxHeight = null;
        }
        });
    });

    }
});

// --- MECANISMO DE BUSCA DE NOTÍCIAS ---
const inputBusca = document.getElementById("input-busca");

if (inputBusca) {
    inputBusca.addEventListener("input", (e) => {
        const termo = e.target.value.toLowerCase().trim();
        const artigos = document.querySelectorAll("#grid-artigos .card-noticia");

        artigos.forEach(artigo => {
            const titulo = artigo.querySelector("h3").textContent.toLowerCase();
            const texto = artigo.querySelector("p").textContent.toLowerCase();
            const categoria = artigo.querySelector(".categoria").textContent.toLowerCase();

            // Verifica se o termo digitado existe no título, texto ou categoria
            if (titulo.includes(termo) || texto.includes(termo) || categoria.includes(termo)) {
                artigo.style.display = "block";
            } else {
                artigo.style.display = "none";
            }
        });
    });
}
