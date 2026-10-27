<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About Us | Primetech Industries</title>
        <meta name="description" content="Learn about Primetech Industries - Leading manufacturer of high-speed industrial mixers, size reduction machinery, and conveying automation systems since 1991. ISO 9001:2015 certified company.">
        <meta name="keywords" content="About Primetech, Primetech Industries, History, Why Primetech, Quality and Achievements, Plastic Processing Machinery">
        <meta name="robots" content="index,follow">

        <?php include('./includes/header.inner.inc.php'); ?>

        <style>
            .about-intro-lead {
                font-size: 16px;
                line-height: 1.7;
                color: #334155;
                margin-bottom: 16px;
            }
            .about-highlight-badge {
                display: inline-block;
                background: rgba(173, 23, 30, 0.08);
                color: #ad171e;
                font-weight: 700;
                font-size: 12px;
                padding: 4px 14px;
                border-radius: 20px;
                border: 1px solid rgba(173, 23, 30, 0.2);
                margin-bottom: 12px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .about-pillars {
                margin: 30px 0 45px;
                display: flex;
                flex-wrap: wrap;
            }
            .about-pillars > [class*="col-"] {
                display: flex;
                flex-direction: column;
            }
            .about-pillar-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0,0,0,0.05);
                transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                margin-bottom: 25px;
                height: 100%;
                width: 100%;
                display: flex;
                flex-direction: column;
            }
            .about-pillar-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 28px rgba(173, 23, 30, 0.12);
                border-color: #ad171e;
            }
            .pillar-icon-header {
                background: linear-gradient(135deg, #fdf8f8 0%, #f7ebeb 100%);
                border-bottom: 1px solid #f1dede;
                padding: 30px 20px 24px;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .pillar-icon-circle {
                width: 72px;
                height: 72px;
                border-radius: 50%;
                background: #ad171e;
                color: #ffffff;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 32px;
                box-shadow: 0 6px 18px rgba(173, 23, 30, 0.25);
                transition: transform 0.3s ease, background-color 0.3s ease;
            }
            .about-pillar-card:hover .pillar-icon-circle {
                transform: scale(1.1);
                background: #8b0f15;
            }
            .about-pillar-card .pillar-body {
                padding: 24px 22px 26px;
                flex-grow: 1;
            }
            .about-pillar-card .pillar-body h4 {
                font-size: 21px;
                font-weight: 700;
                color: #ad171e;
                margin: 0 0 12px;
                font-family: 'Titillium Web', sans-serif;
            }
            .about-pillar-card .pillar-body p {
                font-size: 14px;
                line-height: 1.65;
                color: #4a5568;
                margin: 0;
            }

            /* Why Primetech Section */
            .why-section-box {
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 14px;
                padding: 30px 25px;
                margin-bottom: 30px;
                height: calc(100% - 30px);
                box-shadow: 0 4px 14px rgba(0,0,0,0.04);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .why-section-box:hover {
                box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            }
            .why-section-header {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 2px solid #e2e8f0;
            }
            .why-icon-circle {
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background: #ad171e;
                color: #ffffff;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                flex-shrink: 0;
            }
            .why-section-header h3 {
                margin: 0;
                font-size: 22px;
                font-weight: 700;
                color: #1a202c;
                font-family: 'Titillium Web', sans-serif;
            }
            .why-feature-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .why-feature-list li {
                position: relative;
                padding-left: 28px;
                margin-bottom: 14px;
                font-size: 14px;
                line-height: 1.55;
                color: #334155;
            }
            .why-feature-list li:before {
                content: "\f00c";
                font-family: FontAwesome;
                position: absolute;
                left: 0;
                top: 2px;
                color: #ad171e;
                font-size: 13px;
                font-weight: 900;
            }

            /* OEM Partners & Quality Excellence Award Banner */
            .award-banner-box {
                background: linear-gradient(135deg, #ad171e 0%, #780f12 100%);
                color: #ffffff;
                border-radius: 12px;
                padding: 24px 30px;
                margin: 25px 0 35px;
                box-shadow: 0 8px 24px rgba(173, 23, 30, 0.25);
            }
            .award-banner-box h4 {
                color: #ffffff;
                font-size: 21px;
                font-weight: 700;
                margin: 0 0 10px;
                display: flex;
                align-items: center;
                gap: 12px;
            }
            .award-banner-box p {
                color: #fce7e7;
                font-size: 14.5px;
                line-height: 1.6;
                margin: 0;
            }
            .oem-partner-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 14px;
                margin: 20px 0 30px;
            }
            .oem-partner-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-left: 4px solid #ad171e;
                border-radius: 8px;
                padding: 14px 16px;
                font-size: 14px;
                font-weight: 600;
                color: #1e293b;
                box-shadow: 0 2px 6px rgba(0,0,0,0.03);
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .oem-partner-card i {
                color: #ad171e;
                font-size: 16px;
            }

            /* Certificate Gallery */
            .cert-grid-wrapper {
                margin: 25px 0 45px;
            }
            .gallery-outer {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 10px;
                padding: 12px;
                text-align: center;
                box-shadow: 0 3px 12px rgba(0,0,0,0.04);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                margin-bottom: 25px;
            }
            .gallery-outer:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            }
            .gallery-outer .gallery {
                display: block;
                position: relative;
                overflow: hidden;
                border-radius: 6px;
            }
            .gallery-outer .gallery img {
                transition: transform 0.4s ease;
                width: 100%;
                height: 220px;
                object-fit: contain;
                background: #f8fafc;
                padding: 6px;
            }
            .gallery-outer:hover .gallery img {
                transform: scale(1.05);
            }
            .gallery-outer h5 {
                margin: 12px 0 4px;
                font-size: 14px;
                font-weight: 700;
                color: #1e293b;
            }

            .section-heading-unified {
                position: relative;
                margin: 45px 0 25px;
                padding-bottom: 12px;
                border-bottom: 2px solid #e2e8f0;
            }
            .section-heading-unified:after {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 60px;
                height: 2px;
                background: #ad171e;
            }
            .section-heading-unified h2 {
                margin: 0;
                font-size: 26px;
                font-weight: 700;
                color: #1a202c;
                font-family: 'Titillium Web', sans-serif;
            }
            .section-heading-unified h2 span {
                color: #ad171e;
            }

            @media (max-width: 767px) {
                .why-section-box {
                    height: auto;
                }
                .about-pillar-card {
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

            <section id="inner-title" class="bg06">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h1><span>About Us</span></h1>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-6">
                            <div id="breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $GLBHost; ?>">Home</a></li>
                                    <li class="active">About Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container">
                    
                    <!-- ==========================================
                         1. COMPANY HISTORY & OVERVIEW
                         ========================================== -->
                    <div class="row">
                        <div class="col-xs-12">
                            <span class="about-highlight-badge"><i class="fa fa-certificate"></i> Founded 1991 &bull; ISO 9001:2015 Certified</span>
                            <h2 class="title mt0 text-small"><span>Company Profile &amp; History</span></h2>
                            
                            <p class="about-intro-lead"><strong>PRIMETECH</strong>, an ISO 9001:2015 certified enterprise, laid its foundation in 1991 with a strong vision of becoming a world-class leader by engineering and delivering ultimate quality plastic processing machinery across the globe.</p>
                            
                            <p>Primetech has evolved to its present premier establishment status as a leading manufacturer of advanced plastic processing equipment in India, while continuously expanding its footprint across international markets. Our modern manufacturing facility in Ahmedabad, Gujarat, is equipped with high-precision fabrication, assembly, and testing infrastructure.</p>
                            
                            <p>We maintain an agile edge through our dedicated <strong>Research &amp; Development (R&amp;D)</strong> division, meeting specialized technological challenges with cutting-edge engineering solutions. Total Quality Management (TQM) systems relentlessly drive towards zero-defect and failure-free performance, delivering superior machinery at remarkably competitive investment costs.</p>
                            
                            <p>With deep technical know-how in high-speed industrial mixing technology, automated bulk material handling and conveying systems, and precision size reduction technology, our dynamic engineers work in close collaboration with client specialists to customize solutions that define industry standards for tomorrow.</p>
                        </div>
                    </div>

                    <!-- ==========================================
                         2. CORE PILLARS: PHILOSOPHY, VISION, MISSION
                         ========================================== -->
                    <div class="row about-pillars">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="about-pillar-card">
                                <div class="pillar-icon-header">
                                    <div class="pillar-icon-circle">
                                        <i class="fa fa-lightbulb-o"></i>
                                    </div>
                                </div>
                                <div class="pillar-body">
                                    <h4>Philosophy</h4>
                                    <p>A relentless drive for excellence has driven the company's remarkable growth. Enthusiasm, engineering integrity, and passion form the foundation of our commitment to every client.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="about-pillar-card">
                                <div class="pillar-icon-header">
                                    <div class="pillar-icon-circle">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                                <div class="pillar-body">
                                    <h4>Vision</h4>
                                    <p>Customer satisfaction is our prime motto. We aspire to build enduring global client relationships benchmarked on trust, technology leadership, and prompt support.</p>
                                </div>   
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="about-pillar-card">
                                <div class="pillar-icon-header">
                                    <div class="pillar-icon-circle">
                                        <i class="fa fa-bullseye"></i>
                                    </div>
                                </div>
                                <div class="pillar-body">
                                    <h4>The Mission</h4>
                                    <p>To deliver uncompromising quality by paying utmost attention to small details, continuous innovation, manufacturing accuracy, safety, and lifelong service dependability.</p>
                                </div>    
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                         3. WHY PRIMETECH: OFFERINGS & ADVANTAGES
                         ========================================== -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-heading-unified">
                                <h2>Why <span>Primetech</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="why-section-box">
                                <div class="why-section-header">
                                    <div class="why-icon-circle"><i class="fa fa-cogs"></i></div>
                                    <h3>What We Offer</h3>
                                </div>
                                <ul class="why-feature-list">
                                    <li><strong>Reputed Global Components:</strong> All bought-out components from internationally renowned, trusted brands.</li>
                                    <li><strong>Extended Tool Life:</strong> Promising tool longevity with minimal wear rate, even under intense filler loadings.</li>
                                    <li><strong>Proven Pneuma-Seal:</strong> Extended bearing life backed by our proprietary Pneuma-seal technology.</li>
                                    <li><strong>Centralized Lubrication:</strong> Convenient lubrication ports for effortless maintenance and servicing.</li>
                                    <li><strong>Heavy &amp; Robust Construction:</strong> Sturdy structural frames with integrated intelligent safety parameters.</li>
                                    <li><strong>In-House Manufacturing:</strong> Complete in-house fabrication of key parts under strict quality control.</li>
                                    <li><strong>Stress-Free Components:</strong> Highly finished, precision-machined parts utilizing modern manufacturing methods.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="why-section-box">
                                <div class="why-section-header">
                                    <div class="why-icon-circle"><i class="fa fa-line-chart"></i></div>
                                    <h3>Your Advantages</h3>
                                </div>
                                <ul class="why-feature-list">
                                    <li><strong>High Throughput Rates:</strong> Maximum output capacity with continuous operational reliability.</li>
                                    <li><strong>Lowest Power Consumption:</strong> Energy-efficient design minimizing overall kilowatt per ton costs.</li>
                                    <li><strong>Consistent Powder Quality:</strong> Highly reproducible, homogeneous blend minimizing extrusion scrap.</li>
                                    <li><strong>Robust Working Life:</strong> Heavy-duty industrial build designed for multi-shift continuous duty.</li>
                                    <li><strong>Easy Installation:</strong> Quick plug-and-operate setup with comprehensive operational documentation.</li>
                                    <li><strong>Safe &amp; User-Friendly:</strong> Intuitive operator controls and fail-safe safety interlocks.</li>
                                    <li><strong>Quick &amp; Smart Service:</strong> Fast technical response with proactive troubleshooting solutions.</li>
                                    <li><strong>Tailored Engineering:</strong> Customized design configurations engineered for specific client processes.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                         4. QUALITY STANDARDS & OEM ACHIEVEMENTS
                         ========================================== -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-heading-unified">
                                <h2>Quality &amp; <span>Achievements</span></h2>
                            </div>
                            <p>QUALITY has always been of prime importance since the inception of the company. Comprehensive resources and dedicated technical talents have been committed to manufacturing state-of-the-art machinery. Our equipment is dependable, robust, energy-efficient, and engineered using premium certified components.</p>
                            
                            <p>Through unwavering quality consciousness and constant technological advancements, Primetech has earned an impeccable reputation as a trusted OEM machinery partner to industry leaders across India and abroad.</p>
                            
                            <!-- OEM Clients Grid -->
                            <div class="oem-partner-grid">
                                <div class="oem-partner-card"><i class="fa fa-building-o"></i> M/s. Windsor Machines Ltd.</div>
                                <div class="oem-partner-card"><i class="fa fa-building-o"></i> M/s. Rollepaal Engineering India Pvt. Ltd.</div>
                                <div class="oem-partner-card"><i class="fa fa-building-o"></i> M/s. Prasad Group Of Companies</div>
                                <div class="oem-partner-card"><i class="fa fa-building-o"></i> M/s. Pharmalab Engineering India Ltd.</div>
                                <div class="oem-partner-card"><i class="fa fa-building-o"></i> M/s. Rajoo Bausano Extrusion Pvt. Ltd.</div>
                                <div class="oem-partner-card"><i class="fa fa-building-o"></i> M/s. Milacron India Ltd.</div>
                            </div>

                            <!-- Quality Excellence Awards Banner -->
                            <div class="award-banner-box">
                                <h4><i class="fa fa-trophy" style="color: #ffd700;"></i> Quality Excellence Recognitions</h4>
                                <p>Reflecting our rigorous manufacturing discipline and zero-defect philosophy, Primetech has been repeatedly honoured by industry giants including <strong>M/s. Windsor Machines Ltd.</strong> and <strong>M/s. Rollepaal Engineering India Limited</strong> with their prestigious <strong>QUALITY EXCELLENCE AWARDS</strong> for outstanding workmanship and supply excellence.</p>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                         5. CERTIFICATES & ACCREDITATIONS GALLERY
                         ========================================== -->
                    <div class="row cert-grid-wrapper">
                        <div class="col-xs-12">
                            <h3 style="font-size: 20px; font-weight: 700; color: #1a202c; margin-bottom: 20px; font-family: 'Titillium Web', sans-serif;">
                                <i class="fa fa-check-square-o" style="color:#ad171e;"></i> Certifications &amp; Accreditations
                            </h3>
                        </div>

                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/ISO-certificate.jpg" rel="gal" class="gallery" title="ISO 9001:2015 Certificate - Primetech Industries">
                                    <img src="<?php echo $GLBHost; ?>images/ISO-certificate.jpg" alt="ISO Certificate" class="img-responsive">
                                    <span class="zoom"></span>
                                </a>
                                <h5>ISO Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/db-certificate.jpg" rel="gal" class="gallery" title="Dun &amp; Bradstreet Certificate">
                                    <img src="<?php echo $GLBHost; ?>images/db-certificate.jpg" alt="D &amp; B Certificate" class="img-responsive">
                                    <span class="zoom"></span>
                                </a>
                                <h5>D &amp; B Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/rollepaal-certificate.jpg" rel="gal" class="gallery" title="Rollepaal Quality Excellence Certificate">
                                    <img src="<?php echo $GLBHost; ?>images/rollepaal-certificate.jpg" alt="Rollepaal Certificate" class="img-responsive">
                                    <span class="zoom"></span>
                                </a>
                                <h5>Rollepaal Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/windsor-certificate.jpg" rel="gal" class="gallery" title="Windsor Quality Excellence Certificate">
                                    <img src="<?php echo $GLBHost; ?>images/windsor-certificate.jpg" alt="Windsor Certificate" class="img-responsive">
                                    <span class="zoom"></span>
                                </a>
                                <h5>Windsor Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/sintex-certificate.jpg" rel="gal" class="gallery" title="Sintex Certificate">
                                    <img src="<?php echo $GLBHost; ?>images/sintex-certificate.jpg" alt="Sintex Certificate" class="img-responsive">
                                    <span class="zoom"></span>
                                </a>
                                <h5>Sintex Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/kipper-certificate.jpg" rel="gal" class="gallery" title="Skipper Limited Certificate">
                                    <img src="<?php echo $GLBHost; ?>images/kipper-certificate.jpg" alt="Skipper Certificate" class="img-responsive">
                                    <span class="zoom"></span>
                                </a>
                                <h5>Skipper Certificate</h5>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                         6. GLOBAL EXPORTS & WORLDWIDE REACH
                         ========================================== -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-heading-unified">
                                <h2>Our Global <span>Exports</span></h2>
                            </div>
                            <p>With an ever-expanding international customer base, Primetech exports high-performance machinery across Asia, the Middle East, Africa, and beyond.</p>
                            <div class="exports-map-wrapper">
                                <img src="<?php echo $GLBHost; ?>images/world-map.jpeg" alt="Our Exports - World Map" class="img-responsive center-block">
                            </div>
                        </div>
                    </div>

                </div>
            </section>    

            <?php include('./includes/bottom.inc.php'); ?>

            <script src="<?php echo $GLBHost; ?>scripts/jquery.fancybox.js"></script>
            <script>
                $(document).ready(function () {
                    $("#main-menu #t-company, #f-company").addClass('active');
                    $('.gallery').fancybox({
                        openEffect: 'elastic',
                        openSpeed: 500,
                        closeEffect: 'elastic',
                        closeClick: true
                    });
                });
            </script>

        </div>
        </div>
    </body>
</html>