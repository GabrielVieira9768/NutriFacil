<nav class="navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center mx-4">
        <a class="navbar-brand" href="/">
            <img src="/public/assets/logo.png" alt="Logo" width="36" height="28" class="d-inline-block align-text-top rounded" style="margin-right: 2px;">
            <span class="texto-logo">NutriFácil</span>
        </a>
        <div class="" id="navbarNav">
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item mx-4">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link" href="/galeria">Galeria</a>
                </li>
                <?php if(empty($_SESSION['email']) && empty($_SESSION['password'])) { ?>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                <?php } else {?>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="/area-administrativa">Área Administrativa</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
