<?php
$pageTitle = 'About Us';
$pageDescription = 'PRIMETECH, an ISO 9001:2015 certified enterprise founded in 1991 — leading manufacturer of plastic processing machinery in Ahmedabad, India.';
require_once __DIR__ . '/includes/header.php';

$certItems = array_map(fn($c) => ['src' => url('/assets/certs/' . $c[0]), 'caption' => $c[1]], $CERTS);
$hcm = getProduct('high-speed-heater-cooler-mixer');
$offerItems = array_map(fn($x) => ['k' => $x[0], 'v' => $x[1]], $OFFER);
?>

<?= render_page_hero([
    'crumbs' => [[null, 'About Us']],
    'lines' => ['A world-class vision,', 'since 1991.'],
    'image' => '/assets/gallery/unit1-main.jpg',
    'testid' => 'about-hero',
]) ?>

<section class="bg-white py-10 sm:py-12 lg:py-14" data-testid="about-profile">
  <div class="container-x grid gap-14 lg:grid-cols-12">
    <div class="lg:col-span-5">
      <?= render_mask_lines(['From a family', 'enterprise to a', 'global supplier.'], ['class' => 't-h2', 'accent' => 2]) ?>
      <div class="relative mt-8 hidden lg:block">
        <?= render_clip_image('/assets/gallery/unit1-01.jpg', 'Fabrication Bay & Material Intake, Unit 1', ['class' => 'aspect-[16/10] w-full']) ?>
      </div>
    </div>
    <div class="space-y-6 text-base leading-relaxed text-ink/75 lg:col-span-6 lg:col-start-7 lg:pt-2">
      <?php foreach ($ABOUT_PROFILE as $i => $p): ?>
        <p class="<?= $i === 0 ? 't-lead text-ink' : '' ?>" data-reveal style="--delay:<?= $i * 0.05 ?>s"><?= e($p) ?></p>
      <?php endforeach; ?>
      <?= render_clip_image('/assets/gallery/unit1-01.jpg', 'Fabrication Bay & Material Intake, Unit 1', ['class' => 'aspect-[4/3] w-full lg:hidden']) ?>
    </div>
  </div>
</section>

