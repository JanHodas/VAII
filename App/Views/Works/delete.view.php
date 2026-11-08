<?php
/** @var \App\Models\Work $work */
/** @var string $token */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
    <div>
        <nav class="breadcrumbs" aria-label="Navigácia v umiestnení">
            <a href="<?= $link->url('works.index') ?>">Katalóg prác</a>
            <span aria-hidden="true">›</span>
            <span>Vymazanie práce</span>
        </nav>
        <h1 id="page-title">Vymazať prácu</h1>
    </div>
</section>

<div class="catalog-content">
    <p>Naozaj chcete vymazať prácu <strong><?= e($work->getName()) ?></strong>
        z kategórie <?= e($work->getCategory()) ?>?</p>
    <form class="form-actions" method="post" action="<?= $link->url('works.delete') ?>">
        <input type="hidden" name="id" value="<?= $work->getId() ?>">
        <input type="hidden" name="token" value="<?= e($token) ?>">
        <button class="button button-danger" type="submit">Vymazať prácu</button>
        <a class="button" href="<?= $link->url('works.index') ?>">Zrušiť</a>
    </form>
</div>
