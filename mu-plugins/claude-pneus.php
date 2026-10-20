<?php
/**
 * Garage Daytona: page "Pneus d'occasion" (added by Claude).
 * Only touches the page whose slug is pneus-occasion. Every other page is left untouched.
 * Assets live in wp-content/uploads/pneus/ (pneus.css, pneus.js, body.html, img/).
 * While option gdp_public is 0 the page is hidden from search engines and sitemaps.
 */
if (!defined('ABSPATH')) exit;

define('GDP_SLUG', 'pneus-occasion');
define('GDP_DIR', WP_CONTENT_DIR . '/uploads/pneus');
define('GDP_TO', 'garage-daytona@bluewin.ch');

function gdp_is() { return !is_admin() && is_page(GDP_SLUG); }
function gdp_public() { return (int) get_option('gdp_public', 0) === 1; }

/* The page itself is an Elementor Canvas page: header and footer are the site's own Elementor sections, copied from the Contact page by pneus-wp-build.php */
add_filter('body_class', function ($c) { if (gdp_is()) $c[] = 'gdp-page'; return $c; });

add_action('wp_enqueue_scripts', function () {
	if (!gdp_is()) return;
	$b = content_url('uploads/pneus');
	wp_enqueue_style('gdp-fonts', 'https://fonts.googleapis.com/css2?family=Archivo:ital,wdth,wght@0,62..125,400..900;1,62..125,400..900&family=Hanken+Grotesk:wght@400;500;600;700&display=swap', array(), null);
	wp_enqueue_style('gdp', $b . '/pneus.css', array(), substr(md5_file(GDP_DIR . '/pneus.css'),0,10));
	wp_add_inline_style('gdp', 'body.gdp-page .gdp-host .elementor-widget-wrap{padding:0!important}body.gdp-page .gdp-host .elementor-widget-html{margin:0!important}');
	wp_enqueue_script('gdp', $b . '/pneus.js', array(), substr(md5_file(GDP_DIR . '/pneus.js'),0,10), true);
}, 50);

/* Hidden phase: noindex + out of the sitemap */
add_filter('wp_robots', function ($r) {
	if (gdp_is() && !gdp_public()) { $r['noindex'] = true; $r['nofollow'] = true; }
	return $r;
});
add_filter('wpseo_robots', function ($v) { return (gdp_is() && !gdp_public()) ? 'noindex, nofollow' : $v; });
add_filter('wpseo_exclude_from_sitemap_by_post_ids', function ($ids) {
	if (gdp_public()) return $ids;
	$p = get_page_by_path(GDP_SLUG);
	if ($p) $ids[] = $p->ID;
	return $ids;
});

/* SEO title and description */
add_filter('pre_get_document_title', function ($t) { return gdp_is() ? "Pneus d'occasion à Genève, jeux complets | Garage Daytona" : $t; }, 99);
add_filter('wpseo_title', function ($t) { return gdp_is() ? "Pneus d'occasion à Genève, jeux complets | Garage Daytona" : $t; }, 99);
add_filter('wpseo_metadesc', function ($d) { return gdp_is() ? "Pneus d'hiver et d'été d'occasion à Genève : jeux complets avec ou sans jantes, photos réelles, prix fixe. Réservez en ligne ou par WhatsApp, retrait au garage." : $d; }, 99);

/* Booking: e-mail to the garage */
add_action('rest_api_init', function () {
	register_rest_route('garagedaytona/v1', '/pneus-reservation', array(
		'methods' => 'POST',
		'permission_callback' => '__return_true',
		'callback' => 'gdp_booking',
	));
});
function gdp_booking($req) {
	$p = (array) $req->get_json_params();
	$f = function ($k, $n = 200) use ($p) { return mb_substr(sanitize_text_field(isset($p[$k]) ? (string) $p[$k] : ''), 0, $n); };
	$name = $f('name', 80); $phone = $f('phone', 30); $day = $f('day', 60);
	$what = $f('what', 200); $ref = $f('ref', 20); $id = $f('id', 12);
	if ($name === '' || strlen(preg_replace('/\D/', '', $phone)) < 9 || $day === '' || !preg_match('/^D-\d{4}$/', $id)) {
		return new WP_REST_Response(array('ok' => false, 'error' => 'invalid'), 400);
	}
	if (!empty($p['test'])) return array('ok' => true, 'test' => true);
	$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0';
	$k = 'gdp_rl_' . md5($ip); $n = (int) get_transient($k);
	if ($n >= 5) return new WP_REST_Response(array('ok' => false, 'error' => 'rate'), 429);
	set_transient($k, $n + 1, HOUR_IN_SECONDS);
	$body = "Nouvelle réservation de pneus sur garagedaytona.ch\n\n"
		. "Référence : $ref\nJeu : $what (réf. $id)\nRetrait souhaité : $day\n\nNom : $name\nTéléphone : $phone\n\n"
		. "Page : " . home_url('/' . GDP_SLUG . '/') . "\n";
	$sent = wp_mail(GDP_TO, "Réservation pneus $ref : $name", $body);
	return array('ok' => (bool) $sent);
}
