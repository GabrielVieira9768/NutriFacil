<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NutriFácil - <?php echo $postInd->title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/post-individual-style.css">
    <link rel="stylesheet" href="/public/css/navbar-style.css">
    <link rel="stylesheet" href="/public/css/footer-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php require('app/views/components/navbar.php'); ?>

    <div class="container my-5">
        <div class="text-container">
            <div class="row">
                <div class="col-md-7">

                    <h2 class="text-left post-title"><?php echo $postInd->title ?></h2>
                    <p class="card-text author-date text-body-secondary"><?php echo $postInd->summary ?></p>

                    <?php
                    // Mapeamento para mostrar categorias amigáveis
                    $categories_map = [
                        "actividade-fisica" => "Atividade física",
                        "alimentacao" => "Alimentação saudável",
                        "alimentacao-esportiva" => "Alimentação esportiva",
                        "alimentacao-infantil" => "Nutrição infantil",
                        "bem-estar" => "Bem-estar",
                        "curiosidades" => "Curiosidades sobre alimentos",
                        "dicas" => "Dicas práticas",
                        "educacao" => "Educação nutricional",
                        "fitoterapia" => "Fitoterapia e chás medicinais",
                        "ganho-de-massa" => "Ganho de massa",
                        "hidratação" => "Hidratação",
                        "perda-de-peso" => "Perda de peso",
                        "planejamento" => "Planejamento de refeições",
                        "receitas" => "Receitas",
                        "saude-mental" => "Saúde mental",
                        "suplementos" => "Suplementação alimentar"
                    ];

                    $category1_text = $categories_map[$postInd->category1] ?? $postInd->category1;
                    $category2_text = $categories_map[$postInd->category2] ?? $postInd->category2;
                    ?>

                    <div class="post-info d-flex justify-content-between align-items-center mb-3">
                        <div class="author-date">
                            <small class="text-body-secondary"><?= $postInd->author ?> - <?= date('d/m/Y', strtotime($postInd->date)); ?></small>
                        </div>
                        <div class="categories d-flex gap-2">
                            <?php if(!empty($postInd->category1)) : ?>
                                <span class="category"><?= $category1_text ?></span>
                            <?php endif; ?>
                            <?php if(!empty($postInd->category2)) : ?>
                                <span class="category"><?= $category2_text ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php
                    $linhas = explode("\n", $postInd->content);

                    foreach ($linhas as $linha) {
                        $linha = trim($linha);
                        if (!empty($linha)) {
                            echo '<p class="card-text conteudo">' . nl2br($linha) . '</p>';
                        }
                    }
                    ?>

                </div>

                <div class="col-md-5 d-flex justify-content-end mb-2">
                    <div class="image-container position-relative">
                        <img src="/<?= $postInd->image; ?>" class="img-fluid rounded" alt="<?= $postInd->image_alt ?>">
                        <p class="fonte-rotulo my-1 mx-2">Fonte: <?= $postInd->image_source ?></p>
                        <button class="btn position-absolute top-0 end-0 mt-2 me-2 botao-expand" title="Expandir Imagem" data-bs-toggle="modal" data-bs-target="#modal-expand">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="white">
                                <path d="M120-120v-320h80v184l504-504H520v-80h320v320h-80v-184L256-200h184v80H120Z" />
                            </svg>
                        </button>
                        <?php require('app/views/components/modal/image/expand.php'); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <button id="btn-topo" class="btn-topo" title="Voltar ao topo">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24" height="24" fill="white">
            <path d="M342.6 81.4C330.1 68.9 309.8 68.9 297.3 81.4L137.3 241.4C124.8 253.9 124.8 274.2 137.3 286.7C149.8 299.2 170.1 299.2 182.6 286.7L288 181.3L288 552C288 569.7 302.3 584 320 584C337.7 584 352 569.7 352 552L352 181.3L457.4 286.7C469.9 299.2 490.2 299.2 502.7 286.7C515.2 274.2 515.2 253.9 502.7 241.4L342.7 81.4z"/>
        </svg>
    </button>

<div class="secao-publicacoes">
    <div class="d-flex justify-content-center">
        <h2 class="title-publicacoes">Confira Também</h2>
    </div>
    <div class="d-flex justify-content-center flex-wrap mx-4">
        <?php foreach ($recentPosts as $recent_post) : ?>
            <form method="post" action="post" class="card-form" style="margin: 0; cursor: pointer;">
                <input type="hidden" name="id" value="<?= $recent_post->id ?>">
                <div class="card mx-3 mb-3 card-post" onclick="this.closest('form').submit()">
                    <img src="/<?= $recent_post->image; ?>" class="card-img-top fixed-height-image" alt="Imagem do post">
                    <div class="card-body rounded d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?= $recent_post->title ?></h5>
                        <div class="d-flex justify-content-end categories">
                            <?php if(!empty($recent_post->category1)) : ?>
                                <span class="category"><?= $categories_map[$recent_post->category1] ?? $recent_post->category1 ?></span>
                            <?php endif; ?>
                            <?php if(!empty($recent_post->category2)) : ?>
                                <span class="category"><?= $categories_map[$recent_post->category2] ?? $recent_post->category2 ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>

    <?php require('app/views/components/footer.php'); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    const btnTopo = document.getElementById('btn-topo');

    window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            btnTopo.style.display = "flex";
        } else {
            btnTopo.style.display = "none";
        }
    };

    btnTopo.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

<script>
    function ajustarAlturaCards() {
        const cards = document.querySelectorAll('.card-post');
        let alturaMaxima = 0;

        cards.forEach(card => {
            card.style.height = 'auto'; // Reset para recalcular
            if(card.offsetHeight > alturaMaxima) alturaMaxima = card.offsetHeight;
        });

        cards.forEach(card => {
            card.style.height = alturaMaxima + 'px';
        });
    }

    window.addEventListener('load', ajustarAlturaCards);
    window.addEventListener('resize', ajustarAlturaCards);
</script>
</html>