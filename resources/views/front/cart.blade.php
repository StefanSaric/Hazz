<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Organica Cart</title>
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
                            <div class="language-USD pull-left dropdown d-none d-md-block">
                                <ul>
                                    <li><span>$<i class="fa fa-caret-down"> </i></span>
                                        <ul>
                                            <li><a href="#">US Dollar</a></li>
                                            <li><a href="#">US Dollar</a></li>
                                            <li><a href="#">US Dollar</a></li>
                                        </ul>
                                    </li>
                                    <li><span><img src="img/lg/1.png" alt="" /><i class="fa fa-caret-down"></i></span>
                                        <ul>
                                            <li><a href="#">Bangla</a></li>
                                            <li><a href="#">Bangla</a></li>
                                            <li><a href="#">Bangla</a></li>
                                        </ul>
                                    </li>
                                </ul>
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
                            <div class="cart-btn mt-15">
                                <button href="{{url('/checkout')}}">Go to Checkout</button>
                            </div>
                        </div>
                        <div class="cart-items clear mb-15" id="cart_div">
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
<!-- cart-area start -->
<div class="breadcrumbs-area ptb-10 bg-4 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="woocommerce-breadcrumb mtb-15">
                    <div class="menu">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="javascript:void(0);">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="account-title mb-50 text-center">
                    <h1>Cart</h1>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cart-table mb-50">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name">Product</th>
                                    <th class="product-size">Size</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $size)
                                    @if(array_key_exists($size->id, $in_carts))
                                    <tr class="cart-item">
                                        <td class="product-remove">
                                            <a href="#" class="delete-from-cart" data-id="{{ $size->id }}" title="Remove this item">x</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="{{url('/single-product/'.$size->id)}}">
                                                <img src="{{asset($size->product->materials->first()->url)}}" alt="" />
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{url('/single-product/'.$size->id)}}">{{$size->product->name}} </a>
                                        </td>
                                        <td class="product-size">
                                            <span class="amounte">{{$size->quantity}} {{$size->unit}}</span>
                                        </td>
                                        <td class="product-price">
                                            <span class="amounte">{{$size->price}} RSD</span>
                                        </td>
                                        <td class="product-quantity">
                                            <input type="number" min="1" max="{{$size->stock}}" name="quantity_{{ $size->id }}" id="quantity_{{ $size->id }}" class="quantity"
                                                   value="{{ $carts[$size->id]["quantity"] }}">
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="sub-total">{{$size->price*$carts[$size->id]["quantity"]}}</span>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td colspan="7" class="actions clear">
                                        <div class="floatright mb-10">
                                            <button class="cart-Btn"  name="quantity_{{ $size->id }}" id="quantity_{{ $size->id }}" class="quantity"
                                                    value="1" >Update Cart</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <!-- product area start -->
                <div class="cart-product mb-35 tab-area">
                    <div class="section-title">
                        <h2>Cross-Sells </h2>
                    </div>
                    <div class="cart-active owl-carousel next-prev-style">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="shop-single-product.html"><img src="img/product/11.jpg" alt="" /></a>
                                <span class="sale">Sale</span>
                            </div>
                            <div class="product-item-details text-center">
                                <div class="product-name-review tab-product-name-review">
                                    <div class="product-name mt-30 ">
                                        <span>Sample Category</span>
                                        <strong><a href="shop-single-product.html">Chaz Kangeroo Hoodie1</a></strong>
                                    </div>
                                    <div class="product-review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="special-price">$ 50.00</span>
                                    </div>
                                </div>
                                <div class="add-to-cart-area clear pt-35">
                                    <div class="add-to-cart text-uppercase">
                                        <button>add to cart</button>
                                    </div>
                                    <div class="add-to-links">
                                        <ul>
                                            <li class="left">
                                                <a href="#"><i class="fa fa-adjust"></i></a>
                                            </li>
                                            <li class="right">
                                                <a href="#"><i class="fa fa-heart-o"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product area end -->
            </div>
            <div class="col-lg-6">
                <div class="cart_totals">
                    <div class="section-title mb-30 text-uppercase">
                        <h2>Cart Totals</h2>
                    </div>
                </div>
                <div class="table-content table-responsive mb-30">
                    <table>
                        <tr>
                            <td><strong>Subtotal</strong></td>
                            <td><b>{{$total}} RSD</b></td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><b>{{$total}} RSD</b></td>
                        </tr>
                    </table>
                </div>
                <div class="login-button mb-30">
                    <form action="{{url('/checkout')}}">
                        <button>Proceed to Checkout</button>
                    </form>
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
<!-- cart js -->
<script src="{{ asset("/assets/js/cart.js")}}"></script>
<!-- deletecart js -->
<script src="{{ asset("/assets/js/deletecart.js")}}"></script>
</body>
</html>
