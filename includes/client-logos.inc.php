<?php
// 22 Valued Client Logos Wall (Curated Client Chart Room)
$clientLogos = [
    ['src' => 'images/logoss/100626054039aasa.webp', 'name' => 'Real Plast'],
    ['src' => 'images/logoss/logo (1).svg', 'name' => 'Greenply'],
    ['src' => 'images/logoss/logo (2).svg', 'name' => 'Lapp'],
    ['src' => 'images/logoss/logo-new.png', 'name' => 'CenturyPly'],
    ['src' => 'images/logoss/logo.png', 'name' => 'Supreme'],
    ['src' => 'images/logoss/logo.png.webp', 'name' => 'Indowud Design Technology'],
    ['src' => 'images/logoss/roca-logo.svg', 'name' => 'Roca'],
    ['src' => 'images/logoss/ultratech-cement-logo.png', 'name' => 'UltraTech Cement'],
    ['src' => 'images/logoss/website-logo-1.png', 'name' => 'Sintex'],
    ['src' => 'images/partners/alstone.jpg', 'name' => 'Alstone'],
    ['src' => 'images/partners/basil.jpg', 'name' => 'Basil'],
    ['src' => 'images/partners/doms.jpg', 'name' => 'DOMS'],
    ['src' => 'images/partners/extrusion-technik.jpg', 'name' => 'Extrusion Technik USA INC'],
    ['src' => 'images/partners/kkalpana.jpg', 'name' => 'Kalpna'],
    ['src' => 'images/partners/kandui.jpg', 'name' => 'Kandui Industries'],
    ['src' => 'images/partners/kemron.jpg', 'name' => 'Kemron'],
    ['src' => 'images/partners/lifeline.jpg', 'name' => 'Lifeline'],
    ['src' => 'images/partners/meet-marketing.jpg', 'name' => 'Meet Marketing'],
    ['src' => 'images/partners/ramco-gropu.gif', 'name' => 'Ramco Group'],
    ['src' => 'images/partners/spl.jpg', 'name' => 'SPL'],
    ['src' => 'images/partners/hil.jpg', 'name' => 'HIL'],
    ['src' => 'images/partners/patkar-extrusions.jpg', 'name' => 'PFL (PEL Patkar Extrusions)']
];
?>
<section id="client-logos" class="client-logos-section">
    <div class="container">
        <div class="client-logos-header">
            <h2 class="title"><span>Our Valued</span> Clients</h2>
            <p class="client-wall-sub">Trusted by industry leaders, infrastructure pioneers, and global compounding specialists</p>
        </div>
        
        <div class="client-wall-wrapper">
            <div class="client-wall-grid">
                <?php foreach ($clientLogos as $client): ?>
                    <div class="client-card">
                        <div class="client-card-inner">
                            <img src="<?php echo $GLBHost . htmlspecialchars($client['src']); ?>" alt="<?php echo htmlspecialchars($client['name']); ?>" class="img-responsive" title="<?php echo htmlspecialchars($client['name']); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
