<?php
/** @var \App\Models\Work $work */
/** @var string[] $errors */
/** @var string $token */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
    <div>
        <nav class="breadcrumbs" aria-label="Navigácia v umiestnení">
            <a href="<?= $link->url('works.index') ?>">Katalóg prác</a>
            <span aria-hidden="true">›</span>
            <span><?= $work->getId() === null ? 'Nová práca' : 'Úprava práce' ?></span>
        </nav>
        <h1 id="page-title"><?= $work->getId() === null ? 'Pridať prácu' : 'Upraviť prácu' ?></h1>
    </div>
</section>

<div class="catalog-content">
    <form class="catalog-form" method="post" action="<?= $link->url('works.save') ?>">
        <input type="hidden" name="id" value="<?= $work->getId() ?? 0 ?>">
        <input type="hidden" name="token" value="<?= e($token) ?>">

        <?php if (count($errors) > 0): ?>
            <div class="form-errors" role="alert">
                <strong>Prácu sa nepodarilo uložiť:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="field">
            <label for="name">Názov práce</label>
            <input class="field-control" id="name" name="name" type="text"
                   value="<?= e($work->getName()) ?>" maxlength="120" required>
        </div>
        <div class="field">
            <label for="category">Kategória</label>
            <input class="field-control" id="category" name="category" type="text"
                   value="<?= e($work->getCategory()) ?>" maxlength="60" required>
        </div>
        <div class="field">
            <label for="norm-hours">Normohodiny (h)</label>
            <input class="field-control" id="norm-hours" name="norm_hours"
                   type="number" min="0.01" max="999.99" step="0.01"
                   value="<?= e($work->getNormHours()) ?>" required>
        </div>
        <div class="field">
            <label for="price">Orientačná cena (€)</label>
            <input class="field-control" id="price" name="price"
                   type="number" min="0" max="99999999.99" step="0.01"
                   value="<?= e($work->getPrice()) ?>" required>
        </div>
        <div class="form-actions">
            <button class="button button-primary" type="submit">Uložiť prácu</button>
            <a class="button" href="<?= $link->url('works.index') ?>">Zrušiť</a>
        </div>
    </form>
</div>
