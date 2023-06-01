<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no"/>
    <meta name="description" content="<?=$title;?>">
    <meta name="author" content="<?=$site[0]->title;?>">
    <title><?=$site[0]->title;?> - <?=$title;?></title>

    <!---------------------------------------------------------------------------------------------- STYLESHEETS -->
    <link rel="icon" href="<?=base_url('uploads/'.$site[0]->favicon);?>">                                <!-- Browser Tab Icon -->
    <link href="front-end/bootstrap.min.css" rel="stylesheet">                    <!-- Bootstrap -->
    <link rel="stylesheet" href="front-end/font-awesome.min.css">                 <!-- Font-Awesome Icons -->
    <link rel="stylesheet" href="front-end/icomoon.min.css">                      <!-- iconmoon Icons -->
    <link rel="stylesheet" href="front-end/swiper.min.css">                       <!-- Carousel slider -->
    <link rel="stylesheet" href="front-end/style.css">                            <!-- Template CSS -->
    <link rel="stylesheet" href="front-end/animate.css">							<!-- Wow Animation CSS -->
    <link rel="stylesheet" href="front-end/google-fonts.css">                     <!-- Google font (Poppins) font face -->
    
    	<!-- Required CSS -->
	<link rel="stylesheet" type="text/css" href="front-end/shortcodes.css">
	<link rel="stylesheet" type="text/css" href="front-end/responsive.css">
	<script src="front-end/jquery1.js"></script>
	<!-- Required Scripts -->
	<script src="front-end/superfish.js"></script>
	<script src="front-end/jquery.sticky.js"></script>
	<script src="front-end/labora-custom.js"></script>
	<script src="front-end/jquery1.js"></script>
	
	<!-- PrettyPhoto -->
	<script src="front-end/jquery.prettyPhoto.js"></script>
	<link rel="stylesheet" type="text/css" href="front-end/prettyPhoto.css">
   
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">		<!-- Google font (Poppins)  -->
    
   <!-- Owl Carousel -->
	<link rel="stylesheet" type="text/css" href="front-end/owl.carousel.css">
	<script src="front-end/owl.carousel.js"></script>
	<script>
	jQuery(document).ready(function($) {
		$("#owl-20").owlCarousel({
		autoPlay: 3000,
		pagination : false,
		items : 5,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [1024,4],
		itemsTablet : [768,2],
		itemsMobile : [479,2]
		});
	});
	</script>
</head>
<body>

