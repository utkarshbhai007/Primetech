<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Infrastructure | Primetech Industries</title>
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
                    <div class="row">
                        <div class="col-xs-12">
                            <p>This is the basic source - <br>The capacity of people, their skill, their way of approach towards the job, the way of thinking, the way of designing the components and products.</p>
                            <p>The <span class="text-brown">equipments</span> from <span class="text-brown">PRIMETECH</span> present strong technological aspects derived from the ideas of thinking minds able who are able to work towards a common aim.  The success of any single project is also expressed in the satisfaction of all those people who have contributed to it.</p>
                            <p><span class="text-brown">PRIMETECH INDUSTRIES have three well-equipped manufacturing units</span></p>
                            <p>Factories of 1,00,000 sq. ft. are located in prime industrial area of Vatva, Ahmedabad. Entire infrastructure is well equipped with modern and sophisticated machineries and also heavy duty E.O.T. cranes to carry out big jobs. The company is well connected with Express way, National highway and approach roads.</p>
                            <p>The company possesses a good team of professional engineers and commercial team to manage the manufacturing operation, sales and marketing, after sales service, customer care department, etc.</p>
                        </div>
                        <div class="col-xs-12">
                            <h2 class="title mt0 text-small"><span>Unit 1</span></h2>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                            <div class="gallery-outer gallery-unit">
                                <a href="<?php echo $GLBHost; ?>images/unit-1 image.png" rel="gal-one" class="gallery" title="Unit 1"><img src="<?php echo $GLBHost; ?>images/unit-1 image.png" class="img-responsive" alt="Unit 1"><span class="zoom"></span></a>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <h2 class="title mt0 text-small"><span>Unit 2</span></h2>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                            <div class="gallery-outer gallery-unit">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit2-01.jpg" rel="gal-two" class="gallery" title="Unit 2"><img src="<?php echo $GLBHost; ?>images/gallery/unit2-01.jpg" class="img-responsive" alt="Unit 2"><span class="zoom"></span></a>
                            </div>
                        </div>                                              
                        <div class="col-xs-12">
                            <h2 class="title mt0 text-small"><span>Unit 3</span></h2>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                            <div class="gallery-outer gallery-unit">
                                <a href="<?php echo $GLBHost; ?>images/gallery/unit3-01.jpg" rel="gal-three" class="gallery" title="Unit 3"><img src="<?php echo $GLBHost; ?>images/gallery/unit3-01.jpg" class="img-responsive"><span class="zoom"></span></a>
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
