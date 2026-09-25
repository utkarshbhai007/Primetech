<?php
include('./includes/include.inc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact | Primetech Industries</title>
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
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <h1><span>Contact</span></h1>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-6">
                            <div id="breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $GLBHost; ?>">Home</a></li>
                                    <li class="active">Contact</li>
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
                            <h2 class="title mt0"><span>Primetech</span> Industries</h2>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-md-push-8">
                            <img src="<?php echo $GLBHost; ?>images/the-company-pic.jpg" alt="" class="img-responsive center-block">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <div class="block">
                                        <div class="icon"><i class="sprite address"></i></div>
                                        <h3 class="title">Address</h3>
                                        <p><strong>Unit 1:</strong> Plot No. 4716 &amp; 4717, Phase 4,<br>Opp. Water Tank, GIDC Vatva,<br> Ahmedabad - 382 445.<br>Gujarat, India.</p>
                                        <p><strong>Unit 2:</strong> 3/2 &amp; 3/3, Panchratna Industrial Estate, Nr. Baroda Express Highway,<br> Ramol Over Bridge, Vatva, <br>Ahmedabad - 382 445.<br>Gujarat, India.</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <div class="block">
                                        <div class="icon"><i class="sprite call"></i></div>
                                        <h3 class="title">Phone</h3>
                                        <b>Mobile:</b> <br><a href="tel:+91-9687000743">+91-9687000743</a><br><a href="tel:+91-9687000757">+91-9687000757</a><br><a href="tel:+91-9081000745">+91-9081000745</a><br><a href="tel:+91-9898515858">+91-9898515858</a><br><a href="tel:+91-9824167062">+91-9824167062</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <div class="block">
                                        <div class="icon"><i class="sprite mail"></i></div>
                                        <h3 class="title">Email</h3>
                                        <p><a href="mailto:siddharth@primetechmixer.com">siddharth@primetechmixer.com</a> <a href="mailto:naren@primetechmixer.com">naren@primetechmixer.com</a> </p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <div class="block">
                                        <div class="icon"><i class="sprite web"></i></div>
                                        <h3 class="title">Website</h3>
                                        <p><a href="http://www.primetechmixer.com">www.primetechmixer.com</a></p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>    

            <?php include('./includes/bottom.inc.php'); ?>

            <script>

                $(document).ready(function () {
                    $("#main-menu #t-contact, #f-contact").addClass('active');
                });
            </script>

        </div>
        </div>
    </body>
</html>