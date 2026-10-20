<?php
/**
 * Garage Daytona: new top hero on inner pages (added by Claude).
 * Hides only the page's old Elementor hero section and prints the new hero right after the site header.
 * Nothing else on the page is changed. Pages are switched on one by one in GDX_PAGES.
 */
if (!defined('ABSPATH')) exit;

/* slug => [old Elementor hero section id, title, small line] */
function gdhero_pages() {
	return array(
		'mecanique' => array('218df939', 'Votre voiture entre de bonnes mains.', 'Mécanique · Garage Daytona Genève'),
		/* 4th item true = only on the hidden preview link ?apercu=1 */
		'vente-de-voitures' => array('62acbdcf', 'Votre nouvelle voiture vous attend chez Garage Daytona.', 'Vente de voitures · Garage Daytona Genève', false),
		'contact' => array('1ba31722', 'Restons en contact', 'Contact · Garage Daytona Genève'),
		'a-propos' => array('7044c63a', 'Plus qu’un garage, un partenaire sur la route.', 'À propos · Garage Daytona Genève'),
		'carrosserie' => array('54117825', 'Redonnez vie à votre voiture.', 'Carrosserie · Garage Daytona Genève'),
		'controle-technique-ocv' => array('651fb615', 'Passez votre contrôle technique sans stress.', 'Contrôle technique · Garage Daytona Genève'),
		'nettoyage-detaille' => array('45c1188f', 'Plus qu’un nettoyage, une vraie remise à neuf.', 'Nettoyage détaillé · Garage Daytona Genève'),
	);
}
function gdhero_current() {
	if (is_admin() || !is_page()) return null;
	$p = get_queried_object();
	if (!$p || empty($p->post_name)) return null;
	$all = gdhero_pages();
	if (!isset($all[$p->post_name])) return null;
	$c = $all[$p->post_name];
	if (!empty($c[3]) && !isset($_GET['apercu'])) return null;
	return $c;
}

add_action('wp_head', function () {
	$c = gdhero_current(); if (!$c) return;
	echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
	echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400&family=Hanken+Grotesk:wght@600&display=swap">';
	echo '<style id="gdx-css">.elementor-element.elementor-element-' . esc_attr($c[0]) . '{display:none!important}' . GDHERO_CSS . '</style>';
}, 20);

add_action('wp_body_open', function () {
	$c = gdhero_current(); if (!$c) return;
	echo '<section id="gd-hero" aria-labelledby="gdx-h1"><div class="gdx-in">'
		. '<div class="gdx-car" aria-hidden="true"><svg viewBox="15 10 537 131">' . GDHERO_CAR . '</svg></div>'
		. '<div class="gdx-txt"><h1 id="gdx-h1">' . esc_html($c[1]) . '</h1><span class="gdx-rule" aria-hidden="true"></span>'
		. '<p class="gdx-sub">' . esc_html($c[2]) . '</p></div></div></section>';
}, 30);

