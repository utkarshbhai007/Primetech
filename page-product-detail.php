<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

$slug = $_GET['slug'] ?? '';
$p = getProduct($slug);
if (!$p) {
    header('Location: ' . url('/products'), true, 302);
    exit;
}

$pageTitle = $p['name'];
$pageDescription = $p['short'];
require_once __DIR__ . '/includes/header.php';

$words = explode(' ', $p['name']);
if (count($words) < 3) {
    $heroLines = [$p['name']];
} else {
    $mid = (int) ceil(count($words) / 2);
    $heroLines = [implode(' ', array_slice($words, 0, $mid)), implode(' ', array_slice($words, $mid))];
}

$jumpNav = [
    ['overview', 'Overview'],
    ['features', 'Features'],
    ['applications', 'Applications'],
];

$apps = $p['applications'] ?? [];
$related = array_slice(array_values(array_filter(byCategory($p['category']), fn($x) => $x['slug'] !== $p['slug'])), 0, 3);
$galleryImgs = array_map(fn($src) => ['src' => url($src), 'caption' => $p['name']], array_merge([$p['image']], $p['gallery'] ?? []));

$renderBullets = function (array $items, int $cols = 2): string {
    $html = '<ul class="grid gap-x-10 border-t border-ink/10 ' . ($cols === 2 ? 'sm:grid-cols-2' : '') . '">';
    foreach ($items as $i => $f) {
        $html .= '<li class="flex gap-4 border-b border-ink/10 py-4 text-[15px] leading-relaxed text-ink/80" data-reveal style="--delay:' . (($i % 6) * 0.03) . 's">'
            . '<span class="mt-[9px] h-1.5 w-1.5 shrink-0 rotate-45 bg-brand"></span>'
            . e($f)
            . '</li>';
    }
    $html .= '</ul>';
    return $html;
};
?>

<section class="grain relative overflow-hidden bg-ink text-white" data-testid="product-hero">
  <div class="blueprint absolute inset-0"></div>
  <div class="product-slash-anim absolute right-0 top-0 hidden h-full w-full bg-brand lg:block" style="clip-path:polygon(70% 0,100% 0,100% 100%,88% 100%)" aria-hidden="true"></div>
  <div class="container-x relative grid gap-10 pb-14 pt-28 sm:pt-36 lg:grid-cols-12 lg:items-center lg:pb-20 lg:pt-40">
    <div class="lg:col-span-6">
      <nav aria-label="Breadcrumb" class="mb-8 flex flex-wrap items-center gap-1.5 text-xs text-white/60" data-testid="breadcrumb">
        <a href="<?= e(url('/')) ?>" class="hover:text-white">Home</a>
        <?= icon('chevron-right', 'h-3 w-3') ?>
        <a href="<?= e(url('/products')) ?>" class="hover:text-white">Products</a>
        <?= icon('chevron-right', 'h-3 w-3') ?>
        <a href="<?= e(url('/products?category=' . urlencode($p['category']))) ?>" class="hover:text-white"><?= e(categoryName($p['category'])) ?></a>
      </nav>
      <?= render_mask_lines($heroLines, ['as' => 'h1', 'onMount' => true, 'delay' => 0.15, 'class' => 't-h1', 'accent' => count($heroLines) > 1 ? 1 : -1]) ?>
      <?php if (!empty($p['slogan'])): ?>
        <p class="mt-5 font-display text-xl font-semibold text-white/85"><?= e($p['slogan']) ?></p>
      <?php endif; ?>
      <p class="t-lead mt-6 max-w-xl text-white/75" data-testid="product-intro"><?= e($p['short']) ?></p>
      <div class="mt-10 flex flex-wrap gap-3">
        <?= render_btn(['to' => '/contact?product=' . urlencode($p['slug']), 'label' => 'Enquire Now', 'class' => 'min-w-[180px]', 'testid' => 'product-enquire']) ?>
        <?= render_btn([
            'href' => $p['brochure']['file'],
            'download' => true,
            'variant' => 'outline-light',
            'icon' => false,
            'class' => 'min-w-[180px]',
            'label' => '<span class="inline-flex items-center gap-2">' . icon('download', 'h-4 w-4') . ' Brochure</span>',
            'testid' => 'product-hero-download',
        ]) ?>
      </div>
    </div>
    <div class="lg:col-span-6 product-stage-clip">
      <?php
      $tiltHtml = '<div class="relative h-full w-full [perspective:1200px]" data-tilt data-testid="product-hero-image">'
          . '<img src="' . e(url($p['image'])) . '" alt="' . e($p['name']) . '" loading="eager" class="tilt-target absolute inset-0 m-auto max-h-[78%] max-w-[82%] object-contain drop-shadow-[0_40px_40px_rgba(0,0,0,0.55)] [transform-style:preserve-3d]" />'
          . '</div>';
      echo render_stage_frame($tiltHtml, 'aspect-[4/3.3] w-full', ['', categoryName($p['category'])]);
      ?>
    </div>
  </div>
  <div class="relative border-t border-white/10">
    <div class="container-x flex gap-6 overflow-x-auto py-4 text-sm">
      <?php foreach ($jumpNav as [$id, $l]):
          if ($id === 'features' && empty($p['features'])) continue;
          if ($id === 'applications' && empty($apps) && empty($p['applicationGroups'])) continue;
      ?>
        <button type="button" data-jump-target="<?= e($id) ?>" class="link-u shrink-0 pb-0.5 text-white/70 hover:text-white" data-testid="product-jump-<?= e($id) ?>">
          <?= e($l) ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="overview" class="section bg-white" data-testid="product-overview">
  <div class="container-x grid gap-14 lg:grid-cols-12">
    <div class="lg:col-span-4">
      <span class="eyebrow mb-6 text-brand">Overview</span>
      <?= render_mask_lines([$p['overviewTitle'] ?? 'Product Overview'], ['class' => 't-h2']) ?>
      <?php if (!empty($p['tagline'])): ?>
        <p class="mt-6 border-l-2 border-brand pl-5 text-sm font-semibold uppercase tracking-[0.12em] text-ink/70">‘<?= e($p['tagline']) ?>’</p>
      <?php endif; ?>
    </div>
    <div class="space-y-6 text-base leading-relaxed text-ink/75 lg:col-span-7 lg:col-start-6">
      <?php if (!empty($p['overview'])): foreach ($p['overview'] as $i => $t): ?>
        <p class="<?= $i === 0 ? 't-lead text-ink' : '' ?>" data-reveal style="--delay:<?= $i * 0.04 ?>s"><?= e($t) ?></p>
      <?php endforeach; endif; ?>
      <?php if (!empty($p['overviewList'])) echo $renderBullets($p['overviewList'], 1); ?>
      <?php if (!empty($p['sections'])): foreach ($p['sections'] as $s): ?>
        <div class="bg-paper p-7" data-reveal>
          <h3 class="font-display text-lg font-semibold"><?= e($s['title']) ?></h3>
          <p class="mt-3 text-[15px]"><?= e($s['text']) ?></p>
        </div>
      <?php endforeach; endif; ?>
      <?php if (!empty($p['lists'])): foreach ($p['lists'] as $l): ?>
        <div class="pt-4">
          <h3 class="mb-4 font-display text-lg font-semibold text-ink"><?= e($l['title']) ?></h3>
          <?= $renderBullets($l['items'], 2) ?>
        </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
