<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriFácil - Galeria de Posts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/public/css/galeria-style.css">
    <link rel="stylesheet" href="/public/css/navbar-style.css">
    <link rel="stylesheet" href="/public/css/pagination-style.css">
    <link rel="stylesheet" href="/public/css/footer-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

<?php require('app/views/components/navbar.php'); ?>

<div class="mb-5">

    <div class="text-center my-5">
        <h1 class="titulo-galeria">Galeria de Posts</h1>
    </div>

    <div class="d-flex justify-content-center mb-5 mx-auto" style="max-width: 540px;">

        <form action="/galeria/busca" method="GET" class="d-flex w-100">

            <div class="input-group">

                <input type="search"
                    name="search"
                    class="form-control input-pesquisa"
                    placeholder="Pesquisar..."
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

                <?php if (!empty($_GET['categorias'])): ?>
                    <?php foreach ($_GET['categorias'] as $cat): ?>
                        <input type="hidden" name="categorias[]" value="<?= htmlspecialchars($cat) ?>">
                    <?php endforeach; ?>
                <?php endif; ?>

                <button class="btn search-botao" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                </button>

            </div>

            <button class="btn search-botao ms-3"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-filter"
                    type="button">

                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 640 640"><path d="M96 128C83.1 128 71.4 135.8 66.4 147.8C61.4 159.8 64.2 173.5 73.4 182.6L256 365.3L256 480C256 488.5 259.4 496.6 265.4 502.6L329.4 566.6C338.6 575.8 352.3 578.5 364.3 573.5C376.3 568.5 384 556.9 384 544L384 365.3L566.6 182.7C575.8 173.5 578.5 159.8 573.5 147.8C568.5 135.8 556.9 128 544 128L96 128z"/></svg>

            </button>

        </form>

    </div>

</div>

<?php require('app/views/components/modal/posts/galeria-filter.php'); ?>

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
?>

<?php if (!empty($posts)) : ?>

<div class="d-flex justify-content-center flex-wrap mx-4 mb-2">

    <?php foreach ($posts as $post) : ?>

        <a href="/post/<?= $post->id ?>"
        class="mx-2 mb-3 card-post text-decoration-none text-dark">

            <div class="card borda-post" style="height: 200px; width: 660px;">

                <img src="/<?= htmlspecialchars($post->image) ?>"
                    class="card-img-left fixed-width-image rounded-start"
                    alt="Imagem do post">

                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <h5 style="color: #ffffff;">
                            <?= htmlspecialchars($post->title) ?>
                        </h5>

                        <p class="conteudo">
                            <?= htmlspecialchars($post->summary) ?>
                        </p>
                    </div>

                    <div>

                        <div class="d-flex justify-content-end">
                            <small>
                                <?= htmlspecialchars($post->author) ?>
                                —
                                <?= date('d/m/Y', strtotime($post->date)) ?>
                            </small>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-2">

                            <?php if (!empty($post->category1)) : ?>
                                <span class="category">
                                    <?= htmlspecialchars($categories_map[$post->category1] ?? $post->category1) ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($post->category2)) : ?>
                                <span class="category">
                                    <?= htmlspecialchars($categories_map[$post->category2] ?? $post->category2) ?>
                                </span>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </a>

    <?php endforeach; ?>

</div>

<?php else : ?>

    <div class="d-flex justify-content-center align-items-center h5">

        <svg xmlns="http://www.w3.org/2000/svg"
        height="32"
        viewBox="0 -960 960 960"
        width="32"
        fill="#333e50"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Z"/>

        </svg>

    &nbsp;Nenhum post encontrado!

    </div>

<?php endif; ?>

<?php
    if (!empty($pagination) && !empty($posts)) {
        require('app/views/components/pagination.php');
    }
?>

<?php require('app/views/components/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.querySelector('#modal-filter form').addEventListener('submit', function () {
        const searchValue = document.querySelector('input[name="search"]').value;
        document.getElementById('modal-search').value = searchValue;
    });
</script>

</body>
</html>
