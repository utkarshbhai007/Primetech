<header id="site-header">
    <div class="header-main-bar">
        <div class="container-fluid header-container">
            <div class="header-row">
                <!-- Brand Logo -->
                <div class="header-logo-col">
                    <div id="logo">
                        <a href="<?php echo $GLBHost; ?>">
                            <img src="<?php echo $GLBHost; ?>images/logo.jpg" alt="Primetech Industries">
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="header-nav-col">
                    <nav id="main-menu">
                        <ul class="nav-links">
                            <li id="t-home"><a href="<?php echo $GLBHost; ?>">Home</a></li>
                            <li id="t-company"><a href="<?php echo $GLBHost; ?>the-company/about-us/">About Us</a></li>
                            <li id="t-products" class="submenu-one has-mega-menu">
                                <a href="<?php echo $GLBHost; ?>products/">Products &nbsp;<i class="fa fa-angle-down"></i></a>
                                <div class="desktop-mega-menu">
                                    <div class="mega-col">
                                        <span class="mega-col-title"><i class="fa fa-cogs"></i> Mixing Solutions</span>
                                        <ul>
                                            <li><a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/">High Speed Heater Cooler Mixer</a></li>
                                            <li><a href="<?php echo $GLBHost; ?>products/horizontal-cooler/">Horizontal Cooler</a></li>
                                            <li><a href="<?php echo $GLBHost; ?>products/mixer/high-speed-mixer/">High Speed Mixer</a></li>
                                            <li><a href="<?php echo $GLBHost; ?>products/lab-mixer/">Lab Mixer</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-col">
                                        <span class="mega-col-title"><i class="fa fa-compress"></i> Size Reduction</span>
                                        <ul>
                                            <li><a href="<?php echo $GLBHost; ?>products/pulverizer/">Pulverizers</a></li>
                                            <li><a href="<?php echo $GLBHost; ?>products/granulators/">Granulators</a></li>
                                            <li><a href="<?php echo $GLBHost; ?>products/shredder/">Shredder</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-col">
                                        <span class="mega-col-title"><i class="fa fa-random"></i> Conveying & Automation</span>
                                        <ul>
                                            <li><a href="<?php echo $GLBHost; ?>products/spiral-conveyor/">Spiral Conveyor</a></li>
                                            <li><a href="<?php echo $GLBHost; ?>products/screw-conveyor/">Screw Conveyor</a></li>
                                            <li><a href="<?php echo $GLBHost; ?>products/gyro-vibrating-screen/">Gyro Vibrating Screen</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-col mega-featured-col">
                                        <div class="mega-featured-box">
                                            <div class="featured-img-wrap">
                                                <img src="<?php echo $GLBHost; ?>images/1st%20image%20to%20take%20.jpg" alt="High Speed Mixer" class="img-responsive">
                                            </div>
                                            <div class="featured-text-wrap">
                                                <h5>Precision Mixing Plants</h5>
                                                <p>High Performance & Custom Engineered Solutions</p>
                                                <a href="<?php echo $GLBHost; ?>products/" class="featured-link">Explore Products <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="t-infrastructure"><a href="<?php echo $GLBHost; ?>infrastructure/">Infrastructure</a></li>
                            <li id="t-enquiry"><a href="<?php echo $GLBHost; ?>enquiry/">Enquiry</a></li>
                            <li id="t-contact"><a href="<?php echo $GLBHost; ?>contact/">Contact</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Right Action Col -->
                <div class="header-action-col">
                    <a href="tel:+91-9081000745" class="header-phone-btn" title="Call Us">
                        <span class="phone-icon-circle"><i class="fa fa-phone"></i></span>
                        <span class="phone-meta">
                            <span class="phone-sub">Call Us</span>
                            <span class="phone-num">+91-9081000745</span>
                        </span>
                    </a>

                    <a href="<?php echo $GLBHost; ?>downloads/" class="header-download-btn" id="t-downloads">
                        <i class="fa fa-download"></i>
                        <span>Downloads</span>
                    </a>

                    <!-- Mobile Hamburger Button -->
                    <button type="button" class="mobile-toggle-btn" id="mobile-menu-icon" aria-label="Toggle Navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <!-- Sticky "Menu ☰" Button (visible on scroll down) -->
                    <button type="button" class="sticky-menu-btn" id="stickyMenuBtn" aria-label="Toggle Navigation">
                        <span class="sticky-menu-text">Menu</span>
                        <span class="sticky-menu-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Slide-Out Navigation Drawer -->
    <div class="sticky-menu-backdrop" id="stickyMenuBackdrop"></div>
    <div class="sticky-side-drawer" id="stickySideDrawer" aria-hidden="true">
        <div class="drawer-header">
            <div class="drawer-logo">
                <a href="<?php echo $GLBHost; ?>"><img src="<?php echo $GLBHost; ?>images/logo.jpg" alt="Primetech Industries"></a>
            </div>
            <button type="button" class="drawer-close-btn" id="drawerCloseBtn" aria-label="Close navigation">&times;</button>
        </div>
        <div class="drawer-body">
            <nav class="drawer-nav">
                <ul class="drawer-nav-list">
                    <li><a href="<?php echo $GLBHost; ?>">Home</a></li>
                    <li><a href="<?php echo $GLBHost; ?>the-company/about-us/">About Us</a></li>
                    <li class="drawer-has-dropdown">
                        <a href="javascript:;" class="drawer-dropdown-toggle">
                            <span>Products</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="drawer-submenu">
                            <li class="drawer-subgroup">
                                <span class="drawer-subgroup-title">Mixing Solutions</span>
                                <ul class="drawer-subgroup-list">
                                    <li><a href="<?php echo $GLBHost; ?>products/high-speed-heater-cooler-mixer/">High Speed Heater Cooler Mixer</a></li>
                                    <li><a href="<?php echo $GLBHost; ?>products/horizontal-cooler/">Horizontal Cooler</a></li>
                                    <li><a href="<?php echo $GLBHost; ?>products/mixer/high-speed-mixer/">High Speed Mixer</a></li>
                                    <li><a href="<?php echo $GLBHost; ?>products/lab-mixer/">Lab Mixer</a></li>
                                </ul>
                            </li>
                            <li class="drawer-subgroup">
                                <span class="drawer-subgroup-title">Size Reduction</span>
                                <ul class="drawer-subgroup-list">
                                    <li><a href="<?php echo $GLBHost; ?>products/pulverizer/">Pulverizers</a></li>
                                    <li><a href="<?php echo $GLBHost; ?>products/granulators/">Granulators</a></li>
                                    <li><a href="<?php echo $GLBHost; ?>products/shredder/">Shredder</a></li>
                                </ul>
                            </li>
                            <li class="drawer-subgroup">
                                <span class="drawer-subgroup-title">Conveying and Automation</span>
                                <ul class="drawer-subgroup-list">
                                    <li><a href="<?php echo $GLBHost; ?>products/spiral-conveyor/">Spiral Conveyor</a></li>
                                    <li><a href="<?php echo $GLBHost; ?>products/screw-conveyor/">Screw Conveyor</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo $GLBHost; ?>products/gyro-vibrating-screen/">Gyro Vibrating Screen</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $GLBHost; ?>infrastructure/">Infrastructure</a></li>
                    <li><a href="<?php echo $GLBHost; ?>enquiry/">Enquiry</a></li>
                    <li><a href="<?php echo $GLBHost; ?>contact/">Contact</a></li>
                    <li class="drawer-download-item">
                        <a href="<?php echo $GLBHost; ?>downloads/" class="drawer-download-link">
                            <i class="fa fa-download"></i> Downloads
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="drawer-footer">
                <div class="drawer-contact-item">
                    <i class="fa fa-phone"></i>
                    <a href="tel:+91-9081000745">+91-9081000745</a>
                </div>
                <div class="drawer-contact-item">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:marketing-3@primetechmixer.com">marketing-3@primetechmixer.com</a>
                </div>
            </div>
        </div>
    </div>
</header>