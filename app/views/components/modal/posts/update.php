<div class="modal fade" id="modal-update-<?php echo $post->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="/posts/update" method="POST">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5">Editar Post</h1>
                    <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close" tittle="Fechar modal">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF">
                            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                        </svg>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-3 d-flex justify-content-start">
                        <div style="width: 100%; margin-right: 10px;">
                            <label class="form-label">Autor</label>
                            <input value="<?php echo $post->author; ?>" type="text" name="author" class="form-control" readonly>
                        </div>
                        <div style="width: 100%; margin-left: 10px;">
                            <label class="form-label">Data</label>
                            <input value="<?php echo $post->date; ?>" type="date" name="date" class="form-control" required>
                        </div>
                    </div>

                    <hr class="separador mt-4">

                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input value="<?php echo $post->title; ?>" type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Resumo</label>
                        <textarea name="summary" class="form-control" rows="2" style="resize: none" required><?php echo $post->summary; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Conteúdo</label>
                        <textarea name="content" class="form-control" rows="4" style="resize: none" required><?php echo $post->content; ?></textarea>
                    </div>

                    <div class="mb-3 d-flex justify-content-start">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="category1" class="form-label">Categoria 1</label>
                            <select name="category1" class="form-select" id="category1" required>
                                <option value="actividade-fisica" <?= $post->category1 == 'actividade-fisica' ? 'selected' : '' ?>>Atividade física</option>
                                <option value="alimentacao" <?= $post->category1 == 'alimentacao' ? 'selected' : '' ?>>Alimentação saudável</option>
                                <option value="alimentacao-esportiva" <?= $post->category1 == 'alimentacao-esportiva' ? 'selected' : '' ?>>Alimentação esportiva</option>
                                <option value="bem-estar" <?= $post->category1 == 'bem-estar' ? 'selected' : '' ?>>Bem-estar</option>
                                <option value="curiosidades" <?= $post->category1 == 'curiosidades' ? 'selected' : '' ?>>Curiosidades sobre alimentos</option>
                                <option value="dicas" <?= $post->category1 == 'dicas' ? 'selected' : '' ?>>Dicas práticas</option>
                                <option value="educacao" <?= $post->category1 == 'educacao' ? 'selected' : '' ?>>Educação nutricional</option>
                                <option value="fitoterapia" <?= $post->category1 == 'fitoterapia' ? 'selected' : '' ?>>Fitoterapia e chás medicinais</option>
                                <option value="ganho-de-massa" <?= $post->category1 == 'ganho-de-massa' ? 'selected' : '' ?>>Ganho de massa</option>
                                <option value="hidratação" <?= $post->category1 == 'hidratação' ? 'selected' : '' ?>>Hidratação</option>
                                <option value="alimentacao-infantil" <?= $post->category1 == 'alimentacao-infantil' ? 'selected' : '' ?>>Nutrição infantil</option>
                                <option value="perda-de-peso" <?= $post->category1 == 'perda-de-peso' ? 'selected' : '' ?>>Perda de peso</option>
                                <option value="planejamento" <?= $post->category1 == 'planejamento' ? 'selected' : '' ?>>Planejamento de refeições</option>
                                <option value="receitas" <?= $post->category1 == 'receitas' ? 'selected' : '' ?>>Receitas</option>
                                <option value="saude-mental" <?= $post->category1 == 'saude-mental' ? 'selected' : '' ?>>Saúde mental</option>
                                <option value="suplementos" <?= $post->category1 == 'suplementos' ? 'selected' : '' ?>>Suplementação alimentar</option>
                            </select>
                        </div>

                        <div style="width: 100%; margin-left: 10px;">
                            <label for="category2" class="form-label">Categoria 2 (opcional)</label>
                            <select name="category2" class="form-select" id="category2">
                                <option value="actividade-fisica" <?= $post->category2 == 'actividade-fisica' ? 'selected' : '' ?>>Atividade física</option>
                                <option value="alimentacao" <?= $post->category2 == 'alimentacao' ? 'selected' : '' ?>>Alimentação saudável</option>
                                <option value="alimentacao-esportiva" <?= $post->category2 == 'alimentacao-esportiva' ? 'selected' : '' ?>>Alimentação esportiva</option>
                                <option value="bem-estar" <?= $post->category2 == 'bem-estar' ? 'selected' : '' ?>>Bem-estar</option>
                                <option value="curiosidades" <?= $post->category2 == 'curiosidades' ? 'selected' : '' ?>>Curiosidades sobre alimentos</option>
                                <option value="dicas" <?= $post->category2 == 'dicas' ? 'selected' : '' ?>>Dicas práticas</option>
                                <option value="educacao" <?= $post->category2 == 'educacao' ? 'selected' : '' ?>>Educação nutricional</option>
                                <option value="fitoterapia" <?= $post->category2 == 'fitoterapia' ? 'selected' : '' ?>>Fitoterapia e chás medicinais</option>
                                <option value="ganho-de-massa" <?= $post->category2 == 'ganho-de-massa' ? 'selected' : '' ?>>Ganho de massa</option>
                                <option value="hidratação" <?= $post->category2 == 'hidratação' ? 'selected' : '' ?>>Hidratação</option>
                                <option value="alimentacao-infantil" <?= $post->category2 == 'alimentacao-infantil' ? 'selected' : '' ?>>Nutrição infantil</option>
                                <option value="perda-de-peso" <?= $post->category2 == 'perda-de-peso' ? 'selected' : '' ?>>Perda de peso</option>
                                <option value="planejamento" <?= $post->category2 == 'planejamento' ? 'selected' : '' ?>>Planejamento de refeições</option>
                                <option value="receitas" <?= $post->category2 == 'receitas' ? 'selected' : '' ?>>Receitas</option>
                                <option value="saude-mental" <?= $post->category2 == 'saude-mental' ? 'selected' : '' ?>>Saúde mental</option>
                                <option value="suplementos" <?= $post->category2 == 'suplementos' ? 'selected' : '' ?>>Suplementação alimentar</option>
                                <option value="" <?= $post->category2 == '' ? 'selected' : '' ?>>---</option>
                            </select>
                        </div>
                    </div>

                    <hr class="separador mt-4">

                    <div class="mb-3">
                        <label class="form-label">Imagem</label>
                        <input id="image-<?php echo $post->id; ?>" type="file" class="form-control mb-3" name="image" accept="image/*" onchange="loadFile(event, <?php echo $post->id; ?>)">
                        <img src="/<?= $post->image; ?>" id="output-<?php echo $post->id; ?>" class="img-fluid mb-3 rounded"/>
                    </div>

                    <div class="mb-3 d-flex justify-content-start">
                        <div style="width: 100%; margin-right: 10px;">
                            <label class="form-label">Texto alternativo</label>
                            <input value="<?php echo $post->image_alt; ?>" type="text" name="image_alt" class="form-control">
                        </div>
                        <div style="width: 100%; margin-left: 10px;">
                            <label class="form-label">Fonte da imagem</label>
                            <input value="<?php echo $post->image_source; ?>" type="text" name="image_source" class="form-control">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?= $post->id ?>">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn modal-botao" data-bs-dismiss="modal" title="Fechar modal">Fechar</button>
                    <button type="submit" class="btn modal-botao" title="Atualizar postagem">Confirmar</button>
                </div>

            </form>
        </div>
    </div>
</div>