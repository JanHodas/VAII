<?php
/** @var \App\Models\Part[] $parts */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
    <div>
        <h1 id="page-title">Katalóg dielov</h1>
        <p class="page-subtitle">Náhradné diely, ich katalógové čísla a orientačné ceny</p>
    </div>
    <div class="heading-actions">
        <a class="button button-primary" href="<?= $link->url('parts.add') ?>">Pridať diel</a>
    </div>
</section>

<section class="catalog-content" aria-label="Položky katalógu dielov">
    <?php if (count($parts) === 0): ?>
        <p>Katalóg dielov je prázdny. Pridajte prvý diel.</p>
    <?php else: ?>
        <div class="table-wrap">
            <table class="records-table catalog-table">
                <thead>
                    <tr>
                        <th scope="col">Názov</th>
                        <th scope="col">Kategória</th>
                        <th scope="col">Katalógové číslo</th>
                        <th scope="col">Výrobca</th>
                        <th scope="col">Orientačná cena</th>
                        <th scope="col">Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parts as $part): ?>
                        <tr>
                            <td data-label="Názov"><?= e($part->getName()) ?></td>
                            <td data-label="Kategória"><?= e($part->getCategory()) ?></td>
                            <td data-label="Katalógové číslo"><?= e($part->getCatalogueNumber()) ?></td>
                            <td data-label="Výrobca"><?= e($part->getManufacturer()) ?></td>
                            <td data-label="Orientačná cena" class="price-cell">
                                <?= number_format((float)$part->getPrice(), 2, ',', ' ') ?> €
                            </td>
                            <td data-label="Akcie">
                                <div class="form-actions">
                                    <a class="button button-small"
                                       href="<?= $link->url('parts.edit', ['id' => $part->getId()]) ?>">Upraviť</a>
                                    <a class="button button-small button-danger"
                                       href="<?= $link->url('parts.delete', ['id' => $part->getId()]) ?>">Vymazať</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="catalog-count">Počet dielov v katalógu: <?= count($parts) ?></p>
    <?php endif; ?>
</section>
