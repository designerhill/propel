<!-- main header -->
<header class="main-header">
    <div class="container">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="index.php"><img src="assets/images/logo.png" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'current' : ''; ?>"><a href="index.php"><span>Home</span></a></li>
                                <li><a href="buy-flats-apartments-properties-near-you.php"><span>Buy</span></a></li>
                                <li><a href="rent-flats-apartments-properties-near-you.php"><span>Rent</span></a></li>
                                <li class="dropdown"><a href="#"><span>Services</span></a>
                                    <ul>
                                        <li><a href="property-buying-assistance.php">Property Buying
                                                Assistance</a></li>
                                        <li><a href="property-selling-assistance.php">Property Selling
                                                Assistance</a></li>
                                        <li><a href="rental-leasing.php">Rental & Leasing</a></li>
                                        <li><a href="dsa.php">DSA</a></li>

                                    </ul>
                                </li>
                                <li><a href="signup.php"><span>Refer & Earn</span></a></li>
                                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'blog.php' || basename($_SERVER['PHP_SELF']) == 'blog-details.php' ? 'current' : ''; ?>"><a href="blog.php"><span>News & Updates</span></a></li>
                                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'current' : ''; ?>"><a href="contact.php"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="menu-right-content clearfix">
                    <div class="sign-box">
                        <?php
                if (isset($_SESSION['user'])) {
                    ?>
                        <a href="user/profile.php"><i class="fas fa-user"></i>My Profile</a>
                        <?php
                }
                else
                {
                    ?>
                        <a href="login.php"><i class="fas fa-user"></i>Sign In</a>&nbsp; / &nbsp;
                        <a href="signup.php"><i class="fas fa-user"></i>Sign Up</a>
                        <?php
                }
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->
<?php
include('mobile-menu.php');
?>
