<?php
$pageTitle = 'Products';
$pageDescription = 'Specialized equipment engineered for high-performance mixing, rapid cooling, size reduction, bulk material conveying, fine grading, and automated plant operations.';
require_once __DIR__ . '/includes/header.php';

$tabs = array_merge([['id' => 'all', 'name' => 'All Products']], $CATEGORIES);
$activeCat = $_GET['category'] ?? 'all';
$validCats = array_column($tabs, 'id');
if (!in_array($activeCat, $validCats, true)) {
    $activeCat = 'all';
}
?>

<?= render_page_hero([
    'crumbs' => [[null, 'Products']],
    'lines' => ['Precision engineered', 'industrial machinery.'],
    'intro' => 'Specialized equipment engineered for high-performance mixing, rapid cooling, size reduction, bulk material conveying, fine grading, and automated plant operations for the global plastics and polymer industry.',
    'testid' => 'products-hero',
]) ?>

<div class="sticky top-[72px] z-30 border-b border-ink/10 bg-white/95 backdrop-blur-md lg:top-20">
  <div class="container-x flex gap-1 overflow-x-auto" role="tablist" data-products-tabs>
    <?php foreach ($tabs as $t): $isSel = $activeCat === $t['id']; ?>
      <button type="button" role="tab" aria-selected="<?= $isSel ? 'true' : 'false' ?>" data-products-tab="<?= e($t['id']) ?>" class="relative shrink-0 px-4 py-5 text-sm font-semibold transition-colors duration-300 <?= $isSel ? 'text-ink' : 'text-ink/50 hover:text-ink' ?>" data-testid="products-tab-<?= e($t['id']) ?>">
        <?= e($t['name']) ?>
        <span class="products-tab-line absolute inset-x-4 bottom-0 h-[2px] bg-brand <?= $isSel ? '' : 'hidden' ?>"></span>
      </button>
    <?php endforeach; ?>
  </div>
</div>

<section class="bg-white pb-24 pt-14 lg:pb-32" data-testid="products-listing">
  <div class="container-x">
    <?php foreach ($CATEGORIES as $c):
        $showGroup = ($activeCat === 'all' || $activeCat === $c['id']);
    ?>
      <div class="mb-20 last:mb-0 <?= $showGroup ? '' : 'hidden' ?>" data-products-group="<?= e($c['id']) ?>" data-testid="products-group-<?= e($c['id']) ?>">
        <div class="mb-8 grid gap-4 border-b border-ink/10 pb-6 lg:grid-cols-12 lg:items-end">
          <h2 class="t-h2 lg:col-span-6"><?= e($c['name']) ?></h2>
          <p class="text-[15px] leading-relaxed text-ink/65 lg:col-span-5 lg:col-start-8"><?= e($c['blurb']) ?></p>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <?php foreach (byCategory($c['id']) as $p): ?>
            <?= render_product_tile($p, getProductIndex($p['slug'])) ?>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?= render_cta_band() ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
