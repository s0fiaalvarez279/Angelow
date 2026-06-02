// ========== 1. CARRUSEL EXTENDIDO (SIN EMOJIS, CON ICONOS) ==========
(function() {
  const cardsData = [
    { amount: "$140.000", bg: "#1E40AF", label: "#BAE6FD", val: "#FFFFFF", textColor: "#fff" },
    { amount: "$120.000", bg: "#FFFFFF", label: "#1E40AF", val: "#0A1628", textColor: "#0A1628" },
    { amount: "$200.000", bg: "#3B82F6", label: "#FFFFFF", val: "#FFFFFF", textColor: "#fff" },
    { amount: "$80.000",  bg: "#DBEAFE", label: "#1E40AF", val: "#0A1628", textColor: "#0A1628" },
  ];

  function createGiftCard(card) {
    const el = document.createElement('div');
    el.className = 'gift-card';
    el.style.background = card.bg;
    el.style.color = card.textColor;
    el.innerHTML = `<div style="display:flex; justify-content:space-between;">
                      <span style="color:${card.label}; font-weight:800;">ANGELOW</span>
                      <i class="fas fa-gift" style="font-size:1.2rem;"></i>
                    </div>
                    <div>
                      <div style="color:${card.label};">BONO REGALO</div>
                      <div style="color:${card.val}; font-size:22px; font-weight:900;">${card.amount}</div>
                    </div>`;
    el.addEventListener('click', () => showToast('Tarjeta de regalo agregada al carrito', '#FBBF24'));
    return el;
  }

  const slides = [
    { type: 'cards', title: 'Tarjetas de Regalo', sub: 'El regalo perfecto' },
    { type: 'promo', badge: '<i class="fas fa-fire"></i> NUEVA COLECCIÓN', title: 'COLOR DREAMERS', subtitle: 'Viste la temporada con estilo', btnText: 'EXPLORAR COLECCIÓN →', link: '/nueva-coleccion' },
    { type: 'flash', badge: '<i class="fas fa-bolt"></i> OFERTA RELÁMPAGO', title: 'HASTA 40% OFF', subtitle: 'En productos seleccionados', btnText: 'APROVECHAR OFERTA →', link: '/ofertas', showTimer: true },
    { type: 'promo', badge: '<i class="fas fa-baby-carriage"></i> PIJAMAS', title: '20% OFF + Envío', subtitle: 'Comodidad y diversión', btnText: 'VER PIJAMAS', link: '/pijamas' },
    { type: 'promo', badge: '<i class="fas fa-hat-cowboy"></i> 2x1', title: 'ACCESORIOS ESCOLARES', subtitle: 'Mochilas y termos', btnText: 'APROVECHAR', link: '/accesorios' },
    { type: 'shipping', badge: '<i class="fas fa-truck"></i> ENVÍO GRATIS', title: 'SIN MÍNIMO DE COMPRA', subtitle: 'Válido 24h', btnText: 'COMPRAR AHORA →', link: '/envio-gratis' }
  ];

  let currentIndex = 0;
  let autoInterval;
  let isPaused = false;
  let slideDuration = 7000;
  let progressBar = null;
  let wrapper = null;
  let carouselSection = null;
  const totalSlides = slides.length;

  function buildSlides() {
    const fragment = document.createDocumentFragment();
    slides.forEach((slide) => {
      const slideDiv = document.createElement('div');
      slideDiv.className = `slide-base ${slide.type === 'cards' ? 'slide-cards' : 'slide-promo'}`;
      if (slide.type === 'cards') {
        slideDiv.innerHTML = `<div style="text-align:center;">
                                <h2 class="carousel-title"><i class="fas fa-gift"></i> ${slide.title}</h2>
                                <p style="color:#DBEAFE;">${slide.sub}</p>
                              </div>`;
        const grid = document.createElement('div'); grid.className = 'cards-grid';
        cardsData.forEach(c => grid.appendChild(createGiftCard(c)));
        slideDiv.appendChild(grid);
      } else {
        slideDiv.innerHTML = `<div class="promo-content" style="text-align:center; max-width:600px; margin:0 auto;">
                                <div class="promo-badge">${slide.badge}</div>
                                <div class="promo-title">${slide.title}</div>
                                <div class="promo-subtitle">${slide.subtitle}</div>
                                ${slide.showTimer ? '<div class="flash-timer" id="countdownTimer"></div>' : ''}
                                <button class="btn-gold slide-action" data-link="${slide.link}">${slide.btnText}</button>
                              </div>`;
      }
      fragment.appendChild(slideDiv);
    });
    return fragment;
  }

  function initCountdown() {
    const timerDiv = document.getElementById('countdownTimer');
    if (!timerDiv) return;
    let targetTime = Date.now() + 2 * 60 * 60 * 1000;
    function update() {
      const diff = targetTime - Date.now();
      if (diff <= 0) { timerDiv.innerHTML = '<span class="timer-number">00:00:00</span>'; return; }
      const hours = Math.floor(diff / 3600000);
      const mins = Math.floor((diff % 3600000) / 60000);
      const secs = Math.floor((diff % 60000) / 1000);
      timerDiv.innerHTML = `<div class="timer-unit"><span class="timer-number">${hours.toString().padStart(2,'0')}</span><span>HORAS</span></div>
                            <div class="timer-unit"><span class="timer-number">${mins.toString().padStart(2,'0')}</span><span>MIN</span></div>
                            <div class="timer-unit"><span class="timer-number">${secs.toString().padStart(2,'0')}</span><span>SEG</span></div>`;
    }
    update(); setInterval(update, 1000);
  }

  function goToSlide(index) {
    if (!wrapper) return;
    if (index < 0) index = 0;
    if (index >= totalSlides) index = totalSlides - 1;
    currentIndex = index;
    wrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
    document.querySelectorAll('.dot').forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
    if (!isPaused) resetProgressBar();
    if (autoInterval && !isPaused) { clearInterval(autoInterval); autoInterval = setInterval(autoSlide, slideDuration); }
  }
  function resetProgressBar() {
    if (!progressBar) return;
    progressBar.style.transition = 'none';
    progressBar.style.width = '0%';
    void progressBar.offsetHeight;
    progressBar.style.transition = `width ${slideDuration}ms linear`;
    setTimeout(() => { if (progressBar && !isPaused) progressBar.style.width = '100%'; }, 20);
  }
  function autoSlide() { if (!isPaused) goToSlide((currentIndex + 1) % totalSlides); }
  function pauseCarousel() { if (isPaused) return; isPaused = true; if (autoInterval) clearInterval(autoInterval); if (progressBar) progressBar.style.transition = 'none'; if (carouselSection) carouselSection.classList.add('paused'); }
  function resumeCarousel() { if (!isPaused) return; isPaused = false; autoInterval = setInterval(autoSlide, slideDuration); resetProgressBar(); if (carouselSection) carouselSection.classList.remove('paused'); }

  function initHeroCarousel() {
    const container = document.getElementById('heroCarouselContainer');
    if (!container) return;
    carouselSection = document.getElementById('heroCarouselSection');
    const viewport = document.createElement('div'); viewport.className = 'slides-viewport';
    wrapper = document.createElement('div'); wrapper.className = 'slide-wrapper';
    wrapper.appendChild(buildSlides()); viewport.appendChild(wrapper);
    progressBar = document.createElement('div'); progressBar.className = 'carousel-progress'; viewport.appendChild(progressBar);
    const btnLeft = document.createElement('button'); btnLeft.className = 'nav-btn nav-btn-left'; btnLeft.innerHTML = '‹';
    const btnRight = document.createElement('button'); btnRight.className = 'nav-btn nav-btn-right'; btnRight.innerHTML = '›';
    viewport.appendChild(btnLeft); viewport.appendChild(btnRight);
    const dotsDiv = document.createElement('div'); dotsDiv.className = 'dots-container';
    for (let i = 0; i < totalSlides; i++) { const dot = document.createElement('div'); dot.className = `dot ${i === 0 ? 'active' : ''}`; dot.addEventListener('click', (idx => () => { pauseCarousel(); goToSlide(idx); resumeCarousel(); })(i)); dotsDiv.appendChild(dot); }
    viewport.appendChild(dotsDiv);
    container.appendChild(viewport);
    btnLeft.addEventListener('click', () => { pauseCarousel(); goToSlide(currentIndex - 1); resumeCarousel(); });
    btnRight.addEventListener('click', () => { pauseCarousel(); goToSlide(currentIndex + 1); resumeCarousel(); });
    carouselSection.addEventListener('mouseenter', pauseCarousel);
    carouselSection.addEventListener('mouseleave', resumeCarousel);
    let touchStartX = 0; viewport.addEventListener('touchstart', (e) => { touchStartX = e.changedTouches[0].clientX; pauseCarousel(); });
    viewport.addEventListener('touchend', (e) => { const diff = e.changedTouches[0].clientX - touchStartX; if (Math.abs(diff) > 40) goToSlide(currentIndex + (diff > 0 ? -1 : 1)); resumeCarousel(); });
    autoInterval = setInterval(autoSlide, slideDuration); resetProgressBar();
    setTimeout(() => { initCountdown(); document.querySelectorAll('.slide-action').forEach(btn => btn.addEventListener('click', (e) => { e.preventDefault(); const link = btn.getAttribute('data-link'); if (link) window.location.href = APP_URL + link; })); }, 100);
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initHeroCarousel);
  else initHeroCarousel();
})();

