<?php
// 18 Featured Clients Wall (3 Lines x 6 Columns)
$wallLogos = [
    // Line 1
    ['src' => 'images/partners/astral.jpg', 'name' => 'Astral'],
    ['src' => 'images/logoss/primary-logo480x320.png', 'name' => 'BirlaNu / HIL'],
    ['src' => 'images/partners/caption.jpg', 'name' => 'Captain'],
    ['src' => 'images/partners/duke.jpg', 'name' => 'Duke'],
    ['src' => 'images/partners/ori-plast.png', 'name' => 'Ori-Plast'],
    ['src' => 'images/partners/patton.jpg', 'name' => 'Patton'],

    // Line 2
    ['src' => 'images/partners/polycab.jpg', 'name' => 'Polycab'],
    ['src' => 'images/partners/prince.png', 'name' => 'Prince Piping Systems'],
    ['src' => 'images/logoss/roca-logo.svg', 'name' => 'ROCA'],
    ['src' => 'images/partners/sudharkar.jpg', 'name' => 'Sudhakar Pipes & Fittings'],
    ['src' => 'images/logoss/logo.png', 'name' => 'SUPREME'],
    ['src' => 'images/logoss/ultratech-cement-logo.png', 'name' => 'ULTRATECH CEMENT'],

    // Line 3
    ['src' => 'images/logoss/logo-new.png', 'name' => 'CENTURYPLY'],
    ['src' => 'images/logoss/logo (1).svg', 'name' => 'GREENPLY'],
    ['src' => 'images/logoss/logo.png.webp', 'name' => 'INDOWUD'],
    ['src' => 'images/partners/kkalpana.jpg', 'name' => 'KALPANA'],
    ['src' => 'images/logoss/logo (2).svg', 'name' => 'LAPP'],
    ['src' => 'images/partners/sintex.jpg', 'name' => 'SINTEX'],
];

// 36 Remaining Valued Clients in Loop Slider (Alphabetical Order A-Z)
$sliderLogos = [
    ['src' => 'images/partners/alok.jpg', 'name' => 'Alok Industries'],
    ['src' => 'images/partners/alstone.jpg', 'name' => 'ALSTONE'],
    ['src' => 'images/partners/anchor.jpg', 'name' => 'Anchor by Panasonic'],
    ['src' => 'images/partners/basil.jpg', 'name' => 'BASIL'],
    ['src' => 'images/partners/deep-masterbatches.jpg', 'name' => 'Deep Masterbatches'],
    ['src' => 'images/partners/doms.jpg', 'name' => 'DOMS'],
    ['src' => 'images/partners/extrusion-technik.jpg', 'name' => 'EXTRUSION TECHNIK USA INC.'],
    ['src' => 'images/partners/falcon.jpg', 'name' => 'Falcon'],
    ['src' => 'images/partners/fusion.png', 'name' => 'Fusion'],
    ['src' => 'images/partners/kelvin.gif', 'name' => 'Kelvin'],
    ['src' => 'images/partners/kemron.jpg', 'name' => 'KEMRON'],
    ['src' => 'images/partners/kisan.jpg', 'name' => 'Kisan'],
    ['src' => 'images/partners/lifeline.jpg', 'name' => 'LIFELINE'],
    ['src' => 'images/partners/marvel.png', 'name' => 'Marvel'],
    ['src' => 'images/partners/meet-marketing.jpg', 'name' => 'MEET MARKETING'],
    ['src' => 'images/partners/milacron.jpg', 'name' => 'Milacron'],
    ['src' => 'images/partners/miraj.png', 'name' => 'Miraj'],
    ['src' => 'images/partners/padmavati.jpg', 'name' => 'Padmavati'],
    ['src' => 'images/partners/patkar-extrusions.jpg', 'name' => 'PATKAR EXTRUSIONS LTD.'],
    ['src' => 'images/partners/poly-colouraid.png', 'name' => 'Poly-Colouraid'],
    ['src' => 'images/partners/rajiv.jpg', 'name' => 'Rajiv'],
    ['src' => 'images/partners/rajoo-bausano.jpg', 'name' => 'Rajoo Bausano'],
    ['src' => 'images/partners/ramco-gropu.gif', 'name' => 'RAMCO GROUP'],
    ['src' => 'images/logoss/100626054039aasa.webp', 'name' => 'REALPLAST'],
    ['src' => 'images/logoss/rfl.svg', 'name' => 'RFL'],
    ['src' => 'images/partners/rollepaal-logo.jpg', 'name' => 'Rollepaal'],
    ['src' => 'images/partners/royal-group.jpg', 'name' => 'Royal Group'],
    ['src' => 'images/partners/shakti.png', 'name' => 'Shakti'],
    ['src' => 'images/partners/shyam-plastic.png', 'name' => 'Shyam Plastic Industries'],
    ['src' => 'images/partners/kipper.jpg', 'name' => 'Skipper Pipes'],
    ['src' => 'images/partners/spl.jpg', 'name' => 'SPL'],
    ['src' => 'images/partners/steer.jpg', 'name' => 'Steer'],
    ['src' => 'images/partners/v-guard.png', 'name' => 'V-Guard'],
    ['src' => 'images/partners/vishal-plastocab.jpg', 'name' => 'Vishal Plastocab'],
    ['src' => 'images/partners/welmon.jpg', 'name' => 'Welmon'],
    ['src' => 'images/partners/windsor-logo.jpg', 'name' => 'Windsor']
];
?>
<section id="client-logos" class="client-logos-section">
    <div class="container">
        <div class="client-logos-header">
            <h2 class="title"><span>Our Valued</span> Clients</h2>
            <p class="client-wall-sub">Trusted by industry leaders, infrastructure pioneers, and global compounding specialists</p>
        </div>
        
        <!-- 18 Featured Clients Wall (3 Lines x 6 Columns) -->
        <div class="client-wall-wrapper">
            <div class="client-wall-grid">
                <?php foreach ($wallLogos as $client): ?>
                    <div class="client-card">
                        <div class="client-card-inner">
                            <img src="<?php echo $GLBHost . htmlspecialchars($client['src']); ?>" alt="<?php echo htmlspecialchars($client['name']); ?>" class="img-responsive" title="<?php echo htmlspecialchars($client['name']); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Infinite Loop Slider of Remaining 36 Valued Clients -->
        <div class="client-slider-container">
            <div class="owl-carousel client-owl-carousel">
                <?php foreach ($sliderLogos as $client): ?>
                    <div class="item">
                        <div class="client-slider-card">
                            <div class="client-card-inner">
                                <img src="<?php echo $GLBHost . htmlspecialchars($client['src']); ?>" alt="<?php echo htmlspecialchars($client['name']); ?>" class="img-responsive" title="<?php echo htmlspecialchars($client['name']); ?>">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
