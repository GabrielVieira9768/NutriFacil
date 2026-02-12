<?php require('app/views/components/autentication.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NutriFácil - Área Administrativa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/dashboard-style.css">
    <link rel="stylesheet" href="/public/css/sidebar-style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php require('app/views/components/sidebar.php'); ?>

    <div class="titulo-principal d-flex justify-content-center mb-5 mt-2">
        <header>
            <h2 class="titulo-dash">Área Administrativa</h2>
        </header>
    </div>

    <div class="container mb-5">
        <div class="d-flex justify-content-center flex-wrap">
            <div class="mx-5 mb-3">
                <div class="card text-center" style="width: 16rem;">
                    <div class="card-body rounded">
                        <h5 class="card-title">Usuários Cadastrados</h5>
                        <h3 class="card-text"><?php echo count($users) ?></h3>
                        <a href="/usuarios" class="btn botao-posts mb-2" title="Acessar o Gerenciamento de Usuários">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(55, 55, 55)">
                                <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                            </svg>
                            <span class="span-text">Gerenciar</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mx-5">
                <div class="card text-center" style="width: 16rem;">
                    <div class="card-body rounded">
                        <h5 class="card-title">Número de Posts</h5>
                        <h3 class="card-text"><?php echo count($posts) ?></h3>
                        <a href="posts" class="btn botao-posts mb-2" title="Acessar o Gerenciamento de Posts">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(55, 55, 55)">
                                <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                            </svg>
                            <span class="span-text">Gerenciar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="posts-title">
        <div class="titulo-posts d-flex justify-content-center">
            <h2>
                Informações Gerais
            </h2>
        </div>
        <div class="info-body d-flex justify-content-center flex-wrap">

        </div>
    </div>
    <div class="posts-title">
        <div class="titulo-posts d-flex justify-content-center">
            <h2>
                Últimos Posts
            </h2>
        </div>
        <div class="posts-body d-flex justify-content-center flex-wrap">
            <?php foreach (array_slice($posts, 0, 4) as $post) : ?>
                <div class="card mx-2" style="width: 18rem;">
                    <img src="/<?= $post->image; ?>" class="card-img-top fixed-height-image" alt="Imagem do post">

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <p class="card-text"><?php echo date('d/m/Y', strtotime($post->date)); ?></p>

                        <div class="d-flex flex-column align-items-center mt-auto">

                            <a href="/post/<?php echo $post->id ?>"
                            class="btn d-flex align-items-center botao-posts"
                            title="Acessar postagem completa">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    height="24px"
                                    viewBox="0 -960 960 960"
                                    width="24px"
                                    fill="rgb(55, 55, 55)">
                                    <path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/>
                                </svg>

                                <span class="span-text">Post Completo</span>

                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../../public/js/input-img.js"></script>

</html>