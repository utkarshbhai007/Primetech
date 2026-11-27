<?php
/**
 * Reusable UI component renderers matching the React site components.
 */

function render_btn(array $opts): string
{
    $to = $opts['to'] ?? null;
    $href = $opts['href'] ?? null;
    $label = $opts['label'] ?? '';
    $variant = $opts['variant'] ?? 'primary';
    $class = $opts['class'] ?? '';
    $magnetic = $opts['magnetic'] ?? true;
    $testid = $opts['testid'] ?? null;
    $icon = $opts['icon'] ?? true;
    $download = !empty($opts['download']);
    $target = $opts['target'] ?? null;
    $rel = $opts['rel'] ?? null;

    $styles = [
        'primary' => 'border border-transparent bg-brand text-white hover:bg-brand-dark',
        'dark' => 'border border-transparent bg-ink text-white hover:bg-brand',
        'light' => 'border border-transparent bg-white text-ink hover:bg-brand hover:text-white',
        'outline-light' => 'border border-white/35 text-white hover:border-white hover:bg-white hover:text-ink',
        'outline-dark' => 'border border-ink/25 text-ink hover:border-ink hover:bg-ink hover:text-white',
    ];

    $cls = 'group relative inline-flex items-center justify-center gap-3 px-6 py-4 text-sm font-semibold tracking-wide transition-colors duration-300 ' . ($styles[$variant] ?? $styles['primary']) . ' ' . $class;
    $linkUrl = $to ? url($to) : url($href ?? '#');

    $inner = '<span>' . $label . '</span>';
    if ($icon) {
        $inner .= '<span class="relative inline-flex h-4 w-4 overflow-hidden">'
            . icon('arrow-up-right', 'absolute h-4 w-4 transition-transform duration-300 ease-out group-hover:-translate-y-4 group-hover:translate-x-4')
            . icon('arrow-up-right', 'absolute h-4 w-4 -translate-x-4 translate-y-4 transition-transform duration-300 ease-out group-hover:translate-x-0 group-hover:translate-y-0')
            . '</span>';
    }

    $attrs = 'href="' . e($linkUrl) . '" class="' . e(trim($cls)) . '"';
    if ($testid) $attrs .= ' data-testid="' . e($testid) . '"';
    if ($download) $attrs .= ' download';
    if ($target) $attrs .= ' target="' . e($target) . '"';
    if ($rel) $attrs .= ' rel="' . e($rel) . '"';

    $el = '<a ' . $attrs . '>' . $inner . '</a>';
    if ($magnetic) {
        return '<span class="inline-block" data-magnetic>' . $el . '</span>';
    }
    return $el;
}

function render_arrow_link(string $to, string $label, string $class = '', ?string $testid = null): string
{
    $attrs = 'href="' . e(url($to)) . '" class="group inline-flex items-center gap-2 text-sm font-semibold ' . e($class) . '"';
    if ($testid) $attrs .= ' data-testid="' . e($testid) . '"';
    return '<a ' . $attrs . '>'
        . '<span class="link-u pb-1">' . e($label) . '</span>'
        . icon('arrow-up-right', 'h-4 w-4 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5')
        . '</a>';
}

function render_mask_lines(array $lines, array $opts = []): string
{
    $as = $opts['as'] ?? 'h2';
    $class = $opts['class'] ?? '';
    $lineClass = $opts['lineClass'] ?? '';
    $delay = $opts['delay'] ?? 0;
    $stagger = $opts['stagger'] ?? 0.11;
    $onMount = !empty($opts['onMount']);
    $accent = $opts['accent'] ?? -1;

    $html = '<' . $as . ' class="' . e($class) . '" data-mask-lines' . ($onMount ? ' data-mount="1"' : '') . '>';
    foreach ($lines as $idx => $l) {
        $d = $delay + $idx * $stagger;
        $cls = 'block mask-line ' . $lineClass . ($idx === $accent ? ' text-brand' : '');
        $html .= '<span class="block overflow-hidden pb-[0.22em] -mb-[0.14em]">'
            . '<span class="' . e(trim($cls)) . '" style="--delay:' . $d . 's">' . e($l) . '</span>'
            . '</span>';
    }
    $html .= '</' . $as . '>';
    return $html;
}