/* Scoped styles to ensure instant correct rendering regardless of browser cache */
.client-slider-container {
    margin-top: 35px;
    position: relative;
    padding: 0;
}
.client-owl-carousel .item {
    padding: 4px 2px;
}
.client-slider-card {
    background: #ffffff !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 14px !important;
    height: 105px !important;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 14px 18px !important;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
    position: relative !important;
    overflow: hidden !important;
    box-sizing: border-box !important;
}
.client-slider-card:hover {
    transform: translateY(-5px) !important;
    border-color: #ad171e !important;
    box-shadow: 0 12px 24px rgba(173, 23, 30, 0.12), 0 4px 12px rgba(0, 0, 0, 0.05) !important;
}
.client-slider-card .client-card-inner {
    width: 100% !important;
    height: 100% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}
.client-slider-card img {
    max-width: 86% !important;
    max-height: 56px !important;
    width: auto !important;
    height: auto !important;
    object-fit: contain !important;
    filter: grayscale(15%) contrast(102%) !important;
    transition: all 0.3s ease !important;
    margin: auto !important;
    display: block !important;
}
.client-slider-card:hover img {
    filter: grayscale(0%) contrast(100%) !important;
    transform: scale(1.08) !important;
}

/* Fallback while Owl loads to keep horizontal layout */
.client-owl-carousel:not(.owl-loaded) {
    display: flex !important;
    overflow: hidden !important;
    gap: 18px !important;
    flex-wrap: nowrap !important;
}
.client-owl-carousel:not(.owl-loaded) .item {
    flex: 0 0 175px !important;
}
</style>

<script>
$(document).ready(function () {
    function initClientSlider() {
        if (typeof $.fn.owlCarousel === 'function') {
            $('.client-owl-carousel').owlCarousel({
                loop: true,
                margin: 18,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplaySpeed: 700,
                autoplayHoverPause: true,
                smartSpeed: 700,
                responsive: {
                    0: { items: 2, margin: 10 },
                    480: { items: 3, margin: 12 },
                    768: { items: 4, margin: 14 },
                    992: { items: 5, margin: 16 },
                    1200: { items: 6, margin: 18 }
                }
            });
        }
    }
    initClientSlider();
});
</script>
