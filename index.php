<?php
require_once __DIR__ . '/includes/header.php';

$firstSlide = $HERO_SLIDES[0];
$firstProduct = getProduct($firstSlide['slug']);
$whyIcons = ['shield-check', 'wrench', 'cog', 'gauge', 'layers', 'factory', 'sparkles'];
$newsChannels = [
    ['name' => 'YouTube', 'icon' => 'youtube', 'img' => '/assets/gallery/unit2-05.jpg', 'text' => 'Watch Primetech Industries on YouTube'],
    ['name' => 'LinkedIn', 'icon' => 'linkedin', 'img' => '/assets/gallery/unit1-01.jpg', 'text' => 'Follow Primetech Industries on LinkedIn'],
    ['name' => 'Instagram', 'icon' => 'instagram', 'img' => '/assets/gallery/unit2-04.jpg', 'text' => 'Follow Primetech Industries on Instagram'],
];

$heroSlidesJson = [];
foreach ($HERO_SLIDES as $s) {
    $prod = getProduct($s['slug']);
    $heroSlidesJson[] = [
        'slug' => $s['slug'],
        'lines' => $s['lines'],
        'accent' => $s['accent'],
        'sub' => $s['sub'],
        'img' => url($s['img']),
        'code' => $prod['code'] ?? '',
        'tag' => $prod['tag'] ?? '',
        'name' => $prod['name'] ?? '',
        'href' => url('/products/' . $s['slug']),
    ];
}
?>

