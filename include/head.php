<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Welcome to our online store!
                </div>
            </div>
            <div class="top-bar-right">
                <ul class="header-user-links">
                    <li>
                        <?php 
                        switchLoginLogout();
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="index.html">
                            <img src="images/logo.png" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form class="form-search form-search-width-category">
                            <div class="form-content">
                                <!-- <div class="category">
                                    <select title="cate" data-placeholder="All Categories" class="chosen-select" tabindex="1">
                                    <option>Select Category</option>
                                    <?php 
                                    //getCategoryNav();
                                    ?>
                                    </select> 

                                </div> -->

                               
                                <div class="inner zentimo-dropdown search-box">
                                    <input type="text" autocomplete="off" class="input" name="s" value placeholder="Search here" data-zentimo="zentimo-dropdown">
                                    <div class="zentimo-submenu result">
                                        
                                    </div>
                                    </div>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                                

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">
                        <div class="block-minicart zentimo-mini-cart block-header zentimo-dropdown">
                            <a href="cart.php" class="shopcart-icon">
                                Cart
                                <span class="count">
									<?php countCart(); ?>
									</span>
                            </a>
                           <!--  <div class="no-product zentimo-submenu">
                                <a href="cart.php">
                                <p class="text">
                                    You have
                                    <span>
                                             <?php
                                             countCart();?> item(s)
										</span>
                                    in your bag
                                </p></a>
                            </div> -->
                        </div>
                        <div class="block-account block-header zentimo-dropdown">
                            <a href="myaccount.php?myorders">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                            </a>
                            <div class="header-account zentimo-submenu">
                                <div class="header-user-form-tabs">
                                    <ul class="tab-link">
                                        <li class="active">
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                        </li>
                                    </ul>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
                                            <form method="post" class="login form-login">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <label class="form-checkbox">
                                                        <input type="checkbox" class="input-checkbox">
                                                        <span>
																Remember me
															</span>
                                                    </label>
                                                    <input type="submit" class="button" value="Login">
                                                </p>
                                                <p class="lost_password">
                                                    <a href="#">Lost your password?</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div id="header-tab-rigister" class="tab-panel">
                                            <form method="post" class="register form-register">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" value="Register">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori">
                    <div class="block-title">
						<span class="icon-bar">
							<span></span>
							<span></span>
							<span></span>
						</span>
                        <span class="text">All Departments</span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <ul class="zentimo-nav-vertical vertical-menu zentimo-clone-mobile-menu">
                            <?php getCategoryNav1(); ?>
                        </ul>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="zentimo-clone-mobile-menu zentimo-nav main-menu " id="menu-main-menu">
                            <li class="menu-item">
                                <a href="index.php" class="zentimo-menu-item-title" title="Home">Home</a>    
                            </li>

                            <li class="menu-item">
                                <a href="about.php" class="zentimo-menu-item-title" title="About">About</a>
                            </li>


                            <li class="menu-item">
                                <a href="store.php" class="zentimo-menu-item-title" title="Store">Shop</a>
                            </li>

                            <li class="menu-item">
                                <a href="contact.php" class="zentimo-menu-item-title" title="Contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
                <a href="#">
                    <img src="images/logo.png" alt="img">
                </a>
            </div>
        </div>
        <div class="item item mobile-search-box has-sub">
            <a href="#">
						<span class="icon">
							<i class="fa fa-search" aria-hidden="true"></i>
						</span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="header-searchform-box">
                    <form class="header-searchform">
                        <div class="searchform-wrap zentimo-dropdown search-box">
                            <input type="text" class="search-input" placeholder="Enter keywords to search..."    data-zentimo="zentimo-dropdown">
                            <div class="zentimo-submenu result">
                                        
                                    </div>
                            <input type="submit" class="submit button" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
       <!--  <div class="item mobile-settings-box has-sub">
            <a href="#">
						<span class="icon">
							<i class="fa fa-cog" aria-hidden="true"></i>
						</span>
            </a>
        </div> -->
        <div class="item menu-bar">
            <a class=" mobile-navigation  menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>