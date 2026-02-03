<div class="modal fade" id="modal-adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="/posts/create" method="POST">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Novo Post</h1>
                    <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Título do post" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-start">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="author" class="form-label">Autor</label>
                            <input value="<?php echo $_SESSION['auth'][0]->name ?>" type="text" name="author" class="form-control" id="author" placeholder="Autor do post" required readonly>
                        </div>
                        <div style="width: 100%; margin-left: 10px;">
                            <label for="date" class="form-label">Data</label>
                            <input type="date" name="date" class="form-control" id="date" required>
                        </div>
                    </div>
                    <div>
                        <label for="image" class="form-label">Imagem</label>
                        <input id="image-0" type="file" class="form-control" name="image" accept="image/*" onchange="loadFile(event, 0)" required>
                        <img id="output-0" class="img-fluid mb-3 rounded" />
                    </div>
                    <div class="mb-3">
                        <label for="Content" class="form-label">Conteúdo</label>
                        <textarea type="text" name="content" class="form-control" id="Content" rows="4" placeholder="Escreva o texto aqui..." style="resize: none" required></textarea>
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