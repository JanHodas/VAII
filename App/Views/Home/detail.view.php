<?php
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="page-heading" aria-labelledby="page-title">
          <div>
            <nav class="breadcrumbs" aria-label="Navigácia v umiestnení">
              <a href="<?= $link->url('home.index') ?>">Moje vozidlá</a>
              <span aria-hidden="true">›</span>
              <span>SEAT Toledo</span>
            </nav>
            <h1 id="page-title">Detail vozidla</h1>
            <p class="page-subtitle">
              Servisná história, náklady a poznámky k vášmu vozidlu
            </p>
          </div>
          <div class="heading-actions">
            <button class="button" type="button">Export PDF</button>
            <button class="button" type="button">Upraviť vozidlo</button>
            <button class="button button-danger" type="button">
              Vymazať vozidlo
            </button>
          </div>
        </section>

        <section class="vehicle-overview" aria-labelledby="vehicle-title">
          <div class="vehicle-visual">
            <img
              src="<?= $link->asset('assets/toledo.jpg') ?>"
              alt="Fotka vozidla"
              width="900"
              height="1200"
            />
          </div>
          <div class="vehicle-info">
            <h2 id="vehicle-title">SEAT Toledo 1.9 TDI</h2>
            <dl class="vehicle-meta">
              <div>
                <dt>VIN</dt>
                <dd>VSSZZZ1MZ3R012345</dd>
              </div>
              <div>
                <dt>Rok výroby</dt>
                <dd>2003</dd>
              </div>
              <div>
                <dt>Aktuálny stav</dt>
                <dd>148 320 km</dd>
              </div>
              <div>
                <dt>Posledný servis</dt>
                <dd>14. 09. 2026</dd>
              </div>
            </dl>
            <p class="service-alert">
              Najbližší servis o 9 580 km alebo do 14. 09. 2027
            </p>
          </div>
        </section>

        <section class="metric-grid" aria-label="Prehľadové ukazovatele">
          <div class="metric">
            <span class="metric-label">Náklady za obdobie</span>
            <strong class="metric-value">1 284,50 €</strong>
            <span class="metric-note">01/2025 – 10/2026</span>
          </div>
          <div class="metric">
            <span class="metric-label">Servisné zásahy</span>
            <strong class="metric-value">6</strong>
            <span class="metric-note">za zvolené obdobie</span>
          </div>
          <div class="metric">
            <span class="metric-label">Priemerná spotreba</span>
            <strong class="metric-value">5,8 l/100 km</strong>
            <span class="metric-note">z 24 tankovaní</span>
          </div>
          <div class="metric">
            <span class="metric-label">Náklady na km</span>
            <strong class="metric-value">0,11 €/km</strong>
            <span class="metric-note">servis + palivo</span>
          </div>
        </section>

        <div class="content-grid">
          <section class="history-section" aria-labelledby="history-title">
            <div class="section-heading">
              <div>
                <h2 id="history-title">Servisná história</h2>
                <p class="section-note">
                  Záznamy zapisuje dielňa · 6 záznamov vo vybranom období
                </p>
              </div>
            </div>

            <form
              class="filter-panel"
              action="#servisna-historia"
              method="get"
              aria-label="Filtrovanie servisnej histórie"
            >
              <div class="field">
                <label for="date-from">Obdobie od</label>
                <input
                  class="field-control"
                  id="date-from"
                  type="date"
                  value="2025-01-01"
                />
              </div>
              <div class="field">
                <label for="date-to">Obdobie do</label>
                <input
                  class="field-control"
                  id="date-to"
                  type="date"
                  value="2026-10-18"
                />
              </div>
              <div class="field">
                <label for="operation-type">Typ úkonu</label>
                <select class="field-control" id="operation-type">
                  <option>Všetky typy</option>
                  <option>Pravidelný servis</option>
                  <option>Brzdy</option>
                  <option>Pneumatiky</option>
                  <option>Diagnostika</option>
                  <option>Kontroly</option>
                </select>
              </div>
              <div class="filter-actions">
                <button class="filter-chip" type="button">12 m</button>
                <button class="filter-chip" type="button">24 m</button>
                <button class="filter-chip" type="button" aria-pressed="true">
                  Všetko
                </button>
                <button class="clear-filter" type="reset">Zrušiť</button>
              </div>
            </form>

            <div class="table-wrap" id="servisna-historia">
              <table class="records-table">
                <thead>
                  <tr>
                    <th scope="col">Dátum</th>
                    <th scope="col">Stav km</th>
                    <th scope="col">Popis zásahu</th>
                    <th scope="col">Úkony a diely</th>
                    <th scope="col">Mechanik</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Prílohy</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="date-cell" data-label="Dátum">14. 09. 2026</td>
                    <td class="km-cell" data-label="Stav km">147 900</td>
                    <td data-label="Popis zásahu">
                      <span class="record-title"
                        >Pravidelný servis – výmena oleja a filtrov</span
                      ><span class="record-type">Pravidelný servis</span>
                    </td>
                    <td data-label="Úkony a diely">
                      <span class="operation-tag">Olej 5W-40</span
                      ><span class="more-tag">+3</span>
                    </td>
                    <td class="mechanic-name" data-label="Mechanik">
                      M. Kováč
                    </td>
                    <td class="price-cell" data-label="Cena">268,40 €</td>
                    <td data-label="Prílohy">2 súbory</td>
                  </tr>
                  <tr>
                    <td class="date-cell" data-label="Dátum">02. 05. 2026</td>
                    <td class="km-cell" data-label="Stav km">139 450</td>
                    <td data-label="Popis zásahu">
                      <span class="record-title"
                        >Prezutie na letné pneumatiky</span
                      ><span class="record-type">Pneumatiky</span>
                    </td>
                    <td data-label="Úkony a diely">
                      <span class="operation-tag">Prezutie</span
                      ><span class="more-tag">+1</span>
                    </td>
                    <td class="mechanic-name" data-label="Mechanik">
                      J. Hodas
                    </td>
                    <td class="price-cell" data-label="Cena">45,00 €</td>
                    <td data-label="Prílohy">1 súbor</td>
                  </tr>
                  <tr>
                    <td class="date-cell" data-label="Dátum">18. 01. 2026</td>
                    <td class="km-cell" data-label="Stav km">132 100</td>
                    <td data-label="Popis zásahu">
                      <span class="record-title"
                        >Výmena predných brzdových platničiek a kotúčov</span
                      ><span class="record-type">Brzdy</span>
                    </td>
                    <td data-label="Úkony a diely">
                      <span class="operation-tag">Platničky</span
                      ><span class="more-tag">+2</span>
                    </td>
                    <td class="mechanic-name" data-label="Mechanik">
                      M. Kováč
                    </td>
                    <td class="price-cell" data-label="Cena">312,80 €</td>
                    <td data-label="Prílohy">1 súbor</td>
                  </tr>
                  <tr>
                    <td class="date-cell" data-label="Dátum">10. 11. 2025</td>
                    <td class="km-cell" data-label="Stav km">128 600</td>
                    <td data-label="Popis zásahu">
                      <span class="record-title"
                        >Diagnostika kontrolky motora, výmena merača
                        vzduchu</span
                      ><span class="record-type">Diagnostika</span>
                    </td>
                    <td data-label="Úkony a diely">
                      <span class="operation-tag">Diagnostika</span
                      ><span class="more-tag">+1</span>
                    </td>
                    <td class="mechanic-name" data-label="Mechanik">
                      M. Kováč
                    </td>
                    <td class="price-cell" data-label="Cena">389,90 €</td>
                    <td data-label="Prílohy">2 súbory</td>
                  </tr>
                  <tr>
                    <td class="date-cell" data-label="Dátum">22. 09. 2025</td>
                    <td class="km-cell" data-label="Stav km">125 300</td>
                    <td data-label="Popis zásahu">
                      <span class="record-title"
                        >Pravidelný servis – výmena oleja a filtrov</span
                      ><span class="record-type">Pravidelný servis</span>
                    </td>
                    <td data-label="Úkony a diely">
                      <span class="operation-tag">Olej 5W-40</span
                      ><span class="more-tag">+2</span>
                    </td>
                    <td class="mechanic-name" data-label="Mechanik">
                      J. Hodas
                    </td>
                    <td class="price-cell" data-label="Cena">241,40 €</td>
                    <td data-label="Prílohy">1 súbor</td>
                  </tr>
                  <tr>
                    <td class="date-cell" data-label="Dátum">15. 04. 2025</td>
                    <td class="km-cell" data-label="Stav km">117 800</td>
                    <td data-label="Popis zásahu">
                      <span class="record-title"
                        >Technická a emisná kontrola</span
                      ><span class="record-type">Kontroly</span>
                    </td>
                    <td data-label="Úkony a diely">
                      <span class="operation-tag">STK + EK</span>
                    </td>
                    <td class="mechanic-name" data-label="Mechanik">
                      M. Kováč
                    </td>
                    <td class="price-cell" data-label="Cena">27,00 €</td>
                    <td data-label="Prílohy">—</td>
                  </tr>
                </tbody>
              </table>
              <div class="table-footer">
                <span>Zobrazené 1 – 6 zo 6 záznamov</span>
                <span
                  >Spolu za vyfiltrované záznamy
                  <strong>1 284,50 €</strong></span
                >
              </div>
            </div>
          </section>

          <aside class="side-column" aria-label="Doplnkové informácie">
            <section class="side-section" aria-labelledby="chart-title">
              <div class="side-head">
                <h2 id="chart-title">Vývoj nákladov</h2>
                <div class="chart-toggle" aria-label="Typ grafu">
                  <span>Náklady</span>
                  <span>Spotreba</span>
                </div>
              </div>
              <figure class="chart-card">
                <div
                  class="chart-bars"
                  role="img"
                  aria-label="Stĺpcový graf štvrťročných nákladov na servis. Najvyššie náklady boli v štvrtom štvrťroku 2025."
                >
                  <div class="bar-column">
                    <span class="bar-value">27</span
                    ><span class="bar" style="height: 8%"></span>
                  </div>
                  <div class="bar-column">
                    <span class="bar-value">45</span
                    ><span class="bar" style="height: 12%"></span>
                  </div>
                  <div class="bar-column">
                    <span class="bar-value">241</span
                    ><span class="bar" style="height: 62%"></span>
                  </div>
                  <div class="bar-column">
                    <span class="bar-value">390</span
                    ><span class="bar is-current" style="height: 100%"></span>
                  </div>
                  <div class="bar-column">
                    <span class="bar-value">313</span
                    ><span class="bar" style="height: 80%"></span>
                  </div>
                  <div class="bar-column">
                    <span class="bar-value">45</span
                    ><span class="bar" style="height: 12%"></span>
                  </div>
                  <div class="bar-column">
                    <span class="bar-value">268</span
                    ><span class="bar" style="height: 69%"></span>
                  </div>
                  <div class="bar-column">
                    <span class="bar-value">–</span
                    ><span class="bar" style="height: 3%"></span>
                  </div>
                </div>
                <div class="bar-labels" aria-hidden="true">
                  <span>Q1/25</span><span>Q2/25</span><span>Q3/25</span
                  ><span>Q4/25</span> <span>Q1/26</span><span>Q2/26</span
                  ><span>Q3/26</span><span>Q4/26</span>
                </div>
                <figcaption class="chart-caption">
                  Štvrťročné náklady na servis v €
                </figcaption>
              </figure>
            </section>

            <section class="side-section" aria-labelledby="notes-title">
              <div class="side-head">
                <h2 id="notes-title">Moje poznámky</h2>
                <span class="notes-count">2 otvorené</span>
              </div>
              <form class="note-form" action="#poznamky" method="post">
                <input
                  id="new-note"
                  type="text"
                  aria-label="Nová poznámka k vozidlu"
                  placeholder="Čo riešiť pri ďalšej návšteve…"
                />
                <button class="button button-primary" type="submit">
                  Pridať
                </button>
              </form>
              <ul class="note-list" id="poznamky">
                <li class="note-item">
                  <input class="note-check" type="checkbox" id="note-1" />
                  <label class="note-text" for="note-1"
                    >Pri servise skontrolovať vŕzganie zadného ľavého
                    kolesa<span class="note-date">03. 10. 2026</span></label
                  >
                  <span class="note-actions"
                    ><button class="button button-small" type="button">
                      Upraviť</button
                    ><button class="button button-small" type="button">
                      Vymazať
                    </button></span
                  >
                </li>
                <li class="note-item">
                  <input class="note-check" type="checkbox" id="note-2" />
                  <label class="note-text" for="note-2"
                    >Spýtať sa na cenu výmeny rozvodov (odporúčané do 180 000
                    km)<span class="note-date">21. 09. 2026</span></label
                  >
                  <span class="note-actions"
                    ><button class="button button-small" type="button">
                      Upraviť</button
                    ><button class="button button-small" type="button">
                      Vymazať
                    </button></span
                  >
                </li>
                <li class="note-item is-done">
                  <input
                    class="note-check"
                    type="checkbox"
                    id="note-3"
                    checked
                  />
                  <label class="note-text" for="note-3"
                    >Objednať zimné pneumatiky 205/55 R16<span class="note-date"
                      >12. 09. 2026 · vybavená</span
                    ></label
                  >
                  <span class="note-actions"
                    ><button class="button button-small" type="button">
                      Upraviť</button
                    ><button class="button button-small" type="button">
                      Vymazať
                    </button></span
                  >
                </li>
              </ul>
            </section>
          </aside>
        </div>