<section class="border-y border-ink/10 bg-paper" data-testid="about-pillars">
  <div class="container-x grid md:grid-cols-3">
    <?php foreach ($PILLARS as $i => $p): ?>
      <div class="border-ink/10 py-14 md:border-l md:px-10 md:first:border-l-0 md:first:pl-0" data-reveal style="--delay:<?= $i * 0.08 ?>s">
        <span class="text-xs font-semibold tabular-nums text-brand">0<?= $i + 1 ?></span>
        <h3 class="t-h3 mt-4"><?= e($p['k']) ?></h3>
        <p class="mt-4 text-[15px] leading-relaxed text-ink/70"><?= e($p['v']) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section bg-white" data-testid="about-stats">
  <div class="container-x">
    <?= render_section_head([
        'eyebrow' => 'Manufacturing Expertise',
        'title' => ['Mixing, size reduction', '& conveying know-how.'],
        'intro' => 'Our dedicated R&D division and Total Quality Management systems drive towards zero-defect, failure-free performance.',
        'align' => 'split',
    ]) ?>
    <div class="mt-14 grid grid-cols-2 border-t border-ink/10 lg:grid-cols-4">
      <?php foreach ([0, 3, 5, 6] as $idx): $s = $STATS[$idx]; ?>
        <div class="border-b border-ink/10 py-8 pr-4" data-reveal>
          <p class="t-stat text-[clamp(2.6rem,5vw,4.2rem)]">
            <span data-counter="<?= $s['n'] ?>" data-format="<?= e($s['format'] ?? '') ?>"><?= $s['n'] ?></span><span class="text-brand"><?= e($s['suffix']) ?></span>
          </p>
          <p class="mt-3 text-sm text-ink/65"><?= e($s['label']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-10 flex flex-wrap gap-8">
      <?= render_arrow_link('#why-primetech', 'What we offer & your advantages', '', 'about-why-link') ?>
      <?= render_arrow_link('/infrastructure', 'Our three manufacturing units', '', 'about-infra-link') ?>
    </div>
  </div>
</section>

<!-- Why Primetech: What We Offer -->
<section id="why-primetech" class="section bg-paper" data-testid="why-offer">
  <div class="container-x grid gap-14 lg:grid-cols-12">
    <div class="lg:col-span-4">
      <?= render_section_head(['eyebrow' => 'Why Primetech · What We Offer', 'title' => ['Built in-house.', 'Built to last.']]) ?>
      <?= render_clip_image('/assets/gallery/unit2-06.jpg', 'Precision Component Machining', ['class' => 'mt-10 hidden aspect-[4/5] lg:block']) ?>
    </div>
    <div class="lg:col-span-7 lg:col-start-6">
      <?= render_accordion_list($offerItems, false, 'offer-accordion') ?>
    </div>
  </div>
</section>

<!-- Why Primetech: Your Advantages -->
<section class="section bg-white" data-testid="why-advantages">
  <div class="container-x">
    <?= render_section_head(['eyebrow' => 'Your Advantages', 'title' => ['Eight reasons processors', 'choose Primetech.']]) ?>
    <div class="mt-14 grid gap-px border border-ink/10 bg-ink/10 sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($ADVANTAGES as $i => [$t, $d]): ?>
        <div class="group bg-white p-8 transition-colors duration-500 hover:bg-paper" data-reveal style="--delay:<?= ($i % 4) * 0.06 ?>s">
          <span class="text-xs font-semibold tabular-nums text-brand"><?= sprintf('%02d', $i + 1) ?></span>
          <h3 class="mt-8 font-display text-xl font-semibold"><?= e($t) ?></h3>
          <p class="mt-3 text-sm leading-relaxed text-ink/70"><?= e($d) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Why Primetech: Manufacturing Strengths -->
<section class="section grain relative overflow-hidden bg-ink text-white" data-testid="why-manufacturing">
  <div class="blueprint absolute inset-0"></div>
  <div class="container-x relative grid gap-14 lg:grid-cols-12">
    <div class="lg:col-span-5">
      <?= render_section_head(['light' => true, 'eyebrow' => 'Manufacturing Strengths', 'title' => ['In-house control', 'of every component.']]) ?>
    </div>
    <ul class="border-t border-white/15 lg:col-span-7">
      <?php foreach ($hcm['features'] as $f): ?>
        <li class="flex gap-4 border-b border-white/15 py-5 text-[15px] leading-relaxed text-white/80" data-reveal>
          <span class="mt-[9px] h-1.5 w-1.5 shrink-0 rotate-45 bg-brand"></span> <?= e($f) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section bg-white" data-testid="about-certs">
  <div class="container-x">
    <?= render_section_head(['title' => 'Certifications & Accreditations']) ?>
    <div class="mt-14 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6" data-lightbox-group='<?= e(json_encode($certItems)) ?>'>
      <?php foreach ($certItems as $i => $c): ?>
        <div data-reveal style="--delay:<?= $i * 0.05 ?>s">
          <button type="button" data-lightbox-index="<?= $i ?>" class="group block w-full text-left" data-testid="cert-<?= $i ?>">
            <div class="aspect-[3/4] overflow-hidden border border-ink/10 bg-paper p-3">
              <img src="<?= e($c['src']) ?>" alt="<?= e($c['caption']) ?>" loading="lazy" class="h-full w-full object-contain transition-transform duration-700 group-hover:scale-105" />
            </div>
            <p class="mt-3 text-sm font-medium group-hover:text-brand"><?= e($c['caption']) ?></p>
          </button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section grain relative overflow-hidden bg-ink text-white" data-testid="about-quality">
  <div class="blueprint absolute inset-0"></div>
  <div class="container-x relative grid gap-14 lg:grid-cols-12">
    <div class="lg:col-span-5">
      <?= render_section_head([
          'light' => true,
          'eyebrow' => 'Quality & Achievements',
          'title' => ['Quality has always', 'been of prime', 'importance.'],
      ]) ?>
    </div>
    <div class="space-y-6 text-base leading-relaxed text-white/75 lg:col-span-6 lg:col-start-7">
      <?php foreach ($QUALITY as $i => $q): ?>
        <p data-reveal style="--delay:<?= $i * 0.06 ?>s"><?= e($q) ?></p>
      <?php endforeach; ?>
      <div class="border-l-2 border-brand pl-6" data-reveal style="--delay:0.15s">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-white/60">Quality Excellence Recognitions</p>
        <p class="mt-3 text-white/85"><?= e($AWARDS_TEXT) ?></p>
      </div>
    </div>
  </div>
  <div class="container-x relative mt-16">
    <p class="mb-6 text-[11px] font-semibold uppercase tracking-[0.22em] text-white/60">Trusted OEM machinery partner to</p>
    <div class="grid grid-cols-2 gap-px bg-white/10 sm:grid-cols-3 lg:grid-cols-6">
      <?php foreach ($OEM_PARTNERS as [$f, $n]): ?>
        <div class="flex flex-col items-center gap-3 bg-ink p-6">
          <div class="flex h-16 w-full items-center justify-center bg-white p-3">
            <img src="<?= e(url('/assets/clients/' . $f)) ?>" alt="<?= e($n) ?>" loading="lazy" class="max-h-full max-w-full object-contain" />
          </div>
          <p class="text-center text-xs text-white/70"><?= e($n) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section bg-paper" data-testid="about-exports">
  <div class="container-x grid gap-12 lg:grid-cols-12 lg:items-center">
    <div class="lg:col-span-4">
      <?= render_section_head(['eyebrow' => 'Our Global Exports', 'title' => ['Across Asia,', 'the Middle East,', 'Africa & beyond.'], 'intro' => $EXPORTS_TEXT]) ?>
    </div>
    <?= render_clip_image('/assets/misc/world-map.jpeg', 'Our Exports - World Map', ['class' => 'aspect-[16/9] lg:col-span-8', 'imgClass' => '!object-contain bg-white', 'horizontal' => true]) ?>
  </div>
</section>

<?= render_cta_band() ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
