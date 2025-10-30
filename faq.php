<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>propel - FAQ</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <?php include('header.php'); ?>



        

        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/background/cta-1.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>FAQ</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- faq-page-section -->
        <section class="faq-page-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="faq-content-side">
                            <div class="sec-title">
                                <h5>FAQ’S</h5>
                                <h2>Frequently Asked Questions.</h2>
                                <p> </p>
                            </div>
                            <ul class="accordion-box">
                                <li class="accordion block active-block">
                                    <div class="acc-btn active">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>What types of properties do you have?</h5>
                                    </div>
                                    <div class="acc-content current">
                                        <div class="content-box">
                                            <p>  We offer everything from affordable homes to luxurious properties, all with the best prices in your city.</p>
                                             
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>How do I know the prices are trustworthy?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>We work with reliable sellers to ensure all our property prices are transparent and competitive. </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                     <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>How can I get more details about a property?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>You can click on any listing for more details or just get in touch with us, and we’ll be happy to help! <p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                     <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Do you offer help with financing?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>We can connect you with financial experts who can guide you through financing options. <p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                     <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Can I schedule a viewing?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>Of course! Just contact us, and we’ll set up a time that works for you. <p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="faq-sidebar">
                            <div class="question-inner">
                                <div class="sec-title">
                                    <h5>Submit Question</h5>
                                    <h3>Ask Your Valuable Questions</h3>
                                </div>
                                <div class="form-inner">
                                    <form action="faq.html" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Your message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-page-section end -->


         

        <?php
      include('footer.php');
      ?>