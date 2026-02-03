<div class="modal fade" id="modal-show-<?php echo $post->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Visualizar Post</h1>
                <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF">
                        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input value="<?php echo $post->title; ?>" type="text" name="title" class="form-control" id="title" readonly>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div style="width: 100%; margin-right: 10px;">
                        <label for="author" class="form-label">Autor</label>
                        <input value="<?php echo $post->author; ?>" type="text" name="author" class="form-control" id="author" readonly>
                    </div>
                    <div style="width: 100%; margin-left: 10px;">
                        <label for="date" class="form-label">Data</label>
                        <input value="<?php echo date('d/m/Y', strtotime($post->date)); ?>" type="text" name="date" class="form-control" id="date" readonly>
                    </div>
                </div>
                <div>
                    <label for="image" class="form-label">Imagem</label>
                    <img src="/<?= $post->image; ?>" id="image" class="img-fluid mb-3 rounded" />
                </div>
                <div class="mb-3">
                    <label for="Content" class="form-label">Conteúdo</label>
                    <textarea type="text" name="content" class="form-control" id="Content" rows="4" style="resize: none" readonly><?php echo $post->content; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn modal-botao" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>