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

    <!-- 🔍 Busca -->

    <div class="d-flex justify-content-center mb-5 mx-auto" style="max-width: 540px;">

        <form action="/galeria/busca" method="GET" class="input-group">

            <input type="search"
                   name="search"
                   class="form-control input-pesquisa"
                   placeholder="Pesquisar...">

            <button class="btn search-botao" type="submit">

                <svg xmlns="http://www.w3.org/2000/svg"
                     height="24"
                     viewBox="0 -960 960 960"
                     width="24">
                    <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                </svg>

            </button>

        </form>

    </div>

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

                    <h5 style="color: #ffffff;"><?= htmlspecialchars($post->title) ?></h5>

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
         fill="#333e50">

        <path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Z"/>

    </svg>

    &nbsp;Nenhum post encontrado!

</div>

<?php endif; ?>

<?php
if (!empty($pagination) && !empty($posts)) {
    require('app/views/components/pagination.php');
}
?>

</div>

<?php require('app/views/components/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>