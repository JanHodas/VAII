# Servisná kniha vozidiel

Ján Hodas

5ZYI32

## Stručný opis projektu

Webová aplikácia je digitálnou servisnou knihou jednej autodielne. Mechanici do nej zapisujú vykonané zásahy na vozidlách zákazníkov, vrátane použitých dielov, cien a priložených faktúr. Zákazník sa prihlási a vidí kompletnú a dohľadateľnú históriu svojho auta, ktorá mu zostáva prístupná aj po skončení opravy a má hodnotu pri ďalšom servise i pri predaji vozidla. Nahrádza papierovú servisnú knižku a kopu účteniek v priehradke.

Okrem servisnej histórie si zákazník vedie aj vlastnú evidenciu, do ktorej dielňa nevidí: tankovania, z ktorých mu aplikácia počíta spotrebu, a poznámky k vozidlu, napríklad čo treba pri najbližšej návšteve riešiť.

## Role v projekte

**Návštevník** — neprihlásený používateľ. Má prístup len k úvodnej stránke, registrácii a prihláseniu, k žiadnym údajom aplikácie sa nedostane.

**Zákazník** — registrovaný majiteľ vozidla. Spravuje svoje vozidlá, tankovania a poznámky a prezerá si servisnú históriu. Vidí výhradne svoje vozidlá, servisné záznamy nevytvára ani neupravuje.

**Mechanik** — zamestnanec dielne. Vidí vozidlá všetkých zákazníkov a ich servisnú históriu a vytvára k nim záznamy. Upravovať a mazať môže len záznamy, ktoré sám vytvoril. Do tankovaní a poznámok zákazníka prístup nemá.

**Administrátor** — majiteľ dielne. Spravuje katalóg úkonov a dielov a používateľské účty vrátane prideľovania rolí. Má prístup ku všetkým vozidlám a záznamom, pretože zodpovedá za konzistenciu údajov.

## Prípady použitia podľa rolí

**Návštevník**
- Návštevník sa zaregistruje a vytvorí si účet.
- Návštevník sa prihlási do aplikácie.

**Zákazník**
- Zákazník si pridá nové vozidlo vrátane značky, modelu, VIN a stavu kilometrov.
- Zákazník upraví údaje o vozidle a nahrá jeho fotografiu.
- Zákazník vymaže vozidlo, ktoré už nevlastní.
- Zákazník si zobrazí servisnú históriu vozidla a vyfiltruje ju podľa obdobia a typu úkonu.
- Zákazník zapíše tankovanie a aplikácia mu vypočíta spotrebu oproti predchádzajúcemu tankovaniu.
- Zákazník si zapíše poznámku k vozidlu, neskôr ju upraví alebo vymaže.
- Zákazník si zobrazí prehľad nákladov na vozidlo za zvolené obdobie.
- Zákazník si stiahne faktúru priloženú k servisnému záznamu.

**Mechanik**
- Mechanik vyhľadá vozidlo zákazníka a zobrazí si jeho doterajšiu servisnú históriu.
- Mechanik vytvorí servisný záznam a zapíše dátum, stav kilometrov a popis zásahu.
- Mechanik priradí k záznamu úkony a diely z katalógu a zadá ich množstvo a cenu.
- Mechanik opraví cenu alebo stav kilometrov priamo v tabuľke svojich záznamov.
- Mechanik nahrá k svojmu záznamu faktúru alebo fotografiu a nepotrebnú prílohu vymaže.
- Mechanik zmaže záznam, ktorý sám chybne vytvoril.

**Administrátor**
- Administrátor pridá do katalógu nový úkon alebo diel a nastaví jeho orientačnú cenu.
- Administrátor upraví alebo vyradí položku katalógu.
- Administrátor zmení rolu používateľa, napríklad povýši zákazníka na mechanika.
- Administrátor opraví alebo zmaže ľubovoľný servisný záznam.
- Administrátor deaktivuje účet.

## Plánované entity

**Používateľ (`users`)** — účet a nositeľ roly (zákazník, mechanik, administrátor). Atribúty: `id`, `email`, `heslo_hash`, `meno`, `rola`. Vlastní viacero vozidiel, ako mechanik je autorom viacerých servisných záznamov.

**Vozidlo (`vozidla`)** — konkrétne auto zákazníka. Atribúty: `id`, `user_id`, `znacka`, `model`, `vin`, `rok_vyroby`, `stav_km`, `foto`. Patrí jednému zákazníkovi, má viacero servisných záznamov, tankovaní a poznámok.

**Servisný záznam (`servisne_zaznamy`)** — jeden servisný zásah v dielni. Atribúty: `id`, `vozidlo_id`, `mechanik_id`, `datum`, `stav_km`, `popis`, `cena_prace`. Viaže na seba vykonané úkony a prílohy.

**Úkon (`ukony`)** — zdieľaný katalóg prác a dielov. Atribúty: `id`, `nazov`, `kategoria`, `typ`, `orientacna_cena`. Opakuje sa na mnohých servisných záznamoch.

**Tankovanie (`tankovania`)** — jedno natankovanie, súkromná evidencia zákazníka. Atribúty: `id`, `vozidlo_id`, `datum`, `stav_km`, `litre`, `cena_za_liter`. Patrí jednému vozidlu.

