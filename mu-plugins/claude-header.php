<?php
/**
 * Garage Daytona: new site header (added by Claude).
 * Replaces the header section at the top of each Elementor page with one shared header.
 * The old Elementor header section is only hidden with CSS, never deleted: removing this file brings it back.
 * Kill switch: wp option update gdh_off 1
 */
if (!defined('ABSPATH')) exit;

function gdh_old_id() {
	static $id = null;
	if ($id !== null) return $id;
	$id = '';
	if (is_admin() || !is_singular('page') || (int) get_option('gdh_off', 0) === 1) return $id;
	if (isset($_GET['elementor-preview']) || isset($_GET['oldheader'])) return $id;
	$raw = get_post_meta(get_queried_object_id(), '_elementor_data', true);
	if (!$raw) return $id;
	$d = json_decode($raw, true);
	if (empty($d[0]['id'])) return $id;
	$hasMenu = false;
	$walk = function ($x) use (&$walk, &$hasMenu) {
		foreach (($x['elements'] ?? array()) as $c) {
			if (($c['elType'] ?? '') === 'widget' && ($c['widgetType'] ?? '') === 'navigation-menu') $hasMenu = true;
			$walk($c);
		}
	};
	$walk($d[0]);
	if ($hasMenu) $id = preg_replace('/[^a-z0-9]/i', '', $d[0]['id']);
	return $id;
}

function gdh_menu() {
	$menu = wp_get_nav_menu_object('كراج');
	if (!$menu) return array();
	$items = wp_get_nav_menu_items($menu->term_id);
	if (!$items) return array();
	$top = array();
	foreach ($items as $it) if ((int) $it->menu_item_parent === 0) $top[$it->ID] = array('t' => $it->title, 'u' => $it->url, 'kids' => array());
	foreach ($items as $it) { $p = (int) $it->menu_item_parent; if ($p && isset($top[$p])) $top[$p]['kids'][] = array('t' => $it->title, 'u' => $it->url); }
	return array_values($top);
}

function gdh_is_cur($u) {
	$a = untrailingslashit((string) wp_parse_url($u, PHP_URL_PATH));
	$b = untrailingslashit((string) wp_parse_url(get_permalink(get_queried_object_id()), PHP_URL_PATH));
	if (is_front_page()) $b = '';
	return $u !== '#' && $a === $b;
}


/* Perf: the old (hidden) Elementor header/footer still downloaded a 2 MB logo PNG from another domain.
   Our header/footer replace them, so swap that hidden image for a 1px placeholder. */
add_action('template_redirect', function () {
	if (!gdh_old_id()) return;
	ob_start(function ($html) {
		$px = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		return preg_replace('#https?://client1\.ahmadalhalak\.net/wp-content/uploads/[0-9]{4}/[0-9]{2}/ChatGPT-Image-[^"\'\s,)]+\.png#u', $px, $html);
	});
}, 1);

add_action('wp_head', function () {
	$id = gdh_old_id();
	if (!$id) return;
	echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
	echo '<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@100..125,600..800&family=Hanken+Grotesk:wght@500;600;700&display=swap"><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@100..125,600..800&family=Hanken+Grotesk:wght@500;600;700&display=swap" media="print" onload="this.media=\'all\'"><noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@100..125,600..800&family=Hanken+Grotesk:wght@500;600;700&display=swap"></noscript>';
	echo '<style id="gdh-css">.elementor-element.elementor-element-' . $id . '{display:none!important}' . GDH_CSS . '</style>';
}, 20);

