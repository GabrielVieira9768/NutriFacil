<div class="modal fade" id="modal-adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="/posts/create" method="POST">

                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Novo Post</h1>
                    <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF">
                            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                        </svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-3 d-flex justify-content-start">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="author" class="form-label">Autor</label>
                            <input value="<?php echo $_SESSION['auth'][0]->name ?>" type="text" name="author" class="form-control" id="author" readonly>
                        </div>

                        <div style="width: 100%; margin-left: 10px;">
                            <label for="date" class="form-label">Data</label>
                            <input type="date" name="date" class="form-control" id="date" value="<?php echo date('Y-m-d'); ?>" readonly required>
                        </div>
                    </div>

                    <hr class="separador mt-4">

                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Título do post" required>
                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">Resumo</label>
                        <textarea name="summary" class="form-control" id="summary" rows="2" placeholder="Escreva um breve resumo aqui..." style="resize: none" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Content" class="form-label">Conteúdo</label>
                        <textarea name="content" class="form-control" id="Content" rows="4" placeholder="Escreva o texto aqui..." style="resize: none" required></textarea>
                    </div>

                    <div class="mb-3 d-flex justify-content-start">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="category1" class="form-label">Categoria 1</label>
                            <select name="category1" class="form-select" id="category1" required>
                                <option value="actividade-fisica">Atividade física</option>
                                <option value="alimentacao">Alimentação saudável</option>
                                <option value="alimentacao-esportiva">Alimentação esportiva</option>
                                <option value="bem-estar">Bem-estar</option>
                                <option value="curiosidades">Curiosidades sobre alimentos</option>
                                <option value="dicas">Dicas práticas</option>
                                <option value="educacao">Educação nutricional</option>
                                <option value="fitoterapia">Fitoterapia e chás medicinais</option>
                                <option value="ganho-de-massa">Ganho de massa</option>
                                <option value="hidratação">Hidratação</option>
                                <option value="alimentacao-infantil">Nutrição infantil</option>
                                <option value="perda-de-peso">Perda de peso</option>
                                <option value="planejamento">Planejamento de refeições</option>
                                <option value="receitas">Receitas</option>
                                <option value="saude-mental">Saúde mental</option>
                                <option value="suplementos">Suplementação alimentar</option>
                                <option value="" disabled selected>---</option>
                            </select>
                        </div>

                        <div style="width: 100%; margin-left: 10px;">
                            <label for="category2" class="form-label">Categoria 2 (opcional)</label>
                            <select name="category2" class="form-select" id="category2">
                                <option value="actividade-fisica">Atividade física</option>
                                <option value="alimentacao">Alimentação saudável</option>
                                <option value="alimentacao-esportiva">Alimentação esportiva</option>
                                <option value="bem-estar">Bem-estar</option>
                                <option value="curiosidades">Curiosidades sobre alimentos</option>
                                <option value="dicas">Dicas práticas</option>
                                <option value="educacao">Educação nutricional</option>
                                <option value="fitoterapia">Fitoterapia e chás medicinais</option>
                                <option value="ganho-de-massa">Ganho de massa</option>
                                <option value="hidratação">Hidratação</option>
                                <option value="alimentacao-infantil">Nutrição infantil</option>
                                <option value="perda-de-peso">Perda de peso</option>
                                <option value="planejamento">Planejamento de refeições</option>
                                <option value="receitas">Receitas</option>
                                <option value="saude-mental">Saúde mental</option>
                                <option value="suplementos">Suplementação alimentar</option>
                                <option value="" selected>---</option>
                            </select>
                        </div>
                    </div>

                    <hr class="separador mt-4">

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagem</label>
                        <input id="image-0" type="file" class="form-control" name="image" accept="image/*" onchange="loadFile(event, 0)" required>
                        <img id="output-0" class="img-fluid mb-3 rounded" />
                    </div>

                    <div class="mb-3 d-flex justify-content-start">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="image_alt" class="form-label">Texto alternativo</label>
                            <input type="text" name="image_alt" class="form-control" id="image_alt" placeholder="Descreva a imagem">
                        </div>

                        <div style="width: 100%; margin-left: 10px;">
                            <label for="image_source" class="form-label">Fonte da imagem</label>
                            <input type="text" name="image_source" class="form-control" id="image_source" placeholder="Ex: Unsplash / Autor / Link">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn modal-botao" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn modal-botao">Confirmar</button>
                </div>

            </form>
        </div>
    </div>
</div>