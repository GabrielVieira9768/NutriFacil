<div class="modal fade" id="modal-expand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Imagem Expandida</h1>
                <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="/<?= $post->image; ?>" class="rounded img-fluid" alt="Imagem do post ampliada">
            </div>
        </div>
    </div>
</div>