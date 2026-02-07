<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NutriFácil - Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/index-style.css">
    <link rel="stylesheet" href="/public/css/navbar-style.css">
    <link rel="stylesheet" href="/public/css/footer-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php require('app/views/components/navbar.php'); ?>

    <div class="d-flex justify-content-center my-5 secao-principal text-center">
        <img class="imagem-principal rounded" src="public/assets/logo-name.png" alt="Logo da NutriFácil">
        <div class="slogan d-flex align-items-center mb-5">
            <div>
                <h1 class="titulo-principal">NutriFácil</h1>
                <p>Promovendo hábitos alimentares saudáveis e educação nutricional. Descubra dicas práticas e receitas para uma vida equilibrada!</p>
            </div>
        </div>
    </div>

    <div class="mb-5 secao-publicacoes">
        <div class="d-flex justify-content-center mb-4">
            <h2 class="title-publicacoes">
                Publicações Recentes
            </h2>
        </div>
        <div class="d-flex justify-content-center flex-wrap mx-4">
            <?php foreach (array_slice($posts, 0, 3) as $post) : ?>
                <div class="card mx-3 mb-3 card-post">
                    <img src="/<?= $post->image; ?>" class="card-img-top fixed-height-image" alt="Imagem do post">
                    <div class="card-body rounded d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <div class="d-flex justify-content-between author-date">
                            <p class="text-body-secondary"><?= $post->author ?></p>
                            <p class="text-body-secondary"><?= date('d/m/Y', strtotime($post->date)); ?></p>
                        </div>
                        <!-- Outros conteúdos do post, se houver -->
                        <div class="d-flex flex-column align-items-center mt-auto">
                            <form method="post" action="post">
                                <input type="hidden" name="id" value="<?php echo $post->id ?>">
                                <button type="submit" class="btn d-flex align-items-center botao-index">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white">
                                        <path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
                                    </svg>
                                    <span class="span-text">Post Completo</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-center m-5 secao-sobre">
            <div class="texto-sobre">
                <h2 class="mb-4 titulo-sobre">O Projeto</h2>
                <p>NutriFácil é uma plataforma dedicada a promover educação nutricional, fornecendo informações confiáveis sobre alimentação saudável e hábitos de vida equilibrados. Nosso foco é tornar o conhecimento sobre nutrição acessível e aplicável para todos, independentemente do nível de experiência ou conhecimento prévio.</p>
                <p>Nosso objetivo é ajudar cada indivíduo a compreender melhor a importância dos nutrientes, planejar refeições balanceadas e adotar um estilo de vida mais saudável, sempre com dicas práticas e acessíveis para o dia a dia. Acreditamos que pequenas mudanças nos hábitos alimentares podem ter um grande impacto na saúde e bem-estar a longo prazo.</p>
                <p>Além de orientações nutricionais, a plataforma oferece conteúdos educativos, sugestões de cardápios, informações sobre alimentos e receitas adaptáveis, tudo pensado para facilitar a integração de hábitos saudáveis na rotina de cada pessoa. Nosso compromisso é empoderar os usuários com conhecimento, promovendo escolhas conscientes e sustentáveis, contribuindo para uma vida mais equilibrada e plena.</p>
            </div>
            <div class="slogan d-flex align-items-center">
                <img style="max-width: 460px;" src="public/assets/sobre-image.png" alt="Logo da Game Over" class="rounded">
            </div>
        </div>
    </div>

    <?php require('app/views/components/footer.php'); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>