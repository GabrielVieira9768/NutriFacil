<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NutriFácil - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/login-style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="m-5">
        <div class="d-flex justify-content-center flex-column align-items-center card-login rounded">
            <div class="imagem-logo mt-4 mb-3">
                <img class="img-fluid rounded mt-2" alt="Logo da NutriFácil" src="public/assets/logo.png">
            </div>
            <div class="title-login mb-2">
                <h2>Bem Vindo!</h2>
            </div>
            <div class="w-75">
                <form action="/login" method="POST">
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control input-login" id="email" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control input-login" id="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <?php if (isset($message)) : ?>
                        <div class="d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z" />
                            </svg>
                            <p class="m-0"><?php echo $message; ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-center mb-2 mt-4">
                        <button type="submit" class="btn botao-login">Entrar</button>
                    </div>
                </form>
                <div class="d-flex align-items-center justify-content-center mb-4 mt-3">
                    <a href="/" class="link-login">
                        <p class="m-0">Retornar a Home</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>