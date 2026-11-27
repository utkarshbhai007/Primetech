<?php
$pageTitle = 'Contact Us';
$pageDescription = 'Contact Primetech Industries, GIDC Vatva, Ahmedabad — phone, email and enquiry form.';
require_once __DIR__ . '/includes/header.php';

$preSlug = $_GET['product'] ?? '';
$preProduct = getProduct($preSlug);
$selectedProductName = $preProduct ? $preProduct['name'] : '';
?>

<?= render_page_hero([
    'crumbs' => [[null, 'Contact']],
    'lines' => ["Let's talk", 'machinery.'],
    'intro' => 'For enquiry regarding our product(s), please fill the form below.',
    'image' => '/assets/misc/the-company-pic.jpg',
    'testid' => 'contact-hero',
]) ?>

<section class="section bg-white" data-testid="contact-section">
  <div class="container-x grid gap-16 lg:grid-cols-12">
    <aside class="space-y-10 lg:col-span-4">
      <div data-reveal>
        <p class="mb-4 flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-brand">
          <?= icon('map-pin', 'h-3.5 w-3.5') ?> Address
        </p>
        <?php foreach ($CONTACT['units'] as $u): ?>
          <address class="mb-5 not-italic text-[15px] leading-relaxed text-ink/80">
            <strong class="block font-display text-ink"><?= e($u['name']) ?></strong>
            <?php foreach ($u['lines'] as $l): ?>
              <span class="block"><?= e($l) ?></span>
            <?php endforeach; ?>
          </address>
        <?php endforeach; ?>
      </div>
      <div data-reveal style="--delay:0.05s">
        <p class="mb-4 flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-brand">
          <?= icon('phone', 'h-3.5 w-3.5') ?> Phone — Mobile / Direct
        </p>
        <?php foreach ($CONTACT['phones'] as $p): ?>
          <a href="tel:<?= e($p) ?>" class="link-u block w-fit font-display text-xl font-semibold" data-testid="contact-phone-<?= e($p) ?>"><?= e($p) ?></a>
        <?php endforeach; ?>
      </div>
      <div data-reveal style="--delay:0.1s">
        <p class="mb-4 flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-brand">
          <?= icon('mail', 'h-3.5 w-3.5') ?> Email
        </p>
        <?php foreach (array_merge($CONTACT['emails'], [$CONTACT['marketingEmail']]) as $em): ?>
          <a href="mailto:<?= e($em) ?>" class="link-u block w-fit break-all text-[15px] text-ink/85" data-testid="contact-email-<?= e($em) ?>"><?= e($em) ?></a>
        <?php endforeach; ?>
      </div>
    </aside>

    <div class="lg:col-span-7 lg:col-start-6">
      <h2 class="t-h2 mb-10">Send an enquiry</h2>

      <div id="enquiry-success" class="hidden border border-ink/10 bg-paper p-10" data-testid="enquiry-success">
        <?= icon('check-circle-2', 'h-10 w-10 text-brand') ?>
        <h3 id="enquiry-success-heading" class="t-h3 mt-6">Thank you.</h3>
        <p class="mt-3 text-[15px] leading-relaxed text-ink/70">Your enquiry for <strong id="enquiry-success-product"></strong> has been received by Primetech Industries.</p>
        <button type="button" id="enquiry-new" class="link-u mt-8 pb-1 text-sm font-semibold" data-testid="enquiry-new">Send another enquiry</button>
      </div>

      <form id="enquiry-form" action="<?= e(url('/api/enquiries')) ?>" method="post" novalidate class="grid gap-8 sm:grid-cols-2" data-testid="enquiry-form">
        <label for="name" class="group block">
          <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-ink/60 transition-colors duration-300 group-focus-within:text-brand">Name <span class="text-brand">*</span></span>
          <input id="name" name="name" type="text" autocomplete="name" placeholder="Your full name" class="field" data-testid="enquiry-name" />
          <span class="hidden mt-2 block text-xs font-medium text-brand" data-error-for="name" data-testid="error-name"></span>
        </label>

        <label for="company" class="group block">
          <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-ink/60 transition-colors duration-300 group-focus-within:text-brand">Company</span>
          <input id="company" name="company" type="text" autocomplete="organization" placeholder="Company name" class="field" data-testid="enquiry-company" />
          <span class="hidden mt-2 block text-xs font-medium text-brand" data-error-for="company" data-testid="error-company"></span>
        </label>

        <label for="email" class="group block">
          <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-ink/60 transition-colors duration-300 group-focus-within:text-brand">Email <span class="text-brand">*</span></span>
          <input id="email" name="email" type="email" autocomplete="email" placeholder="name@company.com" class="field" data-testid="enquiry-email" />
          <span class="hidden mt-2 block text-xs font-medium text-brand" data-error-for="email" data-testid="error-email"></span>
        </label>

        <label for="phone" class="group block">
          <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-ink/60 transition-colors duration-300 group-focus-within:text-brand">Phone / Mobile <span class="text-brand">*</span></span>
          <input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="+91 ..." class="field" data-testid="enquiry-phone" />
          <span class="hidden mt-2 block text-xs font-medium text-brand" data-error-for="phone" data-testid="error-phone"></span>
        </label>

        <label for="country" class="group block">
          <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-ink/60 transition-colors duration-300 group-focus-within:text-brand">Country <span class="text-brand">*</span></span>
          <select id="country" name="country" class="field cursor-pointer" data-testid="enquiry-country">
            <option value="">Select Country</option>
            <?php foreach ($COUNTRIES as $c): ?>
              <option value="<?= e($c) ?>" <?= $c === 'India' ? 'selected' : '' ?>><?= e($c) ?></option>
            <?php endforeach; ?>
          </select>
          <span class="hidden mt-2 block text-xs font-medium text-brand" data-error-for="country" data-testid="error-country"></span>
        </label>

        <label for="product" class="group block">
          <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-ink/60 transition-colors duration-300 group-focus-within:text-brand">Product Interested In <span class="text-brand">*</span></span>
          <select id="product" name="product" class="field cursor-pointer" data-testid="enquiry-product">
            <option value="">Select Products</option>
            <?php foreach ($PRODUCTS as $p): ?>
              <option value="<?= e($p['name']) ?>" <?= $selectedProductName === $p['name'] ? 'selected' : '' ?>><?= e($p['name']) ?></option>
            <?php endforeach; ?>
            <option value="Other / Not sure">Other / Not sure</option>
          </select>
          <span class="hidden mt-2 block text-xs font-medium text-brand" data-error-for="product" data-testid="error-product"></span>
        </label>

        <div class="sm:col-span-2">
          <label for="message" class="group block">
            <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-ink/60 transition-colors duration-300 group-focus-within:text-brand">Message <span class="text-brand">*</span></span>
            <textarea id="message" name="message" rows="5" class="field resize-none" placeholder="Material, required output, application…" data-testid="enquiry-message"></textarea>
            <span class="hidden mt-2 block text-xs font-medium text-brand" data-error-for="message" data-testid="error-message"></span>
          </label>
        </div>

        <div class="flex flex-col gap-4 sm:col-span-2 sm:flex-row sm:items-center sm:justify-between">
          <p class="text-xs text-ink/55">Fields marked * are required.</p>
          <button type="submit" id="enquiry-submit" class="group inline-flex items-center justify-center gap-3 bg-brand px-8 py-4 text-sm font-semibold text-white transition-colors duration-300 hover:bg-brand-dark disabled:opacity-70" data-testid="enquiry-submit">
            <span id="enquiry-submit-idle" class="inline-flex items-center gap-3">
              Submit Enquiry <?= icon('arrow-up-right', 'h-4 w-4 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5') ?>
            </span>
            <span id="enquiry-submit-sending" class="hidden inline-flex items-center gap-3">
              <?= icon('loader-2', 'h-4 w-4 animate-spin') ?> Sending…
            </span>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<section class="relative h-[420px] bg-paper lg:h-[520px]" data-testid="contact-map">
  <iframe title="Primetech Industries location map" src="<?= e($CONTACT['map']) ?>" class="h-full w-full grayscale-[0.6]" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
  <span class="sr-only">© <?= date('Y') ?></span>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
