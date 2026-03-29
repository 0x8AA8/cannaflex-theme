/**
 * Cannaflex Theme — Main JavaScript
 *
 * Vanilla JS: mobile nav toggle, product slider, search overlay, back-to-top.
 */

(function () {
  'use strict';

  /* ---------- Mobile nav toggle ---------- */
  const navToggle = document.getElementById('nav-toggle');
  const mainNav = document.getElementById('main-nav');

  if (navToggle && mainNav) {
    navToggle.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', String(!expanded));
      mainNav.classList.toggle('open');
    });

    // Close nav on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && mainNav.classList.contains('open')) {
        mainNav.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
        navToggle.focus();
      }
    });
  }

  /* ---------- Search overlay ---------- */
  const searchToggle = document.getElementById('search-toggle');
  const searchOverlay = document.getElementById('search-overlay');

  if (searchToggle && searchOverlay) {
    searchToggle.addEventListener('click', function () {
      searchOverlay.classList.add('open');
      const input = searchOverlay.querySelector('input');
      if (input) input.focus();
    });

    searchOverlay.addEventListener('click', function (e) {
      if (e.target === searchOverlay) {
        searchOverlay.classList.remove('open');
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && searchOverlay.classList.contains('open')) {
        searchOverlay.classList.remove('open');
        searchToggle.focus();
      }
    });
  }

  /* ---------- Product slider ---------- */
  const track = document.getElementById('products-track');
  const prevBtn = document.getElementById('slider-prev');
  const nextBtn = document.getElementById('slider-next');
  const dotsContainer = document.getElementById('slider-dots');

  if (track && prevBtn && nextBtn && dotsContainer) {
    let currentSlide = 0;

    function getVisibleCount() {
      const w = window.innerWidth;
      if (w < 640) return 1;
      if (w < 1024) return 2;
      return 4;
    }

    function getTotalSlides() {
      const cards = track.children.length;
      const visible = getVisibleCount();
      return Math.max(1, Math.ceil(cards / visible));
    }

    function buildDots() {
      dotsContainer.innerHTML = '';
      const total = getTotalSlides();
      for (let i = 0; i < total; i++) {
        const dot = document.createElement('button');
        dot.className = 'slider-dot' + (i === currentSlide ? ' active' : '');
        dot.setAttribute('aria-label', 'Slide ' + (i + 1));
        dot.addEventListener('click', function () {
          goTo(i);
        });
        dotsContainer.appendChild(dot);
      }
    }

    function goTo(index) {
      const total = getTotalSlides();
      currentSlide = Math.max(0, Math.min(index, total - 1));

      const visible = getVisibleCount();
      const cardWidth = track.children[0] ? track.children[0].offsetWidth : 0;
      const gap = parseFloat(getComputedStyle(track).gap) || 24;
      const offset = currentSlide * visible * (cardWidth + gap);

      track.style.transform = 'translateX(-' + offset + 'px)';

      // Update dots
      dotsContainer.querySelectorAll('.slider-dot').forEach(function (d, i) {
        d.classList.toggle('active', i === currentSlide);
      });
    }

    prevBtn.addEventListener('click', function () {
      goTo(currentSlide - 1);
    });

    nextBtn.addEventListener('click', function () {
      goTo(currentSlide + 1);
    });

    // Touch/swipe support
    let startX = 0;
    let isDragging = false;

    track.addEventListener('touchstart', function (e) {
      startX = e.touches[0].clientX;
      isDragging = true;
    }, { passive: true });

    track.addEventListener('touchend', function (e) {
      if (!isDragging) return;
      isDragging = false;
      const diff = startX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) {
        if (diff > 0) goTo(currentSlide + 1);
        else goTo(currentSlide - 1);
      }
    }, { passive: true });

    // Initialize and handle resize
    buildDots();
    goTo(0);

    let resizeTimer;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        buildDots();
        goTo(Math.min(currentSlide, getTotalSlides() - 1));
      }, 200);
    });
  }

  /* ---------- Back to top ---------- */
  const backToTop = document.getElementById('back-to-top');

  if (backToTop) {
    function toggleBackToTop() {
      backToTop.classList.toggle('visible', window.scrollY > 400);
    }

    window.addEventListener('scroll', toggleBackToTop, { passive: true });
    toggleBackToTop();

    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ---------- Product grid filter ---------- */
  var filterTabs = document.querySelectorAll('.filter-tab');
  var productGrid = document.getElementById('products-grid');

  if (filterTabs.length && productGrid) {
    filterTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        // Update active state
        filterTabs.forEach(function (t) { t.classList.remove('active'); });
        tab.classList.add('active');

        var filter = tab.getAttribute('data-filter');
        var cards = productGrid.querySelectorAll('.product-grid-card');

        cards.forEach(function (card) {
          if (filter === 'all') {
            card.style.display = '';
          } else {
            var cats = (card.getAttribute('data-category') || '').split(' ');
            card.style.display = cats.indexOf(filter) > -1 ? '' : 'none';
          }
        });
      });
    });
  }

  /* ---------- Lazy loading native fallback ---------- */
  if ('loading' in HTMLImageElement.prototype) {
    document.querySelectorAll('img[loading="lazy"]').forEach(function (img) {
      if (img.dataset.src) {
        img.src = img.dataset.src;
      }
    });
  }
})();
