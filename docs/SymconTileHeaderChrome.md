# Symcon Tile Header Chrome

Dieser Workaround hinterlegt den von Symcon gerenderten Kachel-Header optisch, ohne den Header selbst zu stylen.

## Zweck

- heller Hintergrund hinter dem Symcon-Titel links
- heller Kreis hinter dem Symcon-Umschalt-Icon rechts
- freier oberer Bereich, damit die eigene Navigation nicht mit dem Symcon-Header kollidiert
- vollflächiger Hintergrund bis in den von Symcon reservierten Headerbereich

## Verwendete Maße

- oberes Reservieren im Tile-Layout: `padding-top: 56px`
- Title-Pill: `28px` hoch
- Icon-Kreis: `28x28`
- Positionierung des Chrome-Containers: `top: 14px`, `left/right: 12px`
- rechter Innenversatz für das Symcon-Icon: `right: 4px`

## Wichtige Erkenntnis

Der sichtbare Symcon-Titel entspricht nicht zwingend dem Instanznamen.

Im Doorbird-Modul war der Instanzname zum Beispiel:

```text
Doorstation - 1CCAE372FEA7
```

Symcon hat im Tile-Header aber nur Folgendes angezeigt:

```text
Doorbird
```

Die passende Referenz für die Breite war hier also nicht `IPS_GetName($this->InstanceID)`, sondern der Modultitel aus `module.json`.

## Herkunft des Header-Textes

Im Doorbird-Modul wird der Header-Titel aus `Doorbird/module.json` gelesen:

- zuerst `aliases[0]`
- falls nicht vorhanden: `name`
- sonst Fallback auf einen festen Text

Beispiel:

```json
{
  "name": "Doorbird",
  "aliases": ["Doorbird"]
}
```

## Dynamische Titelbreite

Der Titel wird in der eigenen Tile unsichtbar im Chrome-Element mitgeführt und dort direkt gemessen. Aus dieser gemessenen Breite wird die Hintergrundbreite berechnet.

Beispiel:

```js
const measuredTextWidth = Math.ceil(titleText.getBoundingClientRect().width);
const width = Math.max(72, Math.min(180, measuredTextWidth + 18));
titleBackground.style.width = `${width}px`;
```

Das ist genauer als eine reine Heuristik über die Zeichenanzahl.

## HTML

```html
<section class="myTile">
    <div class="myTile__chrome">
        <div class="myTile__chromeTitle" aria-hidden="true">
            <span class="myTile__chromeTitleText">Doorbird</span>
        </div>
        <div class="myTile__chromeIcon"></div>
    </div>
    <div class="myTile__shell">
        <!-- eigener Tile-Inhalt -->
    </div>
</section>
```

## CSS

```css
.myTile {
    position: relative;
}

.myTile__chrome {
    inset: 14px 12px auto 12px;
    pointer-events: none;
    position: absolute;
    z-index: 3;
}

.myTile__chromeTitle,
.myTile__chromeIcon {
    background: rgba(248, 244, 236, 0.94);
    border: 1px solid rgba(58, 68, 80, 0.12);
    box-shadow: 0 4px 14px rgba(7, 16, 28, 0.12);
    position: absolute;
}

.myTile__chromeTitle {
    border-radius: 999px;
    height: 28px;
    left: 0;
    overflow: hidden;
    top: 0;
}

.myTile__chromeTitleText {
    display: inline-block;
    font: 600 14px/1 "Segoe UI", "Helvetica Neue", sans-serif;
    opacity: 0;
    padding: 0 9px;
    pointer-events: none;
    user-select: none;
    white-space: nowrap;
}

.myTile__chromeIcon {
    border-radius: 999px;
    height: 28px;
    right: 4px;
    top: 0;
    width: 28px;
}

.myTile__shell {
    padding-top: 56px;
    position: relative;
    z-index: 1;
}
```

## Hinweis

Das ist bewusst ein visueller Workaround. Der eigentliche Symcon-Header liegt außerhalb des eigenen HTML-SDK-Inhalts und kann dadurch nicht zuverlässig direkt gestylt oder überschrieben werden.