<!-- WRAPPER -->    <!-- Preloader -->
<div class="wrapper preloader" id="site-home">

    <!-- NAVIGATION AND SLIDER HOLDER -->
    <section class="site-holder" role="banner">

        <!-- HEADER -->
        <header class="site-header">

            <!-- STICKY HEADER -->
            <div class="sticky-header" id="sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-sm-4">

                            <!-- LOGO -->
                            <div class="site-logo">
                                <a href="index.html">
                                    <img src="<?=base_url('uploads/'.$site[0]->logo);?>" height="90" alt="Logo">
                                    <span></span>
                                </a>
                            </div>
                            <!-- END LOGO -->

                        </div>
                        <div class="col-xs-4 col-sm-8">

                            <!-- NAVIGATION -->
                            <nav class="site-nav" id="site-nav" role="navigation">
                                <!-- MOBILE VIEW BUTTON -->
                                <div class="nav-mobile">
                                    <i class="fa fa-bars show"></i>
                                    <i class="fa fa-close hide"></i>
                                </div>
                                <!-- LINKS -->
                                <ul class="nav-off-canvas">
                                    <!-- ACTIVE ITEM -->
                                    <li class="active"><a href="#site-home">Home</a></li>
                                    <li><a href="#amazing-features">Features</a></li>
                                    <li><a href="#site-quick-view">App Screens</a></li>
                                    <li><a href="#site-download">Download</a></li>
                                    <li><a href="#site-team">Team</a></li>
                                    <li><a href="#">Pages <i class="fa fa-angle-down"></i> </a>

                                        <!-- SUB MENU -->
                                        <ul class="site-sub-menu">
                                        	
                                            <li><a href="#amazing-features">About us</a></li>
                                            <li><a href="#site-testimonial">Testimonials</a></li>
                                            
                                        </ul>

                                    </li>
                                    <li><a href="#quick-support">Contact us</a></li>
                                    
                                </ul>
                            </nav>
                            <!-- END NAVIGATION -->

                        </div>
                    </div>
                </div>
            </div>

            <!-- START SLIDER -->
            <div id="header-slider" class="header-slider blue-purple-gredient">
                <ul class="seq-canvas">

                    <!-- SLIDE 1 -->
                    <li class="step1 slides">

                        <!-- MAIN IMAGE -->
                        <div class="bg-img" style="background-image: url(front-end/header-slide-1.png)"></div>

                        <!-- Caption -->
                        <div class="slide-caption">

                            <!-- H1 Heading -->
                            <h1></h1>

                            <!-- H2 Heading -->
                            <h2>Urban Tasting Food Company</h2>

                            <!-- Paragraph -->
                            <p>
                                We supply freshly prepared food to corporate offices any where in and around hyderabad city.<br>  We Urban Tasting Food Company can proudly say we are best food suppliers</br> maintaing High Quality & Good hygiene.
                            </p>

                            <!-- Buttons -->
                            <a href="https://play.google.com/store/apps/details?id=com.vita.utaste&pli=1" target="_blank" class="slide-button slide-button-active">Download</a>

                            <!-- Button -->
                            <a href="#" class="slide-button">Learn more</a>

                        </div>

                    </li>

                    <!-- SLIDE 2 -->
                    <li class="step2 slides">

                        <!-- MAIN IMAGE -->
                        <div class="bg-img" style="background-image: url(front-end/header-slide-2.png)"></div>

                        <!-- Caption -->
                        <div class="slide-caption">

                            <!-- H1 Heading -->
                            <h1></h1>

                            <!-- H2 Heading -->
                            <h2>Employees can Login through App</h2>

                            <!-- Paragraph -->
                            <p>
                                Through our app the employees can simply Login and select his branch and </br>book the lunch/sancks/dinner. He can even cancel it after booking also.
                            </p>


                            <!-- Buttons -->
                            <a href="https://play.google.com/store/apps/details?id=com.vita.utaste&pli=1" target="_blank" class="slide-button slide-button-active">Download </a>

                            <!-- Button -->
                            <a href="#" class="slide-button">Learn more</a>

                        </div>

                    </li>

                    <!-- SLIDE 3 -->
                    <li class="step3 slides">

                        <!-- MAIN IMAGE -->
                        <div class="bg-img" style="background-image: url(front-end/header-slide-3.png)"></div>

                        <!-- Caption -->
                        <div class="slide-caption">

                            <!-- H1 Heading -->
                            <h1></h1>

                            <!-- H2 Heading -->
                            <h2>Book your Lunch & Dinner with ease</h2>

                            <!-- Paragraph -->
                            <p>
                               Now your employees can book their lunch & dinner directly through app
                            </p>


                            <!-- Buttons -->
                            <a href="https://play.google.com/store/apps/details?id=com.vita.utaste&pli=1" target="_blank" class="slide-button slide-button-active">Download </a>

                            <!-- Button -->
                            <a href="#" class="slide-button">Learn more</a>

                        </div>

                    </li>

                    <!-- SLIDE 4 -->
                    <li class="step4 slides">

                        <!-- MAIN IMAGE -->
                        <div class="bg-img" style="background-image: url(front-end/header-slide-4.png)"></div>

                        <!-- Caption -->
                        <div class="slide-caption">

                            <!-- H1 Heading -->
                            <h1></h1>

                            <!-- H2 Heading -->
                            <h2>Book & Cancel the Food through App</h2>

                            <!-- Paragraph -->
                            <p>
                                Just login into our app and book the lunch & dinner within required dates.
                            </p>

                            <!-- Buttons -->
                            <a href="https://play.google.com/store/apps/details?id=com.vita.utaste&pli=1" target="_blank" class="slide-button slide-button-active">Download now</a>

                            <!-- Button -->
                            <a href="#" class="slide-button">Learn more</a>

                        </div>

                    </li>

                </ul>

               

                <!-- NAVIGATION -->
                <button type="button" class="seq-next"><span class="icon-play"></span></button>
                <button type="button" class="seq-prev"><span class="icon-play-flip"></span></button>

            </div>

        </header>
        <!-- END HEADER -->

    </section>

    <!-- STORE ICONS -->
    <section class="site-store-icons" style="display:none;">
        <div class="align-center">

            <!-- BUTTON 1 -->
            <a href="#">
                <!-- FIGURE -->
                <figure><i class="fa fa-mobile"></i></figure>
                <!-- h6 heading -->
                <h6>Available on the</h6>
                <!-- h5 -->
                <h5>iOS App Store</h5>
            </a>

            <!-- BUTTON 2 -->
            <a href="#">
                <!-- FIGURE -->
                <figure><img src="front-end/store-google-icon.png" alt="store icon"></figure>
                <!-- h6 heading -->
                <h6>Available on the</h6>
                <!-- h5 -->
                <h5>Google Store</h5>
            </a>

            <!-- BUTTON 3 -->
            <a href="#">
                <!-- FIGURE -->
                <figure><i class="fa fa-windows adjust"></i></figure>
                <!-- h6 heading -->
                <h6>Available on the</h6>
                <!-- h5 -->
                <h5>Windows Store</h5>
            </a>

        </div>
    </section>

    <!-- AMAZING FEATURES -->
    <section id="amazing-features" class="site-amazing-features section-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- H1 HEADING -->
                    <h1>Amazing Features</h1>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4">

                            <!-- FEATURE 1 -->
                            <div class="features move wow fadeInDown" data-wow-duration="1s">
                                <!-- ICON -->
                                <figure><span class=""> <img src="front-end/feature1.png" alt="feature1"> </span></figure>
                                <!-- H5 HEADING -->
                                <h5>Mobile App</h5>
                                <!-- PARAGRAPH -->
                                <p>Through our Mobile appp Employees can book their Food and also cancel it. By which we serve only to the required people saving the food & money.</p>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-4">

                            <!-- FEATURE 2 -->
                            <div class="features wow fadeInDown" data-wow-duration="2s">
                                <!-- ICON -->
                                <figure><span class=""><img src="front-end/feature2.png" alt="feature2"></span></figure>
                                <!-- H5 HEADING -->
                                <h5>Healthy & Hygiene</h5>
                                <!-- PARAGRAPH -->
                                <p>We serve the Hot, Healthy & High Quality Delicous Food  completely prepared under hygiene conditions with Quality Ingredients & Fresh Vegetables.</p>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-4">

                            <!-- FEATURE 3 -->
                            <div class="features move wow fadeInDown" data-wow-duration="3s">
                                <!-- ICON -->
                                <figure><span class=""> <img src="front-end/feature3.png" alt="feature3"></span></figure>
                                <!-- H5 HEADING -->
                                <h5>Events</h5>
                                <!-- PARAGRAPH -->
                                <p>We also serve for Corporate Events & Seminars with Customized Menu & Delicacies. Chineese & Continetntal Food also will be served by us. </p>
                            </div>

                        </div>
                        <div class="col-xs-12">

                            <!-- Mobile PICTURE -->
                            <figure class="device wow fadeInUp" data-wow-duration="3s">
                                <img src="front-end/features-mobile.png" alt="Device">
                            </figure>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <!-- ABOUT APP -->
    <section id="about-smart" class="site-about-app left-heading section-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
					
                    <div class="about-half-colom-section">
    	            	<!-- H1 HEADING -->
	                    <h1>About Urban Tasting Food Company</h1>    
                        <div class="about-half-colom-section-content">
                        	<p>
                           In 2008 we established Annapurna Food Suppliers  & started supplying food for the Events & Parties.Recently we changed our name to Urban Tasting Food Company added the service to the Corporates. Urban Tasting Food Company starts it journey with cause of delivering healthy,hygiene & tasty food for the corporate. As we all know that corporate involves in handling lot of work pressures and deadlines having the impact on their health. An improper food can degrade their health. Good food can make them Healthy and Enthusiastic. Employees are a company wealth, as health of employee will  be added to the company's wealth. From our Life Experiences we decided to deliver a good food for the employees making them not only healthy but more dedicated to work for the company. We also deliver the food for Corporate Events & Seminars with a customised & Continental Delicacies.

                            </p>
                            
                            <section class="site-download-icons about-icon">
                        
                                    <!-- BUTTON 1 -->
									                                    <a href="https://apps.apple.com/us/app/urban-tasting-food-company/id6447290281?uo=4" target="_blank" class="app-download-icons">

                                        <!-- FIGURE -->
                                        <figure><i class="fa fa-mobile"></i></figure>
                                        <!-- h6 heading -->
                                        <h6>Available on the</h6>
                                        <!-- h5 -->
                                        <h5>iOS App Store</h5>
                                    </a>
                   
                                    <!-- BUTTON 2 -->
                                    <a href="https://play.google.com/store/apps/details?id=com.vita.utaste&pli=1" target="_blank" class="app-download-icons">
                                        <!-- FIGURE -->
                                        <figure><i class="fa fa-android"></i></figure>
                                        <!-- h6 heading -->
                                        <h6>Available on the</h6>
                                        <!-- h5 -->
                                        <h5>Google Store</h5>
                                    </a>
                        
    						</section>
                            
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                	<div class="about-half-colom-section-image wow fadeInRight" data-wow-duration="2s">
						<img src="front-end/about.png" alt="aboutimage">
                    </div>
                </div>
            </div>
        </div>
    </section>

	
    
        <!-- HOW IT WORKS -->
    <section class="site-how-it-works section-grey" id="how-it-works">
        <div class="container-fluid wide">
   

    <!-- DOWNLOAD -->
    <section id="site-download" class="site-download section-blue">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- H1 HEADING -->
                    <h1>App Download</h1>
                     <!-- DOWNLOAD ICONS -->
				    <section class="site-download-icons">
                        <div class="align-center">
                
                            <!-- BUTTON 1 -->
                            <a href="https://apps.apple.com/us/app/urban-tasting-food-company/id6447290281?uo=4" target="_blank" class="app-download-icons wow fadeInLeft" data-wow-duration="1s">
                                <!-- FIGURE -->
                                <figure><i class="fa fa-mobile"></i></figure>
                                <!-- h6 heading -->
                                <h6>Available on the</h6>
                                <!-- h5 -->
                                <h5>iOS App Store</h5>
                            </a>
                
                            <!-- BUTTON 2 -->
                            <a href="https://play.google.com/store/apps/details?id=com.vita.utaste&pli=1" target="_blank" class="app-download-icons wow fadeInDown" data-wow-duration="2s">
                                <!-- FIGURE -->
                                <figure><i class="fa fa-android"></i></figure>
                                <!-- h6 heading -->
                                <h6>Available on the</h6>
                                <!-- h5 -->
                                <h5>Google Store</h5>
                            </a>
                
                           </div>
                
                        </div>
    				</section>

                </div>
            </div>
        </div>
    </section>

    <!-- QUICK VIEW -->
    <section class="site-quick-view section-white" id="site-quick-view">
        <div class="container-fluid wide">
            <div class="row">
                <div class="col-sm-12">

                    <!-- heading -->
                    <h1>Quick App View</h1>

                    <!-- Slider main container -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="swiper-container" id="quick-view-slider">

                                    <!-- Additional required wrapper -->
                                    <ul class="swiper-wrapper">

                                        <!-- slide 1 -->
                                        <li class="swiper-slide">
                                            <!-- box URL -->
                                            <a href="#" class="box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/quick-view-1.png" alt="Image">
                                                </figure>
                                            </a>
                                        </li>

                                        <!-- slide 2 -->
                                        <li class="swiper-slide">
                                            <!-- box URL -->
                                            <a href="#" class="box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/quick-view-2.png" alt="Image">
                                                </figure>
                                            </a>
                                        </li>

                                        <!-- slide 3 -->
                                        <li class="swiper-slide">
                                            <!-- box URL -->
                                            <a href="#" class="box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/quick-view-3.png" alt="Image">
                                                </figure>
                                            </a>
                                        </li>

                                        <!-- slide 4 -->
                                        <li class="swiper-slide">
                                            <!-- box URL -->
                                            <a href="#" class="box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/quick-view-4.png" alt="Image">
                                                </figure>
                                            </a>
                                        </li>
										<!-- slide 5 -->
                                        <li class="swiper-slide">
                                            <!-- box URL -->
                                            <a href="#" class="box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/quick-view-5.png" alt="Image">
                                                </figure>
                                            </a>
                                        </li>
										<!-- slide 6 -->
                                        <li class="swiper-slide">
                                            <!-- box URL -->
                                            <a href="#" class="box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/quick-view-6.png" alt="Image">
                                                </figure>
                                            </a>
                                        </li>
										
										<!-- slide 7 -->
                                        <li class="swiper-slide">
                                            <!-- box URL -->
                                            <a href="#" class="box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/quick-view-7.png" alt="Image">
                                                </figure>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div id="quick-view-prev" class="swiper-button-prev"><span class="icon-play-flip"></span></div>
                    <div id="quick-view-next" class="swiper-button-next"><span class="icon-play"></span></div>

                    <!-- If we need pagination -->
                    <div id="quick-view-paging" class="swiper-pagination visible-xs"></div>

                </div>
            </div>
        </div>
    </section>

   
  
    
    <!-- STATISTIC -->
    <section class="site-statistic section-white" id="site-statistic">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                    <!-- number -->
                    <div class="site-number">
                        <!-- icon -->
                        <div class="stat-icon"> <img src="front-end/cloud.png" alt="cloud"></div>
                        <!-- h5 heading -->
                        <h5 class="counter-count">1000 <span>K</span></h5>
                        <!-- paragraph -->
                        <p>App Download</p>
                    </div>
                    <!-- end -->
                </div>
                <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                    <!-- number -->
                    <div class="site-number">
                        <!-- icon -->
                        <div class="stat-icon"> <img src="front-end/thumbsup.png" alt="thumbsup"></div>
                        <!-- h5 heading -->
                        <h5 class="counter-count">50 <span>K</span></h5>
                        <!-- paragraph -->
                        <p>Liked our Food</p>
                    </div>
                    <!-- end -->
                </div>
                <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                    <!-- number -->
                    <div class="site-number">
                        <!-- icon -->
                        <div class="stat-icon"> <img src="front-end/users.png" alt="users"></div>
                        <!-- h5 heading -->
                        <h5 class="counter-count">95 <span>%</span></h5>
                        <!-- paragraph -->
                        <p>Return Customers</p>
                    </div>
                    <!-- end -->
                </div>
                <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                    <!-- number -->
                    <div class="site-number">
                        <!-- icon -->
                        <div class="stat-icon"> <img src="front-end/star.png" alt="star"></div>
                        <!-- h5 heading -->
                        <h5 class="counter-count">100 <span>+</span></h5>
                        <!-- paragraph -->
                        <p>Varities of Food</p>
                    </div>
                    <!-- end -->
                </div>

            </div>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="site-testimonial section-grey" id="site-testimonial">
        <div class="container-fluid wide">
            <div class="row">
                <div class="col-sm-12">
                	<!-- H1 HEADING -->
                    <h1>Trusted by 100+ clients</h1>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    	<div class="main-heading-text">
                        <p>We the urban tasting company promise of delivering the best food & service for the corporates
                        </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    </div>

                    <div class="clearfix"> </div>
                    <!-- Slider main container -->
                    <div class="container">
                        <div class="row">
                        	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="swiper-container" id="testimonial-slider">

                                    <!-- Additional required wrapper -->
                                    <ul class="swiper-wrapper">

                                        <!-- slide 1 -->
                                        <li class="swiper-slide">
                                        	<div class="swiper-slide-box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/testimonial-user.png" alt="User">
                                                </figure>
                                                <!-- user name -->
                                                <h5>Gurusaikamal Chinapaka</h5>
                                                <span class="testimonial-degignation">Sr. Software Engineer at Innova Solutions</span>
    
                                                <!-- paragraph -->
                                                <p>
                                                    I recently had the pleasure of experiencing Urban Tasting Food Company lunch service for a corporate event, and I must say, it was an exceptional culinary experience.The variety of options provided was impressive. There were options for both meat lovers and vegetarians, ensuring that all attendees could find something to enjoy.
                                                </p>
    
											</div>
                                            <div class="swiper-slide-back-box">
                                            </div>
                                        </li>
                                        <!-- slide 2 -->
                                        <li class="swiper-slide">
                                        	<div class="swiper-slide-box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/testimonial-user2.png" alt="User">
                                                </figure>
                                                <!-- user name -->
                                                <h5>Manideep Burugu</h5>
                                                <span class="testimonial-degignation">Business Analyst at Caliber Technologies</span>
    
                                                <!-- paragraph -->
                                                <p>
                                                    The flavors of the dishes were outstanding, showcasing the culinary expertise of the chefs. From the tender grilled chicken to the flavorful vegetable stir-fry, each bite was a delight.
                                                </p>
    
                                                
											</div>
                                            <div class="swiper-slide-back-box">
                                            </div>
                                        </li>
                                        <!-- slide 3 -->
                                        <li class="swiper-slide">
                                        	<div class="swiper-slide-box">
                                                <!-- image -->
                                                <figure>
                                                    <img src="front-end/testimonial-user3.png" alt="User">
                                                </figure>
                                                <!-- user name -->
                                                <h5>Indira Sappa</h5>
                                                <span class="testimonial-degignation">Associate Engineer at Commerce Cx</span>
    
                                                <!-- paragraph -->
                                                <p>
                                                    The service provided by the catering staff was exceptional. They were courteous, attentive, and efficient. They made sure that all attendees were taken care of, continuously replenishing the food stations and ensuring that everyone had what they needed.
                                                </p>
    
											</div>
                                            <div class="swiper-slide-back-box">
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            </div>
                        </div>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div id="testimonial-prev" class="swiper-button-prev hidden-lg"><span class="icon-play-flip"></span></div>
                    <div id="testimonial-next" class="swiper-button-next hidden-lg"><span class="icon-play"></span></div>

                    <!-- If we need pagination -->
                    <div id="testimonial-paging" class="swiper-pagination"></div>

                </div>
            </div>
        </div>
    </section>

       
                          
    
    
    
                    
                    
                   
    
        <!-- TWITTER -->
    <section class="site-twitter section-blue" id="site-twitter" style="display:none">
        <div class="container-fluid wide">
            <div class="row">
                <div class="col-xs-12">

                    <!--  H1 HEADING-->
                    <h1 class="heading-inverse">Tweet @ <strong>Start</strong></h1>

                    <!-- Slider main container -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                <div class="swiper-container" id="tweet-slider">

                                    <!-- Tweets -->
                                    <ul class="swiper-wrapper tweet"></ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div id="tweet-prev" class="swiper-button-prev hidden-lg"><span class="icon-play-flip"></span></div>
                    <div id="tweet-next" class="swiper-button-next hidden-lg"><span class="icon-play"></span></div>

                    <!-- If we need pagination -->
                    <div id="tweet-paging" class="swiper-pagination"></div>

                </div>
            </div>
        </div>
    </section>

    <!-- QUICK SUPPORT -->
    <section id="quick-support" class="site-quick-support section-white">
        <div class="container">
            <div class="contact-box blue-purple-gredient">
                <div class="col-xs-12">
					<div class="box">

                    <!-- INFO -->
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
	                    <div class="site-info">
                        <h5> Contact Info</h5>
                        <p>
                        </p>

                        <!-- BOX -->
                        <a href="tel:9985858959" class="site-box-row">
                            <!-- ICON -->
                            <h6><i class="fa fa-phone"></i> Call us </h6>
                            <!-- PARAGRAPH -->
                            <p>+91 9985858959</p>
                        </a>

                        <!-- BOX -->
                        <a href="mailto:support@urbantastingfoodcompany.com" class="site-box-row last">
                            <!-- ICON -->
                            <h6><i class="fa fa-envelope"></i> Email us</h6>
                            <!-- Mail -->
                            <p>support@urbantastingfoodcompany.com</p>
                        </a>
                        
                        <!-- BOX -->
                        <a target="_blank" href="#" class="site-box-row">
                            <!-- ICON -->
                            <h6><i class="fa fa-map-marker"></i> Location</h6>
                            <!-- ADDRESS -->
                            <address>Hyderabad</address>
                        </a>

                    </div>
                    </div>

                    <!-- CONTACT FORM -->
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    	<div class="site-info form">
	                    	<h5> Send us message! </h5>
		                    <form action="php/form.php" method="post" class="site-contact-form" id="myForm">
                            	<label>
									<input class="app-btn value-clear" type="text" name="app_name" placeholder="Name" required="required" >
                                </label>
                                
                                <label>
									<input class="app-btn value-clear" type="email" name="app_email" placeholder="Email" required="required">
								</label>
                                
                                <label>
									<input class="app-btn value-clear" type="tel" name="app_phone" placeholder="Phone" required="required">
								</label>
                                
                                <label>
									<input class="app-btn value-clear" type="url" name="app_website" placeholder="Website">
								</label>
                                
                                <label class="last">
									<textarea class="app-btn value-clear" name="app_message" placeholder="Message" required></textarea>
								</label>
                                
                                <label class="move">
									<button id="form-submit-btn" class="app-btn" type="submit">Submit <i class="fa fa-spin fa-spinner"></i></button>
								</label>
                    </form>
                    	</div>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </section>   
    <div id="wrapper">
   
    <div class="section_row clearfix " style="background-color:#e4ebef; padding: 40px 0;">
				<div class="section_inner">

					<div class="owl-wrapper">
						<div id="owl-20" class="owl-Carousel">

							<div class="owl-item">
								<div class="clientthumb">
									<a href="https://www.innovasolutions.com/" target="_blank"><figure><img alt="" src="front-end/innova.png"></figure></a>
									<span class="cl-title">Innova Solutions</span>
								</div>
							</div><!-- .owl-item-->

							<div class="owl-item">
								<div class="clientthumb">
									<a href="https://caliberuniversal.com/" target="_blank"><figure><img alt="" src="front-end/caliber.png"></figure></a>
									<span class="cl-title">Caliber Technologies</span>
								</div>
							</div><!-- .owl-item-->

							<div class="owl-item">
								<div class="clientthumb">
									<a href="https://commercecx.com/" target="_blank"><figure><img alt="" src="front-end/cx.png"></figure></a>
									<span class="cl-title">CommerceCX, India</span>
								</div>
							</div><!-- .owl-item-->

							<div class="owl-item">
								<div class="clientthumb">
									<a href="http://www.aaimsprotectionservices.com/" target="_blank"><figure><img alt="" src="front-end/aaims.png"></figure></a>
									<span class="cl-title">AAIMS Protection Services</span>
								</div>
							</div><!-- .owl-item-->

							


						</div><!-- .owlCarousel-->
					</div><!-- .owl-wrapper-->

				</div><!-- .section_inner-->
			</div><!-- .section_row-->

    <!-- FOOTER -->
    
    <footer class="site-footer section-blue">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                	<h1> Download App Now</h1>
					<!-- DOWNLOAD ICONS -->
				    <section class="site-download-icons">
                        <div class="align-center">
                
                            <!-- BUTTON 1 -->
                            <a href="https://apps.apple.com/us/app/urban-tasting-food-company/id6447290281?uo=4" target="_blank" class="app-download-icons wow fadeInDown" data-wow-duration="1s">
                                <!-- FIGURE -->
                                <figure><i class="fa fa-mobile"></i></figure>
                                <!-- h6 heading -->
                                <h6>Available on the</h6>
                                <!-- h5 -->
                                <h5>iOS App Store</h5>
                            </a>
                
                            <!-- BUTTON 2 -->
                            <a href="https://play.google.com/store/apps/details?id=com.vita.utaste&pli=1" target="_blank" class="app-download-icons wow fadeInDown" data-wow-duration="2s">
                                <!-- FIGURE -->
                                <figure><i class="fa fa-android"></i></figure>
                                <!-- h6 heading -->
                                <h6>Available on the</h6>
                                <!-- h5 -->
                                <h5>Google Store</h5>
                            </a>
                
                            
                
                        </div>
    				</section>
			
                    
                    <!-- END LOGO -->

                    <!-- SOCIAL ICONS -->
                    <div class="site-social-icons">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                    <!-- END SOCIAL ICONS -->

                    <!-- COPYRIGHT -->
                    <div class="site-copyright">
                        <p>© Copyright 2023. <a href="<?=base_url();?>" target="_blank">Urban Tasting Food Company</a></p>
                    </div>

                </div>
            </div>
        </div>
    </footer>