function render_clip_image(string $src, string $alt, array $opts = []): string
{
    $class = $opts['class'] ?? '';
    $imgClass = $opts['imgClass'] ?? '';
    $delay = $opts['delay'] ?? 0;
    $horizontal = !empty($opts['horizontal']);
    $eager = !empty($opts['eager']);
    $testid = $opts['testid'] ?? null;

    $attrs = 'class="' . e($class) . '" data-clip-image' . ($horizontal ? ' data-horizontal="1"' : '') . ' style="--delay:' . $delay . 's"';
    if ($testid) $attrs .= ' data-testid="' . e($testid) . '"';

    return '<div ' . $attrs . '>'
        . '<div class="h-full w-full overflow-hidden clip-inner">'
        . '<img src="' . e(url($src)) . '" alt="' . e($alt) . '" loading="' . ($eager ? 'eager' : 'lazy') . '" decoding="async" class="h-full w-full object-cover clip-img ' . e($imgClass) . '" />'
        . '</div></div>';
}

function render_page_hero(array $opts): string
{
    $crumbs = $opts['crumbs'] ?? [];
    $eyebrow = $opts['eyebrow'] ?? null;
    $lines = $opts['lines'] ?? [];
    $intro = $opts['intro'] ?? null;
    $image = $opts['image'] ?? null;
    $children = $opts['children'] ?? '';
    $testid = $opts['testid'] ?? 'page-hero';

    $html = '<section class="grain relative overflow-hidden bg-ink pb-16 pt-32 text-white sm:pb-20 sm:pt-40 lg:pb-28 lg:pt-48" data-testid="' . e($testid) . '">';
    $html .= '<div class="blueprint absolute inset-0"></div>';
    if ($image) {
        $html .= '<div class="absolute inset-0 hero-bg-fade">'
            . '<img src="' . e(url($image)) . '" alt="" class="h-full w-full object-cover" />'
            . '<div class="absolute inset-0 bg-gradient-to-r from-ink via-ink/80 to-ink/30"></div>'
            . '</div>';
    }
    $html .= '<div class="absolute -right-24 top-0 hidden h-full w-[38%] bg-brand/90 [clip-path:polygon(40%_0,100%_0,100%_100%,85%_100%)] lg:block" aria-hidden="true"></div>';
    $html .= '<div class="container-x relative">';
    $html .= '<nav aria-label="Breadcrumb" class="mb-10 flex flex-wrap items-center gap-1.5 text-xs text-white/60" data-testid="breadcrumb">';
    $html .= '<a href="' . e(url('/')) . '" class="hover:text-white">Home</a>';
    foreach ($crumbs as [$to, $l]) {
        $html .= '<span class="inline-flex items-center gap-1.5">' . icon('chevron-right', 'h-3 w-3');
        if ($to) {
            $html .= '<a href="' . e(url($to)) . '" class="hover:text-white">' . e($l) . '</a>';
        } else {
            $html .= '<span class="text-white/90">' . e($l) . '</span>';
        }
        $html .= '</span>';
    }
    $html .= '</nav>';
    if ($eyebrow) {
        $html .= '<p class="eyebrow mb-6 text-white/70">' . e($eyebrow) . '</p>';
    }
    $html .= render_mask_lines($lines, ['as' => 'h1', 'onMount' => true, 'delay' => 0.15, 'class' => 't-h1 max-w-5xl', 'accent' => count($lines) - 1]);
    if ($intro) {
        $html .= '<p class="t-lead mt-8 max-w-2xl text-white/75" data-reveal style="--delay:0.35s">' . e($intro) . '</p>';
    }
    $html .= $children;
    $html .= '</div></section>';
    return $html;
}

