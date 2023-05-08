@php
$route = Route::current()->getName();
@endphp

<div class="col-md-3">
<div class="dashboard-menu">
<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} "  href="{{ route('dashboard') }}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($route ==  'user.siparis.page')? 'active':  '' }}" href="{{ route('user.siparis.page') }}" ><i class="fi-rs-shopping-bag mr-10"></i>Siparişler</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ ($route ==  'iade.siparis.page')? 'active':  '' }}" href="{{ route('iade.siparis.page') }}" ><i class="fi-rs-shopping-bag mr-10"></i>İade Siparişleri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($route ==  'iptal.siparis.page')? 'active':  '' }}" href="{{ route('iptal.siparis.page') }}" ><i class="fi-rs-shopping-bag mr-10"></i>Iptal Siparişleri</a>
    </li>
    <li class="nav-item">
    <a class="nav-link {{ ($route ==  'user.takip.siparis')? 'active':  '' }}" href="{{ route('user.takip.siparis') }}" ><i class="fi-rs-shopping-cart-check mr-10"></i>Takip Siparişleri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#address" ><i class="fi-rs-marker mr-10"></i>Adresim</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($route ==  'user.account.page')? 'active':  '' }}" href="{{ route('user.account.page') }}" ><i class="fi-rs-user mr-10"></i>Hesap Detayları</a>
    </li>

      <li class="nav-item">
        <a class="nav-link {{ ($route ==  'user.degistirme.password')? 'active':  '' }}" href="{{ route('user.degistirme.password') }}" ><i class="fi-rs-user mr-10"></i>Şifre Değiştir</a>
    </li>


    <li class="nav-item" style="background:#ddd;">
        <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Çıkış Yap</a>
    </li>
</ul>
</div>
</div>