<section id="home-hero" class="grain relative min-h-[100svh] overflow-hidden bg-ink text-white" data-testid="home-hero" data-hero-slides='<?= e(json_encode($heroSlidesJson)) ?>'>
  <div class="blueprint absolute inset-0"></div>
  <div id="hero-slash" class="hero-slash-anim absolute right-0 top-0 h-full w-full bg-brand" aria-hidden="true"></div>
  <div class="container-x relative grid min-h-[100svh] grid-cols-1 content-center gap-8 pb-36 pt-28 lg:grid-cols-12 lg:gap-6 lg:pb-40 lg:pt-32">
    <div id="hero-text-col" class="relative z-10 lg:col-span-7 will-change-transform">
      <div class="grid">
        <h1 id="hero-headline" class="text-[clamp(2.6rem,5.4vw,6rem)] font-bold leading-[1.08] tracking-[-0.045em] [grid-area:1/1]" data-testid="hero-headline">
          <?php foreach ($firstSlide['lines'] as $i => $l): ?>
            <span class="block overflow-hidden pb-[0.22em] -mb-[0.14em]">
              <span class="block hero-line <?= $i === $firstSlide['accent'] ? 'text-brand' : '' ?>" style="animation-delay:<?= 1.25 + $i * 0.12 ?>s"><?= e($l) ?></span>
            </span>
          <?php endforeach; ?>
        </h1>
      </div>
      <div class="mt-8 grid max-w-xl">
        <p id="hero-sub" class="t-lead text-white/75 [grid-area:1/1] hero-fade-in" style="--delay:1.75s">
          <?= e($firstSlide['sub']) ?> Leading producer of plastic processing equipments in India since 1991.
        </p>
      </div>
      <div class="mt-10 flex flex-wrap gap-3 hero-fade-in" style="--delay:1.9s">
        <?= render_btn(['to' => '/products', 'label' => 'Explore Products', 'class' => 'min-w-[195px]', 'testid' => 'hero-explore-products']) ?>
        <?= render_btn(['to' => '/contact', 'label' => 'Contact Us', 'variant' => 'outline-light', 'class' => 'min-w-[195px]', 'testid' => 'hero-contact']) ?>
      </div>
    </div>

    <div id="hero-stage-col" class="relative z-10 lg:col-span-5 will-change-transform">
      <div class="hero-stage-clip">
      <?php
      $stageInner = '<div class="absolute inset-0">'
          . '<div id="hero-machine-wrap" class="relative h-full w-full [perspective:1200px] transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]" data-tilt data-testid="hero-machine">'
          . '<img id="hero-machine-img" src="' . e(url($firstSlide['img'])) . '" alt="' . e($firstProduct['name'] ?? '') . '" loading="eager" class="tilt-target absolute inset-0 m-auto max-h-[90%] max-w-[96%] object-contain drop-shadow-[0_40px_40px_rgba(0,0,0,0.55)] [transform-style:preserve-3d]" />'
          . '</div></div>'
          . '<a id="hero-machine-link" href="' . e(url('/products/' . $firstSlide['slug'])) . '" class="group absolute inset-x-5 bottom-5 flex items-end justify-between gap-4 border-t border-white/15 pt-4" data-testid="hero-machine-link">'
          . '<span><span id="hero-machine-tag" class="block text-[10px] uppercase tracking-[0.24em] text-white/60">' . e($firstProduct['tag'] ?? '') . '</span>'
          . '<span id="hero-machine-name" class="mt-1 block font-display text-lg font-semibold sm:text-xl">' . e($firstProduct['name'] ?? '') . '</span></span></a>';
      echo render_stage_frame(
          $stageInner,
          'aspect-[4/3.4] w-full sm:aspect-[4/3] lg:aspect-[4/4.6]',
          ['', '01 / 04'],
          'hero-stage-label'
      );
      ?>
      </div>
    </div>
  </div>

  <div class="absolute inset-x-0 bottom-0 z-10 border-t border-white/10">
    <div class="container-x grid grid-cols-4">
      <?php foreach ($HERO_SLIDES as $i => $s): $prod = getProduct($s['slug']); ?>
        <button type="button" data-hero-slide="<?= $i ?>" class="group relative py-5 pr-4 text-left" data-testid="hero-slide-<?= $i ?>" aria-label="Show <?= e($prod['name'] ?? '') ?>">
          <span class="absolute inset-x-0 top-[-1px] h-[2px] bg-white/10">
            <span class="hero-progress block h-full bg-brand" style="width:<?= $i === 0 ? '0%' : '0%' ?>"></span>
          </span>
          <span class="hero-num text-[11px] font-semibold tabular-nums <?= $i === 0 ? 'text-white' : 'text-white/50' ?>">0<?= $i + 1 ?></span>
          <span class="hero-label ml-3 hidden text-sm transition-colors duration-300 md:inline <?= $i === 0 ? 'text-white' : 'text-white/55 group-hover:text-white' ?>"><?= e($prod['name'] ?? '') ?></span>
        </button>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="pointer-events-none absolute bottom-24 left-1/2 z-10 hidden -translate-x-1/2 flex-col items-center gap-3 lg:flex" aria-hidden="true">
    <span class="text-[10px] uppercase tracking-[0.3em] text-white/60">Scroll</span>
    <span class="relative h-12 w-px overflow-hidden bg-white/15">
      <span class="scrollcue absolute inset-x-0 top-0 h-1/2 bg-white"></span>
    </span>
  </div>
</section>

