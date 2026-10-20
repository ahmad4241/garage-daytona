<?php
/**
 * Garage Daytona: QR landing page at /qr/ (added by Claude).
 * A standalone page served before WordPress builds a theme page. No other page is touched.
 * Hidden from search engines (noindex) and kept out of the sitemap: it exists for the printed QR code only.
 */
if (!defined('ABSPATH')) exit;

add_action('init', function () {
	$path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
	if ($path !== 'qr') return;
	if (substr((string) parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), -1) !== '/') { wp_safe_redirect(home_url('/qr/'), 301); exit; }
	status_header(200);
	header('Content-Type: text/html; charset=utf-8');
	header('X-Robots-Tag: noindex, follow');
	header('Cache-Control: no-cache, max-age=0, must-revalidate');
	$icon = function_exists('get_site_icon_url') ? get_site_icon_url(192) : '';
	echo "<!doctype html>\n<html lang=\"fr\">\n<head>\n<meta charset=\"utf-8\">\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, viewport-fit=cover\">\n<meta name=\"robots\" content=\"noindex, follow\">\n<meta name=\"theme-color\" content=\"#0f172a\">\n<meta name=\"format-detection\" content=\"telephone=no, address=no, email=no\">\n<meta name=\"description\" content=\"Garage Daytona, Genève : site web, pneus d'occasion, services et vente de voitures en un clic.\">\n";
	if ($icon) echo '<link rel="icon" href="' . esc_url($icon) . '">' . "\n";
	echo <<<'GDQR'
<title>Garage Daytona · Genève</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@62..125,400..800&family=Hanken+Grotesk:wght@400;500;600;700&display=swap">
<style>
/* Layout: one phone-width column. Navy band with the garage logo, four big rows on white, navy footer with icon row. Same identity as garagedaytona.ch. */
:root{
  --navy:#0f172a; --navy-2:#1b2438; --red:#9c2b3b; --red-hi:#b84d5c;
  --paper:#ffffff; --ground:#eef0f4; --ink:#0f172a; --muted:#5b6476; --line:#e3e6ec;
  --on-navy:#ffffff; --on-navy-muted:#9aa4b8;
  --display:"Archivo","Arial Narrow",system-ui,sans-serif;
  --body:"Hanken Grotesk",system-ui,-apple-system,"Segoe UI",sans-serif;
  color-scheme:light;
}
*{box-sizing:border-box}
body{margin:0;background:var(--ground);color:var(--ink);font-family:var(--body);-webkit-font-smoothing:antialiased}
.wrap{max-width:480px;margin:0 auto;min-height:100%;background:var(--paper);display:flex;flex-direction:column;box-shadow:0 0 0 1px var(--line)}
.pad{padding-left:max(20px,env(safe-area-inset-left,0px));padding-right:max(20px,env(safe-area-inset-right,0px))}

/* Header band */
.top{background:var(--navy);color:var(--on-navy);padding-block:30px 26px;position:relative;overflow:hidden}
.top::after{content:"";position:absolute;left:0;right:0;bottom:0;height:3px;background:var(--red)}
.brand{display:flex;align-items:center;gap:14px}
.brand svg{width:96px;height:auto;display:block;overflow:visible}
.brand .t{border-left:1px solid rgba(255,255,255,.16);padding:5px 0 5px 14px}
.brand b{display:block;font:700 15px/1 var(--display);font-stretch:125%;letter-spacing:.16em}
.brand small{display:block;margin-top:7px;font:600 10px/1 var(--body);letter-spacing:.26em;text-transform:uppercase;color:var(--on-navy-muted)}
.ask{margin:26px 0 0;font:700 28px/1.1 var(--display);font-stretch:112%;letter-spacing:-.01em;text-wrap:balance}
.ask em{font-style:normal;color:inherit}
.sub{margin:8px 0 0;font:500 14.5px/1.45 var(--body);color:var(--on-navy-muted)}
.now{display:inline-flex;align-items:center;gap:9px;margin:16px 0 0;padding:8px 14px 8px 12px;border-radius:999px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);font:600 13px/1 var(--body);color:#fff;font-variant-numeric:tabular-nums}
.now i{width:8px;height:8px;border-radius:50%;background:var(--on-navy-muted);flex:none}
.now.open i{background:#22c55e;box-shadow:0 0 0 0 rgba(34,197,94,.6)}
.now.shut i{background:var(--red-hi)}
.now span b{font-weight:700}
@media (prefers-reduced-motion:no-preference){.now.open i{animation:pulse 2s ease-out infinite}}
@keyframes pulse{70%{box-shadow:0 0 0 7px rgba(34,197,94,0)}100%{box-shadow:0 0 0 0 rgba(34,197,94,0)}}

/* Rows */
.list{list-style:none;margin:0;padding:10px 0 18px}
.row{border-bottom:1px solid var(--line)}
.row:last-child{border-bottom:0}
.go{display:grid;grid-template-columns:44px 1fr 22px;align-items:center;gap:14px;width:100%;padding-block:18px;background:none;border:0;color:inherit;text-decoration:none;text-align:left;font:inherit;cursor:pointer;position:relative;padding-inline:0;margin:0;-webkit-appearance:none;appearance:none}
.go::before{content:"";position:absolute;left:0;top:50%;width:3px;height:0;background:var(--red);transform:translateY(-50%);transition:height .2s}
.go:hover::before,.go:focus-visible::before,.row.open>.go::before{height:44px}
.go:focus-visible{outline:2px solid var(--red-hi);outline-offset:-2px}
.ic{width:44px;height:44px;border-radius:10px;background:var(--ground);display:grid;place-items:center;color:var(--navy);transition:background .2s,color .2s}
.go:hover .ic,.go:active .ic,.go:focus-visible .ic,.go.pressed .ic,.row.open .ic{background:var(--navy);color:#fff}
.go{-webkit-tap-highlight-color:transparent}
.go:active::before,.go.pressed::before{height:44px}
.ic svg{width:22px;height:22px}
.lb{min-width:0}
.lb b{display:block;font:700 18px/1.15 var(--display);font-stretch:108%;color:var(--ink)}
.lb span{display:block;margin-top:4px;font:500 13.5px/1.35 var(--body);color:var(--muted)}
.ar{width:22px;height:22px;color:var(--muted);transition:transform .25s,color .2s}
.go:hover .ar{color:var(--red);transform:translateX(3px)}
.row.open .ar{transform:rotate(90deg);color:var(--red)}

/* Services drawer */
.more{display:grid;grid-template-rows:0fr;transition:grid-template-rows .3s cubic-bezier(.2,.7,.2,1)}
.row.open .more{grid-template-rows:1fr}
.more>div{overflow:hidden}
.more ul{list-style:none;margin:0;padding:0 0 16px 58px;display:flex;flex-direction:column;gap:6px}
.more a{display:flex;justify-content:space-between;align-items:center;gap:10px;padding:13px 14px;border-radius:8px;background:var(--ground);color:var(--ink);text-decoration:none;font:600 15px/1.2 var(--body);min-height:46px}
.more a small{font:500 12.5px/1 var(--body);color:var(--muted);white-space:nowrap}
.more a:hover,.more a:focus-visible{background:var(--navy);color:#fff;outline:none}
.more a:hover small,.more a:focus-visible small{color:var(--on-navy-muted)}

/* Footer */
.foot{margin-top:auto;background:var(--navy);color:var(--on-navy);padding-block:26px calc(24px + env(safe-area-inset-bottom,0px))}
.icons{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:10px}
.icons a{display:flex;flex-direction:column;align-items:center;gap:8px;padding:14px 4px 12px;border-radius:10px;background:var(--navy-2);border:1px solid rgba(255,255,255,.08);color:#fff;text-decoration:none;font:600 10.5px/1 var(--body);letter-spacing:.14em;text-transform:uppercase;transition:background .2s,border-color .2s}
.icons a svg{width:24px;height:24px}
.icons a:hover,.icons a:focus-visible{background:var(--red);border-color:var(--red);outline:none}

.info{margin-top:22px;display:grid;gap:14px;font:500 14px/1.45 var(--body)}
.info div{display:grid;grid-template-columns:86px 1fr;gap:12px}
.info dt,.info .k{font:600 10px/1.9 var(--body);letter-spacing:.24em;text-transform:uppercase;color:var(--on-navy-muted)}
.info .v{color:#fff;font-variant-numeric:tabular-nums}
.info .v span{color:var(--on-navy-muted)}
.info .v a{color:#fff;text-decoration:none}
.info .v a:hover,.info .v a:focus-visible{color:var(--red-hi);outline:none}
a[href^="tel"]{color:inherit}
.copy{margin-top:22px;padding-top:16px;border-top:1px solid rgba(255,255,255,.08);font:500 11.5px/1 var(--body);color:var(--on-navy-muted);letter-spacing:.04em}

/* Logo draw + entrance, as on the live site */
@media (prefers-reduced-motion:no-preference){
  .brand svg .body{clip-path:inset(0 100% 0 0);animation:draw 1.1s cubic-bezier(.65,0,.25,1) .15s forwards}
  .brand svg .wh{transform-box:fill-box;transform-origin:center;opacity:0;animation:roll 1.1s cubic-bezier(.2,.7,.2,1) .25s forwards}
  .brand svg .wh2{animation-delay:.4s}
  .row{animation:rise .5s cubic-bezier(.2,.7,.2,1) both}
  .row:nth-child(2){animation-delay:.06s}.row:nth-child(3){animation-delay:.12s}.row:nth-child(4){animation-delay:.18s}
}
@keyframes draw{to{clip-path:inset(0 0 0 0)}}
@keyframes roll{from{opacity:0;transform:translateX(-60px) rotate(-300deg)}to{opacity:1;transform:none}}
@keyframes rise{from{transform:translateY(10px)}to{transform:none}}
</style>
<style>html,body{min-height:100%}.wrap{min-height:100vh;min-height:100dvh}.top{padding-top:max(30px,calc(env(safe-area-inset-top,0px) + 18px))}img{max-width:100%}</style>
</head>
<body>
<div class="wrap">
  <header class="top pad">
    <div class="brand" aria-label="Garage Daytona">
      <svg viewBox="17 11 533 147" aria-hidden="true" focusable="false"><g class="body"><path fill="#b84d5c" d="M171.4 132.2Q169.8 133.7 170.2 134.2Q170.5 134.8 171.6 134.8Q172.7 134.8 182.6 133.0Q192.5 131.2 208.2 129.0Q224.0 126.8 231.2 126.3Q238.5 125.8 249.9 125.6Q261.3 125.3 271.3 125.7Q281.3 126.0 292.4 126.8Q303.5 127.7 336.1 131.7Q368.7 135.7 373.7 136.1Q378.7 136.5 382.3 136.4Q386.0 136.3 385.3 135.9Q384.7 135.5 381.9 134.8Q379.2 134.2 353.2 129.6Q327.3 125.0 314.0 122.9Q300.7 120.8 288.8 119.6Q277.0 118.3 263.9 117.6Q250.8 116.8 237.8 117.1Q224.8 117.3 218.3 118.0Q211.8 118.7 204.5 119.9Q197.2 121.2 188.5 124.2Q179.8 127.2 176.4 129.0Q173.0 130.8 171.4 132.2ZM27.6 106.5Q25.8 106.3 27.2 107.6Q28.7 108.8 31.9 110.5Q35.2 112.2 42.2 115.0Q49.3 117.8 54.2 119.4Q59.0 121.0 66.2 122.8Q73.5 124.7 75.6 124.9Q77.7 125.2 78.2 124.8Q78.7 124.5 78.2 123.2Q77.8 122.0 75.5 119.6Q73.2 117.2 63.3 115.4Q53.5 113.7 47.9 112.2Q42.3 110.8 35.8 108.8Q29.3 106.7 27.6 106.5ZM159.6 74.2Q161.3 74.2 159.9 72.9Q158.5 71.7 156.7 70.8Q154.8 70.0 149.4 68.4Q144.0 66.8 139.0 66.1Q134.0 65.3 127.0 65.4Q120.0 65.5 114.4 66.5Q108.8 67.5 102.5 69.8Q96.2 72.0 92.6 74.0Q89.0 76.0 86.7 77.7Q84.3 79.3 82.9 80.7Q81.5 82.0 81.0 83.1Q80.5 84.2 82.1 83.8Q83.7 83.5 88.4 81.1Q93.2 78.7 97.7 76.9Q102.2 75.2 107.8 73.6Q113.5 72.0 116.8 71.4Q120.2 70.8 123.8 70.6Q127.3 70.3 132.0 70.4Q136.7 70.5 140.6 70.9Q144.5 71.3 151.2 72.8Q157.8 74.2 159.6 74.2ZM313.1 66.3Q305.3 67.2 312.6 67.8Q319.8 68.5 339.3 68.3Q358.8 68.2 379.0 67.6Q399.2 67.0 418.9 67.2Q438.7 67.3 448.6 68.2Q458.5 69.0 465.1 69.9Q471.7 70.8 479.3 72.3Q487.0 73.8 494.5 75.8Q502.0 77.8 509.0 80.2Q516.0 82.7 524.3 86.2Q532.7 89.8 533.3 90.4Q534.0 91.0 533.8 91.6Q533.5 92.2 532.9 92.3Q532.3 92.5 521.3 92.4Q510.3 92.3 509.4 92.8Q508.5 93.2 509.0 94.1Q509.5 95.0 514.4 98.4Q519.3 101.8 523.4 105.6Q527.5 109.3 528.7 110.9Q529.8 112.5 530.4 114.2Q531.0 115.8 530.7 117.2Q530.3 118.5 528.6 120.4Q526.8 122.3 522.6 125.1Q518.3 127.8 513.9 130.0Q509.5 132.2 508.9 132.7Q508.3 133.2 508.6 133.5Q508.8 133.8 511.7 133.4Q514.5 133.0 518.8 131.7Q523.0 130.3 526.8 128.8Q530.5 127.2 534.1 125.1Q537.7 123.0 539.0 121.8Q540.3 120.5 540.9 119.5Q541.5 118.5 541.4 116.6Q541.3 114.7 540.0 112.8Q538.7 111.0 535.8 108.7Q533.0 106.3 527.6 103.1Q522.2 99.8 521.7 99.2Q521.2 98.7 521.4 98.0Q521.7 97.3 523.8 96.8Q525.8 96.3 529.8 96.3Q533.7 96.3 538.8 97.0Q544.0 97.7 545.3 97.7Q546.7 97.7 547.1 97.4Q547.5 97.2 547.3 96.4Q547.2 95.7 546.5 95.0Q545.8 94.3 539.8 90.2Q533.8 86.2 529.3 83.7Q524.8 81.2 519.2 78.6Q513.7 76.0 506.8 73.5Q500.0 71.0 493.7 69.2Q487.3 67.5 474.2 65.2Q461.2 62.8 449.6 61.9Q438.0 61.0 424.9 61.0Q411.8 61.0 366.3 63.2Q320.8 65.5 313.1 66.3ZM35.8 68.2Q34.0 70.8 34.8 71.1Q35.5 71.3 40.9 69.2Q46.3 67.2 50.5 65.8Q54.7 64.5 55.6 64.0Q56.5 63.5 56.7 63.0Q56.8 62.5 55.8 62.0Q54.8 61.5 51.7 61.1Q48.5 60.7 42.2 59.0Q35.8 57.3 34.9 57.3Q34.0 57.3 34.0 58.2Q34.0 59.2 36.0 61.5Q38.0 63.8 37.8 64.8Q37.7 65.7 35.8 68.2ZM380.9 56.5Q382.0 56.0 381.9 55.6Q381.8 55.2 380.9 54.4Q380.0 53.7 371.2 48.9Q362.3 44.2 351.4 38.9Q340.5 33.7 332.2 30.2Q324.0 26.8 314.9 23.8Q305.8 20.7 299.1 19.0Q292.3 17.3 285.6 16.2Q278.8 15.0 273.0 14.4Q267.2 13.8 260.6 13.8Q254.0 13.7 245.8 14.0Q237.7 14.3 226.8 15.5Q215.8 16.7 202.3 18.8Q188.8 21.0 170.4 25.1Q152.0 29.2 126.0 36.1Q100.0 43.0 95.4 44.0Q90.8 45.0 84.9 45.8Q79.0 46.7 70.3 46.8Q61.7 47.0 56.0 46.5Q50.3 46.0 42.2 44.3Q34.0 42.7 27.6 40.5Q21.2 38.3 20.3 38.5Q19.5 38.7 19.8 39.6Q20.2 40.5 21.7 41.9Q23.2 43.3 28.2 46.2Q33.2 49.2 38.1 50.9Q43.0 52.7 49.1 53.7Q55.2 54.7 58.6 54.9Q62.0 55.2 71.2 54.9Q80.3 54.7 88.6 53.7Q96.8 52.7 116.6 49.4Q136.3 46.2 143.3 45.6Q150.3 45.0 157.2 45.0Q164.0 45.0 174.3 46.1Q184.7 47.2 198.2 49.8Q211.8 52.5 224.9 54.7Q238.0 56.8 245.8 57.5Q253.5 58.2 254.1 57.9Q254.7 57.7 252.7 57.0Q250.7 56.3 239.3 54.0Q228.0 51.7 217.6 48.6Q207.2 45.5 198.6 41.7Q190.0 37.8 188.1 36.6Q186.2 35.3 185.8 34.8Q185.3 34.3 185.3 33.8Q185.3 33.3 186.1 32.8Q186.8 32.2 193.2 30.2Q199.7 28.3 210.2 26.1Q220.7 23.8 231.3 22.4Q242.0 21.0 253.6 20.7Q265.2 20.3 271.1 20.8Q277.0 21.3 282.9 22.3Q288.8 23.3 298.8 26.2Q308.7 29.0 315.4 31.7Q322.2 34.3 327.3 36.8Q332.5 39.2 338.2 42.2Q344.0 45.3 348.9 48.4Q353.8 51.5 354.5 52.2Q355.2 53.0 354.5 53.8Q353.8 54.5 347.7 55.7Q341.5 56.8 340.2 57.2Q338.8 57.7 339.0 57.9Q339.2 58.2 343.5 58.4Q347.8 58.7 363.8 57.8Q379.8 57.0 380.9 56.5Z"/><path fill="#ffffff" d="M454.0 76.6Q454.8 76.3 453.1 75.8Q451.3 75.3 445.1 74.7Q438.8 74.0 425.0 73.8Q411.2 73.7 402.8 74.1Q394.3 74.5 380.7 75.8Q367.0 77.2 350.2 79.7Q333.5 82.2 285.6 91.1Q237.7 100.0 225.5 101.8Q213.3 103.5 203.2 104.4Q193.2 105.3 191.4 105.7Q189.7 106.0 189.0 106.4Q188.3 106.8 190.2 107.3Q192.0 107.8 197.2 108.3Q202.3 108.8 213.1 109.0Q223.8 109.2 231.0 108.8Q238.2 108.5 248.7 107.5Q259.2 106.5 271.7 104.7Q284.2 102.8 324.3 95.0Q364.5 87.2 380.5 84.4Q396.5 81.7 407.5 80.2Q418.5 78.8 426.5 78.2Q434.5 77.5 443.8 77.2Q453.2 76.8 454.0 76.6Z"/></g><g class="wh"><circle stroke="#ffffff" cx="126.7" cy="115.6" r="32.1" fill="none" stroke-width="11.2"/><g stroke="#b84d5c" fill="none" stroke-width="3" stroke-linecap="round"><circle cx="126.7" cy="115.6" r="6.2"/><path d="M126.7 106.1v3M126.7 122.1v3M117.2 115.6h3M133.2 115.6h3"/></g><circle fill="#b84d5c" cx="126.7" cy="115.6" r="2"/></g><g class="wh wh2"><circle stroke="#ffffff" cx="450.2" cy="116.6" r="30.6" fill="none" stroke-width="10.6"/><g stroke="#b84d5c" fill="none" stroke-width="3" stroke-linecap="round"><circle cx="450.2" cy="116.6" r="6.2"/><path d="M450.2 107.1v3M450.2 123.1v3M440.7 116.6h3M456.7 116.6h3"/></g><circle fill="#b84d5c" cx="450.2" cy="116.6" r="2"/></g></svg>
      <div class="t"><b>DAYTONA</b><small>Sedra SA · Genève</small></div>
    </div>
    <h1 class="ask">Que cherchez-vous <em>?</em></h1>
    <p class="sub">Choisissez, on vous y emmène directement.</p>
    <p class="now" id="now" aria-live="polite"><i></i><span id="nowTxt">Lun – Ven · 07:30 – 17:00</span></p>
  </header>

  <main class="pad">
    <ul class="list">
      <li class="row">
        <a class="go" href="https://garagedaytona.ch/">
          <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9S14.5 18.4 12 21c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3z"/></svg></span>
          <span class="lb"><b>Site web</b><span>Tout sur le garage, depuis 28 ans</span></span>
          <svg class="ar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
        </a>
      </li>
      <li class="row">
        <a class="go" href="https://garagedaytona.ch/pneus-occasion/">
          <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1"/></svg></span>
          <span class="lb"><b>Pneus d'occasion</b><span>Jeux contrôlés, photos réelles, prix fixe</span></span>
          <svg class="ar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
        </a>
      </li>
      <li class="row" id="svc">
        <button class="go" type="button" id="svcBtn" aria-expanded="false" aria-controls="svcList">
          <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a4 4 0 0 0-5.4 5.2L3.5 17.3a1.8 1.8 0 0 0 2.5 2.5l5.8-5.8a4 4 0 0 0 5.2-5.4l-2.6 2.6-2.3-.6-.6-2.3z"/></svg></span>
          <span class="lb"><b>Nos services</b><span>Mécanique, carrosserie, OCV, nettoyage</span></span>
          <svg class="ar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
        </button>
        <div class="more" id="svcList"><div>
          <ul>
            <li><a href="https://garagedaytona.ch/mecanique/">Mécanique <small>Diagnostic dès 100 CHF</small></a></li>
            <li><a href="https://garagedaytona.ch/carrosserie/">Carrosserie <small>Diagnostic gratuit</small></a></li>
            <li><a href="https://garagedaytona.ch/controle-technique-ocv/">Contrôle technique OCV <small>Préparation 300 CHF</small></a></li>
            <li><a href="https://garagedaytona.ch/nettoyage-detaille/">Nettoyage détaillé <small>Dès 150 CHF</small></a></li>
          </ul>
        </div></div>
      </li>
      <li class="row">
        <a class="go" href="https://garagedaytona.ch/vente-de-voitures/">
          <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 15.5V13l2-5h14l2 5v2.5"/><path d="M3 13h18v4H3z"/><circle cx="7" cy="17.5" r="1.8"/><circle cx="17" cy="17.5" r="1.8"/></svg></span>
          <span class="lb"><b>Vente de voitures</b><span>Occasions, reprise et leasing</span></span>
          <svg class="ar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
        </a>
      </li>
    </ul>
  </main>

  <footer class="foot pad">
    <nav class="icons" aria-label="Nous joindre">
      <a href="tel:+41227329837" aria-label="Appeler le garage"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/></svg>Appeler</a>
      <a class="wa" href="https://wa.me/41799198647" aria-label="WhatsApp"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.3 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.4-.7-2.9-1.1-4.7-4.1-4.8-4.3-.1-.2-1.2-1.6-1.2-3s.8-2.2 1-2.5c.3-.3.6-.4.8-.4h.6c.2 0 .5 0 .7.6l.9 2.2c.1.2.1.4 0 .6l-.4.6-.5.5c-.2.2-.3.4-.1.7.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.4 2.4 1.5.3.2.5.1.7-.1l.9-1.1c.2-.3.5-.2.7-.1l2.1 1c.3.2.5.2.6.4.1.1.1.7-.1 1.3Z"/></svg>WhatsApp</a>
      <a href="https://www.google.com/maps/search/?api=1&amp;query=Rue+de+Lausanne+64+1202+Gen%C3%A8ve" aria-label="Itinéraire"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg>Plan</a>
      <a href="mailto:garage-daytona@bluewin.ch" aria-label="Écrire un e-mail"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3.5 6.5 12 13l8.5-6.5"/></svg>E-mail</a>
    </nav>
    <div class="info">
      <div><span class="k">Adresse</span><span class="v">Rue de Lausanne 64-66<br>1202 Genève</span></div>
      <div><span class="k">Horaires</span><span class="v">Lun – Ven · 07:30 – 17:00<br><span>Sam – Dim · sur rendez-vous</span></span></div>
      <div><span class="k">Téléphone</span><span class="v"><a href="tel:+41227329837">022 732 98 37</a></span></div>
      <div><span class="k">Mobile</span><span class="v"><a href="tel:+41795618647">079 561 86 47</a></span></div>
    </div>
    <div class="copy">Garage Daytona · Sedra SA</div>
  </footer>
</div>

<script>
(function(){
  document.querySelectorAll('.go').forEach(function(g){
    g.addEventListener('pointerdown',function(){g.classList.add('pressed');});
    ['pointerup','pointercancel','pointerleave'].forEach(function(e){g.addEventListener(e,function(){setTimeout(function(){g.classList.remove('pressed');},250);});});
  });
  (function(){
    var el=document.getElementById('now'),tx=document.getElementById('nowTxt');
    function tick(){
      var p={};
      try{new Intl.DateTimeFormat('en-GB',{timeZone:'Europe/Zurich',weekday:'short',hour:'2-digit',minute:'2-digit',hourCycle:'h23'}).formatToParts(new Date()).forEach(function(x){p[x.type]=x.value;});}catch(e){return;}
      var d=['Mon','Tue','Wed','Thu','Fri','Sat','Sun'].indexOf(p.weekday),m=(+p.hour)*60+(+p.minute),o=450,c=1020,s,cls;
      if(d<0)return;
      if(d>4){s='Week-end · <b>sur rendez-vous</b>';cls='';}
      else if(m>=o&&m<c){s='<b>Ouvert</b> · ferme à 17:00';cls='open';}
      else if(m<o){s='<b>Fermé</b> · ouvre à 07:30';cls='shut';}
      else{s='<b>Fermé</b> · ouvre '+(d===4?'lundi':'demain')+' à 07:30';cls='shut';}
      tx.innerHTML=s;el.className='now '+cls;
    }
    tick();setInterval(tick,30000);
  })();
  var row=document.getElementById('svc'),btn=document.getElementById('svcBtn');
  btn.addEventListener('click',function(){
    var open=row.classList.toggle('open');
    btn.setAttribute('aria-expanded',open?'true':'false');
  });
})();
</script>
</body>
</html>
GDQR;
	exit;
}, 0);

/* Keep /qr/ out of Yoast sitemaps and canonical guesses */
add_filter('redirect_canonical', function ($r) {
	$p = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
	return $p === 'qr' ? false : $r;
});
