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
                        <a href="https://www.youtube.com/watch?v=SqMaqQw2iak&feature=youtu.be" target="_blank" rel="noopener noreferrer" id="heroYoutubeBtn" class="hero-control-btn hero-youtube-btn" aria-label="Watch Video on YouTube" title="Watch on YouTube" onmousedown="event.stopPropagation();" onmouseup="event.stopPropagation();" onclick="event.stopPropagation(); window.open(this.href,'_blank'); return false;">
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
                    window.open('https://www.youtube.com/watch?v=SqMaqQw2iak&feature=youtu.be', '_blank');
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
                    <h2 class="title"><span>The </span>Company</h2>
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

            <section id="product-range">
                <div class="container">
                    <h2 class="title"><span>Product </span>Range</h2>
                    <p class="subtitle text-center" style="font-size: 16px; color: #666; margin: -10px auto 35px; max-width: 750px;">
                        Engineering excellence in high-speed industrial mixing, size reduction solutions, and automated bulk conveying systems.
                    </p>
                    <div class="row product-grid-row">
                        <!-- 1. High Speed Heater Cooler Mixer -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/heater-cooler-mixer-thumb1.png" alt="High Speed Heater Cooler Mixer" class="img-responsive">
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
                        </div>

                        <!-- 2. High Speed Mixer -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
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
                        </div>

                        <!-- 3. Cooler Mixer -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/horizontal-cooler/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/mixer-horizontal-cooler-thumb-homepage.png" alt="Cooler Mixer" class="img-responsive">
                                    </div>
                                    <div class="product-info-box">
                                        <h3 class="product-name">Cooler Mixer</h3>
                                        <div class="product-action">
                                            <span>Explore Product</span>
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- 4. Laboratory Mixer -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/lab-mixer/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/laboratory-mixer-thumb.png" alt="Laboratory Mixer" class="img-responsive">
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

                        <!-- 5. Pulverizer -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/pulverizer/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/pulverizer.png" alt="High Speed Pulverizer" class="img-responsive">
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
                        </div>

                        <!-- 6. Heavy Duty Shredder -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/shredder/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/shredder-thumb.png" alt="Heavy Duty Shredder" class="img-responsive">
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

                        <!-- 7. Granulator -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/granulators/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/granulator.png" alt="Plastic Granulator" class="img-responsive">
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
                        </div>

                        <!-- 8. Flexible Spiral Conveyor -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/spiral-conveyor/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/spiral-vacume-conveyor-thumb.png" alt="Flexible Spiral Conveyor" class="img-responsive">
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
                        </div>

                        <!-- 9. Screw Conveyor -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="product-grid-card">
                                <a href="<?php echo $GLBHost; ?>products/screw-conveyor/" class="product-card-link">
                                    <div class="product-img-box">
                                        <img src="<?php echo $GLBHost; ?>images/products/screw-conveyor-thumb.png" alt="Screw Conveyor" class="img-responsive">
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
                });
            </script>

        </div>
        </div>
    </body>
</html>
