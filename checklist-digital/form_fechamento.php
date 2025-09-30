<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf--8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checklist de Fechamento</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><i class="bi bi-box-arrow-in-left"></i> Checklist de FECHAMENTO</h4>
        </div>
        <div class="card-body">
            <form action="salvar_fechamento.php" method="POST" id="checklistForm">
                
                <h5><i class="bi bi-person-check-fill"></i> Identificação</h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="lider" class="form-label">Nome do Líder:</label>
                        <input type="text" class="form-control" id="lider" name="lider" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fiscal" class="form-label">Nome do Fiscal:</label>
                        <input type="text" class="form-control" id="fiscal" name="fiscal" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="data" class="form-label">Data:</label>
                        <input type="date" class="form-control" id="data" name="data" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="coordenadas" class="form-label">Localização (GPS):</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="coordenadas" name="coordenadas" placeholder="Clique no botão para capturar" readonly>
                            <button class="btn btn-outline-secondary" type="button" id="btnLocalizacao">
                                <i class="bi bi-geo-alt-fill"></i> Obter
                            </button>
                        </div>
                    </div>
                </div>

                <div class="accordion" id="checklistAccordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                1. Iluminação
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#checklistAccordion">
                            <div class="accordion-body">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="luzesInternas" name="luzesInternas">
                                    <label class="form-check-label" for="luzesInternas">Luzes internas ligadas.</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="luzesExternas" name="luzesExternas">
                                    <label class="form-check-label" for="luzesExternas">Luzes externas ligadas.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                2. Equipamentos
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#checklistAccordion">
                            <div class="accordion-body">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="equipamentos" name="equipamentos">
                                    <label class="form-check-label" for="equipamentos">Equipamentos essenciais checados e ligados.</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="sistemas" name="sistemas">
                                    <label class="form-check-label" for="sistemas">Sistemas e computadores iniciados.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                3. Segurança e Acessos
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#checklistAccordion">
                            <div class="accordion-body">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="riscoIncendio" name="riscoIncendio">
                                    <label class="form-check-label" for="riscoIncendio">Verificação de riscos de incêndio.</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="passagemServico" name="passagemServico">
                                    <label class="form-check-label" for="passagemServico">Passagem de serviço da vigilância recebida.</label>
                                </div>
                                <label for="lacres" class="form-label">Nº dos Lacres **Colocados**:</label>
                                <textarea class="form-control" id="lacres" name="lacres_colocados" rows="3" placeholder="Ex: Portão 1: 67890..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="observacoes" class="form-label"><h5><i class="bi bi-chat-left-text-fill"></i> Observações Gerais</h5></label>
                    <textarea class="form-control" id="observacoes" name="observacoes" rows="4"></textarea>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-danger btn-lg">Registrar Fechamento</button>
                    <a href="index.php" class="btn btn-secondary mt-2">Voltar ao Menu</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // --- 1. PREENCHER A DATA ATUAL ---
    const campoData = document.getElementById('data');
    const hoje = new Date();
    const dataFormatada = hoje.getFullYear() + '-' + ('0' + (hoje.getMonth() + 1)).slice(-2) + '-' + ('0' + hoje.getDate()).slice(-2);
    campoData.value = dataFormatada;

    // --- 2. CAPTURAR A GEOLOCALIZAÇÃO ---
    const btnLocalizacao = document.getElementById('btnLocalizacao');
    const campoCoordenadas = document.getElementById('coordenadas');
    btnLocalizacao.addEventListener('click', function() {
        if (navigator.geolocation) {
            campoCoordenadas.placeholder = "Carregando...";
            navigator.geolocation.getCurrentPosition(function(posicao) {
                const lat = posicao.coords.latitude.toFixed(6);
                const lon = posicao.coords.longitude.toFixed(6);
                campoCoordenadas.value = `${lat}, ${lon}`;
                campoCoordenadas.classList.add('filled'); // Adiciona a classe para o estilo CSS (opcional)
                alert('Localização capturada com sucesso!');
            }, function(erro) {
                alert(`Erro ao obter localização: ${erro.message}`);
                campoCoordenadas.placeholder = "Clique no botão para tentar novamente";
            });
        } else {
            alert('Geolocalização não é suportada por este navegador.');
        }
    });

    // --- 3. LIDAR COM O ENVIO DO FORMULÁRIO VIA AJAX ---
    const form = document.getElementById('checklistForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Previne o recarregamento da página

        const formData = new FormData(form); // Cria um objeto com todos os dados do formulário
        const submitButton = form.querySelector('button[type="submit"]');
        
        // Feedback visual para o usuário durante o envio
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Salvando...';

        // Envia os dados para o script PHP usando Fetch API
        fetch('salvar_fechamento.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Converte a resposta do PHP para texto
        .then(data => {
            alert(data); // Mostra a mensagem de sucesso ou erro vinda do PHP
            if (data.includes("sucesso")) {
                form.reset(); // Limpa o formulário
                campoData.value = dataFormatada; // Repõe a data
                campoCoordenadas.classList.remove('filled');
                campoCoordenadas.placeholder = 'Clique no botão para capturar';
            }
        })
        .catch(error => {
            console.error('Erro de conexão:', error);
            alert('Ocorreu um erro de conexão. Verifique o console e tente novamente.');
        })
        .finally(() => {
            // Reabilita o botão após a conclusão (sucesso ou erro)
            submitButton.disabled = false;
            submitButton.innerHTML = 'Registrar Fechamento';
        });
    });
});
</script>

</body>
</html>