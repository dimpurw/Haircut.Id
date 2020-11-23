@extends('layouts.main')

@section('content')
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg" data-setbg="">
                    <div class="categories__text" style="margin-top: 0px;">
                        <h1>HAIRCUT</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                            edolore magna aliquapendisse ultrices gravida.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/376.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/header.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/37193.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/Billionaire-Habits-802x684.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>BarberShop</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($data_barbershop as $barbershop)
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/Barbadox-Barbershop-845x684.jpg">
                        <ul class="product__hover">
                            <li><a href="img/product/product-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="/detail/{{$barbershop->id}}">{{$barbershop->nama}}</a></h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mx-auto product__item__text" style="width: 200px;">
        <button type="button" class="btn btn-outline-danger">Tampilkan Lebih Banyak</button>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    @if(auth()->user()->role == 'pelanggan')
                    <div class="banner__item">
                        <div class="banner__text">
                            <span style="color: black; font-size: 20px;">Selamat Datang Di Haircut</span>
                            <h1>Temukan Barbershop Terbaik</h1>
                            <a href="#">Lihat BarberShop</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span style="color: black; font-size: 20px;">Selamat Datang Di Haircut</span>
                            <h1>Temukan Barbershop Terbaik</h1>
                            <a href="#">Lihat BarberShop</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span style="color: black; font-size: 20px;">Selamat Datang Di Haircut</span>
                            <h1>Temukan Barbershop Terbaik</h1>
                            <a href="#">Lihat BarberShop</a>
                        </div>
                    </div>
                    @else(auth()->user()->role == 'barbershop')
                    <div class="banner__item">
                        <div class="banner__text">
                            <span style="color: black; font-size: 20px;">Selamat Datang Di Haircut</span>
                            <h1>Selamat Datang di Haircut.Id</h1>
                            <a href="/dashboard">Lihat Dashboard</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span style="color: black; font-size: 20px;">Selamat Datang Di Haircut</span>
                            <h1>Selamat Datang di Haircut.Id</h1>
                            <a href="/dashboard">Lihat Dashboard</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span style="color: black; font-size: 20px;">Selamat Datang Di Haircut</span>
                            <h1>Selamat Datang di Haircut.Id</h1>
                            <a href="/dashboard">Lihat Dashboard</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/37193.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ haircut.id</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/37193.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ haircut.id</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/37193.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ haircut.id</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/37193.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ haircut.id</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/376.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ haircut.id</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/376.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ haircut.id</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        cilisis.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>
                            document.write(new Date().getFullYear());
                        </script> Haircut.Id
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@endsection