<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/components.php';

$pageTitle = !empty($pageTitle) ? ($pageTitle . ' | ' . SITE_NAME) : SITE_DEFAULT_TITLE;
$pageDescription = $pageDescription ?? SITE_DEFAULT_DESC;
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$firstCategoryProducts = byCategory('mixing');
$defaultPreview = $firstCategoryProducts[0];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#0E0E0E" />
  <meta name="description" content="<?= e($pageDescription) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Primetech Industries" />
  <meta property="og:title" content="<?= e($pageTitle) ?>" />
  <meta property="og:description" content="ISO 9001:2015 manufacturer of high speed heater cooler mixers, pulverizers, granulators, shredders, conveyors and mixing plant automation since 1991." />
  <meta property="og:image" content="<?= e(url('/assets/hero/hero-1-sm.jpg')) ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?= e(url('/favicon-32x32.png')) ?>" />
  <link rel="apple-touch-icon" href="<?= e(url('/apple-icon.png')) ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="preload" as="image" href="<?= e(url('/assets/products/heater-cooler-mixers-new.png')) ?>" />
  <link rel="stylesheet" href="<?= e(url('/assets/css/styles.css?v=3')) ?>" />
  <title><?= e($pageTitle) ?></title>
  <script type="application/ld+json">{"@context":"https://schema.org","@type":"Organization","name":"Primetech Industries","foundingDate":"1991","email":"siddharth@primetechmixer.com","telephone":"+91-9081000745","address":{"@type":"PostalAddress","streetAddress":"Plot No. 4716 & 4717, Phase 4, Opp. Water Tank, GIDC Vatva","addressLocality":"Ahmedabad","postalCode":"382445","addressRegion":"Gujarat","addressCountry":"IN"},"sameAs":["https://www.linkedin.com/company/primetech-industry/","https://www.youtube.com/@PRIMETECHINDUSTRIES-w9n","https://www.instagram.com/primetech_industries"]}</script>
  <script>window.BASE_PATH = <?= json_encode(BASE_PATH) ?>;</script>