function render_section_head(array $opts): string
{
    $eyebrow = $opts['eyebrow'] ?? null;
    $title = $opts['title'] ?? '';
    $intro = $opts['intro'] ?? null;
    $light = !empty($opts['light']);
    $class = $opts['class'] ?? '';
    $align = $opts['align'] ?? 'left';

    $lines = is_array($title) ? $title : [$title];
    $html = '<div class="' . ($align === 'split' ? 'grid gap-8 lg:grid-cols-12 lg:items-end ' : '') . e($class) . '">';
    $html .= '<div class="' . ($align === 'split' ? 'lg:col-span-7' : '') . '">';
    if ($eyebrow) {
        $html .= '<span class="eyebrow mb-6 ' . ($light ? 'text-white/70' : 'text-brand') . '">' . e($eyebrow) . '</span>';
    }
    $html .= render_mask_lines($lines, ['class' => 't-h2 ' . ($light ? 'text-white' : 'text-ink')]);
    $html .= '</div>';
    if ($intro) {
        $html .= '<p class="t-lead ' . ($align === 'split' ? 'lg:col-span-5' : 'mt-6 max-w-2xl') . ' ' . ($light ? 'text-white/70' : 'text-ink/65') . '" data-reveal style="--delay:0.2s">' . e($intro) . '</p>';
    }
    $html .= '</div>';
    return $html;
}

function render_product_tile(array $p, int $index, array $opts = []): string
{
    $large = !empty($opts['large']);
    $dark = !empty($opts['dark']);
    $wide = !empty($opts['wide']);

    $imgWrapCls = $large
        ? 'aspect-[4/3] lg:aspect-auto lg:flex-1 lg:min-h-[420px]'
        : ($wide ? 'aspect-[4/3] lg:aspect-[24/9]' : 'aspect-[4/3]');

    $html = '<a href="' . e(url('/products/' . $p['slug'])) . '" class="group relative flex h-full flex-col overflow-hidden ' . ($dark ? 'bg-ink-900 text-white' : 'bg-paper text-ink') . '" data-testid="product-tile-' . e($p['slug']) . '">';
    $html .= '<div class="relative overflow-hidden ' . $imgWrapCls . '">';
    $html .= '<div class="' . ($dark ? 'blueprint' : 'blueprint-light') . ' absolute inset-0 transition-opacity duration-500 group-hover:opacity-60"></div>';
    $html .= '<div class="absolute bottom-[9%] left-1/2 h-6 w-[55%] -translate-x-1/2 rounded-[50%] bg-black/20 blur-xl transition-all duration-700 group-hover:w-[62%]"></div>';
    $html .= '<img src="' . e(url($p['image'])) . '" alt="' . e($p['name']) . '" loading="lazy" decoding="async" class="absolute inset-0 m-auto h-[76%] w-[80%] object-contain transition-transform duration-[900ms] ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-[1.07]" />';
    $html .= '<span class="absolute left-5 top-5 text-[11px] font-semibold uppercase tracking-[0.22em] ' . ($dark ? 'text-white/60' : 'text-ink/55') . '">' . sprintf('%02d', $index + 1) . '</span>';
    $html .= '<span class="absolute right-5 top-5 inline-flex h-10 w-10 items-center justify-center bg-brand text-white opacity-0 transition-all duration-300 group-hover:opacity-100">' . icon('arrow-up-right', 'h-4 w-4 transition-transform duration-300 group-hover:rotate-45') . '</span>';
    $html .= '</div>';

    $html .= '<div class="relative border-t p-6 sm:p-7 ' . ($dark ? 'border-white/10' : 'border-ink/10') . '">';
    $html .= '<span class="absolute left-0 top-[-1px] h-px w-0 bg-brand transition-all duration-500 group-hover:w-full"></span>';
    $html .= '<p class="text-[11px] font-semibold uppercase tracking-[0.2em] ' . ($dark ? 'text-white/55' : 'text-brand') . '">' . e($p['tag']) . '</p>';
    $html .= '<h3 class="mt-2 font-display font-semibold tracking-tight ' . ($large ? 'text-2xl sm:text-3xl' : 'text-xl sm:text-[22px]') . '">' . e($p['name']) . '</h3>';
    $html .= '<p class="mt-3 text-sm leading-relaxed ' . ($dark ? 'text-white/65' : 'text-ink/65') . ($large ? '' : ' line-clamp-2') . '">' . e($p['short']) . '</p>';
    $html .= '<span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold"><span class="link-u pb-0.5 group-hover:[background-size:100%_1px]">Explore Product</span>' . icon('arrow-up-right', 'h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5') . '</span>';
    $html .= '<span class="sr-only">' . e(categoryName($p['category'])) . '</span>';
    $html .= '</div></a>';
    return $html;
}

