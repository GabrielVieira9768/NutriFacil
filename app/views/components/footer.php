<footer class="text-center text-lg-start text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
            <span>Continue conectado em nossas redes sociais:</span>
        </div>

        <div>
            <a href="https://www.facebook.com" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://x.com" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://gmail.com" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="https://instagram.com" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://linkedin.com" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </section>

    <section class="border-bottom">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m200-120-40-40 320-720 320 720-40 40-280-120-280 120Zm84-124 196-84 196 84-196-440-196 440Zm196-84Z"/></svg>
                        <span class="span-text mx-2">Navegação</span>
                    </h6>
                    <p>
                        <a href="/" class="text-reset link-footer">Home</a>
                    </p>
                    <p>
                        <a href="/galeria" class="text-reset link-footer">Galeria</a>
                    </p>
                    <?php if(empty($_SESSION['email']) && empty($_SESSION['password'])) { ?>
                        <p>
                            <a class="text-reset link-footer" href="/login">Login</a>
                        <p>
                    <?php } else {?>
                        <p>
                            <a class="text-reset link-footer" href="/logout">Logout</a>
                        <p>
                    <?php } ?>
                </div>

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 640 640" width="24px" fill="#e8eaed"><path d="M535.3 70.7C541.7 64.6 551 62.4 559.6 65.2C569.4 68.5 576 77.7 576 88L576 274.9C576 406.1 467.9 512 337.2 512C260.2 512 193.8 462.5 169.7 393.3C134.3 424.1 112 469.4 112 520C112 533.3 101.3 544 88 544C74.7 544 64 533.3 64 520C64 445.1 102.2 379.1 160.1 340.3C195.4 316.7 237.5 304 280 304L360 304C373.3 304 384 293.3 384 280C384 266.7 373.3 256 360 256L280 256C240.3 256 202.7 264.8 169 280.5C192.3 210.5 258.2 160 336 160C402.4 160 451.8 137.9 484.7 116C503.9 103.2 520.2 87.9 535.4 70.7z"/></svg>
                        <span class="span-text mx-2">NutriFácil</span>
                    </h6>
                    <p style="text-align: justify;">
                        NutriFácil é seu portal de referência em alimentação saudável e bem-estar. Descubra dicas de nutrição, planos alimentares equilibrados e receitas práticas para o seu dia a dia.
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>
                        <span class="span-text mx-2">Contatos</span>    
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Juiz de Fora, Minas Gerais, Brasil</p>
                    <p><i class="fas fa-envelope me-3"></i>nutri_facil@gmail.com</p>
                    <p><i class="fas fa-phone me-3"></i> +55 (32) 90000-0000</p>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center p-4 copy">
        <p class="text-reset">© Copyright 2026 | Direitos Reservados</p>
    </div>
</footer>