// ========== 2. OFERTAS RELÁMPAGO + SCRATCH (SIN EMOJIS, CON ICONOS) ==========
(function() {
  const offersData = [
    { id: 1, name: "Conjunto deportivo", oldPrice: 129900, newPrice: 89900, discount: "31%", icon: '<i class="fas fa-tshirt"></i>', endTimeOffset: 2.5 * 3600 * 1000, link: "/producto/deportivo" },
    { id: 2, name: "Zapatos escolares", oldPrice: 159900, newPrice: 99900, discount: "38%", icon: '<i class="fas fa-shoe-prints"></i>', endTimeOffset: 5 * 3600 * 1000, link: "/producto/zapatos" },
    { id: 3, name: "Mochila + Lonchera", oldPrice: 89900, newPrice: 49900, discount: "44%", icon: '<i class="fas fa-backpack"></i>', endTimeOffset: 1.2 * 3600 * 1000, link: "/producto/mochila" }
  ];
  const grid = document.getElementById('dynamicOffersGrid');
  if (!grid) return;

  function formatTime(ms) {
    if (ms <= 0) return "00:00:00";
    const hours = Math.floor(ms / 3600000);
    const mins = Math.floor((ms % 3600000) / 60000);
    const secs = Math.floor((ms % 60000) / 1000);
    return `${hours.toString().padStart(2,'0')}:${mins.toString().padStart(2,'0')}:${secs.toString().padStart(2,'0')}`;
  }

  function updateTimers() {
    const now = Date.now();
    offersData.forEach(offer => {
      const remaining = Math.max(0, (offer.endTime - now));
      const timerEl = document.getElementById(`timer-${offer.id}`);
      if (timerEl) timerEl.innerText = formatTime(remaining);
      if (remaining <= 0) {
        const card = document.getElementById(`offer-card-${offer.id}`);
        if (card) card.style.opacity = "0.5";
      }
    });
  }

  function initOffers() {
    const nowBase = Date.now();
    offersData.forEach(offer => { offer.endTime = nowBase + offer.endTimeOffset; });
    grid.innerHTML = '';
    offersData.forEach(offer => {
      const card = document.createElement('div');
      card.className = 'offer-card';
      card.id = `offer-card-${offer.id}`;
      card.innerHTML = `
        <div class="offer-tag"><i class="fas fa-tag"></i> -${offer.discount}</div>
        <div class="offer-img">${offer.icon}</div>
        <div class="offer-title">${offer.name}</div>
        <div class="offer-price"><span class="old-price">$${offer.oldPrice.toLocaleString()}</span> <span class="new-price">$${offer.newPrice.toLocaleString()}</span></div>
        <div class="offer-countdown"><i class="fas fa-hourglass-half"></i> <span id="timer-${offer.id}">--:--:--</span> restante</div>
        <button class="btn-offer" data-link="${offer.link}">APROVECHAR OFERTA →</button>
      `;
      const btn = card.querySelector('.btn-offer');
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        showToast(`${offer.name} agregado al carrito con descuento`, "#FBBF24");
        confettiEffect();
      });
      card.addEventListener('click', () => window.location.href = APP_URL + offer.link);
      grid.appendChild(card);
    });
    updateTimers();
    setInterval(updateTimers, 1000);
  }
  initOffers();

  function confettiEffect() {
    if (typeof window.confetti === 'function') return;
    const canvas = document.createElement('canvas');
    canvas.style.position = 'fixed';
    canvas.style.top = 0;
    canvas.style.left = 0;
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    canvas.style.pointerEvents = 'none';
    canvas.style.zIndex = 9999;
    document.body.appendChild(canvas);
    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationId = null;
    const colors = ['#FBBF24', '#FFD700', '#FFA500', '#FFE55C'];
    function resize() { canvas.width = window.innerWidth; canvas.height = window.innerHeight; }
    window.addEventListener('resize', resize);
    resize();
    for (let i = 0; i < 100; i++) {
      particles.push({ x: Math.random() * canvas.width, y: canvas.height, vx: (Math.random() - 0.5) * 6, vy: -Math.random() * 8 - 6, size: Math.random() * 6 + 3, color: colors[Math.floor(Math.random() * colors.length)], alpha: 1 });
    }
    function draw() {
      if (!ctx) return;
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      let allDead = true;
      for (let i = 0; i < particles.length; i++) {
        const p = particles[i];
        p.x += p.vx;
        p.y += p.vy;
        p.vy += 0.4;
        p.alpha -= 0.01;
        if (p.y > canvas.height + 50 || p.alpha <= 0) continue;
        allDead = false;
        ctx.globalAlpha = p.alpha;
        ctx.fillStyle = p.color;
        ctx.fillRect(p.x, p.y, p.size, p.size);
      }
      if (allDead || particles.length === 0) { if (animationId) cancelAnimationFrame(animationId); canvas.remove(); return; }
      animationId = requestAnimationFrame(draw);
    }
    draw();
    setTimeout(() => { if (canvas && canvas.parentNode) canvas.remove(); if (animationId) cancelAnimationFrame(animationId); }, 2000);
  }

  const scratchDiv = document.getElementById('scratchSurface');
  const scratchText = document.getElementById('scratchText');
  const couponSpan = document.getElementById('couponResult');
  let revealed = false;
  scratchDiv.addEventListener('click', () => {
    if (revealed) return;
    const coupons = ["10% OFF", "15% OFF", "ENVÍO GRATIS", "$20.000 COP", "2x1 en pijamas"];
    const randomCoupon = coupons[Math.floor(Math.random() * coupons.length)];
    scratchDiv.classList.add('revealed');
    scratchText.innerHTML = `¡Felicidades! <i class="fas fa-star"></i>`;
    couponSpan.innerHTML = `<strong style="color:#FBBF24">${randomCoupon}</strong> aplicable en tu próxima compra.`;
    revealed = true;
    showToast(`¡Ganaste ${randomCoupon}!`, '#FBBF24');
    confettiEffect();
  });
})();

// Función global para toasts (sin emojis)
function showToast(message, bgColor = '#FBBF24') {
  let container = document.getElementById('toastContainer');
  if (!container) { 
    container = document.createElement('div'); 
    container.id = 'toastContainer'; 
    container.style.position = 'fixed'; 
    container.style.bottom = '20px'; 
    container.style.right = '20px'; 
    container.style.zIndex = '9999'; 
    document.body.appendChild(container); 
  }
  const toast = document.createElement('div');
  toast.innerText = message;
  toast.style.background = bgColor;
  toast.style.color = '#0A1628';
  toast.style.padding = '12px 24px';
  toast.style.borderRadius = '60px';
  toast.style.fontWeight = 'bold';
  toast.style.marginTop = '10px';
  toast.style.boxShadow = '0 5px 15px rgba(0,0,0,0.3)';
  toast.style.animation = 'fadeInUp 0.3s ease';
  container.appendChild(toast);
  setTimeout(() => toast.remove(), 3000);
}
window.showToast = showToast;

document.getElementById('currentYear') && (document.getElementById('currentYear').innerText = new Date().getFullYear());