define('GDHERO_CAR', <<<'SVG'
<g><path class="r" d="M171.4 132.2Q169.8 133.7 170.2 134.2Q170.5 134.8 171.6 134.8Q172.7 134.8 182.6 133.0Q192.5 131.2 208.2 129.0Q224.0 126.8 231.2 126.3Q238.5 125.8 249.9 125.6Q261.3 125.3 271.3 125.7Q281.3 126.0 292.4 126.8Q303.5 127.7 336.1 131.7Q368.7 135.7 373.7 136.1Q378.7 136.5 382.3 136.4Q386.0 136.3 385.3 135.9Q384.7 135.5 381.9 134.8Q379.2 134.2 353.2 129.6Q327.3 125.0 314.0 122.9Q300.7 120.8 288.8 119.6Q277.0 118.3 263.9 117.6Q250.8 116.8 237.8 117.1Q224.8 117.3 218.3 118.0Q211.8 118.7 204.5 119.9Q197.2 121.2 188.5 124.2Q179.8 127.2 176.4 129.0Q173.0 130.8 171.4 132.2ZM27.6 106.5Q25.8 106.3 27.2 107.6Q28.7 108.8 31.9 110.5Q35.2 112.2 42.2 115.0Q49.3 117.8 54.2 119.4Q59.0 121.0 66.2 122.8Q73.5 124.7 75.6 124.9Q77.7 125.2 78.2 124.8Q78.7 124.5 78.2 123.2Q77.8 122.0 75.5 119.6Q73.2 117.2 63.3 115.4Q53.5 113.7 47.9 112.2Q42.3 110.8 35.8 108.8Q29.3 106.7 27.6 106.5ZM159.6 74.2Q161.3 74.2 159.9 72.9Q158.5 71.7 156.7 70.8Q154.8 70.0 149.4 68.4Q144.0 66.8 139.0 66.1Q134.0 65.3 127.0 65.4Q120.0 65.5 114.4 66.5Q108.8 67.5 102.5 69.8Q96.2 72.0 92.6 74.0Q89.0 76.0 86.7 77.7Q84.3 79.3 82.9 80.7Q81.5 82.0 81.0 83.1Q80.5 84.2 82.1 83.8Q83.7 83.5 88.4 81.1Q93.2 78.7 97.7 76.9Q102.2 75.2 107.8 73.6Q113.5 72.0 116.8 71.4Q120.2 70.8 123.8 70.6Q127.3 70.3 132.0 70.4Q136.7 70.5 140.6 70.9Q144.5 71.3 151.2 72.8Q157.8 74.2 159.6 74.2ZM313.1 66.3Q305.3 67.2 312.6 67.8Q319.8 68.5 339.3 68.3Q358.8 68.2 379.0 67.6Q399.2 67.0 418.9 67.2Q438.7 67.3 448.6 68.2Q458.5 69.0 465.1 69.9Q471.7 70.8 479.3 72.3Q487.0 73.8 494.5 75.8Q502.0 77.8 509.0 80.2Q516.0 82.7 524.3 86.2Q532.7 89.8 533.3 90.4Q534.0 91.0 533.8 91.6Q533.5 92.2 532.9 92.3Q532.3 92.5 521.3 92.4Q510.3 92.3 509.4 92.8Q508.5 93.2 509.0 94.1Q509.5 95.0 514.4 98.4Q519.3 101.8 523.4 105.6Q527.5 109.3 528.7 110.9Q529.8 112.5 530.4 114.2Q531.0 115.8 530.7 117.2Q530.3 118.5 528.6 120.4Q526.8 122.3 522.6 125.1Q518.3 127.8 513.9 130.0Q509.5 132.2 508.9 132.7Q508.3 133.2 508.6 133.5Q508.8 133.8 511.7 133.4Q514.5 133.0 518.8 131.7Q523.0 130.3 526.8 128.8Q530.5 127.2 534.1 125.1Q537.7 123.0 539.0 121.8Q540.3 120.5 540.9 119.5Q541.5 118.5 541.4 116.6Q541.3 114.7 540.0 112.8Q538.7 111.0 535.8 108.7Q533.0 106.3 527.6 103.1Q522.2 99.8 521.7 99.2Q521.2 98.7 521.4 98.0Q521.7 97.3 523.8 96.8Q525.8 96.3 529.8 96.3Q533.7 96.3 538.8 97.0Q544.0 97.7 545.3 97.7Q546.7 97.7 547.1 97.4Q547.5 97.2 547.3 96.4Q547.2 95.7 546.5 95.0Q545.8 94.3 539.8 90.2Q533.8 86.2 529.3 83.7Q524.8 81.2 519.2 78.6Q513.7 76.0 506.8 73.5Q500.0 71.0 493.7 69.2Q487.3 67.5 474.2 65.2Q461.2 62.8 449.6 61.9Q438.0 61.0 424.9 61.0Q411.8 61.0 366.3 63.2Q320.8 65.5 313.1 66.3ZM35.8 68.2Q34.0 70.8 34.8 71.1Q35.5 71.3 40.9 69.2Q46.3 67.2 50.5 65.8Q54.7 64.5 55.6 64.0Q56.5 63.5 56.7 63.0Q56.8 62.5 55.8 62.0Q54.8 61.5 51.7 61.1Q48.5 60.7 42.2 59.0Q35.8 57.3 34.9 57.3Q34.0 57.3 34.0 58.2Q34.0 59.2 36.0 61.5Q38.0 63.8 37.8 64.8Q37.7 65.7 35.8 68.2ZM380.9 56.5Q382.0 56.0 381.9 55.6Q381.8 55.2 380.9 54.4Q380.0 53.7 371.2 48.9Q362.3 44.2 351.4 38.9Q340.5 33.7 332.2 30.2Q324.0 26.8 314.9 23.8Q305.8 20.7 299.1 19.0Q292.3 17.3 285.6 16.2Q278.8 15.0 273.0 14.4Q267.2 13.8 260.6 13.8Q254.0 13.7 245.8 14.0Q237.7 14.3 226.8 15.5Q215.8 16.7 202.3 18.8Q188.8 21.0 170.4 25.1Q152.0 29.2 126.0 36.1Q100.0 43.0 95.4 44.0Q90.8 45.0 84.9 45.8Q79.0 46.7 70.3 46.8Q61.7 47.0 56.0 46.5Q50.3 46.0 42.2 44.3Q34.0 42.7 27.6 40.5Q21.2 38.3 20.3 38.5Q19.5 38.7 19.8 39.6Q20.2 40.5 21.7 41.9Q23.2 43.3 28.2 46.2Q33.2 49.2 38.1 50.9Q43.0 52.7 49.1 53.7Q55.2 54.7 58.6 54.9Q62.0 55.2 71.2 54.9Q80.3 54.7 88.6 53.7Q96.8 52.7 116.6 49.4Q136.3 46.2 143.3 45.6Q150.3 45.0 157.2 45.0Q164.0 45.0 174.3 46.1Q184.7 47.2 198.2 49.8Q211.8 52.5 224.9 54.7Q238.0 56.8 245.8 57.5Q253.5 58.2 254.1 57.9Q254.7 57.7 252.7 57.0Q250.7 56.3 239.3 54.0Q228.0 51.7 217.6 48.6Q207.2 45.5 198.6 41.7Q190.0 37.8 188.1 36.6Q186.2 35.3 185.8 34.8Q185.3 34.3 185.3 33.8Q185.3 33.3 186.1 32.8Q186.8 32.2 193.2 30.2Q199.7 28.3 210.2 26.1Q220.7 23.8 231.3 22.4Q242.0 21.0 253.6 20.7Q265.2 20.3 271.1 20.8Q277.0 21.3 282.9 22.3Q288.8 23.3 298.8 26.2Q308.7 29.0 315.4 31.7Q322.2 34.3 327.3 36.8Q332.5 39.2 338.2 42.2Q344.0 45.3 348.9 48.4Q353.8 51.5 354.5 52.2Q355.2 53.0 354.5 53.8Q353.8 54.5 347.7 55.7Q341.5 56.8 340.2 57.2Q338.8 57.7 339.0 57.9Q339.2 58.2 343.5 58.4Q347.8 58.7 363.8 57.8Q379.8 57.0 380.9 56.5Z"/><path class="w" d="M454.0 76.6Q454.8 76.3 453.1 75.8Q451.3 75.3 445.1 74.7Q438.8 74.0 425.0 73.8Q411.2 73.7 402.8 74.1Q394.3 74.5 380.7 75.8Q367.0 77.2 350.2 79.7Q333.5 82.2 285.6 91.1Q237.7 100.0 225.5 101.8Q213.3 103.5 203.2 104.4Q193.2 105.3 191.4 105.7Q189.7 106.0 189.0 106.4Q188.3 106.8 190.2 107.3Q192.0 107.8 197.2 108.3Q202.3 108.8 213.1 109.0Q223.8 109.2 231.0 108.8Q238.2 108.5 248.7 107.5Q259.2 106.5 271.7 104.7Q284.2 102.8 324.3 95.0Q364.5 87.2 380.5 84.4Q396.5 81.7 407.5 80.2Q418.5 78.8 426.5 78.2Q434.5 77.5 443.8 77.2Q453.2 76.8 454.0 76.6Z"/></g>
SVG);
define('GDHERO_CSS', <<<'CSS'
#gd-hero,#gd-hero *{box-sizing:border-box}
#gd-hero{position:relative;overflow:hidden;background:radial-gradient(80% 120% at 50% 110%,#451820 0%,#38131a 60%);color:#fff;text-align:center;font-family:"Hanken Grotesk",system-ui,-apple-system,sans-serif;-webkit-font-smoothing:antialiased}
#gd-hero .gdx-in{position:relative;max-width:1320px;margin:0 auto;padding:40px max(20px,env(safe-area-inset-right,0px)) 44px max(20px,env(safe-area-inset-left,0px));display:flex;flex-direction:column;align-items:center;justify-content:center}
#gd-hero .gdx-car{width:62%;max-width:300px;margin:0 auto 22px;pointer-events:none}
#gd-hero .gdx-car svg{width:100%;height:auto;display:block;overflow:visible}
#gd-hero .gdx-car .r{fill:#fff}
#gd-hero .gdx-car .w{fill:#fff;fill-opacity:.55}
#gd-hero .gdx-txt{position:relative;z-index:1}
#gd-hero h1{margin:0;padding:0;color:#fff;font:400 clamp(27px,7.6vw,36px)/1.12 "Playfair Display",Georgia,serif;letter-spacing:.02em;text-transform:none;text-wrap:balance}
#gd-hero .gdx-rule{display:block;width:44px;height:2px;background:#fff;margin:18px auto 0;border-radius:2px;transform-origin:center}
#gd-hero .gdx-sub{margin:14px 0 0;font:600 10.5px/1.4 "Hanken Grotesk",system-ui,sans-serif;letter-spacing:.16em;text-transform:uppercase;color:rgba(255,255,255,.7)}
@media (min-width:981px){
  #gd-hero .gdx-in{min-height:460px;padding-top:72px;padding-bottom:72px}
  #gd-hero .gdx-car{position:absolute;margin:0;width:min(1180px,86vw);max-width:none;left:50%;top:50%;transform:translate(-50%,-50%);opacity:.14}
  #gd-hero h1{font-size:clamp(44px,4.2vw,64px);max-width:18ch;margin-inline:auto}
  #gd-hero .gdx-rule{width:64px;margin-top:24px}
  #gd-hero .gdx-sub{margin-top:16px;font-size:12px;letter-spacing:.24em}
}
@media (prefers-reduced-motion:no-preference){
  #gd-hero .gdx-car .r,#gd-hero .gdx-car .w{clip-path:inset(0 100% 0 0);animation:gdxDraw 1.6s cubic-bezier(.65,0,.25,1) .15s forwards}
  #gd-hero h1{animation:gdxRise .8s cubic-bezier(.2,.7,.2,1) .5s both}
  #gd-hero .gdx-rule{animation:gdxGrow .8s cubic-bezier(.65,0,.25,1) 1s both}
}
@keyframes gdxDraw{to{clip-path:inset(0 0 0 0)}}
@keyframes gdxRise{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
@keyframes gdxGrow{from{transform:scaleX(0)}to{transform:scaleX(1)}}
CSS);
