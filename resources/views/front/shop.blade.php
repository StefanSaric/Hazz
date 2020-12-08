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
    <style>
        .active-category :hover{
            cursor: pointer;
        }
    </style>
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
                                    <input type="search" placeholder="Pretraga" />
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mainmenu dropdown d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a href="{{url('/')}}">Početna </a></li>
                                <li class="active"><a href="{{url('/shop')}}">Prodavnica </a></li>
                                <li><a href="{{url('/blog')}}">Blog </a></li>
                                <li><a href="{{url('/cart')}}">Korpa </a></li>
                                <li><a href="{{url('/checkout')}}">Kasa</a></li>
                                <li><a href="{{url('/contact')}}">Kontakt</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-2">
                <div class="cart-area">
                    <div class="maincart-wrap">
                        <a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i>
                            <span id="sizeof_cart1">{{ sizeof($in_carts) }}</span>
                        </a>
                    </div>
                    <div class="cart">
                        <div class="total-items pb-20 border-bottom mb-15">
                            <div class="sub-total clear">
                                <strong id="sizeof_cart2">{{ sizeof($in_carts) }}</strong>
                                <span>proizvoda</span>
                                <span class="pull-right total">
                                    <span>Ukupno :</span>
                                        <strong id="subtotal">{{$total}} RSD</strong>
                                </span>
                            </div>
                            <div class="organic-btn pt-20 text-center border-top">
                                <a href="{{url('/checkout')}}">Idi na kasu</a>
                            </div>
                        </div>
                        <div class="cart-items clear mb-15" id="cart_div">
                            @foreach($products as $size)
                                @if(array_key_exists($size->id, $in_carts))
                                    <div class="cart-item ptb-30 border-bottom" style="margin-bottom: 0px;padding-top: 10px;padding-bottom: 50px;" >
                                        <div class="cart-item-details text-center">
                                            <a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}}</a>
                                        </div><br>
                                        <div class="cart-item-details text-center">
                                            <div class="cart-img pull-left col-md-auto-12" >
                                                <a href="{{url('/single-product/'.$size->id)}}">
                                                    <img src="{{asset($size->product->materials->first()->url)}}"  alt="" />
                                                </a>
                                            </div>
                                            <div class="cart-item-details clear pull-left">
                                                <h6 style="padding-left: 30px;">Cena: {{$size->price}} RSD</h6>
                                                <h6 style="padding-left: 30px;">Pakovanje: {{$size->quantity}} {{$size->unit}}</h6>
                                            </div>
                                        </div><br>
                                        <div class="details-qty col-md-auto-12 pull-right">
                                            <a href="#" class="delete-from-cart"  data-id="{{ $size->id }}"><i class="fa fa-trash-o"  style="font-size:24px;padding-right: 20px;"></i></a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="organic-btn pt-20 text-center border-top">
                            <a href="{{url('/cart')}}">Pogledaj Korpu</a>
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
                                <li class="active"><a href="{{url('/')}}">Početna </a></li>
                                <li><a href="{{url('/shop')}}">Prodavnica </a></li>
                                <li><a href="{{url('/blog')}}">Blog </a></li>
                                <li><a href="{{url('/cart')}}">Korpa </a></li>
                                <li><a href="{{url('/checkout')}}">Kasa</a></li>
                                <li><a href="{{url('/contact')}}">Kontakt</a></li>
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
    <input type="hidden" id="baseUrl" value="{{url('/')}}"/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="woocommerce-breadcrumb mtb-15">
                    <div class="menu">
                        <ul>
                            <li><a  href="{{url('/')}}">Početna</a></li>
                            <li class="active"><a href="javascript:void(0);">Prodavnica</a></li>
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
                    <h3>Proizvodi</h3>
                </div>
                <div class="shop-categories-menu p-20">
                    <ul>
                        <li><strong>Kategorije:</strong></li>
                        <li><a class="active-category" id="svi" >Svi <i class="opener-1 fa fa-angle-right pull-right"></i></a></li>
                        <li><a class="active-category" id="prehrana" >Prehrana <i class="opener-1 fa fa-angle-right pull-right"></i></a></li>
                        <li><a class="active-category" id="kozmetika" >Kozmetika <i class="opener-2 fa fa-angle-right pull-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- filter-by-price-area start -->
            <div class="filter-by-price-area mtb-35 border-2">
                <div class="product-title text-uppercase bg-5">
                    <h3>Filter po Ceni</h3>
                </div>
                <div class="filter-by-price p-20-15">
                    <p>
                        Cena: <input type="text" id="amount">
                    </p>
                    <div id="slider-range"></div>
                    <div class="filter">
                        <button>filter</button>
                    </div>
                </div>
            </div>
            <!-- banner-area start -->
            {{--            <div class="banner-area mtb-35">--}}
            {{--                <div class="single-banner home2-single-banner mb-30">--}}
            {{--                    <a href="#"><img src="img/banner/home2/1.jpg" alt="" /></a>--}}
            {{--                </div>--}}
            {{--                <div class="single-banner home2-single-banner">--}}
            {{--                    <a href="#"><img src="img/banner/home2/2.jpg" alt="" /></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>

        <!-- product-vew area start -->
        <div class="col-xl-9 col-lg-8">
            <div class="slider mb-20">
                <img src="img/shop/1.jpg" alt="" />
            </div>
            <div class="tab-area shop-tab-area">
                <div class="shop-taitle mb-20">
                    <h1 style="text-align: center">Prodavnica</h1>
                </div>
                <div class="tab-menu-area border-bottom mb-30">
                    <div class="row">
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="shop-tab-menu">
                                <ul class="nav">
                                    <li><a class="active" href="#tab1" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
                                    <li><a href="#tab2" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-md-5 col-sm-6 hidden-xs">
                            <div class="woocommerce-ordering text-right">
                                <strong>Sortiraj po: </strong>
                                <select name="orderby" class="orderby" id="orderby">
                                    <option>Izaberite</option>
                                    <option value="name">Nazivu</option>
                                    <option value="price" >Ceni</option>
                                </select>
                                <div class="btn fa fa-arrow-up descending" id="descending" value="desc"></div>
                                <div class="btn fa fa-arrow-down ascending" id="ascending" style="display: none" value="asc"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <div class="row sortDiv1">
                            <input type="hidden" id="all_products" value="{{sizeof($products)}}">
                            @foreach($products as $num=>$size)
                                @if($size->product != null)
                                    <div data-price="{{ $size->price }}" data-name="{{ $size->product->name }}" id="element{{$num}}" @if($num > 5) style="display: none" @endif
                                    class="col-xl-4 col-md-6 col-sm-6 sortBox opsta @foreach ($size->product->categories as $category) {{$category->name.' '}} @endforeach">
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
                                                        <button id="orderButton{{ $size->id }}" type="button" class="newcart" data-id="{{ $size->id }}"
                                                                data-incart="@if(array_key_exists($size->id, $in_carts)){{'1'}} @else{{'0'}} @endif" >Dodaj u korpu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade"  id="tab2">
                        <div class="row">
                            @foreach($products as $size)
                                @if($size->product != null)
                                    <div data-price="{{ $size->price }}" data-name="{{ $size->product->name }}" class="col-sm-12 opsta @foreach ($size->product->categories as $category) {{$category->name.' '}} @endforeach">
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
                                                        <p>{{$size->product->text}}</p>
                                                        <div class="readmore-btn">
                                                            <a href="{{url('/single-product/'.$size->id)}}">Saznaj više<i class="fa fa-long-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart text-uppercase ptb-35 pull-left" style="right: 315px;bottom: 60px;">
                                                    <ul>
                                                        <button id="orderButton{{ $size->id }}" type="button" style="margin-left: 10px;" class="newcart" data-id="{{ $size->id }}"
                                                                data-incart="@if(array_key_exists($size->id, $in_carts)){{'1'}} @else{{'0'}} @endif" >Dodaj u korpu</button>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- woocommerce-pagination-area -->
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
<!-- shop js -->
<script src="{{ asset("/assets/js/shop.js")}}"></script>
<!-- infinitiscroll js -->
<script src="{{ asset("/assets/js/infinitiscroll.js")}}"></script>
<!-- addcart js -->
<script src="{{ asset("/assets/js/addcart.js")}}"></script>
<!-- deletecart js -->
<script src="{{ asset("/assets/js/cart-delete.js")}}"></script>
<!-- deletecart2 js -->
<script src="{{ asset("/assets/js/cart-delete2.js")}}"></script>
</body>
</html>
