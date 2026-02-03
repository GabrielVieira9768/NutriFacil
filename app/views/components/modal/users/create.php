<div class="modal fade" id="modal-adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/usuarios/create" method="POST">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Usuário</h1>
                    <button type="button" class="btn botao-fechar" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nome completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div style="margin-right: 10px;">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" class="form-control cpf-mask" maxlength="14" id="cpf" placeholder="000.000.000-00" required>
                        </div>
                        <div style="margin-left: 10px;">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" name="phone" class="form-control phone-mask" maxlength="15" id="phone" placeholder="(00) 00000-0000" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" id="password" required>
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