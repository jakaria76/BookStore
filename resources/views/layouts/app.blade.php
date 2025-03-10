<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
 <meta charset="utf-8">
<title>RJR BookStore</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/imgs/theme/favicon.ico">
<link rel="stylesheet" href="{{asset('/')}}assets/css/main.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/custom.css">

@livewireStyles
</head>

<body>
    <header class="header-area header-style-1 header-height-2" style="background-color: rgb(46, 133, 210);">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-4 d-flex justify-content-end"> <!-- Added d-flex and justify-content-end -->
                        <div id="news-flash" class="d-inline-block text-end"> <!-- Added text-end -->
                            <ul>
                                <!-- NEWS FLASH dekhano hoyse-->
                                <li>Get great devices up to 50% off <a href="shop.html">View details</a></li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today <a href="shop.html">Shop now</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-8">
                        <div class="header-info header-info-right text-end"> <!-- Added text-end for right alignment -->
                            <ul class="d-flex justify-content-end"> <!-- Added d-flex and justify-content-end -->
                                @auth
                                    {{-- If the user is authenticated --}}
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                            @csrf
                                            <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                    <li><i class="fi-rs-user"></i> {{ auth()->user()->name }}</li> {{-- Show user name --}}
                                @else
                                    {{-- If the user is not authenticated, show login/signup --}}
                                    <li><i class="fi-rs-key"></i> <a href="{{ route('login') }}">Log In</a> / <a href="{{ route('register') }}">Sign Up</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.html"><img src="{{asset('/')}}assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        @livewire('search-header-component')
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @livewire('wishlist-icon-component')

                                @livewire('carticon-component');


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{asset('/')}}assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    <li class="has-children">
                                        <a href="shop.html"><i class="surfsidemedia-font-dress"></i>Islamic books</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">Best Islamic Books</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Sahih al-Bukhari</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Sahih Muslim</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Riyad as-Salihin</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Sunan an-Nasa'i</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Islamic Golden Age</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Books on Tawhid</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Marriage in Islam</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Parenting in Islam</a></li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-2.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% Off</h6>
                                                            <h4>New Arrival</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-3.jpg" alt="menu_banner2">
                                                        <div class="banne_info">
                                                            <h6>15% Off</h6>
                                                            <h4>Hot Deals</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has-children">
                                        <a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Academic Books</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">BOOKS</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 1 full books</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 2 full books</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 3 full books</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 4 full books</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 5 full books</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 6 full books</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 7 full books</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">class 8 full books</a></li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-4.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% Off</h6>
                                                            <h4>New Arrival</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has-children">
                                        <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Bangla Story Books</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">Trending Books</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Pather Panchali</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Aparajito</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Gitanjali</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Chokher Bali</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Padma Nadir Majhi</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Feluda Series</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Kakababu Series</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Byomkesh Bakshi Series</a></li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-5.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% Off</h6>
                                                            <h4>New Arrival</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-6.jpg" alt="menu_banner2">
                                                        <div class="banne_info">
                                                            <h6>15% Off</h6>
                                                            <h4>Hot Deals</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Sei Somoy</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Prothom Alo</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Moushalkal</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Jibonananda Daser Kobita</a></li>

                                </ul>
                                <div class="more_categories">Show more...</div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.html">Home </a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="{{route('shop')}}">Shop</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        @auth  {{-- user jodi authenticated hoy--}}
                                            @if (Auth::user()->utype=='admin')      {{--utype jodi admin hoy taile niser details gula show korbe --}}
                                            <ul class="sub-menu">
                                                <li><a href="{{route('admin.dashboard')}}">AdminDashboard</a></li>
                                                <li><a href="#">Products</a></li>
                                                <li><a href="#">Categories</a></li>
                                                <li><a href="#">Coupons</a></li>
                                                <li><a href="#">Orders</a></li>
                                                <li><a href="#">Customers</a></li>
                                                <li><a href="#">Logout</a></li>
                                            </ul>

                                            @else         {{-- utype jodi admin na hoy taile se je kono user , so tar my account niser 3 ta show korbe--}}
                                            <ul class="sub-menu">
                                                <li><a href="{{route('customer.dashboard')}}">UserDashboard</a></li>
                                                <li><a href="#">Orders</a></li>
                                                <li><a href="#">Logout</a></li>
                                            </ul>

                                            @endif
                                        @endauth
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    {{-- <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> (+1) 0000-000-000 </p>
                    </div> --}}
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Surfside Media" src="{{asset('/')}}assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart.html">
                                    <img alt="Surfside Media" src="{{asset('/')}}assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-4.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart.html">View cart</a>
                                            <a href="shop-checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{asset('/')}}assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                                <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop.html">shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="login.html">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="register.html">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div> --}}

    {{$slot}}

    <footer class="main" style="background-color: rgb(46, 133, 210); color: white;">
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="{{asset('/')}}assets/imgs/logo/logo.png" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>modhubag dhaka bangladesh
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>01317536550
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>rjr@gmail.com
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="assets/imgs/theme/app-store.jpg" alt=""></a>
                                    <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">RJR Online Bookstore</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <style>
        footer.main {
            background: linear-gradient(to bottom, #002733, #00424e);
            color: white;
            padding: 30px 0;
        }
        footer a {
            color: #f5b400;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        .footer-list li {
            list-style: none;
            margin-bottom: 8px;
        }
        .footer-list li a {
            color: white;
        }
        .footer-list li a:hover {
            text-decoration: underline;
        }
        .download-app img {
            width: 120px;
            margin-right: 10px;
        }
    </style>


    <!-- Vendor JS-->
<script src="{{asset('/')}}assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('/')}}assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{asset('/')}}assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/js/plugins/slick.js"></script>
<script src="{{asset('/')}}assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{asset('/')}}assets/js/plugins/wow.js"></script>
<script src="{{asset('/')}}assets/js/plugins/jquery-ui.js"></script>
<script src="{{asset('/')}}assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}assets/js/plugins/magnific-popup.js"></script>
<script src="{{asset('/')}}assets/js/plugins/select2.min.js"></script>
<script src="{{asset('/')}}assets/js/plugins/waypoints.js"></script>
<script src="{{asset('/')}}assets/js/plugins/counterup.js"></script>
<script src="{{asset('/')}}assets/js/plugins/jquery.countdown.min.js"></script>
<script src="{{asset('/')}}assets/js/plugins/images-loaded.js"></script>
<script src="{{asset('/')}}assets/js/plugins/isotope.js"></script>
<script src="{{asset('/')}}assets/js/plugins/scrollup.js"></script>
<script src="{{asset('/')}}assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{asset('/')}}assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{asset('/')}}assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="{{asset('/')}}assets/js/main.js?v=3.3"></script>
<script src="{{asset('/')}}assets/js/shop.js?v=3.3"></script>

@livewireScripts
@stack('scripts')

</body>

</html>
