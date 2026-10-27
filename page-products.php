<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Products | Plastic Processing Machinery & Equipment | Primetech Industries</title>
        <meta name="description" content="Explore Primetech Industries complete range of plastic processing machinery: High Speed Heater Cooler Mixers, Horizontal Coolers, Pulverizers, Granulators, Shredders, Spiral & Screw Conveyors, Gyro Vibrating Screens, and Mixing Plant Automation.">
        <meta name="keywords" content="Plastic Processing Machinery, Industrial Mixers, Heater Cooler Mixer, Horizontal Cooler, Pulverizer, Plastic Granulator, Shredder, Spiral Conveyor, Screw Conveyor, Rotary Airlock Valve, Gyro Vibrating Screen, Mixing Plant Automation">
        <meta name="robots" content="index,follow">

        <?php include('./includes/header.inner.inc.php'); ?>

        <style>
            /* ==========================================================
               Products Page Modern UI & Category System
               ========================================================== */
            .products-page-intro {
                text-align: center;
                max-width: 860px;
                margin: 0 auto 35px;
                padding-top: 10px;
            }
            .products-page-intro h2 {
                font-size: 32px;
                font-weight: 700;
                color: #1a202c;
                margin: 0 0 12px;
                font-family: 'Titillium Web', sans-serif;
            }
            .products-page-intro h2 span {
                color: #ad171e;
            }
            .products-page-intro p {
                font-size: 15px;
                line-height: 1.65;
                color: #4a5568;
                margin: 0;
            }

            /* Category Quick Filter Navigation */
            .prod-filter-bar {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                margin-bottom: 45px;
            }
            .prod-filter-btn {
                background: #ffffff;
                border: 1px solid #cbd5e1;
                color: #334155;
                font-size: 14px;
                font-weight: 600;
                padding: 10px 22px;
                border-radius: 30px;
                cursor: pointer;
                transition: all 0.25s ease;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                font-family: 'Titillium Web', sans-serif;
                box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            }
            .prod-filter-btn:hover {
                background: #f1f5f9;
                color: #ad171e;
                border-color: #ad171e;
                transform: translateY(-2px);
            }
            .prod-filter-btn.active {
                background: #ad171e;
                color: #ffffff;
                border-color: #ad171e;
                box-shadow: 0 4px 14px rgba(173, 23, 30, 0.25);
            }
            .prod-filter-btn .count-badge {
                font-size: 11px;
                padding: 2px 7px;
                border-radius: 10px;
                background: rgba(0,0,0,0.06);
                transition: all 0.25s ease;
            }
            .prod-filter-btn.active .count-badge {
                background: rgba(255,255,255,0.25);
                color: #ffffff;
            }

            /* Category Section Container */
            .prod-category-section {
                margin-bottom: 60px;
                position: relative;
            }
            .prod-category-header {
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 2px solid #e2e8f0;
                position: relative;
            }
            .prod-category-header:after {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 70px;
                height: 2px;
                background: #ad171e;
            }
            .prod-category-tag {
                display: inline-block;
                font-size: 11px;
                font-weight: 700;
                color: #ad171e;
                background: rgba(173, 23, 30, 0.08);
                border: 1px solid rgba(173, 23, 30, 0.2);
                padding: 3px 12px;
                border-radius: 12px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 8px;
            }
            .prod-category-header h3 {
                font-size: 26px;
                font-weight: 700;
                color: #1a202c;
                margin: 0 0 6px;
                font-family: 'Titillium Web', sans-serif;
            }
            .prod-category-header p {
                font-size: 14px;
                color: #64748b;
                margin: 0;
            }

            /* Grid Equal Height System */
            .equal-height-grid {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-flex-wrap: wrap;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            }
            .equal-height-grid > [class*='col-'] {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                margin-bottom: 30px;
            }
            .equal-height-grid .product-card-modern {
                -webkit-box-flex: 1;
                -webkit-flex: 1 1 auto;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                height: 100%;
                margin-bottom: 0;
            }

            /* Product Card Modern Design */
            .product-card-modern {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 16px;
                padding: 22px 20px 20px;
                box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
                transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), border-color 0.35s cubic-bezier(0.2, 0.8, 0.2, 1);
                position: relative;
            }
            .product-card-modern:hover {
                transform: translateY(-8px);
                box-shadow: 0 16px 36px rgba(173, 23, 30, 0.12), 0 4px 12px rgba(0, 0, 0, 0.04);
                border-color: rgba(173, 23, 30, 0.35);
            }
            
            /* Card Image Wrapper - Bigger, Crisp, Visible Machine Photos */
            .prod-card-media {
                width: 100%;
                height: 260px;
                background: linear-gradient(180deg, #f8fafc 0%, #edf2f7 100%);
                border-radius: 12px;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -webkit-justify-content: center;
                -ms-flex-pack: center;
                justify-content: center;
                padding: 10px;
                margin-bottom: 18px;
                overflow: hidden;
                position: relative;
            }
            .col-md-4 .prod-card-media,
            .col-md-6 .prod-card-media {
                height: 280px;
            }
            .prod-card-media a {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -webkit-justify-content: center;
                -ms-flex-pack: center;
                justify-content: center;
                width: 100%;
                height: 100%;
            }
            .prod-card-media img {
                max-height: 235px;
                max-width: 95%;
                width: auto;
                height: auto;
                object-fit: contain;
                transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
                filter: drop-shadow(0 8px 18px rgba(0, 0, 0, 0.10));
            }
            .col-md-4 .prod-card-media img,
            .col-md-6 .prod-card-media img {
                max-height: 255px;
            }
            .product-card-modern:hover .prod-card-media img {
                transform: scale(1.08);
            }

            /* Card Content - Aligned Heights */
            .prod-card-info {
                -webkit-box-flex: 1;
                -webkit-flex: 1;
                -ms-flex: 1;
                flex: 1;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
            }
            .prod-badge {
                display: inline-block;
                align-self: flex-start;
                font-size: 11px;
                font-weight: 700;
                color: #ad171e;
                background: rgba(173, 23, 30, 0.08);
                border: 1px solid rgba(173, 23, 30, 0.18);
                padding: 4px 11px;
                border-radius: 10px;
                text-transform: uppercase;
                letter-spacing: 0.4px;
                margin-bottom: 12px;
            }
            .prod-card-title {
                font-size: 18px;
                font-weight: 700;
                color: #1a202c;
                margin: 0 0 10px;
                font-family: 'Titillium Web', sans-serif;
                line-height: 1.3;
                min-height: 52px;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: start;
                -webkit-align-items: flex-start;
                -ms-flex-align: start;
                align-items: flex-start;
                transition: color 0.25s ease;
            }
            .product-card-modern:hover .prod-card-title {
                color: #ad171e;
            }
            .prod-card-desc {
                font-size: 13.5px;
                line-height: 1.6;
                color: #4a5568;
                margin: 0 0 22px;
                -webkit-box-flex: 1;
                -webkit-flex: 1;
                -ms-flex: 1;
                flex: 1;
            }

            /* Card Action Button - Locked to Bottom */
            .prod-card-btn {
                margin-top: auto;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: justify;
                -webkit-justify-content: space-between;
                -ms-flex-pack: justify;
                justify-content: space-between;
                padding: 12px 18px;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 10px;
                color: #1e293b;
                font-size: 13px;
                font-weight: 700;
                text-decoration: none !important;
                font-family: 'Titillium Web', sans-serif;
                transition: all 0.25s ease;
            }
            .prod-card-btn i {
                font-size: 14px;
                color: #ad171e;
                transition: transform 0.25s ease, color 0.25s ease;
            }
            .product-card-modern:hover .prod-card-btn {
                background: #ad171e;
                color: #ffffff !important;
                border-color: #ad171e;
                box-shadow: 0 4px 14px rgba(173, 23, 30, 0.25);
            }
            .product-card-modern:hover .prod-card-btn i {
                color: #ffffff;
                transform: translateX(4px);
            }

            /* Highlight Card for Gyro & Mixing Plant */
            .card-highlight-wrap {
                margin-bottom: 30px;
            }
            .product-card-modern.special-feature {
                border-color: rgba(173, 23, 30, 0.25);
                background: linear-gradient(180deg, #ffffff 0%, #fffcfc 100%);
            }

            @media (max-width: 991px) {
                .prod-card-media {
                    height: 200px;
                }
                .prod-card-title {
                    min-height: auto;
                }
                .prod-card-desc {
                    min-height: auto;
                }
            }
            @media (max-width: 767px) {
                .products-page-intro h2 {
                    font-size: 26px;
                }
                .prod-filter-bar {
                    gap: 6px;
                }
                .prod-filter-btn {
                    padding: 8px 14px;
                    font-size: 12px;
                }
                .product-card-modern {
                    height: auto;
                }
            }
        </style>
    </head>

    <body>
        <div onMouseDown="return false">
        <div id="mobile-menu"></div>

        <div id="wrapper">

            <?php include('./includes/top.inc.php'); ?>

            <section id="inner-title" class="bg01">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h1><span>Product Range</span></h1>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-6">
                            <div id="breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $GLBHost; ?>">Home</a></li>
                                    <li class="active">Products</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content" style="padding: 40px 0 60px;">
                <div class="container">
                    
                    <!-- Intro Header -->
                    <div class="products-page-intro">
                        <h2>Precision Engineered <span>Industrial Machinery</span></h2>
                        <p>Specialized equipment engineered for high-performance mixing, rapid cooling, size reduction, bulk material conveying, fine grading, and automated plant operations for the global plastics and polymer industry.</p>
                    </div>

                    <!-- Category Filter Tabs -->
                    <div class="prod-filter-bar">
                        <button class="prod-filter-btn active" data-filter="all">
                            <i class="fa fa-th-large"></i> All Products <span class="count-badge">12</span>
                        </button>
                        <button class="prod-filter-btn" data-filter="cat-mixers">
                            <i class="fa fa-recycle"></i> Industrial Mixers <span class="count-badge">4</span>
                        </button>
                        <button class="prod-filter-btn" data-filter="cat-size-reduction">
                            <i class="fa fa-scissors"></i> Size Reduction <span class="count-badge">3</span>
                        </button>
                        <button class="prod-filter-btn" data-filter="cat-conveying-automation">
                            <i class="fa fa-cogs"></i> Conveying, Automation &amp; Screening <span class="count-badge">5</span>
                        </button>
                    </div>

                    <!-- ==============================================================
                         CATEGORY 1: INDUSTRIAL MIXERS (4 MACHINES)
                         ============================================================== -->
                    <div class="prod-category-section" id="cat-mixers">
                        <div class="prod-category-header">
                            <span class="prod-category-tag">Category 01</span>
                            <h3>Industrial Mixers</h3>
                            <p>High-speed compounding, rapid thermal cooling, homogenization, and laboratory testing mixers.</p>
                        </div>
                        <div class="row equal-height-grid">
                            <!-- Mixer 1: High Speed Heater Cooler Mixer -->
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/">
                                            <img src="<?php echo $GLBHost; ?>images/products/heater-cooler-mixers-new.png" alt="High Speed Heater Cooler Mixer" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Heating &amp; Cooling</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/" style="color:inherit; text-decoration:none;">High Speed Heater Cooler Mixer</a>
                                        </h4>
                                        <p class="prod-card-desc">High-speed frictional heating and intensive cooling unit designed for rigid and plasticized PVC dry blends.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Mixer 2: Horizontal Cooler -->
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/horizontal-cooler/">
                                            <img src="<?php echo $GLBHost; ?>images/horizontal-cooler.png" alt="Horizontal Cooler" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Rapid Cooling</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/horizontal-cooler/" style="color:inherit; text-decoration:none;">Horizontal Cooler</a>
                                        </h4>
                                        <p class="prod-card-desc">Jacketed horizontal trough providing gentle handling, maximum cooling surface contact, and zero dead zones.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/horizontal-cooler/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Mixer 3: High Speed Mixer -->
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/high-speed-mixer/">
                                            <img src="<?php echo $GLBHost; ?>images/products/high-speed-mixer.png" alt="High Speed Mixer" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Intensive Compounding</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/high-speed-mixer/" style="color:inherit; text-decoration:none;">High Speed Mixer</a>
                                        </h4>
                                        <p class="prod-card-desc">Aerodynamic shear tool profile delivering rapid frictional temperature rise and uniform dispersion of additives.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/high-speed-mixer/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Mixer 4: Laboratory Mixer -->
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/lab-mixer/">
                                            <img src="<?php echo $GLBHost; ?>images/products/laboratory-mixer-new.png" alt="Laboratory Mixer" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">R&amp;D &amp; Pilot Testing</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/lab-mixer/" style="color:inherit; text-decoration:none;">Laboratory Mixer</a>
                                        </h4>
                                        <p class="prod-card-desc">Precision pilot scale mixing unit engineered for formulation development, color matching, and quality control labs.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/lab-mixer/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==============================================================
                         CATEGORY 2: SIZE REDUCTION EQUIPMENT (3 MACHINES)
                         ============================================================== -->
                    <div class="prod-category-section" id="cat-size-reduction">
                        <div class="prod-category-header">
                            <span class="prod-category-tag">Category 02</span>
                            <h3>Size Reduction Equipment</h3>
                            <p>Ultrafine pulverizing, scrap granulating, and high-torque shredding machinery.</p>
                        </div>
                        <div class="row equal-height-grid">
                            <!-- Size Reduction 1: Pulverizer -->
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/pulverizer/">
                                            <img src="<?php echo $GLBHost; ?>images/products/pulverizer-new.png" alt="High Speed Pulverizer" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Ultrafine Milling</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/pulverizer/" style="color:inherit; text-decoration:none;">High Speed Pulverizer</a>
                                        </h4>
                                        <p class="prod-card-desc">High-throughput disk pulverizer for rigid PVC, LLDPE, HDPE, and masterbatch with precision micron control.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/pulverizer/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Size Reduction 2: Plastic Granulators -->
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/granulators/">
                                            <img src="<?php echo $GLBHost; ?>images/products/granulator-new.png" alt="Plastic Granulators" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Scrap Recycling</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/granulators/" style="color:inherit; text-decoration:none;">Plastic Granulators</a>
                                        </h4>
                                        <p class="prod-card-desc">Heavy-duty rotor knife cutting action for efficient size reduction of plastic profiles, pipes, sheets, and lumps.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/granulators/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Size Reduction 3: Heavy Duty Shredder -->
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/shredder/">
                                            <img src="<?php echo $GLBHost; ?>images/products/shredder-new.png" alt="Heavy Duty Shredder" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">High-Torque Shredding</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/shredder/" style="color:inherit; text-decoration:none;">Heavy Duty Shredder</a>
                                        </h4>
                                        <p class="prod-card-desc">Single shaft industrial shredder engineered for high-volume solid polymer purgings, lumps, and bulky materials.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/shredder/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==============================================================
                         CATEGORY 3: CONVEYING, AUTOMATION & SCREENING (5 SYSTEMS)
                         ============================================================== -->
                    <div class="prod-category-section" id="cat-conveying-automation">
                        <div class="prod-category-header">
                            <span class="prod-category-tag">Category 03</span>
                            <h3>Conveying, Automation &amp; Screening</h3>
                            <p>Automated bulk powder transfer, dust-free conveying, precision screening, and complete turnkey mixing plant automation.</p>
                        </div>
                        
                        <div class="row equal-height-grid">
                            <!-- Conveying 1: Flexible Spiral Conveyor -->
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/spiral-conveyor/">
                                            <img src="<?php echo $GLBHost; ?>images/products/spiral-conveyor-new.png" alt="Flexible Spiral Conveyor" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Bulk Material Transfer</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/spiral-conveyor/" style="color:inherit; text-decoration:none;">Flexible Spiral Conveyor</a>
                                        </h4>
                                        <p class="prod-card-desc">Coreless flexible screw transport providing dust-tight, hygienic conveying of plastic powders, granules, and flakes.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/spiral-conveyor/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Conveying 2: Screw Conveyor -->
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/screw-conveyor/">
                                            <img src="<?php echo $GLBHost; ?>images/products/screw-conveyor-new.png" alt="Screw Conveyor" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Continuous Metered Feed</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/screw-conveyor/" style="color:inherit; text-decoration:none;">Screw Conveyor</a>
                                        </h4>
                                        <p class="prod-card-desc">Enclosed tubular and U-trough industrial screw conveyor ensuring steady volumetric feeding and dust control.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/screw-conveyor/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Conveying 3: Rotary Airlock Valve -->
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="product-card-modern">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/rotary-air-lock-valve/">
                                            <img src="<?php echo $GLBHost; ?>images/products/rotary-airlock-valve-thumb.png" alt="Rotary Airlock Valve" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Pressure Isolation</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/rotary-air-lock-valve/" style="color:inherit; text-decoration:none;">Rotary Airlock Valve</a>
                                        </h4>
                                        <p class="prod-card-desc">Precision-machined rotary feeder maintaining airlock sealing while discharging bulk dry powders from silos and cyclones.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/rotary-air-lock-valve/" class="prod-card-btn">
                                        <span>View Specifications</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Special Product 4: Gyro Vibrating Screen -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="product-card-modern special-feature">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/gyro-vibrating-screen/">
                                            <img src="<?php echo $GLBHost; ?>images/products/gyro-vibrating-sieve.png" alt="Gyro Vibrating Screen" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Particle Classification &amp; Sieving</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/gyro-vibrating-screen/" style="color:inherit; text-decoration:none;">Gyro Vibrating Screen</a>
                                        </h4>
                                        <p class="prod-card-desc">High-efficiency circular multi-deck gyratory vibro-screen for continuous grading, scalping, and dust separation of plastic powders, masterbatches, and chemical compounds.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/gyro-vibrating-screen/" class="prod-card-btn">
                                        <span>Explore Gyro Vibrating Screen</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Special Product 5: Mixing Plant Automation -->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="product-card-modern special-feature">
                                    <div class="prod-card-media">
                                        <a href="<?php echo $GLBHost; ?>products/mixing-plant-automation/">
                                            <img src="<?php echo $GLBHost; ?>images/products/plant-thumb.png" alt="Mixing Plant Automation" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="prod-card-info">
                                        <span class="prod-badge">Turnkey Plant Automation</span>
                                        <h4 class="prod-card-title">
                                            <a href="<?php echo $GLBHost; ?>products/mixing-plant-automation/" style="color:inherit; text-decoration:none;">Mixing Plant Automation</a>
                                        </h4>
                                        <p class="prod-card-desc">Fully automated turnkey compounding systems integrating vacuum and spiral pneumatic conveying, loss-in-weight batching, weighing, silo storage, and central PLC-SCADA automation.</p>
                                    </div>
                                    <a href="<?php echo $GLBHost; ?>products/mixing-plant-automation/" class="prod-card-btn">
                                        <span>Explore Mixing Plant Automation</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <?php include('./includes/bottom.inc.php'); ?>

            <script>
                $(document).ready(function () {
                    $("#main-menu #t-products, #f-products").addClass('active');

                    // Filter Button Interaction
                    $('.prod-filter-btn').on('click', function () {
                        $('.prod-filter-btn').removeClass('active');
                        $(this).addClass('active');

                        var target = $(this).data('filter');

                        if (target === 'all') {
                            $('.prod-category-section').fadeIn(300);
                        } else {
                            $('.prod-category-section').hide();
                            $('#' + target).fadeIn(300);
                            $('html, body').animate({
                                scrollTop: $('#' + target).offset().top - 120
                            }, 500);
                        }
                    });
                });
            </script>

        </div>
        </div>
    </body>
</html>