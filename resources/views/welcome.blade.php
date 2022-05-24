 

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

        <title>Mamma's Kitchen</title>

        <link rel="stylesheet" href="{{asset('fontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('fontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('fontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('fontend/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('fontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('fontend/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('fontend/css/pricing.css')}}">
        <link rel="stylesheet" href="{{asset('fontend/css/main.css')}}">

        <link rel="stylesheet" href="{{asset('fontend/css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        
        <script src="{{asset('fontend/js/jquery-1.11.2.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('fontend/js/jquery.flexslider.min.js')}}"></script>
        
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
        </script>

        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(24.909439, 91.833800),
                    zoom: 16,
                    scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(24.909439, 91.833800),
                    title:"Mamma's Kitchen Restaurant"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <style>
            @foreach($sliders as $key=>$slider)
            .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{ $key+1 }}) .item
                {background: url('{{asset('uploads/slider/'.$slider->image)}}');
                    background-size: cover;
                    background-position: bottom;
                }
                @endforeach



             @foreach($abouts as $about)
            .about-bg
            { background: url('{{asset('uploads/about/'.$about->image)}}');
                background-repeat: no-repeat;
                background-size: 85%;
                background-position-x: 15%;
                background-position-y: 80%;
            }
             @endforeach
        </style>


    </head>
    <body data-spy="scroll" data-target="#template-navbar">
 
        <!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                     <a class="navbar-brand" href="#">
                        <img id="logo" src="{{asset('fontend/images/Logo_main.png')}}" class="logo img-responsive">
                    </a>
                </div>
                 
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="Food-fair-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#about">about</a></li>
                        <li><a href="#pricing">pricing</a></li>
                         <li><a href="#breakfast">bread</a></li>
                        <li><a href="#featured-dish">featured</a></li>
                        <li><a href="#reserve">reservation</a></li>
                        <li><a href="#contact">contact</a></li>
                        @if (Route::has('login'))
                            @auth
                              
                            @else
                               <li><a href="{{ route('login') }}">Log in</a></li>
                            @endauth
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>
 
        <!--== 5. Header ==-->
        <section id="header-slider" class="owl-carousel">
            @foreach($sliders as $slider)
            <div class="item">
                <div class="container">
                 
                    <div class="header-content">
                        <h1 class="header-title">{{$slider->title}}</h1>
                        <p class="header-sub-title">{{$slider->sub_title}}</p>
                    </div> <!-- /.header-content -->
                  
                </div>
            </div>
            @endforeach
           
        </section> 
         



        <!--== 6. About us ==-->
        @foreach($abouts as $about)
        <section id="about" class="about">
            <img src="{{asset('uploads/about/'.$about->logo)}}" class="img-responsive section-icon hidden-sm hidden-xs">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                        </div>
                        <div class="col-xs-12 col-sm-6 dis-table-cell">
                       
                            <div class="section-content">
                                <h2 class="section-content-title">{{$about->title}}</h2>
                                <p class="section-content-para">{{$about->body}}
                                </p>
                            </div> <!-- /.section-content -->
                       

                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container-fluid -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#about -->
         @endforeach

        <!--==  7. Afordable Pricing  ==-->
        <section id="pricing" class="pricing">
            <div id="w-100">
                <div class="pricing-filter">
                    <div class="pricing-filter-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="section-header">
                                        <h2 class="pricing-title">Affordable Pricing</h2>
                                        <ul id="filter-list" class="clearfix">
                                            <li class="filter" data-filter="all">All</li>

                                            @foreach($categorys as $category)
                                            <li class="filter" data-filter="#{{$category->slug}}">{{$category->name}}
                                            <span class="badge">{{ $category->items->count() }}</span>
                                            </li>
                                            
                                            @endforeach
                                            </ul>
                                            <!-- @end #filter-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">  
                        <div class="col-md-10 col-md-offset-1">
                            <ul id="menu-pricing" class="menu-price">


                         @foreach($items as $item)
                                <li class="item" id="{{$item->category->slug}}">

                                    <a href="#">
                                        <img src="{{asset('uploads/item/'.$item->image)}}" class="img-responsive" alt="Food" width="100%">
                                        <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{$item->item_name}}</h3>
                                                {{$item->description}}
                                            </span>
                                        </div>
                                    </a>
                                        
                                    <h2 class="white"> {{$item->price}} TK</h2>
                                </li>
                            @endforeach

                              
                            </ul>

                            <!-- <div class="text-center">
                                    <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                            </div> -->

                        </div>   
                    </div>
                </div>

            </div> 
        </section>

 

        <!--== 10. Our Breakfast Menu ==-->
        <section id="breakfast" class="breakfast">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('fontend/images/icons/bread_black.png')}}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                            <h2 class="section-title">Our Breakfast Menu</h2>
                        </div>
                        <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">
                            
                        </div>
                    </div> <!-- /.dis-table -->
                </div> <!-- /.row -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#breakfast -->



        <!--== 11. Our Bread ==-->
        <section id="bread" class="bread">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('fontend/images/icons/bread_color.png')}}">
            <div class="container-fluid">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell section-bg">

                    </div>
                    <div class="col-xs-12 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <h2 class="section-content-title">
                                Our Bread
                            </h2>
                            <div class="section-description">
                                <p class="section-content-para">
                                    Astronomy compels the soul to look upward, and leads us from this world to another.  Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.
                                </p>
                                <p class="section-content-para">
                                    beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.  Where ignorance lurks, so too do the frontiers of discovery and imagination.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!--== 12. Our Featured Dishes Menu ==-->
        <section id="featured-dish" class="featured-dish">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('fontend/images/icons/food_black.png')}}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                            <h2 class="section-title">Our Featured Dishes Menu</h2>
                        </div>
                        <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">
                            
                        </div>
                    </div> <!-- /.dis-table -->
                </div> <!-- /.row -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#featured-dish -->




        <!--== 13. Menu List ==-->
        <section id="menu-list" class="menu-list">
            <div class="container">
                <div class="row menu">
                    <div class="col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-12">
                        
                    <div class="row">
                        @foreach($features as $feature)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                              
                                <div class="row">
                                    <div class="menu-catagory">
                                        <h2>{{$feature->name}}</h2>
                                    </div>
                                </div>
                                
                        @php
						$products = DB::table('feature_items')->where('feature_id', $feature->id)->orderBy('created_at','DESC')->get()->take(10);
						@endphp

						@foreach($products as $item) 

                                <div class="row">
                                    <div class="menu-item">
                                        <h3 class="menu-title">{{$item->feature_name}}</h3>
                                        <p class="menu-about">{{$item->description}}</p>

                                        <div class="menu-system">
                                            <div class="half">
                                                <p class="per-head">
                                                    <span><i class="fa fa-user"></i></span>1:1
                                                </p>
                                            </div>
                                            <div class="half">
                                                <p class="price">149.00 TK</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                 
                            </div>

                         @endforeach


 
                        </div>


                        <div id="moreMenuContent"></div>
                        <div class="text-center">
                            <a id="loadMenuContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


 


        <!--== 15. Reserve A Table! ==-->
        <section id="reserve" class="reserve">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('fontend/images/icons/reserve_black.png')}}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                            <h2 class="section-title">Reserve A Table !</h2>
                        </div>
                        <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">
                            
                        </div>
                    </div> <!-- /.dis-table -->
                </div> <!-- /.row -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#reserve -->



        <section class="reservation">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{asset('fontend/images/icons/reserve_color.png')}}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class=" section-content">
                        <div class="row">
                            <div class="col-md-5 col-sm-6">
                                <form class="reservation-form" method="POST" action="{{route('sentReservation')}}">
                                @csrf
                                 @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control reserve-form empty iconified" name="name" id="name"  placeholder="  &#xf007;  Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control reserve-form empty iconified" id="email" placeholder="  &#xf1d8;  e-mail">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="tel" class="form-control reserve-form empty iconified" name="phone" id="phone" placeholder="  &#xf095;  Phone">
                                            </div>
                                           <div class="col-md-12 col-sm-12">
                                           <input type="text" class="form-control reserve-form empty iconified" name="dateandtime" id="datetimepicker1" placeholder="&#xf017;  Date">
                                        </div>
                                        </div>

                                        

                                        <div class="col-md-12 col-sm-12">
                                            <textarea type="text" name="description" class="form-control reserve-form empty iconified" id="message" rows="3" placeholder="  &#xf086;  We're listening"></textarea>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                                <span><i class="fa fa-check-circle-o"></i></span>
                                                Make a reservation
                                            </button>
                                        </div>
                                            
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-2 hidden-sm hidden-xs"></div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="opening-time">
                                    <h3 class="opening-time-title">Hours</h3>
                                    <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                                    <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                                    <div class="launch">
                                        <h4>Lunch</h4>
                                        <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                                    </div>

                                    <div class="dinner">
                                        <h4>Dinner</h4>
                                        <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                        <p>Sun: 5:30 PM - 12:00 AM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>




        <section id="contact" class="contact">
            <div class="container-fluid color-bg">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell">
                        <h2 class="section-title">Contact With us</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <p>16th Birn street Get Plaza (4th floar) USA</p>
                            <p>+44 12 213584</p>
                            <p>example@mail.com </p>
                        </div>
                    </div>
                </div>
                <div class="social-media">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="center-block">
                                <li><a href="#" class="fb"></a></li>
                                <li><a href="#" class="twit"></a></li>
                                <li><a href="#" class="g-plus"></a></li>
                                <li><a href="#" class="link"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div id="map-canvas"></div>
            </div>
        </div>



        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="row">
                             <form class="contact-form" method="POST" action="{{route('sendEmail')}}">
                                @csrf
                                
                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Name">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" id="subject" required="required" placeholder="  Subject">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Message"></textarea>
                                </div>

                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2015 <a href="#">Your Website Link.</a> Theme by <a href="http://themewagon.com/"  target="_blank">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    
        <script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('fontend/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('fontend/js/jquery.mixitup.min.js')}}" ></script>
        <script src="{{asset('fontend/js/wow.min.js')}}"></script>
        <script src="{{asset('fontend/js/jquery.validate.js')}}"></script>
        <script type="text/javascript" src="{{asset('fontend/js/jquery.hoverdir.js')}}"></script>
        <script type="text/javascript" src="{{asset('fontend/js/jQuery.scrollSpeed.js')}}"></script>
        <script src="{{asset('fontend/js/script.js')}}"></script>
        <script src="{{asset('fontend/js/bootstrap-datetimepicker.min.js')}}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
    @if($errors->any())
    @foreach($errors->all() as $error)
    <script>
    toastr.error('{{$error}}')
    </script>
    @endforeach
    @endif


        <script>
           $(function(){
               $('#datetimepicker1').datetimepicker({
                   format:"dd MM yyyy -HH:ll P",
                   showMeridian: true,
                   autoclose: true,
                   todayBtn: true

               });
            });
        </script>

<script>
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('nav').addClass('shrink');
        } 
        else {
            $('nav').removeClass('shrink');
        }
    });
});


$(document).ready(function(){
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $("#logo").attr("src", "{{asset('fontend/images/Logo_stick.png')}}")
        }
        else {
             $("#logo").attr("src", "{{asset('fontend/images/Logo_main.png')}}")
        }
    });
});
</script>

     {!! Toastr::message() !!}
    </body>
</html>
 