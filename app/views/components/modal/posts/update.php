<div class="modal fade" id="modal-update-<?php echo $post->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="/posts/update" method="POST">

                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5">Editar Post</h1>
                    <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
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
                            <label class="form-label">Categoria 1</label>
                            <select name="category1" class="form-select" required>
                                <option value="alimentacao" <?= $post->category1 == 'alimentacao' ? 'selected' : '' ?>>Alimentação saudável</option>
                                <option value="educacao" <?= $post->category1 == 'educacao' ? 'selected' : '' ?>>Educação nutricional</option>
                                <option value="receitas" <?= $post->category1 == 'receitas' ? 'selected' : '' ?>>Receitas</option>
                                <option value="bem-estar" <?= $post->category1 == 'bem-estar' ? 'selected' : '' ?>>Bem-estar</option>
                                <option value="dicas" <?= $post->category1 == 'dicas' ? 'selected' : '' ?>>Dicas práticas</option>
                            </select>
                        </div>

                        <div style="width: 100%; margin-left: 10px;">
                            <label class="form-label">Categoria 2</label>
                            <select name="category2" class="form-select">
                                <option value="">---</option>
                                <option value="alimentacao" <?= $post->category2 == 'alimentacao' ? 'selected' : '' ?>>Alimentação saudável</option>
                                <option value="educacao" <?= $post->category2 == 'educacao' ? 'selected' : '' ?>>Educação nutricional</option>
                                <option value="receitas" <?= $post->category2 == 'receitas' ? 'selected' : '' ?>>Receitas</option>
                                <option value="bem-estar" <?= $post->category2 == 'bem-estar' ? 'selected' : '' ?>>Bem-estar</option>
                                <option value="dicas" <?= $post->category2 == 'dicas' ? 'selected' : '' ?>>Dicas práticas</option>
                            </select>
                        </div>
                    </div>

                    <hr class="separador mt-4">

                    <div>
                        <label class="form-label">Imagem</label>
                        <input id="image-<?php echo $post->id; ?>" type="file" class="form-control" name="image" accept="image/*" onchange="loadFile(event, <?php echo $post->id; ?>)">
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
                    <button type="button" class="btn modal-botao" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn modal-botao">Confirmar</button>
                </div>

            </form>
        </div>
    </div>
</div>