<?php
/**
 * Garage Daytona: site icon and social preview (added by Claude).
 * - Browser, phone and Google icon (red round car logo).
 * - WhatsApp / Facebook / X preview of the home page: navy branded cover, French locale.
 * Removing this file brings back the previous behaviour.
 */
if (!defined('ABSPATH')) exit;
define('GDBRAND_URL', '/wp-content/uploads/claude/brand/');

add_action('wp_head', function () {
  $u = esc_url(home_url(GDBRAND_URL));
  foreach (array(48, 96, 192) as $s) echo '<link rel="icon" href="' . $u . 'icon-' . $s . '.png?v=2" sizes="' . $s . 'x' . $s . '" type="image/png">' . "\n";
  echo '<link rel="apple-touch-icon" href="' . $u . 'icon-180.png?v=1">' . "\n";
  echo '<meta name="theme-color" content="#0f172a">' . "\n";
}, 2);

// the home page link preview uses the branded cover (Yoast SEO filters)
$gdbrand_cover = function ($img) {
  if (function_exists('is_front_page') && is_front_page()) return home_url(GDBRAND_URL . 'og-cover.jpg?v=1');
  return $img;
};
add_filter('wpseo_opengraph_image', $gdbrand_cover, 99);
add_filter('wpseo_twitter_image', $gdbrand_cover, 99);
add_filter('wpseo_og_locale', function () { return 'fr_FR'; }, 99);

// tires page: same red as the rest of the site (overrides its stylesheet until the page itself is redeployed)
add_action('wp_head', function () {
  if (!function_exists('is_page') || !is_page('pneus-occasion')) return;
  echo '<style id="gd-pneus-red">html body #gd-pneus{--copper:#9c2b3b;--copper-hi:#9c2b3b;--red:#9c2b3b;--red-hi:#b84d5c}html body #gd-pneus .hero .finder{--copper-hi:#9c2b3b}html body #gd-pneus .dx .dh-season[data-s="ete"]{color:#9c2b3b}html body #gd-pneus .dx .dx-days em{color:#9c2b3b}html body #gd-pneus .co .dot,html body #gd-pneus .hero .co .dot{box-shadow:0 0 0 5px rgba(156,43,59,.4),0 0 16px rgba(255,255,255,.7)}</style>' . "\n";
}, 99);
