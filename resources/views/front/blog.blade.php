<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Organica Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                                    <input type="search" placeholder="Search here ....." />
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
                            <span>{{ sizeof($in_carts) }}</span>
                        </a>
                    </div>
                    <div class="cart">
                        <div class="total-items pb-20 border-bottom mb-15">
                            <div class="sub-total clear">
                                <strong>{{ sizeof($in_carts) }}</strong>
                                <span>items</span>
                                <span class="pull-right total">
										<span>Cart Subtotal :</span>
										<strong>{{$total}} RSD</strong>
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
                                        <div class="cart-item-details text-center">
                                            <a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a>
                                        </div><br>
                                        <div class="cart-item-details text-center">
                                            <div class="cart-img pull-left col-md-auto-12" >
                                                <a href="{{url('/single-product/'.$size->id)}}">
                                                    <img src="{{asset($size->product->materials->first()->url)}}"  alt="" />
                                                </a>
                                            </div>
                                            <div class="cart-item-details clear">
                                                <h6 >Cena: {{$size->price}} RSD</h6>
                                                <h6 >Pakovanje: {{$size->quantity}} {{$size->unit}}</h6>
                                            </div>
                                        </div><br>
                                        <div>
                                            <div class="details-qty col-md-auto-12">
                                                <span>Kolicina: </span>
                                                <input type="number" min="1" max="{{$size->stock}}" name="quantity_{{ $size->id }}" id="quantity_{{ $size->id }}" class="quantity"  value="{{$carts[$size->id]["quantity"]}}"/>
                                                <a href="#" class="remove-from-cart"  data-id="{{ $size->id }}"><i class="fa fa-trash-o"  style="font-size:24px"></i></a>
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
                <div class="col-sm-12 d-none d-sm-block d-md-none">
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
<!-- blog-area start -->
<div class="breadcrumbs-area ptb-10 bg-4 mb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="woocommerce-breadcrumb mtb-15">
                    <div class="menu">
                        <ul>
                            <li><a  href="{{url('/')}}">Home</a></li>
                            <li class="active"><a href="{{url('/blog')}}">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- Search-area -->
                <div class="Search-area border-2">
                    <div class="product-title text-uppercase bg-5">
                        <h3>Search</h3>
                    </div>
                    <div class="search p-20 mt-20">
                        <form action="#">
                            <input type="text" placeholder="Search...." />
                            <button><i class="fa fa-paper-plane-o"></i></button>
                        </form>
                    </div>
                </div>
                <!-- categories-area start -->
                <div class="categories-area border-2 mtb-35">
                    <div class="product-title text-uppercase bg-5">
                        <h3>Categories</h3>
                    </div>
                    <div class="shop-categories-menu p-20">
                        <ul>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Image</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Photography</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Uncategorized</a></li>
                            <li><a href="#">Videos</a></li>
                            <li><a href="#">WordPress</a></li>
                        </ul>
                    </div>
                </div>
                <!-- comment-area -->
                <div class="recent-comment-area border-2">
                    <div class="product-title text-uppercase bg-5">
                        <h3>Recent Comment</h3>
                    </div>
                    <div class="comment  p-20-15 ">
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <img src="img/comment/1.jpg" alt="" />
                            </div>
                            <div class="comment-info">
                                <h6>admin</h6>
                                <p>Nunc pulvinar sollicitudin molestie.</p>
                                <span>on <a href="#"> Post Format:Gallery</a></span>
                            </div>
                        </div>
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <img src="img/comment/1.jpg" alt="" />
                            </div>
                            <div class="comment-info">
                                <h6>alex</h6>
                                <p>Aenean et tempor eros, vitae...</p>
                                <span>on <a href="#">Vivamus gravida</a></span>
                            </div>
                        </div>
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <img src="img/comment/1.jpg" alt="" />
                            </div>
                            <div class="comment-info">
                                <h6>admin</h6>
                                <p>Nunc pulvinar sollicitudin molestie.</p>
                                <span>on <a href="#"> Post Format:Image</a></span>
                            </div>
                        </div>
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <img src="img/comment/1.jpg" alt="" />
                            </div>
                            <div class="comment-info">
                                <h6>admin</h6>
                                <p>Etiam varius enim nec quam...</p>
                                <span>on <a href="#"> Post Format:Image</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- comment-area -->
                <div class="recent-comment-area border-2 mtb-30">
                    <div class="product-title text-uppercase bg-5">
                        <h3>Recent post</h3>
                    </div>
                    <div class="comment  p-20-15 ">
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <a href="#"><img src="img/post/1.jpg" alt="" /></a>
                            </div>
                            <div class="comment-info">
                                <a href="#">Hello world !</a>
                                <span>January 29, 2016</span>
                            </div>
                        </div>
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <a href="#"><img src="img/post/2.jpg" alt="" /></a>
                            </div>
                            <div class="comment-info">
                                <a href="#">Curabitur lobortis</a>
                                <span>January 29, 2016</span>
                            </div>
                        </div>
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <a href="#"><img src="img/post/3.jpg" alt="" /></a>
                            </div>
                            <div class="comment-info">
                                <a href="#">Vivamus gravida</a>
                                <span>January 29, 2016</span>
                            </div>
                        </div>
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <a href="#"><img src="img/post/4.jpg" alt="" /></a>
                            </div>
                            <div class="comment-info">
                                <a href="#">Post Format:Image</a>
                                <span>January 29, 2016</span>
                            </div>
                        </div>
                        <div class="single-comments clear mb-20">
                            <div class="comment-img floatleft">
                                <a href="#"><img src="img/post/5.jpg" alt="" /></a>
                            </div>
                            <div class="comment-info">
                                <a href="#">Post Format: Gallery</a>
                                <span>January 29, 2016</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Archives-area start -->
                <div class="Archives-area border-2">
                    <div class="product-title text-uppercase bg-5">
                        <h3>Recent post</h3>
                    </div>
                    <div class="shop-categories-menu p-20">
                        <ul>
                            <li><a href="#">January 2016</a></li>
                            <li><a href="#">December 2015</a></li>
                            <li><a href="#">November 2015</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Meta-area start -->
                <div class="Meta-area border-2 mtb-30">
                    <div class="product-title text-uppercase bg-5">
                        <h3>Recent post</h3>
                    </div>
                    <div class="shop-categories-menu p-20">
                        <ul>
                            <li><a href="#">Log in</a></li>
                            <li><a href="#">Entries <span>RSS</span></a></li>
                            <li><a href="#">Comments <span>RSS</span></a></li>
                            <li><a href="#">WordPress.org</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- blog-start here -->
            <div class="col-lg-9">
                <div class="blog-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="blog-wrap text-center mb-35">
                                <div class="blog-img fix">
                                    <a href="blog-details.html">
                                        <img src="img/blog/1.jpg" alt="" />
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
                                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec ligula.</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-wrap text-center  mb-35">
                                <div class="blog-img fix">
                                    <a href="blog-details.html">
                                        <img src="img/blog/2.jpg" alt="" />
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
                                            <a href="blog-details.html">Nullam maximus tortor in aliquet maximus. Duis pulvinar sem nec ligula</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-wrap text-center  mb-35">
                                <div class="blog-img fix">
                                    <a href="blog-details.html">
                                        <img src="img/blog/2.jpg" alt="" />
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
                                            <a href="blog-details.html">Suspendisse ac nibh ullamcorper nibh tempor hendrerit. Morbi hendrerit</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-wrap text-center mb-35">
                                <div class="blog-img fix">
                                    <a href="blog-details.html">
                                        <img src="img/blog/3.jpg" alt="" />
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
                                            <a href="blog-details.html">Nullam maximus tortor in aliquet maximus. Duis pulvinar sem nec ligula</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-wrap text-center  mb-35">
                                <div class="blog-img fix">
                                    <a href="blog-details.html">
                                        <img src="img/blog/4.jpg" alt="" />
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
                                            <a href="blog-details.html">Suspendisse ac nibh ullamcorper nibh tempor hendrerit. Morbi hendrerit</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-wrap text-center  mb-35">
                                <div class="blog-img fix">
                                    <a href="blog-details.html">
                                        <img src="img/blog/5.jpg" alt="" />
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
                                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec ligula.</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-wrap  mb-35 text-center ">
                                <div class="blog-img">
                                    <div class="single-blog-active owl-carousel next-prev-style">
                                        <div class="blog-img">
                                            <a class="image-link" href="img/blog/1.jpg"><img src="img/blog/1.jpg" alt="" /></a>
                                        </div>
                                        <div class="blog-img">
                                            <a class="image-link" href="img/blog/2.jpg"><img src="img/blog/2.jpg" alt="" /></a>
                                        </div>
                                        <div class="blog-img">
                                            <a class="image-link" href="img/blog/3.jpg"><img src="img/blog/3.jpg" alt="" /></a>
                                        </div>
                                        <div class="blog-img">
                                            <a class="image-link" href="img/blog/4.jpg"><img src="img/blog/4.jpg" alt="" /></a>
                                        </div>
                                        <div class="blog-img">
                                            <a class="image-link" href="img/blog/5.jpg"><img src="img/blog/5.jpg" alt="" /></a>
                                        </div>
                                    </div>
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
                                            <a href="blog-details.html">Suspendisse ac nibh ullamcorper nibh tempor hendrerit. Morbi hendrerit</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-wrap  text-center  mb-35">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="https://www.youtube.com/embed/Bph709EqnHk" allowfullscreen=""></iframe>
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
                                            <a href="blog-details.html">Pellentesque massa erat, blandit eget tincidunt porta, eleifend nec ligula.</a>
                                        </h3>
                                        <p>We're releasing 2 premium Magento templates each month. Every template is designed with different styles and targeted for each business trend</p>
                                        <div class="readmore-btn">
                                            <a href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="woocommerce-pagination-area ptb-15 mb-30 bg-4">
                                <div class="woocommerce-pagination text-center">
                                    <ul>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- woocommerce-pagination-area -->
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <span> SUpport </span>
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
                            <img src="{{asset("assets/img/index/p14.png")}}" alt="" />
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
</body>
</html>
