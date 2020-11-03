<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Organica Home One</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("/assets/img/index/favicon.png")}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.7 css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/bootstrap.min.css")}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/animate.css")}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/jquery-ui.min.css")}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/meanmenu.css")}}">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/nivo-slider.css")}}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/owl.carousel.css")}}">
    <!-- magnific-popup -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/magnific-popup.css")}}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/font-awesome.min.css")}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/style.css")}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/responsive.css")}}">
    <!-- modernizr css -->
    <script src="{{ asset("/assets/js/libs/index/modernizr-2.8.3.min.js")}}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- header start -->
<header class="header-area ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{ asset("/assets/img/index/logo.png")}}" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-10">
                <div class="mainmenu-area">
                    <div class="top-bar clear">
                        <div class="top-bar-left pull-left">
                            <div class="hotline pull-left d-none d-lg-block">
                                <p>Order online or call us : +0123 456 789</p>
                            </div>
                        </div>
                        <div class="top-bar-right pull-right">
                            <div class="search-box">
                                <form action="#">
                                    <input type="search" placeholder="Search here ....."/>
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mainmenu dropdown d-none d-lg-block">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{url('/')}}">Home </a></li>
                                <li><a href="{{url('/shop')}}">Shop </a></li>
                                <li><a href="{{url('/blog')}}">Blog </a></li>
                                <li><a href="{{url('/cart')}}">Cart </a></li>
                                <li><a href="{{url('/checkout')}}">checkout</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-2">
                <div class="cart-area">
                    <div class="maincart-wrap">
                        <a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i>
                            <span id="sizeof_cart">{{ sizeof($in_carts) }}</span>
                        </a>
                    </div>
                    <div class="cart">
                        <div class="total-items pb-20 border-bottom mb-15">
                            <div class="sub-total clear">
                                <strong id="sizeof_cart">{{ sizeof($in_carts) }}</strong>
                                <span>items</span>
                                <span class="pull-right total">
                                    <span>Cart Subtotal :</span>
                                        <strong id="subtotal">{{$total}} RSD</strong>
                                </span>
                            </div>
                            <div class="organic-btn pt-20 text-center border-top">
                                <a href="{{url('/checkout')}}">Go to Checkout</a>
                            </div>
                        </div>
                        <div class="cart-items clear mb-15" id="cart_div">
                            @foreach($products as $size)
                                @if(array_key_exists($size->id, $in_carts))
                                    <div class="cart-item ptb-20 border-bottom" >
                                        <div class="cart-img pull-left" >
                                            <a href="{{url('/single-product/'.$size->id)}}">
                                                <img src="{{asset($size->product->materials->first()->url)}}"  alt="" />
                                            </a>
                                        </div>
                                        <div class="cart-item-details clear">
                                            <a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a>
                                            <span class="price" >Cena: {{$size->price}} RSD</span>
                                            <span class="price">Pakovanje: {{$size->quantity}} {{$size->unit}}</span>
                                            <div class="details-qty pull-left">
                                                <span>Kolicina: </span>
                                                <input type="number" min="1" max="{{$size->stock}}" name="quantity_{{ $size->id }}" id="quantity_{{ $size->id }}" class="quantity"  value="{{$carts[$size->id]["quantity"]}}"/>
                                            </div>
                                            <div class="remove-edit">
                                                <a href="#" class="remove-from-cart" data-id="{{ $size->id }}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="organic-btn pt-20 text-center border-top">
                            <a href="{{url('/cart')}}">View and edit cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobail-menu -->
    <div class="mobail-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-12 d-none d-sm-block d-md-none">
                    <div class="mobail-menu-active">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{url('/')}}">Home </a></li>
                                <li><a href="{{url('/shop')}}">Shop </a></li>
                                <li><a href="{{url('/blog')}}">Blog </a></li>
                                <li><a href="{{url('/cart')}}">Cart </a></li>
                                <li><a href="{{url('/checkout')}}">checkout</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<!-- slider area start -->
