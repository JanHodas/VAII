<?php
/** @var \App\Models\Part $part */
/** @var string $token */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
    <div>
        <nav class="breadcrumbs" aria-label="Navigácia v umiestnení">
            <a href="<?= $link->url('parts.index') ?>">Katalóg dielov</a>
            <span aria-hidden="true">›</span>
            <span>Vymazanie dielu</span>
        </nav>
        <h1 id="page-title">Vymazať diel</h1>
    </div>
</section>

<div class="catalog-content">
    <p>Naozaj chcete vymazať diel <strong><?= e($part->getName()) ?></strong>
        s katalógovým číslom <?= e($part->getCatalogueNumber()) ?>?</p>
    <form class="form-actions" method="post" action="<?= $link->url('parts.delete') ?>">
        <input type="hidden" name="id" value="<?= $part->getId() ?>">
        <input type="hidden" name="token" value="<?= e($token) ?>">
        <button class="button button-danger" type="submit">Vymazať diel</button>
        <a class="button" href="<?= $link->url('parts.index') ?>">Zrušiť</a>
    </form>
</div>
