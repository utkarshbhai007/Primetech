<?php
$pageTitle = 'Downloads';
$pageDescription = 'Download Primetech product brochures and the corporate catalogue (PDF).';
require_once __DIR__ . '/includes/header.php';
?>

<?= render_page_hero([
    'crumbs' => [[null, 'Downloads']],
    'lines' => ['Technical', 'documents.'],
    'intro' => 'Product brochures and the Primetech corporate catalogue, available as PDF downloads.',
    'testid' => 'downloads-hero',
]) ?>

<section class="section bg-white" data-testid="downloads-list">
  <div class="container-x">
    <div class="border-t border-ink/10">
      <?php foreach ($DOWNLOADS as $i => $d): ?>
        <div class="group grid grid-cols-[72px_1fr] items-center gap-5 border-b border-ink/10 py-5 transition-colors duration-300 hover:bg-paper sm:grid-cols-[110px_1fr_auto] sm:gap-8 sm:px-4" data-reveal style="--delay:<?= ($i % 4) * 0.04 ?>s">
          <div class="relative aspect-[4/3] bg-paper">
            <img src="<?= e(url($d['thumb'])) ?>" alt="<?= e($d['title']) ?>" loading="lazy" class="absolute inset-0 m-auto max-h-[86%] max-w-[86%] object-contain transition-transform duration-500 group-hover:scale-110" />
          </div>
          <div>
            <p class="text-[11px] font-semibold tabular-nums text-ink/50"><?= sprintf('%02d', $i + 1) ?> · PDF<?= !empty($d['note']) ? ' · ' . e($d['note']) : '' ?></p>
            <h2 class="mt-1 font-display text-lg font-semibold sm:text-2xl"><?= e($d['title']) ?></h2>
          </div>
          <div class="col-span-2 flex gap-2 sm:col-span-1">
            <a href="<?= e(url($d['file'])) ?>" target="_blank" rel="noopener noreferrer" class="inline-flex flex-1 items-center justify-center gap-2 border border-ink/20 px-4 py-3 text-sm font-semibold transition-colors duration-300 hover:border-ink hover:bg-ink hover:text-white sm:flex-none" data-testid="download-view-<?= $i ?>">
              <?= icon('eye', 'h-4 w-4') ?> View
            </a>
            <a href="<?= e(url($d['file'])) ?>" download class="inline-flex flex-1 items-center justify-center gap-2 bg-brand px-5 py-3 text-sm font-semibold text-white transition-colors duration-300 hover:bg-brand-dark sm:flex-none" data-testid="download-btn-<?= $i ?>">
              <?= icon('download', 'h-4 w-4') ?> Download Brochure
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?= render_cta_band() ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
