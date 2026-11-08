<?php
/** @var string $contentHTML */
/** @var \Framework\Support\LinkGenerator $link */

$navController = strtolower(trim((string)($_GET['c'] ?? 'home')));
$navAction = strtolower(trim((string)($_GET['a'] ?? 'index')));
$navCurrent = static function (string $controller, ?string $action = null) use ($navController, $navAction): string {
    $isCurrent = $navController === $controller && ($action === null || $navAction === $action);
    return $isCurrent ? ' aria-current="page"' : '';
};
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Servisná kniha vozidiel">
    <title><?= App\Configuration::APP_NAME ?></title>
    <link rel="stylesheet" href="<?= $link->asset('css/styles.css') ?>">
</head>
<body>
    <a class="skip-link" href="#main-content">Preskočiť na obsah</a>
    <div class="app-shell">
        <header class="topbar">
            <a class="brand" href="<?= $link->url('home.index') ?>" aria-label="Servisná kniha, domov">
                <span class="brand-mark" aria-hidden="true">SK</span>
                <span>Servisná kniha</span>
            </a>

            <nav class="primary-nav" aria-label="Hlavná navigácia">
                <a class="nav-link" href="<?= $link->url('home.index') ?>"<?= $navCurrent('home', 'index') ?>>
                    <img class="nav-icon" src="<?= $link->asset('assets/icons/vehicle.png') ?>" alt="">
                    Vozidlá
                </a>
                <a class="nav-link" href="<?= $link->url('home.detail') ?>"<?= $navCurrent('home', 'detail') ?>>
                    <img class="nav-icon" src="<?= $link->asset('assets/icons/vehicle.png') ?>" alt="">
                    Detail vozidla
                </a>
                <a class="nav-link" href="<?= $link->url('works.index') ?>"<?= $navCurrent('works') ?>>
                    <img class="nav-icon" src="<?= $link->asset('assets/icons/catalog.png') ?>" alt="">
                    Práce
                </a>
                <a class="nav-link" href="<?= $link->url('parts.index') ?>"<?= $navCurrent('parts') ?>>
                    <img class="nav-icon" src="<?= $link->asset('assets/icons/catalog.png') ?>" alt="">
                    Diely
                </a>
            </nav>

            <div class="account">
                <span class="role-tag">Zákazník</span>
                <span class="avatar" aria-hidden="true">PN</span>
                <span class="account-name">Peter Novák</span>
                <button class="button button-small" type="button">Odhlásiť sa</button>
            </div>
        </header>

        <main id="main-content">
            <?= $contentHTML ?>
        </main>

        <footer class="footer">
            <span>© 2026 Servisná kniha vozidiel · Ján Hodas</span>
            <a href="#main-content">Späť na začiatok</a>
        </footer>
    </div>
</body>
</html>