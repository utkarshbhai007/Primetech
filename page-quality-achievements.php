<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quality and Achievements | The Company | Primetech Industries</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="robots" content="index,follow">

        <?php include('./includes/header.inner.inc.php'); ?>
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
                            <h1><span>Quality and Achievements</span></h1>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-6">
                            <div id="breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $GLBHost; ?>">Home</a></li>
                                    <li><a href="javascript:;">The Company</a></li>
                                    <li class="active">Quality &amp; Achievements</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="content contact-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <p>QUALITY has always been of prime importance since the inception of the company - incessantly. Resources and human talents have been dedicated for manufacturing of modern machineries. Our machines are reliable, sturdy, efficient and ever satisfying to market needs, as exclusively high quality components are used for manufacturing.</p>
                            <p>With the consciousness for quality and constant technological upgrades, the company has gained very good reputation as OEM quality machinery supplier to many of giants of India.
                            </p>
                            <ul class="list">
                                <li>M/s. Windsor Machines Ltd.</li>
                                <li>M/s. Rollepaal Engineering India Pvt. Ltd. </li>
                                <li>M/s. Prasad Group Of Companies </li>
                                <li>M/s. Pharmalab Engineering India Ltd.</li>
                                <li>M/s. Rajoo Bausano Extrusion Pvt. Ltd.</li>
                                <li>M/s. Milacron India Ltd. </br> to name a few.</li>
                            </ul>
                            <p>Owing to the company's strict quality standards, the company is honoured by M/s. Windsor Machines Ltd. and M/s. Rollepaal Engineering India Limited with their most respected <span class="text-brown">QUALITY EXCELLENCE</span> awards for outstanding workmanship.</p><br>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/ISO-certificate.jpg" rel="gal" class="gallery" title="ISO Certificate"><img src="<?php echo $GLBHost; ?>images/ISO-certificate.jpg" class="img-responsive"><span class="zoom"></span></a>
                                <h5>ISO Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/db-certificate.jpg" rel="gal" class="gallery" title="D &amp; B Certificate"><img src="<?php echo $GLBHost; ?>images/db-certificate.jpg" class="img-responsive"><span class="zoom"></span></a>
                                <h5>D &amp; B Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/rollepaal-certificate.jpg" rel="gal" class="gallery" title="Rollepaal Certificate"><img src="<?php echo $GLBHost; ?>images/rollepaal-certificate.jpg" class="img-responsive"><span class="zoom"></span></a>
                                <h5>Rollepaal Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/windsor-certificate.jpg" rel="gal" class="gallery" title="Windsor Certificate"><img src="<?php echo $GLBHost; ?>images/windsor-certificate.jpg" class="img-responsive"><span class="zoom"></span></a>
                                <h5>Windsor Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/sintex-certificate.jpg" rel="gal" class="gallery" title="Sintex Certificate"><img src="<?php echo $GLBHost; ?>images/sintex-certificate.jpg" class="img-responsive"><span class="zoom"></span></a>
                                <h5>Sintex Certificate</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="gallery-outer">
                                <a href="<?php echo $GLBHost; ?>images/kipper-certificate.jpg" rel="gal" class="gallery" title="Skipper Limited"><img src="<?php echo $GLBHost; ?>images/kipper-certificate.jpg" class="img-responsive"><span class="zoom"></span></a>
                                <h5>Skipper Certificate</h5>
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
                        closeClick: true,
                    });

                });
            </script>
        </div>
        </div>
    </body>
</html>