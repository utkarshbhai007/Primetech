<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Manufacturing Infrastructure &amp; Production Units | Primetech Industries</title>
        <meta name="description" content="Explore Primetech Industries' state-of-the-art manufacturing infrastructure spanning 1,00,000 sq. ft. across 3 modern production units in Vatva, Ahmedabad, Gujarat. Heavy CNC machining, dynamic balancing, and assembly lines.">
        <meta name="keywords" content="Primetech Infrastructure, Manufacturing Units Ahmedabad, Plastic Machinery Factory, Unit 1 Vatva, Unit 2 Panchratna, Heavy Machining Facilities">
        <meta name="robots" content="index,follow">

        <?php include('./includes/header.inner.inc.php'); ?>
        <link href="<?php echo $GLBHost; ?>styles/jquery.fancybox.css" rel="stylesheet">

        <style>
            /* Infrastructure Modern Theme Styles */
            .infra-hero-lead {
                font-size: 16px;
                line-height: 1.7;
                color: #334155;
                margin-bottom: 24px;
            }
            .infra-stat-pill-bar {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                margin: 20px 0 35px;
            }
            .infra-stat-pill {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                padding: 10px 18px;
                border-radius: 30px;
                font-size: 13.5px;
                font-weight: 600;
                color: #1e293b;
                box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            }
            .infra-stat-pill i {
                color: #ad171e;
                font-size: 16px;
            }

            /* Unit Navigation Filter Tabs */
            .infra-filter-bar {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-bottom: 35px;
                background: #f1f5f9;
                padding: 8px;
                border-radius: 12px;
                border: 1px solid #e2e8f0;
            }
            .infra-filter-btn {
                background: transparent;
                border: none;
                padding: 10px 20px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 600;
                color: #475569;
                cursor: pointer;
                transition: all 0.25s ease;
                font-family: 'Titillium Web', sans-serif;
            }
            .infra-filter-btn:hover {
                color: #ad171e;
                background: rgba(255, 255, 255, 0.6);
            }
            .infra-filter-btn.active {
                background: #ad171e;
                color: #ffffff;
                box-shadow: 0 4px 12px rgba(173, 23, 30, 0.25);
            }

            /* Unit Section Containers */
            .unit-section-block {
                margin-bottom: 50px;
                scroll-margin-top: 100px;
            }
            .unit-header-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-left: 5px solid #ad171e;
                border-radius: 12px;
                padding: 22px 26px;
                margin-bottom: 25px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            }
            .unit-badge-tag {
                display: inline-block;
                font-size: 11px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.6px;
                color: #ad171e;
                background: rgba(173, 23, 30, 0.08);
                padding: 3px 12px;
                border-radius: 12px;
                margin-bottom: 8px;
            }
            .unit-header-card h3 {
                font-size: 24px;
                font-weight: 700;
                color: #1a202c;
                margin: 0 0 6px;
                font-family: 'Titillium Web', sans-serif;
            }
            .unit-header-card p {
                font-size: 14px;
                color: #64748b;
                margin: 0;
                line-height: 1.55;
            }

            /* Featured Facility Showcase (Unit 1 Main) */
            .unit-featured-box {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 8px 24px rgba(0,0,0,0.06);
                margin-bottom: 25px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .unit-featured-box:hover {
                transform: translateY(-4px);
                box-shadow: 0 16px 36px rgba(173, 23, 30, 0.12);
            }
            .featured-img-anchor {
                display: block;
                position: relative;
                overflow: hidden;
                max-height: 480px;
                background: #0f172a;
            }
            .featured-img-anchor img {
                width: 100%;
                height: 480px;
                object-fit: cover;
                object-position: center;
                transition: transform 0.5s ease;
            }
            .featured-img-anchor:hover img {
                transform: scale(1.03);
            }
            .featured-zoom-badge {
                position: absolute;
                bottom: 20px;
                right: 20px;
                background: rgba(15, 23, 42, 0.85);
                backdrop-filter: blur(6px);
                color: #ffffff;
                padding: 8px 18px;
                border-radius: 20px;
                font-size: 13px;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            }
            .unit-featured-caption {
                padding: 20px 24px;
                background: #ffffff;
                border-top: 1px solid #f1f5f9;
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 15px;
            }
            .unit-featured-caption h4 {
                margin: 0;
                font-size: 18px;
                font-weight: 700;
                color: #1e293b;
            }
            .unit-featured-caption p {
                margin: 4px 0 0;
                font-size: 13.5px;
                color: #64748b;
            }

            /* Responsive Gallery Grid for Machinery & Units */
            .infra-gallery-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
                gap: 20px;
            }
            .infra-thumb-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 3px 12px rgba(0,0,0,0.04);
                transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                display: flex;
                flex-direction: column;
            }
            .infra-thumb-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 28px rgba(173, 23, 30, 0.12);
                border-color: #ad171e;
            }
            .infra-thumb-link {
                display: block;
                position: relative;
                overflow: hidden;
                height: 190px;
                background: #f8fafc;
            }
            .infra-thumb-link img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.4s ease;
            }
            .infra-thumb-card:hover .infra-thumb-link img {
                transform: scale(1.06);
            }
            .infra-thumb-overlay {
                position: absolute;
                inset: 0;
                background: rgba(173, 23, 30, 0.4);
                display: flex;
                align-items: center;
                justify-content: center;
                color: #ffffff;
                font-size: 24px;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .infra-thumb-card:hover .infra-thumb-overlay {
                opacity: 1;
            }
            .infra-thumb-info {
                padding: 14px 16px;
                background: #ffffff;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .infra-thumb-info h5 {
                margin: 0 0 4px;
                font-size: 14px;
                font-weight: 700;
                color: #1e293b;
                line-height: 1.35;
            }
            .infra-thumb-info span {
                font-size: 12px;
                color: #64748b;
            }

            @media (max-width: 767px) {
                .featured-img-anchor img {
                    height: 260px;
                }
                .unit-header-card {
                    padding: 18px 16px;
                }
                .unit-header-card h3 {
                    font-size: 20px;
                }
            }
        </style>
    </head>

    <body>
        <div onMouseDown="return false">
        <div id="mobile-menu"></div>

        <div id="wrapper">

            <?php include('./includes/top.inc.php'); ?>

            <section id="inner-title" class="bg06">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h1><span>Infrastructure</span></h1>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-6">
                            <div id="breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $GLBHost; ?>">Home</a></li>
                                    <li class="active">Infrastructure</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content contact-page">
                <div class="container">
                    
                    <!-- Overview Section -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="title mt0 text-small"><span>World-Class</span> Manufacturing Facilities</h2>
                            <p class="infra-hero-lead">
                                <strong>PRIMETECH INDUSTRIES</strong> operates across <strong>three dedicated, high-capacity manufacturing units</strong> with a total footprint of over <strong>1,00,000 sq. ft.</strong> in the prime industrial zones of Vatva, Ahmedabad, Gujarat. 
                                Our facilities are engineered with state-of-the-art heavy machine tools, multi-ton E.O.T. overhead cranes, precision CNC lathes, horizontal boring mills, and dynamic rotor balancing centers to deliver robust and flawless compounding and size-reduction machinery worldwide.
                            </p>

                            <!-- Facility Quick Highlights -->
                            <div class="infra-stat-pill-bar">
                                <div class="infra-stat-pill">
                                    <i class="fa fa-industry"></i>
                                    <span>3 Specialized Manufacturing Units</span>
                                </div>
                                <div class="infra-stat-pill">
                                    <i class="fa fa-arrows-alt"></i>
                                    <span>1,00,000 Sq. Ft. Total Facility Area</span>
                                </div>
                                <div class="infra-stat-pill">
                                    <i class="fa fa-cogs"></i>
                                    <span>Heavy CNC &amp; Machining Centers</span>
                                </div>
                                <div class="infra-stat-pill">
                                    <i class="fa fa-anchor"></i>
                                    <span>Heavy Duty E.O.T. Cranes for Large Projects</span>
                                </div>
                                <div class="infra-stat-pill">
                                    <i class="fa fa-certificate"></i>
                                    <span>ISO 9001:2015 Quality Benchmarked</span>
                                </div>
                            </div>

                            <!-- Unit Filter Bar -->
                            <div class="infra-filter-bar">
                                <button class="infra-filter-btn active" data-target="all">All Facilities</button>
                                <button class="infra-filter-btn" data-target="unit-1">Unit 1: Main Campus &amp; Heavy Assembly</button>
                                <button class="infra-filter-btn" data-target="unit-2">Unit 2: Precision CNC &amp; Fabrication</button>
                                <button class="infra-filter-btn" data-target="unit-3">Unit 3: Systems &amp; Testing Wing</button>
                            </div>
                        </div>
                    </div>

                    <!-- ==============================================================
                         UNIT 1: MAIN CAMPUS & HEAVY ASSEMBLY (VATVA GIDC)
                         ============================================================== -->
                    <div class="unit-section-block" id="unit-1">
                        <div class="unit-header-card">
                            <span class="unit-badge-tag">Flagship Campus</span>
                            <h3>Unit 1: Heavy Machining, Vessel Fabrication &amp; Final Assembly</h3>
                            <p><i class="fa fa-map-marker" style="color:#ad171e;"></i> Plot No. 4716 &amp; 4717, Phase 4, Opp. Water Tank, GIDC Vatva, Ahmedabad - 382 445, Gujarat, India.</p>
                        </div>

                        <!-- Featured High-Resolution Main Infrastructure Photo -->
                        <div class="unit-featured-box">
                            <a href="<?php echo $GLBHost; ?>images/unit%201%20photo%20for%20the%20infrastructure.png" rel="gal-infra" class="featured-img-anchor fancybox" title="Primetech Industries - Unit 1 Heavy Manufacturing Campus (Vatva GIDC)">
                                <img src="<?php echo $GLBHost; ?>images/unit%201%20photo%20for%20the%20infrastructure.png" alt="Unit 1 Infrastructure Campus" class="img-responsive">
                                <span class="featured-zoom-badge"><i class="fa fa-search-plus"></i> View High Resolution</span>
                            </a>
                            <div class="unit-featured-caption">
                                <div>
                                    <h4>Primary Assembly &amp; Heavy Engineering Complex</h4>
                                    <p>Equipped with overhead E.O.T. cranes, heavy vessel assembly jigs, automated plasma cutting, and trial run test benches.</p>
                                </div>
                                <span class="label label-danger" style="font-size: 12px; padding: 6px 12px; border-radius: 4px;">Main Campus</span>
                            </div>
                        </div>

                        <!-- Additional Unit 1 Campus Views -->
                        <div class="infra-gallery-grid">
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit1-01.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 1 - Fabrication &amp; Bay Entrance">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit1-01.jpg" alt="Unit 1 Facility" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Fabrication Bay &amp; Material Intake</h5>
                                    <span>Unit 1 - GIDC Vatva</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit1-02.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 1 - Internal Machine Assembly Bay">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit1-02.jpg" alt="Unit 1 Assembly Line" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Assembly Line &amp; Testing Floors</h5>
                                    <span>Unit 1 - GIDC Vatva</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit1-03.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 1 - High Bay Overhead Crane Section">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit1-03.jpg" alt="Unit 1 High Bay" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Heavy Crane Section &amp; Stockyard</h5>
                                    <span>Unit 1 - GIDC Vatva</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==============================================================
                         UNIT 2: PRECISION CNC, ROTOR BALANCING & MACHINING (PANCHRATNA)
                         ============================================================== -->
                    <div class="unit-section-block" id="unit-2">
                        <div class="unit-header-card">
                            <span class="unit-badge-tag">Precision Machining Division</span>
                            <h3>Unit 2: Precision CNC Machining, Fabrication &amp; Dynamic Balancing</h3>
                            <p><i class="fa fa-map-marker" style="color:#ad171e;"></i> 3/2 &amp; 3/3, Panchratna Industrial Estate, Nr. Baroda Express Highway, Ramol Over Bridge, Vatva, Ahmedabad - 382 445, Gujarat, India.</p>
                        </div>

                        <!-- 12 Photos Gallery of Unit 2 -->
                        <div class="infra-gallery-grid">
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-01.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Precision CNC Machine Center">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-01.jpg" alt="CNC Machining Center" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Precision CNC Center</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-02.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Heavy Lathe &amp; Turning Shop">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-02.jpg" alt="Heavy Lathe Machine" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Heavy Lathe &amp; Turning Shop</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-03.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Horizontal Boring Mill">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-03.jpg" alt="Horizontal Boring Machine" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Horizontal Boring Operations</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-04.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Heavy Vessel Rolling &amp; Forming">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-04.jpg" alt="Vessel Rolling & Forming" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Vessel Rolling &amp; Forming</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-05.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Dynamic Rotor Balancing Center">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-05.jpg" alt="Dynamic Rotor Balancing" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Dynamic Rotor Balancing Bay</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-06.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Precision Component Machining">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-06.jpg" alt="Precision Machining" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Precision Component Machining</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-07.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Heavy Structural Fabrication Bay">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-07.jpg" alt="Structural Fabrication" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Heavy Structural Fabrication</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-08.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Grinding &amp; Surface Finishing Bay">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-08.jpg" alt="Surface Finishing Bay" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Surface Finishing &amp; Polishing</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-09.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Quality Control &amp; Metrology Inspection">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-09.jpg" alt="Quality Inspection" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Quality &amp; Dimensional Inspection</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-10.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Sub-Assembly Line">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-10.jpg" alt="Sub-Assembly Line" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Sub-Assembly &amp; Drive Fitting</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-11.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Raw Material Inventory &amp; Stockyard">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-11.jpg" alt="Raw Material Inventory" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Raw Material Inventory &amp; Storage</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                            <div class="infra-thumb-card">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-12.jpg" rel="gal-infra" class="infra-thumb-link fancybox" title="Unit 2 - Finished Machinery Inspection Bay">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit2-12.jpg" alt="Finished Machine Inspection" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Pre-Dispatch Inspection Bay</h5>
                                    <span>Unit 2 - Panchratna</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==============================================================
                         UNIT 3: CONVEYING, AUTOMATION & AUXILIARY SYSTEMS
                         ============================================================== -->
                    <div class="unit-section-block" id="unit-3">
                        <div class="unit-header-card">
                            <span class="unit-badge-tag">Automation &amp; Systems Facility</span>
                            <h3>Unit 3: Automated Conveying, Screening &amp; Turnkey Plant Integration</h3>
                            <p><i class="fa fa-map-marker" style="color:#ad171e;"></i> Dedicated Systems &amp; Controls Engineering Complex, Industrial Area, Vatva, Ahmedabad, Gujarat.</p>
                        </div>

                        <div class="infra-gallery-grid">
                            <div class="infra-thumb-card" style="grid-column: span 2;">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit3-01.jpg" rel="gal-infra" class="infra-thumb-link fancybox" style="height: 260px;" title="Unit 3 - Systems Integration &amp; Auxiliary Equipment Facility">
                                    <img src="<?php echo $GLBHost; ?>images/gallery/unit3-01.jpg" alt="Unit 3 Facility" class="img-responsive">
                                    <div class="infra-thumb-overlay"><i class="fa fa-search-plus"></i></div>
                                </a>
                                <div class="infra-thumb-info">
                                    <h5>Systems Integration, Spiral Conveyors &amp; Plant Automation Wing</h5>
                                    <span>Unit 3 - Specialized Conveying &amp; Control Assembly Complex</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>    

            <?php include('./includes/bottom.inc.php'); ?>
            <script src="<?php echo $GLBHost; ?>scripts/jquery.fancybox.js"></script>
            <script>
                $(document).ready(function () {
                    $("#main-menu #t-infrastructure, #f-infrastructure").addClass('active');

                    // Initialize Fancybox Lightbox Modal
                    $('.fancybox').fancybox({
                        openEffect: 'elastic',
                        openSpeed: 400,
                        closeEffect: 'elastic',
                        closeSpeed: 300,
                        helpers: {
                            title: {
                                type: 'inside'
                            }
                        }
                    });

                    // Interactive Tab Filter for Facilities
                    $('.infra-filter-btn').on('click', function () {
                        $('.infra-filter-btn').removeClass('active');
                        $(this).addClass('active');

                        var target = $(this).data('target');
                        if (target === 'all') {
                            $('.unit-section-block').fadeIn(300);
                        } else {
                            $('.unit-section-block').hide();
                            $('#' + target).fadeIn(300);
                        }
                    });
                });
            </script>

        </div>
        </div>
    </body>
</html>
