<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Organica Checkout</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("/assets/img/index/favicon.png")}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.7 css -->
    <link rel="stylesheet" href="{{ asset("/assets/css/index/bootstrap.min.css")}}">
    <!-- animate css -->
    <link rel="stylesheet"href="{{ asset("/assets/css/index/animate.css")}}">
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
    <!-- checkout css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/page/checkout-page.css')}}"/>

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
                                                    <a href="#" class="delete-from-cart"  data-id="{{ $size->id }}"><i class="fa fa-trash-o"  style="font-size:24px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                        <div class="organic-btn pt-20 text-center border-top">
                            <a href="{{url('/cart')}}">Pogledaj korpu</a>
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
<!-- start checkout -->
<div class="breadcrumbs-area ptb-10 bg-4 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="woocommerce-breadcrumb mtb-15">
                    <div class="menu">
                        <ul>
                            <li><a  href="{{url('/')}}">Početna</a></li>
                            <li class="active"><a href="javascript:void(0);">Kasa</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title text-center mb-30">
                    <h1 style="margin-bottom: 50px;">Završi porudžbinu</h1>
                </div>
            </div>
        </div>
        <div class="customer-details-area mb-35">
            {!! Form::open(array('method' => 'POST', 'url' => '/test111', 'id' => 'fileupload', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
            <div class="row">
                <div class="col-lg-6">
                    <div class="customer-details mb-50">
                        <div class="section-title mb-10">
                            <h4>Podaci o poručiocu</h4>
                        </div>
                        <div class="customer-details-form account-form p-20 clear bg-1">
                            <form action="#">
                                <span class="form-row-first">
                                    <b>Ime <span class="required">*</span></b>
                                    <input type="text" name="firstname" id ="firstname" placeholder="Ime" required />
                                </span>
                                <span class="form-row-last">
                                    <b>Prezime <span class="required">*</span></b>
                                    <input type="text" name="lastname" id ="lastname" placeholder="Prezime" required/>
                                </span>
                                <span>
                                    <b>Email <span class="required">*</span></b>
                                    <input type="text" name="email" id ="email" placeholder="Email" required/>
                                </span>
                                <span>
                                    <b>Grad <span class="required">*</span></b>
                                    <input type="text" name="city" id ="city" placeholder="Grad"   required/>
                                </span>
                                <span>
                                    <b>Adresa <span class="required">*</span></b>
                                    <input type="text" name="address" id ="address" placeholder="Adresa"  required/>
                                </span>
                                <span class="form-row-first">
                                    <input type="text" name="num" id ="num" placeholder="Broj"  required/>
                                </span>
                                <span class="form-row-last">
                                    <input type="text" name="apartment" id ="apartment" placeholder="Stan"  required/>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <h4>Porudžbina</h4>
                    </div>
                    <div class="your-order bg-1">
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-name">Proizvod</th>
                                    <th class="product-total">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $size)
                                    @if(array_key_exists($size->id, $in_carts))
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$size->product->name}} <strong class="product-quantity"> x{{$carts[$size->id]["quantity"]}} </strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{$carts[$size->id]["quantity"]*$size->price}} RSD</span>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <tfoot>
{{--                                <tr class="cart-subtotal">--}}
{{--                                    <th>Cart Subtotal</th>--}}
{{--                                    <td><span class="amount" >{{$total}} RSD</span></td>--}}
{{--                                </tr>--}}
                                <tr class="order-total">
                                    <th><strong>Ukupno</strong></th>
                                    <td><strong><span class="amount">{{$total}} RSD</span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method mt-0">
                            <div class="order-button-payment">
                                <input type="submit" value="Potvrdi porudžbinu" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
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
<!-- cart js -->
<script src="{{ asset("/assets/js/cart.js")}}"></script>
<!-- deletecart js -->
<script src="{{ asset("/assets/js/cart-delete.js")}}"></script>
</body>
</html>
