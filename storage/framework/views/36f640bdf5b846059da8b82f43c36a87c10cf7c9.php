<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Saigon Star International School</title>
        <link href="/public/images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
      
        <!-- Bootstrap -->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet">
      
        <!-- Font-awesome -->
        <link href="/public/css/font-awesome.min.css" rel="stylesheet">
      
        <!-- Swiper -->
         <link href="/public/css/swiper.min.css" rel="stylesheet">

        <!-- nstSlider -->
        <link href="/public/css/jquery.nstSlider.css" rel="stylesheet"> 

        <!-- Teachers -->
        <link href="public/css/teacher.css" rel="stylesheet" >

        <!-- Style -->
        <link href="/public/css/style.css" rel="stylesheet">

        <!-- Responsive -->
        <link href="/public/css/responsive.css" rel="stylesheet">

        <!-- Style boostrap Backend-->
        <!-- Bootstrap CSS -->

        <!--- 31-07-2020 --->
        <link rel="stylesheet" href="\public\css\backend\bootstrap.css"/>
        <link rel="stylesheet" href="\public\css\backend\style.css"/> 
        <link rel="stylesheet" href="\public\css\backend\bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/themify-icons.css"/>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap-datetimepicker.min.css"/>

        
        <!-- End 31-07-2020-->
        <?php echo $__env->yieldPushContent('css'); ?>
    </head>
    <?php echo $__env->make('frontEnd.modals_form.book_tour', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontEnd.modals_form.complaint', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body id="scroll-top">

        <!-- Preloader start here -->
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- Preloader end here -->

        
        <!-- mobile menu start here -->
        <div class="mobile-menu-area">
            <div class="logo-area">
                <a class="logo" href="index.html"><img src="public/images/logo.png" alt="logo" class="img-responsive"></a>
                <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="mobile-menu">
                <ul class="m-menu">
                    <li><a href="<?php echo e(url('/')); ?>/home">Home</a></li>

                    <li class="dropdown-submenu" >
                        <a href="<?php echo e(url('/')); ?>/about" data-toggle="dropdown">About</a>
                        <ul class="mobile-submenu">
                            <li><a href="#">Our History</a></li>
                            <li><a href="#">Our Teachers</a></li>
                            <li><a href="#">Welcome from the Head of School</a></li>
                            <li><a href="#">Our Share Vision & Mission</a></li>
                            <li><a href="<?php echo e(url('/')); ?>/careers">Working at Saigon Star</a><li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu" data-toggle="dropdown">
                        <a href="<?php echo e(url('/')); ?>/course" data-toggle="dropdown">An International Curriculum</a>
                        <ul class="mobile-submenu">
                            <li><a href="#">Early Years (age 2-5)</a></li>
                            <li><a href="#">Primary Years (age 5-11)</a></li>
                            <li><a href="#">Middle Years (age 11-14)</a></li>
                            <li><a href="#">Pathways to University</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Parents' Essentials</a>
                        <ul class="mobile-submenu">
                            <li><a href="#">Admissions Process</a></li>
                            <li><a href="#">Online Enrolment Form</a></li>
                            <li><a href="#">Fees & Tuition</a></li>
                            <li><a href="#">Ages, Grades, Availability</a></li>
                            <li><a href="#">Book a Parent Tour</a></li>
 
                        </ul>
                    </li>
            
                    <li class="dropdown-submenu">
                        <a href="<?php echo e(url('/')); ?>/news-page" data-toggle="dropdown">Bulletin</a>
                        <ul class="mobile-submenu">
                            <li><a href="#">Summer Camp</a></li>
                            <li><a href="#">School Canteen</a></li>
                            <li><a href="#">Winter Camp</a></li>
                            <li><a href="#">On the Bus</a></li>
                            <li><a href="#">Student Council</a></li>
                            <li><a href="#">Extra Curricular</a></li>
                        </ul>
                    </li>
          
                    <li class="dropdown-submenu">
                        <a href="<?php echo e(url('/')); ?>/admissions" data-toggle="dropdown">Admissions</a>
                        <ul class="mobile-submenu">
                            <li><a href="<?php echo e(url('/')); ?>/admissions">Admissions</a></li>
                            <li><a href="<?php echo e(url('/')); ?>/enrolment">Enrolment</a></li>
                            <li><a href="#">Fees & Tuition</a></li>
                            <li><a href="#">Ages, Grades, Availability</a></li>
                            <li><a href="#"  class="nav-link"  data-toggle="modal" data-target="#booktour" data-whatever="@mdo">Book a tour</a></li>
                            <li class="nav-item">
                                <a href="#"  class="nav-link"  data-toggle="modal" data-target="#complaint" data-whatever="@mdo">Complaint</a>
                            </li>
                        </ul>
                    </li>
          
                    <li><a href="<?php echo e(url('/')); ?>/contact">Contact</a></li>
                </ul>
            </div>
        </div>
        <!-- mobile menu ending here -->

        <!-- header Start here -->
        <header>
            <div class="header-top">
                <div class="container">
                    <div class="row ht-area">
                        <ul class="left">
                            <li><a href="https://www.facebook.com/saigonstarschool/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://twitter.com/StarSaigon"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCcKlFmxYK5C6piLNe18hhRg"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li> <span class="line::before"></span></li>
                                      <a class="up" href="mailto:info@sgstar.edu.vn">info@sgstar.edu.vn</a>
                          
                        </ul>
                        <ul class="right">
                            <li><span><i class="fa fa-home" aria-hidden="true"></i></span> Address :  Su Hy Nhan Street, Residential Area No. 5, Thanh My Loi Ward, Dist.2 Ho Chi Minh City</li>
                            <li class ="up"><span><i class="fa fa-phone" aria-hidden="true"></i></span> Hotline : (+84)8 8800 6996</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="main-menu">
                <div class="container">
                    <div class="row no-gutters">
                        <nav class="main-menu-area w-100">
                            <div class="logo-area">
                                <a class="" href="home"><img src="/public/images/logo.png" alt="logo" class="img-responsive"></a>
                                <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="menu-area">

                                <ul class="menu">

                                    <li class="contact-header"><a href="<?php echo e(url('/')); ?>/home">Home</a></li>

                                    <li class="dropdown">
                                        <a href="<?php echo e(url('/')); ?>/about" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Our History</a></li>
                                            <li><a href="/teachers">Our Teachers</a></li>
                                            <li><a href="/schedule/view">School timetable</a></li> <!--LONG-->
                                                    <li><a href="http://labartisan.net/demo/kidsacademy-rtl">Welcome form the Head of School</a></li>
                                            <li><a href="#">Our Shared Vision & Mission</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/careers">Working at Saigon Star</a><li>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Menu 2</a></li>
                                                    <li><a href="#">Menu 2</a></li>
                                                    <li><a href="#">Menu 2</a></li>
                                                    <li><a href="#">Menu 2</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Menu 3</a></li>
                                                            <li><a href="#">Menu 3</a></li>
                                                            <li><a href="#">Menu 3</a></li>
                                                            <li><a href="#">Menu 3</a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="#">Menu 4</a></li>
                                                                    <li><a href="#">Menu 4</a></li>
                                                                    <li><a href="#">Menu 4</a></li>
                                                                    <li><a href="#">Menu 4</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="<?php echo e(url('/')); ?>/course" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">An International Curriculum<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Early Years (age 2-5)</a></li>
                                            <li><a href="#">Primary Years (age 5-11)</a></li>
                                            <li><a href="#">Middle Years (age 11-14)</a></li>
                                            <li><a href="#">Pathways to University</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="contact-header"><a href="#">Parents' Essentials</a></li>

                                    <li class="dropdown">
                                        <a href="<?php echo e(url('/')); ?>/news-page" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Bulletin<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Early Years (age 2-5)</a></li>
                                            <li><a href="#">Primary Years (age 5-11)</a></li>
                                            <li><a href="#">Middle Years (age 11-14)</a></li>
                                            <!-- <li><a href="#">Pathways to University</a></li> -->
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="<?php echo e(url('/')); ?>/admissions" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Admissions<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Admissions Process</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/enrolment">Enrolment</a></li>
                                            <li><a href="<?php echo e(url('/')); ?>/admissions">Fees & Tuition</a></li>
                                            <li><a href="#">Ages, Grades, Availability</a></li>
                                            <li><a href="#"  class="nav-link"  data-toggle="modal" data-target="#booktour" data-whatever="@mdo">Book a tour</a></li>
                                            <li class="nav-item">
                                                <a href="#"  class="nav-link"  data-toggle="modal" data-target="#complaint" data-whatever="@mdo">Complaint</a>
                                            </li>
                                        </ul>
                                    </li> 
                                    <li class="contact-header"><a href="<?php echo e(url('/')); ?>/contact">Contact</a></li>

                                </ul>
                                <form class="menu-search-form">
                                    <input type="text" name="search" placeholder="Search here...">
                                    <span class="menu-search-close"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </form>   
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- header End here -->

        <?php echo $__env->yieldContent('main_content'); ?>
    
        <?php echo $__env->yieldContent('script'); ?>

        <!-- footer start here -->
        <?php echo $__env->make('frontEnd.home.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- footer end here -->

        <div class="action_footer">
              <a  href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
              <a href="tel:(+84)8 8800 6996" style="color: white;font-size: 18px;"><i class="fa fa-phone"></i> <span>  &nbsp;(+84)8 8800 6996</span></a>
        </div>
        <div id="loading">
              <div class="lds-hourglass"></div>
        </div>

       

        <!-- jquery -->
        <script src="/public/js/jquery-1.12.4.min.js"></script>
        <!-- Bootstrap -->
        <script src="/public/js/bootstrap.min.js"></script>
      
      
        <!-- lightcase -->
        <script src="/public/js/lightcase.js"></script>
      
        <!-- counterup -->
        <script src="public/js/jquery.counterup.min.js"></script>
      
        <!-- Swiper -->
        <script src="/public/js/swiper.jquery.min.js"></script>

        <!--progress-->
        <script src="/public/js/circle-progress.min.js"></script>

        <!--nstSlider-->
        <script src="/public/js/jquery.nstSlider.js"></script>

        <!--flexslider-->
        <script src="/public/js/flexslider-min.js"></script>

        <!-- custom -->
        <script src="/public/js/custom.js"></script>

        <!-- 31-07-2020 -->
        <!-- <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script> -->
        <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap.min.js"></script>
        <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/moment.min.js"></script>
        <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>

        <!-- End 31-07-2020 -->

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;
            
            for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                panel.style.display = "none";
                } else {
                panel.style.display = "block";
                }
            });
            } 
        </script>
        <script type="text/javascript">
            jQuery(function($){  
            $("#bt_close").on("click", function() {
                $(".social_group").addClass("hidden");
                $("#bt_open").show();
            });
            $("#bt_open").on("click", function() {
                $(this).hide();
                $(".social_group").show();
                $(".social_group").removeClass("hidden");
            });

            $(".social_group").hover(            
                    function() {
                        $(this).toggleClass('open');        
                    },
                    function() {
                        $(this).toggleClass('open');       
                    }
                );
            });  

            $( document ).ready(function() {    
                $("#bs-example-navbar-collapse-1 .dropdown-menu li.active").parent().parent().addClass('active');
            $('#menutop li .i_mobile_ex').click(function(){
                console.log('ok');
            })
            });
        </script>
<script>
/* Check the location of each element */
$('.content').each( function(i){
  
  var bottom_of_object= $(this).offset().top + $(this).outerHeight();
  var bottom_of_window = $(window).height();
  
  if( bottom_of_object > bottom_of_window){
    $(this).addClass('hidden');
  }
});


$(window).scroll( function(){
    /* Check the location of each element hidden */
    $('.hidden').each( function(i){
      
        var bottom_of_object = $(this).offset().top + $(this).outerHeight();
        var bottom_of_window = $(window).scrollTop() + $(window).height();
      
        /* If the object is completely visible in the window, fadeIn it */
        if( bottom_of_window > bottom_of_object ){
          $(this).animate({'opacity':'1'},700);
        }
    });
});
</script>

    </body>
</html><?php /**PATH /home/x/sgss/resources/views/frontEnd/home/layout/front_master.blade.php ENDPATH**/ ?>