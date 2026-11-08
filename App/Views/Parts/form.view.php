<?php
/** @var \App\Models\Part $part */
/** @var string[] $errors */
/** @var string $token */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
    <div>
        <nav class="breadcrumbs" aria-label="Navigácia v umiestnení">
            <a href="<?= $link->url('parts.index') ?>">Katalóg dielov</a>
            <span aria-hidden="true">›</span>
            <span><?= $part->getId() === null ? 'Nový diel' : 'Úprava dielu' ?></span>
        </nav>
        <h1 id="page-title"><?= $part->getId() === null ? 'Pridať diel' : 'Upraviť diel' ?></h1>
    </div>
</section>

<div class="catalog-content">
    <form class="catalog-form" method="post" action="<?= $link->url('parts.save') ?>">
        <input type="hidden" name="id" value="<?= $part->getId() ?? 0 ?>">
        <input type="hidden" name="token" value="<?= e($token) ?>">

        <?php if (count($errors) > 0): ?>
            <div class="form-errors" role="alert">
                <strong>Diel sa nepodarilo uložiť:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="field">
            <label for="name">Názov dielu</label>
            <input class="field-control" id="name" name="name" type="text"
                   value="<?= e($part->getName()) ?>" maxlength="120" required>
        </div>
        <div class="field">
            <label for="category">Kategória</label>
            <input class="field-control" id="category" name="category" type="text"
                   value="<?= e($part->getCategory()) ?>" maxlength="60" required>
        </div>
        <div class="field">
            <label for="catalogue-number">Katalógové číslo</label>
            <input class="field-control" id="catalogue-number" name="catalogue_number" type="text"
                   value="<?= e($part->getCatalogueNumber()) ?>" maxlength="40" required>
        </div>
        <div class="field">
            <label for="manufacturer">Výrobca</label>
            <input class="field-control" id="manufacturer" name="manufacturer" type="text"
                   value="<?= e($part->getManufacturer()) ?>" maxlength="60" required>
        </div>
        <div class="field">
            <label for="price">Orientačná cena (€)</label>
            <input class="field-control" id="price" name="price"
                   type="number" min="0" max="99999999.99" step="0.01"
                   value="<?= e($part->getPrice()) ?>" required>
        </div>
        <div class="form-actions">
            <button class="button button-primary" type="submit">Uložiť diel</button>
            <a class="button" href="<?= $link->url('parts.index') ?>">Zrušiť</a>
        </div>
    </form>
</div>
