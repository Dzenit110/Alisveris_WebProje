@php
$setting = App\Models\SiteSetting::find(1);
        @endphp

<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                            Evde kal & günlük ihtiyaçlarını karşıla <br />
                            mağazamızdan alın
                            </h2>
                            <p class="mb-45">Günlük Alışverişinize şununla Başlayın: <span class="text-brand">Kolay AlışVeriş</span></p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="E-mail Adresiniz" />
                                <button class="btn" type="submit">Abone Ol</button>
                            </form>
                        </div>
                        <img src="{{ asset('frontend/assets/imgs/banner/banner-9.png') }}" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-1.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">En iyi fiyatlar & teklifler</h3>
                            <p>50 TL veya üzeri siparişler</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-2.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Ücretsiz teslimat</h3>
                            <p>24/7 inanılmaz hizmetler</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-3.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Harika günlük fırsat</h3>
                            <p>kaydolduğunuzda</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-4.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Geniş ürün yelpazesi</h3>
                            <p>Mega İndirimler</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-5.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Kolay iade</h3>
                            <p>30 gün içinde</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-6.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Güvenli teslimat</h3>
                            <p>30 gün içinde</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                        <a href="index.html" class="mb-15"><img src="{{ asset($setting->logo ) }}" alt="logo" /></a>
                                <p class="font-lg text-heading">Harika market Kolay Alışveriş web sitesi</p>
                        </div>
                        <ul class="contact-infor">
    <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-location.svg') }}" alt="" /><strong>Adres: </strong> <span> {{ $setting->company_address }} </span></li>
    <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Bizi Arayın:</strong><span>{{ $setting->phone_one }}</span></li>
    <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-email-2.svg') }}" alt="" /><strong>E-mail:</strong><span>{{ $setting->email }}</span></li>
    <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-clock.svg') }}" alt="" /><strong>Saatler:</strong><span>09:00 - 18:00, Pazartesi - Cuma</span></li>
</ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class=" widget-title">Firma</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Hakkımızda</a></li>
                        <li><a href="#">Teslimat Bilgisi</a></li>
                        <li><a href="#">Gizlilik Politikası</a></li>
                        <li><a href="#">Şartlar &amp; Koşullar</a></li>
                        <li><a href="#">Bize Ulaşın</a></li>
                        <li><a href="#">Destek Merkezi</a></li>
                        <li><a href="#"></a>Kariyer</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Hesap</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Kayıt Ol</a></li>
                        <li><a href="#">Sepeti Görüntüle</a></li>
                        <li><a href="#">Dilek listesi</a></li>
                        <li><a href="#">Siparış Takip et</a></li>
                        <li><a href="#">Nakliye Ayrıntıları</a></li>
                        <li><a href="#">Ürünleri karşılaştır</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Kurumsal</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="{{ route('become.satici') }}">Satıcı Olun</a></li>                       
                     <li><a href="#">Ortaklık Programı</a></li>
                        <li><a href="#">Tarımsal girişimcilik</a></li>
                        <li><a href="#">Tedarikçilerimiz</a></li>
                        <li><a href="#">Ulaşılabilirlik</a></li>
                        <li><a href="#">Promosyonlar</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Popüler</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Süt & Aromalı Süt</a></li>
                        <li><a href="#">Tereyağı ve Margarin</a></li>
                        <li><a href="#">Marmelatlar</a></li>
                        <li><a href="#">Sebzeler</a></li>
                        <li><a href="#">Peynir</a></li>
                    </ul>
                </div>

            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
            <p class="font-sm mb-0">&copy; 2023, <strong class="text-brand"> Kolay AlışVeriş</strong> -  {{ $setting->copyright }}</p>            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">

                <div class="hotline d-lg-inline-flex">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                    <p>{{ $setting->support_phone }}<span>24/7 Destek Merkezi</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                <h6>Bizi Takip Edin</h6>
    <a href="{{ $setting->facebook }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
    <a href="{{ $setting->twitter }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
    <a href="{{ $setting->youtube }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
</div>
                <p class="font-sm">İlk aboneliğinizde %15'e varan indirim</p>
            </div>
        </div>
    </div>
</footer>