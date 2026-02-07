<div class="modal fade" id="modal-show-<?php echo $post->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Visualizar Post</h1>
                <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close" tittle="Fechar modal">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF">
                        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                    </svg>
                </button>
            </div>

            <div class="modal-body">

                <?php
                    $categories = [
                        "actividade-fisica" => "Atividade física",
                        "alimentacao" => "Alimentação saudável",
                        "alimentacao-esportiva" => "Alimentação esportiva",
                        "alimentacao-infantil" => "Nutrição infantil",
                        "bem-estar" => "Bem-estar",
                        "curiosidades" => "Curiosidades sobre alimentos",
                        "dicas" => "Dicas práticas",
                        "educacao" => "Educação nutricional",
                        "fitoterapia" => "Fitoterapia e chás medicinais",
                        "ganho-de-massa" => "Ganho de massa",
                        "hidratação" => "Hidratação",
                        "perda-de-peso" => "Perda de peso",
                        "planejamento" => "Planejamento de refeições",
                        "receitas" => "Receitas",
                        "saude-mental" => "Saúde mental",
                        "suplementos" => "Suplementação alimentar"
                    ];

                    $category1_text = $categories[$post->category1] ?? $post->category1;
                    $category2_text = $categories[$post->category2] ?? $post->category2;
                ?>

                <div class="mb-3 d-flex justify-content-start">
                    <div style="width: 100%; margin-right: 10px;">
                        <label class="form-label">Autor</label>
                        <input value="<?php echo $post->author; ?>" type="text" class="form-control" readonly>
                    </div>
                    <div style="width: 100%; margin-left: 10px;">
                        <label class="form-label">Data</label>
                        <input value="<?php echo date('d/m/Y', strtotime($post->date)); ?>" type="text" class="form-control" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input value="<?php echo $post->title; ?>" type="text" class="form-control" readonly>
                </div>

                <hr class="separador mt-4">

                <div class="mb-3">
                    <label class="form-label">Resumo</label>
                    <textarea class="form-control" rows="2" style="resize: none" readonly><?php echo $post->summary; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Conteúdo</label>
                    <textarea class="form-control" rows="4" style="resize: none" readonly><?php echo $post->content; ?></textarea>
                </div>

                <div class="mb-3 d-flex justify-content-start">
                    <div style="width: 100%; margin-right: 10px;">
                        <label class="form-label">Categoria 1</label>
                        <input value="<?php echo $category1_text; ?>" type="text" class="form-control" readonly>
                    </div>
                    <div style="width: 100%; margin-left: 10px;">
                        <label class="form-label">Categoria 2</label>
                        <input value="<?php echo $category2_text; ?>" type="text" class="form-control" readonly>
                    </div>
                </div>

                <hr class="separador mt-4">

                <div>
                    <label class="form-label">Imagem</label>
                    <img src="/<?= $post->image; ?>" alt="<?php echo $post->image_alt; ?>" class="img-fluid mb-3 rounded">
                </div>

                <div class="mb-3 d-flex justify-content-start">
                    <div style="width: 100%; margin-right: 10px;">
                        <label class="form-label">Texto alternativo</label>
                        <input value="<?php echo $post->image_alt; ?>" type="text" class="form-control" readonly>
                    </div>
                    <div style="width: 100%; margin-left: 10px;">
                        <label class="form-label">Fonte da imagem</label>
                        <input value="<?php echo $post->image_source; ?>" type="text" class="form-control" readonly>
                    </div>
                </div>

            </div>

            <div class="modal-footer"> 
                <button type="button" class="btn modal-botao" data-bs-dismiss="modal" title="Fechar modal">Fechar</button> 
                <form method="post" action="post"> <input type="hidden" name="id" value="<?php echo $post->id; ?>"> 
                    <button type="submit" class="btn modal-botao" title="Acessar postagem completa">Visualizar</button> 
                </form> 
            </div>

        </div>
    </div>
</div>