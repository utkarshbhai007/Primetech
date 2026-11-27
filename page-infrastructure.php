<?php
$pageTitle = 'Infrastructure';
$pageDescription = 'Three dedicated manufacturing units with over 1,00,000 sq. ft. at Vatva, Ahmedabad, Gujarat.';
require_once __DIR__ . '/includes/header.php';

$infraTabs = array_merge([['id' => 'all', 'tab' => 'All Facilities']], $UNITS);
?>

<?= render_page_hero([
    'crumbs' => [[null, 'Infrastructure']],
    'lines' => ['World-class', 'manufacturing facilities.'],
    'intro' => $INFRA_INTRO[0],
    'testid' => 'infra-hero',
]) ?>

<section class="bg-white py-10 sm:py-12" data-testid="infra-intro">
  <div class="container-x space-y-8">
    <p class="t-lead max-w-4xl text-ink/80" data-reveal><?= e($INFRA_INTRO[1]) ?></p>
    <div class="grid gap-px border border-ink/10 bg-ink/10 sm:grid-cols-2 lg:grid-cols-5">
      <?php foreach ($INFRA_HIGHLIGHTS as $i => $h): ?>
        <div class="flex flex-col justify-between gap-3 bg-paper p-5 transition-colors duration-300 hover:bg-white" data-reveal style="--delay:<?= $i * 0.05 ?>s">
          <span class="text-[11px] font-semibold tabular-nums text-brand">0<?= $i + 1 ?></span>
          <p class="font-display text-sm font-semibold leading-snug text-ink"><?= e($h) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="sticky top-[72px] z-30 border-y border-ink/10 bg-white/95 backdrop-blur-md lg:top-20">
  <div class="container-x flex gap-1 overflow-x-auto" role="tablist" data-infra-tabs>
    <?php foreach ($infraTabs as $i => $t): ?>
      <button type="button" role="tab" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" data-infra-tab="<?= e($t['id']) ?>" class="relative shrink-0 px-4 py-5 text-sm font-semibold transition-colors duration-300 <?= $i === 0 ? 'text-ink' : 'text-ink/50 hover:text-ink' ?>" data-testid="infra-tab-<?= e($t['id']) ?>">
        <?= e($t['tab']) ?>
        <span class="infra-tab-line absolute inset-x-4 bottom-0 h-[2px] bg-brand <?= $i === 0 ? '' : 'hidden' ?>"></span>
      </button>
    <?php endforeach; ?>
  </div>
</div>

<div>
  <?php foreach ($UNITS as $ui => $u):
      $items = [];
      foreach ($u['photos'] as [$src, $caption]) {
          $items[] = ['src' => url($src), 'caption' => $caption];
      }
  ?>
    <section class="section <?= $ui % 2 ? 'bg-paper' : 'bg-white' ?>" data-infra-unit="<?= e($u['id']) ?>" data-testid="infra-<?= e($u['id']) ?>" data-lightbox-group='<?= e(json_encode($items)) ?>'>
      <div class="container-x">
        <?= render_section_head(['title' => $u['title']]) ?>
        <p class="mt-6 flex max-w-2xl items-start gap-3 text-sm text-ink/70">
          <?= icon('map-pin', 'mt-0.5 h-4 w-4 shrink-0 text-brand') ?> <?= e($u['address']) ?>
        </p>
        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($u['photos'] as $i => [$src, $caption]):
              $wide = count($u['photos']) === 1;
              $fname = basename($src);
          ?>
            <div class="<?= $wide ? 'sm:col-span-2' : '' ?>" data-reveal style="--delay:<?= ($i % 3) * 0.06 ?>s">
              <button type="button" data-lightbox-index="<?= $i ?>" class="group block w-full text-left" data-testid="infra-photo-<?= e($fname) ?>">
                <div class="relative overflow-hidden bg-ink <?= $wide ? 'aspect-[16/9]' : 'aspect-[4/3]' ?>">
                  <img src="<?= e(url($src)) ?>" alt="<?= e($caption) ?>" loading="lazy" class="h-full w-full object-cover transition-transform duration-[900ms] ease-out group-hover:scale-105" />
                  <span class="absolute right-3 top-3 inline-flex h-9 w-9 items-center justify-center bg-white text-ink opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <?= icon('maximize-2', 'h-4 w-4') ?>
                  </span>
                </div>
              </button>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
</div>

<?= render_cta_band() ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
