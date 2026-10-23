<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Plastic Processing Machinery (Equipments) Manufacturers, Exporters in India at Ahmedabad</title>
        <meta name="description" content="Primetech is one of the leading Plastic Processing Machinery (Equipments) Manufacturers in India at Ahmedabad that manufactured High Speed Mixer, Granulators, Pulverizer, Spiral Conveyor, Screw Conveyor, Gyro Vibrating Screen. Also we Export of Plastic Processing Machinery (Equipments) all over the world.">
        <meta name="keywords" content="Plastic Processing Machinery Manufacturer, Plastic Processing Machinery Manufacturer in India, Plastic Processing Equipments Manufacturer, Plastic Processing Equipments Manufacturer in India, Plastic Processing Machinery Exporter, Plastic Processing Equipments Exporter, Plastic Processing Machinery Manufacturer in Ahmedabad, Plastic Processing Equipments Manufacturer in Ahmedabad">
        <meta name="robots" content="index,follow">

        <?php include('./includes/header.home.inc.php'); ?>

    </head>

    <body id="home">
        <div onMouseDown="return false">
        <div id="mobile-menu"></div>

        <div id="wrapper">

            <?php include('./includes/top.inc.php'); ?>

            <section id="banner" class="hero-video-section">
                <div class="hero-video-container">
                    <video id="heroVideo" class="hero-video-element" autoplay loop muted playsinline preload="auto" onclick="heroTogglePlay(event);" style="cursor: pointer;">
                        <source src="<?php echo $GLBHost; ?>hero-video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
                    <div class="hero-video-overlay"></div>

                    <!-- Right Down Controls: Play/Pause & YouTube Link -->
                    <div class="hero-video-controls" id="heroVideoControls" onmousedown="event.stopPropagation();" onmouseup="event.stopPropagation();">
                        <button type="button" id="heroPlayPauseBtn" class="hero-control-btn" aria-label="Pause Video" title="Pause / Play Video" onclick="heroTogglePlay(event);" onmousedown="event.stopPropagation();" onmouseup="event.stopPropagation();">
                            <i class="fa fa-pause" id="heroPlayPauseIcon" aria-hidden="true"></i>
                            <span class="control-text" id="heroPlayPauseText">Pause</span>
                        </button>
                        <a href="https://youtu.be/2RQzuG75apU?si=3rizSBQv6of2XK1X" target="_blank" rel="noopener noreferrer" id="heroYoutubeBtn" class="hero-control-btn hero-youtube-btn" aria-label="Watch Video on YouTube" title="Watch on YouTube" onmousedown="event.stopPropagation();" onmouseup="event.stopPropagation();" onclick="event.stopPropagation(); window.open(this.href,'_blank'); return false;">
                            <i class="fa fa-youtube-play" id="heroYoutubeIcon" aria-hidden="true"></i>
                            <span class="control-text">YouTube</span>
                        </a>
                    </div>
                </div>
            </section>
            <script>
                function openHeroYoutube(e) {
                    if (e) {
                        if (e.stopPropagation) e.stopPropagation();
                    }
                    window.open('https://youtu.be/2RQzuG75apU?si=3rizSBQv6of2XK1X', '_blank');
                    return false;
                }

                function setHeroPlayUI(isPlaying) {
                    var icon = document.getElementById('heroPlayPauseIcon');
                    var text = document.getElementById('heroPlayPauseText');
                    var btn = document.getElementById('heroPlayPauseBtn');
                    if (icon) icon.className = isPlaying ? 'fa fa-pause' : 'fa fa-play';
                    if (text) text.innerText = isPlaying ? 'Pause' : 'Play';
                    if (btn) btn.setAttribute('aria-label', isPlaying ? 'Pause Video' : 'Play Video');
                }

                function heroTogglePlay(e) {
                    if (e) {
                        if (e.preventDefault) e.preventDefault();
                        if (e.stopPropagation) e.stopPropagation();
                    }
                    var v = document.getElementById('heroVideo');
                    if (!v) return false;
                    if (v.paused) {
                        var p = v.play();
                        if (p !== undefined) {
                            p.catch(function () {});
                        }
                        setHeroPlayUI(true);
                    } else {
                        v.pause();
                        setHeroPlayUI(false);
                    }
                    return false;
                }

                document.addEventListener('DOMContentLoaded', function () {
                    var v = document.getElementById('heroVideo');
                    if (v) {
                        v.addEventListener('play', function () { setHeroPlayUI(true); });
                        v.addEventListener('pause', function () { setHeroPlayUI(false); });
                        var p = v.play();
                        if (p !== undefined) {
                            p.then(function () {
                                setHeroPlayUI(true);
                            }).catch(function () {
                                setHeroPlayUI(false);
                            });
                        }
                    }

                    var ytBtn = document.getElementById('heroYoutubeBtn');
                    if (ytBtn) {
                        ytBtn.addEventListener('click', function (e) {
                            return openHeroYoutube(e);
                        });
                    }
                });
            </script>

            <?php /* BANNER SLIDERS (KEPT FOR REFERENCE):
            <section id="banner-slider-backup" style="display:none;">
                <ul class="slides clearfix">
                    <li class="new-banner-slide">
                        <a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/" title="Where Precision Meets Performance">
                            <img src="<?php echo $GLBHost; ?>images/Artboard 3 copy 8@3x.jpg" alt="Where Precision Meets Performance - Primetech Industries" class="img-responsive center-block">
                        </a>
                    </li>
                    <li class="new-banner-slide">
                        <a href="<?php echo $GLBHost; ?>products/pulverizer/" title="The Finer The Grind, The Higher The Value">
                            <img src="<?php echo $GLBHost; ?>images/Artboard 3 copy 9@3x.jpg" alt="The Finer The Grind, The Higher The Value - Primetech Industries" class="img-responsive center-block">
                        </a>
                    </li>
                    <li class="new-banner-slide">
                        <a href="<?php echo $GLBHost; ?>products/shredder/" title="Strength That Never Backs Down">
                            <img src="<?php echo $GLBHost; ?>images/Artboard 3 copy 10@3x.jpg" alt="Strength That Never Backs Down - Primetech Industries" class="img-responsive center-block">
                        </a>
                    </li>
                    <li class="new-banner-slide">
                        <a href="<?php echo $GLBHost; ?>products/granulators/" title="Turning Waste Into Value">
                            <img src="<?php echo $GLBHost; ?>images/Artboard 3 copy 11@3x.jpg" alt="Turning Waste Into Value - Primetech Industries" class="img-responsive center-block">
                        </a>
                    </li>
                </ul>
            </section>
            */ ?>

            <section id="the-company">
                <div class="container">
                    <h2 class="title"><span>About </span>Us</h2>
                    <div class="row">
                        <div class="col-xs-12">
                            <p>PRIMETECH, an ISO 9001:2015 company laid its foundation in 1991 with a strong vision of becoming a world class leader by delivering the ultimate quality  products around the globe.</p>
                            <p>Primetech has come a long way to it's present establishment status as the leading producer of plastic processing equipments in India and have also started to make their presence felt in the global market.</p>
                            <p class="hidden-xs">Primetech maintains a cutting-edge by efficient R & D division to meet specialized technological challenges.</p>
                            <p class="hidden-xs">Total quality management systems relentlessly work towards achieving zero defect and failure free performance , leading to superior quality at remarkable competitive rates.</p>
                            <p class="hidden-xs">We make our know-how in mixing technology, material handling and transfer systems and size reduction technology available to the customer with the help of  goal oriented dynamic employees and close co-operation with customer specialists. Thus allowing us to develop leading edge technology.</p>
                            <a href="<?php echo $GLBHost; ?>the-company/about-us/" class="btn btn-custom">More</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="foot-print">
                <div class="container">
                    <h2 class="title"><span>Company</span> Foot Print</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">36</div>
                                    <p>Years of</p>
                                    <p>Manufacturing Experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">03</div>
                                    <p>Manufacturing Units</p>
                                    <p>in India</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">1,00,000</div>
                                    <p>Sq. Ft. Total</p>
                                    <p>Area for Manufacturing</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">400</div> <span class="plus"></span>
                                    <p>Equipments Production Capacity</p>
                                    <p>Annually</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">250</div> <span class="sep"></span> 
                                    <div class="number">6000</div>
                                    <p>kg/hr</p>
                                    <p>Capacity Offered in Mixing Plant</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">3500</div> <span class="plus"></span>
                                    <p>Mixing Plant</p>
                                    <p>Installations Worldwide</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">100</div> <span class="sep"></span> 
                                    <div class="number">1000</div>
                                    <p>kg/hr</p>
                                    <p>Capacity Offered in Size Reduction System</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">1400</div> <span class="plus"></span>
                                    <p>Pulverizing System</p>
                                    <p>Installations Worldwide</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="block-outer">
                                <div class="block">
                                    <div class="number">25</div>
                                    <p>Countries Served in Exports</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Styles for Product Range Interactive Category Showcase -->
            <style>
                .product-range-showcase {
                    display: flex;
                    gap: 30px;
                    align-items: stretch;
                    margin-top: 15px;
                }
                .category-sidebar {
                    flex: 0 0 290px;
                    width: 290px;
                    max-width: 290px;
                }
                .category-menu-box {
                    background: #2b2b2b;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
                    border: 1px solid #3d3d3d;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }
                .category-item {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding: 24px 22px;
                    color: #ffffff;
                    font-size: 17px;
                    font-weight: 600;
                    font-family: 'Titillium Web', sans-serif;
                    cursor: pointer;
                    border-bottom: 1px solid rgba(255, 255, 255, 0.14);
                    transition: all 0.25s ease;
                    user-select: none;
                    position: relative;
                }
                .category-item:last-child {
                    border-bottom: none;
                }
                .category-item .cat-arrow {
                    font-size: 18px;
                    color: rgba(255, 255, 255, 0.55);
                    transition: transform 0.25s ease, color 0.25s ease;
                }
                .category-item:hover,
                .category-item.active {
                    background: #ad171e;
                    color: #ffffff;
                }
                .category-item:hover .cat-arrow,
                .category-item.active .cat-arrow {
                    color: #ffffff;
                    transform: translateX(4px);
                }
                @media (min-width: 992px) {
                    .category-item.active::after {
                        content: '';
                        position: absolute;
                        right: -8px;
                        top: 50%;
                        transform: translateY(-50%);
                        width: 0;
                        height: 0;
                        border-top: 8px solid transparent;
                        border-bottom: 8px solid transparent;
                        border-left: 8px solid #ad171e;
                        z-index: 5;
                    }
                }
                .products-display-panel {
                    flex: 1 1 auto;
                    min-width: 0;
                    background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 24px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
                }
                .category-products-pane {
                    display: none;
                }
                .category-products-pane.active {
                    display: block;
                    animation: fadeInProductPane 0.3s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
                }
                @keyframes fadeInProductPane {
                    from {
                        opacity: 0;
                        transform: translateY(8px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                .products-subgrid {
                    display: grid;
                    gap: 20px;
                }
                .products-subgrid.grid-4 {
                    grid-template-columns: repeat(4, 1fr);
                }
                .products-subgrid.grid-3 {
                    grid-template-columns: repeat(3, 1fr);
                }
                .product-range-showcase .product-grid-card {
                    background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
                    transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                }
                .product-range-showcase .product-card-link {
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                    text-decoration: none !important;
                    color: inherit;
                }
                .product-range-showcase .product-img-box {
                    background: #f8fafc;
                    border-bottom: 1px solid #edf2f7;
                    height: 200px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 14px;
                    position: relative;
                    overflow: hidden;
                    transition: background-color 0.3s ease;
                }
                .product-range-showcase .product-img-box img {
                    max-height: 165px;
                    max-width: 90%;
                    width: auto;
                    height: auto;
                    object-fit: contain;
                    margin: 0 auto;
                    display: block;
                    transition: transform 0.4s ease;
                    filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.07));
                }
                .product-range-showcase .product-info-box {
                    padding: 14px 16px 14px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    flex-grow: 1;
                    background: #ffffff;
                }
                .product-range-showcase .product-name {
                    font-size: 16px;
                    font-weight: 600;
                    color: #1a202c;
                    margin: 0 0 10px 0;
                    line-height: 1.35;
                    min-height: 44px;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    font-family: 'Titillium Web', sans-serif;
                    transition: color 0.3s ease;
                }
                .product-range-showcase .product-action {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding-top: 10px;
                    border-top: 1px solid #edf2f7;
                    font-size: 12px;
                    font-weight: 600;
                    color: #ad171e;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }
                .product-range-showcase .product-action i {
                    font-size: 12px;
                    transition: transform 0.3s ease;
                    color: #ad171e;
                }
                .product-range-showcase .product-grid-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 14px 28px rgba(173, 23, 30, 0.12), 0 4px 12px rgba(0, 0, 0, 0.05);
                    border-color: #ad171e;
                }
                .product-range-showcase .product-grid-card:hover .product-img-box {
                    background-color: #ffffff;
                }
                .product-range-showcase .product-grid-card:hover .product-img-box img {
                    transform: scale(1.06);
                }
                .product-range-showcase .product-grid-card:hover .product-name {
                    color: #ad171e;
                }
                .product-range-showcase .product-grid-card:hover .product-action i {
                    transform: translateX(4px);
                }
                @media (max-width: 1199px) {
                    .products-subgrid.grid-4 {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }
                @media (max-width: 991px) {
                    .product-range-showcase {
                        flex-direction: column;
                        gap: 20px;
                    }
                    .category-sidebar {
                        flex: none;
                        width: 100%;
                        max-width: 100%;
                    }
                    .category-menu-box {
                        flex-direction: row;
                        border-radius: 8px;
                    }
                    .category-item {
                        flex: 1;
                        text-align: center;
                        justify-content: center;
                        padding: 14px 8px;
                        font-size: 15px;
                        border-bottom: none;
                        border-right: 1px solid rgba(255, 255, 255, 0.14);
                    }
                    .category-item:last-child {
                        border-right: none;
                    }
                    .category-item .cat-arrow {
                        display: none;
                    }
                    .products-display-panel {
                        padding: 16px;
                    }
                }
                @media (max-width: 767px) {
                    .category-menu-box {
                        flex-direction: column;
                    }
                    .category-item {
                        border-right: none;
                        border-bottom: 1px solid rgba(255, 255, 255, 0.14);
                        padding: 14px 18px;
                        justify-content: space-between;
                    }
                    .category-item .cat-arrow {
                        display: inline-block;
                    }
                    .products-subgrid.grid-4,
                    .products-subgrid.grid-3 {
                        grid-template-columns: 1fr;
                    }
                }
            </style>

            <section id="product-range">
                <div class="container">
                    <h2 class="title"><span>Product </span>Range</h2>
                    <p class="subtitle text-center" style="font-size: 16px; color: #666; margin: -10px auto 35px; max-width: 750px;">
                        Engineering excellence in high-speed industrial mixing, size reduction solutions, and automated bulk conveying systems.
                    </p>
                    <!-- Interactive Category Showcase -->
                    <div class="product-range-showcase">
                        <!-- Left Side: Category Menu Box -->
                        <div class="category-sidebar">
                            <div class="category-menu-box">
                                <div class="category-item active" data-target="#cat-mixers">
                                    <span class="cat-title">Mixers</span>
                                    <i class="fa fa-angle-right cat-arrow" aria-hidden="true"></i>
                                </div>
                                <div class="category-item" data-target="#cat-size-reduction">
                                    <span class="cat-title">Size Reduction</span>
                                    <i class="fa fa-angle-right cat-arrow" aria-hidden="true"></i>
                                </div>
                                <div class="category-item" data-target="#cat-conveying">
                                    <span class="cat-title">Conveying and Automation</span>
                                    <i class="fa fa-angle-right cat-arrow" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Products Display Box -->
                        <div class="products-display-panel">
                            <!-- Category 1: Mixers -->
                            <div class="category-products-pane active" id="cat-mixers">
                                <div class="products-subgrid grid-4">
                                    <!-- 1. High Speed Heater Cooler Mixer -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/heater-cooler-mixers-new.png" alt="High Speed Heater Cooler Mixer" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">High Speed Heater Cooler Mixer</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 2. Horizontal Cooler -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/horizontal-cooler/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/horizontal-cooler-new.png" alt="Horizontal Cooler" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">Horizontal Cooler</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 3. High Speed Mixer -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/high-speed-mixer/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/high-speed-mixer-thumb.png" alt="High Speed Mixer" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">High Speed Mixer</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 4. Laboratory Mixer -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/lab-mixer/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/laboratory-mixer-new.png" alt="Laboratory Mixer" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">Laboratory Mixer</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Category 2: Size Reduction -->
                            <div class="category-products-pane" id="cat-size-reduction">
                                <div class="products-subgrid grid-3">
                                    <!-- 1. High Speed Pulverizer -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/pulverizer/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/pulverizer-new.png" alt="High Speed Pulverizer" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">High Speed Pulverizer</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 2. Plastic Granulator -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/granulators/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/granulator-new.png" alt="Plastic Granulator" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">Plastic Granulator</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 3. Heavy Duty Shredder -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/shredder/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/shredder-new.png" alt="Heavy Duty Shredder" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">Heavy Duty Shredder</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Category 3: Conveying and Automation -->
                            <div class="category-products-pane" id="cat-conveying">
                                <div class="products-subgrid grid-3">
                                    <!-- 1. Flexible Spiral Conveyor -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/spiral-conveyor/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/spiral-conveyor-new.png" alt="Flexible Spiral Conveyor" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">Flexible Spiral Conveyor</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 2. Screw Conveyor -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/screw-conveyor/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/screw-conveyor-new.png" alt="Screw Conveyor" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">Screw Conveyor</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 3. Rotary Airlock Valve -->
                                    <div class="product-grid-card">
                                        <a href="<?php echo $GLBHost; ?>products/rotary-air-lock-valve/" class="product-card-link">
                                            <div class="product-img-box">
                                                <img src="<?php echo $GLBHost; ?>images/products/rotary-airlock-valve-thumb.png" alt="Rotary Airlock Valve" class="img-responsive">
                                            </div>
                                            <div class="product-info-box">
                                                <h3 class="product-name">Rotary Airlock Valve</h3>
                                                <div class="product-action">
                                                    <span>Explore Product</span>
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center more-btn" style="margin-top: 20px;">
                        <a href="<?php echo $GLBHost; ?>products/" class="btn btn-custom" style="padding: 12px 36px; font-size: 15px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; border-radius: 25px;">View All Products</a>
                    </div>

                </div>
            </section>

            <?php include('./includes/client-logos.inc.php'); ?>

            <?php include('./includes/bottom.inc.php'); ?>
            <script src="<?php echo $GLBHost; ?>scripts/jquery.waypoints.min.js"></script>
            <script src="<?php echo $GLBHost; ?>scripts/jquery.countup.js"></script>

            <script>
                $('.number').countUp();
            </script>
            <script>

                $(document).ready(function () {
                    $("#main-menu #t-home, #f-home").addClass('active');

                    $('#banner .slides').bxSlider({
                        mode: 'fade',
                        pager: false,
                        controls: true,
                        pause: 6000,
                        auto: true,
                        autoControls: false,
                        adaptiveHeight: true,
                        touchEnabled: true
                    });
                    
                    $('#mob-banner .slider').owlCarousel({
                        items: 1,
                        loop: true,
                        dots: false,
                        margin: 0,
                        nav: false,
                        autoplay: true,
                        autoplayTimeout: 6000,
                        autoplaySpeed: 1000
                    });

                    // Interactive Category Showcase: hover or click switches products pane
                    $('.category-item').on('mouseenter click', function (e) {
                        var targetId = $(this).data('target');
                        if (!targetId) return;

                        $('.category-item').removeClass('active');
                        $(this).addClass('active');

                        $('.category-products-pane').removeClass('active');
                        $(targetId).addClass('active');
                    });
                });
            </script>

        </div>
        </div>
    </body>
</html>