<section class="relative bg-white py-14 sm:py-16 lg:py-20" data-testid="home-intro">
  <div class="container-x grid gap-14 lg:grid-cols-12 lg:gap-10">
    <div class="lg:col-span-6 lg:pr-8">
      <?= render_mask_lines(['Plastic processing', 'machinery, engineered', 'in Ahmedabad.'], ['class' => 't-h2 text-ink', 'accent' => 2]) ?>
      <div class="mt-10 max-w-xl space-y-5 text-[15px] leading-relaxed text-ink/70 sm:text-base" data-reveal style="--delay:0.15s">
        <p class="t-lead text-ink"><?= e($ABOUT_INTRO[0]) ?></p>
        <p><?= e($ABOUT_INTRO[1]) ?></p>
        <p><?= e($ABOUT_INTRO[4]) ?></p>
      </div>
      <div class="mt-10 flex flex-wrap items-center gap-6" data-reveal style="--delay:0.25s">
        <?= render_btn(['to' => '/the-company/about-us', 'label' => 'Read More', 'variant' => 'dark', 'testid' => 'intro-read-more']) ?>
        <?= render_arrow_link('/infrastructure', 'Our infrastructure', '', 'intro-infra-link') ?>
      </div>
    </div>
    <div class="relative lg:col-span-6 lg:self-start">
      <div class="relative" data-parallax="30">
        <?= render_clip_image('/assets/misc/the-company-pic.jpg', 'Primetech Industries - Unit 1 Facility', ['class' => 'aspect-[4/3] w-full lg:ml-auto lg:w-[88%]', 'testid' => 'intro-image-main']) ?>
      </div>
      <div class="relative -mt-20 ml-auto w-[62%] border-[10px] border-white sm:-mt-28 lg:-ml-2 lg:mr-auto lg:w-[56%]">
        <?= render_clip_image('/assets/gallery/unit1-02.jpg', 'Assembly line & testing floors, Unit 1 GIDC Vatva', ['class' => 'aspect-[4/3] w-full', 'delay' => 0.25, 'horizontal' => true]) ?>
      </div>
      <div class="hidden lg:block lg:absolute lg:bottom-0 lg:right-0 lg:z-10 lg:w-[40%] border-[10px] border-white bg-ink p-7 text-white" data-reveal style="--delay:0.4s">
        <p class="t-stat text-5xl leading-none text-white">ISO</p>
        <p class="mt-3 text-xs uppercase tracking-[0.2em] leading-relaxed text-white/75">9001:2015 certified company</p>
      </div>
    </div>
  </div>
</section>

