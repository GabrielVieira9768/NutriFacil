<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NutriFácil - <?= htmlspecialchars($postInd->title) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/public/css/post-individual-style.css">
    <link rel="stylesheet" href="/public/css/navbar-style.css">
    <link rel="stylesheet" href="/public/css/footer-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

<?php require('app/views/components/navbar.php'); ?>

<div class="container my-5">

    <div class="row">

        <div class="col-md-7">

            <h2 class="post-title"><?= htmlspecialchars($postInd->title) ?></h2>

            <p class="text-body-secondary">
                <?= htmlspecialchars($postInd->summary) ?>
            </p>

            <?php
            $categories_map = [
                "actividade-fisica" => "Atividade física",
                "alimentacao" => "Alimentação saudável",
                "alimentacao-esportiva" => "Alimentação esportiva",
                "alimentacao-infantil" => "Nutrição infantil",
                "bem-estar" => "Bem-estar",
                "curiosidades" => "Curiosidades sobre alimentos",
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

            $category1_text = $categories_map[$postInd->category1] ?? $postInd->category1;
            $category2_text = $categories_map[$postInd->category2] ?? $postInd->category2;
            ?>

            <div class="d-flex justify-content-between mb-3">

                <small class="text-body-secondary">
                    <?= htmlspecialchars($postInd->author) ?>
                    —
                    <?= date('d/m/Y', strtotime($postInd->date)) ?>
                </small>

                <div class="d-flex gap-2">

                    <?php if (!empty($postInd->category1)) : ?>
                        <span class="category"><?= htmlspecialchars($category1_text) ?></span>
                    <?php endif; ?>

                    <?php if (!empty($postInd->category2)) : ?>
                        <span class="category"><?= htmlspecialchars($category2_text) ?></span>
                    <?php endif; ?>

                </div>

            </div>

            <?php
            $linhas = explode("\n", $postInd->content);

            foreach ($linhas as $linha) {
                $linha = trim($linha);
                if (!empty($linha)) {
                    echo '<p class="conteudo">'
                        . nl2br(htmlspecialchars($linha))
                        . '</p>';
                }
            }
            ?>

        </div>

        <div class="col-md-5">

            <div class="position-relative">

                <img src="/<?= htmlspecialchars($postInd->image) ?>"
                     class="img-fluid rounded"
                     alt="<?= htmlspecialchars($postInd->image_alt) ?>">

                <p class="fonte-rotulo my-1 mx-2">
                    Fonte: <?= htmlspecialchars($postInd->image_source) ?>
                </p>

                <button class="btn position-absolute top-0 end-0 mt-2 me-2 botao-expand"
                        data-bs-toggle="modal"
                        data-bs-target="#modal-expand">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         height="18"
                         viewBox="0 -960 960 960"
                         width="18"
                         fill="white">
                        <path d="M120-120v-320h80v184l504-504H520v-80h320v320h-80v-184L256-200h184v80H120Z"/>
                    </svg>

                </button>

                <?php require('app/views/components/modal/image/expand.php'); ?>

            </div>

        </div>

    </div>

</div>

<button id="btn-topo" class="btn-topo">

    <svg xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 640 640"
         width="24"
         height="24"
         fill="white">
        <path d="M342.6 81.4L137.3 241.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L288 181.3V552c0 17.7 14.3 32 32 32s32-14.3 32-32V181.3l105.4 105.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L342.6 81.4z"/>
    </svg>

</button>

<div class="secao-publicacoes">

    <div class="d-flex justify-content-center">
        <h2 class="title-publicacoes">Confira Também</h2>
    </div>

    <div class="d-flex justify-content-center flex-wrap mx-4">

        <?php foreach ($recentPosts as $recent_post) : ?>

            <a href="/post/<?= $recent_post->id ?>"
               class="card mx-3 mb-3 card-post text-decoration-none d-flex flex-column">

                <img src="/<?= htmlspecialchars($recent_post->image) ?>"
                     class="card-img-top fixed-height-image"
                     alt="Imagem do post">

                <div class="card-body">

                    <h5><?= htmlspecialchars($recent_post->title) ?></h5>

                    <div class="d-flex justify-content-end gap-2">

                        <?php if (!empty($recent_post->category1)) : ?>
                            <span class="category">
                                <?= htmlspecialchars($categories_map[$recent_post->category1] ?? $recent_post->category1) ?>
                            </span>
                        <?php endif; ?>

                        <?php if (!empty($recent_post->category2)) : ?>
                            <span class="category">
                                <?= htmlspecialchars($categories_map[$recent_post->category2] ?? $recent_post->category2) ?>
                            </span>
                        <?php endif; ?>

                    </div>

                </div>

            </a>

        <?php endforeach; ?>

    </div>

</div>

<?php require('app/views/components/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const btnTopo = document.getElementById('btn-topo');

window.addEventListener('scroll', () => {
    btnTopo.style.display =
        window.scrollY > 100 ? 'flex' : 'none';
});

btnTopo.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
</script>

</body>
</html>