</div>
<!-- END WRAPPER -->

<!-------------------------------------------------------------------------- SCRIPTS -->
 <script>
	jQuery(document).ready(function($) {
		$("#owl-20").owlCarousel({
		autoPlay: 3000,
		pagination : false,
		items : 5,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [1024,4],
		itemsTablet : [768,2],
		itemsMobile : [479,2]
		});
	});
	</script>

<script src="front-end/jquery-1.12.4.min.js"></script>                         <!-- JQuery -->
<script src="front-end/loadingoverlay.min.js"></script>                        <!-- Preloader -->
<script src="front-end/swiper.jquery.min.js"></script>                         <!-- Carousel slider -->
<script src="front-end/jquery.mCustomScrollbar.concat.min.js"></script>        <!-- Custom scroll bar -->
<script src="front-end/modernizr-custom.min.js"></script>                      <!-- Modernizr -->
<script src="front-end/imagesloaded.pkgd.min.js"></script>                     <!-- Header Slider -->
<script src="front-end/hammer.min.js"></script>                                <!-- Header Slider -->
<script src="front-end/sequence.min.js"></script>                              <!-- Header Slider -->
<script src="front-end/tweetie.min.js"></script>                               <!-- Twitter Feed -->
<script src="front-end/jquery.countimator.min.js"></script>                    <!-- Counter -->
<script src="front-end/bootstrap.min.js"></script>                             <!-- Bootstrap -->
<script src="front-end/jquery.sticky.min.js"></script>                         <!-- Sticky Header -->
<script src="front-end/jquery.scrollUp.min.js"></script>                       <!-- scroll top -->
<script src="front-end/style.js"></script>                                     <!-- Template Changeable Plugin Options -->
<script src="front-end/wow.min.js"></script>									<!--Wow animation js -->


</body>
</html>