</section>

<?php if (!empty($p['features'])): ?>
  <section id="features" class="section bg-paper" data-testid="product-features">
    <div class="container-x">
      <?= render_section_head(['eyebrow' => 'Features & Advantages', 'title' => $p['featuresTitle']]) ?>
      <div class="mt-12"><?= $renderBullets($p['features'], 2) ?></div>
      <?php if (!empty($p['construction'])): ?>
        <div class="mt-16 grid gap-10 lg:grid-cols-12">
          <h3 class="t-h3 lg:col-span-4">Construction details</h3>
          <div class="lg:col-span-8"><?= render_accordion_list($p['construction'], false, 'construction-accordion') ?></div>
        </div>
      <?php endif; ?>
      <?php if (!empty($p['performance'])): ?>
        <div class="mt-16 grid gap-10 lg:grid-cols-12">
          <h3 class="t-h3 lg:col-span-4">Performance Features</h3>
          <div class="lg:col-span-8"><?= $renderBullets($p['performance'], 2) ?></div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<?php if (!empty($p['process'])): ?>
  <section class="section grain relative overflow-hidden bg-ink text-white" data-testid="product-process">
    <div class="blueprint absolute inset-0"></div>
    <div class="container-x relative grid gap-12 lg:grid-cols-12">
      <div class="lg:col-span-5">
        <?= render_section_head(['light' => true, 'eyebrow' => 'Process', 'title' => [$p['processTitle']]]) ?>
        <img src="<?= e(url('/assets/products/plant-thumb.png')) ?>" alt="Mixing Plant Automation with Vacuum Conveyor" loading="lazy" class="mt-10 w-full" />
      </div>
      <div class="lg:col-span-7"><?= render_accordion_list($p['process'], true, 'process-accordion') ?></div>
    </div>
  </section>
<?php endif; ?>

<?php if (!empty($apps) || !empty($p['applicationGroups'])): ?>
  <section id="applications" class="bg-white py-10 sm:py-12 lg:py-14" data-testid="product-applications">
    <div class="container-x grid gap-10 lg:grid-cols-12">
      <div class="lg:col-span-4">
        <?= render_section_head(['eyebrow' => 'Applications', 'title' => count($apps) === 1 ? 'Application' : 'Applications']) ?>
      </div>
      <div class="lg:col-span-8">
        <?php if (!empty($p['applicationGroups'])): ?>
          <div class="grid gap-px bg-ink/10 sm:grid-cols-3">
            <?php foreach ($p['applicationGroups'] as $g): ?>
              <div class="bg-white p-6" data-reveal>
                <h3 class="font-display text-lg font-semibold"><?= e($g['title']) ?></h3>
                <ul class="mt-3 space-y-1.5 text-sm text-ink/70">
                  <?php foreach ($g['items'] as $x): ?><li>— <?= e($x) ?></li><?php endforeach; ?>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="flex flex-wrap gap-2">
            <?php foreach ($apps as $i => $a): ?>
              <span class="border border-ink/15 px-4 py-2.5 text-sm font-medium text-ink/80 transition-colors duration-300 hover:border-brand hover:text-brand" data-reveal style="--delay:<?= $i * 0.03 ?>s"><?= e($a) ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="mt-6">
          <?= render_application_icons(true) ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if (!empty($related)): ?>
  <section class="border-t border-ink/10 bg-white py-12 sm:py-14" data-testid="related-products">
    <div class="container-x">
      <?= render_section_head(['eyebrow' => 'More in ' . categoryName($p['category']), 'title' => 'Related products']) ?>
      <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($related as $r): ?>
          <?= render_product_tile($r, getProductIndex($r['slug'])) ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?= render_cta_band($p) ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
