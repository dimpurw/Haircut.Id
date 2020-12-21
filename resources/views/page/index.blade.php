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
                        <p>HAIRCUT.ID merupakan suatu sistem informasi penyedia pelayanan jasa barbershop di daerah Jember yang berbasis website.
                            Aplikasi ini dibuat untuk memudahkan bagi para pencari pelayanan jasa potong rambut khususnya dalam pencarian lokasi barbershop, kemudahan dalam mengantri,
                            transaksi secara online dan juga perbandingan kelayakan pelayanan jasa dari berbagai barbershop melalui fitur rating yang diberikan.</p>
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
                    <div class="product__item__pic set-bg" data-setbg="{{$barbershop->getFoto()}}">
                        <ul class="product__hover">
                            <li><a href="{{$barbershop->getFoto()}}" class="image-popup"><span class="arrow_expand"></span></a></li>
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
        <a href="/showbarbershop">
            <button type="button" class="btn btn-outline-danger">Tampilkan Lebih Banyak</button>
        </a>
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

<!-- Services Section End -->
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

<!-- Footer Section End -->


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