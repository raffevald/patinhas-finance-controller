<?php if (isset($_SESSION['usuario'])) { $usuario = $_SESSION['usuario']; ?>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-mdbetween py-3 mb-4 border-bottom">
    <a href="pagina_inicial.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <svg width="180px" src= <?php include ASSET_DIR . "/imagens/logo_kingdom_horiz.svg"; ?> </svg>
    </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="pagina_inicial.php" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a onclick="window.location.href = './estoque.php'" class="nav-link px-2 link-dark">Estoque</a></li>
        <li><a onclick="window.location.href = './adicionar.php'" class="nav-link px-2 link-dark">Adicionar</a></li>
        <li><a href="admin.php" class="nav-link px-2 link-dark">Admin</a></li>
    </ul>
    <div class="col-md-3 text-end">
        <a href="#" class="col-md-3 text-end">
            <button type="button" class="btn btn-primary"><i class="materialicons">face</i><?php print " " . "$usuario"; ?></button>
        </a>
        <a href="logout.php">
            <button type="button" class="btn btn-outline-primary me-2">Sair</button>
        </a>
    </div>
</header>

<?php } else { ?>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-mdbetween py-3 mb-4 border-bottom">
    <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <svg width="180px" src=<?php include ASSET_DIR . "/imagens/logo_kingdom_horiz.svg"; ?></svg> </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Pesquisar</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Relatórios</a></li>
        <li><a href="admin.php" class="nav-link px-2 link-dark">Admin</a></li>
    </ul>
    <div class="col-md-3 text-end">
        <a href="login.php">
            <button type="button" class="btn btn-outline-primary me-2">Entrar</button>
        </a>
        <a href="registre.php">
            <button type="button" class="btn btn-primary">Registre-se</button>
        </a>
    </div>
</header>
<?php } ?>