  </main>

  <footer class="relative overflow-hidden bg-ink text-white" data-testid="site-footer">
    <div class="container-x grid gap-14 pb-14 pt-20 lg:grid-cols-12 lg:pt-28">
      <div class="lg:col-span-4">
        <img src="<?= e(url('/assets/misc/logo-white.png')) ?>" alt="Primetech Industries" class="h-12 w-auto" loading="lazy" />
        <p class="mt-8 max-w-sm text-sm leading-relaxed text-white/70">
          PRIMETECH, an ISO 9001:2015 company laid its foundation in 1991 with a strong vision of becoming a world class leader by delivering the ultimate quality products around the globe.
        </p>
        <div class="mt-8 flex gap-3">
          <?php foreach ($CONTACT['social'] as $s):
              $iconName = strtolower($s['name']);
          ?>
            <a href="<?= e($s['url']) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= e($s['name']) ?>" data-testid="footer-social-<?= e($iconName) ?>" class="inline-flex h-11 w-11 items-center justify-center border border-white/20 transition-colors duration-300 hover:border-brand hover:bg-brand">
              <?= icon($iconName, 'h-4 w-4') ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="lg:col-span-3">
        <p class="mb-5 text-[11px] font-semibold uppercase tracking-[0.24em] text-white/50">Products</p>
        <ul class="grid gap-2.5 text-sm text-white/75">
          <?php foreach ($PRODUCTS as $p): ?>
            <li>
              <a href="<?= e(url('/products/' . $p['slug'])) ?>" class="link-u hover:text-white"><?= e($p['name']) ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="lg:col-span-2">
        <p class="mb-5 text-[11px] font-semibold uppercase tracking-[0.24em] text-white/50">Company</p>
        <ul class="grid gap-2.5 text-sm text-white/75">
          <?php foreach ($NAV as $n): if (!empty($n['mega'])) continue; ?>
            <li>
              <a href="<?= e(url($n['to'])) ?>" class="link-u hover:text-white"><?= e($n['label']) ?></a>
            </li>
          <?php endforeach; ?>
          <li>
            <a href="<?= e(url('/enquiry')) ?>" class="link-u hover:text-white">Enquiry</a>
          </li>
        </ul>
      </div>
      <div class="lg:col-span-3">
        <p class="mb-5 text-[11px] font-semibold uppercase tracking-[0.24em] text-white/50">Get in touch</p>
        <address class="not-italic text-sm leading-relaxed text-white/75">
          <?php foreach ($CONTACT['units'][0]['lines'] as $l): ?>
            <span class="block"><?= e($l) ?></span>
          <?php endforeach; ?>
        </address>
        <div class="mt-5 grid gap-1.5 text-sm">
          <?php foreach ($CONTACT['phones'] as $p): ?>
            <a href="tel:<?= e($p) ?>" class="link-u w-fit text-white/90" data-testid="footer-phone-<?= e($p) ?>"><?= e($p) ?></a>
          <?php endforeach; ?>
          <?php foreach ($CONTACT['emails'] as $em): ?>
            <a href="mailto:<?= e($em) ?>" class="link-u w-fit text-white/90"><?= e($em) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="container-x select-none overflow-hidden">
      <p class="outline-text-light font-display text-[22vw] font-extrabold leading-[0.8] tracking-[-0.06em] lg:text-[17vw]" aria-hidden="true">PRIMETECH</p>
    </div>
    <div class="border-t border-white/10">
      <div class="container-x flex flex-col items-start justify-between gap-4 py-6 text-xs text-white/60 sm:flex-row sm:items-center">
        <p>© <?= date('Y') ?> Primetech Industries. All rights reserved.</p>
        <button type="button" data-scroll-top class="inline-flex items-center gap-2 hover:text-white" data-testid="footer-back-top">
          Back to top <?= icon('arrow-up', 'h-3.5 w-3.5') ?>
        </button>
      </div>
    </div>
  </footer>

  <button type="button" id="back-to-top" data-scroll-top class="hidden group fixed bottom-5 right-5 z-40 grid h-12 w-12 place-items-center bg-white text-ink shadow-lg sm:bottom-8 sm:right-8" aria-label="Back to top" data-testid="back-to-top">
    <svg viewBox="0 0 48 48" class="absolute inset-0 h-full w-full -rotate-90">
      <rect id="back-to-top-rect" x="1" y="1" width="46" height="46" fill="none" stroke="#B01F24" stroke-width="2" stroke-dasharray="184" stroke-dashoffset="184" />
    </svg>
    <?= icon('arrow-up', 'h-4 w-4 transition-transform duration-300 group-hover:-translate-y-0.5') ?>
  </button>

  <a href="<?= e($CONTACT['whatsappLink']) ?>" target="_blank" rel="noopener noreferrer" class="fixed bottom-5 left-5 z-40 inline-flex h-12 items-center gap-2 bg-[#1F7A4D] px-4 text-sm font-semibold text-white shadow-lg transition-colors duration-300 hover:bg-[#17603c] sm:bottom-8 sm:left-8" aria-label="WhatsApp <?= e($CONTACT['whatsapp']) ?>" data-testid="whatsapp-fab">
    <?= icon('message-circle', 'h-5 w-5') ?>
    <span class="hidden sm:inline">WhatsApp</span>
  </a>

  <div id="lightbox" class="hidden fixed inset-0 z-[90] flex-col bg-ink/95 text-white" data-testid="lightbox">
    <div class="flex items-center justify-between px-5 py-4 text-sm">
      <span id="lightbox-counter" class="text-white/70">01 / 01</span>
      <button type="button" id="lightbox-close" class="inline-flex h-11 w-11 items-center justify-center border border-white/25 hover:bg-white hover:text-ink" aria-label="Close" data-testid="lightbox-close">
        <?= icon('x', 'h-5 w-5') ?>
      </button>
    </div>
    <div id="lightbox-backdrop" class="relative flex flex-1 items-center justify-center px-4 pb-6">
      <figure id="lightbox-figure" class="flex flex-col items-center justify-center">
        <img id="lightbox-img" src="" alt="" class="max-h-[78vh] max-w-full object-contain" />
        <figcaption id="lightbox-caption" class="mt-4 text-center text-sm text-white/75"></figcaption>
      </figure>
      <button type="button" id="lightbox-prev" class="hidden absolute left-3 z-10 inline-flex h-12 w-12 items-center justify-center bg-white/10 hover:bg-brand" aria-label="Previous" data-testid="lightbox-prev">
        <?= icon('chevron-left', 'h-5 w-5') ?>
      </button>
      <button type="button" id="lightbox-next" class="hidden absolute right-3 z-10 inline-flex h-12 w-12 items-center justify-center bg-white/10 hover:bg-brand" aria-label="Next" data-testid="lightbox-next">
        <?= icon('chevron-right', 'h-5 w-5') ?>
      </button>
    </div>
  </div>

  <div id="toast-container" class="fixed bottom-6 left-1/2 z-[100] -translate-x-1/2 flex flex-col gap-2 pointer-events-none"></div>

  <script src="https://cdn.jsdelivr.net/npm/lenis@1.3.27/dist/lenis.min.js" defer></script>
  <script src="<?= e(url('/assets/js/main.js?v=3')) ?>" defer></script>
</body>
</html>
