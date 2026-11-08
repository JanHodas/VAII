<?php
/** @var \App\Models\Work[] $works */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
    <div>
        <h1 id="page-title">Katalóg prác</h1>
        <p class="page-subtitle">Vykonávané práce, ich normovaný čas a orientačné ceny</p>
    </div>
    <div class="heading-actions">
        <a class="button button-primary" href="<?= $link->url('works.add') ?>">Pridať prácu</a>
    </div>
</section>

<section class="catalog-content" aria-label="Položky katalógu prác">
    <?php if (count($works) === 0): ?>
        <p>Katalóg prác je prázdny. Pridajte prvú prácu.</p>
    <?php else: ?>
        <div class="table-wrap">
            <table class="records-table catalog-table">
                <thead>
                    <tr>
                        <th scope="col">Názov</th>
                        <th scope="col">Kategória</th>
                        <th scope="col">Normohodiny</th>
                        <th scope="col">Orientačná cena</th>
                        <th scope="col">Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($works as $work): ?>
                        <tr>
                            <td data-label="Názov"><?= e($work->getName()) ?></td>
                            <td data-label="Kategória"><?= e($work->getCategory()) ?></td>
                            <td data-label="Normohodiny" class="km-cell">
                                <?= number_format((float)$work->getNormHours(), 2, ',', ' ') ?> h
                            </td>
                            <td data-label="Orientačná cena" class="price-cell">
                                <?= number_format((float)$work->getPrice(), 2, ',', ' ') ?> €
                            </td>
                            <td data-label="Akcie">
                                <div class="form-actions">
                                    <a class="button button-small"
                                       href="<?= $link->url('works.edit', ['id' => $work->getId()]) ?>">Upraviť</a>
                                    <a class="button button-small button-danger"
                                       href="<?= $link->url('works.delete', ['id' => $work->getId()]) ?>">Vymazať</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="catalog-count">Počet prác v katalógu: <?= count($works) ?></p>
    <?php endif; ?>
</section>
