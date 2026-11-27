<?php
$pageTitle = 'Applications & Industries';
$pageDescription = 'Industries and applications served by Primetech mixers, pulverizers, granulators, shredders and conveying systems.';
require_once __DIR__ . '/includes/header.php';

$appsOf = function (array $p): array {
    if (!empty($p['applicationGroups'])) {
        $out = [];
        foreach ($p['applicationGroups'] as $g) {
            foreach ($g['items'] as $item) {
                $out[] = $g['title'] . ' — ' . $item;
            }
        }
        return $out;
    }
    return $p['applications'] ?? [];
};
?>

<?= render_page_hero([
    'crumbs' => [[null, 'Applications']],
    'lines' => ['Where Primetech', 'machines work.'],
    'intro' => 'From rigid and flexible PVC dry blends, WPC and masterbatch to food, chemical, pharmaceutical and mineral powders.',
    'testid' => 'applications-hero',
]) ?>

<section class="bg-white py-12 sm:py-14" data-testid="applications-gallery">
  <div class="container-x">
    <?= render_application_icons() ?>
  </div>
</section>

<section class="section bg-paper pt-0 sm:pt-0 lg:pt-0" data-testid="industries-list">
  <div class="container-x pt-20 lg:pt-28">
    <?= render_section_head([
        'eyebrow' => 'Industries Served',
        'title' => ['Sixteen industries,', 'one engineering standard.'],
        'align' => 'split',
        'intro' => 'Our conveying, screening and size reduction equipment is applied across these process industries, alongside the plastics and polymer sector.',
    ]) ?>
    <ul class="mt-14 grid border-t border-ink/10 sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($INDUSTRIES as $i => $n): ?>
        <li class="border-b border-ink/10 py-6 pr-6" data-reveal style="--delay:<?= ($i % 4) * 0.05 ?>s">
          <span class="text-[11px] font-semibold tabular-nums text-brand"><?= sprintf('%02d', $i + 1) ?></span>
          <p class="mt-2 font-display text-xl font-semibold"><?= e($n) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section bg-white" data-testid="applications-by-product">
  <div class="container-x">
    <?= render_section_head(['eyebrow' => 'By Product', 'title' => 'Applications by machine']) ?>
    <?php foreach ($CATEGORIES as $c): ?>
      <div class="mt-16">
        <p class="mb-6 text-[11px] font-semibold uppercase tracking-[0.24em] text-ink/55"><?= e($c['name']) ?></p>
        <div class="border-t border-ink/10">
          <?php foreach (byCategory($c['id']) as $p):
              $pApps = $appsOf($p);
              if (empty($pApps)) continue;
          ?>
            <div class="group grid gap-6 border-b border-ink/10 py-8 lg:grid-cols-12 lg:items-center" data-reveal>
              <div class="flex items-center gap-5 lg:col-span-4">
                <div class="relative h-20 w-24 shrink-0 bg-paper">
                  <img src="<?= e(url($p['image'])) ?>" alt="<?= e($p['name']) ?>" loading="lazy" class="absolute inset-0 m-auto max-h-[80%] max-w-[84%] object-contain transition-transform duration-500 group-hover:scale-110" />
                </div>
                <h3 class="font-display text-xl font-semibold"><?= e($p['name']) ?></h3>
              </div>
              <div class="flex flex-wrap gap-2 lg:col-span-6">
                <?php foreach ($pApps as $a): ?>
                  <span class="border border-ink/15 px-3 py-1.5 text-[13px] text-ink/75"><?= e($a) ?></span>
                <?php endforeach; ?>
              </div>
              <a href="<?= e(url('/products/' . $p['slug'])) ?>" class="inline-flex items-center gap-2 text-sm font-semibold hover:text-brand lg:col-span-2 lg:justify-end" data-testid="applications-product-<?= e($p['slug']) ?>">
                View product <?= icon('arrow-up-right', 'h-4 w-4') ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?= render_cta_band() ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
