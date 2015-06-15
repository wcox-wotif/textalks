# Changelog

## v2.2.0

+ Revised license model. Isotope is licensed GPL by default. Purchasing a commercial license allows use outside of the GPL, under the Commercial License terms. Read details at: [isotope.metafizzy.co/license.html](http://isotope.metafizzy.co/license.html)
+ Added [`arrangeComplete` event](http://isotope.metafizzy.co/events.html#arrangecomplete). Fixed [#732](https://github.com/metafizzy/isotope/issues/732)
+ Changed `bower.json` `main` to just `js/isotope.js`. Resolved [#879](https://github.com/metafizzy/isotope/issues/879)
+ Added [fizzy-ui-utils](https://github.com/metafizzy/fizzy-ui-utils)
+ Removed `isoInstance` argument from `layoutComplete` and `removeComplete` events

### v2.1.1

+ Refactored hide/reveal logic with filtering
+ Required [getSize](https://github.com/desandro/getsize) v1.2.2. Fixed [#860](https://github.com/metafizzy/isotope/issues/580)

## v2.1.0

+ Add CommonJS support for npm/Browserify
+ Add gutter option for fitRows [#580](https://github.com/metafizzy/isotope/issues/580)
+ Fix `updateSortData` with empty Array or jQuery object

## v2.0.1

+ added `getFilteredItemElements` method [#768](https://github.com/metafizzy/isotope/issues/768)
+ added `shuffle` method
+ Fix display on `destroy` [#741](https://github.com/metafizzy/isotope/issues/741)