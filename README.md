# From Scratch

A WordPress Starter Theme by Thomas Villain @ anybodesign.com

## Instructions

### Auto-Updater

First of all, remove or customize the Auto-Updater lines at the bottom of the functions.php file.\
If you don't want to use Github/Bitbucket auto-update feature, remove the _plugin-update-checker_ dependency in the _inc_ directory.\
Documentation: <https://github.com/YahnisElsts/plugin-update-checker>

### Custom Post Type

You can add or customize Custom Post Types, find the sample files as declared in functions.php:\
`include_once( dirname( __FILE__ ) . '/inc/custom-post-type.php' );`\
`include_once( dirname( __FILE__ ) . '/inc/custom-post-type-functions.php' );`\
If you don’t need any custom post type, remove these lines.

### ACF Option page and json output

If you don’t need the ACF features, remove or edit the concerned ACF lines in the functions.php file. ACF Pro is required.\
If you need custom ACF blocks, please install [AD ACF Blocks plugin](https://github.com/anybodesign/ad-acf-blocks).
If needed, you can create custom blocks in the `blocks` folder, or remove it and the lines in functions.php starting with:\
`$my_blocks = array_diff( scandir(FS_THEME_DIR . '/blocks'), array('..', '.') );`


## Changelog

### 4.0 - 2020.01.12
* Functions update & fix
* Customizer theme default pictures
* Toolbar nav menu
* Woocommerce templates
* Markup update & cleaning
* CSS update
* FR translation update

### 3.9 - 2020.11.12
* Updated focus-visible (and optionnal)
* Added two breakpoints
* Added ScrollOut JS
* Customizer: post meta options
* CSS, blocks and style guide update
* Fixed current item highlight

### 3.8 - 2020.10.13
* CPT nav higlight fix
* CPT function reloaded
* ACF widget fields
* Woocommerce support and basic styles

### 3.7.1 - 2020.10.02
* Hotfix for main JS
* Blockquote basic style

### 3.7 - 2020.09.25
* Color CSS fix for the Block editor
* Markup updates
* CSS updates
* Main menu focus fix
* Breadcrumbs navxt function
* Translation change
* .pot file

### 3.6.1 - 2020.09.10
* Block editor metabox styles
* Admin Editor styles fix
* Some CSS fix
* Some CSS fix for WP 5.5
* IAS JS and pagination added

### 3.6 - 2020.08.31
* New Block editor styles for WP 5.5
* CSS updates
* Vars updates
* Translation updates
* Site name fix
* Post Block excerpt fix
* Disable Editor fullscreen fix

### 3.5.2 - 2020.07.13
* Block editor styles fixed

### 3.5.1 - 2020.07.13
* Text domain fix
* Some px to rem units
* Mobile nav position
* Escaping outputs

### 3.5 - 2020.06.26
* Cleaner Register/Enqueue
* Update checker 4.9
* No check for admin e-mail
* No default fullscreen
* Admin Editor styles improvments
* Natives CSS color and fonts vars
* Customizer sections update
* Customizer options update
* Customizer live previews update

### 3.4.2 - 2020.05.11
* Custom checkbox fix
* Comments custom template
* Admin bar breakpoint
* Removed site title img alt

### 3.4.1 - 2020.04.24
* Some more blocks CSS
* More CSS vars
* Header title CSS fix

### 3.4 - 2020.04.03
* Beaver Builder support
* Removed custom jQuery
* Removed ACF Builder template part
* CSS updates 
* Mobile Nav update

### 3.3 - 2020.03.29
* Import custom block styles in admin
* Add some theme supports
* Customizer live previews
* A11y fix: active menu item
* Buttons/Inputs CSS
* Introduced CSS vars
* ACF Options subpages menu_slug
* Image sizes names fix

### 3.2 - 2020.01.30
* Back2top JS update
* Sticky Nav JS update
* Title for search results
* Sass reorganization
* New Admin stylesheets
* New Customizer Options

### 3.1 - 2019.12.20
* Templating update
* Custom block template
* Maintenance page template
* Some CSS update
* CSS for blocks centering
* Fancybox update
* Fix missing @font-face

### 3.0 - 2019.12.09
* Link style mixin
* Nav tag around widget menus
* Better CSS responsive menu
* Webfonts: local src and swap
* Display number of comments
* ACF Blocks moved to plugin
* ACF Builder removed
* Mixins cleaning
* Sticky nav fixed
* jQuery 3.4.1
* Auto-updater 4.8.1

### 2.9.9 - 2019.07.23
* ACF Blocks icons
* Switch some em to rem units
* CSS: forms checkbox
* Custom nav menus function

### 2.9.8 - 2019.05.28
* ACF Blocks
* Update blocks deactivator
* Cleaning vars and mixins
* Added `wp_body_open()`

### 2.9.7 - 2019.05.20
* ACF: option page 
* Nav breakpoint (large)
* Tinymce: styles i18n
* Functions fix
* Styleguide template
* New markup

### 2.9.6 - 2019.05.02
* wearewp CPT Class
* Some HTML/CSS fixes
* Fancybox update

### 2.9.5 - 2019.03.04
* HTML fix
* Prid'x removed
* Customizer: back to top
* Customizer: sticky nav

### 2.9.4 - 2019.02.27
* Improved a11y main menu
* Placeholder focus color
* i18n fix
* Gutenberg: Custom CSS removed for gallery blocks
* Gutenberg: Blocks CSS fix
* Gutenberg: Defined font sizes
* Gutenberg: Disable custom font sizes
* Gutenberg: Responsive embeds
* Gutenberg: Blocks deactivator

### 2.9.3 - 2018.11.13
* Conditionnal skiplinks
* Center Mode mixin
* Archives titles
* Excerpt function
* i18n
* Slick & Fancybox
* Some mixins
* Some fixes

### 2.9.2 - 2018.11.05
* Bugfix: Gutenberg editor style
* ACF: gallery role group
* ACF: text-img padding
* CSS: some styles

### 2.9.1 - 2018.09.25
* Bugfix: Gutenberg color palette
* Add constants for template directory
* CSS: Gutenberg columns block
* Bugfix: Gutenberg Gallery CSS backward compatibility
* TinyMCE styles Filter

### 2.9 - 2018.08.09
* White-btn style
* Content width var
* CPT custom stuff
* Include Prid'x in sass
* More comments
* Templates spring cleaning

### 2.8.1 - 2018.07.23
* ACF admin styles (odd/even)
* Sass separate files
* Some more Gravity styles
* Minor fixes

### 2.8 - 2018.07.05
* Extended search: WP search in custom fields
* Some Gutenberg theme support and css
* Typography: Bold Italic
* CSS: pre, code…
* Forms: select ellipsis
* Video ratio function

### 2.7.5 - 2018.06.02
* Translations updated
* Custom and more accessible searchform
* Form css typo

### 2.7.4 - 2018.05.11
* Custom Post Type Labels
* Custom Post Type Flush Rewrite
* Header logo link not on front-page
* Header markup

### 2.7.3 - 2018.05.08
* Adding Custom Post Type
* Adding Custom Taxonomy
* Functions names

### 2.7.2 - 2018.05.07
* Plugin Update Checker update

### 2.7.1 - 2018.05.07
* ACF: pop-up with thumbnails
* ACF: New Text/Picture Section

### 2.7 - 2018.04.18
* A11y: Active nav items
* A11y: .focus class on <li>
* JS: focus-visible polyfill
* Builder markup
* Pridx 1.7.1

### 2.6.1 - 2018.04.16
* CSS fix: Burger menu
* FR translation

### 2.6 - 2018.04.16
* Add ACF Builder
* A11y: Burger menu

### 2.5.3 - 2018.03.12
* Add custom image sizes
* Abspath on template parts
* A11y: Menus aria labels and header
* A11y: Skiplinks
* Table CSS fix

### 2.5.2 - 2018.01.31
* TinyMCE styles
* Testing template part: em and strong

### 2.5.1 - 2018.01.30
* ContactForm 7: Radio buttons and checkboxes
* Forms: Half length fields
* Mixins: pointer pseudo-element 
* A11y: Go to main content first
* A11y: Display image OR text for the logo
* Testing template part: Table container

### 2.5 - 2018.01.07
* Default fonts (Miriam Libre ans Asap)

### 2.4.1 - 2017.12.08
* New breakpoints vars

### 2.4 - 2017.12.01
* 100% width .inner inside .row
* woff2 support
* Typography improvments
* Testing template part for typography

### 2.3 - 2017.11.08
* Customizer fix (WP credit)
* Improved a11y on main menu

### 2.2 - 2017.06.15
* CSS enhancements
* Single with sidebar

### 2.1 - 2017.06.12
* Template versions

### 2.0 - 2017.06.09
* Auto-Updater
* Responsive Youtube and Vimeo Players

### 1.9 - 2017.05.15
* Markup Cleanup

### 1.8 - 2017.05.11
* Customizer
* Custom settings removed
* Prid'x 1.6
* Images removed (sprite)

### 1.7 - 2017.02.08
* Feature image fix
* a11y enhancements (forms)
* Responsive tables

### 1.6 - 2017.01.06
* Added nav.scss and posts.scss

### 1.5 - 2016.11.24
* Added forms.scss
* Prid'x Update
* Minor CSS changes

### 1.4 - 2016.11.21
* New responsive breakpoints
* CSS Fix
* #container removed

### 1.3 - 2016.08.30
* Can't remember what happened for 1.3… ^^

### 1.2 - 2016.08.30
* New responsive breakpoints
* Typography fixes
* Improvements
* Moving from Prid to Prid'x

### 1.1 - 2016.02.15
* Theme Check OK
* Subnav Walker
* Some fixes
* ReadMe added
* Sass powered

### 1.0 - 2016.01.27
* Initial Commit