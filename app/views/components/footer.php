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
                        <span class="span-text">Navegação</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M182-200q-51 0-79-35.5T82-322l42-300q9-60 53.5-99T282-760h396q60 0 104.5 39t53.5 99l42 300q7 51-21 86.5T778-200q-21 0-39-7.5T706-230l-90-90H344l-90 90q-15 15-33 22.5t-39 7.5Zm16-86 114-114h336l114 114q2 2 16 6 11 0 17.5-6.5T800-304l-44-308q-4-29-26-48.5T678-680H282q-30 0-52 19.5T204-612l-44 308q-2 11 4.5 17.5T182-280q2 0 16-6Zm482-154q17 0 28.5-11.5T720-480q0-17-11.5-28.5T680-520q-17 0-28.5 11.5T640-480q0 17 11.5 28.5T680-440Zm-80-120q17 0 28.5-11.5T640-600q0-17-11.5-28.5T600-640q-17 0-28.5 11.5T560-600q0 17 11.5 28.5T600-560ZM310-440h60v-70h70v-60h-70v-70h-60v70h-70v60h70v70Zm170-40Z"/></svg>
                        <span class="span-text">Game Over</span>
                    </h6>
                    <p style="text-align: justify;">
                        Descubra o que há de novo no mundo dos jogos, explore dicas e estratégias, e conecte-se com uma comunidade de gamers apaixonados.
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>
                        <span class="span-text">Contatos</span>    
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Campos, Rio de Janeiro, Brasil</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        game_over@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> +00 (00) 00000-0000</p>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center p-4 copy">
        <p class="text-reset">© Copyright 2024 | Direitos Reservados</p>
    </div>
</footer>