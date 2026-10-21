<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Why Primetech | Primetech Industries</title>
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
                            <h1><span>Why Primetech</span></h1>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-6">
                            <div id="breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $GLBHost; ?>">Home</a></li>
                                    <li><a href="<?php echo $GLBHost; ?>the-company/about-us/">About Us</a></li>
                                    <li class="active">Why Primetech</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h2 class="title mt0 text-small">We <span>Offer</span></h2>
                            <ul class="list">
                                <li>All bought - out items of internationally reputed brand.</li>
                                <li>Promising tool life with less wear rate comparatively at even higher filler loadings.</li>
                                <li>Long lasting bearing life through our proven Pneuma-seal technology.</li>
                                <li>Centralized lubrication port for easy maintenance and service of machine</li>
                                <li>Heavy and robust structure with integrated intelligent safety parameters.</li>
                                <li>In-house manufacturing of all key components under strict quality parameters and controls. </li>
                                <li>Highly finished and stress free components with latest technological and innovative methods of manufacturing</li>
                            </ul>
                    </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h2 class="title mt0 text-small">Your <span>Advantages</span></h2>
                            <ul class="list">
                                <li>High throughput rates.</li>
                                <li>Efficient production at lowest power consumption rates.</li>
                                <li>Highly reproducible and consistent powder quality thus minimizing the extrusion scrap rate.</li>
                                <li>Robust construction</li>
                                <li>Easy installation and service.</li>
                                <li>Maximum safety and user-friendly operation.</li>
                                <li>QUICK AND SMART service back- up with efficient trouble-shooting solutions. </li>
                                <li>Effective customized solutions.</li>
                                <li>Smooth and unmatched performance experience.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>    

            <?php include('./includes/bottom.inc.php'); ?>

            <script>

                $(document).ready(function () {
                    $("#main-menu #t-company, #f-company").addClass('active');
                });
            </script>

        </div>
        </div>
    </body>
</html>