<div class="slider-area">
    <div id="slider-active">
        <img src="{{ asset("/assets/img/index/slider/1.jpg")}}" alt="banner image" title="#active1"/>
        <img src="{{ asset("/assets/img/index/slider/2.jpg")}}" alt="banner image" title="#active2"/>
    </div>
    <div id="active1" class="nivo-html-caption">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-11 col-xs-12 col-sm-12">
                    <div class="slide1-text text-left">
                        <div class="middle-text">
                            <div class="cap-dec wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".5s">
                                <h1>Face Cleanser</h1>
                            </div>
                            <div class="cap-title wow fadeInLeft text-uppercase" data-wow-duration="1.2s" data-wow-delay="0.2s">
                                <h3>Mega - Mushroom Skin Relief</h3>
                            </div>
                            <div class="cap-title wow flipInX d-none d-md-block" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit <br /> esse molestie consequat.</p>
                            </div>
                            <div class="cap-readmore wow flipInX organic-btn d-none d-md-block" data-wow-duration="1.6s" data-wow-delay=".5s">
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="active2" class="nivo-html-caption">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-11 col-xs-12 col-sm-12">
                    <div class="slide1-text text-left">
                        <div class="middle-text">
                            <div class="cap-dec wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".5s">
                                <h3>Comes From Healthy.</h3>
                            </div>
                            <div class="cap-title wow fadeInLeft text-uppercase" data-wow-duration="1.2s" data-wow-delay="0.2s">
                                <h1>Rock And Glamour</h1>
                            </div>
                            <div class="cap-title wow flipInX d-none d-md-block" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit <br /> esse molestie consequat.</p>
                            </div>
                            <div class="cap-readmore wow flipInX organic-btn d-none d-md-block" data-wow-duration="1.6s" data-wow-delay=".5s">
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider area end -->
<!-- banner area  start-->
<div class="banner-area fix">
    <div class="single-banner pull-left">
        <a href="#"><img src="{{ asset("/assets/img/index/banner/1.jpg")}}" alt="" /></a>
    </div>
    <div class="single-banner pull-right">
        <a href="#"><img src="{{ asset("/assets/img/index/banner/2.jpg")}}" alt="" /></a>
    </div>
</div>
<!-- banner area  end-->
<!-- New arrivals area start -->
<div class="new-arrivals-area bg-img-1">
    <div class="container">
        <div class="row">
            <div class="offset-md-5 col-md-7 offset-lg-6 col-lg-6 offset-sm-4 col-sm-8">
                <div class="new-arrivals-content text-center">
                    <h3>New arrivals</h3>
                    <h1>Organic</h1>
                    <h2>up to 80% off</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <div class="organic-btn new-arrivals-btn mt-35">
                        <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New arrivals area end -->
