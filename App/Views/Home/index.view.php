<?php
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
          <div>
            <nav class="breadcrumbs" aria-label="Navigácia v umiestnení">
              <span>Moje vozidlá</span>
              <span aria-hidden="true">›</span>
              <span>Prehľad</span>
            </nav>
            <h1 id="page-title">Moje vozidlá</h1>
            <p class="page-subtitle">
              Prehľad vozidiel evidovaných v servisnej knihe
            </p>
          </div>
          <div class="heading-actions">
            <button class="button" type="button">Sekundárna akcia</button>
            <button class="button button-primary" type="button">
              Hlavná akcia
            </button>
          </div>
        </section>

        <section class="layout-placeholder" aria-labelledby="placeholder-title">
          <div class="placeholder-content">
            <h2 id="placeholder-title">Prehľad vozidiel</h2>
            <p>
              Zoznam vozidiel a základné údaje o údržbe.
            </p>
            <a class="button button-primary" href="<?= $link->url('home.detail') ?>"
              >Otvoriť detail vozidla</a
            >
          </div>
        </section>