**Poznámka (`poznamky`)** — vlastná poznámka zákazníka k vozidlu, napríklad čo riešiť pri najbližšej návšteve servisu. Atribúty: `id`, `vozidlo_id`, `datum`, `text`, `vybavena`. Patrí jednému vozidlu.

**Príloha (`prilohy`)** — faktúra alebo fotografia pri servisnom zázname. Atribúty: `id`, `zaznam_id`, `nazov_suboru`, `mime_typ`, `velkost`. Patrí jednému záznamu.

**Záznam – úkon (`zaznam_ukon`)** — asociačná tabuľka rozkladajúca vzťah M:N. Atribúty: `zaznam_id`, `ukon_id`, `mnozstvo`, `cena`. Nesie vlastné údaje, lebo skutočne fakturovaná cena sa líši od orientačnej.

## Vzťahy medzi entitami

- **Používateľ – Vozidlo (1:N)** — jeden zákazník vlastní viacero vozidiel, každé vozidlo patrí práve jednému zákazníkovi.
- **Používateľ – Servisný záznam (1:N)** — mechanik je autorom viacerých záznamov, každý záznam má práve jedného autora. Tento vzťah rozhoduje o tom, kto smie záznam upraviť.
- **Vozidlo – Servisný záznam (1:N)** — vozidlo má v čase viacero servisných zásahov.
- **Vozidlo – Tankovanie (1:N)** — vozidlo má históriu tankovaní.
- **Vozidlo – Poznámka (1:N)** — k vozidlu je možné zapísať viacero poznámok.
- **Servisný záznam – Príloha (1:N)** — k jednému záznamu je možné priložiť viacero súborov.
- **Servisný záznam – Úkon (M:N)** — jeden zásah obsahuje viacero úkonov a jeden úkon sa vyskytuje na mnohých zásahoch. Vzťah je rozložený cez tabuľku `zaznam_ukon`.

Do povinného počtu entít sa nezapočítava tabuľka používateľov ani asociačná tabuľka. Zostáva šesť plnohodnotných entít: vozidlá, servisné záznamy, úkony, tankovania, poznámky a prílohy.

## Hlavné stránky aplikácie

1. **Prihlásenie a registrácia** — vstup do chránenej časti aplikácie.
2. **Vozidlá** — zoznam vozidiel so základnými údajmi a stavom najbližšieho servisného intervalu. Zákazník tu vidí svoje vozidlá a spravuje ich, mechanik a administrátor vozidlá všetkých zákazníkov s vyhľadávaním.
3. **Detail vozidla** — hlavná obrazovka: údaje o vozidle, tabuľka servisnej histórie s filtrovaním, prehľad nákladov a graf ich vývoja. Zákazníkovi sa tu navyše zobrazujú jeho poznámky, ktoré odtiaľto pridáva, upravuje a maže.
4. **Servisný záznam** — formulár na vytvorenie a úpravu záznamu s priraďovaním úkonov a nahrávaním príloh.
5. **Tankovania a spotreba** — evidencia tankovaní s prepočtom spotreby a nákladov na kilometer, prístupná len zákazníkovi.
6. **Katalóg úkonov a dielov** — prehľad a vyhľadávanie položiek pre prihlásených používateľov, pre administrátora aj ich správa.
7. **Správa používateľov** — administrátorský zoznam účtov s prideľovaním rolí.

## Rozdelenie funkcionality

**Základné funkcie** — minimum potrebné na dokončenie projektu.

- Registrácia, prihlásenie a odhlásenie, heslá uložené výhradne ako hash.
- Tri roly s autorizáciou na dvoch úrovniach: či rola smie danú akciu vykonať a či jej konkrétny záznam patrí.
- Úplné operácie CRUD nad vozidlami, servisnými záznamami a poznámkami.
- Evidencia tankovaní a prepočet spotreby.
- Priraďovanie úkonov z katalógu k záznamu vrátane množstva a ceny.
- Nahrávanie, zobrazenie a mazanie príloh.
- Asynchrónne filtrovanie servisnej histórie podľa obdobia a typu úkonu.
- Úprava hodnoty priamo v tabuľke záznamov bez znovunačítania stránky.
- Validácia vstupov na strane klienta aj servera vrátane kontroly platných hodnôt.
- Responzívne zobrazenie riešené vlastnými media queries.
- Spustenie v Dockeri s automatickým importom ukážkových údajov pri prvom spustení.

**Rozširujúce funkcie** — implementované podľa časových možností.

- Graf vývoja nákladov a spotreby v čase vykreslený do prvku `<canvas>`.
- Upozornenia na blížiaci sa servisný interval podľa kilometrov aj dátumu.
- Export servisnej histórie vozidla do PDF.
- Nahrávanie príloh metódou drag and drop s náhľadom pred odoslaním.
- Načítanie údajov o vozidle z VIN cez externé API.
- Odoslanie poznámky zákazníka ako požiadavky do dielne.
- Porovnanie nákladov medzi viacerými vozidlami jedného zákazníka.
- Tmavý režim rozhrania.