<!-- tab area start  -->
<div class="tab-area mtb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-menu  text-center mb-30">
                    <ul class="nav">
                        <li><a class="active" href="#new-products" data-toggle="tab">New Products</a></li>
                        <li><a href="#onsale" data-toggle="tab"> OnSale</a></li>
                        <li><a href="#featured" data-toggle="tab">Featured</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="new-products">
                <div class="tab-active owl-carousel next-prev-style">
                    @foreach($products as $size)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{url('/single-product/'.$size->id)}}"><img src="{{asset($size->product->materials->first()->url)}}" border="10px" class="center"  alt="" /></a>
                            </div>
                            <div class="product-item-details text-center">
                                <div class="product-name-review tab-product-name-review">
                                    <div class="product-name mt-30 ">
                                        <strong><a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a></strong>
                                    </div>
                                    <div class="product-review">
                                        <span class="special-price">{{$size->price}} RSD</span>
                                    </div>
                                    <div class="product-review">
                                        <span class="product-quantity">Pakovanje: {{$size->quantity}} {{$size->unit}}</span>
                                    </div>
                                </div>
                                <div class="add-to-cart-area clear pt-35">
                                    <div class="add-to-cart text-uppercase">
                                        @if(array_key_exists($size->id, $in_carts))
                                            <button type="button " class=" btn-danger" data-id="{{ $size->id }}" >Dodato</button>
                                        @else
                                            <button type="button" class="cartBtn" data-id="{{ $size->id }}" >add to cart</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="onsale">
                <div class="tab-active owl-carousel next-prev-style">
                    @foreach($products as $size)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{url('/single-product/'.$size->id)}}"><img src="{{asset($size->product->materials->first()->url)}}" width="200" height="200" alt="" /></a>
                            </div>
                            <div class="product-item-details text-center">
                                <div class="product-name-review tab-product-name-review">
                                    <div class="product-name mt-30 ">
                                        @foreach($size->product->categories as $category)
                                            <span>{{$category->name}}</span>
                                        @endforeach
                                        <strong><a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a></strong>
                                    </div>
                                    <div class="product-review">
                                        <span class="special-price">{{$size->price}} RSD</span>
                                    </div>
                                    <div class="product-review">
                                        <span class="product-quantity">Pakovanje: {{$size->quantity}} {{$size->unit}}</span>
                                    </div>
                                </div>
                                <div class="add-to-cart-area clear pt-35">
                                    <div class="add-to-cart text-uppercase">
                                        @if(array_key_exists($size->id, $in_carts))
                                            <button type="button " class=" btn-danger" data-id="{{ $size->id }}" >Dodato</button>
                                        @else
                                            <button type="button" class="cartBtn" data-id="{{ $size->id }}" >add to cart</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div role="tabpanel" class="tab-pane owl-carousel fade" id="featured">
                <div class="tab-active next-prev-style">
                    @foreach($products as $size)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{url('/single-product/'.$size->id)}}"><img src="{{asset($size->product->materials->first()->url)}}" width="200" height="200" alt="" /></a>
                            </div>
                            <div class="product-item-details text-center">
                                <div class="product-name-review tab-product-name-review">
                                    <div class="product-name mt-30 ">
                                        @foreach($size->product->categories as $category)
                                            <span>{{$category->name}}</span>
                                        @endforeach
                                        <strong><a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a></strong>
                                    </div>
                                    <div class="product-review">
                                        <span class="special-price">{{$size->price}} RSD</span>
                                    </div>
                                    <div class="product-review">
                                        <span class="product-quantity">Pakovanje: {{$size->quantity}} {{$size->unit}}</span>
                                    </div>
                                </div>
                                <div class="add-to-cart-area clear pt-35">
                                    <div class="add-to-cart text-uppercase">
                                        @if(array_key_exists($size->id, $in_carts))
                                            <button type="button " class=" btn-danger" data-id="{{ $size->id }}" >Dodato</button>
                                        @else
                                            <button type="button" class="cartBtn" data-id="{{ $size->id }}" >add to cart</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tab area end  -->
<!-- blog area start -->
<div class="blog-area mtb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mt-25 mb-10">
                    <h2>Blog posts</h2>
                </div>
            </div>
        </div>
        <div class=" blog-active owl-carousel next-prev-style">
            <div class="blog-wrap text-center">
                <div class="blog-img fix">
                    <a href="blog-details.html">
                        <img src="{{ asset("/assets/img/index/blogs/1.jpg")}}" alt="" />
                    </a>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span>08</span>
                        <span>/</span>
                        <span>September</span>
                        <span>/</span>
                        <span>2016</span>
                    </div>
                    <div class="blog-info">
                        <h3>
                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec .</a>
                        </h3>
                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                        <div class="readmore-btn">
                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-wrap text-center">
                <div class="blog-img fix">
                    <a href="blog-details.html">
                        <img src="{{ asset("/assets/img/index/blogs/2.jpg")}}" alt="" />
                    </a>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span>08</span>
                        <span>/</span>
                        <span>September</span>
                        <span>/</span>
                        <span>2016</span>
                    </div>
                    <div class="blog-info">
                        <h3>
                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec .</a>
                        </h3>
                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                        <div class="readmore-btn">
                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-wrap text-center">
                <div class="blog-img fix">
                    <a href="blog-details.html">
                        <img src="{{ asset("/assets/img/index/blogs/3.jpg")}}" alt="" />
                    </a>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span>08</span>
                        <span>/</span>
                        <span>September</span>
                        <span>/</span>
                        <span>2016</span>
                    </div>
                    <div class="blog-info">
                        <h3>
                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec .</a>
                        </h3>
                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                        <div class="readmore-btn">
                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-wrap text-center">
                <div class="blog-img fix">
                    <a href="blog-details.html">
                        <img src="{{ asset("/assets/img/index/blogs/2.jpg")}}" alt="" />
                    </a>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span>08</span>
                        <span>/</span>
                        <span>September</span>
                        <span>/</span>
                        <span>2016</span>
                    </div>
                    <div class="blog-info">
                        <h3>
                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec .</a>
                        </h3>
                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                        <div class="readmore-btn">
                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-wrap text-center">
                <div class="blog-img fix">
                    <a href="blog-details.html">
                        <img src="{{ asset("/assets/img/index/blogs/1.jpg")}}" alt="" />
                    </a>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span>08</span>
                        <span>/</span>
                        <span>September</span>
                        <span>/</span>
                        <span>2016</span>
                    </div>
                    <div class="blog-info">
                        <h3>
                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec .</a>
                        </h3>
                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                        <div class="readmore-btn">
                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog area end -->
