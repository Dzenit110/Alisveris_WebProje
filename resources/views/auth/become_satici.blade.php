<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Satıcı Olun</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
</head>

<body>

   @include('frontend.body.header')
    <!--End header-->

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Ana Sayfa</a>
                    <span></span> Satıcı Olun
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Satıcı Olun</h1>
         <p class="mb-30">Daha önce bir Satıcı hesabınız var mı?<a href="{{ route('satici.login') }}">Satıcı Giriş Yap</a></p>
                                        </div>


                                        <form method="POST" action="{{ route('satici.register') }}">
            @csrf


    <div class="form-group">
        <input type="text" id="name" required="" name="name" placeholder="Mağaza Adı Yazınız" />
    </div>

      <div class="form-group">
        <input type="text" id="username" required="" name="username" placeholder="User Adı Yazınız" />
    </div>


    <div class="form-group">
        <input type="email"  id="email" required="" name="email" placeholder="Email Yazınız" />
    </div>

 <div class="form-group">
        <input type="text" id="phone" required="" name="phone" placeholder="Telefon Yazınız" />
    </div>


     <div class="form-group">
     <input type="date" id="satici_join" name="satici_join" class="form-control"  />
     
    </div>


    <div class="form-group">
        <input required=""  id="password"  type="password" name="password" placeholder="Şifre Yazınız" />
    </div>
    <div class="form-group">
        <input required="" id="password_confirmation" type="password" name="password_confirmation" placeholder="Şifre Tekrar Yazınız" />
    </div>


    <div class="login_footer form-group mb-50">
        <div class="chek-form">
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                <label class="form-check-label" for="exampleCheckbox12"><span>Şartları kabul ediyorum &amp; Policy.</span></label>
            </div>
        </div>
        <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Daha fazla bilgi edin</a>
    </div>
    <div class="form-group mb-30">
        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Kayıt Ol</button>
    </div>
    <p class="font-xs text-muted"><strong>Not:</strong>Kişisel verileriniz, bu web sitesindeki deneyiminizi desteklemek, hesabınıza erişimi yönetmek ve gizlilik politikamızda açıklanan diğer amaçlar için kullanılacaktır.</p>
</form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login facebook-login">
                                        <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                        <span>Facebook ile devam</span>
                                    </a>
                                    <a href="#" class="social-login google-login">
                                        <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                        <span>Google ile devam</span>
                                    </a>
                                    <a href="#" class="social-login apple-login">
                                        <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                        <span>Apple ile devam</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


     @include('frontend.body.footer')


   <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
   <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>
</body>
</html>