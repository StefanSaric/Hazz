<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Organica Shop Pages</title>
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
                        <div class="cart-items clear mb-15">
                            @foreach($products as $size)
                                @if(array_key_exists($size->id, $in_carts))
                                    <div class="cart-item ptb-20 border-bottom" >
                                        <div class="cart-img pull-left">
                                            <a href="{{url('/single-product/'.$size->id)}}">
                                                <img src="{{asset($size->product->materials->first()->url)}}" alt="" />
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
<!-- shop-area start -->
<div class="breadcrumbs-area ptb-10 bg-4 mb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="woocommerce-breadcrumb mtb-15">
                    <div class="menu">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="javascript:void(0);">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="categories-area mb-35 border-2">
                <div class="product-title text-uppercase bg-5">
                    <h3>Shop By</h3>
                </div>
                <div class="shop-categories-menu p-20">
                    <ul>
                        <li><strong>Shopping Options</strong></li>
                        <li><a href="#">Color</a></li>
                        <li><a href="#">Manufacturer <i class="opener-1 fa fa-angle-right pull-right"></i></a>
                            <ul class="toggle-1">
                                <li><a href="#"> Adidas 4 items</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Price <i class="opener-2 fa fa-angle-right pull-right"></i></a>
                            <ul class="toggle-2">
                                <li><a href="#"> $0.00 - $9.99 1 items</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- compare-area start -->
            <div class="compare-area border-2">
                <div class="product-title text-uppercase bg-5">
                    <h3>Compare</h3>
                </div>
                <div class="compare-menu p-20">
                    <p>No products to compare</p>
                    <a href="#">Clear all</a>
                    <a href="#" data-toggle="tooltip" title="Compare" class="pull-right compare text-uppercase">Compare </a>
                </div>
            </div>
            <!-- filter-by-price-area start -->
            <div class="filter-by-price-area mtb-35 border-2">
                <div class="product-title text-uppercase bg-5">
                    <h3>Filter by price</h3>
                </div>
                <div class="filter-by-price p-20-15">
                    <p>
                        price: <input type="text" id="amount">
                    </p>
                    <div id="slider-range"></div>
                    <div class="filter">
                        <button>filter</button>
                    </div>
                </div>
            </div>
            <!-- compare-area start -->
            <div class="compare-area border-2">
                <div class="product-title text-uppercase bg-5">
                    <h3>My Wishlist</h3>
                </div>
                <div class="wishlist p-20">
                    <p>You have no items in your wish list.</p>
                </div>
            </div>
            <!-- banner-area start -->
            <div class="banner-area mtb-35">
                <div class="single-banner home2-single-banner mb-30">
                    <a href="#"><img src="img/banner/home2/1.jpg" alt="" /></a>
                </div>
                <div class="single-banner home2-single-banner">
                    <a href="#"><img src="img/banner/home2/2.jpg" alt="" /></a>
                </div>
            </div>
            <!-- Mostviewed area -->
            <div class="mostviewed-area mb-35 border-2">
                <div class="product-title text-uppercase bg-5">
                    <h3>Mostviewed</h3>
                </div>
                <div class="mostviewed-slider-active owl-carousel  next-prev-style">
                    <div class="new-product-wrap shop-new-product-wrap">
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/1.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Udon chicken soup</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 45.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/2.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Rival Field Messenger</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 55.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/3.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Miso soup</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 55.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/1.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Fusion Backpack</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 55.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-product-wrap shop-new-product-wrap">
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/6.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Udon chicken soup</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 45.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/8.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Rival Field Messenger</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 55.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/3.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Miso soup</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 55.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/3.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Fusion Backpack</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 55.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-product-wrap shop-new-product-wrap">
                        <div class="new-product-item  clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/5.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Spicy soup seafood</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 30.00</span>
                                    <span class="old-price">
											<del>$ 46.00</del>
										</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/7.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">MH01-Black</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 25.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15 border-bottom">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/10.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Miso soup with</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 25.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="new-product-item clear ptb-15">
                            <div class="product-img home2-product-img pull-left">
                                <a href="shop-single-product.html"><img src="img/product/home5/1.jpg" alt="" /></a>
                            </div>
                            <div class="product-item-details  pull-right home2-product-item-details">
                                <div class="product-name">
                                    <strong><a href="shop-single-product.html">Cream soup with</a></strong>
                                </div>
                                <div class="product-review">
                                    <span class="special-price">$ 25.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- product-vew area start -->
        <div class="col-xl-9 col-lg-8">
            <div class="slider mb-20">
                <img src="img/shop/1.jpg" alt="" />
            </div>
            <div class="tab-area shop-tab-area">
                <div class="shop-taitle mb-20">
                    <h2>Shop</h2>
                </div>
                <div class="tab-menu-area border-bottom mb-30">
                    <div class="row">
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="shop-tab-menu">
                                <ul class="nav">
                                    <li><a class="active" href="#tab1" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
                                    <li><a href="#tab2" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <span> Items 1-9 of 13</span>
                            </div>
                        </div>
                        <div class=" col-md-5 col-sm-6 hidden-xs">
                            <div class="woocommerce-ordering text-right">
                                <strong>Sort By </strong>
                                <select name="orderby">
                                    <option value="menu_order" selected="selected">Position</option>
                                    <option value="popularity">Product Name</option>
                                    <option value="rating">Price</option>
                                </select>
                                <a href="#"><i class="fa fa-arrow-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <div class="row">
                            @foreach($products as $size)
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="single-product mb-30">
                                    <div class="product-img">
                                        <a href="{{url('/single-product/'.$size->id)}}"><img src="{{asset($size->product->materials->first()->url)}}"  alt="" /></a>
                                    </div>
                                    <div class="product-item-details text-center">
                                        <div class="product-name-review tab-product-name-review">
                                            <div class="product-name mt-30 ">
                                                <strong><a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a></strong>
                                            </div>
                                            <div class="product-review">
                                                <span class="special-price">Cena: {{$size->price}} RSD</span>
                                            </div>
                                            <div class="product-review">
                                                <span class="product-content">Pakovanje: {{$size->quantity}} {{$size->unit}}</span>
                                            </div>
                                        </div>
                                        <div class="add-to-cart-area clear ptb-35">
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
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab2">
                        <div class="row">
                            @foreach($products as $size)
                            <div class="col-sm-12">
                                <div class="product-wrapper clear border-bottom mb-30">
                                    <div class="product-img shop-product-img">
                                        <a href="{{url('/single-product/'.$size->id)}}"><img src="{{asset($size->product->materials->first()->url)}}" width="150" height="150" alt="" /></a>
                                    </div>
                                    <div class="product-item-details shop-product-item-details">
                                        <div class="product-name-review">
                                            <div class="product-name ">
                                                <strong><a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a></strong>
                                            </div>
                                            <div class="product-review">
                                                <span class="special-price">Cena: {{$size->price}} RSD</span>
                                            </div>
                                            <div class="product-review">
                                                <span class="product-content">Pakovanje: {{$size->quantity}} {{$size->unit}}</span>
                                            </div>
                                            <br>
                                                <p>{{$size->product->text}}</p>
                                                <div class="readmore-btn">
                                                    <a href="{{url('/single-product/'.$size->id)}}">Learn More<i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-to-cart text-uppercase ptb-35">
                                            <ul>
                                                @if(array_key_exists($size->id, $in_carts))
                                                    <button type="button " class=" btn-danger" data-id="{{ $size->id }}" >Dodato</button>
                                                @else
                                                    <button type="button" class="cartBtn" data-id="{{ $size->id }}" >add to cart</button>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- woocommerce-pagination-area -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="woocommerce-pagination-area pb-40 mb-100 border-bottom fix">
                        <div class="woocommerce-pagination pull-left">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="woocommerce-ordering pull-right">
                            <strong>Show</strong>
                            <select name="orderby">
                                <option value="menu_order" selected="selected">1</option>
                                <option value="popularity">2</option>
                                <option value="rating">3</option>
                            </select>
                            <span> per page</span>
                        </div>
                    </div>
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
</body>
</html>
