# Student Buddy

Karolína Púšová

5ZYI35

## Stručný opis projektu

Webová aplikácia StudentBuddy je určená pre študentov za účelom uľahčenia každodenných problémov v internátnom a vysokoškolskom živote. Študenti sa častokrát stretávajú s tým, že sa chcú spoznať s ľudmi, požičať si veci, alebo zobrať niekoho do auta kvôli lacnejšiemu palivu, no nevedia koho a ako sa spýtať alebo je to chaotické a neprehľadné.

Prostredníctvom tejto aplikácie si študenti môžu organizovať spoločné akcie, budovať kontakty ktoré by inak nevznikli, zdielať veci a pomáhať si. Aplikácia poskytuje aj filtrovanie na základe počtu ľudí, miesta a iné, čím sa uľahčí vyhľadávanie. 

## Role v projekte

- **Nezaregistrovaný používateľ:** Zobrazí sa mu vzorová stránka s vopred vytvorenými príspevkami kvôli súkromiu študentov a možnosť registrovať sa
- **Zaregistrovaný študent:** Môže pridávať, upravovať a mazať svoje príspevky, reagovať na príspevky iných, ukladať si akcie do obľúbených, pridať ľudí do priateľov, nahlasovať študentov či príspevky.
- **Administrátor:** Moderuje obsah, rieši nahlásené príspevky alebo používatelov.

## Prípady použitia podľa rolí

- Nezaregistrovaný používateľ sa zaregistruje, má dostupnú úvodnú stránku a počet registrovaných.
- Zaregistrovaný študent sa prihlási, upravuje osobný profil, pridá upraví alebo zmaže svoj príspevok, reaguje na príspevok iného študenta, pridá si iného  študenta do priateľov, nahlasuje príspevky alebo študentov.
- Administrátor zablokuje príspevok alebo používateľa.

## Plánované entity
**User**
- používateľ
- atribúty: #id, name, surename, email, password_hash, gender, dorm, faculty, profile_pic_path, socials

**Post**    
- príspevok
- atribúty: #id, (fk)user_id, (fk)category_id, (fk)location_id, title, description, photo_path, preferences, date_origin, status, date_origin

**Reaction**
- záujem o akciu
- atribúty: (pfk)id_post, (fk)id_user, reaction

**Category**
- kategoria prispevku
- atributy: #id, cat_title, icon

**Location**
- miesto konania
- atribúty: #id, loc_event, loc_meeting

**Friend**
- priateľstvo medzi študentmi - spojovacia tabuľka
- atribúty: #id, (fk)user_id_1, (fk)user_id_2

**Reports**
- tabulka nahlásení pre administrátora
- atribúty: #id, (fk)user_id, (fk)reported_post_id, (fk)reported_user_id, reason, status

## Vzťahy medzi entitami
**user 1:n post**
- používateľ vytvorí viac príspevkov

**category 1:n post**
- viac príspevkov spadá pod 1 kategórie

**location 1:n post**
- viac príspevkov môže mať rovnaké miesto

**user 1:n friend n:1 user**
- m:n vzťah - jeden študent môze mať viac priateľstiev

**user 1:n report**
- študent môže vytvoriť viac nahlásení

**user/post 1:n report**
- na konkrétny príspevok alebo konkrétneho používateľa môže byť vytvorených viac nahlásení

## Hlavné stránky aplikácie
**feed príspevkov**
- zobrazí sa registrovanému používateľovi, predstavuje domovskú obrazovku s príspevkami, ktoré vytvorili iní študenti

**detail príspevku**
- po kliknutí na príspevok sa zobrazí detail s prihlásenými ľuďmi, reakciami a bližším popisom

**profil**
- účet študenta, môže si meniť informácie, bio, spravovať príspevky

**registrácia**
- registračná stránka pre neregistrovaného alebo prihlásenie

**úvod**
- úvodná stránka ktorá sa zobrazí pre neprihlásených.

**hľadanie**
- výsledky po vyhľadaní akcie, filtrovanie, prípadne zmena hľadaného výrazu

## Rozdelenie funkcionality
**základné:**
- 5 entít + user a spojovacia
- registrácia + prihlásenie podľa śtudentského účtu
- crud operácie nad príspevkom a reakciou
- responzívny dizajn
- práca so súborom - fotky k príspevkom, profilový obrázok
- ajax - filtrovanie výsledkov, pridávanie priateľov, report

**rozšírené:**
- spravovanie friends listu
- admin rozhranie na spravovanie obsahu
