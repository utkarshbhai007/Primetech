<?php
// 18 Featured Clients Wall (3 Lines x 6 Columns)
$wallLogos = [
    // Line 1
    ['src' => 'images/partners/astral.jpg', 'name' => 'Astral'],
    ['src' => 'images/logoss/primary-logo480x320.png', 'name' => 'BirlaNu / HIL'],
    ['src' => 'images/partners/captain.png', 'name' => 'Captain'],
    ['src' => 'images/logoss/logo-new.png', 'name' => 'CENTURYPLY'],
    ['src' => 'images/partners/duke.jpg', 'name' => 'Duke'],
    ['src' => 'images/logoss/logo (1).svg', 'name' => 'GREENPLY'],

    // Line 2
    ['src' => 'images/logoss/logo.png.webp', 'name' => 'INDOWUD'],
    ['src' => 'images/partners/kkalpana.jpg', 'name' => 'KALPANA'],
    ['src' => 'images/logoss/logo (2).svg', 'name' => 'LAPP'],
    ['src' => 'images/partners/ori-plast.png', 'name' => 'Ori-Plast'],
    ['src' => 'images/partners/patton.jpg', 'name' => 'Patton'],
    ['src' => 'images/partners/polycab.jpg', 'name' => 'Polycab'],

    // Line 3
    ['src' => 'images/partners/prince.png', 'name' => 'Prince Piping Systems'],
    ['src' => 'images/logoss/roca-logo.svg', 'name' => 'ROCA'],
    ['src' => 'images/sintex-logo.png', 'name' => 'SINTEX'],
    ['src' => 'images/partners/sudharkar.jpg', 'name' => 'Sudhakar Pipes & Fittings'],
    ['src' => 'images/logoss/logo.png', 'name' => 'SUPREME'],
    ['src' => 'images/logoss/ultratech-cement-logo.png', 'name' => 'ULTRATECH CEMENT'],
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
                <!-- Left Nav Arrow Button -->
                <button type="button" class="slider-side-btn slider-btn-prev" aria-label="Previous Clients" title="Previous">
                    <i class="fa fa-chevron-left"></i>
                </button>

                <!-- Left Soft Edge Mask -->
                <div class="slider-fade-mask slider-fade-left"></div>

                <!-- Owl Carousel Track -->
                <div class="owl-carousel client-owl-carousel">
                    <?php foreach ($sliderLogos as $client): ?>
                        <div class="item">
                            <div class="client-slider-pill">
                                <div class="client-card-inner">
                                    <img src="<?php echo $GLBHost . htmlspecialchars($client['src']); ?>" alt="<?php echo htmlspecialchars($client['name']); ?>" class="img-responsive" title="<?php echo htmlspecialchars($client['name']); ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Right Soft Edge Mask -->
                <div class="slider-fade-mask slider-fade-right"></div>

                <!-- Right Nav Arrow Button -->
                <button type="button" class="slider-side-btn slider-btn-next" aria-label="Next Clients" title="Next">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<style>
/* Client Slider Distinct Showcase Ribbon Styles */
.client-slider-container {
    margin-top: 45px;
    position: relative;
}
.slider-header-bar {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    margin-bottom: 20px;
}
.slider-header-line {
    flex: 1;
    height: 1px;
    background: linear-gradient(to right, transparent, #cbd5e1, transparent);
}
.slider-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    padding: 6px 18px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #475569;
    box-shadow: 0 2px 6px rgba(0,0,0,0.03);
}
.badge-dot {
    width: 6px;
    height: 6px;
    background: #ad171e;
    border-radius: 50%;
    display: inline-block;
}
.slider-ribbon-box {
    position: relative;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    padding: 16px 54px;
    box-shadow: 0 6px 22px rgba(0, 0, 0, 0.04);
}
.slider-side-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    color: #334155;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    outline: none;
    padding: 0;
}
.slider-side-btn:hover {
    background: #ad171e;
    border-color: #ad171e;
    color: #ffffff;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 16px rgba(173, 23, 30, 0.32);
}
.slider-btn-prev {
    left: 10px;
}
.slider-btn-next {
    right: 10px;
}
.slider-fade-mask {
    position: absolute;
    top: 10px;
    bottom: 10px;
    width: 45px;
    z-index: 5;
    pointer-events: none;
}
.slider-fade-left {
    left: 50px;
    background: linear-gradient(to right, #ffffff, rgba(255, 255, 255, 0));
}
.slider-fade-right {
    right: 50px;
    background: linear-gradient(to left, #ffffff, rgba(255, 255, 255, 0));
}
.client-owl-carousel .item {
    padding: 4px 2px;
}
.client-slider-pill {
    background: #f8fafc !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 12px !important;
    height: 88px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 10px 14px !important;
    transition: all 0.3s ease !important;
    box-sizing: border-box !important;
}
.client-slider-pill:hover {
    background: #ffffff !important;
    border-color: #ad171e !important;
    transform: translateY(-3px) !important;
    box-shadow: 0 8px 18px rgba(173, 23, 30, 0.12) !important;
}
.client-slider-pill .client-card-inner {
    width: 100% !important;
    height: 100% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}
.client-slider-pill img {
    max-width: 86% !important;
    max-height: 48px !important;
    width: auto !important;
    height: auto !important;
    object-fit: contain !important;
    filter: grayscale(18%) contrast(102%) !important;
    transition: all 0.3s ease !important;
    margin: auto !important;
    display: block !important;
}
.client-slider-pill:hover img {
    filter: grayscale(0%) contrast(100%) !important;
    transform: scale(1.08) !important;
}

/* Fallback while Owl loads */
.client-owl-carousel:not(.owl-loaded) {
    display: flex !important;
    overflow: hidden !important;
    gap: 16px !important;
    flex-wrap: nowrap !important;
}
.client-owl-carousel:not(.owl-loaded) .item {
    flex: 0 0 160px !important;
}

@media (max-width: 767px) {
    .slider-ribbon-box {
        padding: 10px 42px;
        border-radius: 14px;
    }
    .slider-side-btn {
        width: 32px;
        height: 32px;
        font-size: 12px;
    }
    .slider-btn-prev {
        left: 6px;
    }
    .slider-btn-next {
        right: 6px;
    }
    .slider-fade-left {
        left: 40px;
        width: 25px;
    }
    .slider-fade-right {
        right: 40px;
        width: 25px;
    }
    .client-slider-pill {
        height: 72px !important;
        padding: 6px 10px !important;
        border-radius: 10px !important;
    }
    .client-slider-pill img {
        max-height: 36px !important;
    }
    .slider-badge {
        font-size: 10px;
        padding: 5px 12px;
    }
}
</style>

<script>
$(document).ready(function () {
    var $carousel = $('.client-owl-carousel');
    
    if (typeof $.fn.owlCarousel === 'function') {
        $carousel.owlCarousel({
            loop: true,
            margin: 16,
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
                1200: { items: 6, margin: 16 }
            }
        });

        // Custom side buttons trigger
        $('.slider-btn-prev').on('click', function(e) {
            e.preventDefault();
            $carousel.trigger('prev.owl.carousel');
        });
        $('.slider-btn-next').on('click', function(e) {
            e.preventDefault();
            $carousel.trigger('next.owl.carousel');
        });
    }
});
</script>