add_action('wp_body_open', function () {
	if (!gdh_old_id()) return;
	$m = gdh_menu();
	if (!$m) return;
	$chev = '<svg class="chev" viewBox="0 0 10 10" aria-hidden="true"><path d="M1.5 3.5 5 7l3.5-3.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
	$arr = '<svg class="ar" viewBox="0 0 16 10" aria-hidden="true"><path d="M1 5h13M10 1l4 4-4 4" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>';
	$contact = null; $nav = ''; $drw = ''; $n = 0;
	foreach ($m as $it) {
		$n++; $num = sprintf('%02d', $n);
		$t = esc_html($it['t']); $u = esc_url($it['u']);
		if (!$it['kids'] && stripos($it['t'], 'contact') !== false) $contact = $it;
		if ($it['kids']) {
			$on = false; $sub = ''; $dsub = '';
			foreach ($it['kids'] as $k) {
				$c = gdh_is_cur($k['u']); if ($c) $on = true;
				$sub .= '<li><a href="' . esc_url($k['u']) . '"' . ($c ? ' class="cur" aria-current="page"' : '') . '>' . esc_html($k['t']) . '</a></li>';
			}
			$nav .= '<li class="dd' . ($on ? ' on' : '') . '"><button type="button" aria-expanded="false">' . $t . $chev . '</button><ul class="menu">' . $sub . '</ul></li>';
			$drw .= '<li class="acc' . ($on ? ' x' : '') . '"><button type="button" aria-expanded="' . ($on ? 'true' : 'false') . '"><span class="n">' . $num . '</span><span class="tx">' . $t . '</span>' . $chev . '</button><ul class="sub">' . $sub . '</ul></li>';
		} else {
			$c = gdh_is_cur($it['u']);
			if ($it !== $contact) $nav .= '<li' . ($c ? ' class="on"' : '') . '><a href="' . $u . '"' . ($c ? ' aria-current="page"' : '') . '>' . $t . '</a></li>';
			$drw .= '<li' . ($c ? ' class="on"' : '') . '><a href="' . $u . '"><span class="n">' . $num . '</span><span class="tx">' . $t . '</span>' . $arr . '</a></li>';
		}
	}
	$home = esc_url(home_url('/'));
	?>
<header id="gd-hdr" role="banner">
	<div class="gdh-in">
		<a class="brand" href="<?php echo $home; ?>" aria-label="Garage Daytona, Sedra SA – accueil"><?php echo GDH_LOGO; ?><span class="t">SEDRA SA</span></a>
		<nav class="nav" aria-label="Menu principal"><ul><?php echo $nav; ?></ul></nav>
		<?php if ($contact) : ?><a class="cta" href="<?php echo esc_url($contact['u']); ?>"><?php echo esc_html($contact['t']); ?></a><?php endif; ?>
		<button class="mb" type="button" aria-label="Menu" aria-expanded="false" aria-controls="gd-drw"><span class="burger"><i></i><i></i><i></i></span></button>
	</div>
	<nav id="gd-drw" aria-label="Menu mobile">
		<ul class="main"><?php echo $drw; ?></ul>
		<div class="foot">
			<div class="fl">Nous joindre</div>
			<div class="tels"><a href="tel:+41227329837"><small>Garage</small>022 732 98 37</a><a href="tel:+41795618647"><small>Mobile</small>079 561 86 47</a></div>
			<div class="adr">Rue de Lausanne 64-66 · 1202 Genève</div>
		</div>
	</nav>
</header>
<script>
(function(){var h=document.getElementById('gd-hdr');if(!h)return;var b=h.querySelector('.mb'),d=document.getElementById('gd-drw');
function setOpen(o){h.classList.toggle('open',o);b.setAttribute('aria-expanded',o?'true':'false');document.documentElement.classList.toggle('gdh-lock',o);}
b.addEventListener('click',function(){setOpen(!h.classList.contains('open'))});
document.addEventListener('keydown',function(e){if(e.key==='Escape'){setOpen(false);h.querySelectorAll('.dd.open').forEach(function(x){x.classList.remove('open');x.querySelector('button').setAttribute('aria-expanded','false')})}});
h.querySelectorAll('.acc>button').forEach(function(x){x.addEventListener('click',function(){var o=x.parentNode.classList.toggle('x');x.setAttribute('aria-expanded',o?'true':'false')})});
h.querySelectorAll('.dd>button').forEach(function(x){x.addEventListener('click',function(e){e.stopPropagation();var o=x.parentNode.classList.toggle('open');x.setAttribute('aria-expanded',o?'true':'false')})});
document.addEventListener('click',function(){h.querySelectorAll('.dd.open').forEach(function(x){x.classList.remove('open')})});
addEventListener('resize',function(){if(innerWidth>980)setOpen(false)});
try{if(!sessionStorage.getItem('gdhSeen')){h.classList.add('intro');sessionStorage.setItem('gdhSeen','1')}}catch(e){h.classList.add('intro')}
var br=h.querySelector('.brand'),busy=0;br.addEventListener('mouseenter',function(){if(busy||!matchMedia('(hover:hover)').matches)return;busy=1;h.classList.remove('intro');void h.offsetWidth;h.classList.add('intro');setTimeout(function(){busy=0},1600)});
})();
</script>
<?php
}, 5);

