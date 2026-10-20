() => {
  // prices saved in the control panel (/gestion/) replace the built-in ones
  const GPX = (window.GD_PRICES && window.GD_PRICES.items) || null;
  const PXv = (id, fb) => { const x = GPX && GPX.find(y => y.id === id); return x ? String(x.p).replace('.', ',') + ' CHF' : fb; };
  const PX = (id, fb) => { const x = GPX && GPX.find(y => y.id === id); if (!x) return fb; const u = (x.u || '').replace(/^par /, ''); return (x.d ? 'dès ' : '') + String(x.p).replace('.', ',') + ' CHF' + (u ? ' / ' + u : ''); };
  const VOY_HTML = `<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <symbol id="i-eng" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.3 5.3l2.1 2.1M16.6 16.6l2.1 2.1M5.3 18.7l2.1-2.1M16.6 7.4l2.1-2.1"/></g></symbol>
    <symbol id="i-brk" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.3 5.3l2.1 2.1M16.6 16.6l2.1 2.1M5.3 18.7l2.1-2.1M16.6 7.4l2.1-2.1"/></g></symbol>
    <symbol id="i-tpm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/><path d="M12 3v2M12 19v2M3 12h2M19 12h2M5.6 5.6l1.4 1.4M17 17l1.4 1.4M5.6 18.4L7 17M17 7l1.4-1.4"/></g></symbol>
    <symbol id="i-body" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15l2-5.5A2 2 0 017 8h10a2 2 0 011.9 1.5L21 15v3H3z"/><circle cx="7.5" cy="18" r="1.8"/><circle cx="16.5" cy="18" r="1.8"/><path d="M14 4l2 2.5M17.5 3l-.5 3"/></g></symbol>
    <symbol id="i-seat" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M11 3l1.9 4.8L17.5 9.5l-4.6 1.7L11 16l-1.9-4.8L4.5 9.5l4.6-1.7z"/><path d="M18 14l.8 2 2 .8-2 .8-.8 2-.8-2-2-.8 2-.8z"/></g></symbol>
    <symbol id="i-ocv" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3.5" width="14" height="18" rx="2"/><path d="M9 3.5h6v3H9zM8.5 12.5l2 2 4-4.5M8.5 18h7"/></g></symbol>
    <symbol id="i-oil" viewBox="0 0 32 32"><path fill="currentColor" d="M4 12h5l2-2h6l2 2 9-3-6 9H9l-2-3H4zM27 18c0 1.5-1 2.5-2 2.5S23 19.5 23 18s2-4 2-4 2 2.5 2 4z"/></symbol>
    <symbol id="i-bat" viewBox="0 0 32 32"><g fill="none" stroke="currentColor" stroke-width="2.3" stroke-linejoin="round"><rect x="4" y="10" width="24" height="15" rx="1.5"/><path d="M8 10V7h4v3M20 10V7h4v3M8 17h5M19 17h5M21.5 14.5v5"/></g></symbol>
    <symbol id="i-abs" viewBox="0 0 32 32"><g fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="16" cy="16" r="9.5"/><path d="M5 8a14 14 0 0 0 0 16M27 8a14 14 0 0 1 0 16"/></g><text x="16" y="19.5" text-anchor="middle" font-family="Arial,sans-serif" font-weight="700" font-size="8.5" fill="currentColor">ABS</text></symbol>
    <symbol id="i-key" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="15" r="4.5"/><path d="M11.2 11.8L20 3M16.5 6.5l2.5 2.5M14 9l2 2"/></g></symbol>
    <radialGradient id="gface" cx="50%" cy="45%" r="60%"><stop offset="0" stop-color="#18213a"/><stop offset="1" stop-color="#0a0f1c"/></radialGradient>
  </defs>
</svg>
  <div class="amb" aria-hidden="true"></div>
  <div class="wrap">
    <div class="vy-hd">
      <p class="eyebrow">Nos services</p>
      <h2>Qu’est-ce qui ne va pas avec votre voiture ?</h2>
      <p>Démarrez la voiture et dites à l’écran ce qui ne va pas. Il vous indique quoi faire, quel service et quel prix, puis vous écrivez au garage en un geste.</p>
    </div>
    <div class="ask">
      <h3>Demandez à notre assistant intelligent</h3>
      <span class="arw" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v15M6 13l6 6 6-6"/></svg></span>
    </div>

    <div class="cl off" id="cl">
      <button class="start" id="start" type="button" aria-label="Démarrer"><span>ENGINE<b>START</b>STOP</span></button>
      <div class="cl-row">
        <svg class="gauge g1" id="tach" viewBox="0 0 300 300" aria-hidden="true"></svg>
        <div class="lcd" id="scr" aria-live="polite">
          <div class="lcd-top"><span id="ttl">DAYTONA</span><span id="clock">--:--</span></div>
          <div class="view" id="view"></div>
          <nav class="dock" aria-label="Écran">
            <button type="button" id="dHome"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M4 11l8-7 8 7v9h-5v-6H9v6H4z"/></svg>Accueil</button>
            <a id="dMap" target="_blank" rel="noopener" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg>Itinéraire</a>
            <a id="dWa" target="_blank" rel="noopener" href="https://wa.me/41799198647"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M4 20l1.3-3.9A8 8 0 1 1 8 19z"/></svg>WhatsApp</a>
          </nav>
        </div>
        <svg class="gauge g2" id="speedo" viewBox="0 0 300 300" aria-hidden="true"></svg>
      </div>
      <div class="tt" id="tt" aria-hidden="true"></div>
    </div>

    <p class="hint" style="margin-top:28px">Les prix affichés sont ceux du garage. Le diagnostic final se fait à l’atelier.</p>
  </div>
`;
  const host = document.getElementById('nos-services'); if (!host) return;
  host.innerHTML = VOY_HTML;
  const WA = '41799198647';
  const MAP = 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent('Garage Daytona, Rue de Lausanne 64-66, Genève');
  // symptom → service (texts and prices from the garage's own pages)
  const S = [
    {k: 'eng', c: '--amber', t: 'Voyant moteur', d: 'allumé ou clignotant', svc: 'Mécanique', pg: '/mecanique/', price: 'Diagnostic ' + PX('diag', '100 CHF'), a: 'Lecture des codes défaut, diagnostic complet, devis avant réparation.',
      msg: 'Bonjour, le voyant moteur de ma voiture est allumé. Quand puis-je passer pour un diagnostic ?'},
    {k: 'brk', c: '--red', t: 'Bruit au freinage', d: 'grincement, vibration', svc: 'Mécanique', pg: '/mecanique/', price: 'Diagnostic ' + PX('diag', '100 CHF'), a: 'Contrôle des plaquettes, des disques et du liquide de frein.',
      msg: 'Bonjour, j’entends un bruit sur ma voiture. Pouvez-vous la contrôler ?'},
    {k: 'tpm', c: '--amber', t: 'Pneus', d: 'usés ou pression basse', svc: 'Pneus d’occasion', pg: '/pneus-occasion/', price: 'Voir le stock', a: 'Pneus neufs et d’occasion en stock, toutes tailles.',
      msg: 'Bonjour, j’ai besoin de pneus pour ma voiture. Avez-vous ma taille en stock ?'},
    {k: 'body', c: '--pink', t: 'Rayure ou choc', d: 'carrosserie abîmée', svc: 'Carrosserie', pg: '/carrosserie/', price: 'Diagnostic gratuit', a: 'Réparation et peinture, prise en charge avec votre assurance.',
      msg: 'Bonjour, ma voiture a un dégât sur la carrosserie. Puis-je venir pour un diagnostic ?'},
    {k: 'seat', c: '--blue', t: 'Intérieur sale', d: 'taches, odeurs', svc: 'Nettoyage détaillé', pg: '/nettoyage-detaille/', price: 'Dès ' + PXv('net_in', '150 CHF'), a: 'Un intérieur impeccable, frais et parfumé.',
      msg: 'Bonjour, je souhaite un nettoyage détaillé de l’intérieur de ma voiture. Quelles sont vos disponibilités ?'},
    {k: 'ocv', c: '--green', t: 'Contrôle OCV', d: 'convocation reçue', svc: 'Contrôle technique', pg: '/controle-technique-ocv/', price: 'Préparation ' + PXv('ocv_prep', '300 CHF'), a: 'Préparation complète et transport au centre de contrôle.',
      msg: 'Bonjour, j’ai reçu ma convocation au contrôle technique. Pouvez-vous préparer ma voiture ?'}
  ];
  // one follow-up question per symptom: the answer sets urgency (0 faible · 1 moyenne · 2 élevée) and completes the WhatsApp text
  const F = [
    {q: 'Le voyant est-il fixe ou clignotant ?', o: [
      {l: 'Fixe', u: 1, t: 'Prenez rendez-vous rapidement pour un diagnostic.', m: 'Le voyant est fixe.'},
      {l: 'Clignotant', u: 2, t: 'Limitez vos trajets et contactez-nous au plus vite.', m: 'Le voyant clignote.'}]},
    {q: 'Quand entendez-vous le bruit ?', o: [
      {l: 'En freinant', u: 2, t: 'Les freins touchent à votre sécurité : passez dès que possible.', m: 'Le bruit apparaît au freinage.'},
      {l: 'En roulant', u: 1, t: 'Un contrôle à l’atelier permettra d’en trouver l’origine.', m: 'Le bruit apparaît en roulant.'}]},
    {q: 'Que vous faut-il ?', o: [
      {l: 'Des pneus', u: 0, t: 'Envoyez-nous la taille inscrite sur le flanc du pneu.', m: ''},
      {l: 'Voyant de pression', u: 1, t: 'Passez au garage pour un contrôle des pneus.', m: 'Le voyant de pression des pneus est allumé.'}]},
    {q: 'Quelle est l’importance du dégât ?', o: [
      {l: 'Rayure légère', u: 0, t: 'Nous vous montrons sur place ce qui peut être fait.', m: 'Il s’agit d’une rayure légère.'},
      {l: 'Choc important', u: 1, t: 'Nous vous accompagnons dans les démarches avec votre assurance.', m: 'Il s’agit d’un choc important.'}]},
    {q: 'Que souhaitez-vous ?', o: [
      {l: 'Taches, odeurs', u: 0, t: 'Votre intérieur retrouve un aspect net et frais.', m: 'L’intérieur a des taches ou des odeurs.'},
      {l: 'Avant une vente', u: 0, t: 'Une voiture propre se présente mieux à l’acheteur.', m: 'C’est avant la vente de la voiture.'}]},
    {q: 'Quand a lieu votre contrôle ?', o: [
      {l: 'Dans plus d’un mois', u: 0, t: 'Nous préparons votre voiture à l’avance, sans stress.', m: 'Le contrôle a lieu dans plus d’un mois.'},
      {l: 'Dans moins d’un mois', u: 1, t: 'Contactez-nous vite pour réserver la préparation.', m: 'Le contrôle a lieu dans moins d’un mois.'}]}
  ];
  const UR = [.17, .5, .83], URT = ['Faible', 'Moyenne', 'Élevée'], URC = ['--green', '--amber', '--red'];

  const $ = id => document.getElementById(id);
  const NS = 'http://www.w3.org/2000/svg';
  const el = (tag, at, parent) => { const e = document.createElementNS(NS, tag); for (const k in at) e.setAttribute(k, at[k]); parent && parent.appendChild(e); return e; };
  const pt = (a, r) => [150 + r * Math.cos(a * Math.PI / 180), 150 + r * Math.sin(a * Math.PI / 180)];
  const A0 = 135, SW = 270;
  const css = v => getComputedStyle(host).getPropertyValue(v).trim();
  const g = window.gsap, reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const icon = (k, cls = '') => `<svg class="${cls}"><use href="#i-${k}"/></svg>`;

  // ---------- dials ----------
  function dial(svg, max, major, minor, redFrom, unit, labelFn) {
    el('circle', {cx: 150, cy: 150, r: 146, class: 'face'}, svg);
    el('circle', {cx: 150, cy: 150, r: 146, class: 'rim'}, svg);
    el('circle', {cx: 150, cy: 150, r: 138, class: 'glow'}, svg);
    if (redFrom != null) { const [x1, y1] = pt(A0 + SW * redFrom / max, 126), [x2, y2] = pt(A0 + SW, 126); el('path', {d: `M${x1} ${y1}A126 126 0 0 1 ${x2} ${y2}`, class: 'redarc'}, svg); }
    for (let v = 0; v <= max + 1e-6; v += minor) {
      const maj = Math.abs(v / major - Math.round(v / major)) < 1e-6, a = A0 + SW * v / max, red = redFrom != null && v >= redFrom;
      const [x1, y1] = pt(a, maj ? 112 : 118), [x2, y2] = pt(a, 130);
      el('line', {x1, y1, x2, y2, class: 'tk' + (maj ? '' : ' s') + (red ? ' r' : '')}, svg);
      if (maj) { const [tx, ty] = pt(a, 92); el('text', {x: tx, y: ty, class: 'num' + (red ? ' r' : '')}, svg).textContent = labelFn(v); }
    }
    el('text', {x: 150, y: 196, class: 'unit'}, svg).textContent = unit;
    const n = el('g', {}, svg);
    el('path', {d: 'M146 150 L148.5 34 L151.5 34 L154 150 Z', class: 'ndl'}, n);
    el('circle', {cx: 150, cy: 150, r: 15, class: 'hub'}, svg);
    return n;
  }
  const tachN = dial($('tach'), 8, 1, .5, 6.5, 'TR/MIN ×1000', v => v);
  const spdN = dial($('speedo'), 260, 20, 10, null, 'KM/H', v => v % 40 === 0 ? v : '');
  const angle = f => -135 + 270 * f;
  const N = {t: 0, s: 0};
  const draw = () => { tachN.setAttribute('transform', `rotate(${angle(N.t)} 150 150)`); spdN.setAttribute('transform', `rotate(${angle(N.s)} 150 150)`); };
  draw();
  // urgency face over the speedometer
  const urg = el('g', {opacity: 0}, null); $('speedo').insertBefore(urg, spdN);
  el('circle', {cx: 150, cy: 150, r: 141, fill: 'url(#gface)'}, urg);
  [0, 1, 2].forEach(i => { const [x1, y1] = pt(A0 + SW * i / 3 + 2, 120), [x2, y2] = pt(A0 + SW * (i + 1) / 3 - 2, 120); el('path', {d: `M${x1} ${y1}A120 120 0 0 1 ${x2} ${y2}`, fill: 'none', stroke: css(URC[i]), 'stroke-width': 12, 'stroke-linecap': 'round', opacity: .85}, urg); });
  URT.forEach((w, i) => { const [x, y] = pt(A0 + SW * (i + .5) / 3, 88); el('text', {x, y, class: 'num', style: 'font-size:12px;letter-spacing:.12em'}, urg).textContent = w.toUpperCase(); });
  el('text', {x: 150, y: 196, class: 'unit'}, urg).textContent = 'URGENCE';
  const showUrg = on => g ? g.to(urg, {attr: {opacity: on ? 1 : 0}, duration: .5}) : urg.setAttribute('opacity', on ? 1 : 0);

  // tell-tales
  const TT = [...S.map(s => ({k: s.k, c: s.c})), {k: 'oil', c: '--red'}, {k: 'bat', c: '--red'}, {k: 'abs', c: '--amber'}];
  $('tt').innerHTML = TT.map(o => `<svg data-k="${o.k}" style="--c:var(${o.c})"><use href="#i-${o.k}"/></svg>`).join('');
  const lights = [...$('tt').children];

  // clock
  // garage clock: always Geneva time, whatever the visitor's time zone
  const tick = () => { try { $('clock').textContent = new Intl.DateTimeFormat('fr-CH', {hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Europe/Zurich'}).format(new Date()); } catch (e) { const d = new Date(); $('clock').textContent = String(d.getHours()).padStart(2, '0') + ':' + String(d.getMinutes()).padStart(2, '0'); } };
  tick(); setInterval(tick, 30000);

  // ---------- smart screen ----------
  const view = $('view'), vy = host, cl = $('cl');
  $('dMap').href = MAP;
  let run = 0, typing = [];
  const killTyping = () => { typing.forEach(t => t.kill()); typing = []; };
  const type = (node, text, delay = 0) => new Promise(res => {
    if (!node) return res();
    if (!g || reduce) { node.textContent = text; return res(); }
    const o = {i: 0};
    typing.push(g.to(o, {i: text.length, duration: Math.max(.2, text.length * .018), delay, ease: 'none', onUpdate: () => { node.textContent = text.slice(0, Math.round(o.i)); }, onComplete: res}));
  });
  function go(html, dir = 1) {
    killTyping(); run++;
    view.innerHTML = html;
    if (g && !reduce) g.fromTo(view, {opacity: 0, x: 28 * dir}, {opacity: 1, x: 0, duration: .38, ease: 'power3.out'});
    return run;
  }
  const back = `<button type="button" class="bk" id="bk" aria-label="Retour"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button>`;
  const setAmb = c => host.style.setProperty('--a', c ? css('--wine') : 'rgba(0,0,0,0)'); // one accent colour for the whole section
  const blip = () => { if (g && !reduce) g.timeline().to(N, {t: .62, duration: .35, ease: 'power2.out', onUpdate: draw}).to(N, {t: .11, duration: .9, ease: 'power2.inOut', onUpdate: draw}); };

  // ---------- knowledge base: everything the garage's own pages say (FR answers, FR/EN/DE keywords) ----------
  const CAT = {
    mec: {n: 'Mécanique', k: 'eng', pg: '/mecanique/'},
    pne: {n: 'Pneus', k: 'tpm', pg: '/pneus-occasion/'},
    car: {n: 'Carrosserie', k: 'body', pg: '/carrosserie/'},
    ocv: {n: 'Contrôle technique', k: 'ocv', pg: '/controle-technique-ocv/'},
    net: {n: 'Nettoyage', k: 'seat', pg: '/nettoyage-detaille/'},
    ven: {n: 'Vente de voitures', k: 'key', pg: '/vente-de-voitures/'},
    inf: {n: 'Infos pratiques', k: 'ocv', pg: '/contact/'}
  };
  const KB = [
    {c: 'mec', t: 'Voyant moteur allumé', diag: 0, kw: 'voyant moteur|check engine|engine light|motorkontrolle|motorleuchte|voyant'},
    {c: 'mec', t: 'Bruit au freinage', diag: 1, kw: 'frein|freinage|plaquette|disque|brake|bremse|grince|grincement|vibration'},
    {c: 'mec', t: 'Diagnostic électronique et mécanique', p: [['Diagnostic', PX('diag', '100 CHF')]], a: 'Lecture des codes défaut et contrôle mécanique de votre véhicule. Un prix clair vous est donné avant chaque intervention.', kw: 'diagnostic|diag|panne|probleme|bruit|valise|code defaut|electronique|diagnose|fehler|problem|noise'},
    {c: 'mec', t: 'Géométrie', p: [['Géométrie', PX('geo', '220 CHF')]], a: 'Réglage de la géométrie de votre voiture, utile si elle tire d’un côté ou si les pneus s’usent de façon irrégulière.', kw: 'geometrie|parallelisme|alignement|tire a gauche|tire a droite|volant|alignment|achsvermessung|spur'},
    {c: 'mec', t: 'Main-d’œuvre', p: [['Main-d’œuvre', PX('mo', '120 CHF / heure')]], a: 'Tarif horaire de l’atelier pour les réparations.', kw: 'main d oeuvre|main doeuvre|tarif horaire|par heure|reparation|repair|labour|labor|stundensatz|reparatur|prix reparation'},
    {c: 'mec', t: 'Niveaux, huile et lave-glace', p: [['Contrôle complet des niveaux', PX('niv', '60 CHF')], ['Huile moteur (1 L)', PX('huile', '24,90 CHF')], ['Lave-glace (1 L)', PX('lave', '7,90 CHF')]], a: 'Nous contrôlons et complétons tous les niveaux de votre voiture. Pour un entretien complet, écrivez-nous pour un prix adapté à votre véhicule.', kw: 'niveau|niveaux|huile|vidange|entretien|oil|oel|liquide|lave glace|wischwasser|scheibenwaschanlage|wartung|maintenance'},
    {c: 'mec', t: 'Batterie', p: [['Recharge de batterie', PX('batch', '30 CHF')], ['Batterie de démarrage', PX('bat', 'dès 200 CHF')]], a: 'Recharge ou remplacement de la batterie. Le prix d’une batterie neuve dépend du type de voiture.', kw: 'batterie|battery|demarre pas|ne demarre|plat|a plat|starthilfe|springt nicht an|accu'},
    {c: 'mec', t: 'Déplacement et dépannage', p: [['Déplacement / dépannage', PX('dep', '50 CHF')]], a: 'Votre voiture ne roule plus ? Nous nous déplaçons jusqu’à vous.', kw: 'depannage|panne|en panne|bloque|route|deplacement|breakdown|tow|stuck|pannenhilfe|abschlepp|panne route'},
    {c: 'mec', t: 'Ampoules et éclairage', p: [['Ampoule H7', PX('h7', '22,90 CHF')]], a: 'Remplacement des ampoules et contrôle de l’éclairage.', kw: 'ampoule|phare|feu|lumiere|eclairage|bulb|headlight|light|birne|lampe|scheinwerfer'},
    {c: 'mec', t: 'Pièces sur demande', a: 'Nous fournissons tout type de pièce sur demande. Écrivez-nous la pièce et le modèle de votre voiture.', kw: 'piece|pieces|piece detachee|part|parts|ersatzteil|teil'},
    {c: 'pne', t: 'Pneus d’occasion en stock', a: 'Jeux complets de pneus de marque, été et hiver, avec ou sans jantes, contrôlés par nos mécaniciens. Prix fixe par jeu. Cherchez votre taille sur la page, réservez en ligne ou sur WhatsApp et payez au garage.', pgl: true, kw: 'pneu|pneus|occasion|stock|hiver|ete|jantes|taille|tire|tyre|winter|summer|reifen|sommerreifen|winterreifen|felgen'},
    {c: 'pne', t: 'Changement et montage', p: [['Changement de pneus', PX('pneus', '120 CHF')], ['Montage et équilibrage', PX('equil', '30 CHF / pneu')], ['Changement de roue complet', PX('roue', '60 CHF')], ['Montage de roue complet', PX('monte', '60 CHF')]], a: 'Changement de pneus, montage et équilibrage à l’atelier.', kw: 'montage|monter|equilibrage|changement|changer|roue|roues|swap|change tires|mounting|balancing|reifenwechsel|wechsel|montieren|wuchten'},
    {c: 'pne', t: 'Gardiennage des pneus', p: [['Gardiennage', PX('gard', '60 CHF')]], a: 'Nous gardons votre jeu de pneus été ou hiver en sécurité jusqu’au prochain changement.', kw: 'gardiennage|garder mes pneus|store my|store tires|tire storage|stocker mes pneus|garder|stockage|stocker|hotel|entreposer|storage|store|einlagerung|lagern|aufbewahren'},
    {c: 'pne', t: 'Usure des pneus', a: 'En Suisse, la profondeur minimale légale est de 1,6 mm. Le TCS recommande au moins 4 mm pour les pneus d’hiver.', kw: 'usure|use|profondeur|profil|sculpture|legal|mm|tread|depth|profiltiefe|abgefahren'},
    {c: 'car', t: 'Carrosserie et peinture', p: [['Diagnostic', 'gratuit']], a: 'Réparation de la carrosserie de tous types de véhicules, endommagés ou accidentés, et peinture automobile en cabine.', kw: 'carrosserie|rayure|choc|bosse|accident|peinture|pare choc|scratch|dent|paint|body|bodywork|kratzer|delle|unfall|lack|karosserie|beule'},
    {c: 'car', t: 'Prise en charge de l’assurance', a: 'Votre véhicule est assuré ? Confiez-le-nous : nous prenons en charge l’ensemble des démarches avec votre compagnie d’assurance.', kw: 'assurance|assure|sinistre|constat|insurance|claim|versicherung|schaden'},
    {c: 'car', t: 'Voiture de remplacement', a: 'Si votre véhicule reste longtemps en réparation, nous mettons une voiture de remplacement à votre disposition.', kw: 'remplacement|voiture de remplacement|pret|courtoisie|replacement|loaner|courtesy|ersatzwagen|ersatzauto'},
    {c: 'ocv', t: 'Préparation au contrôle technique', p: [['Préparation complète', PX('ocv_prep', '300 CHF')]], a: 'Inspection mécanique et visuelle : fluides, freins, pneus, éclairage et sécurité générale, avant la visite. Un contrôle est recommandé tous les 3 ans.', kw: 'controle technique|controle|ocv|expertise|convocation|visite|mfk|inspection|vorfuhrung|vorfuehrung|pruefung|prufung|technical inspection'},
    {c: 'ocv', t: 'Transport au centre de contrôle', p: [['Transport aller-retour', PX('ocv_move', '100 CHF')]], a: 'Nous emmenons votre véhicule au centre de contrôle et vous le ramenons.', kw: 'transport|aller retour|emmener|centre de controle|chercher|abholen|pick up|pickup'},
    {c: 'net', t: 'Nettoyage détaillé', p: [['Nettoyage intérieur détaillé', PX('net_in', 'dès 150 CHF')], ['Nettoyage détaillé et lavage complet', PX('net_full', '210 CHF')]], a: 'Sièges et tapis, tableau de bord, vitres et plafonnier : un intérieur impeccable, frais et parfumé.', kw: 'nettoyage|nettoyer|propre|sale|tache|taches|odeur|interieur|siege|tapis|cleaning|clean|detailing|dirty|reinigung|innenreinigung|sauber|schmutzig'},
    {c: 'net', t: 'Lavage', p: [['Nettoyage / lavage', PX('lavage', '50 CHF')]], a: 'Lavage de votre voiture à l’atelier. Le nettoyage est offert avec tout service réalisé au garage.', kw: 'lavage|laver|wash|waschen|offert|gratuit nettoyage'},
    {c: 'ven', t: 'Voitures d’occasion', a: 'Voitures d’occasion certifiées, stock régulièrement mis à jour. Consultez les voitures disponibles sur la page.', pgl: true, kw: 'acheter|achat|acheter une voiture|voitures d occasion|vente|vendez|buy|buy a car|used car|cars for sale|kaufen|gebrauchtwagen|stock voitures'},
    {c: 'ven', t: 'Essai sur place', a: 'Venez essayer la voiture qui vous intéresse au garage, du lundi au vendredi de 07:30 à 17:00.', kw: 'essai|essayer|test|test drive|probefahrt|rouler'},
    {c: 'ven', t: 'Reprise et échange', a: 'Nous reprenons votre voiture selon son état, sa marque et son kilométrage, ou l’échangeons contre un véhicule de notre stock. Estimation gratuite au garage.', kw: 'reprise|echange|vendre ma voiture|estimation|trade in|sell my car|inzahlung|verkaufen|tausch'},
    {c: 'ven', t: 'Leasing', a: 'Le paiement en plusieurs fois est possible pour l’achat d’un véhicule, par leasing avec Cembra Money Bank. Il ne s’applique pas aux services mécaniques.', kw: 'leasing|credit|financement|plusieurs fois|mensualite|echelonne|finance|installment|ratenzahlung|finanzierung|cembra'},
    {c: 'inf', t: 'Horaires', live: true, a: 'Lundi – vendredi : 07:30 – 17:00. Samedi – dimanche : sur rendez-vous.', kw: 'horaire|horaires|heure|ouvert|ouverture|ferme|samedi|dimanche|week end|weekend|open|hours|opening|saturday|sunday|offnungszeiten|geoffnet|samstag|sonntag'},
    {c: 'inf', t: 'Adresse', a: 'Rue de Lausanne 64-66, 1202 Genève.', map: true, kw: 'adresse|ou est le garage|ou est|ou etes vous|ou etes|vous etes ou|ou se trouve|trouver|itineraire|plan|geneve|address|where|location|adresse|wo|standort|anfahrt'},
    {c: 'inf', t: 'Téléphone et contact', a: 'Fixe : +41 22 732 98 37 · Mobile : +41 79 561 86 47 · WhatsApp : +41 79 919 86 47 · E-mail : garage-daytona@bluewin.ch', kw: 'telephone|tel|appeler|numero|contact|email|mail|whatsapp|phone|call|number|telefon|anrufen|nummer'},
    {c: 'inf', t: 'Modes de paiement', a: 'Espèces, virement (IBAN) et Twint. Les services sont payés avant ou lors de la restitution du véhicule.', kw: 'paiement|payer|twint|carte|especes|cash|iban|virement|payment|pay|card|bezahlen|zahlung|karte|bar'},
    {c: 'inf', t: 'Langues', a: 'Notre équipe vous accueille et vous conseille en français, en anglais et en allemand.', kw: 'langue|langues|anglais|allemand|english|german|language|speak|sprache|deutsch|englisch'},
    {c: 'inf', t: 'Prendre rendez-vous', a: 'Écrivez-nous sur WhatsApp ou appelez-nous : notre équipe vous répond et fixe le rendez-vous avec vous.', kw: 'rendez vous|rdv|reserver|reservation|appointment|book|booking|termin|buchen'},
    {c: 'inf', t: 'Le garage', a: 'Garage Daytona est à Genève depuis 1998, soit 28 ans d’expérience : réparation, entretien, diagnostic, carrosserie et vente de voitures, avec une équipe de professionnels qualifiés.', kw: 'garage|daytona|experience|depuis|depuis quand|combien d annees|annees|ans|ancien|since when|how long|been open|have you been|years|seit wann|jahre|about|team|equipe|1998|sedra|qui etes vous'},
    {c: 'inf', t: 'Nos prix', p: [['Diagnostic mécanique', PX('diag', '100 CHF')], ['Diagnostic carrosserie', 'gratuit'], ['Main-d’œuvre', PX('mo', '120 CHF / heure')]], a: 'Nos prix sont clairs et affichés sur le site. Avant chaque intervention, vous recevez un prix adapté à votre voiture, sans surprise.', kw: 'cher|chere|chers|pas cher|bon marche|couteux|abordable|vos prix|vos tarifs|les prix|tarif|tarifs|devis|expensive|cheap|price|prices|cost|quote|teuer|billig|preise|kosten|angebot'},
    {c: 'inf', t: 'Toutes marques', a: 'Nous réparons la carrosserie de tous types de véhicules. Pour la mécanique, écrivez-nous la marque et le modèle de votre voiture.', kw: 'marque|marques|toutes marques|modele|brand|brands|all makes|marke|marken|bmw|audi|mercedes|volkswagen|vw|toyota|renault|peugeot|fiat|ford|opel|skoda|tesla|porsche|citroen|nissan|hyundai|kia'},
    {c: 'inf', t: 'Bonjour', a: 'Bonjour et bienvenue chez Garage Daytona ! Posez-moi votre question : prix, services, horaires, adresse… je vous réponds tout de suite.', hi: true, kw: 'bonjour|salut|bonsoir|hello|hi|hey|hallo|gruezi|guten tag|coucou'},
    {c: 'inf', t: 'Avec plaisir', a: 'Avec plaisir ! Si vous avez une autre question, je suis là. Pour un rendez-vous, écrivez directement au garage.', hi: true, kw: 'merci|thanks|thank you|danke|merci beaucoup|super|parfait|top'}
  ];
  const nrm = x => x.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '').replace(/[’']/g, ' ').replace(/[^a-z0-9 ]+/g, ' ').replace(/\s+/g, ' ').trim();
  KB.forEach(e => { e.K = e.kw.split('|').map(nrm); e.T = nrm(e.t); });
  // one-letter typos still match (geometri, batery, horaire…)
  const lev = (x, y) => { const m = x.length, n = y.length, d = Array.from({length: m + 1}, (_, i) => [i]); for (let j = 1; j <= n; j++) d[0][j] = j; for (let i = 1; i <= m; i++) for (let j = 1; j <= n; j++) d[i][j] = Math.min(d[i - 1][j] + 1, d[i][j - 1] + 1, d[i - 1][j - 1] + (x[i - 1] === y[j - 1] ? 0 : 1)); return d[m][n]; };
  function search(q) {
    const n = nrm(q), toks = n.split(' ').filter(w => w.length > 1);
    return KB.map(e => {
      let sc = 0;
      e.K.forEach(k => {
        if (k.includes(' ')) { if (n.includes(k)) sc += 4; return; }
        toks.forEach(w => { if (w === k) sc += 3; else if (w.length >= 4 && k.length >= 4 && (w.startsWith(k) || k.startsWith(w))) sc += 2; else if (w.length >= 5 && k.length >= 5 && Math.abs(w.length - k.length) <= 1 && lev(w, k) <= 1) sc += 2; });
      });
      if (e.T && n.includes(e.T)) sc += 3;
      return {e, sc};
    }).filter(r => r.sc >= 2).sort((a, b) => b.sc - a.sc);
  }

  function home(dir = -1) {
    setAmb(null); showUrg(false); lights.forEach(l => l.classList.remove('lit'));
    if (g && !reduce) g.to(N, {s: 0, duration: .6, onUpdate: draw}); else { N.s = 0; draw(); }
    $('ttl').textContent = 'DAYTONA · ASSISTANT';
    const cats = ['mec', 'pne', 'car', 'ocv', 'net', 'ven'];
    const quick = ['Batterie', 'Leasing', 'Horaires', 'Paiement', 'Dépannage', 'Géométrie', 'Gardiennage']; // ordered so they fit on two rows on a phone
    go(`<form class="askf" id="askf" autocomplete="off"><input id="askq" type="text" enterkeyhint="send" aria-label="Votre question" placeholder="Posez votre question…"><button type="submit" aria-label="Envoyer"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button></form>
      <div class="qk">${quick.map((w, i) => `<button type="button" class="qc" id="qc${i}">${w}</button>`).join('')}</div>
      <div class="tiles">${cats.map(c => `<button type="button" class="tile" id="ct-${c}">${icon(CAT[c].k)}<span>${CAT[c].n}<small>${KB.filter(e => e.c === c).length} sujets</small></span></button>`).join('')}</div>`, dir);
    if (g && !reduce) g.fromTo('.tile, .qc', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .35, stagger: .03, ease: 'power2.out', delay: .1});
    cats.forEach(c => $('ct-' + c).addEventListener('click', () => listCat(c)));
    quick.forEach((w, i) => $('qc' + i).addEventListener('click', () => ask(w)));
    $('askf').addEventListener('submit', e => { e.preventDefault(); const v = $('askq').value.trim(); if (v) ask(v); });
  }

  // detailed overview of each service (wording from the garage's own pages)
  const OV = {
    mec: {i: 'Entretien, diagnostic, réparation et géométrie de votre voiture, par une équipe de professionnels qualifiés.',
      inc: ['Diagnostic électronique et mécanique', 'Réparations mécaniques complètes', 'Géométrie, niveaux, batterie, éclairage', 'Déplacement et dépannage', 'Tout type de pièce sur demande'],
      st: [['Diagnostic', 'Nous trouvons l’origine du problème.'], ['Prix clair', 'Vous recevez un prix adapté à votre voiture avant l’intervention.'], ['Réparation', 'Notre atelier répare votre véhicule.']],
      pr: [['Diagnostic', PX('diag', '100 CHF')], ['Géométrie', PX('geo', '220 CHF')], ['Main-d’œuvre', PX('mo', '120 CHF / heure')]],
      note: 'Le nettoyage est offert avec tout service réalisé au garage.'},
    pne: {i: 'Pneus d’occasion de marque, été et hiver, vendus par jeux complets, avec ou sans jantes. Chaque jeu est contrôlé par nos mécaniciens.',
      inc: ['Photos réelles et année de chaque jeu', 'Recherche par taille, par exemple 205/55 R16', 'Prix fixe pour le jeu complet', 'Réservation en ligne ou sur WhatsApp', 'Montage, équilibrage et gardiennage à l’atelier'],
      st: [['Trouvez', 'Cherchez votre taille, écrite sur le flanc du pneu.'], ['Réservez', 'En ligne ou sur WhatsApp, nous vous confirmons par téléphone.'], ['Récupérez', 'Au garage, Rue de Lausanne 64, paiement sur place.']],
      pr: [['Changement de pneus', PX('pneus', '120 CHF')], ['Montage et équilibrage', PX('equil', '30 CHF / pneu')], ['Gardiennage', PX('gard', '60 CHF')]]},
    car: {i: 'Réparation de la carrosserie de tous types de véhicules, endommagés ou accidentés, avec des équipements récents, et peinture automobile en cabine.',
      inc: ['Petite réparation ou restauration complète', 'Peinture en cabine', 'Démarches avec votre assurance', 'Voiture de remplacement si la réparation est longue'],
      st: [['Évaluation', 'Nous examinons les dégâts de votre véhicule.'], ['Diagnostic', 'Nous évaluons les travaux et vous informons clairement.'], ['Réparation', 'Nos experts réparent la carrosserie.'], ['Peinture finale', 'Votre voiture retrouve son apparence d’origine.']],
      pr: [['Diagnostic', 'gratuit']]},
    ocv: {i: 'Nous préparons votre véhicule pour la visite du contrôle technique, et nous pouvons l’emmener au centre pour vous.',
      inc: ['Contrôle des fluides', 'Freins et pneus', 'Éclairage', 'Sécurité générale'],
      st: [['Préparation', 'Nous inspectons et préparons votre véhicule.'], ['Transport', 'Nous emmenons votre véhicule au centre de contrôle.'], ['Retour', 'Nous vous le ramenons.']],
      pr: [['Préparation complète', PX('ocv_prep', '300 CHF')], ['Transport aller-retour', PX('ocv_move', '100 CHF')]],
      note: 'Un contrôle technique est recommandé tous les 3 ans.'},
    net: {i: 'Un intérieur impeccable, frais et parfumé, comme si votre voiture sortait du neuf. Deux formules au choix.',
      inc: ['Sièges et tapis', 'Tableau de bord', 'Vitres et plafonnier', 'Lavage complet avec la formule complète'],
      pr: [['Nettoyage intérieur détaillé', PX('net_in', 'dès 150 CHF')], ['Nettoyage détaillé et lavage complet', PX('net_full', '210 CHF')]],
      note: 'Le nettoyage est offert avec tout service réalisé au garage.'},
    ven: {i: 'Voitures d’occasion certifiées et sélectionnées, avec un stock régulièrement mis à jour.',
      inc: ['Essai sur place, du lundi au vendredi', 'Reprise ou échange de votre voiture', 'Estimation gratuite au garage', 'Leasing avec Cembra Money Bank']}
  };

  async function listCat(c, dir = 1) {
    const C = CAT[c], O = OV[c] || {}; setAmb('--wine'); blip(); showUrg(false);
    $('ttl').textContent = C.n.toUpperCase();
    const items = KB.filter(e => e.c === c);
    const msg = `Bonjour, je souhaite des informations sur : ${C.n}.`;
    const my = go(`<div class="hdr">${back}<span class="hi">${icon(C.k)}</span><div><b>${C.n}</b><small>Présentation du service</small></div></div>
      ${O.i ? `<p class="tx" id="oi"></p>` : ''}
      <div class="ovb" id="ovb">
      ${O.st ? `<div class="sec"><span class="sh">Comment ça se passe</span><ol class="stp">${O.st.map((x, i) => `<li><b>${i + 1}</b><div><strong>${x[0]}</strong><span>${x[1]}</span></div></li>`).join('')}</ol></div>` : ''}
      ${O.inc ? `<div class="sec"><span class="sh">Ce que nous faisons</span><ul class="inc">${O.inc.map(x => `<li>${x}</li>`).join('')}</ul></div>` : ''}
      ${O.pr ? `<div class="sec"><span class="sh">Prix</span><div class="prc">${O.pr.map(p => `<div><span>${p[0]}</span><b>${p[1]}</b></div>`).join('')}</div></div>` : ''}
      ${O.note ? `<p class="nt">${O.note}</p>` : ''}
      <a class="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Écrire au garage</a>
      <div class="sec"><span class="sh">Questions sur ce service</span><div class="lst">${items.map((e, i) => `<button type="button" class="li" id="li${i}"><span>${e.t}</span><b>${e.p ? e.p[0][1] : ''}</b><i>›</i></button>`).join('')}</div></div>
      ${C.pg ? `<a class="pgl" href="${C.pg}">Voir la page ${C.n} <span>→</span></a>` : ''}
      </div>`, dir);
    $('bk').addEventListener('click', () => home());
    items.forEach((e, i) => $('li' + i).addEventListener('click', () => e.diag != null ? detail(e.diag) : answerKB(e, null, c)));
    if (g && !reduce) g.set('#ovb', {opacity: 0});
    if (O.i) { await type($('oi'), O.i); if (my !== run) return; }
    if (g && !reduce) { g.to('#ovb', {opacity: 1, duration: .3}); g.fromTo('#ovb .stp li, #ovb .inc li, #ovb .prc > div', {opacity: 0, x: 10}, {opacity: 1, x: 0, duration: .3, stagger: .05}); }
  }

  function ask(q) {
    let r = search(q);
    if (r.length > 1 && r[0].e.hi) r = r.filter(x => !x.e.hi).concat(r.filter(x => x.e.hi)); // a greeting plus a real question: answer the question
    if (!r.length) return noAnswer(q);
    answerKB(r[0].e, q, null, r.slice(1, 3).map(x => x.e));
  }

  async function answerKB(e, q, fromCat, more) {
    if (e.diag != null) return detail(e.diag);
    const C = CAT[e.c]; setAmb('--wine'); blip(); showUrg(false);
    $('ttl').textContent = 'RÉPONSE';
    const msg = q ? `Bonjour, j’ai une question : ${q}` : `Bonjour, je souhaite des informations sur : ${e.t}.`;
    const also = (more && more.length ? more : KB.filter(x => x.c === e.c && x !== e).slice(0, 2));
    const my = go(`<div class="hdr">${back}<span class="hi">${icon(C.k)}</span><div><b>${e.t}</b><small>${C.n}</small></div></div>
      ${q ? `<p class="you">« ${q.replace(/[<>&]/g, '')} »</p>` : ''}
      <p class="tx" id="ka"></p>
      ${e.p ? `<div class="prc">${e.p.map(p => `<div><span>${p[0]}</span><b>${p[1]}</b></div>`).join('')}</div>` : ''}
      ${e.hi ? '' : `<a class="wa" id="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Écrire au garage</a>`}
      ${e.hi ? '' : e.map ? `<a class="pgl" target="_blank" rel="noopener" href="${MAP}">Ouvrir l’itinéraire <span>→</span></a>` : (C.pg ? `<a class="pgl" href="${C.pg}">Voir la page ${C.n} <span>→</span></a>` : '')}
      ${also.length ? `<div class="also"><span>Voir aussi</span>${also.map((x, i) => `<button type="button" class="qc" id="al${i}">${x.t}</button>`).join('')}</div>` : ''}`);
    $('bk').addEventListener('click', () => fromCat ? listCat(fromCat, -1) : home());
    also.forEach((x, i) => $('al' + i).addEventListener('click', () => answerKB(x, null, x.c)));
    if (g && !reduce) g.fromTo('.prc > div, #wa, .pgl, .also', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .35, stagger: .06, delay: .3});
    let txt = e.a;
    if (e.live) { try { const f = o => new Intl.DateTimeFormat('fr-CH', Object.assign({timeZone: 'Europe/Zurich'}, o)).format(new Date()); const day = f({weekday: 'short'}), hm = +f({hour: '2-digit', hour12: false}) * 60 + +f({minute: '2-digit'}); const wk = !/^(sam|dim)/i.test(day); txt = (wk && hm >= 450 && hm < 1020 ? 'En ce moment, le garage est ouvert. ' : 'En ce moment, le garage est fermé. ') + txt; } catch (x) {} }
    await type($('ka'), txt); if (my !== run) return;
  }

  function noAnswer(q) {
    setAmb('--wine'); showUrg(false); $('ttl').textContent = 'RÉPONSE';
    go(`<div class="hdr">${back}<span class="hi">${icon('ocv')}</span><div><b>Bonne question</b><small>Notre équipe vous répond</small></div></div>
      <p class="you">« ${q.replace(/[<>&]/g, '')} »</p>
      <p class="tx">Merci pour votre question ! Je n’ai pas encore cette information. L’équipe du garage vous répondra avec plaisir sur WhatsApp.</p>
      <a class="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent('Bonjour, j’ai une question : ' + q)}">${WAICON}Envoyer la question</a>`);
    $('bk').addEventListener('click', () => home());
  }

  // buying a car is not a problem to diagnose: straight to the cars, or a message to the garage
  async function vente() {
    setAmb('--rose'); blip(); showUrg(false); lights.forEach(l => l.classList.remove('lit'));
    $('ttl').textContent = 'VENTE';
    const msg = 'Bonjour, je cherche une voiture d’occasion. Pouvez-vous me dire ce que vous avez en ce moment ?';
    const my = go(`<div class="hdr">${back}<span class="hi" style="--c:var(--rose)">${icon('key')}</span><div><b>Acheter une voiture</b><small>Vente de voitures</small></div></div>
      <p class="tx" id="v1"></p><p class="qq" id="v2"></p>
      <div class="rows" id="vb" style="opacity:0"><a class="cta2" href="/vente-de-voitures/">${icon('key')}Voir les voitures</a><a class="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Demander au garage</a></div>`);
    $('bk').addEventListener('click', () => home());
    await type($('v1'), 'Voitures d’occasion, stock renouvelé.'); if (my !== run) return;
    await type($('v2'), 'Que souhaitez-vous faire ?', .1); if (my !== run) return;
    if (g && !reduce) g.fromTo('#vb', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .4}); else $('vb').style.opacity = 1;
  }

  async function detail(i) {
    const s = S[i], f = F[i];
    setAmb(s.c); blip(); showUrg(false);
    lights.forEach(l => l.classList.toggle('lit', l.dataset.k === s.k));
    $('ttl').textContent = 'DIAGNOSTIC';
    const my = go(`<div class="hdr">${back}<span class="hi" style="--c:var(${s.c})">${icon(s.k)}</span><div><b>${s.t}</b><small>${s.svc}</small></div></div>
      <p class="tx" id="d1"></p><p class="qq" id="d2"></p><div class="chips" id="ch"></div>`);
    $('bk').addEventListener('click', () => home());
    await type($('d1'), s.a); if (my !== run) return;
    await type($('d2'), f.q, .1); if (my !== run) return;
    $('ch').innerHTML = f.o.map((o, j) => `<button type="button" class="chip" id="ch${j}">${o.l}</button>`).join('');
    if (g && !reduce) g.fromTo('.chip', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .35, stagger: .08});
    f.o.forEach((o, j) => $('ch' + j).addEventListener('click', () => result(i, j)));
  }

  async function result(i, j) {
    const s = S[i], o = F[i].o[j];
    const msg = s.msg.replace('. ', '. ' + (o.m ? o.m + ' ' : ''));
    $('ttl').textContent = 'RÉSULTAT';
    const my = go(`<div class="hdr">${back}<span class="hi" style="--c:var(${s.c})">${icon(s.k)}</span><div><b>${s.t}</b><small>${o.l}</small></div></div>
      <div class="ub"><span>Urgence</span><div class="ubar"><i style="background:var(--green)"></i><i style="background:var(--amber)"></i><i style="background:var(--red)"></i><em id="um"></em></div><b id="ut" style="color:var(${URC[o.u]})">${URT[o.u]}</b></div>
      <p class="tx" id="r1"></p>
      <div class="rows"><div><span>Service</span><b>${s.svc}</b></div><div><span>Prix</span><b>${s.price}</b></div></div>
      <a class="wa" id="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Envoyer à l’atelier</a>
      <a class="pgl" id="pgl" href="${s.pg}">Voir la page ${s.svc} <span>→</span></a>`);
    $('bk').addEventListener('click', () => detail(i));
    showUrg(true);
    const pos = (o.u + .5) / 3 * 100;
    if (g && !reduce) { g.to(N, {s: UR[o.u], duration: 1.2, ease: 'elastic.out(1, .55)', onUpdate: draw}); g.fromTo('#um', {left: '0%'}, {left: pos + '%', duration: 1, ease: 'elastic.out(1, .6)'}); g.fromTo('.rows > div, #wa, #pgl', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .4, stagger: .08, delay: .5}); }
    else { N.s = UR[o.u]; draw(); $('um').style.left = pos + '%'; }
    await type($('r1'), o.t, .15); if (my !== run) return;
  }
  const WAICON = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm5.3 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.2-.7-2.7-1.1-4.4-3.8-4.5-4-.1-.2-1.1-1.4-1.1-2.7s.7-1.9.9-2.2c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 1.9c.1.2.1.3 0 .5l-.4.6-.4.4c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l1.8.9c.3.1.5.2.5.3.1.2.1.7-.1 1.4z"/></svg>';
  $('dHome').addEventListener('click', () => { if (started) home(); });

  // ---------- engine start ----------
  let muted = false, actx = null, started = false;
  function engineSound() {
    if (muted) return;
    try {
      actx = actx || new (window.AudioContext || window.webkitAudioContext)();
      const c = actx, t0 = c.currentTime, out = c.createGain(), lp = c.createBiquadFilter();
      lp.type = 'lowpass'; lp.frequency.value = 520; out.gain.value = 0; lp.connect(out); out.connect(c.destination);
      out.gain.linearRampToValueAtTime(.32, t0 + .08); out.gain.setValueAtTime(.32, t0 + 2.2); out.gain.exponentialRampToValueAtTime(.0001, t0 + 3.4);
      const crank = c.createOscillator(), cg = c.createGain(), lfo = c.createOscillator(), lg = c.createGain();
      crank.type = 'sawtooth'; crank.frequency.setValueAtTime(34, t0); crank.frequency.linearRampToValueAtTime(48, t0 + .55);
      lfo.type = 'square'; lfo.frequency.value = 14; lg.gain.value = .5; lfo.connect(lg); lg.connect(cg.gain); cg.gain.setValueAtTime(.5, t0); cg.gain.setValueAtTime(0, t0 + .6);
      crank.connect(cg); cg.connect(lp); crank.start(t0); lfo.start(t0); crank.stop(t0 + .62); lfo.stop(t0 + .62);
      [[1, 1], [2, .5], [.5, .6]].forEach(([mult, vol]) => {
        const o = c.createOscillator(), og = c.createGain();
        o.type = 'sawtooth'; o.frequency.setValueAtTime(40 * mult, t0 + .55); o.frequency.exponentialRampToValueAtTime(95 * mult, t0 + 1.05); o.frequency.exponentialRampToValueAtTime(36 * mult, t0 + 1.9);
        og.gain.setValueAtTime(0, t0); og.gain.setValueAtTime(vol, t0 + .55); o.connect(og); og.connect(lp); o.start(t0 + .5); o.stop(t0 + 3.5);
      });
    } catch (e) {}
  }

  function start() {
    if (started) return; started = true;
    cl.classList.remove('off');
    const b = $('start');
    if (g && !reduce) g.to(b, {scale: .6, autoAlpha: 0, duration: .4, ease: 'power2.in', onComplete: () => b.classList.add('gone')}); else b.classList.add('gone');
    if (!g || reduce) { home(); return; }
    // boot: all lights on, needle sweep, logo splash, then the home screen
    go(`<div class="boot"><div class="lg">Garage <em>Daytona</em></div><div class="pbar"><i id="pb"></i></div><div class="bt" id="bt"></div></div>`);
    setAmb('--pink');
    const tl = g.timeline();
    tl.add(() => lights.forEach(l => l.classList.add('lit')));
    tl.fromTo('.boot .lg', {opacity: 0, scale: .92, letterSpacing: '.3em'}, {opacity: 1, scale: 1, letterSpacing: '.02em', duration: 1, ease: 'power3.out'}, .1);
    tl.fromTo('#pb', {scaleX: 0}, {scaleX: 1, duration: 1.9, ease: 'power1.inOut'}, .3);
    tl.call(() => type($('bt'), 'Contrôle des systèmes…'), null, .4);
    tl.to(N, {t: 1, s: 1, duration: .9, ease: 'power2.inOut', onUpdate: draw}, .55);
    tl.to(N, {t: .11, s: 0, duration: .9, ease: 'power2.inOut', onUpdate: draw}, 1.5);
    lights.forEach((l, i) => tl.call(() => l.classList.remove('lit'), null, 1.7 + i * .13 + (i % 3) * .05));
    tl.call(() => home(1), null, 2.6);
    tl.add(() => g.to(N, {t: .13, duration: 1.4, yoyo: true, repeat: -1, ease: 'sine.inOut', onUpdate: draw}), 3.2);
  }
  $('start').addEventListener('click', start);
  // a tap on the dark screen also starts the car
  $('scr').addEventListener('click', () => { if (!started) start(); });

}