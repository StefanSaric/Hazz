<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Organica Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
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
    <!-- food css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/page/food-page.css')}}"/>
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
                                        <strong id="total">{{$total}} RSD</strong>
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
<div class="breadcrumbs-area ptb-10 bg-4 mb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="woocommerce-breadcrumb mtb-15">
                    <div class="menu">
                        <ul>
                            <li><a  href="{{url('/')}}">Početna</a></li>
                            <li class="active"><a href="javascript:void(0);">Kozmetika</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-details">
    <div class="container">
        <div class="row">
            <!-- single-blog-start -->
            <div class="col-lg-12">
                <div class="blog-wrapper bg-2">
                    <div class="blog-img single-blog-img">
                        <img src="{{ asset("/assets/img/index/kozmetika.jpg")}}" alt="" />
                    </div>
                </div>
                <div class="new-arrivals-content text-center">
                    <h1 style="margin-bottom: 80px;">Zdravlje i Lepota</h1>
                    <h3 class="text-uppercase" style="margin-bottom: 80px;">Savršeno ulje za prevenciju i negu kože</h3>
                    <div class="blog-meta">
                    </div>
                    <p>Neverovatno da jedno ukusno koštunjavo voće ima toliku široku primenu i svestranane benefite. Plod kao i njegovo ulje su dobri i u prevencija mnogih bolesti ali i u ishrani i kozmetici. Odlični rezultati su primećeni po zdravlje čitavog organizma. Pošto lešnik sadrži vitamine, minerale, proteine, vlakna i biljne masti zdravstvene prednosti su mnogostruke. Nezasićene masne kiseline Omega 3,6,9 doprinose snižavanju holesterola u krvi, zdravlju srca, redukuje krvni pritisak, ubrzava metabolizam, dobar je i u prevenciji raka. Takođe povećava kognitivne funkcije i podiže raspoloženje. Štiti od infekcije i povećava broj crvenih krvnih zrnaca. Preporučuje se i u prevenciji dijabetesa. Veoma je bogat vitaminom B, posebno B1 i B6 koji su važni za stvaranje mišićne mase i rada mozga i nervnog sistema. Sadrži vitamine E i K, magnezijum, tiamin, kalcijum i cink. </p>
                    <p>Ulje lešnika se široko koristi u kozmetičkim proizvodima posebno za masni i mešoviti tip kože. Koža ga brzo upija, a bezbedno je  i za osetljivu kožu jer ne izaziva iritacije. Ono hidrira kožu jer sadrži visok nivo E vitamina i masnih kiselina što daje elastičnosti kože.Takođe sadrži tanin koji je moćan antioksidans koji čisti pore i sužava ih. Blistava koža bez bora za samo nekoliko nedelja je moguća uz ovo hladno ceđeno ulje. Možemo ga koristiti i kao sredstvo za sunčanje jer je naučno dokazano da filtrira štetno UV zračenje. Ukoliko imate problema sa suvom i oštećenom kosom i tu ovo zlatno žuto ulje prijatne arome može da  doprinese.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area bg-1 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-50">
                    <h2>Kozmetika</h2>
                </div>
            </div>
        </div>
        <div class="product-active owl-carousel next-prev-style">
            @foreach($products as $size)
                @if($size->product != null)
                    @foreach($size->product->categories as $category)
                        @if($category->name == "kozmetika")
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
                                            <button id="orderButton{{ $size->id }}" type="button" class="newcart" data-id="{{ $size->id }}"
                                            data-incart="@if(array_key_exists($size->id, $in_carts)){{'1'}} @else{{'0'}} @endif" >Dodaj u korpu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
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
<!-- addcart js -->
<script src="{{ asset("/assets/js/addcart.js")}}"></script>
<!-- deletecart js -->
<script src="{{ asset("/assets/js/cart-delete.js")}}"></script>
</body>
</html>