define('GDH_LOGO', '<svg viewBox="17 11 533 147" aria-hidden="true" focusable="false"><g class="body"><path fill="#b84d5c" d="M171.4 132.2Q169.8 133.7 170.2 134.2Q170.5 134.8 171.6 134.8Q172.7 134.8 182.6 133.0Q192.5 131.2 208.2 129.0Q224.0 126.8 231.2 126.3Q238.5 125.8 249.9 125.6Q261.3 125.3 271.3 125.7Q281.3 126.0 292.4 126.8Q303.5 127.7 336.1 131.7Q368.7 135.7 373.7 136.1Q378.7 136.5 382.3 136.4Q386.0 136.3 385.3 135.9Q384.7 135.5 381.9 134.8Q379.2 134.2 353.2 129.6Q327.3 125.0 314.0 122.9Q300.7 120.8 288.8 119.6Q277.0 118.3 263.9 117.6Q250.8 116.8 237.8 117.1Q224.8 117.3 218.3 118.0Q211.8 118.7 204.5 119.9Q197.2 121.2 188.5 124.2Q179.8 127.2 176.4 129.0Q173.0 130.8 171.4 132.2ZM27.6 106.5Q25.8 106.3 27.2 107.6Q28.7 108.8 31.9 110.5Q35.2 112.2 42.2 115.0Q49.3 117.8 54.2 119.4Q59.0 121.0 66.2 122.8Q73.5 124.7 75.6 124.9Q77.7 125.2 78.2 124.8Q78.7 124.5 78.2 123.2Q77.8 122.0 75.5 119.6Q73.2 117.2 63.3 115.4Q53.5 113.7 47.9 112.2Q42.3 110.8 35.8 108.8Q29.3 106.7 27.6 106.5ZM159.6 74.2Q161.3 74.2 159.9 72.9Q158.5 71.7 156.7 70.8Q154.8 70.0 149.4 68.4Q144.0 66.8 139.0 66.1Q134.0 65.3 127.0 65.4Q120.0 65.5 114.4 66.5Q108.8 67.5 102.5 69.8Q96.2 72.0 92.6 74.0Q89.0 76.0 86.7 77.7Q84.3 79.3 82.9 80.7Q81.5 82.0 81.0 83.1Q80.5 84.2 82.1 83.8Q83.7 83.5 88.4 81.1Q93.2 78.7 97.7 76.9Q102.2 75.2 107.8 73.6Q113.5 72.0 116.8 71.4Q120.2 70.8 123.8 70.6Q127.3 70.3 132.0 70.4Q136.7 70.5 140.6 70.9Q144.5 71.3 151.2 72.8Q157.8 74.2 159.6 74.2ZM313.1 66.3Q305.3 67.2 312.6 67.8Q319.8 68.5 339.3 68.3Q358.8 68.2 379.0 67.6Q399.2 67.0 418.9 67.2Q438.7 67.3 448.6 68.2Q458.5 69.0 465.1 69.9Q471.7 70.8 479.3 72.3Q487.0 73.8 494.5 75.8Q502.0 77.8 509.0 80.2Q516.0 82.7 524.3 86.2Q532.7 89.8 533.3 90.4Q534.0 91.0 533.8 91.6Q533.5 92.2 532.9 92.3Q532.3 92.5 521.3 92.4Q510.3 92.3 509.4 92.8Q508.5 93.2 509.0 94.1Q509.5 95.0 514.4 98.4Q519.3 101.8 523.4 105.6Q527.5 109.3 528.7 110.9Q529.8 112.5 530.4 114.2Q531.0 115.8 530.7 117.2Q530.3 118.5 528.6 120.4Q526.8 122.3 522.6 125.1Q518.3 127.8 513.9 130.0Q509.5 132.2 508.9 132.7Q508.3 133.2 508.6 133.5Q508.8 133.8 511.7 133.4Q514.5 133.0 518.8 131.7Q523.0 130.3 526.8 128.8Q530.5 127.2 534.1 125.1Q537.7 123.0 539.0 121.8Q540.3 120.5 540.9 119.5Q541.5 118.5 541.4 116.6Q541.3 114.7 540.0 112.8Q538.7 111.0 535.8 108.7Q533.0 106.3 527.6 103.1Q522.2 99.8 521.7 99.2Q521.2 98.7 521.4 98.0Q521.7 97.3 523.8 96.8Q525.8 96.3 529.8 96.3Q533.7 96.3 538.8 97.0Q544.0 97.7 545.3 97.7Q546.7 97.7 547.1 97.4Q547.5 97.2 547.3 96.4Q547.2 95.7 546.5 95.0Q545.8 94.3 539.8 90.2Q533.8 86.2 529.3 83.7Q524.8 81.2 519.2 78.6Q513.7 76.0 506.8 73.5Q500.0 71.0 493.7 69.2Q487.3 67.5 474.2 65.2Q461.2 62.8 449.6 61.9Q438.0 61.0 424.9 61.0Q411.8 61.0 366.3 63.2Q320.8 65.5 313.1 66.3ZM35.8 68.2Q34.0 70.8 34.8 71.1Q35.5 71.3 40.9 69.2Q46.3 67.2 50.5 65.8Q54.7 64.5 55.6 64.0Q56.5 63.5 56.7 63.0Q56.8 62.5 55.8 62.0Q54.8 61.5 51.7 61.1Q48.5 60.7 42.2 59.0Q35.8 57.3 34.9 57.3Q34.0 57.3 34.0 58.2Q34.0 59.2 36.0 61.5Q38.0 63.8 37.8 64.8Q37.7 65.7 35.8 68.2ZM380.9 56.5Q382.0 56.0 381.9 55.6Q381.8 55.2 380.9 54.4Q380.0 53.7 371.2 48.9Q362.3 44.2 351.4 38.9Q340.5 33.7 332.2 30.2Q324.0 26.8 314.9 23.8Q305.8 20.7 299.1 19.0Q292.3 17.3 285.6 16.2Q278.8 15.0 273.0 14.4Q267.2 13.8 260.6 13.8Q254.0 13.7 245.8 14.0Q237.7 14.3 226.8 15.5Q215.8 16.7 202.3 18.8Q188.8 21.0 170.4 25.1Q152.0 29.2 126.0 36.1Q100.0 43.0 95.4 44.0Q90.8 45.0 84.9 45.8Q79.0 46.7 70.3 46.8Q61.7 47.0 56.0 46.5Q50.3 46.0 42.2 44.3Q34.0 42.7 27.6 40.5Q21.2 38.3 20.3 38.5Q19.5 38.7 19.8 39.6Q20.2 40.5 21.7 41.9Q23.2 43.3 28.2 46.2Q33.2 49.2 38.1 50.9Q43.0 52.7 49.1 53.7Q55.2 54.7 58.6 54.9Q62.0 55.2 71.2 54.9Q80.3 54.7 88.6 53.7Q96.8 52.7 116.6 49.4Q136.3 46.2 143.3 45.6Q150.3 45.0 157.2 45.0Q164.0 45.0 174.3 46.1Q184.7 47.2 198.2 49.8Q211.8 52.5 224.9 54.7Q238.0 56.8 245.8 57.5Q253.5 58.2 254.1 57.9Q254.7 57.7 252.7 57.0Q250.7 56.3 239.3 54.0Q228.0 51.7 217.6 48.6Q207.2 45.5 198.6 41.7Q190.0 37.8 188.1 36.6Q186.2 35.3 185.8 34.8Q185.3 34.3 185.3 33.8Q185.3 33.3 186.1 32.8Q186.8 32.2 193.2 30.2Q199.7 28.3 210.2 26.1Q220.7 23.8 231.3 22.4Q242.0 21.0 253.6 20.7Q265.2 20.3 271.1 20.8Q277.0 21.3 282.9 22.3Q288.8 23.3 298.8 26.2Q308.7 29.0 315.4 31.7Q322.2 34.3 327.3 36.8Q332.5 39.2 338.2 42.2Q344.0 45.3 348.9 48.4Q353.8 51.5 354.5 52.2Q355.2 53.0 354.5 53.8Q353.8 54.5 347.7 55.7Q341.5 56.8 340.2 57.2Q338.8 57.7 339.0 57.9Q339.2 58.2 343.5 58.4Q347.8 58.7 363.8 57.8Q379.8 57.0 380.9 56.5Z"/><path fill="#ffffff" d="M454.0 76.6Q454.8 76.3 453.1 75.8Q451.3 75.3 445.1 74.7Q438.8 74.0 425.0 73.8Q411.2 73.7 402.8 74.1Q394.3 74.5 380.7 75.8Q367.0 77.2 350.2 79.7Q333.5 82.2 285.6 91.1Q237.7 100.0 225.5 101.8Q213.3 103.5 203.2 104.4Q193.2 105.3 191.4 105.7Q189.7 106.0 189.0 106.4Q188.3 106.8 190.2 107.3Q192.0 107.8 197.2 108.3Q202.3 108.8 213.1 109.0Q223.8 109.2 231.0 108.8Q238.2 108.5 248.7 107.5Q259.2 106.5 271.7 104.7Q284.2 102.8 324.3 95.0Q364.5 87.2 380.5 84.4Q396.5 81.7 407.5 80.2Q418.5 78.8 426.5 78.2Q434.5 77.5 443.8 77.2Q453.2 76.8 454.0 76.6Z"/></g><g class="wh"><circle stroke="#ffffff" cx="126.7" cy="115.6" r="32.1" fill="none" stroke-width="11.2"/><g stroke="#b84d5c" fill="none" stroke-width="3" stroke-linecap="round"><circle cx="126.7" cy="115.6" r="6.2"/><path d="M126.7 106.1v3M126.7 122.1v3M117.2 115.6h3M133.2 115.6h3"/></g><circle fill="#b84d5c" cx="126.7" cy="115.6" r="2"/></g><g class="wh wh2"><circle stroke="#ffffff" cx="450.2" cy="116.6" r="30.6" fill="none" stroke-width="10.6"/><g stroke="#b84d5c" fill="none" stroke-width="3" stroke-linecap="round"><circle cx="450.2" cy="116.6" r="6.2"/><path d="M450.2 107.1v3M450.2 123.1v3M440.7 116.6h3M456.7 116.6h3"/></g><circle fill="#b84d5c" cx="450.2" cy="116.6" r="2"/></g></svg>');
define('GDH_CSS', '#gd-hdr,#gd-hdr *{box-sizing:border-box} #gd-hdr{position:sticky;top:0;z-index:9990;background:#0f172a;border-bottom:1px solid rgba(255,255,255,.08);font-family:"Hanken Grotesk",system-ui,-apple-system,sans-serif;-webkit-font-smoothing:antialiased} .admin-bar #gd-hdr{top:32px} #gd-hdr ul{list-style:none;margin:0;padding:0} #gd-hdr a{text-decoration:none!important;box-shadow:none} #gd-hdr button{all:unset;box-sizing:border-box;cursor:pointer} #gd-hdr button:focus-visible,#gd-hdr a:focus-visible{outline:2px solid #b84d5c;outline-offset:3px} #gd-hdr .gdh-in{max-width:1320px;margin:0 auto;height:68px;padding:0 40px;display:flex;align-items:center;gap:28px} #gd-hdr .brand{display:flex;align-items:center;flex:none;color:#fff} #gd-hdr .brand svg{width:104px;height:auto;display:block;overflow:visible} #gd-hdr .brand .t{border-left:1px solid rgba(255,255,255,.16);margin-left:16px;padding:6px 0 6px 16px;font:700 15px/1 "Archivo",sans-serif;font-stretch:125%;letter-spacing:.16em;color:#fff;white-space:nowrap} #gd-hdr .nav{margin-left:auto} #gd-hdr .nav>ul{display:flex;align-items:center;gap:2px} #gd-hdr .nav>ul>li{position:relative} #gd-hdr .nav>ul>li>a,#gd-hdr .nav>ul>li>button{display:flex;align-items:center;gap:6px;height:68px;padding:0 15px;color:#c3cad8;font:500 15px/1 "Hanken Grotesk",sans-serif;letter-spacing:.005em;position:relative;transition:color .2s} #gd-hdr .nav>ul>li>a:hover,#gd-hdr .nav>ul>li>button:hover,#gd-hdr .nav>ul>li.on>a,#gd-hdr .nav>ul>li.on>button{color:#fff} #gd-hdr .nav>ul>li.on>a::after,#gd-hdr .nav>ul>li.on>button::after{content:"";position:absolute;left:15px;right:15px;bottom:16px;height:2px;border-radius:2px;background:#b84d5c} #gd-hdr .chev{width:10px;height:10px;transition:transform .2s} #gd-hdr .dd:hover .chev,#gd-hdr .dd.open .chev,#gd-hdr .dd:focus-within .chev{transform:rotate(180deg)} #gd-hdr .menu{position:absolute;top:calc(100% - 4px);left:0;min-width:250px;background:#fff;border-radius:12px;padding:8px;border:1px solid #e6e9ef;box-shadow:0 24px 50px -12px rgba(15,23,42,.35);opacity:0;visibility:hidden;transform:translateY(6px);transition:.18s} #gd-hdr .dd:hover .menu,#gd-hdr .dd.open .menu,#gd-hdr .dd:focus-within .menu{opacity:1;visibility:visible;transform:none} #gd-hdr .menu a{display:block;padding:10px 12px;border-radius:8px;color:#0f172a;font:600 14.5px/1.3 "Hanken Grotesk",sans-serif} #gd-hdr .menu a:hover{background:#f1f3f7} #gd-hdr .menu a.cur{color:#9c2b3b} #gd-hdr .cta{display:inline-flex;align-items:center;flex:none;height:40px;padding:0 26px;margin-left:14px;border-radius:4px;background:#9c2b3b;color:#fff!important;font:600 14.5px/1 "Hanken Grotesk",sans-serif;letter-spacing:.04em;transition:background .2s} #gd-hdr .cta:hover{background:#b84d5c} #gd-hdr .mb{display:none;width:42px;height:42px;align-items:center;justify-content:center;margin-left:auto} #gd-hdr .burger{display:flex;flex-direction:column;gap:5px;width:22px} #gd-hdr .burger i{display:block;height:2px;border-radius:2px;background:#fff;transition:.25s} #gd-hdr .burger i:nth-child(2){width:15px;margin-left:auto} #gd-hdr.open .burger i:nth-child(1){transform:translateY(7px) rotate(45deg)} #gd-hdr.open .burger i:nth-child(2){opacity:0} #gd-hdr.open .burger i:nth-child(3){transform:translateY(-7px) rotate(-45deg)} #gd-drw{display:none} @media (max-width:980px){ #gd-hdr .gdh-in{height:56px;padding:0 8px 0 14px;gap:8px} #gd-hdr .nav,#gd-hdr .cta{display:none} #gd-hdr .mb{display:flex} #gd-hdr .brand svg{width:62px} #gd-hdr .brand .t{margin-left:11px;padding-left:11px;font-size:12px;letter-spacing:.14em} #gd-drw{display:flex;flex-direction:column;position:fixed;left:0;right:0;top:57px;bottom:0;background:#0f172a;padding:6px 22px calc(20px + env(safe-area-inset-bottom));overflow-y:auto;opacity:0;visibility:hidden;transform:translateY(-8px);transition:.22s} .admin-bar #gd-drw{top:103px} #gd-hdr.open #gd-drw{opacity:1;visibility:visible;transform:none} html.gdh-lock,html.gdh-lock body{overflow:hidden} #gd-drw .main>li{border-bottom:1px solid rgba(255,255,255,.07)} #gd-drw .main>li>a,#gd-drw .main>li>button{display:grid;grid-template-columns:30px 1fr auto;align-items:center;width:100%;padding:14px 0;color:#fff;font:600 20px/1.2 "Archivo",sans-serif;font-stretch:112%} #gd-drw .main>li.on>a .tx{color:#c9606e} #gd-drw .n{font:600 10.5px/1 "Hanken Grotesk",sans-serif;letter-spacing:.08em;color:#b84d5c} #gd-drw .ar{width:16px;height:10px;color:rgba(255,255,255,.35)} #gd-drw .chev{width:12px;height:12px;opacity:.55} #gd-drw .acc.x .chev{transform:rotate(180deg)} #gd-drw .sub{margin-left:30px!important;max-height:0;overflow:hidden;transition:max-height .25s} #gd-drw .acc.x .sub{max-height:340px} #gd-drw .sub a{display:flex;align-items:center;gap:10px;padding:7px 0;color:#9aa4b8;font:500 15px/1.3 "Hanken Grotesk",sans-serif} #gd-drw .sub a::before{content:"";width:8px;height:1px;background:rgba(255,255,255,.3);flex:none} #gd-drw .sub a.cur{color:#fff} #gd-drw .sub a.cur::before{background:#b84d5c;width:14px;height:2px} #gd-drw .sub li:last-child a{margin-bottom:10px} #gd-drw .foot{margin-top:auto;padding-top:18px} #gd-drw .fl{display:flex;align-items:center;gap:10px;margin-bottom:10px;font:600 10px/1 "Hanken Grotesk",sans-serif;letter-spacing:.28em;text-transform:uppercase;color:#7d879c} #gd-drw .fl::after{content:"";flex:1;height:1px;background:rgba(255,255,255,.08)} #gd-drw .tels{display:grid;grid-template-columns:1fr 1fr;gap:8px} #gd-drw .tels a{display:flex;flex-direction:column;justify-content:center;gap:3px;height:62px;padding:0 14px;border-radius:6px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.09);color:#fff;font:700 15.5px/1.1 "Hanken Grotesk",sans-serif;letter-spacing:.02em;font-variant-numeric:tabular-nums} #gd-drw .tels a:first-child{background:#9c2b3b;border-color:#9c2b3b} #gd-drw .tels small{font:600 9px/1 "Hanken Grotesk",sans-serif;letter-spacing:.22em;text-transform:uppercase;opacity:.75} #gd-drw .adr{margin-top:12px;text-align:center;font:500 12.5px/1.4 "Hanken Grotesk",sans-serif;color:#7d879c} } @media (max-width:782px){.admin-bar #gd-hdr{top:46px}.admin-bar #gd-drw{top:103px}} @media (min-width:783px) and (max-width:980px){.admin-bar #gd-drw{top:89px}} @media (prefers-reduced-motion:no-preference){ #gd-hdr.intro .brand svg .body{clip-path:inset(0 100% 0 0);animation:gdhDraw 1.1s cubic-bezier(.65,0,.25,1) .2s forwards} #gd-hdr.intro .brand svg .wh{transform-box:fill-box;transform-origin:center;opacity:0;animation:gdhRoll 1.1s cubic-bezier(.2,.7,.2,1) .3s forwards} #gd-hdr.intro .brand svg .wh2{animation-delay:.45s} @media (max-width:980px){ #gd-drw .main>li,#gd-drw .foot{opacity:0;transform:translateY(10px);transition:opacity .35s,transform .35s cubic-bezier(.2,.7,.2,1)} #gd-hdr.open #gd-drw .main>li,#gd-hdr.open #gd-drw .foot{opacity:1;transform:none} #gd-hdr.open #gd-drw .main>li:nth-child(2){transition-delay:.04s}#gd-hdr.open #gd-drw .main>li:nth-child(3){transition-delay:.08s} #gd-hdr.open #gd-drw .main>li:nth-child(4){transition-delay:.12s}#gd-hdr.open #gd-drw .main>li:nth-child(5){transition-delay:.16s} #gd-hdr.open #gd-drw .foot{transition-delay:.22s} } } @keyframes gdhDraw{to{clip-path:inset(0 0 0 0)}} @keyframes gdhRoll{from{opacity:0;transform:translateX(-60px) rotate(-300deg)}to{opacity:1;transform:none}}');