function render_cta_band(?array $product = null): string
{
    global $CONTACT;
    $lines = $product
        ? ['Talk to us about the', $product['name'] . '.']
        : ["Let's discuss your", 'machinery requirements.'];
    $to = $product ? '/contact?product=' . urlencode($product['slug']) : '/contact';

    $html = '<section class="relative overflow-hidden bg-brand text-white" data-testid="cta-band">';
    $html .= '<div class="absolute inset-0 opacity-[0.12] [background-image:repeating-linear-gradient(115deg,#fff_0_1px,transparent_1px_22px)]" aria-hidden="true"></div>';
    $html .= '<div class="container-x relative grid gap-12 py-20 sm:py-28 lg:grid-cols-12 lg:items-end lg:py-32">';
    $html .= '<div class="lg:col-span-8"><p class="eyebrow mb-6 text-white/80">Enquiry</p>' . render_mask_lines($lines, ['class' => 't-h1']) . '</div>';
    $html .= '<div class="flex flex-col gap-6 lg:col-span-4" data-reveal style="--delay:0.2s">';
    $html .= '<p class="text-base leading-relaxed text-white/85">For enquiry regarding our product(s), share your process, material and capacity needs — our engineers will get back to you.</p>';
    $html .= '<div class="flex flex-wrap gap-3">';
    $html .= render_btn(['to' => $to, 'label' => 'Send an Enquiry', 'variant' => 'light', 'testid' => 'cta-enquire']);
    $html .= '</div></div></div></section>';
    return $html;
}

function render_accordion_list(array $items, bool $light = false, string $testid = 'accordion'): string
{
    $border = $light ? 'border-white/15' : 'border-ink/10';
    $html = '<div class="border-t ' . $border . '" data-testid="' . e($testid) . '" data-accordion>';
    foreach ($items as $i => $it) {
        $isOpen = $i === 0;
        $btnCls = $isOpen
            ? 'border-brand bg-brand text-white'
            : ($light ? 'border-white/25' : 'border-ink/20');

        $html .= '<div class="border-b ' . $border . '" data-accordion-item>';
        $html .= '<button type="button" aria-expanded="' . ($isOpen ? 'true' : 'false') . '" class="group flex w-full items-center justify-between gap-6 py-6 text-left" data-accordion-trigger data-testid="' . e($testid . '-item-' . $i) . '">';
        $html .= '<span class="flex items-baseline gap-4"><span class="text-xs font-semibold tabular-nums text-brand">' . sprintf('%02d', $i + 1) . '</span><span class="font-display text-lg font-semibold sm:text-xl">' . e($it['k']) . '</span></span>';
        $html .= '<span class="inline-flex h-9 w-9 shrink-0 items-center justify-center border transition-colors duration-300 ' . $btnCls . '" data-accordion-icon-wrap>' . icon('plus', 'h-4 w-4 transition-transform duration-300 ' . ($isOpen ? 'rotate-45' : '')) . '</span>';
        $html .= '</button>';
        $html .= '<div class="overflow-hidden" style="' . ($isOpen ? 'height:auto;opacity:1' : 'height:0px;opacity:0') . '" data-accordion-panel>';
        $html .= '<div class="pb-7 pl-9 text-[15px] leading-relaxed ' . ($light ? 'text-white/70' : 'text-ink/70') . '">';
        if (is_array($it['v'])) {
            $html .= '<ul class="space-y-2">';
            foreach ($it['v'] as $x) {
                $html .= '<li>' . e($x) . '</li>';
            }
            $html .= '</ul>';
        } else {
            $html .= '<p>' . e($it['v']) . '</p>';
        }
        $html .= '</div></div></div>';
    }
    $html .= '</div>';
    return $html;
}

