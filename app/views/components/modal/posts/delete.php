<div class="modal fade" id="modal-delete-<?php echo $post->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/posts/delete" method="POST">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Post</h1>
                    <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close" tittle="Fechar modal">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                    </button>
                </div>
                <div class="modal-body delete-conteudo">
                    <p>Tem certeza que deseja deletar este post?</p>
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modal-botao" data-bs-dismiss="modal" title="Fechar modal">Fechar</button>
                    <button type="submit" class="btn modal-botao" title="Deletar postagem">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>