</head>
<body>
  <div id="page-loader" class="fixed inset-0 z-[80] flex items-center justify-center bg-brand" data-testid="page-loader">
    <div class="loader-inner flex flex-col items-center gap-5">
      <img src="<?= e(url('/assets/misc/logo-white.png')) ?>" alt="Primetech Industries" class="h-14 w-auto brightness-0 invert" />
      <div class="h-px w-40 overflow-hidden bg-white/25">
        <div id="loader-bar" class="h-full bg-white"></div>
      </div>
    </div>
  </div>

  <div id="scroll-progress" class="fixed inset-x-0 top-0 z-[70] h-[2px] origin-left bg-brand" style="transform:scaleX(0)" data-testid="scroll-progress"></div>

  <header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-transparent text-white transition-[background-color,color,border-color] duration-500" data-testid="site-header">
    <div class="container-x flex h-[72px] items-center justify-between gap-6 lg:h-20">
      <a href="<?= e(url('/')) ?>" class="relative block h-9 w-[118px] shrink-0 lg:h-10 lg:w-[132px]" data-testid="header-logo" aria-label="Primetech Industries home">
        <img src="<?= e(url('/assets/misc/logo-white.png')) ?>" alt="Primetech Industries" class="header-logo-white absolute inset-0 h-full w-auto transition-opacity duration-500 opacity-100" />
        <img src="<?= e(url('/assets/misc/logo.png')) ?>" alt="" aria-hidden="true" class="header-logo-dark absolute inset-0 h-full w-auto transition-opacity duration-500 opacity-0" />
      </a>
      <nav class="hidden items-center gap-6 xl:flex 2xl:gap-8" aria-label="Primary">
        <?php foreach ($NAV as $n):
            $isEnd = !empty($n['end']);
            $targetPath = $n['to'];
            $isActive = $isEnd ? ($currentPath === '/' || $currentPath === BASE_PATH . '/') : (strpos($currentPath, $targetPath) === 0 || ($targetPath === '/contact' && $currentPath === '/enquiry'));
        ?>
          <a href="<?= e(url($n['to'])) ?>"
             <?= !empty($n['mega']) ? 'data-mega-trigger="1"' : 'data-nav-plain="1"' ?>
             data-testid="nav-<?= e(strtolower(str_replace(' ', '-', $n['label']))) ?>"
             class="link-u inline-flex items-center gap-1 pb-1 text-[13.5px] font-medium <?= $isActive ? 'is-active' : '' ?>">
            <?= e($n['label']) ?>
            <?php if (!empty($n['mega'])): ?>
              <?= icon('chevron-down', 'mega-chevron h-3.5 w-3.5 transition-transform duration-300') ?>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </nav>
      <div class="flex items-center gap-3">
        <div class="hidden sm:block">
          <span class="inline-block" data-magnetic>
            <a href="<?= e(url('/contact')) ?>" id="header-cta" class="group relative inline-flex items-center gap-3 bg-white px-5 py-3 text-sm font-semibold tracking-wide text-ink transition-colors duration-300 hover:bg-brand hover:text-white" data-testid="header-cta">
              <span>Get In Touch</span>
              <span class="relative inline-flex h-4 w-4 overflow-hidden">
                <?= icon('arrow-up-right', 'absolute h-4 w-4 transition-transform duration-300 ease-out group-hover:-translate-y-4 group-hover:translate-x-4') ?>
                <?= icon('arrow-up-right', 'absolute h-4 w-4 -translate-x-4 translate-y-4 transition-transform duration-300 ease-out group-hover:translate-x-0 group-hover:translate-y-0') ?>
              </span>
            </a>
          </span>
        </div>
        <button type="button" id="mobile-menu-open" class="inline-flex h-11 w-11 items-center justify-center border border-current/30 xl:hidden" aria-label="Open menu" data-testid="mobile-menu-open">
          <?= icon('menu', 'h-5 w-5') ?>
        </button>
      </div>
    </div>

    <div id="nav-products-megamenu" class="hidden absolute left-0 right-0 top-full border-t border-ink/10 bg-white text-ink shadow-[0_30px_60px_-30px_rgba(0,0,0,0.35)]" data-testid="nav-products-megamenu">
      <div class="container-x grid grid-cols-12 gap-8 py-10">
        <?php foreach ($CATEGORIES as $ci => $c): ?>
          <div class="col-span-3">
            <p class="mb-5 flex items-baseline gap-3 border-b border-ink/10 pb-3 text-[11px] font-semibold uppercase tracking-[0.22em] text-ink/60">
              <span class="text-brand">0<?= $ci + 1 ?></span> <?= e($c['name']) ?>
            </p>
            <ul class="space-y-1">
              <?php foreach (byCategory($c['id']) as $p): ?>
                <li>
                  <a href="<?= e(url('/products/' . $p['slug'])) ?>"
                     data-mega-item
                     data-name="<?= e($p['name']) ?>"
                     data-tag="<?= e($p['tag']) ?>"
                     data-img="<?= e(url($p['image'])) ?>"
                     data-href="<?= e(url('/products/' . $p['slug'])) ?>"
                     data-testid="mega-link-<?= e($p['slug']) ?>"
                     class="group flex items-center justify-between py-2 text-[15px] font-medium text-ink/80 transition-colors duration-300 hover:text-brand">
                    <span class="transition-transform duration-300 group-hover:translate-x-1.5"><?= e($p['name']) ?></span>
                    <?= icon('arrow-up-right', 'h-3.5 w-3.5 opacity-0 transition-opacity duration-300 group-hover:opacity-100') ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
        <a id="mega-preview" href="<?= e(url('/products/' . $defaultPreview['slug'])) ?>" class="group relative col-span-3 flex flex-col overflow-hidden bg-ink p-6 text-white" data-testid="mega-preview">
          <div class="blueprint absolute inset-0"></div>
          <div class="absolute inset-x-0 bottom-10 mx-auto h-24 w-3/4 rounded-[50%] bg-white/10 blur-2xl"></div>
          <div class="relative flex h-44 items-center justify-center">
            <img id="mega-preview-img" src="<?= e(url($defaultPreview['image'])) ?>" alt="<?= e($defaultPreview['name']) ?>" class="max-h-44 max-w-full object-contain transition-transform duration-500 group-hover:scale-105" />
          </div>
          <p id="mega-preview-tag" class="relative mt-4 text-[11px] uppercase tracking-[0.22em] text-white/60"><?= e($defaultPreview['tag']) ?></p>
          <p id="mega-preview-name" class="relative mt-1 font-display text-lg font-semibold"><?= e($defaultPreview['name']) ?></p>
          <span class="relative mt-3 inline-flex items-center gap-2 text-sm text-white/80 group-hover:text-white">
            Explore product <?= icon('arrow-up-right', 'h-4 w-4') ?>
          </span>
        </a>
      </div>
      <div class="border-t border-ink/10">
        <div class="container-x flex items-center justify-between py-4 text-sm">
          <a href="<?= e(url('/products')) ?>" class="link-u font-semibold" data-testid="mega-view-all">View all products</a>
        </div>
      </div>
    </div>
  </header>

  <div id="mobile-menu" class="hidden fixed inset-0 z-[60] flex-col overflow-y-auto bg-ink text-white" style="clip-path:inset(0 0 100% 0)" data-testid="mobile-menu" data-lenis-prevent>
    <div class="container-x flex h-[72px] items-center justify-between border-b border-white/10">
      <img src="<?= e(url('/assets/misc/logo-white.png')) ?>" alt="Primetech Industries" class="h-9 w-auto" />
      <button type="button" id="mobile-menu-close" class="inline-flex h-11 w-11 items-center justify-center border border-white/30" aria-label="Close menu" data-testid="mobile-menu-close">
        <?= icon('x', 'h-5 w-5') ?>
      </button>
    </div>
    <nav class="container-x flex-1 py-6" aria-label="Mobile">
      <a href="<?= e(url('/')) ?>" class="block border-b border-white/10 py-4 font-display text-3xl font-semibold" data-testid="mobile-link-home">Home</a>
      <a href="<?= e(url('/the-company/about-us')) ?>" class="block border-b border-white/10 py-4 font-display text-3xl font-semibold" data-testid="mobile-link-about-us">About Us</a>
      <button type="button" id="mobile-products-toggle" class="flex w-full items-center justify-between border-b border-white/10 py-4 font-display text-3xl font-semibold" data-testid="mobile-products-toggle">
        Products <?= icon('plus', 'mobile-products-plus h-6 w-6 transition-transform duration-300') ?>
      </button>
      <div id="mobile-products-panel" class="overflow-hidden" style="height:0px;opacity:0">
        <div class="space-y-6 py-5">
          <a href="<?= e(url('/products')) ?>" class="text-sm font-semibold underline-offset-4 hover:underline" style="color: #ff6b70">View all products</a>
          <?php foreach ($CATEGORIES as $c): ?>
            <div>
              <p class="mb-2 text-[11px] uppercase tracking-[0.22em] text-white/60"><?= e($c['name']) ?></p>
              <?php foreach (byCategory($c['id']) as $p): ?>
                <a href="<?= e(url('/products/' . $p['slug'])) ?>" class="block py-1.5 text-base text-white/85" data-testid="mobile-product-<?= e($p['slug']) ?>"><?= e($p['name']) ?></a>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php
      $mobileRest = [
          ['/applications', 'Applications'],
          ['/infrastructure', 'Infrastructure'],
          ['/downloads', 'Downloads'],
          ['/contact', 'Contact Us'],
      ];
      foreach ($mobileRest as [$to, $l]): ?>
        <a href="<?= e(url($to)) ?>" class="block border-b border-white/10 py-4 font-display text-3xl font-semibold" data-testid="mobile-link-<?= e(strtolower(str_replace(' ', '-', $l))) ?>"><?= e($l) ?></a>
      <?php endforeach; ?>
    </nav>
    <div class="container-x grid grid-cols-2 gap-3 pb-8">
      <a href="tel:<?= e($CONTACT['phones'][0]) ?>" class="inline-flex items-center justify-center gap-2 border border-white/30 py-4 text-sm font-semibold">
        <?= icon('phone', 'h-4 w-4') ?> Call
      </a>
      <a href="<?= e($CONTACT['whatsappLink']) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center bg-brand py-4 text-sm font-semibold">
        WhatsApp
      </a>
    </div>
  </div>

  <main id="main">
