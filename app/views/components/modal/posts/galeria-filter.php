<div class="modal fade" id="modal-filter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <form action="/galeria/busca" method="GET">

                <?php if (!empty($_GET['search'])): ?>
                    <input type="hidden" name="search" value="<?= htmlspecialchars($_GET['search']) ?>">
                <?php endif; ?>

                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5">Filtrar por Categorias</h1>

                    <button type="button" class="btn botao-fechar" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28" fill="#FFFFFF">
                            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                        </svg>
                    </button>
                </div>

                <div class="modal-body my-4 text-center">

                    <?php
                        $categories_map = [
                            "actividade-fisica" => "Atividade física",
                            "alimentacao" => "Alimentação saudável",
                            "alimentacao-esportiva" => "Alimentação esportiva",
                            "alimentacao-infantil" => "Nutrição infantil",
                            "bem-estar" => "Bem-estar",
                            "curiosidades" => "Curiosidades",
                            "dicas" => "Dicas práticas",
                            "educacao" => "Educação nutricional",
                            "fitoterapia" => "Fitoterapia",
                            "ganho-de-massa" => "Ganho de massa",
                            "hidratação" => "Hidratação",
                            "perda-de-peso" => "Perda de peso",
                            "planejamento" => "Planejamento",
                            "receitas" => "Receitas",
                            "saude-mental" => "Saúde mental",
                            "suplementos" => "Suplementos"
                        ];

                        $selected = $_GET['categorias'] ?? [];
                    ?>

                    <div class="d-flex flex-wrap justify-content-center gap-2">

                        <?php foreach ($categories_map as $slug => $name): ?>

                            <div>

                                <input
                                    type="checkbox"
                                    name="categorias[]"
                                    value="<?= $slug ?>"
                                    id="cat-<?= $slug ?>"
                                    class="filter-checkbox"
                                    <?= in_array($slug, $selected) ? 'checked' : '' ?>
                                >

                                <label for="cat-<?= $slug ?>" class="filter-label">
                                    <?= $name ?>
                                </label>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn modal-botao" data-bs-dismiss="modal">
                        Fechar
                    </button>

                    <button type="submit" class="btn modal-botao">
                        Confirmar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>