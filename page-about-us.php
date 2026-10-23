<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About Us | Primetech Industries</title>
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
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="title mt0 text-small"><span>HISTORY</span></h2>
<!--                            <h4><span class="text-brown">COMPANY - M/s. PRIMETECH INDUSTRIES</span></h4>-->
                            <p>PRIMETECH, an ISO 9001:2015 company laid its foundation in 1991 with a strong vision of becoming a world class leader by delivering the ultimate quality products around the globe.</p>
                            <p>Primetech has come a long way to it's present establishment status as the leading producer of plastic processing equipments in India and have also started to make their presence felt in the global market.</p>
                            <p>Primetech maintains a cutting-edge by efficient R & D division to meet specialized technological challenges.</p>
                            <p>Total quality management systems relentlessly work towards achieving zero defect and failure free performance , leading to superior quality at remarkable competitive rates.</p>
                            <p>We make our know-how in mixing technology, material handling and transfer systems and size reduction technology available to the customer with the help of  goal oriented dynamic employees and close co-operation with customer specialists. Thus allowing us to develop leading edge technology.</p>
                            <p>Primetech owns a worldwide reputation as an innovative producer of machinery for the industry and developments that define the market of tomorrow and has modern manufacturing facility in Ahmedabad, Gujarat.</p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="box-outer">
                                <img src="<?php echo $GLBHost; ?>images/philosophy.jpg" class="img-responsive center-block">
                                <div class="box">
                                    <h4><span class="text-brown">Philosophy</span></h4>
                                    <p>A drive for excellence has helped the company in its notable growth. Enthusiasm and great passion have been infused in the company’s commitment philosophy.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="box-outer">
                                <img src="<?php echo $GLBHost; ?>images/vision.jpg" class="img-responsive center-block">
                                <div class="box">
                                    <h4><span class="text-brown">Vision</span></h4>
                                    <p>Customer satisfaction is our prime motto and we dream to create broad customer base with quality rapport amongst our valuable customers.</p>
                                </div>   
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="box-outer">
                                <img src="<?php echo $GLBHost; ?>images/mission.jpg" class="img-responsive center-block">
                                <div class="box">
                                    <h4><span class="text-brown">The Mission</span></h4>
                                    <p>To create and maintain responsibility towards customers, thereby paying attention to small details, innovation, accuracy, technology, quality and service.</p>
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <h2 class="title text-small"><span>Our Exports</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="exports-map-wrapper">
                                <img src="<?php echo $GLBHost; ?>images/our-exports-world-map.jpg" alt="Our Exports - World Map" class="img-responsive center-block">
                            </div>
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