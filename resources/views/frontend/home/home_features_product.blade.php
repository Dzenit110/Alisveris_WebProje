@php
$featured = App\Models\Urun::where('ozellik',1)->orderBy('id','DESC')->limit(6)->get();
@endphp


<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class=""> Featured Products </h3>

        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">Bring nature into your home</h2>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                @foreach($featured as $urun)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}">
                                                <img class="default-img" src="{{ asset( $urun->urun_thambnail ) }}" alt="" />

                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" id="{{ $urun->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                            <a aria-label="Compare" class="action-btn" id="{{ $urun->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $urun->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                        </div>

                                        @php
                                        $miktar = floatval($urun->satis_fiyat) - floatval($urun->indirimli_fiyat);
                                        $indirim = floatval((floatval($miktar)/floatval($urun->satis_fiyat)) * 100);
                                        @endphp


                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($urun->indirimli_fiyat == NULL)
                                            <span class="new">New</span>
                                            @else
                                            <span class="hot"> {{ round($indirim) }} %</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $urun['category']['category_name'] }}</a>
                                        </div>
                                        <h2><a href="{{ url('urun/detay/'.$urun->id.'/'.$urun->urun_slug) }}">{{ $urun->urun_name }}</a></h2>
                                      
                                        @php
$reviewcount = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->latest()->get();
$ortalama = App\Models\Review::where('urun_id',$urun->id)->where('status',1)->avg('rating');
@endphp

                                      
                                        <div class="product-rate d-inline-block">
                                        @if($ortalama == 0)

@elseif($ortalama == 1 || $ortalama < 2)                     
<div class="product-rating" style="width: 20%"></div>
@elseif($ortalama == 2 || $ortalama < 3)                     
<div class="product-rating" style="width: 40%"></div>
@elseif($ortalama == 3 || $ortalama < 4)                     
<div class="product-rating" style="width: 60%"></div>
@elseif($ortalama == 4 || $ortalama < 5)                     
<div class="product-rating" style="width: 80%"></div>
@elseif($ortalama == 5 || $ortalama < 5)                     
<div class="product-rating" style="width: 100%"></div>
@endif

                                    </div>

                                        @if($urun->indirimli_fiyat == NULL)
                                        <div class="product-price mt-10">
                                            <span>${{ $urun->satis_fiyat }} </span>

                                        </div>
                                        @else
                                        <div class="product-price mt-10">
                                            <span>${{ $urun->indirimli_fiyat }} </span>
                                            <span class="old-price">${{ $urun->satis_fiyat }}</span>
                                        </div>
                                        @endif

                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                        <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->

                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>