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
    </div>

    <!-- Loop Slider of Remaining Valued Clients Under Logo Wall -->
    <div class="client-slider-wrapper">
        <div class="client-marquee">
            <div class="client-marquee-track">
                <?php foreach ($sliderLogos as $client): ?>
                    <div class="client-slider-card">
                        <div class="client-card-inner">
                            <img src="<?php echo $GLBHost . htmlspecialchars($client['src']); ?>" alt="<?php echo htmlspecialchars($client['name']); ?>" class="img-responsive" title="<?php echo htmlspecialchars($client['name']); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Duplicate for continuous infinite marquee loop -->
                <?php foreach ($sliderLogos as $client): ?>
                    <div class="client-slider-card" aria-hidden="true">
                        <div class="client-card-inner">
                            <img src="<?php echo $GLBHost . htmlspecialchars($client['src']); ?>" alt="<?php echo htmlspecialchars($client['name']); ?>" class="img-responsive" title="<?php echo htmlspecialchars($client['name']); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
