<?php require('app/views/components/autentication.php'); ?>

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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriFácil - Área Administrativa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/dashboard-style.css">
    <link rel="stylesheet" href="/public/css/sidebar-style.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

<?php require('app/views/components/sidebar.php'); ?>

<div class="titulo-principal d-flex justify-content-center mb-5 mt-2">
    <h2 class="titulo-dash">Área Administrativa</h2>
</div>

<!-- CARDS PRINCIPAIS -->
<div class="container mb-5">
    <div class="d-flex justify-content-center flex-wrap">

        <div class="mx-5 mb-3">
            <div class="card text-center dashboard-card">
                <div class="card-body rounded">
                    <h5>Usuários Cadastrados</h5>
                    <h3><?= count($users) ?></h3>
                    <a href="/usuarios" class="btn botao-posts mb-2" title="Acessar o Gerenciamento de Usuários">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(55, 55, 55)"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" /></svg>
                        <span class="span-text">Gerenciar</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="mx-5">
            <div class="card text-center dashboard-card">
                <div class="card-body rounded">
                    <h5>Número de Posts</h5>
                    <h3><?= count($posts) ?></h3>
                    <a href="/posts" class="btn botao-posts mb-2" title="Acessar o Gerenciamento de Usuários">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(55, 55, 55)"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" /></svg>
                        <span class="span-text">Gerenciar</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="posts-title">

    <div class="titulo-geral d-flex justify-content-center">
        <h2>Informações Gerais</h2>
    </div>

    <div class="info-body d-flex justify-content-center flex-wrap p-4 gap-6">

        <div class="info-box">
            <h4>Posts no Último Mês</h4>
            <hr>
            <p class="info-number"><?= $lastMonthPosts ?></p>
        </div>

        <div class="info-box">
            <h4>Usuários com Mais Posts</h4>
            <hr>
            <?php foreach ($topUsers as $user): ?>
                <p><?= $user->author ?> (<?= $user->total ?>)</p>
            <?php endforeach; ?>
        </div>

        <div class="info-box">
            <h4>Categorias Mais Usadas</h4>
            <hr>
            <?php foreach ($topCategories as $cat): ?>
                <p>
                    <?= $categories_map[$cat->categoria] ?? ucfirst($cat->categoria) ?>
                    (<?= $cat->total ?>)
                </p>
            <?php endforeach; ?>
        </div>

        <div class="info-box">
            <h4>Categorias Menos Usadas</h4>
            <hr>
                <?php foreach ($lowCategories as $cat): ?>
                    <p>
                        <?= $categories_map[$cat->categoria] ?? ucfirst($cat->categoria) ?>
                        (<?= $cat->total ?>)
                    </p>
                <?php endforeach; ?>
        </div>

    </div>
</div>

<div class="posts-title">

    <div class="titulo-posts d-flex justify-content-center">
        <h2>Últimos Posts</h2>
    </div>

    <div class="posts-body d-flex justify-content-center flex-wrap">

        <?php foreach (array_slice($posts, 0, 4) as $post): ?>
            <div class="card mx-2 post-card">
                <img src="/<?= $post->image ?>" class="card-img-top fixed-height-image">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5><?= $post->title ?></h5>
                    <p><?= date('d/m/Y', strtotime($post->date)) ?></p>
                    <a href="/post/<?php echo $post->id ?>" class="btn d-flex align-items-center botao-posts" title="Acessar postagem completa">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(55, 55, 55)"><path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>
                        <span class="span-text">Post Completo</span>
                    </a>
                </div>

            </div>
        <?php endforeach; ?>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>