<!-- footer area start -->
<footer>
    <!-- contuct area start -->
    <div class="top-footer ptb-50 bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact clear">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                            <span>Do you have </span>
                            <span> a question?</span>
                        </div>
                        <div class="text">
                            +0123 456 789
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="contact clear">
                        <div class="icon">
                            <i class="fa fa-envelope-o"></i>
                            <span>offer </span>
                            <span> question?</span>
                        </div>
                        <div class="text">
                            <p>Contact@organica.com </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-md-none d-lg-block d-sm-block">
                    <div class="contact clear res">
                        <div class="icon">
                            <i class="fa fa-life-saver"></i>
                            <span> SUpport  </span>
                            <span>question?</span>
                        </div>
                        <div class="text">
                            <p>support@organica.com </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contuct area end -->
    <!-- footer menu area start -->
    <div class="footer-medil-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="footer-wrap pb-50">
                        <div class="footer-static-title  text-uppercase  mt-50 mb-30">
                            <h3>Information</h3>
                        </div>
                        <div class="footer-menu  text-uppercase">
                            <ul>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 border-right">
                    <div class="footer-wrap pb-50">
                        <div class="footer-static-title  text-uppercase  mt-50 mb-30">
                            <h3>My Account</h3>
                        </div>
                        <div class="footer-menu  text-uppercase">
                            <ul>
                                <li><a href="account.html">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Site Map </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3  border-right">
                    <div class="footer-wrap pb-50">
                        <div class="footer-static-title  text-uppercase  mt-50 mb-30">
                            <h3>Customer Service</h3>
                        </div>
                        <div class="footer-menu  text-uppercase">
                            <ul>
                                <li><a href="#">Site Map</a></li>
                                <li><a href="#">Site Map</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="account.html"> My Account </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-wrap pb-50">
                        <div class="footer-static-title  text-uppercase  mt-50 mb-30">
                            <h3>Extras</h3>
                        </div>
                        <div class="footer-menu  text-uppercase">
                            <ul>
                                <li><a href="wishlist.html">Wish List</a></li>
                                <li><a href="#">compare</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="#">Custom Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer menu area end -->
    <!-- copy right area start -->
    <div class="footer-bottom ptb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <span>Copyright &copy; 2019 <a href="http://hastech.company/" target="_blank">HasTech</a> All Rights Reserved.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mayment text-sm-center text-md-right">
                        <a href="#">
                            <img src="img/p14.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copy right area end -->
</footer>
<!-- footer area end -->
<!-- all js here -->
<!-- jquery latest version -->
<script src="{{ asset("/assets/js/libs/index/jquery-v3.4.1.min.js")}}"></script>
<!-- bootstrap js -->
<script src="{{ asset("/assets/js/libs/index/bootstrap.min.js")}}"></script>
<!-- owl.carousel.2.0.0-beta.2.4 css -->
<script src="{{ asset("/assets/js/libs/index/owl.carousel.min.js")}}"></script>
<!-- meanmenu js -->
<script src="{{ asset("/assets/js/libs/index/jquery.meanmenu.js")}}"></script>
<!-- jquery-ui js -->
<script src="{{ asset("/assets/js/libs/index/jquery-ui.min.js")}}"></script>
<!-- nivo-slider js -->
<script src="{{ asset("/assets/js/libs/index/jquery.nivo.slider.pack.js")}}"></script>
<!-- jquery countdown js -->
<script src="{{ asset("/assets/js/libs/index/jquery.countdown.min.js")}}"></script>
<!-- wow js -->
<script src="{{ asset("/assets/js/libs/index/wow.min.js")}}"></script>
<!-- plugins js -->
<script src="{{ asset("/assets/js/libs/index/plugins.js")}}"></script>
<!-- main js -->
<script src="{{ asset("/assets/js/libs/index/main.js")}}"></script>
<!-- cart js -->
<script src="{{ asset("/assets/js/cart.js")}}"></script>
</body>
</html>