<section class="section bg-paper" data-testid="home-stats">
  <div class="container-x">
    <?= render_section_head([
        'eyebrow' => 'Company Foot Print',
        'title' => ['Three decades of', 'engineering precision.'],
    ]) ?>
    <div class="mt-16 grid gap-px border border-ink/10 bg-ink/10 sm:grid-cols-2 lg:mt-20 lg:grid-cols-4">
      <?php
      $statMeta = [
          ['copy' => $FOOTPRINT_COPY['heritage'], 'big' => true, 'dark' => true, 'class' => 'sm:col-span-2 lg:row-span-2'],
          ['copy' => $FOOTPRINT_COPY['units'], 'big' => false, 'dark' => false, 'class' => ''],
          ['copy' => $FOOTPRINT_COPY['area'], 'big' => false, 'dark' => false, 'class' => ''],
          ['copy' => $FOOTPRINT_COPY['mixing'], 'big' => false, 'dark' => false, 'class' => ''],
          ['copy' => $FOOTPRINT_COPY['capacity'], 'big' => false, 'dark' => false, 'class' => ''],
          ['copy' => $FOOTPRINT_COPY['pulverizing'], 'big' => false, 'dark' => false, 'class' => 'lg:col-span-2'],
          ['copy' => $FOOTPRINT_COPY['countries'], 'big' => false, 'dark' => false, 'class' => 'sm:col-span-2 lg:col-span-2'],
      ];
      foreach ($STATS as $i => $s):
          $m = $statMeta[$i];
          $numSize = $m['big']
              ? 'text-[clamp(5rem,12vw,11rem)]'
              : (!empty($s['unit']) ? 'text-[clamp(2.2rem,3vw,3.1rem)]' : 'text-[clamp(2.8rem,4.2vw,4rem)]');
      ?>
        <div class="relative flex flex-col <?= $m['big'] ? 'justify-between gap-10' : 'justify-start gap-6' ?> p-7 sm:p-9 <?= $m['dark'] ? 'bg-ink text-white' : 'bg-white' ?> <?= e($m['class']) ?>" data-reveal>
          <span class="text-[11px] font-semibold uppercase tracking-[0.22em] <?= $m['dark'] ? 'text-white/60' : 'text-ink/55' ?>"><?= e($s['note']) ?></span>
          <div class="<?= $m['big'] ? '' : 'flex flex-1 flex-col' ?>">
            <p class="t-stat whitespace-nowrap <?= $m['big'] ? '' : 'min-h-[3.75rem] flex items-baseline' ?> <?= $numSize ?> <?= $m['dark'] ? 'text-white' : 'text-ink' ?>" data-testid="stat-<?= $s['n'] ?>">
              <span data-counter="<?= $s['n'] ?>" data-format="<?= e($s['format'] ?? '') ?>"><?= $s['n'] ?></span><span class="text-brand"><?= e($s['suffix']) ?></span>
              <?php if (!empty($s['unit'])): ?>
                <span class="ml-2 text-[0.36em] font-semibold tracking-normal"><?= e($s['unit']) ?></span>
              <?php endif; ?>
            </p>
            <h3 class="mt-4 font-display text-lg font-semibold <?= $m['big'] ? 'sm:text-2xl' : 'min-h-[3.25rem]' ?>"><?= e($s['label']) ?></h3>
                <p class="mt-3 max-w-md text-sm leading-relaxed <?= $m['dark'] ? 'text-white/65' : 'text-ink/60' ?>"><?= e($m['copy']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section bg-white" data-testid="home-products">
  <div class="container-x">
    <?= render_section_head([
        'eyebrow' => 'Product Range',
        'title' => ['Engineered for every', 'stage of the process.'],
        'intro' => 'Engineering excellence in high-speed industrial mixing, size reduction solutions, and automated bulk conveying systems.',
        'align' => 'split',
    ]) ?>
    <div class="mt-14 flex gap-2 overflow-x-auto border-b border-ink/10 pb-px" role="tablist" data-home-tabs>
      <?php foreach ($CATEGORIES as $i => $c): $count = count(byCategory($c['id'])); ?>
        <button type="button" role="tab" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" data-home-cat="<?= e($c['id']) ?>" class="relative shrink-0 px-1 pb-4 pr-8 text-left transition-colors duration-300 <?= $i === 0 ? 'text-ink' : 'text-ink/50 hover:text-ink' ?>" data-testid="home-cat-<?= e($c['id']) ?>">
          <span class="mr-2 text-xs font-semibold text-brand">0<?= $i + 1 ?></span>
          <span class="font-display text-lg font-semibold sm:text-2xl"><?= e($c['name']) ?></span>
          <span class="ml-2 align-top text-xs text-ink/50">(<?= $count ?>)</span>
          <span class="home-cat-line absolute inset-x-0 -bottom-px h-[2px] bg-brand <?= $i === 0 ? '' : 'hidden' ?>"></span>
        </button>
      <?php endforeach; ?>
    </div>
    <?php foreach ($CATEGORIES as $ci => $c):
        $items = byCategory($c['id']);
        $first = $items[0];
        $firstGlobalIdx = getProductIndex($first['slug']);
    ?>
      <div class="mt-10 grid gap-8 lg:grid-cols-12 lg:items-stretch <?= $ci === 0 ? '' : 'hidden' ?>" data-home-panel="<?= e($c['id']) ?>">
        <div class="lg:col-span-7">
          <a href="<?= e(url('/products/' . $first['slug'])) ?>" class="group relative flex h-full flex-col overflow-hidden bg-paper text-ink" data-home-preview data-testid="product-tile-<?= e($first['slug']) ?>">
            <div class="relative aspect-[4/3] overflow-hidden lg:min-h-[380px] lg:flex-1">
              <div class="blueprint-light absolute inset-0 transition-opacity duration-500 group-hover:opacity-60"></div>
              <div class="absolute bottom-[9%] left-1/2 h-6 w-[55%] -translate-x-1/2 rounded-[50%] bg-black/20 blur-xl transition-all duration-700 group-hover:w-[62%]"></div>
              <img data-preview-img src="<?= e(url($first['image'])) ?>" alt="<?= e($first['name']) ?>" loading="lazy" decoding="async" class="absolute inset-0 m-auto h-[78%] w-[82%] object-contain transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-[1.06]" />
              <span data-preview-code class="absolute left-5 top-5 text-[11px] font-semibold uppercase tracking-[0.22em] text-ink/55">
                <?= sprintf('%02d', $firstGlobalIdx + 1) ?>
              </span>
              <span class="absolute right-5 top-5 inline-flex h-10 w-10 items-center justify-center bg-brand text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                <?= icon('arrow-up-right', 'h-4 w-4 transition-transform duration-300 group-hover:rotate-45') ?>
              </span>
            </div>
            <div class="relative border-t border-ink/10 p-6 sm:p-7">
              <span class="absolute left-0 top-[-1px] h-px w-0 bg-brand transition-all duration-500 group-hover:w-full"></span>
              <p data-preview-tag class="text-[11px] font-semibold uppercase tracking-[0.2em] text-brand"><?= e($first['tag']) ?></p>
              <h3 data-preview-name class="mt-2 font-display text-2xl font-semibold tracking-tight sm:text-3xl"><?= e($first['name']) ?></h3>
              <p data-preview-short class="mt-3 text-sm leading-relaxed text-ink/65"><?= e($first['short']) ?></p>
              <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold">
                <span class="link-u pb-0.5 group-hover:[background-size:100%_1px]">Explore Product</span>
                <?= icon('arrow-up-right', 'h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5') ?>
              </span>
            </div>
          </a>
        </div>

        <ul class="flex flex-col justify-center border-t border-ink/10 lg:col-span-5">
          <?php foreach ($items as $i => $p):
              $gIdx = getProductIndex($p['slug']);
              $isActive = $i === 0;
          ?>
            <li class="border-b border-ink/10">
              <a href="<?= e(url('/products/' . $p['slug'])) ?>"
                 data-home-list-item
                 data-slug="<?= e($p['slug']) ?>"
                 data-name="<?= e($p['name']) ?>"
                 data-tag="<?= e($p['tag']) ?>"
                 data-short="<?= e($p['short']) ?>"
                 data-code="<?= sprintf('%02d', $gIdx + 1) ?>"
                 data-img="<?= e(url($p['image'])) ?>"
                 data-href="<?= e(url('/products/' . $p['slug'])) ?>"
                 class="group flex items-center justify-between gap-4 py-5 px-3 transition-colors duration-300 <?= $isActive ? 'bg-paper text-ink' : 'hover:bg-paper/60 text-ink/80 hover:text-ink' ?>">
                <div class="flex items-baseline gap-4 min-w-0">
                  <span class="list-num text-xs font-semibold tabular-nums <?= $isActive ? 'text-brand' : 'text-ink/45 group-hover:text-brand' ?>"><?= sprintf('%02d', $i + 1) ?></span>
                  <div class="min-w-0">
                    <span class="block font-display text-lg font-semibold sm:text-xl transition-transform duration-300 group-hover:translate-x-1"><?= e($p['name']) ?></span>
                    <span class="mt-0.5 block text-[11px] font-semibold uppercase tracking-[0.18em] text-ink/50"><?= e($p['tag']) ?></span>
                  </div>
                </div>
                <?= icon('arrow-up-right', 'h-4 w-4 shrink-0 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 ' . ($isActive ? 'text-brand' : 'text-ink/40 group-hover:text-brand')) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
    <div class="mt-12 flex justify-center">
      <?= render_btn(['to' => '/products', 'label' => 'View All Products', 'variant' => 'outline-dark', 'testid' => 'home-view-all-products']) ?>
    </div>
  </div>
</section>

<section class="section border-t border-ink/10 bg-white" data-testid="home-industries">
  <div class="container-x">
    <?= render_section_head([
        'eyebrow' => 'Industries & Applications',
        'title' => ['From PVC pipes to', 'pharma powders.'],
        'intro' => 'Our mixers, size reduction and conveying systems serve plastics and polymers processors as well as food, chemical, pharmaceutical and mineral industries.',
        'align' => 'split',
    ]) ?>
    <div class="mt-14">
      <?= render_application_icons() ?>
    </div>
    <ul class="mt-14 grid border-t border-ink/10 sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($INDUSTRIES as $i => $n): ?>
        <li class="group flex items-center justify-between border-b border-ink/10 py-5 pr-4 sm:pr-8" data-reveal style="--delay:<?= ($i % 4) * 0.05 ?>s">
          <span class="flex items-baseline gap-3">
            <span class="text-[11px] font-semibold tabular-nums text-ink/45"><?= sprintf('%02d', $i + 1) ?></span>
            <span class="font-display text-lg font-semibold transition-colors duration-300 group-hover:text-brand"><?= e($n) ?></span>
          </span>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="mt-10">
      <?= render_arrow_link('/applications', 'Explore all applications', '', 'home-applications-link') ?>
    </div>
  </div>
</section>

<section class="section overflow-hidden bg-paper" data-testid="home-global">
  <div class="container-x grid gap-14 lg:grid-cols-12 lg:items-center">
    <div class="lg:col-span-5">
      <span class="eyebrow mb-6 text-brand">Global Presence</span>
      <p class="t-stat text-[clamp(5rem,13vw,12rem)] text-ink">
        <span data-counter="25">25</span><span class="text-brand">+</span>
      </p>
      <h2 class="t-h3 mt-2">Countries Served in Exports</h2>
      <p class="mt-6 max-w-md text-base leading-relaxed text-ink/70"><?= e($EXPORTS_TEXT) ?> Recognized and trusted by international processors across Asia, Africa, Middle East, Europe &amp; the Americas.</p>
    </div>
    <div class="lg:col-span-7">
      <?= render_clip_image('/assets/misc/world-map.jpeg', 'Our Exports - World Map', ['class' => 'aspect-[16/9] w-full', 'imgClass' => '!object-contain bg-white', 'horizontal' => true, 'testid' => 'world-map']) ?>
    </div>
  </div>
  <div class="container-x mt-20 lg:mt-24">
    <div class="text-center">
      <h3 class="font-display text-3xl font-bold tracking-tight text-ink sm:text-4xl">
        <span class="text-brand">Our Valued</span> Clients
      </h3>
      <p class="mx-auto mt-3 max-w-2xl text-sm text-ink/65 sm:text-base">
        Trusted by industry leaders, infrastructure pioneers, and global compounding specialists
      </p>
    </div>

    <!-- 18 Featured Clients Wall (3 Lines x 6 Columns) -->
    <div class="client-wall-wrapper">
      <div class="client-wall-grid">
        <?php foreach ($CLIENTS_FEATURED as $c): ?>
          <div class="client-card">
            <div class="client-card-inner">
              <img src="<?= e(url($c['src'])) ?>" alt="<?= e($c['name']) ?>" loading="lazy" title="<?= e($c['name']) ?>" />
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Distinct Showcase Ribbon with Left & Right Nav Controls -->
    <div class="client-slider-container">
      <div class="slider-header-bar">
        <div class="slider-header-line"></div>
        <div class="slider-badge">
          <span class="badge-dot"></span>
          <span>More Esteemed Clients &amp; Global Partners</span>
          <span class="badge-dot"></span>
        </div>
        <div class="slider-header-line"></div>
      </div>

      <div class="slider-ribbon-box">
        <button type="button" class="slider-side-btn slider-btn-prev" id="clients-prev" aria-label="Previous Clients" title="Previous">
          <?= icon('chevron-left', 'h-4 w-4') ?>
        </button>

        <div class="slider-fade-mask slider-fade-left"></div>

        <div class="client-infinite-viewport" id="clients-viewport">
          <div class="client-infinite-track" id="clients-track">
            <?php for ($dup = 0; $dup < 2; $dup++): ?>
              <?php foreach ($CLIENTS_MORE as $c): ?>
                <div class="client-infinite-item"<?= $dup === 1 ? ' aria-hidden="true"' : '' ?>>
                  <div class="client-slider-pill">
                    <div class="client-card-inner">
                      <img src="<?= e(url($c['src'])) ?>" alt="<?= e($c['name']) ?>" loading="lazy" title="<?= e($c['name']) ?>" />
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endfor; ?>
          </div>
        </div>

        <div class="slider-fade-mask slider-fade-right"></div>

        <button type="button" class="slider-side-btn slider-btn-next" id="clients-next" aria-label="Next Clients" title="Next">
          <?= icon('chevron-right', 'h-4 w-4') ?>
        </button>
      </div>
    </div>
  </div>
</section>

<?= render_cta_band() ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
