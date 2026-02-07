<nav class="navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center mx-4">
        <a class="navbar-brand" href="/" title="Acessar a Home">
            <img src="/public/assets/logo.png" alt="Logo" width="36" height="28" class="d-inline-block align-text-top rounded" style="margin-right: 2px;">
            <span class="texto-logo">NutriFácil</span>
        </a>
        <div class="" id="navbarNav">
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item mx-4">
                    <a class="nav-link" href="/" title="Acessar a Home">Home</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link" href="/galeria" title="Acessar a Galeria">Galeria</a>
                </li>
                <?php if(empty($_SESSION['email']) && empty($_SESSION['password'])) { ?>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="/login" title="Acessar o Login">Login</a>
                    </li>
                <?php } else {?>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="/area-administrativa" title="Acessar a Área Administrativa">Área Administrativa</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="/logout" title="Sair do sistema">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