function render_spec_table(array $specs, string $testid = 'spec-table'): string
{
    $html = '<div data-testid="' . e($testid) . '">';
    $html .= '<div class="relative overflow-x-auto border border-ink/10" data-lenis-prevent-horizontal>';
    $html .= '<table class="spec-table w-full min-w-[520px] border-collapse"><thead><tr>';
    foreach ($specs['columns'] as $i => $c) {
        $html .= '<th scope="col" class="' . ($i === 0 ? 'sticky left-0 z-10 bg-ink' : '') . '">' . e($c) . '</th>';
    }
    $html .= '</tr></thead><tbody>';
    foreach ($specs['rows'] as $r) {
        $html .= '<tr>';
        foreach ($r as $i => $cell) {
            $cls = $i === 0 ? 'sticky left-0 z-10 bg-inherit font-semibold text-ink' : 'text-ink/75';
            $style = $i === 0 ? ' style="background-color:inherit"' : '';
            $html .= '<td class="' . $cls . '"' . $style . '>' . e($cell) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</tbody></table></div>';
    if (count($specs['columns']) > 3) {
        $html .= '<p class="mt-3 text-xs text-ink/55 sm:hidden">Swipe the table sideways to see all columns →</p>';
    }
    $html .= '</div>';
    return $html;
}

function render_stage_frame(string $innerHtml, string $class = '', array $labels = [], string $labelPrefix = ''): string
{
    $html = '<div class="relative overflow-hidden bg-ink ' . e($class) . '">';
    $html .= '<div class="blueprint absolute inset-0"></div>';
    $html .= '<div class="absolute left-1/2 top-[46%] h-[70%] w-[80%] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[radial-gradient(closest-side,rgba(255,255,255,0.16),transparent)]"></div>';
    $html .= '<div class="absolute bottom-[10%] left-1/2 h-10 w-[60%] -translate-x-1/2 rounded-[50%] bg-black/70 blur-xl"></div>';
    foreach (['left-4 top-4', 'right-4 top-4', 'bottom-4 left-4', 'bottom-4 right-4'] as $pos) {
        $html .= '<span class="pointer-events-none absolute h-4 w-4 ' . $pos . '" aria-hidden="true">'
            . '<span class="absolute left-1/2 top-0 h-full w-px -translate-x-1/2 bg-white/40"></span>'
            . '<span class="absolute left-0 top-1/2 h-px w-full -translate-y-1/2 bg-white/40"></span>'
            . '</span>';
    }
    if (!empty($labels)) {
        $id0 = $labelPrefix ? ' id="' . e($labelPrefix . '-left') . '"' : '';
        $id1 = $labelPrefix ? ' id="' . e($labelPrefix . '-right') . '"' : '';
        $html .= '<div class="pointer-events-none absolute inset-x-5 top-5 flex justify-between pl-6 pr-6 text-[10px] font-medium uppercase tracking-[0.24em] text-white/60">'
            . '<span' . $id0 . '>' . e($labels[0] ?? '') . '</span>'
            . '<span' . $id1 . ' class="hidden text-right sm:inline">' . e($labels[1] ?? '') . '</span>'
            . '</div>';
    }
    $html .= $innerHtml;
    $html .= '</div>';
    return $html;
}

function render_marquee(string $innerHtml, int $duration = 60, bool $reverse = false, string $class = ''): string
{
    return '<div class="marquee relative flex overflow-hidden ' . e($class) . '">'
        . '<div class="marquee-track flex shrink-0 ' . ($reverse ? 'reverse' : '') . '" style="--dur:' . $duration . 's">'
        . '<div class="flex shrink-0 items-center">' . $innerHtml . '</div>'
        . '<div class="flex shrink-0 items-center" aria-hidden="true">' . $innerHtml . '</div>'
        . '</div></div>';
}

function render_application_icons(bool $compact = false): string
{
    global $APPLICATION_ICONS;
    $gridCls = $compact
        ? 'grid grid-cols-4 gap-2.5 sm:grid-cols-8'
        : 'grid grid-cols-2 gap-3 sm:grid-cols-4 lg:grid-cols-8';
    $html = '<div class="' . $gridCls . '">';
    foreach ($APPLICATION_ICONS as $i => $item) {
        $html .= '<div class="group flex flex-col items-center justify-center gap-2 border border-ink/10 bg-paper px-2 py-4 text-center transition-colors duration-300 hover:border-brand hover:bg-white" title="' . e($item['label']) . '" data-reveal style="--delay:' . ($i * 0.04) . 's">'
            . icon($item['icon'], ($compact ? 'h-5 w-5' : 'h-6 w-6') . ' text-brand transition-transform duration-300 group-hover:scale-110', '1.6')
            . '<span class="text-[11px] font-medium leading-tight text-ink/75">' . e($item['label']) . '</span>'
            . '</div>';
    }
    $html .= '</div>';
    return $html;
}
